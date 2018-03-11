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

?>

<?php
edit_fenode($pidcate);//用来在前台编辑后台。
?>

<div id="<?php echo $dhtrigger?>" class="slicknormal <?php echo $cssname;?>"> 
 

<ul>
<?php 
 
 foreach($result as $v){
 		  $title = $v['title'];$linkurl = $v['linkurl']; 
        $imgv =  get_img_def($v['kv']);
      //  $despjj = $v['despjj']; //副标题
        $linkurlarr =  get_nodelinkurl($linkurl);

?>
    <li class="img">
		 <?php echo $linkurlarr[0];?>
		  <img src="<?php echo $imgv;?>" alt="<?php echo $title;?>"   />
		 <?php echo $linkurlarr[1];?>  

		<?php if(is_int(strpos($cssname,'showtitle'))){
		?>
		 <div class="text">
		 	 <?php echo $title;?> 
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

 

<script>
$(function(){
	    $('#<?php echo $dhtrigger?>>ul').slick({ 
	        infinite: true,
              slidesToShow: 1,
              slidesToScroll: 1,
              autoplay:true,
             // dots:true

	 });


});
</script>

