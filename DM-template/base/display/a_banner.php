
<?php
/*
	欢迎使用DM企业建站系统，本系统由www.demososo.com开发。
*/
if(!defined('IN_DEMOSOSO')) {
	exit('this is wrong page,please back to homepage');
}
?> 


<div class="bannerwrap">
   <?php
   if($bannertext=='') $bannertext = $bannertitle;
   		if($banner<>''){
   			 
   			  $pidifimg = gl_imgtype($banner);
	    		  
				   if(in_array($pidifimg,$attach_type)){ 
				     echo '<div class="bannerimg" style="background:url('.UPLOADPATHIMAGE.$banner.') center center no-repeat;background-size:cover"><div class="bannertext"><h1>'.$bannertext.'</h1></div></div>';
				  } 

	    		else block($banner);
	    	 	
   		} 
   		else {
   			echo '<div class="nobanner"><div class="bannertext"><h1>'.$bannertext.'</h1></div></div>';
   		}
   ?>
   	
 </div>