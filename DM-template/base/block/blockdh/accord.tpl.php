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
edit_fenode($pidcate);
?>
 
<div id="<?php echo $dhtrigger;?>" class="<?php  echo  $cssname?>">
  <dl class="accord">
<?php
 
foreach($result as $k=>$v){

          $title = $v['title'];//$linkurl = $v['linkurl'];//$iconimg = $v['iconimg'];
          $kv = $v['kv'];
          $imgv =  get_img_def($v['kv']);
         
          $despv =  get_nodedesp($v['desp'],$v['desptext']);  

?>
  <dt><?php echo $title;?></dt>
    <dd style="display:none">
        <?php 
         if($kv<>''){
           if($cus_showkvsm == 'y') echo '<p><img src="'.$imgv.'" alt="" /></p>';
         }
          echo '<div>'.$despv.'</div>';
          ?>
    </dd>

<?php 
 
 }
  ?>  
    </dl>
</div>

 

 <script>
$(function(){

      //$('#<?php echo $dhtrigger?> .accord dd').hide();
       $('#<?php echo $dhtrigger?> .accord').on('click', 'dt', function() {
          
           // $(this).next().slideToggle(200);
           var dtdisplay = $(this).next().css('display');
           //alert(dtdisplay);

           if($(this).next().css('display')=='block')  $(this).next().hide();
            else  {
                 $('#<?php echo $dhtrigger?> .accord dd').hide();
                 $(this).next().show();
            }

           

    });


});
</script>