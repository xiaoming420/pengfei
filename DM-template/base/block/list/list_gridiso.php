<?php
if(!defined('IN_DEMOSOSO')) {
	exit('this is wrong page,please back to homepage');
}
?>
<ul class="gridlistiso">
<?php
 
         foreach($result as $v){
               
			     $tid=$v['id'];
			$title=$v['title'];
			$titlecss=$v['titlecss'];
			$pidname=$v['pidname'];
			$dateday=$v['dateday'];//echo $listdate;
			$alias=alias($pidname,'node'); 
            $kvsm=$v['kvsm'];
			$despjj=$v['despjj'];
			
			if($kvsm=='') $img=DEFAULTIMGDIV;
			else{
				
				$img = get_thumb($kvsm,$title,'div');
				}
            $url = url('node',$alias,$tid,'');

          //if($titlecss<>'') $titlecssv='style="'.$titlecss.'"';
		 // else $titlecssv='';
		  
		   

				echo '<li>';
				echo '<a class="img"'.LINKTARGET_F.' href="'.$url.'" '.$titlecssv.'>'.$img.'</a>';
				echo '<div class="title"><a '.LINKTARGET_F.' href="'.$url.'" '.$titlecssv.'>'.$title.'</a></div>';
			
				echo '</li>'; 
            }//end foreach
 
?>
</ul>


 	
<script>
$(window).load(function() {		//must use it,not use ready
	// cache container
var diviso_items = $('.gridlistiso');
// initialize isotope
diviso_items.isotope({
  itemSelector : '.gridlistiso>li',
  layoutMode : 'fitRows'
});

 


}); //end window load

$(function(){
        if($('.cate_sp').length>0){
            $('.cate_sp .gridlistiso .img').append('<div class="bgvideocnt"></div>');
        }
	});



</script>
