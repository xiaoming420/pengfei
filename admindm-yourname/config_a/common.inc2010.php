<?php 
ini_set('display_errors', TRUE);//false  //TRUE
//ini_set("error_reporting","E_ALL & ~E_NOTICE"); 
define('IN_DEMOSOSO', TRUE);
//define('HERE_ROOT', substr(dirname(__FILE__), 0, -7));//include - 7,inc-3
//define('HERE_ROOT', dirname(__FILE__));//这是一个知识点，这是根目录，
define('HERE_ROOT', substr(dirname(__FILE__), 0, -8));//这是本目录。3 mean inc number.is incc ,then is 4./通常是用这个。方便每个目录下的文件用这个。此法也是为了rewrite .
//THE folder need to be end by '\'  

$sta_kvtothumb ='';

$dirnamefile = dirname(__FILE__);

$dirnamefile=str_replace('\\','/',$dirnamefile);
 
$heredir_arr = explode('/',$dirnamefile);
$heredir_arr2 = array_slice($heredir_arr,-2,1);

$heredirlen = count($heredir_arr)-2;
$heredir_root = array_slice($heredir_arr,0,$heredirlen);  
$heredir_root_string = implode('/', $heredir_root).'/';



define('WEB_ROOT', $heredir_root_string);
 


$adminstring = $heredir_arr2[0];
if(substr($adminstring,0,8)<>'admindm-'){
	echo '<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />';
	echo '后台目录必须以admindm-开头，比如admindm-yournameyourname*** (admindm-后面不受限制)';
	exit;}



//define('WEB_ROOT',substr(HERE_ROOT, 0, -16));
define('SES_ROOT',WEB_ROOT.'cache/session'); 
define('ADMIN', 'y');//use url function link target 
   //echo WEB_ROOT.'CM-static';
  //echo UPLOADROOTIMAGE; 
$submenu='';
 $baseurl_def = $_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'];
  $php_self = $_SERVER['PHP_SELF'];
 //echo $baseurl_def;
 //echo '<br />';
$baseurlarr = explode("/", $baseurl_def);
$baseurl_dir_len=count($baseurlarr)-3; 
$baseurl_root = array_slice($baseurlarr,0,$baseurl_dir_len);
//echo $baseurl_dir_len;
$baseurl_root_string = implode('/', $baseurl_root).'/'; 
$baseurl = 'http://'.$baseurl_root_string;//16 is admin_yourname1
define("BASEURL", $baseurl);
define("HOSTNAME", $_SERVER['HTTP_HOST']);
//echo BASEURL;
  	$user2510='bh2010079002demososo';	//also  in login.php....
	define('USERBH', $user2510);  //user2510 and USERBH need baoliu...,

define('TEMPLATEROOT',WEB_ROOT.'DM-template/'); 
define('TEMPLATEPATH',BASEURL.'DM-template/'); 
//define('BLOCKROOT',WEB_ROOT.'DM-block/blockfolder/'); 
//define('BLOCKPATH',BASEURL.'DM-block/blockfolder/'); 

//-----------------------------------------------------
 require_once WEB_ROOT.'component/dm-config/inc_table.php'; //move to above
 require_once WEB_ROOT.'component/dm-config/config.php';//move to above
 require_once WEB_ROOT.'component/dm-config/text_can.php';
require_once WEB_ROOT.'component/dm-config/database.php';
require_once WEB_ROOT.'component/dm-config/mysql.php';

function htmlentitdm2($v){   
   return htmlentities(trim($v),ENT_QUOTES,"utf-8");
}//end func
 
if(!isset($_GET['lang']) || trim($_GET['lang'])=='') { echo 'sorry,no lang...';exit; }

 //$lang_temp = @htmlentitdm($_GET['lang']);
$lang_temp = htmlentitdm2(trim($_GET['lang']));

if($lang_temp=='') $lang_temp =$mainlang;
 
 define('LANG', $lang_temp); 
 //$langpath = get_field(TABLE_LANG,'path',LANG,'lang');

   $sql  = "SELECT path,imgfolder from ".TABLE_LANG." where   lang='".LANG."' and pbh='".USERBH."' order by id limit 1";//pidname is not path;
   			 if(getnum($sql)==0){
   			 	echo '<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />';
				 	$websitename = '提示：当前语言出错,请重新登录！';
				 	//alert($websitename);
				 	 echo '<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /><script>window.alert("'.$websitename.'")</script>';
					 echo $websitename;exit;
			 }
		     else{
				 	$row = getrow($sql);	
					 $langpath = $row['path'];
					 $uploaddir = $row['imgfolder'].'/';

				 }

 
