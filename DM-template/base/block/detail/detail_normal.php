<?php
if(!defined('IN_DEMOSOSO')) {
    exit('this is wrong page,please back to homepage');
}
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
<div class="content_desp">
	<?php if($detailkv<>''){ ?>
	<div class="kv c">
	<?php echo get_img($detailkv,$title,'div');?>
	</div>
	<?php }
 ?>


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

if($detlinkurl<>'') echo '<div class="detaillinkurl dmbtn mt10 moresm"><a class="more " href="'.$detlinkurl.'" target="_blank"><i class="fa fa-shopping-cart"></i> '.$shop_linktitle2.'</a></div>';

} //hide price part

 
 
//download

detail_downloadurl($downloadurl);

//输出内容：
if($news_title<>'') echo '<div class="bodyheader"><h3>'.$news_title.'</h3></div>';

 

detail_fontsize(); 

dmblockid($despv);


if($formblockid<>'') block($formblockid);

detail_linkmore();
detail_sharebtn(); 
?>
</div>
 
<?php 
 

if($sta_tag=='y') taglink($pidname,$tag_title);

require_once EFFECTROOT.'other/plugin_nextprev.php';

 if($relativetitle<>'') require_once EFFECTROOT.'relative/'.$relativefg;

 ?>