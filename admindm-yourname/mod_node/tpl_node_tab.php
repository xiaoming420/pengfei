
<?php
/*
  power by JASON.ZHANG  DM建站  www.demososo.com
*/
if(!defined('IN_DEMOSOSO')) {
  exit('this is wrong page,please back to homepage');
}
//----------
//$sqlalbum = "SELECT id from ".TABLE_ALBUM." where pid='$pidname' $andlangbh order by id desc";//$pidname is in pro-modnews.php 
//$num_album = '有 <span class="cred">'.getnum($sqlalbum).'</span>个';
/*
$sqltab = "SELECT id from ".TABLE_BLOCK." where pid='$pidname' and type='tab' and typefrom='node' $andlangbh order by id desc";
$num_tab = '有 <span class="cred">'.getnum($sqltab).'</span>个';

$sqlaccord = "SELECT id from ".TABLE_BLOCK." where pid='$pidname' and type='accord' and typefrom='node' $andlangbh order by id desc";
$num_accord = '有 <span class="cred">'.getnum($sqlaccord).'</span>个';
*/ 
$sqlimgfj = "SELECT id from ".TABLE_IMGFJ."  where pid='$pidname' $andlangbh order by id desc";
$num_imgfj = '有 <span class="cred">'.getnum($sqlimgfj).'</span>个';


?> 
<div class="contenttoptop por">

<div class="fr nodeeditrgtop">
<a style="float:right;color:#999;font-size:16px" target="_blank" href="<?php echo $userurl.$url;?>">前台预览：<?php echo $texturl?> <i class="fa fa-external-link-square"></i>   <?php if($alias_jump<>'') echo '(跳转)';?></a> 

 
<div class="fr" style="margin-right:30px">
<span class="cp editmenuother cirbtn">编辑其他 &#8595; </span>
</div><!--end fr-->
 
</div> 

<div class="menutab">
<?php  

 $editcan_cur= $editalias_cur= $editfield_cur=  $edittag_cur=  $editdesp_cur= $editalbum_cur= $editother_cur='';
 


if($file=="editalias")   $editalias_cur=' active';
 elseif($file=="editfield")   $editfield_cur=' active';
  elseif($file=="edittag")   $edittag_cur=' active';
 elseif($file=="editkv")   $editkv_cur=' active';
 elseif($file=="editkvsm")   $editkvsm_cur=' active';
 elseif($file=="editdesp")   $editdesp_cur=' active';
 elseif($file=="editalbum")   $editalbum_cur=' active';
 
 elseif($file=="editcan")   $editother_cur=' active';
 

echo '<a class="bg22'.$editdesp_cur.'" href="'.$jumpv.'&act=list&file=editdesp"><span>修改内容</span></a>';
echo '<a class="bg22'.$editother_cur.'" href="'.$jumpv.'&act=edit&file=editcan"><span>修改参数</span></a>';

 
 
if($sta_tag=='y')
 echo '<a class="bg22'.$edittag_cur.'" href="'.$jumpv.'&act=list&file=edittag"><span>标签管理</span></a>';


//echo '<a class="bg22'.$editkv_cur.'" href="'.$jumpv.'&act=list&file=editkv"><span>修改kv图片</span></a>';

//echo '<a class="bg22'.$editkvsm_cur.'" href="'.$jumpv.'&act=list&file=editkvsm"><span>修改缩略图片</span></a>';



//echo '<a class="bg22'.$editalbum_cur.'" href="'.$jumpv.'&act=list&file=editalbum"><span>内容相册管理</span></a>';
//echo '<a class="bg22'.$editvideo_cur.'" href="'.$jumpv.'&act=list&file=editvideo"><span>视频管理</span></a>';

?>
 
 
</div>

</div>


<div class="editmenuother_cnt">
<?php
 require_once('plugin_node_list_edit.php');
?>
</div><!--end editmenuother_cnt-->

 

