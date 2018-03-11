<?php
/*
	power by JASON.ZHANG  DM建站  www.demososo.com
*/
if(!defined('IN_DEMOSOSO')) {
	exit('this is wrong page,please back to homepage');
}
$imgsmall='';$delimg='';
$imgsqlname  = $row['kv'];
$imgsqlname_sm = $row['kvsm'];

//pre($_POST);
 if($act=='update'){ 
 //----------------------------
	$imgname=$_FILES["addr"]["name"] ;
	 $imgsize=$_FILES["addr"]["size"] ;
	
	if(!empty($imgname)){
		$imgtype = gl_imgtype($imgname);	
		
		//upload img
		$up_small='n';
		$up_add_s='n';//also in common.inc
		if($sta_kvtothumb=='y') {
			$up_small='y';	
			
		}


		$up_delbig='n'; 
		$i='';
		$up_water= 'n';
	
	 require('../plugin/upload_img.php');//need get the return value,then upimg part turn to easy.
		// $updateimgaddr=" kv='$return_v'";
 //echo '<br>return:'.$return_v;
		  
		 		//	 if($sta_kvtothumb=='y')   {
			 			 	 //if($imgsqlname<>$imgsqlname_sm) { 
				 			 		//  addr is not eq kvsm addr .so del kvsm
				 			 //	p2030_delimg($imgsqlname_sm,'n','y'); //p2030_delimg($addr,$delbig,$delsmall)	
				 			// }

			 			// } 


		 		//sql----		
		 		 if($sta_kvtothumb=='y')   {
		 		 		//p2030_imgyt($imgsqlname,'y','y'); //p2030_imgyt($addr,$w_h='y',$linkbig='n')
		 		 			$ss = "update ".TABLE_NODE." set  kv='$return_v',kvsm='$return_v_s'  where id=$tid  $andlangbh limit 1";
		 			 }
		 			 else {
		 			 	//p2030_imgyt($imgsqlname,'y','n'); //p2030_imgyt($addr,$w_h='y',$linkbig='n')
		 			 		$ss = "update ".TABLE_NODE." set  kv='$return_v'   where id=$tid  $andlangbh limit 1";
		 			 }
		 			// echo '<Br>ffff'.$ss;
		 			 iquery($ss);
		 			 
	 }//empty($imgname)
 
 

	   jump($jumpv_file); 
	}

 


 else if($act=='list'){
		 if($imgsqlname<>''){
		 $imgsmall =  p2030_imgyt($imgsqlname,'y','n'); //p2030_imgyt($addr,$w_h='y',$linkbig='n')
		$delimg= "<br /> <a href=javascript:delimg('delimg','$tid','$imgsqlname','$jumpv_file')  class='but2'>删除kv图</a><br /> <br /> ";
		
		 }
		 
		 
		 
  }
else if($act=='delimg'){		

		if($sta_kvtothumb=='y') {
		 	 p2030_delimg($imgsqlname,'y','n'); //p2030_delimg($addr,$delbig,$delsmall)	
		 	 p2030_delimg($imgsqlname_sm,'y','n'); 
		 	 $

			$ss = "update ".TABLE_NODE." set  kv='',kvsm=''  where id=$tid $andlangbh limit 1";
		}
		else {
			if($imgsqlname<>'') p2030_delimg($imgsqlname,'y','n');//p2030_delimg($addr,$delbig,$delsmall)	
			$ss = "update ".TABLE_NODE." set  kv=''   where id=$tid $andlangbh limit 1";
		}

	iquery($ss);
	jump($jumpv_file);
}  
 ?>
 

<form   action="<?php echo $jumpv_file; ?>&act=update" method="post" enctype="multipart/form-data">
  <table class="formtab">
<tr><td class="tr" >kv图片：
<?php
echo  '<br />'.$delimg;
?>
</td>
      <td>

      <input name="addr" type="file" class="form-control"  />

  
      <br />
      <?php
       echo '<br /><span class="cred">'.$format_t.'</span><br />';
   echo $imgsmall;
      ?>
      </td>
    </tr>
	
	 
<tr>
      <td></td>
      <td>
      <input class="mysubmit" type="submit" name="Submit" value="提交" /></td>
    </tr>	
	 
	

  </table>
</form>
