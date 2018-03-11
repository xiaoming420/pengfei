  <?php 

//---获取数据-------------
$sqlwhere = get_node_sqlv($pidcate);
$sqlnode="select * from ".TABLE_NODE." where  sta_visible='y' $andlangbh  $sqlwhere  order by pos desc,id desc limit $maxline";
$fenum = getnum($sqlnode);
if($fenum==0) { 
	echo '没有记录。 '.$pidcate;
$result = array();
}
else  $result = getall($sqlnode);


$bxtitle= '';
 if(is_int(strpos($cssname,'bxtitle'))) $bxtitle= 'y';
 
 $dhtrigger = 'bxbannercnt'.rand(1000,9999); 
?>

<?php
edit_fenode($pidcate);//用来在前台编辑后台。
?>


<div id="<?php echo $dhtrigger?>" class="<?php   echo $cssname;?>"> 
 

<ul>
<?php 
 
 foreach($result as $v){
 		  $title = $v['title'];$linkurl = $v['linkurl']; 
        $imgv =  get_img_def($v['kv']);
        $despjj = $v['despjj']; //副标题
        $linkurlarr =  get_nodelinkurl($linkurl);



?>
    <li class="img">
		 <?php echo $linkurlarr[0];?>
		  <img src="<?php echo $imgv;?>" alt="<?php echo $title;?>" style="width:100%;height:auto"  />
		 <?php echo $linkurlarr[1];?>

		<?php if($bxtitle=='y'){
		?>
		 <div class="text">
		 	<h4><?php echo $title;?></h4>
		 	<p><?php echo $despjj;?></p>
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
if(is_int(strpos($cssname,'bxstop'))) $bxauto= 'false'; 
 ?>


<script>
$(function(){
	    $('#<?php echo $dhtrigger?>>ul').slick({ 
	        infinite: true,
              slidesToShow: 1,
              slidesToScroll: 1,
              autoplay:true,

	 });


});
</script>
