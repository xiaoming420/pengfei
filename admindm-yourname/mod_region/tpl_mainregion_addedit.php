<?php
/*
	欢迎使用DM企业建站系统，本系统由www.demososo.com开发。
*/
if(!defined('IN_DEMOSOSO')) {
	exit('this is wrong page,please back to homepage');
}

if($act=='insert')
 {
  if($abc1=="") {
  	$abc1 = 'pls input title'; exit;
  }

  $pidname='region'.$bshou;
 
			$ss = "insert into ".TABLE_REGION." (pid,pidname,pbh,name,type,lang,dateedit) values ('0','$pidname','$user2510','$abc1','$type','".LANG."','$dateall')";
			 //echo $ss;exit;
			iquery($ss);
			//alert('添加成功！');			 
			jump($jumpv);
			
 
 }
 if($act=='update')
 {
     if($abc1=="")  {
	  	$abc1 = 'pls input title'; exit;
	  }
if($abc2=='y') $curstyle='y';

			 $ss = "update ".TABLE_REGION." set name='$abc1'  where id='$tid'  $andlangbh limit 1";
			iquery($ss); 	
		 
			 jump($jumpv);
	 	
 }
 
 
 if($act=='add')
 { $titleh2= '添加区域';
 
 
 $name='';
 $pidstylebh= 'n';
 
 
 }
 
 if($act=='edit')
 {
 $titleh2= '修改区域';
  
 $jumpvinsert = $jumpvupdate.'&tid='.$tid; 
 
$sql = "SELECT * from ".TABLE_REGION."  where id='$tid'   $andlangbh order by id limit 1";
$row222 = getrow($sql);
if($row222=='no'){echo 'no record...';exit;}
//$desp=zbdesp_imgpath($row['desp']);
$name= $row222['name']; 
$pidstylebh= $row222['pidstylebh']; 
if($pidstylebh<>'y')  $pidstylebh='n'; 
 
}

 if($act=='add' or $act=='edit')
 {
?>
 
<form  onsubmit="javascript:return checkhere(this)" action="<?php echo $jumpvinsert?>" method="post">
  <table class="formtab">
    <tr>
      <td width="22%" class="tr">页面区域标题：</td>
      <td width="77%"> <input name="name" type="text" value="<?php echo $name?>" class="form-control" />
       </td>
    </tr>


 

 
<tr>
      <td></td>
      <td>
      <input  class="mysubmit" type="submit" name="Submit" value="<?php echo $titleh2;?>"></td>
    </tr>
  </table>
</form>

 

<?php
}
?>

<script>
function checkhere(thisForm) {
   if (thisForm.name.value=="")
	{
		alert("请输入页面区域标题。");
		thisForm.name.focus();
		return (false);
	}
  
  

   // return;

}
 

</script>
