<?php
if(!defined('IN_DEMOSOSO')) {
	exit('this is wrong page,please back to homepage');
}

 ?>


<div class="sidebar <?php echo $sidebarcss?>">

 

	<?php
	 if($sidebartop<>'') {echo '<div class="c sidebartop">';
	            block($sidebartop);
	            echo '</div>';
	        }
	?>

	<?php
	 if($sidebar<>'') block($sidebar);
	 else{
               if($modtype=='node') $modtype2='cate'; //bu guan what modtype,only cate or page in sidebar menu
               else $modtype2='page';
                require_once DISPLAYROOT.'b_sidebar_'.$modtype2.'.php';

	 } 
	?>


    

	<?php	
	 if($sidebarbot<>'') {echo '<div class="c sidebar_bot">';
	            block($sidebarbot);
	            echo '</div>';
	        }
	?>

</div>		 