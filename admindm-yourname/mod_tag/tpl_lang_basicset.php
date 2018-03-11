<?php
/*
	欢迎使用DM企业建站系统，本系统由www.demososo.com开发。
*/
if(!defined('IN_DEMOSOSO')) {
	exit('this is wrong page,please back to homepage');
}
?>
<?php
if($act=="update"){	 

    if(@$_POST['inputmust']=='') {echo $inputmusterror.$backlist;exit;}

   $bscnt22 = '';
   if(count($_POST)>1){
    foreach ($_POST as  $k=>$v) {
      if(strtolower($k)=='submit') break;
      $bscnt22 .= $k.':##'.htmlentitdm(trim($v)).'==#==';
      
    }
  }
  $bscnt22 = substr($bscnt22,0,-5);
  



     $ss = "update ".TABLE_LANG." set sitename='$abc1',water='$abc2',arr_basicset='$bscnt22' where id='$tid' limit 1";
	// echo $ss;exit;
iquery($ss);
 //alert("修改成功");

$jump_back = $jumpv_file.'&act=edit&tid='.$tid;

      jump($jump_back);                      
}
   
 
if($act=='edit') {	
 $sql = "SELECT sitename,water,arr_basicset from ".TABLE_LANG."  where  id='$tid' and pbh='".USERBH."'    order by id limit 1"; 
$row = getrow($sql); 

$arr_can = $row['arr_basicset'];

$sitename = $row['sitename'];
$water = $row['water'];


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
      <td class="tr"> 水印图片：</td>
      <td>  <input  type="text" name="water"  class="form-control"   value="<?php echo $water;?>"  ><?php echo $xz_maybe;?>
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
      <td>  <input  type="text" name="ico"  class="form-control"   value="<?php echo $ico;?>" ><?php echo $xz_must;?>
     
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
      <td>  <input  type="text" name="cssversion"  class="form-control"   value="<?php echo $cssversion;?>" >
        <br /><span class="cgray">随便填个数字，和上一次不一样即可。
<br />
如果设置为0，则前台不加缓存版本号。当开发测试css或js时，可能要按ctrl+f5清缓存。
        </span>
   </td>
    </tr> 



   <tr>
      <td class="tr">调用合并后的css：</td>
      <td>  <select name="sta_aggbasecss" class="form-control">
    <?php select_from_arr($arr_yn,$sta_aggbasecss,'');?>
     </select>
     <br />
     <span class="cgray">如果选择 "是"，则DM-block/template/base目录里的css，只会调用compress开头的css文件。.
   <br />并要点击下面的合并链接，从而产生最新的compress.css文件。
   <br />
   <a target="_blank" href="mod_aggbasecss.php?lang=<?php echo LANG?>">合并base目录下的css</a>
 </span>
   <br /><br />
 <span class="cred">如果是开发测试，请选择"不是"。</span>
 
     <br />
<br />

   </td>
    </tr> 


	 
<tr>
      <td></td>
      <td>
      <input  class="mysubmit" type="submit" name="Submit" value="提交"></td>
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

