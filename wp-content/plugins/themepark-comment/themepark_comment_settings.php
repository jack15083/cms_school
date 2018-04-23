<?php

$base_name = plugin_basename( __FILE__ );
$base_page = 'admin.php?page='.$base_name;
$themepark_comment_d   = get_option('themepark_comment');
$themepark_comment_code_d = get_option('themepark_comment_code');
$themepark_commont_style=get_option('themepark_commont_style');
$themepark_comment_title=get_option('themepark_comment_title');

if($_POST['Submit3']) {
	$themepark_comment=trim($_POST['themepark_comment']);
	update_option('themepark_comment', $themepark_comment );
	
	$themepark_comment_title=trim($_POST['themepark_comment_title']);
	update_option('themepark_comment_title', $themepark_comment_title );
	
		$themepark_commont_style=trim($_POST['themepark_commont_style']);
	update_option('themepark_commont_style', $themepark_commont_style );
	}

if($_POST['Submit2']) {
	$themepark_comment_codeb=trim($_POST['themepark_comment_codeb']);
	update_option('themepark_comment_code', $themepark_comment_codeb );
	}

if($_POST['Submit']) {
	$themepark_comment   = trim($_POST['themepark_comment']);
	$themepark_comment_code  = trim($_POST['themepark_comment_code1']).'|'. trim($_POST['themepark_comment_code2'])."|". trim($_POST['themepark_comment_code3'])."|". trim($_POST['themepark_comment_code4']);

	if($themepark_comment_code_d){
   $themepark_comment_codes= $themepark_comment_code_d ."\n". $themepark_comment_code ;}
   else{ $themepark_comment_codes=  $themepark_comment_code ;}
	$update_ali_queries = array();
	$update_ali_text    = array();
	
	$update_ali_queries[] = update_option('themepark_comment_code', $themepark_comment_codes );


	$update_ali_text[] = '创建表单';
	
	$i = 0;
	$text = '';
	foreach($update_ali_queries as $update_ali_query) {
		if($update_ali_query) {
			$text .= '<font color="green">'.$update_ali_text[$i].' 更新成功！</font><br />';
		}
		$i++;
	}
	if(empty($text)) {
		$text = '<font color="red">您对设置没有做出任何改动...</font>';
	}

}

?>
<div class="wrap">

<?php if(!empty($text)) { echo '<!-- Last Action --><div id="message" class="updated fade"><p>'.$text.'</p></div>'; } ?>
 
               

<form method="post" action="<?php echo admin_url('admin.php?page='.plugin_basename(__FILE__)); ?>" style="width:70%;float:left;">

	
        <h3>超级留言板设置</h3>
  <div id="message" class="updated fade"><p>WEB主题公园所出品的一款将WordPress原生留言板改造成一个自定义表单的插件，注意使用了这个插件之后，你需要在页面或者文章内的选项中选择使用超级留言板的功能，这样就会替换掉WordPress默认的评论，添加的表单内容可以在后台——评论中查看。<a href=" http://www.themepark.com.cn/shoppingbox-WordPress-plugins" target="_blank">[弹出]不清楚怎么使用？ 查看WEB主题公园提供的视频教程，手把手教你如何使用</a></p><br />
