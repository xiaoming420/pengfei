<?php
/*
  欢迎使用DM企业建站系统，本系统由www.demososo.com开发。
 */
if (!defined('IN_DEMOSOSO')) {
    exit('this is wrong page,please back to homepage');
}
if ($act == 'update') {

     if(@$_POST['inputmust']=='') {echo $inputmusterror.$backlist;exit;}

 


//pre($postv);
 
 $postv = zb_insert_oristring($_POST)."dateday='$dateday'";


   //$ss = "update " . TABLE_BLOCK . " set cus_columns='$abc1',cus_colborder='$abc2',cus_coldivi='$abc3',cus_showkvsm='$abc4',cus_cirimg='$abc5',cus_imgzoom='$abc6',cus_substrnum='$abc7',titlestyle='$abc8',titlestylesub='$abc9',cus_showmorebtn='$abc10',linktitle='$abc11',linkcss='$abc12',linksize='$abc11',linkradius='$abc12',linkalign='$abc13',dateday='$dateday'  where pid='$type' and pidname='$pidname' $andlangbh limit 1";

    $ss = "update " . TABLE_BLOCK . " set  ".$postv."  where pid='$type' and pidname='$pidname' $andlangbh limit 1";

   // echo $ss;exit;
 
     iquery($ss);
 
    jump($jumpvpft);
}



