<?php

 //$backlist = '<a class="imgbg_blue" href='.$jumpvback.'?act=list><span>返回管理列表</span></a>';
$sort_ads='(排序规则：数字由大到小排序，数字相同，则先添加的排前面。)';
$sort_ads_f='(排序规则：数字由大到小排序，数字相同，则后添加的排前面。)';
$text_red='<span class="cred">(标题红色表示当日编辑过)</span>';
$blank='<div class="blank"></div>';
$xz_maybe='(可不填)';
$xz_must='<span class=cred>(必填)</span>';
$xz_solebs='<span class=cred>(必填,不能有相同，且英文字母，如index 或者 sideblock)</span>';
$xz_num='<span class=cred>(必填,为数字)</span>';
$actsuccess='操作成功';

$text_usetext='<span class="cgray">(如果为空，则采用主分类的值)</span>';
$text_edit_nothisid='出错，没有此id';
$text_chao='超出限制数!';
$text_sm_wh='(为数字，在60-600之间)';
$text_trigger='<span class="cgray">(用于js效果的一个id，比如flexslider1。但不能和其他区块的相同。)</span>';
$text_adminhide='<span class="cgray">(本选项不影响前台，只是方便后台管理。)</span>';
$text_adminhide2='这里的切换状态(显示或隐藏)只是方便后台管理。不影响前台。';
$text_outlink='<span class="cgray">(外部链接要以http开头。)</span>';
$text_imgfjlink = '<div style="padding:5px"><a class="needpopup" href="../mod_imgfj/mod_imgfj.php?pid=name&lang='.LANG.'" class=""  >名称附件管理</a></div>';
$text_imgfjlink_bjq = '<a href="../mod_imgfj/mod_imgfj.php?pid=common&lang='.LANG.'"  class="needpopup"  >公共编辑器附件管理</a>';
$text_cssname ='<a class="needpopup" href="../mod_common/someclass.html">css名称：</a>';

$text_videohint = '  如果是mp4的视频，不支持IE8 <br />  如果是网站内部的mp4，则mp4文件必须放在 DM-static/upload/video目录下，然后这里只要输入文件名即可，比如 videoname.mp4';

 
$breadfaicon = '<i class="fa fa-flag"></i>';

 
/*******************************************/


/************************/
$h2tit = ' - 管理列表';
 $maxline=20;//list and pos use maxline;pos do not use before.

$chao_rec = '超出了记录范围，请联系技术支持';
//$biaoimgsm = '(可以不填，如果要填，请在附件管理里拷贝图片名称到这里，<br />如果是Flash，则格式：宽|高|flash值(用|隔开) 如 <span class=cblue>980|50|201002/20100329_1529286.swf &nbsp;&nbsp;<a href="">查看说明。</a>';
$biaoimgsm ='请在附件管理里拷贝 图片名称 到这里';
//$flash_sm = '';
$norr2='<p style="padding:20px">没有找到相关内容，请添加。</p>';
$note_taibs='<span class="cred">(如果这里有值，则轮换图片标识不起作用。)</span>';
$note_addafter='<span class="cred">(请添加完成后再去修改内容和其他选项。)</span>';
//$note_lunherror='<span class="cred">(提示：此处无效，因为下面抬头图片框里有值。)</span>';
$backlist='<div style="margin:20px;padding:20px;background:#A0B4DC"><a href="javascript:history.back(-1)"><b class="cred"  style="font-size:20px">[<<点击这里返回](或点击退后按钮)</b></a><br /><br /><span style="font-size:18px">(如果返回时出错，请刷新页面。)</span></div>';

$inputmust = '<input  type="hidden" name="inputmust" value="inputmust" />';
$inputmusterror  = '<p style="color:red;font-size:20px">网络问题。</p>';

$text_jump='<p class="f14bgred">如果跳转，那么这里的选项会无效。会直接跳到指定的页面。<br /><span class="cblue">(提示：如果是外网链接，必须以http开头，比如 http://www.demososo.com，而demososo.com会出错。)</span></p>';
$link_tip = '<p class="cred">(提示：如果是外网链接，必须以http开头，比如 http://www.demososo.com。)</p>';
$text_jump_cate='<p class="f14bgred">链接跳转</p>';

 $aliasjumptext = '';//(外部链接要以 http:// 开头)'; no use,because inner jump not need http://

 /*use in product*/




