<div class="headerwrap <?php if($sta_headerwrapfloat=='y') echo 'headerwrapfloat';?>"><?php
/*
	欢迎使用DM企业建站系统，本系统由www.demososo.com开发。
*/
if(!defined('IN_DEMOSOSO')) {
	exit('this is wrong page,please back to homepage');
}
$menuneedfixed = $headerneedfixed ='';
if($sta_menufix=='y')  {
	if($sta_menuright=='y')  $headerneedfixed =' needheaderfixed';
	else $menuneedfixed =' needmenufixed';
	
}
$headermenuright='';
if($sta_menuright=='y') $headermenuright = ' headermenuright';
 



if($alias=='index'){ //banner top slider
	if($bsbannertop<>'') block($bsbannertop);
}
 
if($bsheadertop<>'') block($bsheadertop); //top text...

?>

 
<header id="header" class="header<?php echo $headerneedfixed.$headermenuright?>">
<?php 
if($sta_header_fullwidth<>'y')   echo ' <div class="container">  ';
 ?>

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

 	  if($sta_menuright=='y') $ifsearchbtn = '';
 	  else  $ifsearchbtn = ' style="display:none"';
 	?>
<div class="headermobsearch" <?php echo $ifsearchbtn;?>><i class="fa fa-search fa-lg"></i></div>
 	<?php
 } //end search
?>


 <?php 
block('prog_lang');

if($sta_menuright=='y'){
 ?>
 <div class="menu menuright"><?php 
		    require_once DISPLAYROOT.'a_menu.php';?>		
</div><!-- end menu -->
<?php } ?>
 
 

<?php 
if($sta_header_fullwidth<>'y')  echo ' </div>  ';
 ?>



<!--
<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
<span class="sr-only">Toggle navigation</span>
<span class="icon-bar"></span>
<span class="icon-bar"></span>
<span class="icon-bar"></span>
</button>-->
<button id="navigation-toggle" class="nav-button mobshow">Toggle Navigation</button>


</header><!--end header-->
 




<?php 
if($sta_menuright<>'y'){
 ?>
 <div class="menu<?php echo $menuneedfixed?>">
		 <div class="container"><?php 
		    require_once DISPLAYROOT.'a_menu.php';?>
		 </div>
</div><!-- end menu -->
<?php } 


?>

</div><!-- end header all wrap -->