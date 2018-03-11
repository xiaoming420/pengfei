<?php
/*
	power by JASON.ZHANG  DM建站  www.demososo.com
*/
if(!defined('IN_DEMOSOSO')) {
	exit('this is wrong page,please back to homepage');
}

 

 
	
	if($act=='update'){ 
       if(@$_POST['inputmust']=='') {echo $inputmusterror.$backlist;exit;}


		if($abc1=="") $abc1='pls input title'; 

    $ss = "update ".TABLE_CATE." set name='$abc1',alias_jump='$abc2',modtype='$abc3',sta_noaccess='$abc4',sm_w='$abc5',sm_h='$abc6',maxline='$abc7',listfg='$abc8',listcssname='$abc9',detailfg='$abc10'  where pidname='$catid' $andlangbh limit 1";
   
// echo $ss;exit;
			iquery($ss); 	

		 jump($jumpv_mainedit);

	 

	
	}
	
else	{
  
    $ss = "select * from ".TABLE_CATE." where pidname= '$catid' $andlangbh limit 1";
    $row = getrow($ss);
     
    if($row=='no'){alert($text_edit_nothisid);exit;}  
     $tit_v='修改主类';
     $sta_modtype=$row['modtype'];
     $sta_noaccess=$row['sta_noaccess'];  
    $name=$row['name']; 

  
    $jump_insertupdatesub = $jumpv_file.'&act=update';
 
  

?>	
 
 <div class="contenttop">
<i class="fa fa-pencil-square-o"></i> <a  href="<?php echo $jumpv_maineditcan?>">修改参数</a>
&nbsp;&nbsp;&nbsp;&nbsp;
<i class="fa fa-pencil-square-o"></i> <a  href="<?php echo $jumpv_maineditseo?>">修改SEO</a>

</div>
 
<form  onsubmit="javascript:return checkhere(this)" action="<?php  echo $jump_insertupdatesub;?>" method="post" enctype="multipart/form-data">
<table class="formtab">

  <tr>
    <td width="18%" class="tr">主类名称：</td>
    <td width="75%"><input name="name" type="text" id="name" value="<?php echo $name?>" class="form-control" />

     </td>
  </tr>
  
  
	  <tr>
    <td class="tr">链接跳转：</td>
    <td><input name="alias_jump" type="text"  value="<?php echo $row['alias_jump']?>" class="form-control" />
<?php echo $aliasjumptext.$xz_maybe;?>
      <?php if($row['alias_jump']<>'') { echo $text_jump;
      }?>
     </td>
  </tr>
   <tr>
    <td  class="tr">分类类型：</td>
    <td> <select name="selxe22">
	  <?php select_from_arr($arr_mod,$sta_modtype,'');?>
     </select>
     </td>
  </tr>
      <tr>
      <td class="tr">禁止访问：</td>
      <td><select name="selxeacc">
	  <?php select_from_arr($arr_yn,$sta_noaccess,'');?>
     </select>
	 
	 <?php
	 if($sta_noaccess=='y') echo '<span style="color:red">禁止访问</span>';
	 ?>
        </td>
    </tr>

	
      <tr>
    <td class="tr">缩略图片：</td>
    <td>	
	宽：<input name="namieww2" type="text"  value="<?php echo $row['sm_w']?>" size="10"> <br />
  <div class="c5"> </div>
	高：<input name="naimehh" type="text"  value="<?php echo $row['sm_h']?>" size="10"> <br />
	<?php echo $text_sm_wh;?>
     </td>
  </tr>
  <tr>
    <td class="tr">每页记录数maxline：</td>
    <td><input name="maxline" type="text"  value="<?php echo $row['maxline']?>" size="10">
	 <span class="cgray">(为数字，且要大于0，仅作用于前台)</span>
     </td>
  </tr>
    <tr  style="background:#dde7ff">
      <td class="tr">分类列表页:</td>
      <td>
      显示类型：
      <select name="listfg">
	  <?php select_from_arr($arr_listfg,$row['listfg'],'');?>
     </select>
 <?php echo $xz_must;?>  
 <div class="c5"></div>
 列表页的<?php echo $text_cssname;?>
  <input name="listcssname" class="inputcss form-control"  type="text" value="<?php echo $row['listcssname']?>"  /><?php echo $xz_maybe; ?>

        </td>
    </tr>
     <tr>
      <td class="tr">分类详情页 的显示类型：</td>
      <td><select name="detailfg">
	  <?php select_from_arr($arr_detailfg,$row['detailfg'],'');?>
     </select>
 <?php echo $xz_must;?>  
	 
        </td>
    </tr>

	
	 

  
  
  <tr>
    <td></td>
    <td style="padding:30px 10px">

     <input class="mysubmit" type="submit" name="Submit" value="<?php echo $tit_v;?>"></td>
  </tr>
 </table>
  <?php echo $inputmust;?>
</form>
<?php
}
?>
<script>
function  checkhere(thisForm){
		if (thisForm.name.value==""){
		alert("请输入名称");
		thisForm.name.focus();
		return (false);
        }
		if (thisForm.selxe22.value==""){
		alert("请选择分类类型");
		thisForm.selxe22.focus();
		return (false);
        }
		if (thisForm.listfg.value==""){
		alert("请选择 分类列表 的显示类型");
		thisForm.listfg.focus();
		return (false);
        }
        if (thisForm.detailfg.value==""){
		alert("请选择 分类详情页 的显示类型");
		thisForm.detailfg.focus();
		return (false);
        }
		 
}
 </script>
 