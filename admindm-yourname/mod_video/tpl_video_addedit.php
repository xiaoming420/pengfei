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


       $sql = "SELECT kv from ".TABLE_VIDEO." where  id='$tid' $andlangbh   limit 1";
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






    $desp = zbdesp_onlyinsert($_POST['desp']); //note: desp and addr not use variable abc1.
    $despjj = zbdesp_onlyinsert($_POST['despjj']); 
   
   
 
        $ss = "update " . TABLE_VIDEO . " set title='$abc1',cssname='$abc2'  $kv_v,effect='$abc3',desp='$desp',despjj='$despjj' where id='$tid'  $andlangbh limit 1"; 
        //echo $ss;exit;
        iquery($ss);  
        jump($jumpv.'&act=edit&tid='.$tid);
   
 
   }


   if ($act == 'insert') {
 
       $pidnamecur = 'video' . $bshou; 
    
       if ($abc1 == '')  { echo '请输入标题'; exit; }
   
   
        if(@$_POST['inputmust']=='') {echo $inputmusterror.$backlist;exit;}
       $desp = zbdesp_onlyinsert($_POST['desp']); //note: desp and addr not use variable abc1.
      // $desptext = zbdesp_onlyinsert($_POST['editor1text']);
   
       $despjj = zbdesp_onlyinsert($_POST['despjj']); 
   
   
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
               $imgsqlname='';       
              $imgtype = gl_imgtype($imgname);
             // $up_small = 'y';
              $up_delbig = 'n';//not del,just override
              $up_water = 'n';           
              $i = '';
              require_once('../plugin/upload_img.php'); //need get the return value,then upimg part turn to easy.
              $kv_v = "$return_v";
          }
          else  $kv_v = "";
   
   
    
   /*
   Array
   (
       [title] => 
       [iscommon] => n
       [delimg] => 
       [videoaddress] => 
       [desp] => 
       [template] => default
       [Submit] => 提交
       [inputmust] => inputmust
   )
   */
   
   
   
   //pre($_POST);
   
         $ss = "insert into ".TABLE_VIDEO." (pid,pidname,type,pbh,lang,title,cssname,effect,kv,desp,despjj) values ('$pid','$pidnamecur','$type','$user2510','".LANG."','$abc1','$abc2','$abc3','$kv_v','$desp','$despjj')";  
        // echo $ss;exit;
   
       iquery($ss);
    
         jump($jumpv);
   }

   


   if($act=='add'){
       
    $title=$kv=$despjj=$desp=$imgsmall2 =$effect=$cssname  ='';
   
    $jumpvinsert = $jumpv.'&act=insert';

    $titleh2 = '添加视频';


   }

 if($act=='edit'){
    $titleh2 = '修改视频';

    $sqlsub = "SELECT  *  from " . TABLE_VIDEO . "  where  id='$tid'   $andlangbh order by id limit 1";
   // echo $sqlsub;exit;
    if(getnum($sqlsub)>0){
    
    $rowsub = getrow($sqlsub);
    $tid = $rowsub['id'];
    $title = $rowsub['title'];  $jsname = jsdelname($title);
    $kv = $rowsub['kv'];$pidname = $rowsub['pidname'];
 
    $effect = $rowsub['effect']; $cssname = $rowsub['cssname']; 
 
 
    $desp = zbdesp_imgpath($rowsub['desp']);
    $despjj = zbdesp_imgpath($rowsub['despjj']);
 
     $imgsmall2 = p2030_imgyt($kv, 'y', 'n'); 

    }
    else { 
      echo 'video not exist...';
      exit;
      }
  $jumpvinsert = $jumpv.'&act=update&tid='.$tid;
}

if($act=='add' || $act=='edit'){
 // echo '<p>'.$pidname.'</p>';

?>
 
<form  onsubmit="javascript:return checkhere(this)" action="<?php echo $jumpvinsert; ?>" method="post" enctype="multipart/form-data">
<table class="formtab">
        <tr>
            <td width="12%" class="tr">视频标题：</td>
            <td width="88%"> 
                <input name="title" type="text"   value="<?php echo $title; ?>" class="form-control" /><?php echo $xz_must; ?>  
  
  <?php 
if($act=='edit')  {
     echo  adm_previewlink($pidname); 
     echo ' 标识：'.$pidname;
}
?> 

            </td>
        </tr>

 

        <tr>
            <td   class="tr"> <?php echo $text_cssname; ?> </td>
            <td  > 
                <input name="cssname" type="text"   class="inputcss form-control" value="<?php echo $cssname; ?>"  /><?php echo $xz_maybe; ?>

                <br />
                <span class="cgray">默认会给封面图片加上箭头，如果不需要，则可以加上 novideoarrow</span>
                 
            </td>
        </tr>


        <tr style="background:#dce8f4">
        <td class="tr fb">效果文件：</td>
        <td class="select--TOinput--">  
   
   
  
        <?php

$filedir = EFFECTROOTADMIN.'video/';
echo ' <select name="effect">';
select_from_filearr($filedir,$effect);
echo '</select>';
 

if($effect<>'') {
    $filename =  'base/block/video/'.$effect;
    $file = TEMPLATEROOT.$filename;
   
    echo '<br />效果文件：';
    admcheckfile($file,$filename);
}
 
?>

 

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
  <textarea name="desp" class="form-control" rows="5"><?php echo $desp?></textarea><?php echo $xz_maybe;?>

        <?php 
         $videoext = substr($desp, -3);
               if($videoext=='mp4') {
            //http://www.mediaelementjs.com/#installation
           
                     $strpos = strpos($desp,'://');
                     if(!is_int($strpos)){ 
                            $videoaddressloc = STAROOT.'upload/video/'.$desp;
                            
                            
                            if(!is_file($videoaddressloc)) echo '<br /><span class="cred"> DM-static/upload/video目录不存在这个视频文件: '.$desp.'</span>';
                     }
                     
                }

         ?>

  <br />
   <span class="cgray">  <?php echo $text_videohint;?>  </span>
 <br />
 <br />
 <p style="color:blue;text-align:left">移动端可能不支持flash的播放形式。请用mp4或iframe的形式</p> 
   <a href="http://www.demososo.com/detail-92.html" target="_blank">查看视频管理的教程</a>
<br />iframe测试代码：
<textarea class="form-control" rows="1" disabled="disabled"><iframe frameborder="0" width="640" height="498" src="https://v.qq.com/iframe/player.html?vid=b0537w8vdfu&tiny=0&auto=0" allowfullscreen></iframe>
</textarea>
   
   </td>
        </tr>

 
   <tr>
            <td  class="tr">视频说明：</td>
            <td  > 
  <textarea name="despjj" class="form-control" rows="3"><?php echo $despjj?></textarea><?php echo $xz_maybe;?>
   </td>
 </tr>
  






        <tr>
            <td></td>
            <td>
                <input  class="mysubmit mysubmitbig" type="submit" name="Submit" value="<?php echo $titleh2;?>"></td>
        </tr>
    </table>


 




      <?php echo $inputmust;?>

</form>

  
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

<?php 

}
 
 
?>