 
<?php
$wherecatid = '';
if($catid<>'') $wherecatid = " and template='$catid' ";
// and (pidstylebh='$curstyle' or pidstylebh='y') 
    $sqltextlist = "SELECT * from ".TABLE_BLOCK." where   $noandlangbh $wherecatid and pid='$type' and typecolumn<>'column'  order by pidstylebh ,pos desc,id desc"; //pos desc,id desc 
    //echo $sqltextlist; 
     $num_rows = getnum($sqltextlist);
     if($num_rows>0){
      $rowlisttext = getall($sqltextlist); 
?>  
<form method=post action="<?php echo $jumpvt;?>&act=pos">
  <table class="formtab formtabhovertr">
  <tr style="font-weight:bold;background:#eeefff">
  <td   align="center">排序号</td>
    <td   align="center">标题</td> 
    <td  align="center">操作</td>
    <td   align="center">状态</td>  
  </tr>
  <?php
        foreach($rowlisttext as $v){
    
     $tid = $v['id']; $name = $v['name'];
      $pidname = $v['pidname']; $pid = $v['pid'];
       $template = $v['template'];  $templatecur = $v['templatecur'];
     $pidstylebh = $v['pidstylebh']; 
 
  $jsname = jsdelname($v['name']);


  if($templatecur=='')  $templateV= 'base/block/'.$pid.'/<strong>'.$template.'.tpl.php</strong>';
  else  $templateV= '当前模板目录'.HTMLDIR.'/block/<strong>'.$templatecur.'.tpl.php</strong>';


//----------------------

 menu_changesta($v['sta_visible'],$jumpvt,$tid,'sta_block');
 
$edit_text= "<a class='but1'  href='$jumpvt&pidname=$pidname&act=edit'><i class='fa fa-pencil-square-o'></i> 修改</a>";
 
 
$del_text= " <a href=javascript:delid('del_block','$tid','$jumpvt','$jsname')  class=but2><i class='fa fa-trash-o'></i> 删除</a>";
if($type=='blockdh'){
 $num = num_subnode(TABLE_NODE,'pid',$pidname);
 if($num>0) $del_text= '';
}

 ?>
  <tr <?php echo $tr_hide?>>
  <td align="center"><input type="text" name="<?php echo $tid;?>"  value="<?php echo $v['pos'];?>" size="5" /></td>


    <td align="left">
<span class="cblue">
  <?php
   echo $name;
   ?>  
</span>
 <?php 
  echo  adm_previewlink($pidname); 
?>    <br />
  <span class="mobhide">标识：</span>

 <?php 
 echo admblockid($pidname);
 ?> 
 
 <div class="">
 <?php
if($template<>'') {
    $filename = 'base/block/'.$type.'/'.$template;
    $file = TEMPLATEROOT.$filename;
   
    echo ' 效果文件：';
    admcheckfile($file,$filename);
}
 ?>

  </div>   
 
 </td>
 

  <td align="center">

  <?php echo $edit_text.$del_text;?> 
  </td>

    <td> <?php   echo $sta_visible;?></td>
    
  </tr>
<?php

    } ?>
</table>


<div style="padding-bottom:22px"><input class="mysubmit" type="submit" name="Submit" value="修改排序" />
<br />
<?php 
echo $sort_ads_f;
 
?></div>
<p class="cred"><?php echo $text_adminhide2;?></p>
</form>

<?php 

//require_once HERE_ROOT.'plugin/page_2010.php';
    
?>

 



<?php 
}
else echo '暂无数据！';

?>

  <script>
    function checksearch(thisForm) {


        if (thisForm.searchword.value == "" || thisForm.searchword.value == "请输入标题或模板" )
        {
            alert("请输入标题或模板。");
            thisForm.searchword.focus();
            return (false);
        }

   

        // return;

    }

 
function selectjump(url){
  if(url!='') window.location.href=url;   
}


</script>