if(ENABLEMULTILANG=='y'){
if(LANG==$mainlang) {

	$fronturl= $baseurl.'adminfrom.php?to='.BASEURL;
	//$userurl= $baseurl.'adminfrom.php?to=';
	define('BASEURLPATH', $baseurl); 

}
else{

	$fronturl= $baseurl.'adminfrom.php?to='.BASEURL.$langpath.'/';
	//$userurl= $baseurl.'adminfrom.php?to='.$langpath.'/';
	define('BASEURLPATH', $baseurl.$langpath.'/');

}
}
else{
	$fronturl= $baseurl.'adminfrom.php?to='.BASEURL;
	//$userurl= $baseurl.'adminfrom.php?to=';
	define('BASEURLPATH', $baseurl); 
}

$userurlnopath= $baseurl.'adminfrom.php?to=';
$userurl = $userurlnopath; //history ques

 $adminurl = '../mod_common/mod_index.php?lang='.LANG;
 
//---------------------------------------

 
//require_once WEB_ROOT.'component/dm-config/inc_table.php'; //move to above
//require_once WEB_ROOT.'component/dm-config/config.php';//move to above

require_once WEB_ROOT.'component/dm-config/global.common.php';
require_once HERE_ROOT.'config_a/func.2010.php';
require_once HERE_ROOT.'config_a/func.2010.select.php';
require_once HERE_ROOT.'config_a/func.2010.lang.theme.php';
require_once HERE_ROOT.'config_a/func.2010.if.php';

 //----------
$stapath=$baseurl.$stadir;
define('STAPATH', $stapath);  define('ASSETSPATH', $stapath.'assets/');
define('UPLOADPATH', $stapath.'upload/');
define('UPLOADPATHIMAGE', UPLOADPATH.'image/');
define('STAROOT',WEB_ROOT.$stadir);  define('ASSETSROOT',WEB_ROOT.$stadir.'assets/');
define('UPLOADROOT',STAROOT.'upload/');
define('UPLOADROOTIMAGE',STAROOT.'upload/image/');
define('TMIMG',STAPATH.'img/tm.gif');
//-------
//echo '<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />';
 

	 
	// pre($_SESSION);
	//session......
	 

	//no other use,only for session;
			//	 $ses1='ses1_'.$userdir;
			//	 $ses2ps='ses2_'.$userdir;

				 
//	$userdirr2=@$_SESSION[$ses1];	   
	//$userps=substr(@$_SESSION[$ses2ps],0,-6);
//@$_COOKIE["curstyle"]
      $cookiesecret='xylive029';
	  $usercookie=@$_COOKIE['usercookie'];	
	   
	  $useridarr = explode("-", $usercookie); 
	  $userid = $useridarr[0];

	
	  // pre($_SESSION);exit;
	
	$ss_98373="select * from  ".TABLE_USER."  where id='$userid'  order by id desc limit 1";
	 // echo $ss_98373;//exit;
 
	$rowweb = getrow($ss_98373);
	$logouturl = '../mod_common/logout.php';
	if($rowweb=='no'){
		 //alert('out');
	    jump($logouturl);
	} {
          $userps = $rowweb['ps']; 
          $usercookievcompare = $userid.'-'.md5($userps.$cookiesecret);
        // echo '<Br>'.$usercookievcompare;
        // echo '<Br>'.$usercookie;

          if($usercookievcompare<>$usercookie) 
          	{
          		 jump($logouturl);
          	}
	}
//-----------------
	$usertype = $rowweb['type'];$user_stanoaccess = $rowweb['user_stanoaccess'];
	$useremail = $rowweb['email'];//use for tpl_account.php
	$arrayprevi = $rowweb['previ'];
	if(!isset($mod_previ)) $mod_previ = 'admin'; 
	 //first set admin here. default all is admin.then other set normal. like node,alias , feildvalue,album...etc.


//-end login or out-------------------------------------------------------------------------
//------------------------------------------



$act = @htmlentitdm($_GET['act']);$act2 = @htmlentitdm($_GET['act2']); 
$tid = @htmlentitdm($_GET['tid']);  if($tid<>'') $tid = @intval($_GET['tid']); 
$theme = @htmlentitdm($_GET['theme']);  $themeid = @htmlentitdm($_GET['themeid']);   
$submit = @htmlentitdm($_GET['submit']);$file = @htmlentitdm($_GET['file']);$file2 = @htmlentitdm($_GET['file2']);
$catid = @htmlentitdm($_GET['catid']);$catpid = @htmlentitdm($_GET['catpid']);$catzj = @htmlentitdm($_GET['catzj']);
$pidname = @htmlentitdm($_GET['pidname']);$pidname2 = @htmlentitdm($_GET['pidname2']);
$ppid = @htmlentitdm($_GET['ppid']);$pid = @htmlentitdm($_GET['pid']);$pid2 = @htmlentitdm($_GET['pid2']);
$page = @intval($_GET['page']);
$v = @htmlentitdm($_GET['v']);$success = @htmlentitdm($_GET['success']);
$name = @htmlspecialchars($_GET['name']);//htmlspecialchars avoid zhongwen
$bs = @htmlentitdm($_GET['bs']);$editid = @htmlentitdm($_GET['editid']);$editid2 = @htmlentitdm($_GET['editid2']);
$type = @htmlentitdm($_GET['type']);$pidtype = @htmlentitdm($_GET['pidtype']);
$type2 = @htmlentitdm($_GET['type2']);
$position = @htmlentitdm($_GET['position']);//for block
$key = @htmlentitdm($_GET['key']);

