<?php
class bbPressModToolsPlugin_bbPress extends bbPressModToolsPlugin {

	public static function init() {

		$self = new self();

		// Show a notice to users
		add_action( 'bbp_template_before_single_forum', array( $self, 'anon_pending_notice' ) );
		add_action( 'bbp_template_before_single_topic', array( $self, 'anon_pending_notice' ) );

		// Add blocked link to user details and profile
		add_action( 'bbp_theme_after_reply_author_details', array( $self, 'user_admin_links' ), 10 );
		add_action( 'bbp_template_before_user_profile', array( $self, 'user_admin_links' ), 10 );

		// Do additional actions on approval of topics
		add_action( 'bbp_approved_topic', array( $self, 'moderation_approve_action' ) );
		add_action( 'bbp_approved_reply', array( $self, 'moderation_approve_action' ) );

		remove_action( 'bbp_template_redirect', 'bbp_forum_enforce_blocked', 1  );
		add_action( 'bbp_template_redirect', array( $self, 'bbp_forum_enforce_blocked' ), 1  );

		// Redirect anon users back to parent forum
		add_filter( 'bbp_new_topic_redirect_to', array( $self, 'redirect_pending_anon' ), 20, 3 );
		add_filter( 'bbp_new_reply_redirect_to', array( $self, 'redirect_pending_anon' ), 20, 3 );

		// Include pending posts into replies and topic lists
		add_filter( 'bbp_has_topics_query', array( $self, 'pending_query' ) );
		add_filter( 'bbp_has_replies_query', array( $self, 'pending_query' ) );

		// Intercept the content and show awaiting moderation message
		add_filter( 'bbp_get_reply_content', array( $self, 'moderate_content' ), 10, 2 );

		// Intercept the post title and add awaiting moderation notice
		add_filter( 'bbp_get_topic_title', array( $self, 'pending_title' ), 10, 2 );

		// Disable ability to reply if topic is awaiting moderation.
		add_filter( 'bbp_current_user_can_publish_replies', array( $self, 'pending_topic_reply_check' ) );

		// Intercept the admin bar and add approve post
		add_filter( 'bbp_get_topic_admin_links', array( $self, 'add_moderation_links'), 10, 3 );
		add_filter( 'bbp_get_reply_admin_links', array( $self, 'add_moderation_links'), 10, 3 );

	}

	/**
	 * Redirect users back to parent with pending variable to display notice for anon users
	 *
	 *	@since  1.0.0
	 *
	 * @param  $redirect_url
	 * @param  $redirect_to
	 * @param  $post_id
	 *
	 * @return $redirect_url
	 *
	 */
	public function redirect_pending_anon( $redirect_url, $redirect_to, $post_id ) {

		$post = get_post( $post_id );

		if ( in_array( $post->post_type, array( 'topic', 'reply' ) ) && 'pending' == $post->post_status && $post->post_author == 0 ) {

			$redirect_url = get_permalink( $post->post_parent ) . '?moderation_pending=' . $post_id;

		}

		return $redirect_url;

	}

	/**
	 * Add the post status to the topic and reply query
	 *
	 *	@since  0.1.0
	 *
	 * @param  array $bbp
	 *
	 * @return array $bbp
	 */
	public function pending_query( $bbp ) {

		$user = wp_get_current_user();

		if ( ! $user->ID ) {
			return $bbp;
		}

		$bbp['post_status'] = 'pending,publish,closed,private,hidden,reported';

		$user_can_moderate = $this->user_can_moderate( $user->ID, bbp_get_forum_id() );

		if ( ( isset( $_GET['view'] ) && $_GET['view'] == 'all' ) && $user_can_moderate ) {

			$bbp['post_status'] .= ',spam,trash';

		}

		if ( ! $user_can_moderate ) {

			add_filter( 'posts_where', array( $this, 'posts_where' ) );

		}

		return $bbp;

	}

	/**
	 * Posts where...
	 *
	 *	@since 0.1.0
	 *
	 * @param str $where
	 *
	 * @return str $where
	 */
	public function posts_where( $where = '' ) {

		global $wpdb;

		$user = wp_get_current_user();

		$where = str_ireplace( $wpdb->prefix . "posts.post_status = 'pending'", "(" . $wpdb->prefix . "posts.post_status = 'pending' AND " . $wpdb->prefix . "posts.post_author = " . $user->ID . ")", $where );

		return $where;

	}

