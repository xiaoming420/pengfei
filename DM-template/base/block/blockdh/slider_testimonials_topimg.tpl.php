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

$dhtrigger = 'bxpj'.rand(1000,9999); 


?>

<!-- testimonials -->       
    <div class="vippj <?php echo $cssname;?>">
        <div class="boxcol colhalf">
            <img src="<?php echo get_img_def($blockimg);?>" alt=" " class="img-responsive" />
        </div>
        <div class="boxcol mt30 colhalf">
            <h3>大家都在说：</h3>
            <section class="slider">
                <div id="<?php echo $dhtrigger?>" class="bxarrow1 vippjslider">
                    <ul >
                        <?php 
                           foreach ($result as $k => $v) {                            
                             $imgv =  get_img_def($v['kv']);                              
                              $despv =  get_nodedesp($v['desp'],$v['desptext']);   
                         ?>

                        <li>
                             
                                <div class="para">
                                     <div class="desp"><?php echo $despv;?> </div>
                                    <div class="para_pos">
                                        <i class="fa fa-quote-left" aria-hidden="true"></i>
                                    </div>
                                </div>
                                
                                    <div class="boxcol colhalf">
                                        <img class="fr" src="<?php echo $imgv?>" alt=" " class="img-responsive" />
                                    </div>
                                    <div class="boxcol colhalf">
                                        <h4><?php echo $v['title'];?></h4>
                                        <p><?php echo $v['titlebz1'];?></p>
                                    </div>
                                    <div class="c"> </div>
                                 
                             
                        </li>
                        <?php 
                         }
                         ?>
                     
                    </ul>
                </div>
            </section>
        </div>
        <div class="clearfix"> </div>
    </div>
<!-- //testimonials --> 
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

