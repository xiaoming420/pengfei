<?php
/*  欢迎使用DM企业建站系统，本系统由www.demososo.com开发。
*/
require_once '../config_a/common.inc2010.php';
//
 if($act <> "pos") zb_insert($_POST);


ifhave_lang(LANG);//TEST if have lang,if no ,then jump

$jumpv = '../mod_module/mod_uploadkv.php?lang='.LANG.'&pidname='.$pidname.'&type='.$type;

$title='上传kv图片';
if($type=='nodekv'){
   $table = TABLE_NODE;  
} 
else{
  echo 'type error';
  exit;
}


$imgsqlname = $imgv2 = $delimg = '';    
$sql = "SELECT kv from " . $table . "  where pidname='$pidname' $andlangbh order by id limit 1";
$row =getrow($sql);
if($row<>'no'){
  $imgsqlname  = $row['kv'];   
  if($imgsqlname<>''){
      $imgv2 = p2030_imgyt($imgsqlname,'y','n'); //p2030_imgyt($addr,$w_h='y',$linkbig='n')
    //del(actgo2,pidname,backpage,title)
   $delimg= "<br /> <a href=javascript:del('delimg','$pidname','$jumpv','')  class='but2'>删除kv图</a><br /> <br /> ";
   }

}
else {
  echo 'record error';
  exit;
}




if($act=="update"){

  $imgname=$_FILES["addr"]["name"] ;
  $imgsize=$_FILES["addr"]["size"] ;
 
 if(!empty($imgname)){
   $imgtype = gl_imgtype($imgname);	
   
   //upload img
   $up_small='n';
   $up_add_s='n';//also in common.inc  

   $up_delbig='n'; 
   $i='';
   $up_water= 'n';
 
  require('../plugin/upload_img.php');//need get the return value,then upimg part turn to easy.
   // $updateimgaddr=" kv='$return_v'";
  
          $ss = "update ".$table." set  kv='$return_v'   where pidname='$pidname'  $andlangbh limit 1"; 
          //echo $ss;      
           iquery($ss);
           
  }//empty($imgname)
  else{
    alert('没有上传图片。');
  }
 
    jump($jumpv);

}
else if($act=='delimg'){		
    
       if($imgsqlname<>'') p2030_delimg($imgsqlname,'y','n');//p2030_delimg($addr,$delbig,$delsmall)	
     
       $ss = "update ".$table." set  kv=''   where pidname='$pidname' $andlangbh limit 1";     
      iquery($ss);
      jump($jumpv);
    } 

  else{
//-----------

require_once HERE_ROOT.'mod_common/tpl_header_iframe.php';

?>




<form   action="<?php echo $jumpv; ?>&act=update" method="post" enctype="multipart/form-data">
  <table class="formtab">
<tr><td class="tr" >
<?php
echo $title;
 
echo  '<br />'.$delimg;
 
?>
 
</td>
      <td>

      <input name="addr" type="file" class="form-control"  />

  
      <br />
      <?php
       echo '<br /><span class="cred">'.$format_t.'</span><br />';
 
       echo $imgv2;

      ?>
      </td>
    </tr>
  
   
<tr>
      <td></td>
      <td>
      <input class="mysubmit" type="submit" name="Submit" value="提交" /></td>
    </tr> 
   
  

  </table>
</form>





 <?php
require_once HERE_ROOT.'mod_common/tpl_footer_iframe.php';

?>

<?php 
  }
?>