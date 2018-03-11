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
<div class="pagewrap">
 
 
 <?php 

//pre($_POST);
//pre($_SESSION);
//pre($_COOKIE);

$token = zbdesp_onlyinsert(@$_POST['token']);

$productcookie = @$_COOKIE['productcookie'];

if($token<>$_SESSION["token"]){alert('非法操作!');jump('index.php');}

if(count($_POST)>0){

$num = zbdesp_onlyinsert($_POST['num']);
$price = zbdesp_onlyinsert($_POST['danprice']);
//$product = zbdesp_onlyinsert($_POST['product']);
$username = zbdesp_onlyinsert($_POST['username']);
$productname = zbdesp_onlyinsert($_POST['productname']);
$cellphone = zbdesp_onlyinsert($_POST['cellphone']);


$area1 = zbdesp_onlyinsert($_POST['area1']);
$area2= zbdesp_onlyinsert($_POST['area2']);
$area3 = zbdesp_onlyinsert($_POST['area3']);

$address = zbdesp_onlyinsert($_POST['address']);
$comment = zbdesp_onlyinsert($_POST['comment']);
}

$ppid='productpid1';
$pidname = 'product'.$bshou;
//pid is product id,but no use
$pid='';
$ip= getip();


$sql2 = "SELECT id from ".TABLE_DDORDER." where  productcookie='$productcookie' $andlangbh order by id desc";
$sqlnum = getrow($sql2);
if($sqlnum >=1)
{   
alert('请不要重复提交！');jump('ddorder.php');
}
		else{

		$sql2 = "SELECT id from ".TABLE_DDORDER." where  ip='$ip' and dateday='$dateday'  $andlangbh order by id desc";
		$sqlnum = getnum($sql2);
		 
		//echo $sqlnum;




		if($sqlnum>=5){
			alert('当天下单限制5个！');jump('ddorder.php');
		}
		else{



		$ss = "insert into ".TABLE_DDORDER." (ppid,pbh,pidname,username,productname,num,price,cellphone,area1,area2,area3,address,comment,lang,dateedit,dateday,ip,productcookie) values ('$ppid','".USERBH."','$pidname','$username','$productname','$num','$price','$cellphone','$area1','$area2','$area3','$address','$comment','".LANG."','$dateall','$dateday','$ip','$productcookie')";
				 	// echo $ss;exit;
		iquery($ss);	
		$jumpv = 'ddorder_detail.php?detailid='.$pidname;
		//echo $jumpv;
		 //exit;
	 jump($jumpv);

		}
}
 ?>

</div>

</body>
</html>
