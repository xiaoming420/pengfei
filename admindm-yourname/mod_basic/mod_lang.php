<?php
/*
	欢迎使用DM企业建站系统，本系统由www.demososo.com开发。
  
*/
require_once '../config_a/common.inc2010.php';
//$andlangbh = '';// important,use for ifhasid function
if($tid<>'')    ifhasid_nolang(TABLE_LANG,$tid); //ifhasid(TABLE_LANG,$tid);
 
if($act <> "pos") zb_insert($_POST);

 

$jumpvnolang ='mod_lang.php';
$jumpv ='mod_lang.php?lang='.LANG;//use ?lang="",is for &,not ?
$jumpv_file =$jumpv.'&file='.$file;
$jumpv_add =$jumpv.'&file=add';


if($file=='add') $title = '添加';
else if($file=='edit') $title = '语言设置';
else if($file=='basicset') $title = '网站设置';
else if($file=='assets') $title = '资源管理';
else $title = '网站设置';

/*************************************************/


if($act == "sta")
{
     $ss = "update ".TABLE_LANG." set sta_visible='$v' where id=$tid   limit 1";//$andlangbh
    iquery($ss);
    jump($jumpv);
}
if($act == "sta_big5")
{
     $ss = "update ".TABLE_LANG." set sta_big5='$v' where id=$tid   limit 1";
    iquery($ss);
    jump($jumpv);
}



if($act == "setlangdefault")
{  
  die('no use,set mainlang in config.php');
$ss =" select id from  ".TABLE_LANG; 
$rowlist = getall($ss);
		if($rowlist<>'no') {
			foreach($rowlist as $v){
				  $tidhere=$v['id'];
				  $ss2 = "update ".TABLE_LANG." set sta_main='n' where id=$tidhere   limit 1";
				iquery($ss2); 
			}			
		}
     $ss3 = "update ".TABLE_LANG." set sta_main='y' where id=$tid   limit 1";
	// echo $andlangbh;exit;
      iquery($ss3);
    jump($jumpv);
}


if($act == "pos")
{
    foreach ($_POST as $k=>$v){
         $ss = "update ".TABLE_LANG." set  pos='$v' where id='$k'   limit 1";
         iquery($ss);
        }
      jump($jumpv);
}

 

/*************************************************/
require_once HERE_ROOT.'mod_common/tpl_header.php';

?>



    <!-- Content Header (Page header) -->
    <section class="content-header">

        <ol class="breadcrumb">
        <li><a href="mod_lang.php?lang=<?php echo LANG?>"><i class="fa fa-dashboard"></i> 网站设置</a></li>
        <li class="active"><?php echo $title?> </li>
      </ol>

      <h1>
       <?php echo $title?> 
      </h1>
  
    </section>
  <?php
  if($file=='edit' || $file=='assets' || $file=='basicset')
         require_once HERE_ROOT.'mod_basic/tpl_lang_inc_tab.php';
         
        ?>
    <section class="content">


    <?php
      if($file=='list'){
    ?>
      <div class="contenttop">
      <a href="<?php echo $jumpv_add?>"><i class="fa fa-plus-circle"></i> 添加</a>
    </div>
    <?php
      }
    ?>

		   
        <?php
         
         require_once HERE_ROOT.'mod_basic/tpl_lang_'.$file.'.php';
         
        ?>

 </section>

<?php
require_once HERE_ROOT.'mod_common/tpl_footer.php'; 


?>

 