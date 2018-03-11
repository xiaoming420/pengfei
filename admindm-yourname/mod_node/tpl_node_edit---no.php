<?php
/*
	power by JASON.ZHANG  DM建站  www.demososo.com
*/
if(!defined('IN_DEMOSOSO')) {
	exit('this is wrong page,please back to homepage');
}
//----------
$sqlalbum = "SELECT id from ".TABLE_ALBUM." where pid='$pidname' $andlangbh order by id desc";//$pidname is in pro-modnews.php 
$num_album = '有 <span class="cred">'.getnum($sqlalbum).'</span>个';
/*
$sqltab = "SELECT id from ".TABLE_BLOCK." where pid='$pidname' and type='tab' and typefrom='node' $andlangbh order by id desc";
$num_tab = '有 <span class="cred">'.getnum($sqltab).'</span>个';

$sqlaccord = "SELECT id from ".TABLE_BLOCK." where pid='$pidname' and type='accord' and typefrom='node' $andlangbh order by id desc";
$num_accord = '有 <span class="cred">'.getnum($sqlaccord).'</span>个';
*/ 
$sqlimgfj = "SELECT id from ".TABLE_IMGFJ."  where pid='$pidname' $andlangbh order by id desc";
$num_imgfj = '有 <span class="cred">'.getnum($sqlimgfj).'</span>个';


?> 

<div class="menusub" style="margin-top:22px;">


<a style="float:right;color:#999;font-size:16px" target="_blank" href="<?php echo $userurl.$url;?>">前台预览<?php echo $url?> > <?php if($alias_jump<>'') echo '(跳转)';?></a> 

 <span class="fr">&nbsp;&nbsp;&nbsp; | &nbsp;&nbsp;</span>
<a style="float:right;color:red;font-size:16px" href="mod_node.php?lang=<?php echo LANG?>&catpid=<?php echo $catpid?>&catid=<?php echo $pid?>">< 返回内容列表</a>


<div class="fr" style="margin-right:30px">
<span class="cp editmenuother cirbtn">编辑其他 &#8595; </span>
</div><!--end fr-->


<?php  
echo '<a class="bg22'.$editdesp_cur.'" href="'.$jumpv.'&act=list&file=editdesp"><span  class="bg22" >修改内容</span></a>';
//echo '<a class="bg22'.$editcan_cur.'" href="'.$jumpv.'&act=list&file=editcan"><span  class="bg22" >修改标题等属性</span></a>';

echo '<a class="bg22'.$editalias_cur.'" href="'.$jumpv.'&act=list&file=editalias"><span  class="bg22" >修改别名</span></a>';
if($sta_field=='y')
 echo '<a class="bg22'.$editfield_cur.'" href="'.$jumpv.'&act=list&file=editfield"><span  class="bg22" >字段属性管理</span></a>';

//echo '<a class="bg22'.$editkv_cur.'" href="'.$jumpv.'&act=list&file=editkv"><span  class="bg22" >修改kv图片</span></a>';

//echo '<a class="bg22'.$editkvsm_cur.'" href="'.$jumpv.'&act=list&file=editkvsm"><span  class="bg22" >修改缩略图片</span></a>';



echo '<a class="bg22'.$editalbum_cur.'" href="'.$jumpv.'&act=list&file=editalbum"><span  class="bg22" >内容相册管理('.$num_album.')</span></a>';
echo '<a class="bg22'.$editvideo_cur.'" href="'.$jumpv.'&act=list&file=editvideo"><span  class="bg22" >视频管理</span></a>';

//echo '<a class="bg22'.$edittab_cur.'" href="'.$jumpv.'&act=list&file=edittab"><span  class="bg22" >Tab选项('.$num_tab.')</span></a>';

//echo '<a class="bg22'.$editalbum_cur.'" href="'.$jumpv.'&act=list&file=editaccord"><span  class="bg22" >手风琴选项('.$num_accord.')</span></a>';


?>
 
 

</div>
 <div style="padding:20px;"> 


<div class="editmenuother_cnt">
<?php
 require_once('plugin_node_list_edit.php');
?>
</div><!--end editmenuother_cnt-->

 




 <?php 
 if($file=='editalbum'){
 $framesrc='../mod_album/mod_album.php?pid='.$pidname.'&lang='.LANG.'&type=node';
 echo '<Iframe name="tt" src="'.$framesrc.'" width="100%" height="1000" scrolling="no" frameborder="0"></iframe>';
  }
 elseif($file=='edittab'){
 $framesrc='../mod_tab/mod_tab.php?pid='.$pidname.'&lang='.LANG.'&type=tab&typefrom=node';
 echo '<Iframe name="tt" src="'.$framesrc.'" width="100%" height="1100" scrolling="no" frameborder="0"></iframe>';
  }
  elseif($file=='editaccord'){
 $framesrc='../mod_tab/mod_tab.php?pid='.$pidname.'&lang='.LANG.'&type=accord&typefrom=node';
 echo '<Iframe name="tt" src="'.$framesrc.'" width="100%" height="1100" scrolling="no" frameborder="0"></iframe>';
  }
 elseif($file=='editfield'){
 $framesrc='../mod_field/mod_fieldvalue.php?pid='.$pidname.'&catpid='.$catpid.'&lang='.LANG.'&type=cate';
 echo '<Iframe name="tt" src="'.$framesrc.'" width="100%" height="1000" scrolling="no" frameborder="0"></iframe>';
  }
  elseif($file=='editalias'){
 $framesrc='../mod_module/mod_alias.php?pid='.$pidname.'&lang='.LANG.'&type=node';
 echo '<Iframe name="tt" src="'.$framesrc.'" width="100%" height="600" scrolling="no" frameborder="0"></iframe>';
  }
  
  else{  
 require_once HERE_ROOT.'mod_node/tpl_node_'.$file.'.php';
}
 ?>
 </div> 
 <div style="height:50px"> </div>
 
 