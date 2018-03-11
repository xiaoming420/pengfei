<?php
/*
	power by JASON.ZHANG  DM建站  www.demososo.com
*/
if(!defined('IN_DEMOSOSO')) {
	exit('this is wrong page,please back to homepage');
}
//-------------
 if($act=="update"){
     if(@$_POST['inputmust']=='') {echo $inputmusterror.$backlist;exit;}

     $bannertext = zbdesp_onlyinsert($_POST['bannertext']);
 
  		 $ss = "update ".TABLE_LAYOUT." set banner='$abc1',bannertext='$bannertext',sta_bread_posi='$abc3',bread='$abc4',sta_sidebar='$abc5',sidebartop='$abc6',sidebar='$abc7',sidebarbot='$abc8',contentheader='$abc9',contenttop='$abc10',content='$abc11',contentbot='$abc12',pagetop='$abc13',pagebot='$abc14',template='$abc15' where id='$tid' and type='$type' and pid='$pid' and pidstylebh='$curstyle' $andlangbh limit 1";
		    // echo $ss;exit;
			 iquery($ss);   
       $jumpv = 	$jumpv.'&type='.$type.'&pid='.$pid.'&catid='.$catid;
			 jump($jumpv);
	 	
		
 }
 
 


else{ 
  
 $jumpv_update_buju = $jumpv.'&act=update&type='.$type.'&pid='.$pid.'&catid='.$catid.'&tid='.$tid;
 
 
 ?>

 
<div><?php 
echo $title2;
if($pid<>'common'){ //only csub can del fg...
  $jsname = jsdelname($title2);
  $jumpv2 = $jumpv.'&pid='.$pid.'&catid='.$catid.'&type='.$type;
  $del_text= " <a href=javascript:del('del','$pid','$jumpv2','$jsname')  class=but2><i class='fa fa-trash-o'></i> 删除布局</a>";
  echo $del_text;
  }

?></div>
 
<form   action="<?php  echo $jumpv_update_buju;?>"   method="post" enctype="multipart/form-data">
<table class="formtab">

 <tr>
    <td width="20%" class="tr"><b>banner</b></td>
    <td>标识：  <input  name="banner" type="text" value="<?php echo $banner?>" size="30" />
     <?php echo $xz_maybe;
   
    echo check_blockid($banner);?>
<div class="c5"> </div>
banner说明：  <textarea  class="form-control" row="10" name="bannertext" ><?php echo $bannertext?></textarea> 
     <?php echo $xz_maybe; ?>
  

    </td>

  </tr>
 

 <tr>
    <td  class="tc" style="background:#2480C4;color:#fff" colspan="2"> 下面的选项会采用继承</td>

  </tr>


  <tr>
    <td  class="tr">面包屑：</td>
    <td  style="background:#DBF2FF">

  <strong>  面包屑的位置： </strong> 
<select name="sta_bread">
	  <?php select_from_arr($arr_bread,$sta_bread,'plsno');?>
     </select>
       
     <div style="margin:6px 0;border-bottom:1px solid #999"></div>
<strong>自定义面包屑：</strong>
<br /><textarea class="form-control" row="10" name="bcb_text">
<?php echo $row['bread'];?>
</textarea>
     <br /> <?php echo $xz_maybe;?>
 

      </td>
  </tr>
  
   <tr> 
    <td   class="tr">设置侧边栏菜单：</td>
    <td   style="background:#fff">
 
<select name="sta_sidebar">
    <?php select_from_arr($arr_column,$sta_sidebar,'plsno');?>
     </select>  
 
      </td>
  </tr>



 <tr> 
    <td   class="tr">侧边栏标识：</td>
    <td   style="background:#fff">
 
	 
<strong>侧边栏标识--上面：</strong>
 <input name="sidebartop" type="text" value="<?php echo $row['sidebartop']?>" size="30" />
      <?php echo $xz_maybe;?> <?php echo check_blockid($row['sidebartop']);?>
<div class="c5"></div>
   
<strong>默认侧边栏菜单：</strong>&nbsp;&nbsp;&nbsp;
<input name="sidebar" type="text" value="<?php echo $row['sidebar']?>" size="30" />
      <?php echo $xz_maybe;?>
     <span class="cgray"> (默认有侧边栏,若要隐藏请填：hide) </span>
      <?php echo check_blockid($row['sidebar']);?>
<div class="c5"></div>

<strong>侧边栏标识--下面：</strong> <input name="sidebarbot" type="text" value="<?php echo $row['sidebarbot']?>" size="30" />
      <?php echo $xz_maybe;?> <?php echo check_blockid($row['sidebarbot']);?>
 


      </td>
  </tr>

<tr>
    <td   class="tr">内容区标识：</td>
    <td   style="background:#d5e5f6">

  <strong>内容导航标题的标识：</strong>&nbsp;&nbsp;<input name="contentheader" type="text"  value="<?php echo $row['contentheader'];?>" size="30" /> <?php echo $xz_maybe;?>
  <br /><span class="cgray"> (默认是文字，如果隐藏，用 hide ， 如果是图片，请用名称附件。)</span>

<br /><br />
   
   <strong>内容区标识--上面：  </strong><input name="contenttop" type="text"  value="<?php echo $row['contenttop'];?>" size="30" /> <?php echo $xz_maybe;?> &nbsp; &nbsp;  <?php echo check_blockid($row['contenttop']);?>

<div class="c15"></div>

<strong>默认内容：</strong> 
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<input name="rbight3" type="text"  value="<?php echo $row['content'];?>" size="30" /> <?php echo $xz_maybe;?>
 <span class="cgray">(默认为列表和详细内容。 若要隐藏请填：hide) </span> 
 <?php echo check_blockid($row['content']);?>

<div class="c15"></div>
 <strong>内容区标识--下面：</strong><input name="contentbot" type="text"  value="<?php echo $row['contentbot'];?>" size="30" /> <?php echo $xz_maybe;?> <?php echo check_blockid($row['contentbot']);?>

      </td>
  </tr>
  
  
   <tr>
    <td   class="tr">其他标识：</td>
    <td   style="background:#DBF2FF">
<strong>页面上部：</strong> <input name="pagetop" type="text"  value="<?php echo $row['pagetop'];?>" size="30" /> <?php echo $xz_maybe;?> &nbsp;
<?php echo check_blockid($row['pagetop']);?>

<div class="c15"></div>
<strong>页面底部：</strong> <input name="pagebot" type="text"  value="<?php echo $row['pagebot'];?>" size="30" /> <?php echo $xz_maybe;?> &nbsp;
 <?php echo check_blockid($row['pagebot']);?>

  </td>
  </tr>

  <tr>
    <td   class="tr">模板文件：</td>
    <td >
 <input name="template" type="text"  value="<?php echo $row['template'];?>" size="30" /> <?php echo $xz_maybe;?> 
 <br />
 <span class="cgray">位于当前模板目录<?php echo HTMLDIR;?>/tpl(如果没有tpl，请创建)，用于取代默认前台显示的模板</span>
 <?php
 if($template<>'') {
  $filename =  HTMLDIR.'/tpl/'.$template;
  $file = TEMPLATEROOT.$filename;
  echo '<br />';
  admcheckfile($file,$filename);
}

?>

  </td>
  </tr>

  <tr>
    <td></td>
    <td> <input class="mysubmit mysubmitbig" type="submit" name="Submit" value="提交">
  
  </td>
  </tr>
 </table>

   <?php echo $inputmust;?>

</form>
 

<?php } 
?>