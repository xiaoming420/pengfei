<?php
/*
	power by JASON.ZHANG  DM建站  www.demososo.com
*/
if(!defined('IN_DEMOSOSO')) {
	exit('this is wrong page,please back to homepage');
}


if($act=="update"){ 
			$imgname=$_FILES["addr"]["name"] ;
			$imgsize=$_FILES["addr"]["size"] ;
			   $ifwater=@htmlentitdm($_POST['water']);
			   $pidstylebh=@htmlentitdm($_POST['iscommon']);
			   $titlehere=@htmlentitdm($_POST['title']);

			   // pre($_POST); 

			   if($pidstylebh=='y') $curstyle='y';

	
		if(!empty($imgname)){
			$imgtype = gl_imgtype($imgname);		
			//
			//$up_water='y';	
			//$up_water='y';	//water value is in inc_logcheck.php of lang talbe

		 
				
				if($ifwater=='y') $up_water='y';
				else $up_water='n';
					//-------------
			$up_small='n';
			$up_delbig='n'; 
			$i='';			
			//$imgsqlname='';//alway change img name,because the kv img
			require_once('../plugin/upload_img.php');//need get the return value,then upimg part turn to easy.

		
	}//end not empty

	//-------------------------
		$ss = "update ".TABLE_IMGFJ." set  title='$titlehere',pidstylebh='$curstyle',dateedit='$dateall'  where id=$tid  $andlangbh limit 1";
		iquery($ss);
		//echo $ss;exit;
		
		jump($jumpv_file.'&act=edit&tid='.$tid);

}
if($act=="edit"){ 
 
 	$pidstylebh=$row['pidstylebh']; 
 	if($pidstylebh<>'y')  $pidstylebh='n';

 $imgsmall2 = p2030_imgyt($imgsqlname,'y','n');  //$imgsmall2 is in pro.php
?>



<h4 class="h2tit_biao"> 修改附件
 <a href='<?php echo $jumpv;?>'><<返回附件管理</a>
</h4>

<form action="<?php echo $jumpv_file; ?>&act=update&tid=<?php echo $tid?>" method="post" enctype="multipart/form-data">
  <table class="formtab">
    <tr>
      <td width="20%" class="tr">附件说明：</td>
      <td  > <input name="title" type="text" value="<?php echo $row['title']?>" class="form-control" />
        </td>
    </tr>

   <tr>
      <td   class="tr">上传附件：</td>
      <td  > <input name="addr" type="file"  />
	   <br /><br />加上水印<input type="checkbox"   name="water" size="10" value="y"> &nbsp;&nbsp;&nbsp;

 是否公共：  
                <select name="iscommon">
                    <?php  
                   select_from_arr($arr_yn,$pidstylebh,'');
                     ?>
                   </select> 
                   <div class="c5"> </div>



	  <p class="cred" style="padding:5px">
	  <span style="color:#666">提示：修改附件后，原文件名(扩展名)是不是改变的。<br />
如果把.docx修改成.jpg就会出错。但.gif可以修改成.jpg.因为它们都是图片。<br />
如果要把..docx修改成.jpg，可以先删除再添加。</span><br /><br />
         <?php
			echo $imgsmall2.'<br /><br /><br />';
			echo $format_t.'<br />';
		 ?>
</p>
       </td>
    </tr>
    
<tr>
      <td></td>
      <td>
      <input  class="mysubmit" type="submit" name="Submit" value="<?php echo '修改';?>"></td>
    </tr>
  </table>
</form>

<?php } ?>

 