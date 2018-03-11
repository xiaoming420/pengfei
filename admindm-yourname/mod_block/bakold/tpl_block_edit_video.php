<?php
/*
  欢迎使用DM企业建站系统，本系统由www.demososo.com开发。
 */
if (!defined('IN_DEMOSOSO')) {
    exit('this is wrong page,please back to homepage');
}
if ($act == 'update') {

     if(@$_POST['inputmust']=='') {echo $inputmusterror.$backlist;exit;}


  //pre($_POST); exit;

   if($abc1=="") {alert('请输入标题！');  jump($jumpvpft); }

       $sql = "SELECT kv from ".TABLE_BLOCK." where  pid='$type' and pidname='$pidname' $andlangbh   limit 1";
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

 
if(strpos($abc1, $abc5)) $name = $abc1;
    else   $name = $abc1.' - '.$abc5; //add template to name,for search by title.
 
   $ss = "update " . TABLE_BLOCK . " set name='$name',namefront='$abc2'  $kv_v,videoaddress='$abc4',template='$abc5',dateday='$dateday' where  pid='video' and pidname='$pidname' $andlangbh limit 1";
     //echo $ss;exit;

    iquery($ss);
    //alert("修改成功");
    
   

    jump($jumpvpft);
}


else {
    $titleh2 = '修改';
    $sqlsub = "SELECT * from " . TABLE_BLOCK . "  where  pidname='$pidname' $andlangbh order by id limit 1";
    if(getnum($sqlsub)>0){
    //echo $sqledit;exit;
    $rowsub = getrow($sqlsub);
   // pre($rowsub);
    //$desp=zbdesp_imgpath($row['desp']);
    $kv = $rowsub['kv'];
    $name = $rowsub['name']; 
    
    $namefront = $rowsub['namefront'];  

    $pidnamehere = $rowsub['pidname']; 

   $template = $rowsub['template'];     
  


    $imgsmall2 = p2030_imgyt($kv, 'y', 'n');
 
    $videoaddress = $rowsub['videoaddress']; 
    
     $jump_insertimg = $jumpvpft . '&act=update';

?>
 
<form  onsubmit="javascript:return checkhere(this)" action="<?php echo $jump_insertimg; ?>" method="post" enctype="multipart/form-data">
    <table class="formtab">
        <tr>
            <td width="12%" class="tr">标题：</td>
            <td width="88%"> 
                <input name="title" type="text"   value="<?php echo $name; ?>" class="form-control" /><?php echo $xz_must; ?>  

 <?php if($pidfolder=='base' || $pidfolder == PIDFOLDERCUR)   echo  adm_previewlink($pidnamehere);?>        
            </td>
        </tr>

 

  
     <tr>
            <td width="12%" class="tr">前台标题：</td>
            <td width="88%"> 
                <input name="namefront" type="text"   value="<?php echo $namefront; ?>" class="form-control" /><?php echo $xz_maybe; ?>  
     
            </td>
        </tr>


      

 
        
        <tr>
            <td   class="tr">上传视频封面图图片：
            <br /> 
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

 
 

     <tr bgcolor="#DBF2FF">
            <td  class="tr">视频地址：</td>
            <td  > 
  <textarea name="videoaddress" class="form-control" rows="5"><?php echo $videoaddress?></textarea><?php echo $xz_maybe;?>

        <?php 
         $videoext = substr($videoaddress, -3);
               if($videoext=='mp4') {
            //http://www.mediaelementjs.com/#installation
           
                     $strpos = strpos($videoaddress,'://');
                     if(!is_int($strpos)){ 
                            $videoaddressloc = STAROOT.'upload/video/'.$videoaddress;
                            
                            
                            if(!is_file($videoaddressloc)) echo '<br /><span class="cred"> DM-static/upload/video目录不存在这个视频文件: '.$videoaddress.'</span>';
                     }
                     
                }

         ?>

  <br />
   <span class="cgray">  <?php echo $text_videohint;?>  </span>
 <br />
             <a href="http://www.demososo.com/detail-92.html" target="_blank">查看视频管理的教程</a>

   
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

        // return;

    }


</script>
