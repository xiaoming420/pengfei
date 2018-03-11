<?php
/*
	made by jason.zhang
*/
if(!defined('IN_DEMOSOSO')) {
	exit('this is wrong page,please back to homepage');
}
 require_once DISPLAYROOT.'a_meta.php';
//require_once TPLBASEROOT.'vinc_meta.php';
?>
<div class="pagewrap pagedetail">
 <div class="orderform">
 <div class="form"  style="width:100%">
   <div class="header color_bg"><i class="fa fa-shopping-cart"></i> 下单成功</div>
  <div class="content color_border">

<?php 

$sql = "SELECT * from ".TABLE_DDORDER." where  pidname = '$detailid'  $andlangbh  order by id limit 1";
  //  echo $sql;
$row = getrow($sql);

 if($row<>'no'){
     //pre($row);
$num = $row['num'];
$price = $row['price'];
$totalprice = $num*$price;
$productname = $row['productname'];
$username = $row['username'];
$cellphone = $row['cellphone'];
$area1 = $row['area1'];
$area2 = $row['area2'];
$area3 = $row['area3'];
$address = $row['address'];
$comment = $row['comment'];
$dateedit = $row['dateedit'];

$despbz = $row['despbz'];

$sta_order = $row['sta_order'];

 $sta_orderV = select_return_string($arr_order,0,'',$sta_order);
       ?>


<ul>
      <li>
        <div class="w1">下单时间：</div>
        <div class="w2"><?php echo $dateedit?>
         </div>
    </li>

       <li>
        <div class="w1">产品：</div>
        <div class="w2"><?php echo $productname?>
         </div>
    </li>

<li>
        <div class="w1">价格：</div>
        <div class="w2"> <span class="price"> <?php echo $price?></span>元
         </div>
    </li>

      <li>
        <div class="w1">订购数量：</div>
         <div class="w2 num">
              <?php echo $num?>
          </div>
    </li>
<li>
        <div class="w1">总价：</div>
        <div class="w2"><span class="price"> <?php echo $totalprice?></span>元
         </div>
    </li>
  <li>
        <div class="w1">客户姓名：</div>
        <div class="w2"><?php echo $username?>
         </div>
    </li>

      <li>
        <div class="w1">客户手机：</div>
        <div class="w2"><?php echo $cellphone?>
         </div>
    </li>

 <li>
        <div class="w1">选择地区：</div>
        <div class="w2">
                   <?php echo $area1?>&nbsp;&nbsp;
                   <?php echo $area2?>&nbsp;&nbsp;
                   <?php echo $area3?>

         </div>
    </li>

  <li>
        <div class="w1">详细地址：</div>
        <div class="w2"> <?php echo $address?>  
         </div>
    </li>
  <li>
        <div class="w1">客户留言：</div>
        <div class="w2">
             <?php echo $comment?>
         </div>
    </li>



      <li>
        <div class="w1">支付方式：</div>
        <div class="w2 pay"> 货到付款 
         </div>
    </li>
   <li>
        <div class="w1">订单状态：</div>
        <div class="w2 pay">  <?php echo $sta_orderV?>
         </div>
    </li>
  <?php if($despbz<>''){?>
 <li>
        <div class="w1">备注：</div>
        <div class="w2 pay">  <?php echo $despbz?>
         </div>
    </li>
  
<?php }?>
 
 
</ul>


 
<?php 
}
else {
   echo '没有内容';

}

?>
</div><!--end content-->
</div>
</div>

</div><!-- end pagewrap -->
<link href="<?php echo $csspath;?>css/ddorder.css" rel="stylesheet" type="text/css" />
<script type="text/javascript">
  /*
   $(function(){

            var totalprice = $('.num').text()*$('.danprice').text();
            $('.totalprice').text(totalprice);


   });*/

</script>

<div style="padding:20px;text-align:center"> <a href="ddorder.php"  style="font-size:26px"><返回</a></div>
<div class="footer" style="margin-top:100px">    
<div class="container">  
    <?php  block('region20150726_1526443309');  ?>   
</div>
</div><!--end footer-->

 
</body>
</html>