	/**
	 * Replace the content with an awaiting moderation message
	 *
	 *	@since  0.1.0
	 *
	 * @param  string $content
	 * @param  int $post_id
	 *
	 * @return string $content
	 */
	public function moderate_content( $content, $post_id ) {

		$post = get_post( $post_id );

		// Why would it be empty? no one knows, but better safe than sorry!
		if ( empty( $post ) )
			return $content;

		if ( 'pending' == $post->post_status ) {

			$notice = '<div class="bbp-mt-template-notice">' . __( '当前贴子等待审核.', $this->plugin_slug ) . '</div>';

			if ( $this->user_can_moderate( get_current_user_ID(), bbp_get_forum_id() ) ) {

				$content = $notice . '<br>' . $content;

			} else {

				$content = $notice;

			}

		}

		// Has post been reported?
		$reported_count = (int)get_post_meta( $post_id, '_bbp_modtools_post_report_count', TRUE );

		if ( $reported_count > 0 && $this->user_can_moderate( get_current_user_ID(), bbp_get_forum_id() ) ) {

			$notices = '';
			$report_types = array();
			$reports = get_post_meta( $post_id, '_bbp_modtools_post_report' );

			foreach ( $reports as $report ) {

				$report_types[$report['type']] = isset( $report_types[$report['type']] ) ? $report_types[$report['type']] = $report_types[$report['type']] + 1 : 1;

			}

			uasort( $report_types, function( $a, $b ) {

				if ( $a == $b )
					return 0;

				return ( $a > $b ) ? -1 : 1;

			} );

			foreach ( $report_types as $type => $count ) {

				$notices .= '<div class="bbp-mt-template-notice">' . __( $count . ' users reported this as ' . $type . '.', $this->plugin_slug ) . '</div>';

			}

			$content = $notices . '<br>' . $content;

		}

		return $content;

	}

	/**
	 * Add 'Block user' link into the author profile and post author
	 * @since 1.0.0
	 */
	public function user_admin_links() {

		global $post;
		$user_role = strtolower( bbp_get_user_display_role( get_current_user_id() ) );

		if ( $this->user_can_moderate( get_current_user_id() ) ) {

			if ( ! empty( $post ) && $post->post_author ) {

				$author_id = $post->post_author;

			} else {

				$author_id = bbp_get_displayed_user_field( 'ID' );

			}

			$role = bbp_get_user_display_role( $author_id );

			if ( ! in_array( $role, array( 'Blocked', 'Keymaster', 'Moderator', 'Senior Moderator' ) ) && $author_id > 0 ) {

				$action = 'block';

			} elseif ( in_array( $role, array( 'Blocked' ) ) ) {

				if ( $user_role == 'keymaster' or $user_role == 'senior moderator' ) {

					$action = 'unblock';

				}

			}

			if ( isset( $action ) ) {

				$url = add_query_arg( array(
					'author_id' => $author_id,
					'action' => $this->plugin_slug . '-' . $action . '_user',
				));

				$nonce_url = wp_nonce_url( $url, 'moderator_action', $this->plugin_slug . '-wp_nonce' );

				echo '<a href="' . $nonce_url . '" class="bbp-reply-edit-link">' . __( ucfirst( $action ) . ' User', $this->plugin_slug ) . '</a>';

			}

		}

	}

	/**
	 * Action to add flags to users on topic/reply approval
	 *
	 * @since 1.0.0
	 *
	 * @param  $post_id
	 */
	public function moderation_approve_action( $post_id ) {

		if ( 'custom' != get_option( '_bbp_moderation_type' ) ) {

			return;

		}

		$post_author = get_post_field( 'post_author', $post_id );

		if ( 0 == $post_author ) {

			return;

		}

		$custom_moderation_options = get_option( '_bbp_moderation_custom' );

		if ( ! empty( $custom_moderation_options ) && in_array( 'links', $custom_moderation_options ) && get_post_meta( $post_id, '_bbp_moderation_link_found', true ) ) {

			update_user_meta( $post_author, '_link_moderation_approved', TRUE );

		}

		if ( ! empty( $custom_moderation_options ) && in_array( 'ascii_unnaproved', $custom_moderation_options ) && get_post_meta( $post_id, '_bbp_moderation_ascii_found', true ) ) {

			update_user_meta( $post_author, '_ascii_moderation_approved', TRUE );

		}

	}

	/**
	 * Add pending indicator to message title
	 *
	 *	@since  0.1.0
	 *
	 * @param string $title
	 * @param int $post_id
	 *
	 * @return string $title
	 *
	 */
	public function pending_title( $title, $post_id ) {

		$post = get_post( $post_id );

		// Why would it be empty? no one knows, but better safe than sorry!
		if ( empty( $post ) )
			return $title;

		if ( 'pending' == $post->post_status )
			return $title . ' ('. __( '等待审核', $this->plugin_slug ) . ')';

		if ( $this->user_can_moderate() ) {

			$args = array(
				'post_parent' => $post_id,
				'post_type'   => 'reply',
				'numberposts' => -1,
				'post_status' => 'pending'
			);
			$children = get_children( $args );
			$child_count = count ( $children );

			if ( $child_count > 1 ) {

				return $title . ' ('. $child_count . ' ' . __( '回复等待审核', $this->plugin_slug ) . ')';

			} else if ( $child_count == 1 ) {

				return $title . ' ('. $child_count . ' ' . __( '回复等待审核', $this->plugin_slug ) . ')';

			}

		}

		return $title;

	}

	/**
	 * Check if the topic is waiting moderation. Disable ability to reply if it is
	 *
	 *	@since 0.1.0
	 *
	 * @param boolean $retval
	 *
	 * @return boolean - true can reply
	 */
	public function pending_topic_reply_check( $retval ) {

		if ( ! $retval )
			return $retval;

		$topic_id = bbp_get_topic_id();

		return ( 'publish' == bbp_get_topic_status( $topic_id ) );

	}