//----
/**
**array.............
**
************************************************************************************************
*****
*****
********/
$arr_yn=array('y'=>'是','n'=>'不是');
$arr_ynbool=array('true'=>'是','false'=>'不是');
$arr_ynall=array('a'=>'不选','y'=>'是','n'=>'不是');//use block pro...
$arr_pagelayout=array('noallwidth'=>'非全宽，页面两边有空余(默认)','allwidth'=>'页面全宽(适合首页)(内容只采用默认内容的值)');//use block pro...
$attach_img=array('jpg','gif','jpeg','png');



$arr_leftright = array('center'=>'居中','left'=>'靠左','right'=>'靠右');

$arr_bread = array('h'=>'隐藏','r'=>'右侧','t'=>'顶部');
$arr_column = array('n'=>'全宽，无侧边栏','l'=>'位于内容左侧','r'=>'位于内容右侧','t'=>'位于内容上面','b'=>'位于内容下面');


$arr_field=array('text'=>'简短文本text',
	'select'=>'下拉select',
	'radio'=>'单选按钮radio',
	'checkbox'=>'复选框checkbox',
	'textarea'=>'内容框textarea');
//,'attach'=>'附件'



 $arr_columns=array('1'=>'1列','2'=>'2列',
	'3'=>'3列',	'4'=>'4列',	'5'=>'5列',	'6'=>'6列'
	);


 $arr_columnwidth = array(
 	'col_1f6'=>'1/6','col_5f6'=>'5/6',
	'col_1f5'=>'1/5','col_2f5'=>'2/5','col_3f5'=>'3/5','col_4f5'=>'4/5',
	'col_1f4'=>'1/4','col_3f4'=>'3/4',
	'col_1f3'=>'1/3','col_2f3'=>'2/3',
	'colhalf'=>'1/2(50%)',
	'colfull'=>'1/1(100%)',
	);
$arr_columnfloat=array('fl'=>'左浮动',
	//'fr'=>'右浮动',  no fr,bec affect order position
	'clear'=>'清除浮动','poa'=>'绝对定位');



$arr_mod = array('node'=>'内容管理模块');//,'blockdh'=>'效果区块管理模块'

$arr_album = array(

	'album_fancybox'=>'fancybox相册 - album_fancybox.php',
	'album_jssor'=>'jssor相册 - album_jssor.php',
	'album_updown'=>'相册由上到下排列 - album_updown.php',
	'album_updownimgblock'=>'相册由上到下排列(图片无间隔) - album_updownimgblock.php',
		);
  $arr_video = array(

  	'video_default'=>'视频效果 - video_default.php'
  	);


$arr_listfg = array('list_text'=>'列表 - list_text.php',
'list_grid2ceng_jia'=>'图文 - list_grid2ceng_jia.php',
'list_grid2ceng_kuo'=>'图文 - list_grid2ceng_kuo.php',
'list_grid2ceng_arrow'=>'图文 - list_grid2ceng_arrow.php',
'list_grid'=>'图文 - list_grid.php',
'list_grid_video'=>'图文(视频按钮) - list_grid_video.php',
);

$arr_tagfg = array(
	'tag_list'=>'列表 - tag_list.php',
'tag_grid'=>'图文 - tag_grid.php',

);


$arr_detailfg = array('detail_normal'=>'普通详情页 - detail_normal.php',
	//'detail_normalshop'=>'购物模式的详情页 - detail_normalshop.php',
	);
$arr_relativefg = array('relative'=>'图文滚动 - plugin_relative.php',
	'relative_text'=>'文字列表 - plugin_relative_text.php',
	);

