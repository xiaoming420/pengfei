<?php
/*
  欢迎使用DM企业建站系统，本系统由www.demososo.com开发。
 */
if (!defined('IN_DEMOSOSO')) {
    exit('this is wrong page,please back to homepage');
}
if ($act == 'update') {
  //pre($_POST);exit;
  

     if(@$_POST['inputmust']=='') {echo $inputmusterror.$backlist;exit;}


  
   if($abc1=="") {alert('请输入标题！');  jump($jumpvpft); }

   $sql = "SELECT kv from ".TABLE_BLOCK." where  pid='$type' and pidname='$pidname' $andlangbh   limit 1";
       //echo $sql;
                           $row = getrow($sql);
                           $imgsqlname =$row['kv'];  
                       
     $delimg = zbdesp_onlyinsert($_POST['delimg']);                            
    if($delimg=='y'){
        if($imgsqlname<>'') p2030_delimg($imgsqlname,'y','y');
        $kv_v = ",kv = ''";
    }
    else{
         $imgname = $_FILES["addr"]["name"];
       $imgsize = $_FILES["addr"]["size"];
       if (!empty($imgname)) {
           //make thumb
          //  $sql = "SELECT sm_w,sm_h from ".TABLE_BLOCK." where pidname='$pidname'  $andlangbh   limit 1";
           //                $row = getrow($sql);
           //                $up_w_s =$row['sm_w'];$up_h_s =$row['sm_h'];   
                        //  echo $up_w_s.'-'.$up_h_s;
          // if( $up_w_s==0 ||  $up_h_s == 0) $up_small = 'n';
           //else $up_small = 'y';  
            
            $up_small = 'n';           
           $imgtype = gl_imgtype($imgname);
          // $up_small = 'y';
           $up_delbig = 'n';//not del,just override
           $up_water = 'n';           
           $i = '';
           require_once('../plugin/upload_img.php'); //need get the return value,then upimg part turn to easy.
           $kv_v = ",kv = '$return_v'";
       }
       else  $kv_v = "";
    
    }

 
 //$despjj = zbdespadd2($abc5);   

    $desp = zbdesp_onlyinsert($_POST['despcontent']); //note: desp and addr not use variable abc1.
    $desptext = zbdesp_onlyinsert($_POST['editor1text']);



   $postarrexc=  array("name","delimg","editor1text","despcontent","Submit","inputmust");  

if(strpos($abc1, $abc15)) $name = $abc1;
    else   $name = $abc1.' - '.$abc15; //add template to name,for search by title.
 $postv = zb_insertadv($_POST,$postarrexc)."name='$name',dateday='$dateday' $kv_v,desptext='$desptext',desp='$desp'"; 



   $ss = "update " . TABLE_BLOCK . " set  ".$postv." where pid='$type' and pidname='$pidname' $andlangbh limit 1";
     //echo $ss;exit;

    iquery($ss);
 
    jump($jumpvpft);
}



