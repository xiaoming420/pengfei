<?php
/*
	欢迎使用DM企业建站系统，本系统由www.demososo.com开发。
*/
if(!defined('IN_DEMOSOSO')) {
	exit('this is wrong page,please back to homepage');
}
?> 



	<div class="bannerwrap <?php if($banner<>'') echo 'bannerboth';?>">
	    <?php  
	     if($alias<>'index'){ 
	    			 	?>
	    			 	 <div class="bannertext">
						     <div class="container">
						     <?php  
						     	echo '<h1>'.$bannertitle.'</h1>';
						     ?>
						     </div>
					     </div>
	    			 	<?php
	    			 }
	    			 
	    	if($banner<>'') {

	    		   $pidifimg = gl_imgtype($banner);
	    		  
				   if(in_array($pidifimg,$attach_type)){ 
				 
				   // if(isdmmobile()) echo '<div class="bannerimg perimgwrap"><img src="'.UPLOADPATHIMAGE.$banner.'" alt="" /></div>';
				   // else
				     echo '<div class="bannerimg" style="background:url('.UPLOADPATHIMAGE.$banner.') center center no-repeat;background-size:cover"></div>';
				  } 

	    		else block($banner);

	    	} 
	    	 
		 ?>
	</div><!-- end bannerwrap -->