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

<div id="<?php echo $dhtrigger;?>" class="blocktestimonials  <?php  echo  $cssname?>">
<?php
 
foreach($result as $v){

          $title = $v['title']; $linkurl = $v['linkurl']; 
          $imgv =  get_img_def($v['kv']);
        
        $despv =  get_nodedesp($v['desp'],$v['desptext']);  
         $linkurlarr =  get_nodelinkurl($linkurl);


?>
        <div class="boxcol <?php echo $cus_columnsv;?>">	 
                 <div class="img tc"> 
                    <img class="mt10" src="<?php echo $imgv?>"  alt="<?php echo $title?>">               
                </div>
  	 
                <div class="text">
                   <h4><?php echo $title; ?></h4>    			  
                   <div class="desp"><?php echo $despv?> </div>			  
              </div>
      </div>
<?php 
 
 }
  ?>

</div>

 <?php 
 $bxauto= 'true';
if(is_int(strpos($cssname,'bxstop'))) $bxauto= 'false'; 
 ?>

 <script>
$(function(){
  //var bxcarouselid = '#<?php echo $dhtrigger?>>ul';
   
   $('#<?php echo $dhtrigger?>').slick({  //use div to avoid gridcol2
 
         infinite: true,
              slidesToShow: <?php echo $cus_columns;?>,
              slidesToScroll: 1,
              autoplay:true,
                responsive: [                  
                  {
                    breakpoint: 800,
                    settings: {
                      slidesToShow: 3,
                      slidesToScroll: 1
                    }
                  },
                  {
                    breakpoint: 480,
                    settings: {
                      slidesToShow: 2,
                      slidesToScroll: 1
                    }
                  }
                  ]
 });
});
</script>
