 <div class="headerwrap headerwrapfloat stickyPcMobi">
 <header id="header" class="header "> 

			<?php 
			 if($bsheaderlogo<>'') {
 		 echo '<div class="logo"><a href="'.BASEURLPATH.'">';
		 echo '<img src="'.UPLOADPATHIMAGE.$bsheaderlogo.'" alt="" />'; 
		 echo '</a></div>';}

	 

		  if($bsheadersearch<>'') {
 	  block($bsheadersearch); 
 
 	     $ifsearchbtn = '';
 	?>
<div class="headermobsearch" <?php echo $ifsearchbtn;?>><i class="fa fa-search fa-lg"></i></div>
 	<?php
 } //end search


 block('prog_lang');
 
?>



			<nav>
				<a href="#menu" class="a-menu">Menu <i class="ion-android-menu"></i> </a>
			</nav>

		 
	  </header>
</div>
		<!-- Menu -->
		<nav id="menu" class="watermenu">
			<div class="inner links">
				<h2>Menu</h2>

				 <?php 
			 if(is_file(TPLCURROOT.'inc/menu.php')) require_once TPLCURROOT.'inc/menu.php'; 
				 else  require_once DISPLAYROOT.'a_menu.php'; 
				 ?>	

				 
				<a href="#" class="close">Close</a>
			</div>
		</nav>
 
