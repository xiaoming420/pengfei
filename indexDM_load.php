<?php 
if(!defined('IN_DEMOSOSO')) {
	exit('this is wrong page,please back to homepage');
}
define('BASEURL',$baseurl); 
define("HOSTNAME", $_SERVER['HTTP_HOST']);

ini_set('display_errors', TRUE);//false
//ini_set("error_reporting","E_ALL & ~E_NOTICE"); 
  //ini_set('display_errors', FALSE);
//define('WEB_ROOT', substr(dirname(__FILE__), 0, -4));
//define('TPLBASEROOT',WEB_ROOT.'html/');
//define('SES_ROOT',WEB_ROOT.'cache\ses'); 
//change below in single website

define( 'WEB_ROOT', dirname(__FILE__) . '/' );
//define('WEB_ROOT', substr(dirname(__FILE__), 0, -22));
$installfile = WEB_ROOT.'zzdatabase.php';
 
if(is_file($installfile)){
    echo  '<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />';
	echo '出现这个信息，是因为还没有配置数据库信息或是没有删除zzdatabase.php，<br /><br />如果已经配置好了数据库，请删除或改名zzdatabase.php<br /><br />';
	echo '<a href="zzdatabase.php">点击这里配置数据库信息>>></a><br /><br /><br />';
	exit;
}

 



define('SES_ROOT',WEB_ROOT.'cache/session'); 
define('INCLUDE_ROOT',WEB_ROOT.'component/dm-include/'); 
define('TEMPLATEROOT',WEB_ROOT.'DM-template/'); 
define('TEMPLATEPATH',$baseurl.'DM-template/'); 
define('ADMINDIR',@$_COOKIE['admindir']); 
define('ISADMIN',@$_COOKIE['isadmin']); 

// echo dirname(__FILE__).'<br />'; 

//  echo TPLBASEROOT.'<br />'; 
 // echo WEB_ROOT.'<br />'; 
 //echo SES_ROOT.'<br />';  
$PHP_SELF=$_SERVER['PHP_SELF'];

 
//--
$cfg_cinc='component/dm-config/'; 
require_once WEB_ROOT.$cfg_cinc.'inc_table.php';
require_once WEB_ROOT.$cfg_cinc.'config.php';
require_once WEB_ROOT.$cfg_cinc.'text_can.php';
//require_once WEB_ROOT.$cfg_cinc.'fsession.php';
require_once WEB_ROOT.$cfg_cinc.'database.php';
require_once WEB_ROOT.$cfg_cinc.'mysql.php';
require_once WEB_ROOT.$cfg_cinc.'global.common.php';
 
//front func echo SES_ROOT.'<br />'; 


$targetv = ''; //$targetv is set in page_search, and list_text.php
$routeid='';$alias='';$ifalias='';$offset=5;$page_total='';
$pagesql='';//$pagesql is diff $page,just for seo ,like page-2.html is ok,if total is 2,then  page-22 will 404 page.
//$page is from _GET[],$pagesql is from and more than $page,like juse if >page_total.
//so if $page maybe is 22,but $pagesql is limit page_total 2.
$routeid = @htmlentitdm($_GET['routeid']);
$alias = @htmlentitdm($_GET['alias']);  
$ifalias = @htmlentitdm($_GET['ifalias']);
if(@$file=='')  $file = @htmlentitdm($_GET['file']);
$detailid = @htmlentitdm($_GET['detailid']);$brandid = @htmlentitdm($_GET['brandid']);
$page = @htmlentitdm($_GET['page']);
$pagelayout ='';

	/*------------some variable------------*/	
		$title='';	
		$pid=$curpidname = $pidname ='';
		$maintitle = $mainpid= $mainpidname= $mainalias='';//parent parent
		$modtype='';
		$sidebarcss =  $contentcss =  $bodycss='';		

		$maxline= $listfg ='';	
		$breadarr = array(); 
		$seo1 = array();$seo2 = array();$seo3 = array();
		//array_push($stack, "apple", "raspberry");
		//array_unshift($seo1, $row['seo1']);


//
$act = @htmlentitdm($_GET['act']);$act2 = @htmlentitdm($_GET['act2']);$pidname = @htmlentitdm($_GET['pidname']);
$alias = @htmlentitdm($_GET['alias']);$tid = @intval($_GET['tid']);
$catid = @intval($_GET['catid']);
//$page = @intval($_GET['page']);//page is in file_inc.php
$fid = @intval($_GET['fid']);$search = @htmlentitdm($_GET['search']);$searchpage = @htmlentitdm($_GET['searchpage']);//htmlspecialchars
//
if(empty($act)) $act='index';
if($catid=='') $catid=0;
 if (!isset($page)||($page<=0)) $pagesql=1;// other judge in display/plugin_pager.php 
 else $pagesql=$page;
