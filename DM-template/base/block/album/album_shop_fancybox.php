 

 <div class="large_area">
			
	<div class="large_imgmid">
		 
     <?php
 foreach($row_abm as $k=>$v){ 
			 
			$title=$v['title'];			  
            $kvsm=$v['kvsm'];
             $despimg=$v['desp'];
	  $imgbig=get_img($kvsm,$title,'nodiv');

	  $stylev='';
if($k>0)  $stylev=' style="display:none"';
?>
 <a href="<?php echo $imgbig?>" <?php echo $stylev;?>  class="fancybox" data-fancybox-group="buttons"    title="<?php echo $title?>" caption="<?php echo $despimg?>">
    <img  src="<?php echo $imgbig;?>" alt="<?php echo $title;?>" /> 
  </a> 
   <?php
}
	 
   ?>        
	</div>
</div>

 


 
 <div class="large_list">
      <ul>
     <?php
 foreach($row_abm as $k=>$v){
               
			$tid=$v['id'];
			$title=$v['title'];			  
            $kvsm=$v['kvsm'];
			 
     $img=get_thumb($kvsm,$title,'nodiv');
      $imgbig=get_img($kvsm,$title,'nodiv');
?>
    <li data-index="<?php echo $k?>"><img   data-bigimg="<?php echo $imgbig;?>" src="<?php echo $img;?>" alt="<?php echo $title;?>" /></li>
   
   <?php
		}
   ?>
         
     </ul> 
 </div>
 
 
 
<script>
 $(function() {
 
 $('.large_list>ul').slick({
  infinite: true,
  slidesToShow: 5,
  slidesToScroll: 1
});



$(".large_list img").eq(0).addClass("cur");
$(".large_list li").click(function() {
	//var bigimg = $(this).data('bigimg');
   // $(".large_imgmid img").attr("src", bigimg);
	var index = $(this).data('index'); 
	$(".large_imgmid a").hide();
	$(".large_imgmid a").eq(index).show();
   $(".large_list_inc img").removeClass("cur");
    $(this).find('img').addClass("cur");

})



	$('.large_imgmid .fancybox').fancybox({
			 
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
//-----
 
});//end func
 
</script>
 