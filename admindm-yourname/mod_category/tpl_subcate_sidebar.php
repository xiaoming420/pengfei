<?php
/*
	power by JASON.ZHANG  DM建站  www.demososo.com
*/
if(!defined('IN_DEMOSOSO')) {
	exit('this is wrong page,please back to homepage');
}
?>


 
<?php 
 
 

 $sqlsub = "SELECT pidname,name from ".TABLE_CATE." where  pid='$catid' $andlangbh order by pos desc,id";
 $rowlistsub = getall($sqlsub);
 if($rowlistsub=='no') {
  echo '<p>&nbsp;&nbsp;还没有分类，请添加...</p>';
  }
  else{
  ?>
  <strong>子分类：</strong><br />
 <?php
 echo '<ul>';
   foreach($rowlistsub as $vsub){
          
		   $pidnamehere=$vsub['pidname'];  
		   $name=decode($vsub['name']);   	

		   $styleSubV = $styleSubVread='';
			if($pidnamehere==$pidname) {
				   $styleSubV=' style="background:red;color:#fff" ';
			}
			 	   
		   
		  $laylist = '<a '.$styleSubV.'  href="'.$jumpvf.'&pidname='.$pidnamehere.'&act=edit">'.$name.'</a>';
	  echo '<li><i class="fa fa-angle-right"></i>'.$laylist.'</li>';
 
					
//----if sub sub cat------------------------
         $sqlsub_sub = "SELECT  pidname,name  from ".TABLE_CATE." where  pid='$pidnamehere' $andlangbh order by pos desc,id";		
         $row_sub = getall($sqlsub_sub);
		  if($row_sub<>'no') $sslevel = "update ".TABLE_CATE." set level=1,last='n' where id='$tid' $andlangbh limit 1";
			else $sslevel = "update ".TABLE_CATE." set level=1,last='y' where id='$tid' $andlangbh limit 1";
        iquery($sslevel); 



  
      //----if sub sub cat------------------------       
         if($row_sub<>'no'){
         	 echo '<ul>';
              foreach($row_sub as $v2_sub){
					$nameSub=decode($v2_sub['name']);   
					$subpidname=$v2_sub['pidname'];


 $styleSubV = $styleSubVread='';
if($subpidname==$pidname) {
	  $styleSubV=' style="background:red;color:#fff" ';
}


		 $laylistSub = ' <a '.$styleSubV.' href="'.$jumpvf.'&pidname='.$subpidname.'&act=edit">'.$nameSub.'</a> ';
	 	echo '<li><i class="fa fa-angle-right"></i>'.$laylistSub.'</li>';

					 
				}
				 echo '</ul>';
				 



	}
	}
	echo '</ul>';
}

 