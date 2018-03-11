<?php
/*
  欢迎使用DM企业建站系统，本系统由www.demososo.com开发。
  
*/

require_once '../config_a/common.inc2010.php';

ifhave_lang(LANG);//TEST if have lang,if no ,then jump
if($tid<>'' || $tid==0) {ifhasid(TABLE_PAGE,$tid);}

if($act <> "pos") zb_insert($_POST);
/********************************************/
$jumpvpage='mod_page.php?lang='.LANG;

$jumpv='mod_page_edit.php?lang='.LANG.'&tid='.$tid;
$jumpv_file=$jumpv.'&file='.$file; 
$jumpv_back = $jumpv_file.'&act=edit'; 
/************************/

//------------------------
 
 $ss = "select * from ".TABLE_PAGE." where id='$tid' $andlangbh limit 1"; 
  $row = getrow($ss);
  if($row=='no'){alert('出错,不存在的ID!');echo $backlist;exit;   } 
  $name=$row['name'];    $jsname = jsdelname($name);
  $pidname=$row['pidname'];  $videoid=$row['videoid']; $albumid=$row['albumid'];
  $pageurl=getlink($pidname,'page','admin');
  $regionid =$row['regionid'];
  //pre($row);

 $name=decode($name);//seo_decode
 $title = '修改单页面 - ' .$name;
 

//-------
 $sslay = "select * from ".TABLE_LAYOUT." where pid='$pidname' and pidstylebh='$curstyle'  $andlangbh limit 1"; 
 //echo $sslay;
 $rowlay = getrow($sslay); 
 
if($rowlay=='no') {$content = $contenttop = $contentbot = '';}
else {
	$content = $rowlay['content'];
	$contenttop = $rowlay['contenttop'];
	$contentbot = $rowlay['contentbot'];
 }
 

  //---
  $text_1='修改成功后，请在单页面管理 刷新后可看到效果。';
 $vtext_intro='<br />(中英文参考代码:<input type="text" style="background:#ccc;padding:3px;border:1px solid #666" value="<span>关于我们</span><span class=en>About us</span>" size="58" />) ';

//----
if($act == "delpage")
{ 
// $ss = "select id from ".TABLE_CATE." where pidname='$pidname' $andlangbh limit 1"; 
 //if(getnum($ss)>0) {alert('出错，不能在这里删除分类菜单');jump($jumpvmenu);}
  
  //$ifdel1 = ifcandel(TABLE_PAGE,$pidname,'出错，有子菜单，请删除它的子菜单！',$jumpvmenu);// back is fail 

  $ifdel1 = ifcandel(TABLE_ALBUM,$pidname,'出错，有相册。请先删除。！',$jumpvpage);// back is fail 
  $ifdel2 = ifcandel(TABLE_IMGFJ,$pidname,'出错，编辑器附件里有图片。请先删除。！',$jumpvpage);// back is fail 
 if($ifdel1 and $ifdel2) {
	ifsuredel(TABLE_PAGE,$pidname,'noback');
	ifsuredel_field(TABLE_ALIAS,'pid',$pidname,'eq','noback');
	ifsuredel_field(TABLE_LAYOUT,'pid',$pidname,'eq',$jumpvpage);
	//ifcandel_bypid(TABLE_ALIAS,$pidname,'noback');	
	//ifcandel_bypid(TABLE_LAYOUT,$pidname,$jumpvpage);
 }
 	  
}



if($act == "delvideo")
{ 
  
   //update videoid in page table
   $ss = "update " . TABLE_PAGE . " set videoid=''  where id='$tid'  $andlangbh limit 1"; 
    iquery($ss); 

    //del video
    //$pidname use value from above ,in selec from page...,so use pid=page pidname
    $sqlsub = "SELECT * from ".TABLE_VIDEO."  where pid='$pidname' and type='page' $andlangbh order by id limit 1";
     //echo $sqlsub;exit;
    $rowsub = getrow($sqlsub);
    $imgsqlname = $rowsub['kv'];
    $pidname = $rowsub['pidname'];
 
       
      if($imgsqlname<>'')  p2030_delimg($imgsqlname,'y','n');
        ifsuredel_field(TABLE_VIDEO,'pidname',$pidname,'eq',$jumpv_back);
     

 }



 //----
 require_once HERE_ROOT.'mod_common/tpl_header.php';

?>

<section class="content-header">
     
      <ol class="breadcrumb">
        <li><?php echo $breadfaicon?>         
        <a href="../mod_page/mod_page.php?lang=<?php echo LANG?>">单页面管理</a> </li>
        

      </ol>
      <h1><?php echo $title?></h1>
</section>
  
 <?php 
  if($content<>''){echo '<p class="f14bgred">由于本页面 布局的默认内容 调用了'.check_blockid($content).'（请到布局里检查。），所以这里的内容不会在前台显示。</p>';}
  
   ?>

 <section class="content">  
     <div class="contenttoptop">
     	 <?php   
            require_once HERE_ROOT.'mod_page/tpl_page_tab.php';
        ?>
     </div>

     <?php 

 

if($file=='edit_buju---'){
	$framesrc='../mod_layout/mod_layout.php?pid='.$pidname.'&lang='.LANG.'&type=page';
	iframepage($framesrc);
}
  
 else if($file=='edit_album--'){	
   //mod_album/mod_mainalbum.php?lang=cn&type=block
   $framesrc='../mod_album/mod_mainalbum.php?pid='.$pidname.'&lang='.LANG.'&type=page&act2=headless';   
    //echo $framesrc;
    iframepage($framesrc);

 } 
  else if($file=='edit_video---'){ 
   //mod_album/mod_mainalbum.php?lang=cn&type=block
   $framesrc='../mod_video/mod_video.php?pid='.$pidname.'&lang='.LANG.'&type=page&act2=headless';   
    //echo $framesrc;
    iframepage($framesrc);

 } 

 
else if($file=='edit_alias---'){
   $framesrc='../mod_module/mod_alias.php?pid='.$pidname.'&lang='.LANG.'&type=page&file=edit';
	iframepage($framesrc);
}

 
else   require_once HERE_ROOT.'mod_page/tpl_page_'.$file.'.php';

?>
 </section>
<?php
require_once HERE_ROOT.'mod_common/tpl_footer.php';
?>



