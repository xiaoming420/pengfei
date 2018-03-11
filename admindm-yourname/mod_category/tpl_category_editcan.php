<?php
/*
	power by JASON.ZHANG  DM建站  www.demososo.com
*/
if(!defined('IN_DEMOSOSO')) {
	exit('this is wrong page,please back to homepage');
}


if($act=='update'){ 
       if(@$_POST['inputmust']=='') {echo $inputmusterror.$backlist;exit;}


  $bscnt22 = '';
  if(count($_POST)>1){
          foreach ($_POST as  $k=>$v) {
            if(strtolower($k)=='submit') break;
            $bscnt22 .= $k.':##'.htmlentitdm(trim($v)).'==#==';
             
          }
      }
       $bscnt22 = substr($bscnt22,0,-5);


    $ss = "update ".TABLE_CATE." set arr_can='$bscnt22'  where pidname='$catid' $andlangbh limit 1";
   //echo $bscnt22;exit;
 //echo $ss;exit;
			iquery($ss); 	
		jump($jumpveditcan);

	 

	
	}
	
else{
 
 
$jump_insertupdatesub = $jumpvcatidf.'&act=update';


?>	
 
<form  onsubmit="javascript:return checkhere(this)" action="<?php  echo $jump_insertupdatesub;?>" method="post" enctype="multipart/form-data">
<table class="formtab">


 <tr   style="background:#fbfaf4">
    <td class="tr">电商：
    <?php echo $xz_maybe;?>
    </td>
    <td>
   原价字样： <input name="shop_priceold" type="text"  value="<?php echo $shop_priceold;?>" size="30"> 
 <span class="cgray">(比如：零售价：) ，如果值为 hide，则在前台可以隐藏此功能。</span>
   <div class="c5"> </div>
    现价字样： <input name="shop_price" type="text"  value="<?php echo $shop_price;?>" size="30">
  
   <span class="cgray"> (比如：促销价：)</span>

   <div class="c5"> </div>
  货币符号： <input name="shop_currency" type="text"  value="<?php echo $shop_currency;?>" size="10">(比如¥或$)
  <div class="c5"> </div>

    中文货币符号： <input name="shop_currencycn" type="text"  value="<?php echo $shop_currencycn;?>" size="10">(比如元或美元)<br />
   <div class="c5"> </div>
   
    产品外链的字样： <input name="shop_linktitle" type="text"  value="<?php echo $shop_linktitle;?>" size="30" />


     </td>
  </tr>

    <tr>
      <td class="tr">表单区块：</td>
      <td>  <input name="formblockid" type="text"  value="<?php echo $formblockid;?>" size="30" />
 <?php 
 if($formblockid<>'')  echo check_blockid($formblockid);
 ?>
     </td>
    </tr>



  <tr>
    <td class="tr">发布信息：
    <?php echo $xz_maybe;
 
    ?>
    </td>
    <td>
  作者： <input name="authorcate" type="text"  value="<?php echo $authorcate;?>" size="30" /> 
 <div class="c5"> </div>
  发布来源：<input name="authorcompanycate" type="text"  value="<?php echo $authorcompanycate;?>" size="30" />
   <div class="c5"> </div>
  发布日期：<input name="authordatecate" type="text"  value="<?php echo $authordatecate;?>" size="30" />
   <div class="c5"> </div>
  阅读数：<input name="authorhitcate" type="text"  value="<?php echo $authorhitcate;?>" size="30" />
<br /><span class="cgray">发布信息的值为hide，则在前台不显示</span>
     </td>
  </tr>


      <tr>
    <td class="tr">一些值：
    <?php echo $xz_maybe;?>
    </td>
    <td>
  

    内容标题的字样:<input name="news_title" type="text"  value="<?php echo $news_title;?>" size="30"> 
   <div class="c5"> </div>
    查看全文的字样:<input name="news_moretitle" type="text"  value="<?php echo $news_moretitle;?>" size="30"> 

 <div class="c5"> </div>
    显示字体增减:
     <select name="sta_fontsize">
    <?php select_from_arr($arr_yn,$sta_fontsize,'');?>
     </select>

     <div class="c5"> </div>
    显示社交分享按钮:
   <select name="sta_sharebtn">
    <?php select_from_arr($arr_yn,$sta_sharebtn,'');?>
     </select>
     </td>
  </tr>

 

  <tr>
      <td class="tr">开启标签：</td>
      <td><select name="sta_tag">
    <?php 
 
    select_from_arr($arr_yn,$sta_tag,'');?>
     </select>
     <br />

    <span class="cgray">标签其他设置在 网站设置</span>

        </td>
    </tr>

  <tr>
      <td class="tr">相关文章：</td>
      <td> 
      字样：
      <input name="relativetitle" type="text"  value="<?php echo $relativetitle;?>" size="30">    
     <br />
    <span class="cgray">如果为空，则 前台不显示相关文章功能</span>

     <br />
   效果：
 
    
    <?php

$filedir = EFFECTROOTADMIN.'/relative/';

echo ' <select name="relativefg">';
select_from_filearr($filedir,$relativefg);
echo '</select>';
 
    
    $file = EFFECTROOTADMIN.'relative/'.$relativefg;
    $filename = 'base/block/relative/'.$relativefg;
   
    echo '<br />效果文件：';
    admcheckfile($file,$filename);
 
 
?>


        </td>
    </tr>


  
  
  <tr>
    <td></td>
    <td style="padding:10px"> <input class="mysubmit" type="submit" name="Submit" value="提交"></td>
  </tr>
 </table>
  <?php echo $inputmust;?>
</form>
<?php
}
?>

 