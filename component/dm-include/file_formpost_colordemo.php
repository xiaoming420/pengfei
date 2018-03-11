<?php 


 
$url = BASEURL;
$mb='';
$mb = @$_GET['mb'];
 
/*
if(isset($_GET['mb']))  { 
setcookie("curstyle",@$_GET['mb']);
$mb = $_GET['mb'];
}
//if(isset($_GET['url'])) $url = @$_GET['url'];
//if($url=='') $url = 'index.html';
*/

 
 

if($mb=='reset') {setcookie("curstyle",'');}
//else if($mb=='en') {jump('en');}
else{
 setcookie("curstyle",@$_GET['mb']);
 $sql = "SELECT * from ".TABLE_STYLE." where   pidname='$mb' and sta_visible='y' order by pos desc,pidname desc,id desc";
if(getnum($sql)==0){echo 'error style.';exit;}



//$ss = "update ".TABLE_LANG." set  curstyle='$mb'  where id='1' limit 1";
  //echo $ss;exit;
//iquery($ss);

 //jump($url);
 }


jump(BASEURL);
?>