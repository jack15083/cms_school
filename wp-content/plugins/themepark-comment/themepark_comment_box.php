<?php 
$themepark_comment_box =
array(


	"themepark_comment_box" => array(
        "name" => "themepark_comment_box",
        "std" => "",
        "title" => "相册模式"),


"themepark_comment_box_show" => array(
        "name" => "themepark_comment_box_show",
        "std" => "",
        "title" => "是否显示留言"),
		

"themepark_comment_code" => array(
        "name" => "themepark_comment_code",
        "std" => "",
        "title" => "独立文章设置表单"),		

);
function themepark_comment_box() {
    global $post, $themepark_comment_box;
  
       
	    $meta_box_value2 = get_post_meta($post->ID,"themepark_comment_box", true);
		$meta_box_value3 = get_post_meta($post->ID,"themepark_comment_box_show", true);
		$meta_box_value4 = get_post_meta($post->ID,"themepark_comment_code", true);
	
       
        if($meta_box_value == "")
            $meta_box_value = $meta_box['std'];
			

	 
	  
	  
      echo '<input type="hidden" name="themepark_comment_box_noncename" id="themepark_comment_box_noncename" value="'.wp_create_nonce( plugin_basename(__FILE__) ).'" />';
	  echo '<input type="hidden" name="themepark_comment_box_show_noncename" id="themepark_comment_box_show_noncename" value="'.wp_create_nonce( plugin_basename(__FILE__) ).'" />';
	  	  echo '<input type="hidden" name="themepark_comment_code_noncename" id="themepark_comment_code_noncename" value="'.wp_create_nonce( plugin_basename(__FILE__) ).'" />';
	  
	
	     if (!function_exists( 'shoppbox_plugincss' ) ){  	
	  ?>
      <em>选择使用超级留言板的选项，即可替换掉默认的评论</em><br />

      <select name="themepark_comment_box" id="themepark_comment_box">
	        
			 <option value=''<?php if ( $meta_box_value2 == '' ) {echo "selected='selected'";}?>>默认WordPress评论</option>
             <option value='modle1'<?php if ( $meta_box_value2 == 'modle1') {echo "selected='selected'";}?>>超级留言板表单</option>
           


	</select><br />

    
     <label>填写表单代码</label>
     <textarea style="width:100%;" name="themepark_comment_code" id="themepark_comment_code" ><?php echo stripslashes($meta_box_value4); ?></textarea>
    <em>现在你可以在每一篇文章都创建不同的表单，若需要创建不同的表单，可以将表单代码填写在上面<a target="_blank" href="http://www.themepark.com.cn/wordpressbdcjcjlyb105bba.html">创建独立表单教程</a></em>
  <?php }else{ ?>
   <em>检测到您的使用了插件<strong>购物盒子1.40</strong>，您可以对任意文章独立创建您的表单，教程<a target="_blank" href="http://www.themepark.com.cn/gwhz140kfxzgwcbdhplkhspsxgn.html">创建独立表单教程</a></em>
   <label>填写表单代码在下方选项</label>
     <textarea style="width:100%;" name="themepark_comment_box" id="themepark_comment_box" ><?php echo stripslashes($meta_box_value2); ?></textarea>
   
   
    <em>如果你想要这篇文章的评论只作为一个搜集信息的表单而不将他们显示在页面上，可以在此处选择不显示</em>
      <select name="themepark_comment_box_show" id="themepark_comment_box_show">
	        
			 <option value=''<?php if ( $meta_box_value3 == '' ) {echo "selected='selected'";}?>>只显示评论</option>
             <option value='showall'<?php if ( $meta_box_value3 == 'showall' ) {echo "selected='selected'";}?>>显示评论和额外的选项</option>
             <option value='noshow'<?php if ( $meta_box_value3 == 'modle1') {echo "selected='selected'";}?>>不显示评论</option>
           


	</select>
   
  <?php } ?>
   
     

    
    
      
      <?php   
 }

function create_meta_box_themepark_comment() {
    global $theme_name;
  
    if ( function_exists('add_meta_box') ) {
        add_meta_box( 'themepark_comment_box', '超级留言板选项', 'themepark_comment_box', 'post', 'side', 'high' );
		 add_meta_box( 'themepark_comment_box', '超级留言板选项', 'themepark_comment_box', 'page', 'side', 'high' );
    }
}

function save_postdata_themepark_comment( $post_id ) {
    global $post, $themepark_comment_box;
  
    foreach($themepark_comment_box as $meta_box) {
        if ( !wp_verify_nonce( $_POST[$meta_box['name'].'_noncename'], plugin_basename(__FILE__) ))  {
            return $post_id;
        }
  
        if ( 'page' == $_POST['post_type'] ) {
            if ( !current_user_can( 'edit_page', $post_id ))
                return $post_id;
        }
        else {
            if ( !current_user_can( 'edit_post', $post_id ))
                return $post_id;
        }
  
        $data = $_POST[$meta_box['name']];
  
        if(get_post_meta($post_id, $meta_box['name']) == "")
            add_post_meta($post_id, $meta_box['name'], $data, true);
        elseif($data != get_post_meta($post_id, $meta_box['name'], true))
            update_post_meta($post_id, $meta_box['name'], $data);
        elseif($data == "")
            delete_post_meta($post_id, $meta_box['name'], get_post_meta($post_id, $meta_box['name'], true));
    }
}
add_action('admin_menu', 'create_meta_box_themepark_comment');
add_action('save_post', 'save_postdata_themepark_comment');

?>