else{
    $titleh2 = '修改';
    $sqlsub = "SELECT * from " . TABLE_BLOCK . "  where  pid='$type' and pidname='$pidname' $andlangbh order by id limit 1";
    if(getnum($sqlsub)>0){
    //echo $sqledit;exit;
    $rowsub = getrow($sqlsub);
   //pre($rowsub);
    $kv = $rowsub['kv'];
    $name = $rowsub['name']; 
   $namefront = $rowsub['namefront'];  
   $template = $rowsub['template'];     $blockid = $rowsub['blockid'];    
  
     $linkalign = $rowsub['linkalign']; 
   
$titlestyle = $rowsub['titlestyle']; $titlestylesub = $rowsub['titlestylesub']; 

      $cssname = $rowsub['cssname'];  $despjj = zbdespedit($rowsub['despjj']);
    $pidnamehere = $rowsub['pidname'];

   $linkurl = $rowsub['linkurl'];$linktitle = $rowsub['linktitle'];$linkcss = $rowsub['linkcss'];$linksize = $rowsub['linksize'];
   $linkalign = $rowsub['linkalign'];$linkradius = $rowsub['linkradius'];
 
 $imgsmall2 = p2030_imgyt($kv, 'y', 'n');
 

//$despjj = $rowsub['despjj'];
    $desp = zbdesp_imgpath($rowsub['desp']);
    $desptext = zbdesp_imgpath($rowsub['desptext']);
    
    $jump_insertimg = $jumpvpft . '&act=update';


?>
 
<form  onsubmit="javascript:return checkhere(this)" action="<?php echo $jump_insertimg; ?>" method="post" enctype="multipart/form-data">
    <table class="formtab">
        <tr>
            <td width="12%" class="tr">标题：</td>
            <td width="88%"> 
                <input name="name" type="text"   value="<?php echo $name; ?>" class="form-control" /><?php echo $xz_must; ?>  

 <?php echo  adm_previewlink($pidnamehere);?>  


            </td>
        </tr>

  
      

         <tr>
            <td   class="tr"> <?php echo $text_cssname; ?> </td>
            <td  > 
                <input name="cssname" type="text"  class="inputcss form-control" value="<?php echo $cssname; ?>"  /><?php echo $xz_maybe; ?>
                <p class="cgray">参考： col2_37,col2_73,col2_46,col2_64,onlytext_p,showtitle,morenocir,morecir50 </p>  
            </td>
        </tr>

            <tr>
            <td width="12%" class="tr">前台标题：</td>
            <td width="88%"> 
        标题：<input name="namefront" type="text"   value="<?php echo $namefront; ?>" size="30"  /><?php echo $xz_maybe; ?>  
    <div class="inputclear"> </div>

    标题的样式： 
     <input name="titlestyle" type="text" value="<?php echo $titlestyle?>" size="35" /> <?php echo $xz_maybe;?>  
 
  <span class="cgray">试下： color:red </span>


            </td>
        </tr>

         <tr>
            <td  class="tr">副标题：</td>
            <td  > 
                <textarea class="form-control" rows="3" name="despjj"><?php echo $despjj; ?></textarea> <?php echo $xz_maybe; ?>
<br />

   副标题的样式： 
     <input name="titlestylesub" type="text" value="<?php echo $titlestylesub?>" size="35" /> <?php echo $xz_maybe;?>  
 
  <span class="cgray">试下： color:red </span>

            </td>
        </tr>




        <tr style="background: #DCE8F4">
            <td  class="tr">更多链接：</td>
            <td  > 
                <?php 
 require_once HERE_ROOT.'plugin/tpl_linkmore.php';
 ?>

  <div class="inputclear"> </div>

  链接的对齐：
<select name="linkalign"> 
<?php select_from_arr($arr_textalign,$linkalign,'');?>
 </select>

 </td>
        </tr>
 
          <tr>
            <td height="60" class="tr"><strong>标识：</strong></td>
            <td  > 
  <input name="blockid" type="text" value="<?php echo $blockid;?>"  size="30" />
<?php echo $xz_maybe;?> 
<?php 
echo  check_blockid($blockid);
?>
 </td>
        </tr>

        
        <tr>
            <td   class="tr">上传图片：
            <br />
<span class="cgray">也可用于视频封面图片</span>

            </td>
            <td  > <input name="addr" type="file" id="addr" class="form-control" /><?php echo $xz_maybe;?>  
<?php
echo '<br /><span class="cred">' . $format_t . '</span><br />';
// echo gl_showsmallimg($fo_bef,$imgsmall,'y');
echo $imgsmall2;
?>
             
          <?php  if($kv<>'') 
              {
              ?>
                  <span class="cred"> <br />是否要删除图片？ </span>
                  
                  <select name="delimg">
                    <?php select_from_arr($arr_yn,'n','');?>
                    </select>
          <?php } 
          else{ //use for : Undefined index: delimg 
              ?>          
                 <select name="delimg" style="display:none">
                      <option value=""></option>
                </select>
          <?php
          }?>
                   
            </td>
        </tr>

 <?php 
 require_once HERE_ROOT.'mod_block/tpl_block_edit_tpl_template.php';
 ?>
 
  

        <tr>
            <td class="tr">内容： </td>
            <td> <p>
 <a class="needpopup" href="../mod_imgfj/mod_imgfj.php?pid=common&lang=<?php echo LANG; ?>" target="_blank">公共编辑器附件管理</a>

                </p>



<?php require_once('../plugin/editor_textarea.php'); //textarea is in this file ?>

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

        // return;

    }

   


</script>
