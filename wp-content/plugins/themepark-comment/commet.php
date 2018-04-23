<?php       $word_t17=get_option('mytheme_word_t17');
			$word_t18=get_option('mytheme_word_t18');
			$word_t19=get_option('mytheme_word_t19');
			$word_t20=get_option('mytheme_word_t20');
			$word_t21=get_option('mytheme_word_t21');
			$word_t22=get_option('mytheme_word_t22'); ?>

<div class="themepark_commont" id="themepark_commont">
<b class="themepark_comment_title"><?php echo get_option('themepark_comment_title'); ?></b>
	<form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">
			<div class="liuy3">
                <div class="liuy2"><?php if($word_t17!=""){echo $word_t17;}else{echo '姓名';}  ?></div>
				<input type="text" name="author" id="author" value="<?php echo esc_attr($comment_author); ?>" size="28" tabindex="1" <?php if ($req) echo "aria-required='true'"; ?> />
			</div>
			<div class="liuy3">
                <div class="liuy2"><?php if($word_t19!=""){echo $word_t19;}else{echo '邮箱 ';}  ?></div>
				<input type="text" name="email" id="email" value="<?php echo esc_attr($comment_author_email); ?>" size="28" tabindex="2" <?php if ($req) echo "aria-required='true'"; ?> />
			</div>

	<?php
	$id = get_the_ID();
	if(get_post_meta($id, 'themepark_comment_code', true) ){
$themepark_comment_code_d =get_post_meta($id, 'themepark_comment_code', true); }else{
	
	$themepark_comment_code_d = get_option('themepark_comment_code');}
	
	       if($themepark_comment_code_d){
		   $arraylist=explode("\r\n",$themepark_comment_code_d); 
	
	 foreach ($arraylist as $a)
                     {
						 $arraylist3=  explode("|",$a); 
						  $arraylist4=  explode(",",$arraylist3[3]);    
					
							
							$tap.= '<div class="liuy3"> <div class="liuy2">'.$arraylist3[1].'</div>' ;
							
							if($arraylist3[0]=="select"){$tap.= '<select id="'.$arraylist3[2].'" name="'.$arraylist3[2].'">'; 
	                               for($i=0;$i<count($arraylist4);$i++)  {
									  $tap.='<option value ="'.$arraylist4[$i].'" >'.$arraylist4[$i].'</option>' ;
									  }
							$tap.= '</select>';
							}  elseif($arraylist3[0]=="radio"){
								for($i=0;$i<count($arraylist4);$i++) 
                                  {
									  $tap.='  <input type="radio" class="themepark_radio" name="'.$arraylist3[2].'" value="'.$arraylist4[$i].'" id="radio'.$i.'" />'.$arraylist4[$i].'</label>' ;
									  }
								
								}
								elseif($arraylist3[0]=="datetimepicker"){
								for($i=0;$i<count($arraylist4);$i++) 
                                  {
									  $tap.=' <input type="text" name="'.$arraylist3[2].'" id="datetimepicker"  class="datetimepicker"value="" size="28" tabindex="2" />' ;
									  }
								
								}
								
								
								else{$tap.= '<input type="text" name="'.$arraylist3[2].'" id="'.$arraylist3[2].'" value="" size="28" tabindex="2" />'; }
							
							 $tap.='</div>'; 
							 
							
							
							
						 }
						
						  echo $tap;
						 
						 } 
	
	
	 ?>
		<div class="liuy3">
                <div class="liuy2"><?php if($word_t21!=""){echo $word_t21;}else{echo '留　言:';}  ?></div>
			<textarea name="comment" id="comment" cols="58" rows="10" tabindex="4"></textarea>
		</div>
<input type="hidden" name="redirect_to" value="<?php echo get_permalink(); ?>" />
		<div class="liuy3">
          <div class="liuy2"></div>
			<input name="submit" type="submit" id="submit" tabindex="5" value="<?php if($word_t22!=""){echo $word_t22;}else{echo '提  交';}  ?>" />
			<?php comment_id_fields(); ?>
		</div>
        <div class="liuy3">
          <div class="liuy2"></div>
				<p><a class="themepark" target="_blank" href="http://www.themepark.com.cn/">THEMEPARK</a></p>
		
		</div>
        <?php if(trim($_GET['commentys'])){ ?>
        <script>
        alert('提交成功');
        </script>
	
		<?php } do_action('comment_form', $post->ID); ?>

	</form>
    <link rel="stylesheet" href="<?php  echo plugins_url( 'jquery.datetimepicker.css' , __FILE__ ); ?>" type="text/css" />
  <script type='text/javascript' src='<?php  echo plugins_url( 'jquery.datetimepicker.js' , __FILE__ ); ?>'></script>  
    <script>
     $(function(){
$(".datetimepicker").datetimepicker({
  format:'Y年m月d日',
  timepicker:false
 });

});
    </script>
    </div>