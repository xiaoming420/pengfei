<?php
/*
	欢迎使用DM建站系统，网址：www.demososo.com
*/
if(!defined('IN_DEMOSOSO')) {
	exit('this is wrong page,please back to homepage');
}

 

  if($act=='update')
 {

if(@$_POST['inputmust']=='') {echo $inputmusterror.$backlist;exit;}

 $despjj=zbdespadd2($abc2); 

 //$despcontent = zbdesp_onlyinsert($_POST['despcontent']);

 //$despjj=zbdespadd2($abc2); 


//usr linkcss,not use linkstyle
 $ss = "update ".TABLE_REGION." set name='$abc1',despjj='$despjj',blockid='$abc3' where pid='$pid' and id='$tid' $andlangbh limit 1";
 //echo $ss;exit;
			iquery($ss); 	
			$jumpvp = $jumpvf.'&act=edit&tid='.$tid;		
			 jump($jumpvp);			
 }
 
 
 
else
 {
	$jumpv_insert = $jumpvf.'&act=update&tid='.$tid;
 
	$sql = "SELECT * from ".TABLE_REGION."  where pid='$pid' and id='$tid' $andlangbh order by id limit 1";
$row = getrow($sql);
if($row=='no') {echo 'no record...';exit;}

$name=$row['name'];
$namebz=$row['namebz'];
 
 
$blockid=$row['blockid'];


$despjj=zbdespedit($row['despjj']);
//$desp=zbdesp_imgpath($row['desp']);
//$desptext=zbdesp_imgpath($row['desptext']);

 
 
?>

<?php 
  require_once HERE_ROOT.'mod_region/tpl_region_inc_edittab.php';
  ?>
 
<form  onsubmit="javascript:return checkhere(this)" action="<?php echo $jumpv_insert;?>" method="post">
  <table class="formtab">
    <tr>
      <td width="20%" class="tr">标题：</td>
      <td width="78%"> <input name="name" type="text" value="<?php echo $name?>" class="form-control" />
<?php echo $xz_must;?> 
        </td>
    </tr>
 
 <tr>
      <td width="20%" class="tr">副标题的内容：</td>
      <td width="78%"> 
      <textarea name="despjj" class="form-control" rows="3"><?php echo $despjj?></textarea>

<?php echo $xz_maybe;?>  
        </td>
    </tr>
     
 

   <tr>
      <td class="tr" valign="top">标识：<br />
      <?php echo showblockid(); ?> 
      </td>
      <td> 
<input name="blockid" type="text" value="<?php echo $blockid?>" class="form-control" />
<?php echo $xz_maybe;?>  
<?php 
 echo '<br />'.check_blockid($blockid);

 ?>
 <br /><br />
</td> 
    </tr>

 
 
<tr>
      <td></td>
      <td>
      <input  class="mysubmit" type="submit" name="Submit" value="提交"></td>
    </tr>
  </table>

    <?php echo $inputmust;?>

</form>
 
 
<?php 
}
?>
 
<script>
function checkhere(thisForm) {
   if (thisForm.name.value==""){
		alert("请输入标题。");
		thisForm.name.focus();
		return (false);
	}

     
  

 
   // return;

}
 

</script>