<a target="_blank" href="http://www.themepark.com.cn/">WEB主题公园有更多有趣的插件和主题，你可以访问WEB主题公园的官方网站来了解，WEB主题公园所开发的插件可以应用在我们所有出品的主题上，有着比较好的优化和兼容，你可以去下载使用，祝你愉快！</a></div>    
        <table class="form-table">
          
       
    
    
    
    
     <tr>
                <td valign="top" width="200px"><strong>表单模式</strong><br />
                </td>
                <td>
                 <select id="themepark_comment_code1" name="themepark_comment_code1">
                  <option value ="text" >单行文本框</option>
                  <option value ="select" >下拉菜单（选项请用英文输入法的逗号隔开）</option>
                   <option value ="radio" >单选框（选项请用英文输入法的逗号隔开）</option>
                     <option value ="datetimepicker" >时间选择器</option>
                   
               
                </select>
                </td>
            </tr>
    
      <tr>
                <td valign="top" width="200px"><strong>表单项目名称（中英文均可，如：电话号码）</strong><br />
                </td>
                <td>
                 <input type="text" size="60"  name="themepark_comment_code2" id="themepark_comment_code2" value=""/>
                </td>
            </tr>
    
    
    
      <tr>
                <td valign="top" width="200px"><strong>表单项目别名（必须为英文，并且不可重复，如：tell）</strong><br />
                </td>
                <td>
               <input type="text" size="60"  name="themepark_comment_code3" id="themepark_comment_code3" value=""/> 
                </td>
            </tr>
    
    
      <tr>
                <td valign="top" width="200px"><strong>表单项目选项（如果你选择了下拉选项、复选或者单选，请填写你的条件在这里，以英文输入法的逗号分隔）</strong><br />
                </td>
                <td>
                <textarea name="themepark_comment_code4" cols="60" rows="3" id="themepark_comment_code4"><?php echo stripslashes(get_option('themepark_comment_code4')); ?></textarea> 
                </td>
            </tr>
    
    
    
    
    
    
            
    </table>
        <br /> <br />
        <table> <tr>
        <td><p class="submit">
            <input type="submit" name="Submit" value="保存设置" class="button-primary"/>
            </p>
        </td>

        </tr> </table>
        
    
        
        

</form>

 <form method="post" action="<?php echo admin_url('admin.php?page='.plugin_basename(__FILE__)); ?>" style="width:70%;float:left;">
<table>

<tr>
	
      <tr>
        
        <td>
        <p>请注意保存的按钮是保存不同的内容的，请注意区分=========================================</p>      
           
        </td>

        </tr>
        
       
        
 <tr>
	
      <tr>
         <td valign="top" width="200px"><strong>调整顺序，这里你可以看到你所创建的表单类型，你可以通过剪切复制来调整他们的上下位置。</strong><br />
                </td>
        <td>
              <textarea name="themepark_comment_codeb" cols="86" rows="4" id="themepark_comment_codeb"><?php echo stripslashes(get_option('themepark_comment_code')); ?></textarea>    
           
        </td>

        </tr>
     <tr>
        <td><p class="submit">
            <input type="submit" name="Submit2" value="保存顺序" class="button-primary"/>
            </p>
        </td>

        </tr>
        </table>
   </form>
   
   
   
   <form method="post" action="<?php echo admin_url('admin.php?page='.plugin_basename(__FILE__)); ?>" style="width:70%;float:left;">
<table>

<tr>
	
      <tr>
        
        <td>
        <p>请注意保存的按钮是保存不同的内容的，请注意区分=========================================</p>      
           
        </td>

        </tr>
        
        <tr>
                <td valign="top" width="200px"><strong>表单标题（中英文均可，如：顾客提交申请）</strong><br />
                </td>
                <td>
                 <input type="text" size="60"  name="themepark_comment_title" id="themepark_comment_title" value="<?php echo $themepark_comment_title ?>"/>
                </td>
            </tr>
        
        
           <tr>
                <td valign="top" width="200px"><strong>开启超级留言板的样式表</strong><br />
                </td>
                <td>
                  <select id="themepark_comment" name="themepark_comment">
                  <option value ="" <?php if($themepark_comment_d =='') echo 'selected="selected"';?>>关闭WEB主题公园提供的样式</option>
                  <option value ="open" <?php if($themepark_comment_d =='open') echo 'selected="selected"';?>>开启WEB主题公园提供的样式</option>
               
                </select>
                <p><strong>开启这个选项，我们所编写的表单样式将会在你的网站上生效，让表单变得更美观，如果你自己懂一些前端css样式编写，你也可以在下面的选项中输入你自己所写的样式，保存之后就会生效。</strong></p>
                </td>
            </tr>
   
            
 <tr>
	
      <tr>
         <td valign="top" width="200px"><strong>表单样式自定义。</strong><br />
                </td>
        <td>
              <textarea name="themepark_commont_style" cols="86" rows="4" id="themepark_commont_style"><?php echo stripslashes(get_option('themepark_commont_style')); ?></textarea>    
           <p>在此处输入css样式即可在网站上生效，如.liuy3{color:#fff}，我们给你预留了最外层的id，你可以通过id（#id）的方式覆盖默认的样式</p>
        </td>

        </tr>
     <tr>
        <td><p class="submit">
            <input type="submit" name="Submit3" value="保存样式" class="button-primary"/>
            </p>
        </td>

        </tr>
        </table>
   </form>