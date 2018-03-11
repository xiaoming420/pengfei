<?php
/*
	power by JASON.ZHANG  DM建站  www.demososo.com
*/
if(!defined('IN_DEMOSOSO')) {
	exit('this is wrong page,please back to homepage');
}


 if($act=='update'){
  //pre($_POST);


   if(@$_POST['inputmust']=='') {echo $inputmusterror.$backlist;exit;}



  if($abc1=='') $abc1 = 'pls input title';
 $despjj=zbdespadd2($abc2); 
 
   $desp = zbdesp_onlyinsert($_POST['despcontent']); //note: desp and addr not use variable abc1.
    $desptext = zbdesp_onlyinsert($_POST['editor1text']);

$sta_noaccess = $abc7;
if($user_stanoaccess=='y' && $usertype=='normal') $sta_noaccess ='y';

 
$ss = "update ".TABLE_NODE." set title='$abc1',despjj='$despjj',desptext='$desptext',desp='$desp',pid='$abc5',dateedit='$abc6',sta_noaccess='$sta_noaccess',sta_tj='$abc8',sta_new='$abc9',hit='$abc10',alias_jump='$abc11',titlebz1='$abc12',titlebz2='$abc13',titlebz3='$abc14' where id='$tid' $andlangbh limit 1";
		//  echo $ss;exit;
	  	iquery($ss);
  
	  jump($jumpv_file);
 
 
 }
 else
 {
  $desp=zbdesp_imgpath($row['desp']);
   $desptext=zbdesp_imgpath($row['desptext']);
  
  $pid=$row['pid'];
   $dateedit=$row['dateedit']; 
$alias_jump=$row['alias_jump'];
$sta_noaccess=$row['sta_noaccess'];
$sta_tj=$row['sta_tj'];
$sta_new=$row['sta_new'];$hit=$row['hit'];
$titlebz1=$row['titlebz1'];$titlebz2=$row['titlebz2'];$titlebz3=$row['titlebz3'];
  $jump_imgfj='../mod_imgfj/mod_imgfj.php?pid='.$pidname.'&lang='.LANG;
  
 ?>
  <div class="contenttop">

  
   <a class="needpopup" href="../mod_seo/mod_seo_edit.php?lang=<?php echo LANG;?>&act=edit&pidname=<?php echo $pidname;?>&type=node"><i class="fa fa-pencil-square-o"></i> 修改SEO</a>

&nbsp;&nbsp;&nbsp;&nbsp;
  <a class="needpopup" href="../mod_seo/mod_alias_edit.php?lang=<?php echo LANG;?>&act=edit&pidname=<?php echo $pidname;?>&type=node"><i class="fa fa-pencil-square-o"></i> 修改别名</a> 
  <?php 
  $alias= alias($pidname,'node');
  if($alias<>'') echo '( '.spangray($alias).' )';
  ?> 

&nbsp;&nbsp;&nbsp;&nbsp;
  <a class="needpopup" href="../mod_album/mod_mainalbum.php?lang=<?php echo LANG;?>&pid=<?php echo $pidname;?>&type=node&act2=headless"><i class="fa fa-pencil-square-o"></i> 相册管理</a> 
 
  &nbsp;&nbsp;&nbsp;&nbsp;
  <a  class="needpopup"  href="../mod_video/mod_video.php?lang=<?php echo LANG;?>&pid=<?php echo $pidname;?>&type=node&act2=headless"><i class="fa fa-pencil-square-o"></i> 视频管理</a> 





 </div>
  <form  action="<?php echo $jumpv_file; ?>&act=update" method="post" enctype="multipart/form-data">


<div class="fl col-xs-12 col-sm-12  col-md-9" >
  <table class="formtab" >
   <tr>
     
      <td>

 <div style="padding:10px"><strong style="font-size:16px"> 标题：</strong> 
 <input style="padding:3px;border:1px solid #999"  name="title" type="text" value="<?php echo $row['title']?>" class="form-control" />
</div>

 <div class="" style="margin:0px;padding:6px;border:0px solid blue">

 <a href="<?php echo $jump_imgfj; ?>"  class="needpopup">私有编辑器附件管理(<?php echo num_imgfj($pidname);?>)  </a>
  或  <?php echo $text_imgfjlink_bjq ?> <br />

 
 </div>

        </td>
    </tr>

 <tr>
       
      <td  style="background:#DCF2FF">


      <p>内容简介： (一般不用填)</p>
      <textarea class="form-control" rows="3" id="despjj" name="despjj">
<?php
echo  zbdespedit($row['despjj']);
?>
</textarea>
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

</div><!--end left-->

<div class="fr col-xs-12 col-sm-12 col-md-3" >
  <?php  require_once HERE_ROOT.'mod_node/tpl_node_editdesp_rg.php'; ?>
  <?php require_once HERE_ROOT.'mod_node/tpl_node_editcan_popup.php'; ?>


</div><!--end right-->

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
 