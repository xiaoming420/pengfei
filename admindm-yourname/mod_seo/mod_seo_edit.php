<?php
/*  欢迎使用DM企业建站系统，本系统由www.demososo.com开发。
*/
require_once '../config_a/common.inc2010.php';
//
 if($act <> "pos") zb_insert($_POST);
 
 
  $arr =  array("node", "page","cate");  
if(!in_array($type,$arr))  {
   echo 'type is wrong';
  exit;
}


//ifhaspidname(TABLE_NODE,$pid);
//ifhaspidname(TABLE_CATE,$catpid);
ifhave_lang(LANG);//TEST if have lang,if no ,then jump

 
$jumpv='mod_seo_edit.php?lang='.LANG.'&pidname='.$pidname.'&type='.$type;

 
//-----------
$title = 'SEO修改';
 

require_once HERE_ROOT.'mod_common/tpl_header_iframe.php';
 
?>

 
<section class="content-header">
     



</section>
  
 
 <section class="content pcnarrowwidth">  

   <?php   
          
           require_once  admreq('mod_seo/tpl_edit_seo.php');
           
        ?>
 </section>
<?php
require_once HERE_ROOT.'mod_common/tpl_footer_iframe.php';
?>


