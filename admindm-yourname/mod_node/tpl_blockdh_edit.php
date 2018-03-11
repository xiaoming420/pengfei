<?php
/*
  欢迎使用DM企业建站系统，本系统由www.demososo.com开发。
 */
if (!defined('IN_DEMOSOSO')) {
    exit('this is wrong page,please back to homepage');
}
if ($act == 'update') {

 
    if(@$_POST['inputmust']=='') {echo $inputmusterror.$backlist;exit;}
 
     
   if($abc1=="") {
       echo 'pls input title'; 
        exit;
}


    $desp = zbdesp_onlyinsert($_POST['despcontent']); //note: desp and addr not use variable abc1.
    $desptext = zbdesp_onlyinsert($_POST['editor1text']);
  
    $ss = "update " . TABLE_NODE . " set title='$abc1',despjj='$abc2',linktitle='$abc3',linkurl='$abc4',titlebz1='$abc5',titlebz2='$abc6',titlebz3='$abc7',desptext='$desptext',desp='$desp',dateedit='$dateall' where id='$tid' $andlangbh limit 1";
    // echo $ss;exit;
    iquery($ss);
    //alert("修改成功");
  $jump_insertimg = $jumpv_file . '&act=edit&tid=' . $tid;
    jump($jump_insertimg);
}



if ($act == 'edit') {
    $titleh2 = '修改';
    $sqlsub = "SELECT * from " . TABLE_NODE . "  where id='$tid' $andlangbh order by id limit 1";
    //echo $sqledit;exit;
    $rowsub = getrow($sqlsub);
    //pre($rowsub);
  
    $title = $rowsub['title'];     
     $pidnamehere = $rowsub['pidname'];
       
 $cssname = $rowsub['cssname'];
   $linkurl = $rowsub['linkurl'];$linktitle = $rowsub['linktitle'];$linkcss = $rowsub['linkcss'];
   $linksize = $rowsub['linksize'];$linkradius = $rowsub['linkradius'];$linkalign = $rowsub['linkalign'];
 

    $titlestyle = $rowsub['titlestyle']; $titlestylesub = $rowsub['titlestylesub']; 
  
    $iconimg = $rowsub['iconimg']; 
$titlebz1 = $rowsub['titlebz1']; $titlebz2 = $rowsub['titlebz2']; $titlebz3 = $rowsub['titlebz3']; 
    
     $despjj = $rowsub['despjj'];
    $desp = zbdesp_imgpath($rowsub['desp']);
    $desptext = zbdesp_imgpath($rowsub['desptext']);
    


    $jump_insertimg = $jumpv_file . '&act=update&tid=' . $tid;
   
 

?>
<div style="height:35px"> 
<div class="fr" style="margin-right:100px">
<span class="cp editmenuother cirbtn">编辑其他 &#8595; </span>
</div><!--end fr-->

</div>


<div class="editmenuother_cnt">
<?php 
 require_once('plugin_blockdh_list_edit.php');
?>
</div><!--end editmenuother_cnt-->

<form  onsubmit="javascript:return checkhere(this)" action="<?php echo $jump_insertimg; ?>" method="post" enctype="multipart/form-data">
    <table class="formtab">
      

        <tr>
            <td width="12%" class="tr">标题：</td>
            <td width="88%"> 
                <input name="title" type="text"   value="<?php echo $title; ?>" class="form-control" /><?php echo $xz_must; ?> 


            </td>
        </tr>
     
        <tr>
            <td width="12%" class="tr">副标题：</td>
            <td width="88%"> 
                <textarea class="form-control" rows="3" name="despjj"><?php echo $despjj; ?></textarea> <?php echo $xz_maybe; ?>
                           
            </td>
        </tr>
       
       
      
     <tr style="background: #DCE8F4">
            <td width="12%" class="tr">链接：</td>
            <td width="88%">
            链接字样：       
    <input name="linktitle" type="text" value="<?php echo $linktitle?>"  size="30" />
<?php echo $xz_maybe;?> 
<div class="c5"></div>

     链接网址：       
    <input name="linkurl" type="text" value="<?php echo $linkurl?>"  class="form-control" />
<?php echo $xz_maybe;?> 

 
            </td>
        </tr>
  
      <tr>
            <td width="12%" class="tr">备注：</td>
            <td width="88%"> 
                备注1：<input name="titlebz1" type="text"   value="<?php echo $titlebz1; ?>" size="30"  /><?php echo $xz_maybe; ?> 
                   <div class="c5"> </div>
                 备注2：<input name="titlebz2" type="text"   value="<?php echo $titlebz2; ?>" size="30"  /><?php echo $xz_maybe; ?> 
                     <div class="c5"> </div>
                 备注2：<input name="titlebz3" type="text"   value="<?php echo $titlebz3; ?>" size="30"  /><?php echo $xz_maybe; ?> 
            </td>
        </tr>
 


  <tr>
    <td class="tr">内容： </td>
  <td>               
   
    <p>
             
  <!--
    <a href="../mod_imgfj/mod_imgfj.php?pid=<?php //echo $pidnamehere;?>&lang=<?php //echo LANG;?>" target="_blank">私有编辑器附件管理(<?php //echo num_imgfj($pidnamehere);?>)</a>
|
-->
 <?php echo $text_imgfjlink_bjq;?>
   </p>

<?php require_once('../plugin/editor_textarea.php'); //textarea is in this file ?>

            </td> 
        </tr>


  <tr>
            <td></td>
            <td>
                <input  class="mysubmit mysubmitbig" type="submit" name="Submit" value="<?php echo $titleh2; ?>"></td>
        </tr>
    </table>

     <?php echo $inputmust;?>

</form>

<?php } ?>


<script>
    function checkhere(thisForm) {
        if (thisForm.title.value == "")
        {
            alert("请输入标题。");
            thisForm.title.focus();
            return (false);
        }

    
    
        // return;

    }


</script>
