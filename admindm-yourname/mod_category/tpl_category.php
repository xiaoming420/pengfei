<?php
/*
	power by JASON.ZHANG  DM建站  www.demososo.com
*/
if(!defined('IN_DEMOSOSO')) {
	exit('this is wrong page,please back to homepage');
}
?>

 <?php 

if($file=='list')  require_once HERE_ROOT.'mod_category/tpl_category_list.php'; 
else if($file=='add')  require_once HERE_ROOT.'mod_category/tpl_category_add.php'; 
else{
 
?>


 <?php 
 
   

 $edit_edit_cur=  $edit_alias_cur= $edit_can_cur= $edit_field_cur='';
 if($file=='edit') $edit_edit_cur = ' active';
 if($file=='can') $edit_can_cur = ' active';
  if($file=='alias') $edit_alias_cur = ' active'; 
 if($file=='field') $edit_field_cur = ' active';
 
?>
<div class="contenttoptop por">
<div class="nodeeditrgtop">
	 
	<span class="cp editmenuother cirbtn">编辑其他 &#8595; </span>
	 
 </div> 


<div  class="menutab" style="padding-left:15px;padding-right:15px">

 <a class="<?php echo $edit_edit_cur;?>"  href="<?php echo $jumpvcatid;?>&file=edit&act=edit"><span>修改主类</span></a>
  <a class="<?php echo $edit_can_cur;?>"  href="<?php echo $jumpvcatid;?>&file=can&act=edit"><span>修改参数</span></a>
 
</div>

</div> 

<div class="editmenuother_cnt">
<?php
 require_once('plugin_maincate_edit.php');
?>
</div><!--end editmenuother_cnt-->
  

<?php
	 if($file=='edit')  require_once HERE_ROOT.'mod_category/tpl_category_edit.php'; 
	 if($file=='can')  require_once HERE_ROOT.'mod_category/tpl_category_editcan.php'; 



	  if($file=='alias'){  
				 $framesrc='../mod_module/mod_alias.php?pid='.$catid.'&lang='.LANG.'&type=cate&file=edit';
				 //alias type only cate,not csub.
				iframepage($framesrc);				 
				}

	 if($file=='field'){	  
	 		 $framesrc='../mod_field/mod_field.php?pid='.$catid.'&lang='.LANG.'&type=cate';
			 iframepage($framesrc);
	  }







} 
 ?>
