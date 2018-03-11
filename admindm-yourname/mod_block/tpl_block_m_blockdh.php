<?php
/*
  欢迎使用DM企业建站系统，本系统由www.demososo.com开发。
 */
if (!defined('IN_DEMOSOSO')) {
    exit('this is wrong page,please back to homepage');
}
if ($act == 'update') {
  //pre($_POST);exit;
  if ($abc1 == '')  { echo '请输入标题'; exit; }
     if(@$_POST['inputmust']=='') {echo $inputmusterror.$backlist;exit;} 
 
 //$despjj = zbdespadd2($abc5);   

   // $desp = zbdesp_onlyinsert($_POST['despcontent']); //note: desp and addr not use variable abc1.
    //$desptext = zbdesp_onlyinsert($_POST['editor1text']);
    $template = zbdesp_onlyinsert($_POST['template']); 
   if($abc5<1) $abc5=1;
    $ss = "update " . TABLE_BLOCK . " set name='$abc1',cssname='$abc2',pidcate='$abc3',template='$template',maxline='$abc5',cus_columns='$abc6',namefront='$abc7',despjj='$abc8',bgcolor='$abc9',blockimg='$abc10',linktitle='$abc11',linkurl='$abc12' where pid='$type' and pidname='$pidname' $andlangbh limit 1"; 
        //echo $ss;exit;
        iquery($ss);  
        jump($jumpvpt.'&act=edit');
    

}

if ($act == 'insert') {
 
    $pidnamecur = 'vblock' . $bshou; 
 
    if ($abc1 == '')  { echo '请输入标题'; exit; }


     if(@$_POST['inputmust']=='') {echo $inputmusterror.$backlist;exit;}
    //$desp = zbdesp_onlyinsert($_POST['despcontent']); //note: desp and addr not use variable abc1.
   // $desptext = zbdesp_onlyinsert($_POST['editor1text']);

   if($abc5<1) $abc5=1;
      $ss = "insert into ".TABLE_BLOCK." (pid,pidname,pbh,lang,name,cssname,pidcate,template,maxline,cus_columns,namefront,despjj,bgcolor,blockimg,linktitle,linkurl) values ('$type','$pidnamecur','$user2510','".LANG."','$abc1','$abc2','$abc3','$abc4','$abc5','$abc6','$abc7','$abc8','$abc9','$abc10','$abc11','$abc12')";  
       //echo $ss;exit;

    iquery($ss);
   jump($jumpvt);



}

 

if($act=='add'){
  $maxline=8;
  $cus_columns=3;
  $cus_substrnum=300;
   $name=$cssname=$template=$desp=$desptext=$pidcate=$namefront=$despjj =$template=$bgcolor=$blockimg=$linktitle=$linkurl=''; 
   $jumpvinsert = $jumpvt.'&act=insert';
}

 if($act=='edit'){
    $titleh2 = '修改';

    $sqlsub = "SELECT *  from " . TABLE_BLOCK . "  where  pid='$type' and pidname='$pidname' $andlangbh order by id limit 1";
    if(getnum($sqlsub)>0){
    //echo $sqledit;exit;
    $rowsub = getrow($sqlsub);
    $name = $rowsub['name'];
    $cssname = $rowsub['cssname'];
    $pidstylebh = $rowsub['pidstylebh']; 
    $pidcate = $rowsub['pidcate']; 
    $maxline = $rowsub['maxline'];$cus_columns = $rowsub['cus_columns'];$cus_substrnum = $rowsub['cus_substrnum'];
    $namefront = $rowsub['namefront'];$despjj = $rowsub['despjj'];
    $template = $rowsub['template']; $templatecur = $rowsub['templatecur'];
    $bgcolor = $rowsub['bgcolor'];     $blockimg = $rowsub['blockimg']; 
    $linktitle = $rowsub['linktitle'];     $linkurl = $rowsub['linkurl']; 
    //$desp = zbdesp_imgpath($rowsub['desp']);
    //$desptext = zbdesp_imgpath($rowsub['desptext']);

    if($pidstylebh<>'y')  $pidstylebh='n';
    
    $jump_insertimg = $jumpvpt . '&act=update';

}
else { 
  echo 'block not exist...';
  exit;
  }
  $jumpvinsert = $jumpvt.'&act=update&pidname='.$pidname;
}

