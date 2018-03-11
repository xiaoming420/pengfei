<?php
/*
	power by JASON.ZHANG  DM建站  www.demososo.com
*/
if(!defined('IN_DEMOSOSO')) {
	exit('this is wrong page,please back to homepage');
}


 if($act=='update'){
// pre($_POST);

  if(@$_POST['inputmust']=='') {echo $inputmusterror.$backlist;exit;}


  if($abc1=='') $abc1 = 'pls input title';
 
   $desp = zbdesp_onlyinsert($_POST['despcontent']); //note: desp and addr not use variable abc1.
    $desptext = zbdesp_onlyinsert($_POST['editor1text']);

		 $ss = "update ".TABLE_PAGE." set name='$abc1',regionid='$abc2',desptext='$desptext',desp='$desp',sta_noaccess='$abc5',downloadurl='$abc6' where id='$tid' $andlangbh limit 1";
	 // echo $ss;exit;
	 	iquery($ss);
  
	 jump($jumpv_back);


 }
 else
 {

  $desp=zbdesp_imgpath($row['desp']);
   $desptext=zbdesp_imgpath($row['desptext']);
   $pidname =$row['pidname'];
  $downloadurl =$row['downloadurl'];
  $sta_noaccess =$row['sta_noaccess'];

  


  $jump_imgfj='../mod_imgfj/mod_imgfj.php?pid='.$pidname.'&lang='.LANG;
  
 
 ?>

 <div class="contenttop">

<?php 
  $del_text= "<a href=javascript:del('delpage','$pidname','$jumpv','$jsname')  class='but2 fr' ><i class='fa fa-trash-o'></i> 删除</a>";
  
echo  $del_text;
?>

 
   <a class="needpopup" href="../mod_seo/mod_seo_edit.php?lang=<?php echo LANG;?>&act=edit&pidname=<?php echo $pidname;?>&type=page"><i class="fa fa-pencil-square-o"></i> 修改SEO</a>

&nbsp;&nbsp;&nbsp;&nbsp;
  <a class="needpopup" href="../mod_seo/mod_alias_edit.php?lang=<?php echo LANG;?>&act=edit&pidname=<?php echo $pidname;?>&type=page"><i class="fa fa-pencil-square-o"></i> 修改别名</a> 
  <?php 
  $alias= alias($pidname,'page');
  if($alias<>'') echo '( '.spangray($alias).' )';
  ?> 


&nbsp;&nbsp;&nbsp;&nbsp;
  <a class="needpopup" href="../mod_album/mod_mainalbum.php?lang=<?php echo LANG;?>&pid=<?php echo $pidname;?>&type=page&act2=headless"><i class="fa fa-pencil-square-o"></i> 相册管理</a> 
 
  &nbsp;&nbsp;&nbsp;&nbsp;
  <a  class="needpopup"  href="../mod_video/mod_video.php?lang=<?php echo LANG;?>&pid=<?php echo $pidname;?>&type=page&act2=headless"><i class="fa fa-pencil-square-o"></i> 视频管理</a> 

  
 </div>

 <form  action="<?php echo $jumpv_file; ?>&act=update" method="post" enctype="multipart/form-data">
 


 <div class="fl col-xs-12 col-sm-12  col-md-9">
 

 
  <table class="formtab" >
   <tr>
     
      <td>

 <div style="padding:10px"><strong style="font-size:16px"> 标题：</strong> 
 <input style="padding:3px;border:1px solid #999"  name="title" type="text" value="<?php echo $row['name']?>" class="form-control" />
</div>


 <div style="padding:10px;border-bottom: 1px solid #ccc""><strong style="font-size:16px;"> 页面区域：</strong> 
 <input style="padding:3px;border:1px solid #999"  name="regionid" type="text" value="<?php echo $regionid?>" size="30" />
 <?php  
  echo  check_blockid($regionid);
  ?>
 <br />
 <span class="cgray">如果页面区域有值，则会替代编辑器的内容。页面内容由页面区域决定。 </span>
</div>

   
 <div class="" style="margin:0px;padding:6px;border:0px solid blue">

 <a href="<?php echo $jump_imgfj; ?>"  class="needpopup">私有编辑器附件管理(<?php echo num_imgfj($pidname);?>)  </a>
  或  <?php echo $text_imgfjlink_bjq ?> <br />

 
 </div>

        </td>
    </tr>
 
   <tr>
  
      <td>
 
      <?php 
      require_once('../plugin/editor_textarea.php');//textarea is in this file
      ?>

        </td>
    </tr>
 


</table>
 
 </div>
 

 
 <div class="fl col-xs-12 col-sm-12  col-md-3">
    <?php  require_once HERE_ROOT.'mod_page/tpl_page_edit_desp_rg.php'; ?>
 </div>




<div class="c tc"> 
 
 <input class="mysubmit mysubmitbig"     type="submit" name="Submit" value="提交" /> 
     
<?php echo $inputmust;?>
 </div>

 </form>

   <?php 
   require_once('../plugin/editor_imgintroduce.php'); 
   ?>


<?php
  }
  ?>
 


 <script>
 $(function(){

    $('.mysubmitnew').click(function(){


 var titlev =  $("input[name='title']").val().trim();
    if(titlev=='') {
      alert('请输入标题');
      $("input[name='title']").focus();
      return false;

    }

  
  //-------------
}

      );

 });
 
 </script>
 <div class="c tc" style="height:100px"> </div>