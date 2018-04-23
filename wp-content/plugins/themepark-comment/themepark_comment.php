<?php
/*
Plugin Name:超级留言板
Plugin slug :themepark-comment
Plugin URI:http://www.themepark.com.cn
Description:这是WEB主题公园所开发的一款自定义表单插件，这款插件可以替换掉主题的默认评论，修改为自定义的提交表单，插件本身不产生WordPress的表，是调用的WordPress默认的评论数据，所以如果你使用了这个插件，就无法在你的主题中显示评论了，这适用于一些不需要评论的企业网站，你可以通过插件所提供的选项轻松创建一个很棒的表单来替换你的留言板。
Version: 1.06
Author: WEB主题公园
Author URI: http://www.themepark.com.cn
*/

/* plugin-update-checker */

require 'plugin-updates/plugin-update-checker.php';
$MyUpdateChecker = new PluginUpdateChecker(
    'http://www.themepark.com.cn/upthemes_themepark/themepark_comment/info.json',
    __FILE__,
    'themepark_comment'
);
 if (!function_exists( 'shoppbox_plugincss' ) ) {	
add_filter('comments_template', 'themepark_comments');
function themepark_comments() {
$id =get_the_ID(); 
if(get_post_meta($id,"themepark_comment_box", true)==="modle1"){
       
	   
	    return plugin_dir_path(__FILE__). '/commet.php';
       
		}else if( get_post_meta($id,"bbs_shoppingbox", true)=="yes"){
			
			 return plugin_dir_path(__FILE__). '/comments.php';
			
			}
}
}

add_action('admin_menu', 'themepark_comment');


function themepark_comment() {
	if(function_exists('add_menu_page')) {
		add_menu_page('themepark_comment', '超级留言板', 'administrator', plugin_dir_path(__FILE__).'/themepark_comment_settings.php', '', plugins_url('themepark_comment.png', __FILE__ ));
	}
	
}
add_action('comment_post_redirect', 'redirect_to_page_themepark');
function redirect_to_page_themepark() {
$locations = empty($_POST['redirect_to']) ? get_comment_link($comment_id) : $_POST['redirect_to'];

$pos = strpos($locations, "?");
if   ($pos   ===   false)  {wp_safe_redirect( $locations."?commentys=yes" );}else{wp_safe_redirect( $locations."&commentys=yes" );}


}
add_action('wp_insert_comment','wp_insert_tel',10,2);
function wp_insert_tel($comment_ID,$commmentdata) {
	
	
		$post_id_c=get_comment($comment_ID, ARRAY_A);
		$post_id=$post_id_c['comment_post_ID'];
		
		if(get_post_meta($post_id,'themepark_comment_code', true)){
		$themepark_comment_code_d = get_post_meta($post_id,'themepark_comment_code', true);
		}else{
			
			$themepark_comment_code_d = get_option('themepark_comment_code');
			
			}
		
	
	$arraylist=explode("\r\n",$themepark_comment_code_d); 
		 for($i=0;$i<count($arraylist);$i++) 
                     {
                             $arraylist3=  explode("|",$arraylist[$i]); 
							
							 if(isset($_POST[$arraylist3[2]])){ $themepark_c .= '<strong style="margin-right:10px">'.$arraylist3[1].':</strong>'. $_POST[$arraylist3[2]].'<br>' ;}
                             
					   }
					    update_comment_meta($comment_ID,"thempark_commont",$themepark_c);
						

  
}

add_filter( 'manage_edit-comments_columns', 'my_comments_columns_t' );
add_action( 'manage_comments_custom_column', 'output_my_comments_columns_t', 10, 2 );
function my_comments_columns_t( $columns ){
	  $columns[ 'thempark_commont' ] = __( '超级留言板' );        //电话是代表列的名字

	    return $columns;
   
}

function  output_my_comments_columns_t( $column_name, $comment_id ){
 switch( $column_name ) {

	    case "thempark_commont" :

	    echo get_comment_meta( $comment_id, 'thempark_commont', true );

	    break;
  }
  

   
}
						
 if (!function_exists( 'shoppbox_plugincss' ) ) {				
	function themepark_commont_style(){
		
		$themepark_commont_style=get_option('themepark_commont_style');
         if($themepark_commont_style){
			 
			  echo  ' <style id="themepark_commont_style" type="text/css">'. stripslashes(get_option('themepark_commont_style')).' </style>'; 
			 }
		}				   
	add_action( 'wp_head', 'themepark_commont_style');			

	
	
function themepark_commont_style_ded() {  
$themepark_comment_d   = get_option('themepark_comment');
if ( !is_admin()){
 
  
if($themepark_comment_d){ 
   wp_register_style( 'themepark_commont_style', plugins_url( 'css/themepark_commont_style.css' , __FILE__ ) ); 
   wp_enqueue_style( 'themepark_commont_style' );  
    }  }  }
	
add_action( 'init', 'themepark_commont_style_ded' );
	}


include('themepark_comment_box.php');

function themepark_comment_post_form() {
$id = get_the_ID();
if(get_post_meta($id, 'themepark_comment_code', true)){
$themepark_comment_code_d =get_post_meta($id, 'themepark_comment_code', true);}else{
$themepark_comment_code_d =get_post_meta($id, 'themepark_comment_box', true);}
	       if($themepark_comment_code_d){
		   $arraylist=split("\n",$themepark_comment_code_d); 
	$tap.='<b class="themepark_comment_title">'. get_option('themepark_comment_title').'</b>';
	 foreach ($arraylist as $a)
                     {
						 $arraylist3=  split("\|",$a); 
						  $arraylist4=  split(",",$arraylist3[3]);    
					
							
							$tap.= '<label>'.$arraylist3[1].'' ;
							
							if($arraylist3[0]=="select"){$tap.= '<select id="'.$arraylist3[2].'" name="'.$arraylist3[2].'">'; 
	                               for($i=0;$i<count($arraylist4);$i++)  {
									  $tap.='<option value ="'.$arraylist4[$i].'" >'.$arraylist4[$i].'</option>' ;
									  }
							$tap.= '</select>';
							}  elseif($arraylist3[0]=="radio"){
								for($i=0;$i<count($arraylist4);$i++) 
                                  {
									  $tap.='  <input type="radio" class="themepark_radio" name="'.$arraylist3[2].'" value="'.$arraylist4[$i].'" id="radio'.$i.'" />'.$arraylist4[$i] ;
									  }
								
								}
								elseif($arraylist3[0]=="datetimepicker"){
								for($i=0;$i<count($arraylist4);$i++) 
                                  {
									  $tap.=' <input type="text" name="'.$arraylist3[2].'" id="datetimepicker"  class="datetimepicker"value="" size="28" tabindex="2" />' ;
									  }
								
								}
								
								else{$tap.= '<input type="text" name="'.$arraylist3[2].'" id="'.$arraylist3[2].'" value="" size="28" tabindex="2" />'; }
							
							 $tap.='</label>'; 
							 
							
							
							
						 }
						$tap.='<div class="bottom_mageis_box"> </div>';
						  echo $tap;
						 
						 }  } 


?>