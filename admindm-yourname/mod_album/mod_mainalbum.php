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
  if($pid<>'all'){
    if($pid<>'block')  { echo 'error,pid and type is block need unify.';exit; }
  }
}
else{

if($type=='node') ifhaspidname(TABLE_NODE,$pid);
if($type=='page') ifhaspidname(TABLE_PAGE,$pid);

}




//---update albumid
/* 
  $sql="select pidname from  ".TABLE_ALBUM."  where  pid='$pid' and type='$type' $andlangbh order by id desc limit 1";
  //echo $sql;
  if(getnum($sql)>0){
      $row=getrow($sql);
      $albumid = $row['pidname'];    
  }
  else{ $albumid ='';  }

    $ss = "update " . $tabletemp. " set albumid='$albumid'  where pidname='$pid'  $andlangbh limit 1";
    iquery($ss);
 */   
//--------end update albumid---------


ifhave_lang(LANG);//TEST if have lang,if no ,then jump
if($act <> "pos") zb_insert($_POST);
//---------------------- 

$jumpv='mod_mainalbum.php?lang='.LANG.'&pid='.$pid.'&type='.$type.'&act2='.$act2;
$jumpvgl='mod_album.php?lang='.LANG.'&pid='.$pid.'&type='.$type.'&act2='.$act2;
 
$addlink =  '<a href="'.$jumpv.'&act=add"><i class="fa fa-plus-circle"></i> 添加相册区块</a>'; 
//-----------

//----------
if($act == "pos")
{
    foreach ($_POST as $k=>$v){
         $ss = "update ".TABLE_ALBUM." set  pos='$v' where id='$k'  $andlangbh  limit 1";
         iquery($ss);
        }
      jump($jumpv);
}

if($act == "sta_block")
{ 
     $ss = "update ".TABLE_ALBUM." set sta_visible='$v' where id=$tid $andlangbh limit 1";   
     iquery($ss);
    jump($jumpv); 
}


if($act == "del_block")
{ 
    
  $ifdel1 =  ifcandel_field(TABLE_ALBUM,'pid',$pidname,'equal','出错，相册里还有图片，请先删除图片！',$jumpv);
  

   ifsuredel_field(TABLE_ALBUM,'pidname',$pidname,'eq',$jumpv);
  
  
}



//-----------



$title=$title1='相册区块管理'; 
$title2='';
if($act<>'list'){
   $title1='<a href="'.$jumpv.'" style="font-size:18px">相册区块管理</a>';
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
 
if($act=='' || $act=='list')  require_once HERE_ROOT.'mod_album/tpl_mainalbum_list.php';
else  require_once HERE_ROOT.'mod_album/tpl_mainalbum_addedit.php';  
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