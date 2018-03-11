<?php
/*
	欢迎使用DM企业建站系统，本系统由www.demososo.com开发。
*/
if(!defined('IN_DEMOSOSO')) {
	exit('this is wrong page,please back to homepage');
}
?>
<!--css-->
<?php 
//调公共的css
getcss_common();
?>

<?php
//if($sta_addthemecss=='y'){
// getCssSingle(TPLCURPATH.'css/theme.css');
//}

//是否调用sql样式
if($sta_sqlcss=='y'){
 getCssSingle(TPLCURPATH.'css/sql_'.$htmldir.'.css');
}
getCssSingle(TPLCURPATH.'css/'.$htmldir.'.css');
getCssSingle(TEMPLATEPATH.'base/css/responsive.css');
?>

<!--js-->
<?php
//调公共的js
getjs_common();
?>
<?php 
//调当前模板的js ，如果有就调，没有就不调，一般情况下没有这个js
$curmbjs = TPLCURROOT.'js/'.$htmldir.'.js';
if(is_file($curmbjs)) getJsSingle(TPLCURPATH.'js/'.$htmldir.'.js');
?>
