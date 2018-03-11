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

<div id="<?php echo $dhtrigger;?>" class="whychooseus <?php  echo  $cssname?>">
<ul>
<?php
 
foreach($result as $v){

          $title = $v['title'];$linkurl = $v['linkurl'];//$iconimg = $v['iconimg'];
        $imgv =  get_img_def($v['kv']);
        
        $despv =  get_nodedesp($v['desp'],$v['desptext']);
         $linkurlarr =  get_nodelinkurl($linkurl);

 
?>

        <li>
            <div class="whyimg">
            <?php echo $linkurlarr[0]?>
            <img src="<?php echo $imgv?>" alt="<?php echo $title?>" />
            <?php echo $linkurlarr[1]?>
            </div>

                <div class="whycnt">
                    <div class="hd">
                     <h3><?php echo $title?></h3>
                    </div>
                    <div class="bd">
                          <?php echo $despv?>
                    </div>
                </div>
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
              slidesToScroll: 1
     });


});
</script>
