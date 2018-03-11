<?php
/*
	power by JASON.ZHANG  DM建站  www.demososo.com
*/
if(!defined('IN_DEMOSOSO')) {
	exit('this is wrong page,please back to homepage');
}
?>
 
<?php
 
if($act=="update"){
	$imgname=$_FILES["addr"]["name"] ;
	 $imgsize=$_FILES["addr"]["size"] ;
	
	if(!empty($imgname)){
		$sql = "SELECT kvsm from ".TABLE_ALBUM." where pid='$ppid'  and id='$tid' $andlangbh   limit 1";
		$rowss = getrow($sql);
		$imgsqlname = 	$rowss['kvsm'];
		$imgtype = gl_imgtype($imgname);
		
		 $up_w_s=$album_s_w; $up_h_s=$album_s_h;
	 if($up_w_s>600) $up_w_s=600;elseif($up_w_s<60) $up_w_s=60;
	 if($up_h_s>600) $up_h_s=600;elseif($up_h_s<60) $up_h_s=60;
	 
		$up_small='y';
		$up_add_s='y';
		$up_delbig='n'; 
		 $i='';
		require_once('../plugin/upload_img.php');//need get the return value,then upimg part turn to easy.
		

	}//end not empty		
		
		


 $desp=zbdespadd2($abc2);
			$ss = "update ".TABLE_ALBUM." set title='$abc1',desp='$desp' where pid='$ppid' and id='$tid' $andlangbh  limit 1";
			// echo $ss;exit;
			iquery($ss); 	
		 $jumpv_back = $jumpv_file.'&act=edit&tid='.$tid;
		  //echo $jumpv_back;exit;
		 jump($jumpv_back);

}
else{
  $sql="select * from  ".TABLE_ALBUM."  where  pid='$ppid' and id='$tid' $andlangbh order by id limit 1";
  //echo $sql;exit;
   $row = getrow($sql);
   
       $imgsqlname = $row['kvsm'];
	  // echo $imgsqlname;
$imgsmall = p2030_imgyt($imgsqlname,'n','y') ;
 
   ?>

<form   action="<?php echo $jumpv_file?>&act=update&tid=<?php echo $tid?>" method="post" enctype="multipart/form-data">
  <table class="formtab">
    <tr>
      <td width="12%" align="right">图片名称(可不填)：</td>
      <td width="88%"> <input name="name" type="text" id="name" value="<?php echo $row['title']?>" class="form-control" />
      </td>
    </tr>
          <tr>
      <td align="right">图片说明内容（可不填）：</td>
      <td>
<textarea  class="form-control"  rows="8" id="editoasr1" name="editoasr1">
<?php  
echo  zbdespedit($row['desp']);
?>
</textarea>
</td>
    </tr>

  <tr>
      <td align="right">图片：</td>
      <td><input name="addr" type="file" class="form-control" />

      <?php
 echo '<br /><span class="cred">要修改的图片的扩展名必须一致。否则缩略图不会变化！<br />'.$format_t.'</span><br />';
   echo $imgsmall;
      ?>
      </td>
    </tr>
<tr>
      <td></td>
      <td>
      <input class="mysubmit"  type="submit" name="Submit" value="修改" />
      </td>
    </tr>
  </table>
</form>

<?php }

?> 