<?php
 
    $sqlabm = "SELECT * from ".TABLE_ALBUM."  where  pid='$curpidname' and sta_visible='y'   $andlangbh  order by pos desc,id desc";
      //echo '==============='.$sqlabm;

    if(getnum($sqlabm)>0){
           $row_abm=getall($sqlabm);   
    
?> 



<div id="fancybox_desp" class="grid2ceng <?php if($albumcssname<>'') echo ' '.$albumcssname?>">  <ul>
<?php 

 foreach($row_abm as $v){
               
			$tid=$v['id'];
			$title=$v['title'];			  
            $kvsm=$v['kvsm'];
			$desp=$v['desp'];		 
             
           // $addr2_big =  UPLOADPATHIMAGE.$kvsm;		    
       
 				

 			if(strpos($albumcssname, 'ridbigimg')>0) $img=get_img($kvsm,$title,'div');//thumb use big
 			else $img=get_thumb($kvsm,$title,'div');

 		     $imgbig=get_img($kvsm,$title,'nodiv');
 				



// if(strpos($cssname,'ancybox')>0) { $linkurl = $imgv; $classv= 'class="fancybox" data-fancybox-group="buttons"';}
// else {$linkurl = $linkurl; $classv='';}

 
 $classv= 'class="fancybox" data-fancybox-group="buttons"';

      ?>
 <li class="gcoverlayjia boxcol col_1f3">
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
	   	$('#fancybox_desp .fancybox').fancybox({
			 
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

<?php 
}
else{
	echo '请在后台添加相册。因为这个购物详情页的效果必须要有相册';
}
?>