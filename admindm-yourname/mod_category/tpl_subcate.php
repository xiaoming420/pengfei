<?php
/*
	power by JASON.ZHANG  DM建站  www.demososo.com
*/
if(!defined('IN_DEMOSOSO')) {
	exit('this is wrong page,please back to homepage');
}
?>

 <?php 

if($file=='list')  require_once HERE_ROOT.'mod_category/tpl_subcate_list.php'; 
else if($file=='add')  require_once HERE_ROOT.'mod_category/tpl_subcate_add.php'; 
else if($file=='move')  require_once HERE_ROOT.'mod_category/tpl_subcate_move.php'; 
else {
 ?>

 <div class="layoutsidebar fl col-xs-12 col-sm-12  col-md-2">
 
     <?php  require_once HERE_ROOT.'mod_category/tpl_subcate_sidebar.php'; ?>

</div>

 <div class="fl col-xs-12 col-sm-12  col-md-10">


 <?php 
 
 $edit_subedit_cur=  $edit_subalias_cur=  '';
 if($file=='edit') $edit_subedit_cur = ' active';
  if($file=='alias') $edit_subalias_cur = ' active';
  
 
?>

<ul  class="nav nav-tabs" style="padding-left:15px;padding-right:15px">

<li class="<?php echo $edit_subedit_cur;?>">
 <a   href="<?php echo $jumpv;?>&file=edit&pidname=<?php echo $pidname;?>&act=edit">修改分类</a>
</li>

 
 


</ul>



    <?php  
      if($file=='edit') require_once HERE_ROOT.'mod_category/tpl_subcate_rg_edit.php'; 
      
       if($file=='alias') {  
 $framesrc='../mod_module/mod_alias.php?pid='.$pidname.'&lang='.LANG.'&type=cate&file=edit';
 //alias type only cate,not csub.
iframepage($framesrc);
 
}

    ?>
 </div>


<div class="c"> </div>

<?php 
}
?>
