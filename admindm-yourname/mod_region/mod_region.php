<?php
/*	欢迎使用DM企业建站系统，本系统由www.demososo.com开发。
*/
require_once '../config_a/common.inc2010.php';

ifhave_lang(LANG);//TEST if have lang,if no ,then jump

 
if($pidname<>'') {ifhaspidname(TABLE_REGION,$pidname);}
 

if($pid<>'') {ifhasrecord(TABLE_REGION,$pid,'pidname','no pid');}
else{echo 'need pid';exit;}

if(is_numeric($tid)) {   ifhasid(TABLE_REGION,$tid);}




 if($act <> "pos") zb_insert($_POST);



if($file=='') $file='list';
$filearr =  array("list", "add","editcan","editcfg","move");  
if(!in_array($file,$filearr))   {echo 'file is error.';exit;}


 

$jumpv='../mod_region/mod_region.php?lang='.LANG.'&pid='.$pid;
 
$jumpvf=$jumpv.'&file='.$file;
$jumpvp=$jumpv.'&pidname='.$pidname;
$jumpvpf=$jumpvf.'&pidname='.$pidname;

 

$jumpvp_edit =  '../mod_region/mod_region_edit.php?lang='.LANG;
//------------------
 
    $nameparent = get_field(TABLE_REGION,'name',$pid,'pidname');

    $nameparentLink ='<a href="../mod_region/mod_region.php?lang=cn&pid='.$pid.'">'.$nameparent.'</a>';

if($tid<>'') $tidname = get_field(TABLE_REGION,'name',$tid,'id');

$title2='';
 if($file=='add')    $title2 =' - 添加行';
 else if($file=='editcan')  $title2 =' - '.$tidname.' - <span>修改参数</span>';
 else if($file=='editcfg')  $title2 =' - '.$tidname.' - <span>修改样式</span>';
  else if($file=='move')  $title2 =' - 复制';
 
  $title =$nameparent;

//---
if($act == "sta")
{
     $ss = "update ".TABLE_REGION." set sta_visible='$v' where id=$tid $andlangbh limit 1";
	// echo $ss;exit;
    iquery($ss);
    jump($jumpv); 
}

//-------------
if($act == "pos")
{
    foreach ($_POST as $k=>$v){
         $ss = "update ".TABLE_REGION." set  pos='$v' where id='$k' and pid='$pid'  $andlangbh  limit 1";
         iquery($ss);
        }
      jump($jumpv);
}

 

//-----------------------
if($act == "del")
{ 
  $ifdel1 = ifcandel_field(TABLE_COLUMN,'pid',$pidname,'eq','出错，请先把列删除！',$jumpv);

 //$ifdel1 = ifcandel(TABLE_REGION,$pidname,'区域有区块，请先删除。',$jumpv);// back is fail 
  if($ifdel1) ifsuredel(TABLE_REGION,$pidname,$jumpv);
	  
}

 


//-----------
 
  require_once HERE_ROOT.'mod_common/tpl_header.php'; 
 
?>
<section class="content-header">
     
<h1><?php 
 
$title5 = '页面区域管理';

 if($file<>'list') $title='<a style="font-size:20px" href="'.$jumpv.'">'.$title.'</a>';
 else $title='<a style="font-size:20px" href="../mod_region/mod_mainregion.php?lang='.LANG.'">'.$title5.'</a> - '.$nameparent;

echo $title.$title2 ;
  ?>
    
  </h1>
</section>
  
<div style="padding-left:10px">
 <?php 
   if($type=='style') echo $stylename;
?>
</div>
 
 <section class="content">  

<?php
  if($file=='list'){
?>
  <div class="contenttop">
  <a href="<?php echo $jumpv?>&file=add"><i class="fa fa-plus-circle"></i> 添加行</a>
</div>
<?php
  }
?>
  
        <?php   
           
          require_once HERE_ROOT.'mod_region/tpl_region_'.$file.'.php';
 
        ?>
 </section>
<?php
require_once HERE_ROOT.'mod_common/tpl_footer.php';
?>