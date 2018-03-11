<?php
if(!defined('IN_DEMOSOSO')) {
    exit('this is wrong page,please back to homepage');
}
echo 'no use............';
exit;
?>

<?php
 //pre($row_detail);
 
$pidname= $row_detail['pidname'];       
$desptext= web_despdecode($row_detail['desptext']);
$desp= web_despdecode($row_detail['desp']);
$despv='';
if($desptext<>'') $despv = $desptext;
else  $despv = $desp;

$detailkv = $row_detail['kv'];
?> 
<h1><?php echo $title; ?></h1>
<?php
publishtext(); // in frontcommon.php

editlink($row_detail['id'],'node');//in func_block below

?>
<div class="content_desp ">

<div class="col-md-6 col-sm-6 contentshopinc">
<?php 
 if(isdmmobile())  require_once EFFECTROOT.'album/album_shop_bx.php';
 else require_once EFFECTROOT.'album/album_shop_fancybox.php';
 
 ?>
</div>

<div class="col-md-6 col-sm-6 contentshopinc">

<?php 
 
if($shop_priceold<>'hide'){

if($shop_priceold<>'') $shop_priceold2 =$shop_priceold;
else $shop_priceold2 ='原价：';

if($shop_price<>'') $shop_price2 =$shop_price;
else $shop_price2 ='现价：';

if($shop_currency<>'') $shop_currency2 =$shop_currency;
else $shop_currency2 ='¥';

if($shop_currencycn<>'') $shop_currencycn2 =$shop_currencycn;
else $shop_currencycn2 ='元';


if($detlinktitle<>'')  $shop_linktitle2 = $detlinktitle;
 else {
	if($shop_linktitle<>'') $shop_linktitle2 =$shop_linktitle;
	else $shop_linktitle2 ='淘宝购买';
}

//.number_format(round($detailpriceold,2),2).
//if($detailprice<>'')  echo '<div class="detailprice detailpriceold"><span class="w1">'.$value_priceold_v.'</span><span class="w2"><em>'.$value_currency_v.'</em><strong class="del">'.number_format(round($detailpriceold,2),2).'</strong></span></div>';

if($detpriceold<>0)  echo '<div class="detailprice detailpriceold"><span class="w1">'.$shop_priceold2.'</span><span class="w2"><em>'.$shop_currency2.'</em><strong class="del">'.$detpriceold.$shop_currencycn2.'</strong></span></div>';

if($detprice<>0)  echo '<div class="detailprice detailpricenow"><span class="w1">'.$shop_price2.'</span><span class="w2"><em>'.$shop_currency2.'</em><strong class="price">'.$detprice.$shop_currencycn2.'</strong></span></div>';

if($stock<>'') echo '<div class="stock">库存：'.$stock.'</div>';



if($ordernowtitle<>'')
 echo '<div class="detaillinkurl ptb10 dmbtn ordernowclick moresm more3"><a class="more" href="#ordernow"><i class="fa fa-shopping-cart"></i> '.$ordernowtitle.'</a></div>';
else{

	if($detlinkurl<>'') echo '<div class="detaillinkurl ptb10 dmbtn moresm more3"><a class="more" href="'.$detlinkurl.'" target="_blank"><i class="fa fa-shopping-cart"></i> '.$shop_linktitle2.'</a></div>';

} //hide price part

}
?>


</div>
<div class="c"> </div>

<?php 
detail_fontsize(); ?>


<div class="nodetab">

 <div class="nodetabhd">

 <span class="cur">
 <?php 
if($news_title<>'') echo $news_title;
else echo '内容详情';
?>
 </span>

 <?php 

 if($sta_field=='y'){
  if($field_title=='') $field_titlev='参数';
  else  $field_titlev=$field_title;
echo '<span class="dn">'.$field_titlev.'</span>';
 
}

 
if($ordernowtitle<>'')
echo '<span class="ordertab dn">'.$ordernowtitle.'</span>';

?>



   </div><!--end nodetabhd-->



  <div class="nodetabcnt">
  	  <?php //显示 内容?>
  	  <div class="nodetabcntinc">

	<?php if($detailkv<>''){ ?>
	<div class="kv c">
	<?php echo get_img($detailkv,$title,'div');?>
	</div>
	<?php
	 } 
 
 

//download

detail_downloadurl($downloadurl);

 

dmblockid($despv);
detail_linkmore();

?>
 </div> 	 

 <?php 
//输出字段属性:
if($sta_field=='y'){ 
	echo '<div class="nodetabcntinc dn">';
	field_value_front($mainpidname,$pidname);
    echo '</div>';
}
  //显示 order now
if($ordernowtitle<>''){
	echo '<div class="nodetabcntinc ordernowcnt dn">';
     block('prog_form_ordernow');
    echo '</div>';
}


?>
  </div><!--end nodetabcnt-->

</div><!--end nodetab-->

</div>
 
<?php 
detail_sharebtn(); 
 
if($sta_tag=='y') taglink($pidname,$tag_title);

require_once PARTROOT.'plugin_nextprev.php';
 if($relativetitle<>'') require_once PARTROOT.'plugin_'.$relativefg.'.php';

 ?>