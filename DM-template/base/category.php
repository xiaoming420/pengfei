<?php
/*
	欢迎使用DM企业建站系统，本系统由www.demososo.com开发。
*/

if(!defined('IN_DEMOSOSO')) {
	exit('this is wrong page,please back to homepage');
}
$reqfilemeta = TPLCURROOT.'inc/meta.php';
if(!is_file($reqfilemeta)) $reqfilemeta = DISPLAYROOT.'a_meta.php';
require_once $reqfilemeta;
?>
 <div class="pagewrap">
<?php
require_once TPLCURROOT.'inc/header.php';
  $reqfile = TPLCURROOT.'inc/banner.php';
 if(!is_file($reqfile)) $reqfile = DISPLAYROOT.'a_banner.php';
 require_once $reqfile;
?> 
<div class="contentwrap container">
   
   <?php require_once DISPLAYROOT.'b_area.php'; ?>
 
</div><!--end contentwrap-->
 
<?php 
  $reqfile = TPLCURROOT.'inc/footer.php';
 if(!is_file($reqfile)) $reqfile = DISPLAYROOT.'a_footer.php';
 require_once $reqfile;
  
?> 

</div><!--end pagewrap-->

<?php  		
$reqfile = TPLCURROOT.'inc/footer_last.php';
if(!is_file($reqfile)) $reqfile = DISPLAYROOT.'a_footer_last.php';
require_once $reqfile;
 
?>



</body>
</html>