if($act == "")$act = "list";
 if($file == "")$file = "list"; 
 $page_total = 0;
//about lang 
$script_name = $_SERVER['SCRIPT_NAME'];//$pos = strpos($mystring, $findme);


//no need set mainlang
  $sqlmain = "SELECT * from ".TABLE_LANG." where   lang='".LANG."' and pbh='".USERBH."' order by id limit 1";//pidname is not path;
				
				 if(getnum($sqlmain)==0){
				 	$websitename = '提示：当前语言出错,请重新登录！';alert($websitename);
					 echo $websitename;exit;}
				 else{


				 		$rowlang= getrow($sqlmain);
					   $websitename = $rowlang['sitename'];
					   if($websitename =='') $websitename ='请填写标题';
					   $water = $rowlang['water'];
					   $arr_basicset = $rowlang['arr_basicset'];					 
					   $curstyle = $rowlang['curstyle']; 

				
 
					  
	  
					   define('TPLBASEROOTADMIN',WEB_ROOT.'DM-template/base/');
					   
					   define('EFFECTROOTADMIN',WEB_ROOT.'DM-template/base/block/'); 
					   define('VIPBLOCKROOTADMIN',WEB_ROOT.'DM-template/base/vipblock/'); 
					   
					   if($water<>'') {$waterimg= UPLOADROOTIMAGE.$water;$up_water='y';}
					   else {$waterimg='';$up_water='';}


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


					 }


//-------------end lang --------------------------------------------------------------
if($mod_previ=='admin')		
require_once HERE_ROOT.'config_a/func.previ.php';//put here,because need lang
//-----------
require_once HERE_ROOT.'config_a/text.2010.php';//put here,because need lang
require_once HERE_ROOT.'config_a/text.2010.blocktpl.php';//put here,because need lang

// if(LANG=='cn') $arr_stylebh = $arr_stylebh_cn;
// else if(LANG=='en') $arr_stylebh = $arr_stylebh_en;
// else   $arr_stylebh = $arr_stylebh_other;

 

//if mod_previ is normal,then require is in mod.php.bec need catid variable.
//-----------------------------------------------------
 
$andlangbh=" and lang='".LANG."'    and pbh='".USERBH."' ";
define('ANDLANGBH', $andlangbh);
$noandlangbh=" lang='".LANG."' and pbh='".USERBH."' ";
define('NOANDLANGBH', $noandlangbh);
$noandlangbh2=" lang='".LANG."'  and pbh='".USERBH."' ";//use in custom menu...

$up_add_s='n';
//---------------------------------
					   $sqlstyle = "SELECT * from ".TABLE_STYLE." where pidname='$curstyle' $andlangbh limit 1"; 
					    $rowstyle = getrow($sqlstyle);
					   //  pre($rowstyle);
					    $style_blockid = $rowstyle['style_blockid'];
					     $pidmenu = $rowstyle['pidmenu'];$pidregion = $rowstyle['pidregion'];

					      
					     $htmldir = $rowstyle['htmldir'];	$pidfoldercur = $rowstyle['blockdir'];	
						 
						 define('HTMLDIR',$htmldir);
						 define('TPLCURROOTADMIN',WEB_ROOT.'DM-template/'.$htmldir.'/');
						 define('DEFAULTIMG',STAPATH.'img/defaultimg.jpg');
    					define('DEFAULTIMGDIV','<img src="'.DEFAULTIMG.'" alt="" />');


						define('PIDFOLDERCUR',$pidfoldercur);

					      
					    /*-----------style_blockid-----------------*/
					    $bscntarr = explode('==#==',$style_blockid); 
					     
					    $bsbannertop=$bsbanner=$bsbannermob=$bsindex=$bsindexmob=$bsmenu=$bsheadertop=$bsheader=$bsfooterbegin=$bsfooter=$bsfooterlast=$bsfooternavmob=$bsblock404=$sta_narrowscreen=$sta_header_fullwidth=$sta_menuright=$sta_menufix='';

					  

					     if(count($bscntarr)>1){
					        foreach ($bscntarr as   $bsvalue) {
					           $bsvaluearr = explode(':##',$bsvalue);
					           $bsccc = $bsvaluearr[0];
					           $$bsccc=$bsvaluearr[1];
					        }
					    }
					    //-------------------

$stylename = '<div class="stylename">当前模板：<span style="color:blue">'.get_field(TABLE_STYLE,'title',$curstyle,'pidname').'</span> ('.$curstyle.' - '.HTMLDIR.')</div>';


//-------------

?>
 

