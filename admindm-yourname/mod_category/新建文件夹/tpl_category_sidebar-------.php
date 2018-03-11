<?php
/*
	power by JASON.ZHANG  DM建站  www.demososo.com
*/
if(!defined('IN_DEMOSOSO')) {
	exit('this is wrong page,please back to homepage');
}
?>

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
<form method=post action="<?php echo $jumpvpf;?>&act=pos">
<table class="formtab">
<tr class="trheader">
<td width="10%">排序</td> <td width="88%">名称</td>
</tr>
<?php
	foreach($rowlist as $v){
	$tidmain = $v['id'];
	$pidnameleft = $v['pidname'];
	$alias = alias($pidnameleft ,'cate');	 
	if($alias=='') echo $alias='<br />请修改别名'.$pidnameleft;
	 
		if($catid==$pidnameleft)
			$cat_cur='class="cur" ';
		else  $cat_cur='';
$link=' | <a style="font-weight:normal" title="访问此分类网址" href="'.$userurl.$alias.'.html" target="_blank"><i class="fa fa-external-link-square" aria-hidden="true"></i></a>';
		//echo '<li><a '.$cat_cur.' href="'.$jumpv.'&catid='.$pidname.'">'.decode($v['name']).'('.$nianji2.')</a><br />标识:'.$pidname.'<br />别名:'.$alias.$link.'</li>';
	
 ?>

<tr>
<td align="center"><input type="text" name="<?php echo $tidmain;?>"  value="<?php echo $v['pos'];?>" size="3" /></td>
 <td> 
<?php 
	echo '<a '.$cat_cur.' href="'.$jumpv.'&catid='.$pidnameleft.'"><strong>'.decode($v['name']).'</strong></a><br />标识:'.$pidnameleft.'<br />别名:'.$alias;

	if($k<>'blockdh') echo $link;
?>
  </td>
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





