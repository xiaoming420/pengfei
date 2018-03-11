<?php
/*	欢迎使用DM企业建站系统，本系统由www.demososo.com开发。
*/
$mod_previ = 'normal';//default is admin,and set in common.inc
$mod_previ_except = 'y';
require_once '../config_a/common.inc2010.php';
require_once HERE_ROOT.'config_a/func.previ.php';//when normal,require is here.
//

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




 ifhaspidname(TABLE_ALBUM,$ppid);
 

ifhave_lang(LANG);//TEST if have lang,if no ,then jump
if($act <> "pos") zb_insert($_POST);
//
$jumpv='mod_album.php?lang='.LANG.'&pid='.$pid.'&ppid='.$ppid.'&type='.$type.'&act2='.$act2;
$jumpv_file=$jumpv.'&file='.$file;
$linkback='mod_mainalbum.php?lang='.LANG.'&pid='.$pid.'&type='.$type.'&act2='.$act2;

$maintid = get_field(TABLE_ALBUM,'id',$ppid,'pidname');

$linkbackedit = '<a href="'.$linkback.'&tid='.$maintid.'&pidname='.$ppid.'&act=edit">编辑</a>';
//-----------

if($type=='page') $tabletemp = TABLE_PAGE;
else $tabletemp = TABLE_NODE;


if($act2=='fronteditjump------'){  //from func_block.php
 
 $linkback = 'mod_album.php?lang='.LANG.'&pid=block&type=block&act2=&ppid='.$ppid;
 if($type<>'block') {
     $pidere = get_field($tabletemp,'pid',$ppid,'pidname');

     $linkback = 'mod_album.php?lang='.LANG.'&pid='.$pidere.'&type='.$type.'&act2=headless&ppid='.$ppid;

   }
   jump($linkback);
 }

 //--------------



 if($act=="pos"){
    foreach ($_POST as $k=>$v){
         $ss = "update ".TABLE_ALBUM." set  pos='$v' where id='$k'  $andlangbh  limit 1";
         iquery($ss);
        }
      jump($jumpv);
}

if($act == "sta_sub")
{
     $ss = "update ".TABLE_ALBUM." set sta_visible='$v' where id=$tid $andlangbh limit 1";
	// echo $ss;exit;
    iquery($ss);
    jump($jumpv);
}



if($act=="delimg"){
p2030_delimg($v,'y','y');//p2030_delimg($addr,$delbig,$delsmall)	  
	$ss = "delete from ".TABLE_ALBUM."  where id=$tid $andlangbh limit 1";
	//echo $ss;exit;
	iquery($ss);
jump($jumpv);
}


//-----------
 
$albumtitle =  get_field(TABLE_ALBUM,'title',$ppid,'pidname').$linkbackedit;
 
 $title=$title1='图片管理';


 $title1 = '<a  style="font-size:18px" href="'.$linkback.'">相册区块管理</a><span style="font-size:16px">('.$albumtitle.')</span>';

 $title2=' - <a  style="font-size:18px"  href="'.$jumpv.'">'.$title.'</a>';


 if($act2=='headless'){
  require_once HERE_ROOT.'mod_common/tpl_header_iframe.php';
  }
  else  require_once HERE_ROOT.'mod_common/tpl_header.php';

?>
 
 
 <section class="content"> 

 <h1>  <?php
            echo $title1.$title2
      ?> </h1>

 
 <div class="contenttop">

 <a class="fr but2 iframeparentlink" target="_blank" href="#">弹出链接</a>
<a class="fr but1" target="_blank" href="<?php echo $adminurl;?>">后台首页</a>
  
 <?php
  if($file=='list'){?>

  <a href="<?php echo $jumpv; ?>&file=add"><i class="fa fa-plus-circle"></i> 添加图片</a>
<?php
  }
  
?>
</div>

<?php 
  require_once HERE_ROOT.'mod_album/tpl_album_'.$file.'.php';
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
