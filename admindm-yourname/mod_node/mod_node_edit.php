<?php
/*	欢迎使用DM企业建站系统，本系统由www.demososo.com开发。
*/
$mod_previ = 'normal';//default is admin,and set in common.inc
require_once '../config_a/common.inc2010.php';
//

ifhave_lang(LANG);//TEST if have lang,if no ,then jump
if($act <> "pos") zb_insert($_POST);
//-----------------------------
$jumpv='mod_node_edit.php?lang='.LANG.'&tid='.$tid;
$jumpv_file=$jumpv.'&file='.$file;



//-----------
 $sql="select * from ".TABLE_NODE." where id='$tid' $andlangbh order by id limit 1";
$row=getrow($sql);
if($row=='no'){alert('出错，没有此内容！');exit;}
else{ 

$title=$row['title'];
$pid=$row['pid'];$videoid=$row['videoid'];
$catpid=$row['ppid']; 
$pidname=$row['pidname'];$alias_jump=$row['alias_jump'];
$kv=$row['kv'];$kvsm=$row['kvsm'];$kvsm2=$row['kvsm2'];
 
ifhaspidname(TABLE_CATE,$pid);

$alias = alias($pidname,'node');
if($alias<>'') $texturl = $alias.'.html';
else $texturl = 'detail-'.$tid.'.html';

$url = url('node',$alias,$tid,$alias_jump);//use for link to fe //not use get_link,bec style of a.

$date=$row['dateday'];
if($date=='') $date= date("Y-m-d");
//---
 $sqlcatmain="select * from ".TABLE_CATE." where pidname='$catpid' $andlangbh order by id limit 1";
$rowcatmain=getrow($sqlcatmain);
$up_w_s=$rowcatmain['sm_w'];
$up_h_s=$rowcatmain['sm_h'];
if($up_w_s>600) $up_w_s=600;elseif($up_w_s<60) $up_w_s=60;
if($up_h_s>600) $up_h_s=600;elseif($up_h_s<60) $up_h_s=60;


$mainarr_can=$rowcatmain['arr_can'];
//$mainarr_can = get_field(TABLE_CATE,'arr_can',$catpid,'pidname');
//get sta_field from cate arr_can
$bscntarr = explode('==#==',$mainarr_can); 
     if(count($bscntarr)>1){
          foreach ($bscntarr as   $bsvalue) {
             if(strpos($bsvalue, ':##')){
               $bsvaluearr = explode(':##',$bsvalue);
               $bsccc = $bsvaluearr[0];
               $$bsccc=$bsvaluearr[1];
             }
          }
      }



//------
}
//---
require_once HERE_ROOT.'config_a/func.previ.php';//when normal,require is here.bec need catpid

/********************************************************/


$maincate = get_field(TABLE_CATE,'name',$catpid,'pidname');
$subcate = get_field(TABLE_CATE,'name',$pid,'pidname');


   
//-------------------------    

$title= '内容修改 - '.$title;
 
/****************************/
//
//$fo_bef='upp/';$fo_now=$imgfo_abm;--put to imgprotect.php
/**
*
*****************************************/


if($act == "sta_node")
{
     $ss = "update ".TABLE_NODE." set sta_visible='$v' where id='$tid' and ppid='$catpid' $andlangbh limit 1";
    iquery($ss);
    jump($jumpv_catid);
}

if($act == "pos")
{
   foreach ($_POST as $k=>$v){
         $ss = "update ".TABLE_NODE." set  pos='$v' where id='$k' and ppid='$catpid' $andlangbh limit 1";
         iquery($ss);
        }
    jump($jumpv_catid);
}

/**/
if($act == "delnode") 
{ 
  //no here
 
}



if($act == "delvideo")
{ 
  
   //update videoid in page table
   $ss = "update " . TABLE_NODE . " set videoid=''  where id='$tid'  $andlangbh limit 1"; 
    iquery($ss); 

    //del video
    //$pidname use value from above ,in selec from page...,so use pid=page pidname
    $sqlsub = "SELECT * from ".TABLE_VIDEO."  where pid='$pidname' and type='node' $andlangbh order by id limit 1";
     //echo $sqlsub;exit;
    $rowsub = getrow($sqlsub);
    $imgsqlname = $rowsub['kv'];
    $pidname = $rowsub['pidname'];
 
       
      if($imgsqlname<>'')  p2030_delimg($imgsqlname,'y','n');
        ifsuredel_field(TABLE_VIDEO,'pidname',$pidname,'eq',$jumpv_file);
     

 }



/*****
****
***
*********************/
 
require_once HERE_ROOT.'mod_common/tpl_header.php'; //tpl_header_img
 
?>

<section class="content-header">
     
      <ol class="breadcrumb">
        <li><?php echo $breadfaicon?>         
        内容修改 </li>
        <li class="active">
        <a href="../mod_node/mod_node.php?lang=<?php echo LANG;?>&catpid=<?php echo $catpid?>&page=0"><?php echo $maincate;?></a>
        </li>

        <?php 
          if($pid<>$catpid) {
        ?>
         <li class="active">
        <a href="../mod_node/mod_node.php?lang=<?php echo LANG;?>&catpid=<?php echo $catpid?>&catid=<?php echo $pid?>&page=0"><?php echo $subcate;?></a>
        </li>
       <?php 
        }
       ?>

      </ol>
      <h1><?php echo $title?></h1>
</section>
  
 
 <section class="content">       
        <?php   
        require_once HERE_ROOT.'mod_node/tpl_node_tab.php';      
       
  if($file=='editalbum---'){
        
        $framesrc='../mod_album/mod_mainalbum.php?pid='.$pidname.'&lang='.LANG.'&type=node&act2=headless'; 
        iframepage($framesrc);
   }
elseif($file=='editvideo--'){
      
        $framesrc='../mod_video/mod_video.php?pid='.$pidname.'&lang='.LANG.'&type=node&act2=headless'; 
        iframepage($framesrc);
   }
 
 elseif($file=='editfield'){
     $framesrc='../mod_field/mod_fieldvalue.php?pid='.$pidname.'&catpid='.$catpid.'&lang='.LANG.'&type=cate';
     iframepage($framesrc);
  }

   elseif($file=='edittag'){
     $framesrc='../mod_tag/mod_tagnode.php?file=addnode&pid='.$pidname.'&catpid='.$catpid.'&lang='.LANG.'&type=cate';
     iframepage($framesrc);
  }

  elseif($file=='editalias---'){
     $framesrc='../mod_module/mod_alias.php?pid='.$pidname.'&lang='.LANG.'&type=node&file=edit';
     iframepage($framesrc);
  }
  
  else{
     require_once HERE_ROOT.'mod_node/tpl_node_'.$file.'.php';
   }
   

        ?>
 </section>
<?php


require_once HERE_ROOT.'mod_common/tpl_footer.php';
 
?>