	/**
	 * Display pending notice to anon users when submitted post is pending
	 * @since 1.0.0
	 */
	public function anon_pending_notice() {

		if ( ! empty( $_GET['moderation_pending'] ) ) {

			$post_id = $_GET['moderation_pending'];
			$post = get_post( $post_id );

			if ( in_array( $post->post_type, array( 'topic', 'reply' ) ) && 0 == $post->post_author ) {

				switch( $post->post_type ) {

					case 'topic':
						$message = __('Your topic has been submitted and is pending further moderation', $this->plugin_slug );
					break;
					case 'reply':
						$message = __('Your reply has been submitted and is pending further moderation', $this->plugin_slug );
					break;

				}

				echo '<div class="bbp-template-notice"><p>' . $message . '</p></div>';

			}

		}

	}

	/**
	 * Check if a user is blocked, or cannot spectate the forums.
	 *
	 * @since 1.0.0
	 *
	 * @uses is_user_logged_in() To check if user is logged in
	 * @uses bbp_is_user_keymaster() To check if user is a keymaster
	 * @uses current_user_can() To check if the current user can spectate
	 * @uses is_bbpress() To check if in a bbPress section of the site
	 * @uses bbp_set_404() To set a 404 status
	 */
	public function bbp_forum_enforce_blocked() {

		if ( ! is_user_logged_in() || bbp_is_user_keymaster() )
			return;

		// Redirect to custom block page or Set 404 if in bbPress and user cannot spectate
		if ( is_bbpress() && ! current_user_can( 'spectate' ) ) {

			if ( $page_id = get_option( '_bbp_blocked_page_id' ) ) {

				wp_redirect( get_permalink( $page_id ) );
				exit;

			} else {

				bbp_set_404();

			}

		}

	}

	/**
	 * Add 'approve' or 'pending' link into the mod links
	 *
	 * @since  0.1.0
	 * @since  1.0.0 Added bbPress version check to remove links being added to unapprove/approve posts
	 *
	 * @param  string $retval [description]
	 * @param  array $r      [description]
	 * @param  array $args   [description]
	 *
	 * @return string $retval         [description]
	 */
	public function add_moderation_links( $retval, $r, $args ) {

		$post_id = $r['id'];

		// Why would it be empty? no one knows, but better safe than sorry!
		if ( empty( $post_id ) )
			return $retval;

		if ( $this->user_can_moderate() ) {

			$post_status = bbp_get_topic_status( $post_id );
			$post_type = get_post_type( $post_id );
			$bbpress_version = bbp_get_version();
			$version_arr = explode( '-', $bbpress_version );
			$bbpress_version = reset( $version_arr );
			$is_pre_bbpress_2_6 = ( version_compare( '2.6', $bbpress_version ) <= 0 ) ? true : false;

			if ( 'spam' != $post_status && 'pending' == $post_status && ! $is_pre_bbpress_2_6 ) {

				$url = add_query_arg( array(
					$post_type . '_id' => $post_id,
					'action' => $this->plugin_slug . '-approve',
				));

				$nonce_url = wp_nonce_url( $url, 'moderator_action', $this->plugin_slug . '-wp_nonce' );
				array_push( $r['links'], '<a href="' . $nonce_url . '" class="bbp-reply-edit-link">' . __( '审核通过', $this->plugin_slug ) . '</a>' );

			} else if ( 'spam' != $post_status && 'pending' != $post_status && ! $is_pre_bbpress_2_6 ) {

				$url = add_query_arg( array(
					$post_type . '_id' => $post_id,
					'action' => $this->plugin_slug . '-remove',
				));

				$nonce_url = wp_nonce_url( $url, 'moderator_action', $this->plugin_slug . '-wp_nonce' );
				array_push( $r['links'], '<a href="' . $nonce_url . '" class="bbp-reply-edit-link">' . __( '审核不通过', $this->plugin_slug ) . '</a>' );

			}

		}

		if ( is_user_logged_in() && get_option( '_bbp_report_post' ) ) {

			array_push( $r['links'],
				'<a href="#" class="bbp-report-link bbp-report-link-' . $post_id . '" data-post-id="' . $post_id . '">' . __( 'Report', $this->plugin_slug ) . '</a>
				<span class="bbp-report-type">
					<select class="bbp-report-select" data-post-id="' . $post_id . '">
					<option>' . __( 'Report reason' ) . '</option>
					<option>' . __( 'Spam' ) . '</option>
					<option>' . __( 'Advertising' ) . '</option>
					<option>' . __( 'Harassment' ) . '</option>
					<option>' . __( 'Inappropriate content' ) . '</option>
					</select>
				</span>'
			);

		}

		$links  = implode( $r['sep'], array_filter( $r['links'] ) );
		$retval = $r['before'] . $links . $r['after'];

		return $retval;

	}

}

bbPressModToolsPlugin_bbPress::init();
