<?php
/*
	欢迎使用DM企业建站系统，本系统由www.demososo.com开发。
*/

if(strlen($searchkey)>100){alert(SEARCH_ALERTLONG);jump(BASEURL.'search.php?lang='.LANGPATH);}
//对不起，搜索内容过长！
 

if(!defined('IN_DEMOSOSO')) {
	exit('this is wrong page,please back to homepage');
}
$reqfilemeta = TPLCURROOT.'inc/meta.php';
if(!is_file($reqfilemeta)) $reqfilemeta = DISPLAYROOT.'a_meta.php';
require_once $reqfilemeta;
?>
 <div class="pagewrap">
<?php
require_once TPLCURROOT.'inc/header.php';
  $reqfile = TPLCURROOT.'inc/banner.php';
 if(!is_file($reqfile)) $reqfile = DISPLAYROOT.'a_banner.php';
 require_once $reqfile;
?> 
<div class="contentwrap container">
	<div class="content_header"><h3><?php echo SEARCH_RESULT?>：</h3></div>
	<div class="content_def">
	
 
	 <div class="c searcharea">
		<div class="searchresult" style="padding:20px">
		<?php
		 

			if($searchkey=='') echo '<p class="nokey">'.SEARCH_ALERTKEYWORDS.'!</p>';
			else{
						

	  $sqlsearch = "SELECT * from ".TABLE_NODE."  where sta_search='y'  and  title  like  '%$searchkey%'   $andlangbh order by id desc";	
	 // echo $sqlsearch;//exit; 
	  //sta_search='y' -- bec blockdh in node also
	  if(getnum($sqlsearch)>0){
        	   echo '<p class="key">'.SEARCH_KEYWORDS.'：<span style="color:#666;font-size:18px"> '.$searchkey.'</span></p>';
	 
		$result = getall($sqlsearch); 
		  $targetv = ' target="_blank"';
		   require_once EFFECTROOT.'list/list_text.php';		   
		
		}
		else{
		 echo '<p class="mt30 noresult">'.SEARCH_NORESULT.'： <span style="color:#666;font-size:20px">'.$searchkey.'</span></p>';
		}//对不起，没有找到相关内容
		
	}
	?>
	</div>
</div>	
</div> 

</div><!--end contentwrap-->

<?php 
  $reqfile = TPLCURROOT.'inc/footer.php';
 if(!is_file($reqfile)) $reqfile = DISPLAYROOT.'a_footer.php';
 require_once $reqfile;
  
?> 

</div><!--end pagewrap-->

<?php  		
$reqfile = TPLCURROOT.'inc/footer_last.php';
if(!is_file($reqfile)) $reqfile = DISPLAYROOT.'a_footer_last.php';
require_once $reqfile;
 
?>

