  <?php 

//---获取数据-------------
$sqlwhere = get_node_sqlv($pidcate);
$sqlnode="select * from ".TABLE_NODE." where  sta_visible='y' $andlangbh  $sqlwhere  order by pos desc,id desc limit 20";
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

 <div class="bannerwater01 bannerfont">
<?php 
 
 foreach($result as $v){
 	 
		
		 $title = $v['title'];$linkurl = $v['linkurl']; $linktitle = $v['linktitle'];
				        $imgv =  get_img_def($v['kv']); 
				      
				        $despjj = web_despdecode($v['despjj']);
				        $despv =  get_nodedesp($v['desp'],$v['desptext']);
						

?>

<section  style="background:url(<?php echo $imgv?>) center center no-repeat;background-size:cover">
		 
	 
	 <div class="text">
    
        <h2><?php   echo $v['title'];  ?></h2>
        <h4><?php    echo $despjj; ?></h4>
        <p><?php   echo $despv;   ?></p>
		<div class="bkmore dmbtn more3">

        <?php 
            if($linkurl<>''){
                  $linktitlev = '查看详情 >';   
                  if($linktitle<>'') $linktitlev = $linktitle;
              ?>
  <a class="more"  href="<?php  echo $linkurl;  ?>" class="btn button button--red triangle"><?php echo $linktitlev;?></a>
              <?php
            } 
        ?>
     
      </div>
	  
       </div>
	   
	   
	</section>

 
	<?php
		}
	?>
 </div>

 

<script>
$(function(){
	    $('.bannerwater01').slick({ 
	        infinite: true,
              slidesToShow: 1,
              slidesToScroll: 1,
              autoplay:true,
			  fade:true,
			 // vertical:true, 
               dots: true, 
              //arrows: false, 

	 });


});
</script>

