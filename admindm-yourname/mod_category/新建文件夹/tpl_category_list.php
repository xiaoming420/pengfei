<?php
/*
	power by JASON.ZHANG  DM建站  www.demososo.com
*/
if(!defined('IN_DEMOSOSO')) {
	exit('this is wrong page,please back to homepage');
}
?>

 <div class="contenttop">
  <a href="<?php echo $jumpv?>&file=mainadd&act=add"><i class="fa fa-plus-circle"></i> 添加主分类 </a>
</div>

 
<div class="box"> 
<div class="boxheader">
<h3><i class="fa fa-list" aria-hidden="true"></i> 管理列表 </h3>
</div>
<div class="boxcontent">
<?php
$k = 'node';
$sql = "SELECT * from ".TABLE_CATE." where   modtype='$k' and pid='0'   $andlangbh  order by pos desc,pidname desc,id desc";
$rowlist = getall($sql);
 if($rowlist=='no') echo $norr2;
 else{

?>
<form method=post action="<?php echo $jumpv;?>&act=pos">
<table class="formtab formtabhovertr">
<tr class="trheader">
<td width="10%">排序</td>
 <td >名称</td>
<td align="center" >管理内容</td>
<td align="center">操作</td>
 
</tr>
<?php
	foreach($rowlist as $v){
	$tidmain = $v['id'];
	$pidnamemain = $v['pidname']; $jsname = jsdelname($v['name']);
	$alias = alias($pidnamemain ,'cate');	 
	if($alias=='') echo $alias='<br />请修改别名'.$pidnamemain;
	 
		if($catid==$pidnamemain)
			$cat_cur='class="cur" ';
		else  $cat_cur='';
$link='   <a style="font-weight:normal" title="访问此分类网址" href="'.$userurl.$alias.'.html" target="_blank">'.$alias.'</a> <i class="fa fa-external-link-square" aria-hidden="true"></i>';
		//echo '<li><a '.$cat_cur.' href="'.$jumpv.'&catid='.$pidname.'">'.decode($v['name']).'('.$nianji2.')</a><br />标识:'.$pidname.'<br />别名:'.$alias.$link.'</li>';
	


 
$editmain = '<a class="but1"  href="'.$jumpv.'&catid='.$pidnamemain.'&file=mainedit&act=edit"><span><i class="fa fa-pencil-square-o"></i> 修改</span></a>';
$delmain =  "<a class='but2'  href=javascript:del('delmaincate','$pidnamemain','$jumpv_back','$jsname')><span><i class='fa fa-trash-o'></i> 删除</span></a>";

$glnode= '<a class="but3" target="_blank"  href="../mod_node/mod_node.php?lang='.LANG.'&catpid='.$pidnamemain.'&page=0"><span><i class="fa fa-folder"></i> 内容</span></a>';

 

 ?>   
 
<tr>
<td align="center"><input type="text" name="<?php echo $tidmain;?>"  value="<?php echo $v['pos'];?>" size="3" /></td>
 <td> 
<?php 
	echo '<a '.$cat_cur.' href="'.$jumpv.'&file=sublist&catid='.$pidnamemain.'"><strong style="font-size:18px">'.decode($v['name']).'</strong></a><br />标识:'.$pidnamemain.'<br /> ';

	if($k<>'blockdh') echo $link;
?>
  </td>
   <td  align="center"><?php echo $glnode;?></td>
  <td  align="center"><?php echo $editmain.$delmain;?></td>
   
</tr>

<?php 
} 
?>
</table>

<div style="padding-bottom:22px">
<input class="mysubmit mysubmitsm" type="submit" name="Submit" value="排序" />
<br />
<?php echo $sort_ads?></div>
</form>
<?php }?>

</div> 
</div>  <!--end box--> 