//echo '<br>page:'.$page;
/*------------some variable------------*/	

$dateall = date("Y-m-d H:i:s");
$dateday = date("Y-m-d");

 //$lang_temp ='cn';
$langpath = @htmlentitdm($_GET['lang']);
if($langpath=='') $langcur = $mainlang;
else{
				
		$langcur = get_field(TABLE_LANG,'lang',$langpath,'path');



		if($langcur=='noid'){
		  require(WEB_ROOT.'DM-block/template/base/page_404lang.php');
 
		   exit;	
		}
		
 }
 
 
define('LANG', $langcur); 
define('LANGPATH', $langpath); 

 
//$baseurldefault = str_replace("$langpath","",$baseurl);
if(ENABLEMULTILANG=='y'){
if(LANG<>$mainlang) { 
	//$baseurl= $baseurl.$langpath.'/';
	define('BASEURLPATH',$baseurl.$langpath.'/');
}
else{
     define('BASEURLPATH',$baseurl); 
}
}
else{
	 define('BASEURLPATH',$baseurl); 
}
 
 
//echo $baseurldefault.'===';

//echo LANG.'......LANG---';
/*------------------------------------*/
$sql = "SELECT bh from ".TABLE_USER." where userdir='$userdir'   limit 1";
	if(getnum($sql)==0){ echo  'not exist user...';exit;}
	else{
		$row = getrow($sql);
		$userbh = $row['bh'];
		define('USERBH', $userbh);		
		$andlangbh=" and lang='".LANG."'  and pbh='".USERBH."' ";
		$noandlangbh=" lang='".LANG."'  and pbh='".USERBH."' "; 
		define('ANDLANGBH', $andlangbh);
		define('NOANDLANGBH', $noandlangbh);
		
	 
		
		$sql = "SELECT * from ".TABLE_LANG." where lang='".LANG."'  limit 1"; 
		$row = getrow($sql);
		if($row=='no') die('sorry,no lang...'.LANG);
		$websitename = $row['sitename'];
		//define('IMGFOLDER', $row['imgfolder']);
		//$uploaddir=IMGFOLDER.'/';//MOVE from config.php -----front not use imgfolder
		$langpath = $row['path'];
		$arr_assets = $row['arr_assets'];$arr_basicset = $row['arr_basicset'];$arr_smtp = $row['arr_smtp'];
		
		$curstyle =  $curstylenow = $row['curstyle'];//use for if editlink
	


		// if(@$_COOKIE["curstyle"]<>'') 		$curstyle = $_COOKIE["curstyle"];
		 //else $curstyle = $row['curstyle'];
 
        //-----arr_basicset---------------------
	$bscntarr = explode('==#==',$arr_basicset); 
     if(count($bscntarr)>1){
          foreach ($bscntarr as   $bsvalue) {
             if(strpos($bsvalue, ':##')){
               $bsvaluearr = explode(':##',$bsvalue);
               $bsccc = $bsvaluearr[0];
               $$bsccc=$bsvaluearr[1];
             }
          }
      }



		define('CSSVERSION',$cssversion);		 
		define('STA_FRONTEDIT',$sta_frontedit);


 
		/*---------some config, other in config.php above require*/
		 
				$stapath=$baseurl.$stadir;
				define('STAPATH', $stapath); 
				define('STAROOT',WEB_ROOT.$stadir);  
				define('UPLOADROOT',STAROOT.'upload/');
				define('UPLOADROOTIMAGE',STAROOT.'upload/image/');
				define('TMIMG',STAPATH.'img/tm.gif'); 

				define('FEIMGPATH',STAPATH.'upload/feimg/');
				define('LIBSPATH',STAPATH.'app/libs/');

				


        define('ADMIN', 'n');//use url function when link target 	
		//---------------
 
// $bsbanner=$bsbannermob=$bsindex=$bsindexmob=$bsmenu=$bsfooter=$bsfootermob=$bsfooternavmob='';
$sqlstyle = "SELECT * from ".TABLE_STYLE." where pidname='$curstyle' $andlangbh limit 1"; 
 //echo $sqlstyle;exit;
if(getnum($sqlstyle)>0){
	$rowstyle = getrow($sqlstyle);
	 // pre($rowstyle);
   $sta_sqlcss = $rowstyle['sta_sqlcss']; 
	$style_blockid = $rowstyle['style_blockid'];
	$pidmenu = $rowstyle['pidmenu'];$pidregion = $rowstyle['pidregion'];
	$blockdir = $rowstyle['blockdir'];
	$htmldir = $rowstyle['htmldir'];
	$sta_bootstrap = $rowstyle['sta_bootstrap'];
 
	/*------------css dir--------------------------------------*/
	  
       define('TPLBASEROOT', TEMPLATEROOT.'base/');//base hmtl dir
       if(!is_dir(TPLBASEROOT)) echo '<p style="padding:10px;background:red">base模板目录不存在！</p>';
		   //alert('html目录'.$htmldir.'不存在！'); 

          define('HTMLDIR', $htmldir);
           define('TPLCURROOT', TEMPLATEROOT.$htmldir.'/'); //cur html dir
		  //echo TPLCURROOT;
       if(!is_dir(TPLCURROOT))  echo '<p style="padding:10px;background:red"> 模板目录'.$htmldir.'不存在！</p>';
       
	   define('TPLCURPATH',TEMPLATEPATH.$htmldir.'/'); 

         define('DISPLAYROOT',TPLBASEROOT.'display/');         
          define('PARTROOT',TPLBASEROOT.'part/');
		define('EFFECTROOT',TPLBASEROOT.'block/');//old is effect,now is base/block
		define('VIPBLOCKROOT',TPLBASEROOT.'vipblock/');
		
           
      define('TPLBASEPATH', TEMPLATEPATH.'base/');
      define('VIPBLOCKPATH', TEMPLATEPATH.'base/vipblock/');
      

       define('DEFAULTIMG',STAPATH.'img/defaultimg.jpg');
       define('DEFAULTIMGDIV','<img src="'.DEFAULTIMG.'" alt="" />');


	/*-----------style_blockid-----------------*/
    $bscntarr = explode('==#==',$style_blockid); 
     
    $bsbannertop=$bsbanner=$bsbannermob=$bsindex=$bsindexmob=$bsmenu=$bsheadertop=$bsheader=$bsheaderlogo=$bsheadertext=$bsheadersearch=$bsfooterbegin=$bsfooter=$bsfooterbar=$bsfooterlast=$bsfooternavmob=$bsblock404=$sta_narrowscreen=$sta_header_fullwidth=$sta_menuright=$sta_menufix='';
//bsfooterbegin,bsheaer no use, add footercols and links, add logo and text and search....
  

     if(count($bscntarr)>1){
        foreach ($bscntarr as   $bsvalue) {
           $bsvaluearr = explode(':##',$bsvalue);
           $bsccc = $bsvaluearr[0];
           $$bsccc=$bsvaluearr[1];
        }
    }
    

  }
 else{
 	echo 'sorry,not found,maybe style and lang not match......pls refresh page, or contact us: www.demososo.com';
 	setcookie("curstyle",'');//the reste cookie........
 	exit;
 }
 

//----------------------
	 
}


