<div class="headerwrap <?php if($sta_headerwrapfloat=='y') echo 'headerwrapfloat';?>"><?php
/*
	欢迎使用DM企业建站系统，本系统由www.demososo.com开发。
*/
if(!defined('IN_DEMOSOSO')) {
	exit('this is wrong page,please back to homepage');
}

if($bsheadertop<>'') block($bsheadertop); //top text...

?>
 
<header id="header" class="header stickyMobi">
 <div class="container">
<?php

//if($bsheader<>'') block($bsheader);
 //menu is in logo below
 //$logourl = LANG=='cn'?'index.html':LANG.'/index.html';
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
 
 
 </div> 
<button id="navigation-toggle" class="nav-button mobshow">Toggle Navigation</button>


</header><!--end header-->
 


 <div class="menu needsuperfish needmenumob stickyPc">
		 <div class="container">
		 <?php 
		 if(is_file(TPLCURROOT.'inc/menu.php')) require_once TPLCURROOT.'inc/menu.php'; 
		 else  require_once DISPLAYROOT.'a_menu.php'; 
		    	
		    ?>
		 </div>
</div><!-- end menu -->

</div><!-- end header all wrap -->