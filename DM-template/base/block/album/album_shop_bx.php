 
<div id="shopbxalbum" class="mobishopalbum"> 
 

<ul>
<?php 
 
 foreach($row_abm as $v){
 		 
 		 	$tid=$v['id'];
			$title=$v['title'];			  
            $kvsm=$v['kvsm'];
			$desp=$v['desp'];		 
             
           // $addr2_big =  UPLOADPATHIMAGE.$kvsm;		    
       
 				

 			//if(strpos($albumcssname, 'ridbigimg')>0) $img=get_img($kvsm,$title,'divno');//thumb use big
 			//else $img=get_thumb($kvsm,$title,'divno');

 		     $imgbig=get_img($kvsm,$title,'nodiv');



?>
    <li class="img">
		  
		  <img src="<?php echo $imgbig;?>" alt="<?php echo $title;?>" style="width:100%;height:auto"  />
		 

		<?php 
		$bxtitle = 'y';
		if($bxtitle=='y'){
		?>
		 <div class="text tc">
		 	<strong><?php echo $title;?></strong>
		 	<p><?php echo $desp;?></p>
		 </div> 
		 <?php
		 }
		?>
	</li>
	<?php
		}
	?>
</ul>
</div>

 <?php 
 $bxauto= 'true';
 
 ?>


<script>
$(function(){
	  
	$('#shopbxalbum>ul').slick({
				  infinite: true,
				  slidesToShow: 1,
				  slidesToScroll: 1
				});
         



});
</script>
 