<div id="<?php echo  $dhtrigger;?>" class="grid2ceng">  <ul>
<?php 

 foreach($row_abm as $v){
               
			$tid=$v['id'];
			$title=$v['title'];			  
            $kvsm=$v['kvsm'];
			$desp=$v['desp'];		 
             
           // $addr2_big =  UPLOADPATHIMAGE.$kvsm;		    
       
 				

 			if(strpos($cssname, 'ridbigimg')>0) $img=get_img($kvsm,$title,'div');//thumb use big
 			else $img=get_thumb($kvsm,$title,'div');

 		     $imgbig=get_img($kvsm,$title,'nodiv');
 				



// if(strpos($cssname,'ancybox')>0) { $linkurl = $imgv; $classv= 'class="fancybox" data-fancybox-group="buttons"';}
// else {$linkurl = $linkurl; $classv='';}

 
 $classv= 'class="fancybox" data-fancybox-group="buttons"';

      ?>
 <li class="gcoverlayjia col-md-3 col-sm-4 col-xs-6">
    <a href="<?php echo $imgbig?>" <?php echo $classv;?> title="<?php echo $title?>" caption="<?php echo $desp?>">
    <div class="overlay"><span>+</span></div>
      <div class="img">
             <?php echo $img?>
            </div>
            <?php if($title<>'') echo '<h3>'.$title.'</h3>';?>    
    </a> </li>
<?php
}
?>
 </ul><div class="c"> </div>
</div>


<script>
$(document).ready(function() {
	   	$('#<?php echo $dhtrigger?> .fancybox').fancybox({
			 
				openEffect  : 'none',
				closeEffect : 'none',

				prevEffect : 'none',
				nextEffect : 'none',

				closeBtn  : true,

				// helpers : {
				// 	title : {
				// 		type : 'inside'
				// 	},
				// 	 buttons	: {
				//  position: 'top'
				// 	}//,
				// 	 //thumbs: {
				// 	//	width: 50,
				// 	//	height: 50
				// 	//} 
				// },

				afterLoad : function() {
					var caption = $(this.element).attr('caption');
					this.title = 'Image ' + (this.index + 1) + ' of ' + this.group.length + (this.title ? ' - ' + this.title : '')+(caption ? ' <p class="fdesp"> ' + caption+'</p>' : '');
					 ;
				}
			});
			
});
			
</script>

<?php //if(strpos($albumcssname, 'gridisasdfasdfasfd-no use otope')>1111111110) { 
//<script>
// $(window).load(function() {		//must use it,not use ready
// 	// cache container
// var diviso_items = $('.gridisotope');
// // initialize isotope
// diviso_items.isotope({
//   itemSelector : '.gridisotope>ul>li',
//   layoutMode : 'fitRows'
// });

 


// }); //end window load
//  } ?>