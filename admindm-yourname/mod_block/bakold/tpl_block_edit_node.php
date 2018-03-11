<?php
/*
  欢迎使用DM企业建站系统，本系统由www.demososo.com开发。
 */
if (!defined('IN_DEMOSOSO')) {
    exit('this is wrong page,please back to homepage');
}
if ($act == 'update') {

     if(@$_POST['inputmust']=='') {echo $inputmusterror.$backlist;exit;}

  // pre($_POST); exit;

  $postarrexc=  array("name","pidcatesele","Submit","inputmust");  

if(strpos($abc1, $abc6)) $name = $abc1;
    else   $name = $abc1.' - '.$abc6; //add template to name,for search by title.
 $postv = zb_insertadv($_POST,$postarrexc)."name='$name',dateday='$dateday'"; 
 
 
 
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
   
    $kv = $rowsub['kv'];
    $name = $rowsub['name']; 
   //$namefront = $rowsub['namefront'];  

   $template = $rowsub['template']; 

   $cssname = $rowsub['cssname'];

    $pidnamehere = $rowsub['pidname']; 

    $pidcate = $rowsub['pidcate'];
    $maxline = $rowsub['maxline']; 
 

    $jump_insertimg = $jumpvpft . '&act=update';


?>
 
<a href="<?php echo $jumpvp?>&file=editCan&type=<?php echo $type;?>"><i class="fa fa-caret-right"></i> 修改参数</a>
 <br /> <br />
<form  onsubmit="javascript:return checkhere(this)" action="<?php echo $jump_insertimg; ?>" method="post" enctype="multipart/form-data">
    <table class="formtab">
        <tr>
            <td width="12%" class="tr">标题：</td>
            <td width="88%"> 
                <input name="name" type="text"   value="<?php echo $name; ?>" class="form-control" /><?php echo $xz_must; ?>  

 <?php
 // if($pidfolder=='base' || $pidfolder == PIDFOLDERCUR)   echo  adm_previewlink($pidnamehere);
echo  adm_previewlink($pidnamehere);
 ?>        
            </td>
        </tr>

  
      

         <tr>
            <td   class="tr">
                <?php echo $text_cssname; ?> 
            </td>
            <td  > 
                <input name="cssname" type="text"  class="inputcss form-control" value="<?php echo $cssname; ?>"  /><?php echo $xz_maybe; ?>
                <p class="cgray">
                参考：  cirimg ,  zoomimgwrap   ,  bgvideo
                ,   gridcol2divi_2, bxstop，pli20， cirimgshadow
                <br />onlytext_p , showtitle </p>  
            </td>
        </tr>

       



  <?php 
 require_once HERE_ROOT.'mod_block/tpl_block_edit_tpl_pidcate.php';
 ?>
 

     
        <tr>
            <td  class="tr">
            记录数：</td>
            <td  > 
 <input name="maxline" type="text"  value="<?php echo $maxline; ?>"  size="10" /><?php echo $xz_must; ?>  
 
            </td>
        </tr>
 
     



 <?php 
 require_once HERE_ROOT.'mod_block/tpl_block_edit_tpl_template.php';
 ?>
 
   
     


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
