<?php
/*
	欢迎使用DM企业建站系统，本系统由www.demososo.com开发。
*/
if(!defined('IN_DEMOSOSO')) {
	exit('this is wrong page,please back to homepage');
}

?>
<?php
$modtype='search';
//$searchkey=@$_POST['searchword']; _GET
$searchkey = @htmlentitdm($_POST['searchword']);

$bannertitle = $bannertext= $title =SEARCHTITLE;
 
$banner='';
	//--seo----
		$seo1v=$title.' '.$searchkey;
		$seo2v=$title.' '.$searchkey;
		$seo3v=$title.' '.$searchkey;
		//unset($seo1)
		//array_unshift($seo1, $curseo1);
		if($seo1v<>''){ $seo1[0] =$seo1v;} else  $seo1[0] =$title;
		if($seo2v<>''){ $seo2[0] =$seo2v;} else  $seo2[0] =$title;
		if($seo3v<>''){ $seo3[0] =$seo3v;} else  $seo3[0] =$title;
	 
?>

 

<?php
 $reqfile = '';
$reqfile = TPLCURROOT.'page_search.php';

if(!is_file($reqfile))   $reqfile = TPLBASEROOT.'page_search.php'; 
 
 //if($regionid<>'')  $reqfile = TPLCURROOT.'page_region.php';

if(is_file($reqfile)) require_once $reqfile;

else  echo 'no require file in file_search.php   ---file:'.$reqfile;

 
?>
