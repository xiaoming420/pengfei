<?php
define("IN_DEMOSOSO", false); //TRUE //false
$userdir='user_20130601_2148331669';
$test='n';
 $baseurl='http://'.substr($_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'],0,-10); 
//echo $baseurl;
// routeid=$1&ifalias=n&file=baidumap&page=1
$routeid=25;//no use ,because override in file_inc
$ifalias='n';
$file='search';//it need here
 
/*
上面是通过程序判断的，如果网站域名固定，可以在这里直接写好。以http开头，以斜杠结束。然后把上面的注释了。
$baseurl = 'http://www.yoursite.com/'; 

*/
 
 //print_r($_SERVER);
 

require_once "indexDM_load.php";




 
?>