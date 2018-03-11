<?php
/*  欢迎使用DM企业建站系统，本系统由www.demososo.com开发。
*/
require_once '../config_a/common.inc2010.php';
//
 if($act <> "pos") zb_insert($_POST);
 
if($pidname<>'') {ifhaspidname(TABLE_BLOCK,$pidname);}

if($tid<>'') {ifhasid(TABLE_BLOCK,$tid);}

if($type<>''){
  $typearr =  array("custom", "node", "blockdh");  
  if(!in_array($type,$typearr))   {echo 'type is error.';exit;}
}


/*
if (!in_array($type,$arr_group_type))
  {
  echo "error,type:".$type.' not exist...... in array:arr_group_type' ;
  exit;
  }
*/

 
//ifhaspidname(TABLE_NODE,$pid);
//ifhaspidname(TABLE_CATE,$catpid);
ifhave_lang(LANG);//TEST if have lang,if no ,then jump
 
 
$jumpv='mod_block.php?lang='.LANG;
$jumpvp=$jumpv.'&pidname='.$pidname;
$jumpvt=$jumpv.'&type='.$type;
$jumpvpt=$jumpvp.'&type='.$type;  
 

 $title = '区块管理';

$title2='';


if($type=='custom')  $title2 = ' - 自定义区块';
else if($type=='node')  $title2 = ' - 分类区块';
else if($type=='blockdh')  $title2 = ' - 效果区块';
//else if($type=='video')  $title2 = ' - 视频区块';


//----------
if($act == "pos")
{
    foreach ($_POST as $k=>$v){
         $ss = "update ".TABLE_BLOCK." set  pos='$v' where id='$k'  $andlangbh  limit 1";
         iquery($ss);
        }
      jump($jumpvt);
}
 
if($act == "sta_block")
{ 
     $ss = "update ".TABLE_BLOCK." set sta_visible='$v' where id=$tid $andlangbh limit 1";   
     iquery($ss);
    jump($jumpvt); 
}

 

if($act == "del_block")
{ 

  $sqlsub = "SELECT * from ".TABLE_BLOCK."  where id='$tid' $andlangbh order by id limit 1";
   //echo $sqledit;exit;
$rowsub = getrow($sqlsub);
$imgsqlname = $rowsub['kv'];
$pidname = $rowsub['pidname'];

if($type='blockdh'){
  $sqlsub = "SELECT id from ".TABLE_NODE."  where pid='$pidname' and ppid='blockdh' $andlangbh order by id limit 1";
  if(getnum($sqlsub)>0){
    alert('有区块内容，请先删除');
    jump($jumpvt);
    exit;
  }

 }

   // $ifdel1 = ifcandel_field(TABLE_IMGFJ,'pid',$pidname,'eq','编辑器里有图片。请先删除。',$jumpvpage);
   //bec editor img is common...
    //if($ifdel1){
      if($imgsqlname<>'')  p2030_delimg($imgsqlname,'y','y');
       ifsuredel_field(TABLE_BLOCK,'pidname',$pidname,'eq',$jumpvt);
    //}
  
}

//-----------

require_once HERE_ROOT.'mod_common/tpl_header.php';
//$pidfolder = '';
//if($pidname<>'') $pidfolder = get_field(TABLE_BLOCK,'pidfolder',$pidname,'pidname');
 
?>

 
<section class="content-header">
   
      <h1><?php echo $title?> 
      <span style="font-size:14px"> <?php echo $title2;?></span></h1>
</section>
  <div style="padding-left:10px">
 <?php 
//echo $stylename;
?>
</div>
 <section class="content">  

 
<div class="contenttop">
  <?php 
    if($type<>'') echo '<a href="'.$jumpv.'&type='.$type.'&act=add"><i class="fa fa-plus-circle"></i> 添加区块 '.$title2.'</a>';
  ?>
</div>

<?php 

 require_once HERE_ROOT.'mod_block/tpl_block.php';
 ?>
 </section>
<?php
require_once HERE_ROOT.'mod_common/tpl_footer.php';
?>


