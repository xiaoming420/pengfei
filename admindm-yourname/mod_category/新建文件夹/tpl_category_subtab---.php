 
 
 <?php 
 
 $edit_subedit_cur=  $edit_subalias_cur= $edit_sublayoutlist_cur= $edit_sublayoutdetail_cur='';
 if($file=='subedit') $edit_subedit_cur = ' active';
  if($file=='subalias') $edit_subalias_cur = ' active';
  if($file=='sublayoutlist') $edit_sublayoutlist_cur = ' active';
 if($file=='sublayoutdetail') $edit_sublayoutdetail_cur = ' active';

 
?>

<ul  class="nav nav-tabs" style="padding-left:15px;padding-right:15px">

<li class="<?php echo $edit_subedit_cur;?>">
 <a   href="<?php echo $jumpv_tid;?>&file=subedit&act=edit">修改分类</a>
</li>

<li class="<?php echo $edit_subalias_cur;?>">
 <a   href="<?php echo $jumpv_tid;?>&file=subalias&act=edit">修改别名</a>
</li>

<li class="<?php echo $edit_sublayoutlist_cur;?>">
 <a   href="<?php echo $jumpv_tid;?>&file=sublayoutlist&act=edit">子分类列表布局</a>
</li>

<li class="<?php echo $edit_sublayoutdetail_cur;?>">
 <a   href="<?php echo $jumpv_tid;?>&file=sublayoutdetail&act=edit">子分类详情页布局</a>
</li>



</ul>

 
