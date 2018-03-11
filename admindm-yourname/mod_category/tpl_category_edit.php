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

    $ss = "update ".TABLE_CATE." set name='$abc1',alias_jump='$abc2',sta_noaccess='$abc3',sm_w='$abc4',sm_h='$abc5',listcssname='$abc6',maxline='$abc7',cus_columns='$abc8',cus_substrnum='$abc9',listfg='$abc10',detailfg='$abc11'   where pidname='$catid' $andlangbh limit 1";
   
// echo $ss;exit;
			iquery($ss); 	

		 jump($jumpvedit);

	 

	
	}
	
else	{
 
  
     $tit_v='修改主类';
     //$sta_modtype=$row['modtype'];
      $pidname=$row['pidname']; 
     $sta_noaccess=$row['sta_noaccess'];  
    $name=$row['name']; 
    $seo1=$row['seo1']; 
    $seo2=$row['seo2']; 
    $seo3=$row['seo3']; 
    $listcssname=$row['listcssname']; 
    $maxline=$row['maxline']; 
    $cus_columns=$row['cus_columns']; 
    $cus_substrnum=$row['cus_substrnum'];
    $listfg=$row['listfg']; 
    $detailfg=$row['detailfg']; 
   
    $jump_insertupdatesub = $jumpvcatidf.'&act=update';
  

?>	
 
 <div class="contenttop">

    <a class="needpopup" href="../mod_seo/mod_seo_edit.php?lang=<?php echo LANG;?>&act=edit&pidname=<?php echo $pidname;?>&type=cate"><i class="fa fa-pencil-square-o"></i> 修改SEO</a>

&nbsp;&nbsp;&nbsp;&nbsp;
  <a class="needpopup" href="../mod_seo/mod_alias_edit.php?lang=<?php echo LANG;?>&act=edit&pidname=<?php echo $pidname;?>&type=cate"><i class="fa fa-pencil-square-o"></i> 修改别名</a> 
  <?php 
  $alias= alias($pidname,'cate');
  if($alias<>'') echo '( '.spangray($alias).' )';
  ?> 

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
    <td class="tr">列表：</td>
    <td>
  
<?php echo $text_cssname;?>
 <br />
  <input name="listcssname" class="inputcss form-control"  type="text" value="<?php echo $listcssname; ?>"  /><?php echo $xz_maybe; ?>

   <div class="c5"></div>

    每页记录数maxline：

    <input name="maxline" type="text"  value="<?php echo $maxline; ?>" size="10">
   <span class="cgray">(为数字，且要大于0，仅作用于前台)</span>

<div class="c5"> ></div>


   列数：<select name="cus_columns">
                          <?php 
                         
                          select_from_arr($arr_columns,$cus_columns,'');?>
                     </select>

              <div class="c5"> </div>
                摘要的内容长度：
                <input name="cus_substrnum" type="text"   value="<?php echo $cus_substrnum; ?>"  size="10" />
                (为整数，如果为0，则不显示摘要)

                  <div class="c5"> </div>

              

                  <br />
                  <span class="cgray">(个别效果文件不适用于上面的 所有的参数)</span>


   

<div class="c5"> ></div>

   效果文件：
  <select name="listfg">
      <?php 
 
    select_from_arr($arr_listfg,$listfg,'');?>
     </select>
 <?php echo $xz_must;?>




     </td>
  </tr>
 




     <tr>
      <td class="tr"><br />  详情页效果文件：</td>
      <td> <br />  
      <select name="detailfg">    
      <?php   
      select_from_arr($arr_detailfg,$detailfg,'');?>
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
 