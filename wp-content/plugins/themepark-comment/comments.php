<?php       $word_t17=get_option('mytheme_word_t17');
			$word_t18=get_option('mytheme_word_t18');
			$word_t19=get_option('mytheme_word_t19');
			$word_t20=get_option('mytheme_word_t20');
			$word_t21=get_option('mytheme_word_t21');
			$word_t22=get_option('mytheme_word_t22');
			$shop_login = get_option('shop_login');
 $shop_register = get_option('shop_register');	
			
			?>

	

	<?php if ( is_user_logged_in() ) : ?>
<?php  $current_user = wp_get_current_user();
       $user_id =$current_user->ID;
	   $bbs_post_avatar=get_option('bbs_post_avatar');
 if( get_usermeta($user_id,'qq_user_avatar')){ $avatar_bbs_avatar ='<img width="50"  height="50"src="'. get_usermeta($user_id ,'qq_user_avatar').'" alt="'.$author_name.'"/>';}else{$avatar_bbs_avatar ='<img width="50"  height="50" src="'.$bbs_post_avatar.'" alt="'.$author_name.'"/>';}  
?>
	<form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">
				<input  type="hidden" name="author" id="author" value="<?php echo get_usermeta($user_id,'nickname'); ?>" size="28" tabindex="1" <?php if ($req) echo "aria-required='true'"; ?> />
				<input type="hidden" name="email" id="email" value="<?php echo $current_user->user_email; ?>" size="28" tabindex="2" <?php if ($req) echo "aria-required='true'"; ?> />
		
        
        <div class="comment_ector">
           <div class="tutle"><a class="avatar_comment"><?php echo  $avatar_bbs_avatar; ?></a><b><?php echo get_usermeta($user_id,'nickname') ?></b><span><?php include(dirname(__FILE__) . '/smiley.php'); ?></span></div>
           <textarea name="comment" id="comment_bbs" cols="58" rows="4" tabindex="4"></textarea>
           
           
		</div>

		<div class="liuy3">
			<input name="submit" type="submit" id="submit" tabindex="5" value="<?php if($word_t22!=""){echo $word_t22;}else{echo '提  交';}  ?>" />
			<?php comment_id_fields(); ?>
		</div>
		
		<?php do_action('comment_form', $post->ID); ?>

	</form>

	<?php else : ?>
    <p>请<a href="<?php echo get_page_link( $shop_login ); ?>" class="login">登陆</a>后在此回帖，如果还没有账号请 <a href="<?php  echo get_page_link( $shop_register );?>">创建一个账号</a>！</p>
	<?php endif; ?>
	