if($act=='add' || $act=='edit'){
?>
 
<form  onsubmit="javascript:return checkhere(this)" action="<?php echo $jumpvinsert; ?>" method="post" enctype="multipart/form-data">
    <table class="formtab">
        <tr>
            <td width="12%" class="tr">标题：</td>
            <td width="88%"> 
                <input name="name" type="text"   value="<?php echo $name; ?>" class="form-control" /><?php echo $xz_must; ?>  
 
<?php 
if($act=='edit')   echo  adm_previewlink($pidname); 
?> 
 
            </td>
        </tr>

  


         <tr>
            <td   class="tr"> <?php echo $text_cssname; ?> </td>
            <td  > 
                <input name="cssname" type="text"  class="inputcss form-control" value="<?php echo $cssname; ?>"  /><?php echo $xz_maybe; ?>
                 <p class="cgray">
                参考：  cirimg ,  zoomimgwrap   ,  bgvideo
                ,   gridcol2divi_2, bxstop，pli20， cirimgshadow
                <br />onlytext_p , showtitle </p>  
            </td>
        </tr>

 
        <tr style="background:#dce8f4">
            <td  class="tr">  区块内容标识：</td>
            <td  class="selectTOinput">           
 <input name="pidcate" type="text"  value="<?php echo $pidcate; ?>" class="form-control" /><?php echo $xz_must; ?>  


 <a class="needpopup" href="../mod_module/mod_showcateidEffect.php?lang=<?php echo LANG?>">查看区块内容标识></a>  
 <br />
<?php
if($pidcate<>''){
 $catname = get_field(TABLE_CATE,'name',$pidcate,'pidname');
 if($catname=='noid') echo '<span style="color:red">分类标识不对</span>';
 else {
     echo '<a  target="_blank" href="../mod_node/mod_blockdh.php?lang=cn&pid='.$pidcate.'">'.spanred($catname).'</a>';
 }  
}
 
?>


            </td>
        </tr>
 



<tr style="background:#dce8f4">
        <td class="tr fb">效果文件：</td>
        <td class="select--TOinput--">  
   
    
 <?php

$filedir = EFFECTROOTADMIN.$type.'/';
echo ' <select name="template">';
select_from_filearr($filedir,$template);
echo '</select>';
 

 
    $filename =  'base/block/'.$type.'/'.$template;
    $file = TEMPLATEROOT.$filename;
   
    echo '<br />效果文件：';
    admcheckfile($file,$filename);
 
 
?>

</td>
    </tr>


    <tr>
    <td  class="tr"> 
</td>
    <td  > 
    <br />  
    <span class="cblue"><i class="fa fa-exclamation-triangle fa-2x"></i> 下面的参数是否在前台显示，取决于选择的效果文件</span>
    </td>
</tr>


 <tr>
            <td  class="tr">  参数设置 ：</td>
            <td  > 
            记录数： <input name="maxline" type="text"  value="<?php echo $maxline; ?>"  size="10" /><?php echo $xz_must; ?>  
            <div class="c5"> </div>
             列数： <select name="cus_columns">
                    <?php select_from_arr($arr_columns,$cus_columns,'');?>
                  </select>
          <?php 
          if($cus_columns>$maxline) echo '<span class="cred">提示：列数大于允许的记录数。</span>';
          ?>        
<div class="c5"> </div>
前台标题： <input name="namefront" type="text"  value="<?php echo $namefront; ?>"  size="30" /><?php echo $xz_maybe; ?>  

                  <div class="c5"> </div>
 前台副标题：<br />
 <textarea class="form-control" rows="3" name="despjj"><?php echo $despjj; ?></textarea> <?php echo $xz_maybe; ?>
 

 <div class="c5"> </div>
 背景色或背景图片： <input name="bgcolor" type="text"  value="<?php echo $bgcolor; ?>"  size="35" /><?php echo $xz_maybe; ?> 
 <?php
if($bgcolor<>''){
    if(is_int(strpos($bgcolor,'/'))){
        echo check_blockid($bgcolor);
    }
    else {  
        echo '<div style="display:inline-block;width:33px;height:33px;background:'.$bgcolor.'"> </div>';
    }
}
?> 
 <div class="c5"> </div>
可能用到的图片： <input name="blockimg" type="text"  value="<?php echo $blockimg; ?>"  size="35" /><?php echo $xz_maybe; ?>  
<?php
if($blockimg<>'') echo check_blockid($blockimg);
?>
<div class="c5"> </div>
 
链接字样： <input name="linktitle" type="text"  value="<?php echo $linktitle; ?>"  size="35" /><?php echo $xz_maybe; ?> 
<div class="c5"> </div>
链接网址： <input name="linkurl" type="text"  value="<?php echo $linkurl; ?>"  size="35" /><?php echo $xz_maybe; ?> 



            </td>
        </tr>
 
    
 


 
 

        <tr>
            <td></td>
            <td>
                <input  class="mysubmit mysubmitbig" type="submit" name="Submit" value="提交"></td>
        </tr>
    </table>

      <?php echo $inputmust;?>

</form>

 
 <script>
    function checkhere(thisForm) {
        if (thisForm.name.value == "")
        {
            alert("请输入标题。");
            thisForm.name.focus();
            return (false);
        }

          if (thisForm.pidcate.value == "")
        {
            alert("请输入区块内容标识。");
            thisForm.pidcate.focus();
            return (false);
        }

        if (thisForm.maxline.value == "")
        {
            alert("请输入记录数。");
            thisForm.maxline.focus();
            return (false);
        }

       

        // return;

    }

   


</script>


<?php 

}
 
?>