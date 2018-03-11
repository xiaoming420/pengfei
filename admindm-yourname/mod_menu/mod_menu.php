<?php
/*
  欢迎使用DM企业建站系统，本系统由www.demososo.com开发。
  
*/

require_once '../config_a/common.inc2010.php';

ifhave_lang(LANG);//TEST if have lang,if no ,then jump

if($act <> "pos") zb_insert($_POST);

 
if(is_numeric($tid)) {   ifhasid(TABLE_MENU,$tid);}

if($ppid<>'') {ifhaspidname(TABLE_MENU,$ppid);}
else {echo 'sorry,must need ppid';exit;}

if($file=='') $file='list';
$filearr =  array("list", "cateadd", "cusaddedit", "pageadd", "pageedit");  
if(!in_array($file,$filearr))   {echo 'file is error.';exit;}

/********************************************/

$nameparent = get_field(TABLE_MENU,'name',$ppid,'pidname');

$nameparentLink ='<a href="../mod_menu/mod_menu.php?lang=cn&ppid='.$ppid.'">'.$nameparent.'</a>';
 
 if($file=='pageadd')    $title ='添加单页面菜单';
 else if($file=='pageedit')  $title ='修改单页面菜单';
 else if($file=='cateadd')  $title ='添加分类菜单';
  else if($file=='cateedit')  $title ='修改分类菜单';
   else if($file=='cusaddedit'){
        if($act=='add')  $title ='添加其他自定义菜单';
        else $title ='修改其他自定义菜单';
   }   
  
 else  $title =$nameparent;

 
//
/************************/
 
$jumpv='mod_menu.php?ppid='.$ppid.'&lang='.LANG;
$jumpvf='mod_menu.php?ppid='.$ppid.'&lang='.LANG.'&file='.$file;
 

 
 
if($act == "sta_menu")
{ 
     $ss = "update ".TABLE_MENU." set sta_visible='$v' where id=$tid $andlangbh limit 1";	 
     iquery($ss);
    jump($jumpv);
}
if($act == "pos")
{
    foreach ($_POST as $k=>$v){
         $ss = "update ".TABLE_MENU." set  pos='$v' where id='$k'  $andlangbh limit 1";
         iquery($ss);
        }
      jump($jumpv);
}
//-------------------
if($act == "del")
{ 

 //$ifdel1 = ifcandel(TABLE_MENU,$pidname,'出错，有子菜单！',$jumpv);// back is fail 
//if($ifdel1){
 // ifsuredel(TABLE_MENU,$pidname,$jumpv);
  //}
 $ss = "select id from ".TABLE_MENU." where ppid='$ppid' and  pid= '$pidname' $andlangbh limit 1"; 
    $row = getrow($ss);
    if($row=='no'){
         $ss2 = "delete from ".TABLE_MENU."  where ppid='$ppid'  and pidname= '$pidname' $andlangbh limit 1";
     //echo $ss2.'<br />'; 
      iquery($ss2); 
      }
      else {alert('出错，有子菜单！');jump($jumpv); }


	
}

 

require_once HERE_ROOT.'mod_common/tpl_header.php';
?>

<section class="content-header">
     
      <ol class="breadcrumb">
        <li><?php echo $breadfaicon?>         
          <a href="../mod_menu/mod_mainmenu.php?lang=<?php echo LANG?>">菜单管理</a>
        </li>
        <li><?php echo $nameparentLink ;?></li>

      </ol>
      <h1><?php echo $title?></h1>
</section>
  
 
 <section class="content">  

<?php
  if($file=='list')  require_once HERE_ROOT.'mod_menu/tpl_menu_inc_tab.php';

    require_once HERE_ROOT.'mod_menu/tpl_menu_'.$file.'.php';

        ?>
 </section>
<?php
require_once HERE_ROOT.'mod_common/tpl_footer.php';
?>


