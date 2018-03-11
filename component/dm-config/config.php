<?php
  
$stadir='DM-static/';
//$uploaddir=IMGFOLDER.'/';-- front not need imgfolder.
 
 date_default_timezone_set('Asia/Shanghai'); //设置时区
 // echo date('d-m-Y H:i:s');
 
//$stapath=$baseurl.$stadir;
//define('STAPATH', $stapath);  //  all move to indexDM_load.php
 
$PHP_SELF=$_SERVER['PHP_SELF'];

//------------
$attach_type=array('jpg','gif','jpeg','png','swf','rar','ico','zip','docx','xlsx','pptx');//限制上件文件的扩展名
$attach_size=630200;//限制上件文件的大小
$format_t=implode(' .',$attach_type);
$format_t=  '支持的格式：.'.$format_t.'  ，附件不能大于'.intval($attach_size/1024).'K。';

$album_s_w=280;
$album_s_h=280;
//------------

//---------
define('ENABLEMULTILANG','n'); //use for admin link suffix  
$mainlang = 'cn'; //set main lang when multilang,and set front site when hangye site
define('MAINLANG', $mainlang); 

$arr_lang=array('cn'=>'中文(默认网站)',
  //'en'=>'英语',
 // 'fr'=>'法语',
  // 'jp'=>'日语',
  //   'kr'=>'韩语','cckcr'=>'韩c语',
  //  'wuliu'=>'物流网站',
  //  'drone'=>'无人机',
  );
//----------------------
$salt = '00';
$sespshou='5633da';//num geshu is important

$norr2='没有找到相关内容，请添加。';
$filenotexist='文件不存在，请检查填写是否正确。';
$var404='404.html';

$bshou=date("Ymd_His").rand(1000,9999);//is pidname
$dateall = date("Y-m-d H:i:s");
$dateday = date("Y-m-d");


//----------可以压缩的css---------
    $arr_aggcss = array(
              	'thirdparty',
              	'dmcommon',              
              	'grid',
              	'component',
              	'slider',
              );
 
 $arr_aggcsspath = pathof_arr_aggcss($arr_aggcss);
 
//----------可以使用cdn缓存的css和js--------------
    $arr_cdn = array(
		'jquery'=>$baseurl.'DM-static/app/jq/jquery.js',		
	    'compressjs'=>$baseurl.'DM-static/app/jq/compress.js',
	    'compresscss'=>TEMPLATEPATH.'base/css/compress.css',
	    'bootstrapjs'=>$baseurl.'DM-static/app/libs/bootstrap/js/bootstrap.min.js',
	    'bootstrapcss'=>$baseurl.'DM-static/app/libs/bootstrap/css/bootstrap.min.css',       
    );


function pathof_arr_aggcss($arr_aggcss){ //admin aggcss is root,so here need path css.
        global $baseurl;
      $path = TEMPLATEPATH.'base/css/';
      $arr =array();
      foreach ($arr_aggcss as $v) {
            array_push($arr, $path.$v.'.css');
      }
      return $arr;

}  



?>