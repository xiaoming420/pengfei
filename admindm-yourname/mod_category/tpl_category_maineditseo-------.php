<?php
/*
  power by JASON.ZHANG  DM建站  www.demososo.com
*/
if(!defined('IN_DEMOSOSO')) {
  exit('this is wrong page,please back to homepage');
}

 

 
  
  if($act=='update'){ 
       if(@$_POST['inputmust']=='') {echo $inputmusterror.$backlist;exit;}


   

    $ss = "update ".TABLE_CATE." set seo1='$abc1',seo2='$abc2',seo3='$abc3'  where pidname='$catid' $andlangbh limit 1";
   
// echo $ss;exit;
      iquery($ss);  

     jump($jumpv_maineditseo);

   

  
  }
  
else  {
  
    $ss = "select * from ".TABLE_CATE." where pidname= '$catid' $andlangbh limit 1";
    $row = getrow($ss);
     
    if($row=='no'){alert($text_edit_nothisid);exit;}  
     $tit_v='修改主类';
     $seo1=$row['seo1'];
     $seo2=$row['seo2'];  
    $seo3=$row['seo3']; 

  
    $jump_insertupdatesub = $jumpv_file.'&act=update';
 
  

?>  
 
<div style="background:#e2e2e2;padding:10px;font-size:16px;font-weight:bold">修改SEO：</div> 
<form  onsubmit="javascript:return checkhere(this)" action="<?php  echo $jump_insertupdatesub;?>" method="post" enctype="multipart/form-data">
<table class="formtab">
   <tr>
    <td class="tr" width="20%">搜索引擎优化：</td>
    <td> SEO标题：<input name="seocus1" type="text" id="page_seo1" value="<?php echo $seo1;?>" class="form-control" />
      <?php echo $xz_maybe;?>
     <div class="c5"></div>SEO关键字：
      <input name="seocus2" type="text" id="page_seo2" value="<?php echo $seo2;?>" class="form-control" />
      <?php echo $xz_maybe;?> 多个关键字，请以空格隔开。
      <div class="c5"></div>
SEO描述：
<textarea name="seocus3" class="form-control"   rows="3" ><?php echo $seo3;?></textarea>
      <?php echo $xz_maybe;?>
      </td>
  </tr>
  
    

  
  
  <tr>
    <td></td>
    <td style="padding:30px 10px">

     <input class="mysubmit" type="submit" name="Submit" value="提交"></td>
  </tr>
 </table>
  <?php echo $inputmust;?>
</form>
<?php
}
?>
 