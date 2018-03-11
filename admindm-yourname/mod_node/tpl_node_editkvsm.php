<?php
/*
	power by JASON.ZHANG  DM建站  www.demososo.com
*/
if(!defined('IN_DEMOSOSO')) {
	exit('this is wrong page,please back to homepage');
}

//echo $sta_kvtothumb;
if($sta_kvtothumb=='y') {
	echo '缩略图由kv产生。';
	exit;

}

$imgsmall='';$delimg='';
$imgsqlname_kvsm = $row['kvsm'];


 if($act=='update'){

 	// $imgaddr = $_POST['imgaddr'];
 	//$imgaddr  = zbdesp_onlyinsert($imgaddr );
  // echo $imgaddr;
 
 //----------------------------

	$imgname=$_FILES["addr"]["name"] ;
	 $imgsize=$_FILES["addr"]["size"] ;
	
	if(!empty($imgname)){
		$imgtype = gl_imgtype($imgname);		
		//
		//$up_water='y';	
		$up_small='y';
		if($abc1=='y') $up_small='n';
		$up_delbig='n'; 
		$up_water= 'n';
		$up_add_s='n';//also in common.inc

		$imgsqlname = $imgsqlname_kvsm;
		 
		$i='';
		require_once('../plugin/upload_img.php');//need get the return value,then upimg part turn to easy.

		 $updateimgaddr=", kvsm='$return_v_s'";
 //-------------------------

		$ss = "update ".TABLE_NODE." set  sta_orignimg='$abc1' $updateimgaddr  where id=$tid  $andlangbh limit 1";
		iquery($ss);
		// echo $ss;
		//p2030_delimg($imgsqlname_kvsm,'y','n');
	
	
	}//end not empty
	else {alert('无效操作，因为没有上传图片。');}
 
	  jump($jumpv_file); 
	 
 }
 else if($act=='list'){
		 if($imgsqlname_kvsm<>''){
		//$imgsmall =  get_thumb($imgsqlname_kvsm,$title,'div');
		 	 $imgsmall =  p2030_imgyt($imgsqlname_kvsm,'y','n'); 
		//p2030_imgyt($addr,$w_h='y',$linkbig='n')
		$delimg= "<br /> <a href=javascript:delimg('delimg','$tid','$imgsqlname_kvsm','$jumpv_file')  class='but2'>删除缩略图</a><br /> <br /> ";
		  
		  }
		 
  }
else if($act=='delimg'){
		p2030_delimg($imgsqlname_kvsm,'y','n');//p2030_delimg($addr,$delbig,$delsmall)	  
	$ss = "update ".TABLE_NODE." set  kvsm=''  where id=$tid $andlangbh limit 1";
	iquery($ss);
	jump($jumpv_file);
}  
 ?>
 

<form    action="<?php echo $jumpv_file; ?>&act=update" method="post" enctype="multipart/form-data">
  <table class="formtab">
  <tr>
<td class="tr">使用原图： </td>
<td><select name="sta_orignimg">
      <?php select_from_arr($arr_yn,$sta_orignimg,'');?>
  </select></td>
</tr>
<tr>
<td class="tr">缩略图： <br />(宽：<?php echo $up_w_s;?>像素 | 高：<?php echo $up_h_s;?>像素 )
<?php echo '<br />'.$delimg;?>

</td>

 <td class="maxwidthimg">

 <input name="addr" type="file" class="form-control" />

 

      <?php
       echo '<br /><span class="cred">'.$format_t.'</span><br />';
   echo $imgsmall;
      ?>
      </td>
    </tr>
<tr>
      <td></td>
      <td>
      <input class="mysubmit" type="submit" name="Submit" value="提交"></td>
    </tr>
  </table>
</form>
