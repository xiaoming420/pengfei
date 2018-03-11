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
   
 //echo $ss;exit;
			iquery($ss); 	
		jump($jumpv_maineditcan);

	 

	
	}
	
else{
//$arr_can=$row['arr_can']; have done in mod_category.php,becaue need first get sta_field .

 
  
    $jump_insertupdatesub = $jumpv_file.'&act=update';




?>	
 
<div style="background:#e2e2e2;padding:10px;font-size:16px;font-weight:bold">其他参数：</div>
<form  onsubmit="javascript:return checkhere(this)" action="<?php  echo $jump_insertupdatesub;?>" method="post" enctype="multipart/form-data">
<table class="formtab">


   <tr>
      <td class="tr">相册设置：</td>
      <td>
      相册类型：
      <select name="album" class="form-control">
    <?php select_from_arr($arr_album,$album,'');?>
     </select>
   <span class="cgray"> （后面表示所在文件的位置,在 component/effect 下面。）    </span>


    <div class="inputclear"></div>

  
     相册的样式名称： 
      <input name="albumcssname" class="inputcss form-control"  type="text" value="<?php echo $albumcssname?>" size="60"><?php echo $xz_maybe; ?> 

         <br />
      <span class="cgray">（参考：  gridbigimg ）  </span>
       

       
     <div class="inputclear"></div>

      相册位置：<br />
位于内容的下面：<select name="albumposi">
    <?php select_from_arr($arr_yn,$albumposi,'');?>
     </select>
    <br />
    <span class="cgray">(默认相册位于内容的下面，否则位于内容的上面。)</span>
 
    


        </td>
    </tr>
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
      <td class="tr">立即下单字样：</td>
      <td>
      <input name="ordernowtitle" type="text"  value="<?php echo $ordernowtitle;?>" size="30" />
 
    
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
      <td class="tr">缩略图是否由kv图片产生：</td>
      <td><select name="sta_kvtothumb">
    <?php select_from_arr($arr_yn,$sta_kvtothumb,'');?>
     </select>
    
        </td>
    </tr>

  
  <tr>
      <td class="tr">开启字段属性：</td>
      <td><select name="sta_field">
    <?php select_from_arr($arr_yn,$sta_field,'');?>
     </select>
    <div class="c5"> </div>
    属性标题的字样：<input name="field_title" type="text"  value="<?php echo $field_title;?>" size="30">
    

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
   格式：
<select name="relativefg">
    <?php 
 
    select_from_arr($arr_relativefg,$relativefg,'');?>
     </select>

        </td>
    </tr>


  <tr>
      <td class="tr">备注标题：</td>
      <td>

      
  备注1：<input name="field_titlebz1" type="text"  value="<?php echo $field_titlebz1;?>" size="20" />
    <div class="c5"> </div>

  备注2：<input name="field_titlebz2" type="text"  value="<?php echo $field_titlebz2;?>" size="20" />
    <div class="c5"> </div>

  备注3：<input name="field_titlebz3" type="text"  value="<?php echo $field_titlebz3;?>" size="20" />
 
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

 