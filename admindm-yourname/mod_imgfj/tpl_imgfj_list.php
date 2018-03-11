<?php
/*
	power by JASON.ZHANG  DM建站  www.demososo.com
*/
if(!defined('IN_DEMOSOSO')) {
	exit('this is wrong page,please back to homepage');
}
?>


 
<h4 class="h2tit_biao"><i class="fa fa-list"></i>  <?php echo $title;?></h4>
 <p style="padding:5px;display:none"><span class="cred">(提示：在IE下，点击框里一下即已复制其内容。)</span><p>
<?php if($act=="list"){
//$maxline=50;
  
$sqlall = "SELECT * from ".TABLE_IMGFJ." where pid='$pid' and (pidstylebh='$curstyle' or pidstylebh='y')  $andlangbh order by pidstylebh,id desc";
	 $rowall = getall($sqlall);
	 //echo $sqlall; 
 /*begin page roll*/	 
	 /*
	  $num_rows = get_numrows($sql);
     if($num_rows>0){
         $offset=5;
        $page_total=ceil($num_rows/$maxline);
        if (!isset($page)||($page<=0)) $page=1;
        if($page>$page_total) $page=$page_total;
        $start=($page-1)*$maxline;

        $sql="$sql  limit $start,$maxline";
        $rowlist = getall($sql);

     }  */
 
//-----------

if($rowall=='no') {
  echo '<p style="padding:99px">暂无内容</p>';
}
    else {
	
 ?>

<table class="formtab">
  <tr>

    <td >
   
  <?php
 foreach($rowall as $v){
$tid = $v['id'];$title = $v['title'];
$imgsmall = $v['kv'];
$dateedit = $v['dateedit'];
$pid= $v['pid'];
$pidstylebh= $v['pidstylebh'];
 
 
$imgsmall_big=UPLOADPATHIMAGE.$imgsmall;
$imgsmall2 = p2030_imgyt($imgsmall,'y','n');
 //
//menu_changesta($v['sta_visible'],$PHP_SELF,$tid,$catid,$page);
//edit_text= p20_edit_text('修改',$PHP_SELF,$tid,$catid,$page); 
 
$edit_text='<a class="but1" href="'.$jumpv.'&file=edit&act=edit&tid='.$tid.'">修改</a>';
$del_text= "<a href=javascript:delimg('delimg','$tid','$imgsmall','$jumpv')  class='but2'>删除</a>";
		  
if($pid=='name') $namefj='名称附件';
else $namefj='编辑器附件';

 
 $stylev='';
if($pidstylebh=='y') {
  $namefj ='[公共] '.$namefj;
  $stylev=' style="color:blue;font-size:12px" ';
}


?>
<ul class="ulimgfj">
 <li class="title" <?php echo $stylev;?>><?php echo $namefj;?></li>
  <li  class="title"><?php echo $title;?></li>
 <li style="height:100px"><?php echo $imgsmall2;?></li>
  <li><?php echo $edit_text.' | '.$del_text;?></li>
   <li>
    <?php if($pid=='name'){?>
    <span class="cred">复制框里内容：</span>
    <input style="background:#C2E8FF" onclick="this.select();document.execCommand('Copy');" type="text" value="<?php echo $imgsmall?>" class="form-control" /><br />
    <?php }else{ ?>
    复制框里内容：
    <input onclick="this.select();document.execCommand('Copy');" type="text" value="<?php echo $imgsmall_big?>" class="form-control" />
        <?php } ?> </li>

</ul>

<?php

    } //end foreach
	
	?> 
	
	<div class="c"></div> </td></tr>
</table>

 
 
<?php 
}
}
 
?>
