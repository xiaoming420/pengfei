<?php
/*
	欢迎使用DM企业建站系统，本系统由www.demososo.com开发。
*/
//echo '<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />';	//when product,need comment.

 
//$andlangbh=" and lang='".LANG."'  and pbh='".USERBH."' ";//andlangbh in func_init.php
//echo 'echo routeid='.$routeid.' alias='.$alias.' ifalias='.$ifalias.' file='.$file.' detailid='.$detailid;
if($file==''){
//$routeid= 33; 
 $alias='index';
 $filearr = filealias($alias);
$routeid= $filearr[0]; 
 $page = 1;
 require_once INCLUDE_ROOT.'file_page.php';//no use file_index.php	

} 
//else if($file=='404')  require_once INCLUDE_ROOT.'file_404.php';

else if($file=='404') { require_once TPLBASEROOT.'page_404.php';}
else {
  //if ifalias =y,then judge file var by htaccess file...
  if($ifalias=='y'){  
		$filearr = filealias($alias);
		$routeid= $filearr[0]; 
		$detailid= $filearr[2]; 
	
		if(is_file($filearr[1])) require_once $filearr[1];
		else echo 'file not exist;';
  
  }
  
  else {
  	     $filev = INCLUDE_ROOT.'file_'.$file.'.php';
  		 if(is_file($filev)) require_once $filev;
  		 else echo 'file not exist;';
	  }
} 
?>
<?php
function filealias($alias){  
global $andlangbh;global $noid;global $filearr; 
$sql = "SELECT pid,type from ".TABLE_ALIAS."  where  name='$alias' $andlangbh  order by id limit 1";	
		 //echo $sql;exit; 
		  if(getnum($sql)>0){ 
			$row=getrow($sql);
			$type=$row['type'];
			$pidname=$row['pid'];

			if($type=='page'){
				$sql2 = "SELECT id from ".TABLE_PAGE."  where  pidname='$pidname' $andlangbh  order by id limit 1";
				$row2=getrow($sql2);
				$routeid= $row2['id'];
				$reqfile =  INCLUDE_ROOT.'file_page.php';	
				$detailid='';				
				$filearr = array($routeid,$reqfile,$detailid);
				return $filearr;
				 
			}			
			else if($type=='cate'){ //no need use csub
				$sql2 = "SELECT id from ".TABLE_CATE."  where  pidname='$pidname' $andlangbh  order by id limit 1";
				$row2=getrow($sql2);
				$routeid= $row2['id'];	
				$detailid='';	
				$reqfile =  INCLUDE_ROOT.'file_category.php';				
				$filearr = array($routeid,$reqfile,$detailid);
				return $filearr;
				 
			}
			else if($type=='node'){global $row_detail;
				$sql2 = "SELECT * from ".TABLE_NODE."  where  pidname='$pidname' $andlangbh  order by id limit 1";
				$row_detail=getrow($sql2);//$row_detail for system/syst_content_article_detail.php
				$detailid= $row_detail['id'];	
				$pid= $row_detail['pid'];
				$title_detail= $row_detail['title'];	
				$sta_noaccess= $row_detail['sta_noaccess'];
				if($sta_noaccess=='y') {echo $noaccess;exit;}
				//----------------
				$sql2 = "SELECT id from ".TABLE_CATE."  where  pidname='$pid' $andlangbh  order by id limit 1";
				$row2=getrow($sql2);
				$routeid= $row2['id'];	
				//echo '<br>'.$sql2.'<br>';
				
				//-----------------
				$reqfile =  INCLUDE_ROOT.'file_category.php';				
				$filearr = array($routeid,$reqfile,$detailid);
				return $filearr;
				 
			}
			
			
			
		  }
		  else{fnoid();exit;}
  



}//end func
?>