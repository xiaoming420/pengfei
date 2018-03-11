<?php
/*
  欢迎使用DM企业建站系统，本系统由www.demososo.com开发。
*/
if(!defined('IN_DEMOSOSO')) {
  exit('this is wrong page,please back to homepage');
}

 if($act=='insert')
 {
    if ($abc1 == '') {
      echo '请输入标题';  
      exit;
    }
    

 $sql = "SELECT id from ".TABLE_STYLE." where htmldir='$abc2' and pidname<>'$pidname'  limit 1";
   if(getnum($sql)>0){
      alert('出错，模板目录 '.$abc2.' 已使用。(包括其他语言)');
       jump($jumpv);

      exit;
   }  

 
  $htmldir = $abc2;
 
  $pidname='style'.$bshou;
   
   $ss = "insert into ".TABLE_STYLE." (pidname,pbh,pid,pidmenu,pidregion,title,lang,dateedit,htmldir,style_blockid) values ('$pidname','$user2510','0','$pidmenu','$pidregion','$abc1','".LANG."','$dateall','$htmldir','$arr_styleblockidV')";//pidregion no use
 //echo $ss;exit;
   iquery($ss);
 
   jump($jumpv);
    
 }
  
 
 
 
 
 if($act=='add')
 {
 
 $jumpv_insert = $jumpv_f.'&act=insert';

?>
 
<form  onsubmit="javascript:return checkhere(this)" action="<?php echo $jumpv_insert;?>" method="post"  enctype="multipart/form-data">
  <table class="formtab">
    <tr>
      <td width="20%" class="tr">模板的标题：</td>
      <td  > <input name="name" type="text"  value="<?php echo $name;?>" class="form-control" />
      <?php echo $xz_must?>
 
   </td>
   </tr> 

    <tr>
      <td class="tr">模板目录：</td>
      <td> 
   <select name="selefolder" class="form-control">
         <option value="">请选择</option> 
<?php 
$arrtpltemplateroot = getDir(TEMPLATEROOT);
//pre($arrtpltemplateroot);
foreach ($arrtpltemplateroot as $k => $v) {
  if($v<>'base'){
    $htmldirv = '';
     
   echo '<option '.$htmldirv.' value="'.$v.'">'.$v.'</option>';
}
}
     ?>
</select>
  <p class="cgray">
请先在DM-template创建一个模板目录。
</p>
        </td>
    </tr>

 



  <tr>
      <td></td>
      <td>
      <input  class="mysubmit" type="submit" name="Submit" value="添加"></td>
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
    alert("请输入标题");
    thisForm.name.focus();
    return (false);
  } 
    if (thisForm.selefolder.value=="")
  {
    alert("请选择模板目录");
    thisForm.selefolder.focus();
    return (false);
  } 

 
    if (thisForm.selectmb.value=="")
  {
    alert("请选择模板复制");
    thisForm.selectmb.focus();
    return (false);
  }  


}

</script>
