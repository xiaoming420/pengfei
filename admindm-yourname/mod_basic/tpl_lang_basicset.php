<?php
/*
  欢迎使用DM企业建站系统，本系统由www.demososo.com开发。
*/
if(!defined('IN_DEMOSOSO')) {
  exit('this is wrong page,please back to homepage');
}
?>
<?php
$jump_back = $jumpv_file.'&act=edit&tid='.$tid;

if($act=="update"){  


    if(@$_POST['inputmust']=='') {echo $inputmusterror.$backlist;exit;}

  //pre($_POST); exit;

   $imgfolder = UPLOADROOTIMAGE.$abc2;
   
  if(!is_dir($imgfolder)) {
    
    alert('出错，图片目录 '.$imgfolder.'不存在！');  jump($jump_back);  
    }




$arrcanexcerpt =  array("sitename", "water","imgfolder");  

    $bscnt22 = '';
  if(count($_POST)>1){
          foreach ($_POST as  $k=>$v) {
             if(strtolower($k)=='submit') break;
            if(in_array($k,$arrcanexcerpt))   continue;

            $bscnt22 .= $k.':##'.htmlentitdm(trim($v)).'==#==';
             
          }
      }
       $bscnt22 = substr($bscnt22,0,-5);

  
  $ss = "update ".TABLE_LANG." set sitename='$abc1',imgfolder='$abc2',water='$abc3',arr_basicset='$bscnt22' where id='$tid' limit 1";
  // echo $ss;exit;
iquery($ss);
 //alert("修改成功");

 jump($jump_back);                      
}
   
 
if($act=='edit') {  
 $sql = "SELECT sitename,water,imgfolder,arr_basicset from ".TABLE_LANG."  where  id='$tid' and pbh='".USERBH."'    order by id limit 1"; 
$row = getrow($sql); 

$arr_can = $row['arr_basicset'];
$sitename = $row['sitename'];
$water = $row['water'];
$imgfolder = $row['imgfolder'];


  $bscntarr = explode('==#==',$arr_can); 
  if(count($bscntarr)>1){
    foreach ($bscntarr as   $bsvalue) {
     if(strpos($bsvalue, ':##')){
       $bsvaluearr = explode(':##',$bsvalue);
       $bsccc = $bsvaluearr[0];
       $$bsccc=$bsvaluearr[1];
     }
   }
 }



$jump_update=$jumpv_file.'&act=update&tid='.$tid;
     
     
?>

 
 <?php echo $text_imgfjlink; 
       ?> 
 
 <form  onsubmit="javascript:return checkhere(this)" action="<?php echo $jump_update;?>" method="post">
  <table class="formtab">
  

 <tr>
      <td class="tr">网站名称：</td>
      <td> 
      
       <input  type="text"  class="form-control"  name="sitename" value="<?php echo $sitename;?>"  ><?php echo $xz_must;?>
        </td>
    </tr>

  <tr>
      <td class="tr"> 图片目录：</td>
      <td>  <input  type="text" name="imgfolder"   size="30"  value="<?php echo $imgfolder;?>"  > 
    <Br />
    <span class="cgray">目录位于 DM-static\upload\image ， 默认为 1 </span>      
    <br /><span class="cred">注意，当新上传图片时，才会使用这个目录。如果是修改图片，图片的路径并不会变化。</span>     
        </td>
    </tr>

  <tr>
      <td class="tr"> 水印图片：</td>
      <td>  <input  type="text" name="water"   size="30" value="<?php echo $water;?>"  ><?php echo $xz_maybe;?>
         <br /> (请输入名称附件)
       <br />
       <?php
       $biaoshi = $row['water'];

      echo  check_blockid($biaoshi);
      
      ?>
       
        </td>
    </tr>
   


    
  <tr>
      <td class="tr">请选择编辑器：</td>
      <td> 
      <select name="editor" class="form-control">
    <?php select_from_arr($arr_editor,$editor,'');?>
     </select>
          <br /><span class="cgray">如果选择其他编辑器，需要下载相关文件，<a href="http://www.demososo.com/editor.html" target="_blank">具体请看教程></a></span>
 </td>
    </tr>





    <tr>
      <td class="tr">ico图片：</td>
      <td>  <input  type="text" name="ico"  size="30"    value="<?php echo $ico;?>" ><?php echo $xz_must;?>
     
   </td>
    </tr> 
      <tr>
      <td class="tr">前台是否开启编辑功能：</td>
      <td>  <select name="sta_frontedit" class="form-control">
    <?php select_from_arr($arr_yn,$sta_frontedit,'');?>
     </select>
      <a href="http://www.demososo.com/detail-97.html" target="_blank">什么是前台编辑</a>
   </td>
    </tr> 
      <tr>
      <td class="tr">样式缓存：</td>
      <td>  <input  type="text" name="cssversion" size="30"     value="<?php echo $cssversion;?>" >
        <br /><span class="cgray">随便填个数字，和上一次不一样即可。
<br />
如果设置为0，则前台不加缓存版本号。当开发测试css或js时，可能要按ctrl+f5清缓存。
        </span>
   </td>
    </tr> 


 
  <tr>
      <td class="tr">开启标签：
      <br />
      <span class="cgray">在相关的分类里 开启 标签功能</span>
      </td>
      <td> 

     
    <div class="c5"> </div>
     字样：<input name="tag_title" type="text"  value="<?php echo $tag_title;?>" size="20">
    
   <div class="c5"> </div>
   效果： 

  <?php

$filedir = EFFECTROOTADMIN.'/tag/';

echo ' <select name="tag_fg">';
select_from_filearr($filedir,$tag_fg);
echo '</select>';
 
    
    $file = EFFECTROOTADMIN.'tag/'.$tag_fg;
    $filename = 'base/block/tag/'.$tag_fg;
   
    echo '<br />效果文件：';
    admcheckfile($file,$filename);
 
 
?>
 


 <div class="c5"> </div>
   显示个数：<select name="sta_tag_shownum">
    <?php 
     
    select_from_arr($arr_yn,$sta_tag_shownum,'');?>
     </select>
 

        </td>
    </tr>
 

  <tr>
    <td class="tr">前台关闭移动端自适应功能：</td>
    <td> 
   <select name="sta_colseresponsive">
  <?php   
  select_from_arr($arr_yn,$sta_colseresponsive,'');?>
   </select>
<?php 
if($sta_colseresponsive=='y') {
echo '<span class="cred">已关闭</span><br/>';
}

?>
 <div class="c5"> </div>
<span class="cgray">如果关闭，则前台不支持移动端。 </span>
  </td>
  </tr>



  <tr>
      <td class="tr"> 移动端网址：</td>
      <td>  
<input name="linkofmobile" type="text"   value="<?php echo $linkofmobile;?>" size="35">
  <br /> <span class="cgray">必须以 http开头，比如http://m.sohu.com。如果没有，请留空。 </span>


        </td>
    </tr>


   
<tr>
      <td></td>
      <td>
      <br /> <br />
      <input  class="mysubmit" type="submit" name="Submit" value="提交">
       <br />

        <br />
        </td>
    </tr>
  </table>

  <?php echo $inputmust;?>

</form>
 
  
<?php } ?>
 
<script>
function  checkhere(thisForm){
   
    if ($.trim(thisForm.sitename.value)==""){
    alert("请输入网站名称");
    thisForm.sitename.focus();
    return (false);
        } 
    
    
}

</script>