//--------cdn-----------------
//http://v3.bootcss.com/getting-started/#download
//----$arr_assets----------
$bscntarr = explode('==#==',$arr_assets); 
     if(count($bscntarr)>1){
          foreach ($bscntarr as   $bsvalue) {
             if(strpos($bsvalue, ':##')){
               $bsvaluearr = explode(':##',$bsvalue);
               $bsccc = $bsvaluearr[0];
               $$bsccc=$bsvaluearr[1];

               if($$bsccc<>'') $arr_cdn[$bsccc] = $$bsccc;  //$arr_cdn in config.php,if admin no value,then use config.php
             }
          }
      }
    


if($cdn<>'' && $sta_cdn=='y')   define('UPLOADPATH', $cdn.'/upload/');
else define('UPLOADPATH', $stapath.'upload/');
define('UPLOADPATHIMAGE', UPLOADPATH.'image/');

?>
<?php
require_once INCLUDE_ROOT.'func_frontcommon.php';

if(ENABLEMULTILANG=='y') $langfile = 'lang_'.LANG;
else $langfile = 'lang_cn';
 require_lang($langfile);
require_once INCLUDE_ROOT.'func_block.php';
//function layoutcur($pid,$type){  //invoke is in page
require_once INCLUDE_ROOT.'func_layout.php';
layoutcommon(); //must need
require_once INCLUDE_ROOT.'file_inc.php';


				

?>
