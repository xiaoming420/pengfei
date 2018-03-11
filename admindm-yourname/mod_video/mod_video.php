<?php
/*	欢迎使用DM企业建站系统，本系统由www.demososo.com开发。
*/
$mod_previ = 'normal';//default is admin,and set in common.inc
$mod_previ_except = 'y';
require_once '../config_a/common.inc2010.php';
require_once HERE_ROOT.'config_a/func.previ.php';//when normal,require is here.

 //----
$arr =  array("node", "page","block");  
if(!in_array($type,$arr))  {
   echo 'type is wrong';
  exit;
}

if($type=='block'){
    if($pid<>'block')  { echo 'error,pid and type is block need unify.';exit; }
}
else{
   
  if($type=='node') ifhaspidname(TABLE_NODE,$pid);
  if($type=='page') ifhaspidname(TABLE_PAGE,$pid);
  
}
 



if($type=='page') $tabletemp = TABLE_PAGE;
else $tabletemp = TABLE_NODE;

if($act2=='fronteditjump---------'){  //from func_block.php
 
 
$linkback = 'mod_video.php?lang='.LANG.'&pid=block&type=block&act2=&act=edit&pidname='.$pidname;
if($type<>'block') {
    $sql="select id  from  ".$tabletemp."  where  videoid='$pidname'  $andlangbh order by  id desc";
   // echo $sql;exit;
    $row=getrow($sql);
    $tid = $row['id'];

    //mod_page/mod_page_edit.php?lang=cn&tid=6&file=edit_album&act=edit

    if($type=='page')   $linkback = '../mod_page/mod_page_edit.php?lang=cn&tid='.$tid.'&file=edit_video&act=edit';
    else   $linkback = '../mod_node/mod_node_edit.php?lang=cn&tid='.$tid.'&file=editvideo&act=list';
    
  }
  jump($linkback);
}


//---update videoid

  $sql="select pidname from  ".TABLE_VIDEO."  where  pid='$pid' and type='$type' $andlangbh order by id desc limit 1";
  //echo $sql;
  if(getnum($sql)>0){
      $row=getrow($sql);
      $videoid = $row['pidname'];    
  }
  else{ $videoid ='';  }

    $ss = "update " . $tabletemp. " set videoid='$videoid'  where pidname='$pid'  $andlangbh limit 1";
    iquery($ss);
    
//--------end update videoid---------



ifhave_lang(LANG);//TEST if have lang,if no ,then jump
if($act <> "pos") zb_insert($_POST);
//
$jumpv='mod_video.php?lang='.LANG.'&pid='.$pid.'&type='.$type.'&act2='.$act2;
$jumpv_file=$jumpv.'&file='.$file;
$addlink = '<a href="'.$jumpv.'&act=add"><i class="fa fa-plus-circle"></i> 添加视频区块</a>';

 

//----------
if($act == "pos")
{
    foreach ($_POST as $k=>$v){
         $ss = "update ".TABLE_VIDEO." set  pos='$v' where id='$k'  $andlangbh  limit 1";
         iquery($ss);
        }
      jump($jumpv);
}

if($act == "sta_block")
{
     $ss = "update ".TABLE_VIDEO." set sta_visible='$v' where id=$tid $andlangbh limit 1";
     iquery($ss);
    jump($jumpv);
}


if($act == "del_block")
{
     $sqlsub = "SELECT * from ".TABLE_VIDEO."  where id='$tid' $andlangbh order by id limit 1";
   //echo $sqledit;exit;
$rowsub = getrow($sqlsub);
$imgsqlname = $rowsub['kv'];
$pidname = $rowsub['pidname'];


   // $ifdel1 = ifcandel_field(TABLE_IMGFJ,'pid',$pidname,'eq','编辑器里有图片。请先删除。',$jumpvpage);
   //bec editor img is common...
    //if($ifdel1){
     if($imgsqlname<>'')  p2030_delimg($imgsqlname,'y','n');
        ifsuredel_field(TABLE_VIDEO,'pidname',$pidname,'eq',$jumpv);
    //}

}




$title=$title1='视频区块管理';
$title2='';
if($act<>'list'){
   $title1='<a href="'.$jumpv.'" style="font-size:18px">视频区块管理</a>';
    if($act=='add') $title2=' - 添加';
    else $title2=' - 修改';

}


if($act2=='headless'){
require_once HERE_ROOT.'mod_common/tpl_header_iframe.php';
}
else  require_once HERE_ROOT.'mod_common/tpl_header.php';

?>



<section class="content" style="min-height:350px">

 
<?php
      if($act=='list'){
      ?>
      <div class="contenttop">    
       <?php
              echo $addlink;
            ?>
      </div>
    <?php
    }
    ?>

 
 <section class="content-header">

      <h1>  <?php
            echo $title1.$title2
      ?> </h1>
</section>
 <?php
 if($act2=='headless'){
   ?>
   <a class="fr but2 iframeparentlink" target="_blank" href="#">弹出链接</a>

  <a class="fr but1" target="_blank" href="<?php echo $adminurl;?>">后台首页</a>



   <?php
 }
 ?>

<?php

if($act=='' || $act=='list')  require_once HERE_ROOT.'mod_video/tpl_video_list.php';
else  require_once HERE_ROOT.'mod_video/tpl_video_addedit.php';
?>
<div class="c"></div>

</section>

<?php
if($act2=='headless'){
  require_once HERE_ROOT.'mod_common/tpl_footer_iframe.php';
  }
  else
require_once HERE_ROOT.'mod_common/tpl_footer.php';

?>
