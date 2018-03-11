<?php
if(!defined('IN_DEMOSOSO')) {
	exit('this is wrong page,please back to homepage');
}


?>


<?php
 //this is default list 

 $sqlwhile=get_sqlwhile($curcatepidname,$pid,$cate_level,$cate_last);
 
    $sqllist22 = "SELECT *  from ".TABLE_NODE." where  ppid='$mainpidname'  $sqlwhile  and sta_visible='y' and sta_noaccess='n' $andlangbh  order by pos desc,id desc";
 // echo $sqllist22; 
  /*begin page roll*/
     $num_rows = getnum($sqllist22);
	  $page_total=ceil($num_rows/$maxline);//must put here,because when no data,we need the vaule of page_total	
     if($num_rows>0){
         // $page_total=ceil($num_rows/$maxline);//not put here
        //if (!isset($page)||($page<=0)) $pagesql=1;//this is in common.inc
        if($page>$page_total) $pagesql=$page_total;
        $start=($pagesql-1)*$maxline;
        $sqllist33="$sqllist22  limit $start,$maxline";
	 // ECHO $sqllist33; 		 
        $result = getall($sqllist33);		
		$reqfile = EFFECTROOT.'list/'.$listfg.'.php'; /*reqfile 在 effect目录下*/
		 
		if(is_file($reqfile)) require_once($reqfile); 
		else echo '提示：'.$listfg.'.php 文件不存在';
     }//end $num_rows>0
	
    else{
	   echo  NOARTICLE;
	}
?> 


<?php
require_once EFFECTROOT.'other/plugin_pager.php';
 ?>