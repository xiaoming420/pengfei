<?php
if(!defined('IN_DEMOSOSO')) {
	exit('this is wrong page,please back to homepage');
}
?>
<div class="content <?php echo $contentcss;?>">
	 


<?php  if($contentheader==''){?>

<div class="content_header">
<?php
	 if($sta_bread_posi=='r') require_once DISPLAYROOT.'b_bread.php';
	?>
<h3><?php if($modtype=='page') echo strip_tags($title); else echo '<a href="'.$cur_href.'">'.strip_tags($catetitle).'</a>';?></h3>
</div>
<?php }
else{ //if is hide or other,is hide contheader. or img
	if($contentheader<>'hide'){
			$imgcontheader = UPLOADPATHIMAGE.$contentheader; 
 			echo '<div class="content_headerimg" style="background:url('.$imgcontheader.') no-repeat"> </div>';
 		}
}

 ?>



<?php
	 if($contenttop<>'') {echo '<div class="c contenttop">';
	 block($contenttop);
	 echo '</div>';}
?>

 
<div class="c content_default">
	<?php

if($modtype=='page')  editlink($row_page['id'],'page');//in global.common.php
 //node editlink place detail page,need below title

	 if($content<>'') block($content);	 
	 else {
              if($detailid<>'')  require_once EFFECTROOT.'detail/'.$detailfg.'.php';
              else 
              { 
              		if($modtype=='page')   require_once EFFECTROOT.'detail/detail_page.php';
              		else  require_once DISPLAYROOT.'b_content_list_'.$modtype.'.php';//LIST PAGE
      			}

	 } 
	?>
</div>
	
	 <?php
	 if($contentbot<>'') {echo '<div class="c content_bot">';
	 block($contentbot);
	 echo '</div>';}
	?>
	 
		 
</div><!-- end content -->
		 
		 
