 
<?php
 if($act2=='all'){ 
   $wherev = " ";
}
else{
  $wherev = " and pid='$pid'  and type='$type'   ";
}
   $sql = "SELECT * from ".TABLE_VIDEO." where   $noandlangbh $wherev  order by pos desc,id desc"; //pos desc,id desc 
    // echo $sql; 
  $num_rows = getnum($sql);
     if($num_rows>0){
      $rowlisttext = getall($sql); 
?>  
<form method=post action="<?php echo $jumpv;?>&act=pos">
  <table class="formtab formtabhovertr">
  <tr style="font-weight:bold;background:#eeefff">
  <td   align="center">排序号</td>
    <td   align="center">标题</td> 
    <td  align="center">操作</td>
    <td   align="center">状态</td>  
  </tr>
  <?php
        foreach($rowlisttext as $v){
    
     $tid = $v['id']; $title = $v['title'];
      $pidname = $v['pidname']; $pid = $v['pid'];
       $effect = $v['effect'];  
 
 
  $jsname = jsdelname($v['title']);

 
//----------------------

 menu_changesta($v['sta_visible'],$jumpv,$tid,'sta_block');
 
$edit_text= "<a class='but1'  href='$jumpv&tid=$tid&act=edit'><i class='fa fa-pencil-square-o'></i> 修改</a>";
 
 
$del_text= " <a href=javascript:delid('del_block','$tid','$jumpv','$jsname')  class=but2><i class='fa fa-trash-o'></i> 删除</a>";

 //$addpageregion_text= "<a   href='$jumpv&pidname=$pidname&file=addpageregion&type=$pid'>加到页面区域 </a>";

    ?>
  <tr <?php echo $tr_hide?>>
  <td align="center">

<?php 
if($act2<>'headless'){
?>

<input type="text" name="<?php echo $tid;?>"  value="<?php echo $v['pos'];?>" size="5" />

<?php 
}
?>
</td>


    <td align="left">
 
 <?php 
 echo $title.' ';
  echo  adm_previewlink($pidname); 
?>    <br />
  <span class="mobhide">标识：</span>

  <span class="cgray"><?php echo admblockid($pidname);?> </span>
 
 <div class="">
 
 
 <?php 
 
  $filename =  'base/block/video/'.$effect;
  $file = TEMPLATEROOT.$filename;
 
  echo '效果文件：';
  admcheckfile($file,$filename);
 
?>


<?php 
if($act2=='all'){
  $fourstring = substr($pid,0,4);
  if($fourstring=='bloc')  echo  '<br />'.spanred($pid);
  if($fourstring=='page') {
    echo  '<br />'.spanred($pid);
    $tid = get_field(TABLE_PAGE,'id',$pid,'pidname');
    $title = get_field(TABLE_PAGE,'name',$pid,'pidname');
    echo ' <a target="_blank" href="../mod_page/mod_page_edit.php?lang='.LANG.'&file=edit_desp&act=edit&tid='.$tid.'"> '.$title.'</a>';
  }
  if($fourstring=='node') {
    echo  '<br />'.spanred($pid);
    $tid = get_field(TABLE_NODE,'id',$pid,'pidname');
    $title = get_field(TABLE_NODE,'title',$pid,'pidname');
    echo ' <a target="_blank" href="../mod_node/mod_node_edit.php?lang='.LANG.'&act=editdesp&tid='.$tid.'&file=editdesp">'.$title.'</a>';
  }
 
 
}
?>
  </div>   
 
 </td>


 

  <td align="center">

  <?php echo $edit_text.$del_text;?> 
  </td>

    <td> <?php 
   if($act2<>'headless')  echo $sta_visible;
   ?></td>
    
  </tr>
<?php

    } ?>
</table>

<?php 
if($act2<>'headless'){
?>

<div style="padding-bottom:22px"><input class="mysubmit" type="submit" name="Submit" value="修改排序" />
<br />
<?php 
echo $sort_ads_f;
//echo $text_commonblock; 
 
?>
<p class="cred"><?php echo $text_adminhide2;?></p>
<?php
}
?>

</div>

</form>



<?php 

//require_once HERE_ROOT.'plugin/page_2010.php';
    
?>

 



<?php 
}
else {
    echo '还没有视频区块，'.$addlink;
}



?>

  

