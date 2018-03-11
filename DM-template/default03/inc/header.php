<div class="headerwrap headerwrapfloat stickyPcMobi"><?php
/*
	欢迎使用DM企业建站系统，本系统由www.demososo.com开发。
*/
if(!defined('IN_DEMOSOSO')) {
	exit('this is wrong page,please back to homepage');
}
 

if($alias=='index'){ //banner top slider
	if($bsbannertop<>'') block($bsbannertop);
}
 

?>
 
<header id="header" class="header">
 <div class="container">
<?php
 if($bsheaderlogo<>'') {
 		 echo '<div class="logo"><a href="'.BASEURLPATH.'">';
		 echo '<img src="'.UPLOADPATHIMAGE.$bsheaderlogo.'" alt="" />'; 
		 echo '</a></div>';}
  if($bsheadertext<>'') {echo '<div class="headertel">';block($bsheadertext); echo '</div>';}

  
  if($bsheadermobtel<>'') { echo '<div class="headertelmob mobshow">';block($bsheadermobtel);echo '</div>'; }

 if($bsheadersearch<>'') {
 	  block($bsheadersearch); 
 	?>
<div class="headermobsearch"><i class="fa fa-search fa-lg"></i></div>
 	<?php
 } //end search
?>


 <?php 
block('prog_lang');
?>
 
 <div class="menu menuright needsuperfish needmenumob">
 <?php 
	 if(is_file(TPLCURROOT.'inc/menu.php')) require_once TPLCURROOT.'inc/menu.php'; 
		 else  require_once DISPLAYROOT.'a_menu.php'; 
		 ?>		
</div><!-- end menu -->
 
 
<button id="navigation-toggle" class="nav-button mobshow">Toggle Navigation</button>

</div>
</header><!--end header-->
 

</div><!-- end header all wrap -->