$arr_menu= array('custom'=>'自定义菜单','page'=>'单页面','cate'=>'分类');
//$arr_blockposi= array('header'=>'头部','footer'=>'底部','index'=>'首页','other'=>'其他位置');
$arr_blockeffect= array('block_no'=>'无效果，只输出内容 block_no',
                        'block_title'=>'带标题栏 block_title',
                         'block_titlecenter'=>'带标题栏居中 block_titlecenter',
                       // 'block_sidebar'=>'侧边栏 block_sidebar'
						);



    $arr_block=array('custom'=>'自定义区块',
              'node'=>'分类区块',
              'blockdh'=>'效果区块',
                //'video'=>'视频区块',
              );



  $arr_linkmore = array(
	''=>'默认是蓝色',
	'more1'=>'透明背景', 'more2'=>'透明背景，有边框', 	'more3'=>'黑色背景',	'more4'=>'红色背景',	'more5'=>'橙色背景',
  	'more6'=>'绿色背景',	'more7'=>'紫色背景',	'more8'=>'灰色背景',	'more9'=>'深蓝背景',
    	'more10'=>'无背景，字体黑色',	'more11'=>'无背景，字体红色', 	'more12'=>'无背景，字体蓝色',
	);
  $arr_linkposi = array(
	'belowtitle'=>'位于标题下面',
	'belowtext'=>'位于内容下面',
	'righttext'=>'位于标题旁边',
	);
  $arr_linksize = array(
	'morelg'=>'大号',	''=>'默认',	'moresm'=>'小号sm',  'morexs'=>'更小号xs',
	);
    $arr_textalign = array(
	'tl'=>'左对齐',	'tc'=>'居中','tr'=>'右对齐',
	);
   $arr_linkradius = array(
		''=>'默认圆角','morenocir'=>'无圆角',	'morecir50'=>'圆角2',
	);


  $arr_formerror = array(
  	 'error0'=>'可以为空', 
     'error1'=>'不能为空',    
      'error2'=>'手机号格式不对', 
      'error3'=>'Email格式不对', 
      'error4'=>'必须是数字',      
    );



$arr_bgeffect = array(
	'n'=>'默认无效果',
	'para'=>'视觉差效果',
	'fix'=>'固定在底部',
	);



$arr_editor = array('ck'=>'CK编辑器(默认)','simditor'=>'simditor编辑器(移动端)','baidu'=>'百度编辑器ueditor','kind'=>'kindeditor编辑器');
$arr_body_bgset = array('norepeat'=>'不平铺','repeatx'=>'从左到右平铺','repeaty'=>'从上到下平铺');
$arr_bsfooternavmob = array('a1'=>'移动端底部导航效果1','a2'=>'移动端底部导航效果2','no'=>'无内容');
//$arr_regiontype = array('indexcnt'=>'首页内容','header'=>'头部','footer'=>'底部','other'=>'其他');


/*******************************************/

 $arr_search = array('productname'=>'产品名称','name'=>'姓名',
                    'cellphone'=>'手机',
                    'address'=>'详细地址',
    'ly'=>'客户留言',
    'bz'=>'备注'
    );


//----------set arr can value-------------
 $arr_fgV ='listcssname:##==#==maxline:##20==#==cus_columns:##4==#==cus_substrnum:##100==#==listfg:##list_grid2ceng_jia==#==detailfg:##detail_normal==#==album:##album_fancybox==#==albumcssname:##==#==albumposi:##y';
$arr_maincateV='shop_priceold:##hide==#==shop_price:##hide==#==shop_currency:##==#==shop_currencycn:##==#==shop_linktitle:##taobao==#==ordernowtitle:##立即下单==#==authorcate:##==#==authorcompanycate:##==#==authordatecate:##hide==#==authorhitcate:##hide==#==news_title:##==#==news_moretitle:##==#==sta_fontsize:##y==#==sta_sharebtn:##y==#==sta_kvtothumb:##n==#==sta_field:##n==#==field_title:##产品参数==#==sta_tag:##y==#==relativetitle:##==#==relativefg:##relative';

$arr_styleblockidV = 'bsbanner:##vblock20170419_1630345041==#==bsbannermob:##vblock20170419_1639427863==#==bsbannertext:##==#==bsheadertop:##group20160509_1200413359==#==bsheaderlogo:##1/20160812_042415_1315.png==#==bsheadertext:##vblock20160921_1144538411==#==bsheadersearch:##prog_topsearch==#==bsheadermobtel:##==#==bsfooter:##group20170920_1803089302==#==bsfooterbar:##group20170920_1720352297==#==bsfootermob:##prog_footernavmob==#==bsfooterlast:##group20170920_1717255504==#==bsblock404:##vblock20160510_1000376089';
//arr_styleblockidV no use,bec copy other mb blockid when add mb.

$arr_nodeV='author:##==#==authorcompany:##==#==stock:##10000==#==detpriceold:##1000==#==detprice:##800==#==detlinktitle:##==#==detlinkurl:##==#==downloadurl:##==#==linkmore:##';
?>
