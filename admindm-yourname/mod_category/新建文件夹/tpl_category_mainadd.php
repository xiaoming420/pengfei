<?php
/*
	power by JASON.ZHANG  DM建站  www.demososo.com
*/
 

	if($act=='add'){
		$jump_insertupdatesub = $jumpv_file.'&act=insert';
		$tit_v='添加主类';
		$alias='';$name='';
	}
	
	if($act=='insert'){

			if($abc1=="") {$abc1='pls input title';}
		 
		 $arr_can = 'album:##album_fancybox==#==albumcssname:##==#==albumposi:##y==#==shop_priceold:##==#==shop_price:##==#==shop_currency:##==#==shop_currencycn:##==#==shop_linktitle:##==#==authorcate:##==#==authorcompanycate:##==#==authordatecate:##==#==authorhitcate:##==#==news_title:##==#==news_moretitle:##==#==sta_fontsize:##y==#==sta_sharebtn:##y==#==sta_kvtothumb:##n==#==sta_field:##n==#==field_title:##==#==sta_tag:##n==#==field_titlebz1:##备注1==#==field_titlebz2:##备注2==#==field_titlebz3:##备注3';
 
	
			$catbs='cate'.$bshou;
			$ss = "insert into ".TABLE_CATE." (pid,pidname,pbh,name,alias,last,level,lang,arr_can) values ('0','$catbs','$user2510','$abc1','$abc2','y',1,'".LANG."','$arr_can')";
			 //echo $ss;exit;
			iquery($ss);
			//insert into menu--------------	
				 
			$ss = "insert into ".TABLE_ALIAS." (pid,pbh,name,type,lang) values ('$catbs','$user2510','$catbs','cate','".LANG."')";
			// echo $ss;exit;
			iquery($ss);
			
			 //alert("添加成功");
			//tongbu_pidname($table);//change id to pidname
			jump($jumpv);
	}
	
 
	
if($act=='add')	{
?>	
 
<form  onsubmit="javascript:return checkhere(this)" action="<?php  echo $jump_insertupdatesub;?>" method="post" enctype="multipart/form-data">
<table class="formtab">

  <tr>
    <td width="18%" class="tr">主类名称：</td>
    <td width="75%"><input name="name" type="text" id="name" value="<?php echo $name?>" size="80">
 
	  <p class="hintbox">提示：<br />添加完后，请修改别名。</p> 
     </td>
  </tr> 
  
  <tr>
    <td></td>
    <td> <input class="mysubmit" type="submit" name="Submit" value="<?php echo $tit_v;?>"></td>
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
}
 </script>
 