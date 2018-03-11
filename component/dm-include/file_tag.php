<?php
/*
	made by cmsmeng.com
*/
if(!defined('IN_DEMOSOSO')) {
	exit('this is wrong page,please back to homepage');
} 
?>
<?php
 		
 		
 		$banner='';	

//------------------
$sql="select pidname,name from ".TABLE_TAG." where id='$routeid'  $andlangbh limit 1"; 
	if(getnum($sql)>0){
		$row=getrow($sql); 
		$tagpidname=$row['pidname']; 
		$tag_name=$row['name']; 
		
		$seotitle = $tag_title.' '.$tag_name;//$tag_title in admin
		 
		 

	  $seo1[0] =$seotitle;
		 $seo2[0] =$seotitle;
		  $seo3[0] =$seotitle;
		 
			

	}
	else{ fnoid();exit;
	}

  
	 //for pagerlink
	  $cur_href = 'tag-'.$routeid.'.html';	
		
?>
<?php 
$bodycss = "taglinkwrap";	

$bannertitle =$bannertext=  $title =$seotitle; 

//if($detailid=='') require_once TPLBASEROOT.'page_'.$modtype.'.php';
//else   require_once TPLBASEROOT.'page_'.$modtype.'_detail.php';
if($modtype=='blockdh'){fnoid();exit;}

?>

 
<?php
 $reqfile = '';
$reqfile = TPLCURROOT.'page_tag.php';

if(!is_file($reqfile))   $reqfile = TPLBASEROOT.'page_tag.php'; 
 
 //if($regionid<>'')  $reqfile = TPLCURROOT.'page_region.php';

if(is_file($reqfile)) require_once $reqfile;

else  echo 'no require file in file_tag.php   ---file:'.$reqfile;

 
?>