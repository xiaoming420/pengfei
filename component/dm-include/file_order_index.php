<?php
/*
	made by jason.zhang
*/
if(!defined('IN_DEMOSOSO')) {
	exit('this is wrong page,please back to homepage');
}
$title ='订单系统 ';
   $seo1[0] =$title;
    $seo2[0] =$title;
     $seo3[0] =$title;

 require_once DISPLAYROOT.'a_meta.php';
//require_once TPLBASEROOT.'vinc_meta.php';
?>


<div class="pagewrap">
 <?php // require_once(EFFECTROOT.'ddorder/ddorder_color.php');?>

<div class="orderform">
  <div class="form">

  <div class="header color_bg"><i class="fa fa-shopping-cart"></i> 快速下单</div>
  <div class="content color_border">


   <?php 
 
//pre($_POST);
//pre($_SESSION);
//pre($_COOKIE);

   require_once (EFFECTROOT.'ddorder/ddorder_form.php');?>



           
</div>
</div><!--end form-->

<div class="success">
   <div class="header color_bg"><i class="fa fa-bookmark-o"></i> 最近订单通知

   </div>
     <div  class="content color_border">
     	
    <?php require_once (EFFECTROOT.'ddorder/ddorder_success.php');?>



     </div>

</div><!--end success-->

  </div>  


</div>
<link href="<?php echo $csspath;?>css/ddorder.css" rel="stylesheet" type="text/css" />
 <script type="text/javascript" src="<?php echo $csspath;?>js/ddorder.js"></script>
        

 <script type="text/javascript" src="<?php echo $stapath;?>app/area.js"> </script>
  <script type="text/javascript">
 _init_area(); 

 
 mar('mar', 'mar1', 'mar2');
</script>

           
<div class="footer" style="margin-top:100px">    
<div class="container">  
    <?php  block('region20150726_1526443309');  ?>   
</div>
</div><!--end footer-->

<?php  require_once(EFFECTROOT.'prog/prog_colorddorder.php')  ?>

<style>
.sitecolorchange{bottom:500px;}
</style>
</body>
</html>