else{
    $titleh2 = '修改';
    $sqlsub = "SELECT * from " . TABLE_BLOCK . "  where  pid='$type' and pidname='$pidname' $andlangbh order by id limit 1";
    if(getnum($sqlsub)>0){
    //echo $sqledit;exit;
    $rowsub = getrow($sqlsub);
   
 
    $name = $rowsub['name']; 
 

    $titlestyle = $rowsub['titlestyle'];
    $titlestylesub = $rowsub['titlestylesub'];
    $linktitle = $rowsub['linktitle'];$linkcss = $rowsub['linkcss'];$linksize = $rowsub['linksize'];
   $linkalign = $rowsub['linkalign'];$linkradius = $rowsub['linkradius'];



  $cus_columns = $rowsub['cus_columns'];$cus_colborder = $rowsub['cus_colborder'];$cus_coldivi = $rowsub['cus_coldivi'];
  
 $cus_substrnum = $rowsub['cus_substrnum'];
  $cus_showmorebtn = $rowsub['cus_showmorebtn'];
  $cus_showkvsm = $rowsub['cus_showkvsm'];  $cus_imgzoom = $rowsub['cus_imgzoom'];  $cus_cirimg = $rowsub['cus_cirimg'];

    $jump_insertimg = $jumpvpft . '&act=update';


?>
 <a href="<?php echo $jumpvp?>&file=edit&type=<?php echo $type;?>"><i class="fa fa-caret-right"></i> 修改配置</a>
 <br />
    <strong class="cred">提醒 ：参数并不全都会生效，这取决于使用的效果文件。</strong>
    <br /> <br />           

<form  onsubmit="javascript:return checkhere(this)" action="<?php echo $jump_insertimg; ?>" method="post" enctype="multipart/form-data">
    <table class="formtab">
        <tr>
            <td width="12%" class="tr">标题：</td>
            <td width="88%">  
            <?php 
            echo '<span style="font-size:18px">'.$name.' </span>'; 

            echo  adm_previewlink($pidname);

            ?>
              
            </td>
        </tr>

   
 
    
         <tr>
            <td width="12%" class="tr">一些参数：</td>
            <td width="88%"> 
              列数：
               <select name="cus_columns">
                    <?php select_from_arr($arr_columns,$cus_columns,'');?>
                  </select>
   
  <div class="c5"> </div>
   列的内容是否 两列：
               <select name="cus_coldivi">
                    <?php select_from_arr($arr_yn,$cus_coldivi,'');?>
                  </select>

                  <a  target="_blank" href="http://www.demososo.com/detail-128.html">这是什么?</a>
 




            </td>
        </tr>

<!--图片相关-->
  <tr>
   <td width="12%" class="tr">图片相关：</td>
 <td width="88%"> 


  <div class="c5"> </div>
              是否显示图片：
                  <select name="cus_showkvsm">
                    <?php select_from_arr($arr_yn,$cus_showkvsm,'');?>
                  </select>

<div class="c5"> </div>
图片是否圆角：
                  <select name="cus_cirimg">
                    <?php select_from_arr($arr_yn,$cus_cirimg,'');?>
                  </select>
<div class="c5"> </div>
图片是否移上去扩大：
                  <select name="cus_imgzoom">
                    <?php select_from_arr($arr_yn,$cus_imgzoom,'');?>
                  </select>

  </td>
        </tr>

<!--标题和内容-->


  <tr>
   <td width="12%" class="tr">标题和内容：</td>
 <td width="88%"> 

    
              摘要的内容长度： <input name="cus_substrnum" type="text"   value="<?php echo $cus_substrnum; ?>"  size="10" />
              (为整数，如果为0，则不显示摘要)
              <br />
              <span class="cgray">但不作用于效果区块内容</span>
     <div class="c20"> </div>          
 
    标题的样式： 
     <input name="titlestyle" type="text" value="<?php echo $titlestyle?>" size="35" /> <?php echo $xz_maybe;?>  
  <span class="cgray">试下： text-align:center;color:red </span>
      <div class="c5"> </div>   
       内容的样式： 
     <input name="titlestylesub" type="text" value="<?php echo $titlestylesub?>" size="35" /> <?php echo $xz_maybe;?>  
  <span class="cgray">试下： color:red </span>

  </td>
        </tr>



<!--链接按钮-->

  <tr>
            <td width="12%" class="tr">链接按钮：</td>
            <td width="88%"> 
             是否显示链接按钮：
                  <select name="cus_showmorebtn">
                    <?php select_from_arr($arr_yn,$cus_showmorebtn,'');?>
                  </select>
                  <br />
                  <?php
                  $cus_showmorebtnVV ='';
                   if($cus_showmorebtn=='n') {
                    echo '<span class="cred">链接按钮不显示，下面关于链接按钮的设置无效。</span>';
                    $cus_showmorebtnVV = 'style="background:#ccc"';

                  }

                    ?>
              <div class="c5"> </div>   


<div <?php echo $cus_showmorebtnVV;?>>

  <div class="inputclear"> </div>
 链接的字样：&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input name="linktitle" type="text" value="<?php echo $linktitle?>"  size="30" />
<?php echo $xz_maybe;?> <span class="cgray">(可以填写‘查看详情’，如果不填，则为 ‘更多’)</span>
 <div class="inputclear"> </div>

 链接的颜色：
<select name="linkcss"> 
<?php select_from_arr($arr_linkmore,$linkcss,'');?>
   </select>
    <div class="inputclear"> </div>

  链接的尺寸：
<select name="linksize"> 
<?php select_from_arr($arr_linksize,$linksize,'');?>
 </select> 

 <div class="inputclear"> </div>

  是否圆角： 

<select name="linkradius"> 
<?php select_from_arr($arr_linkradius,$linkradius,'');?>
 </select> 

  <div class="inputclear"> </div>

  链接的对齐：
<select name="linkalign"> 
<?php select_from_arr($arr_textalign,$linkalign,'');?>
 </select>

</div>

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

<?php 

} 
else{echo '区块不存在 ';}

}

?>


<script>
    function checkhere(thisForm) {
        if (thisForm.title.value == "")
        {
            alert("请输入标题。");
            thisForm.title.focus();
            return (false);
        }

          if (thisForm.pidcate.value == "")
        {
            alert("分类标识不能为空。");
            thisForm.pidcate.focus();
            return (false);
        }



        // return;

    }

  



</script>
