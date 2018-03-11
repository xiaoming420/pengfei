

  
<form method=post action="<?php echo $jumpvpage;?>&act=pos">
  <table class="formtab formtabhovertr">
  <tr style="font-weight:bold;background:#eeefff">
  <td   align="center">排序号</td>
    <td   align="center">标题</td>
 
    <td  align="center">操作</td>

    <td   align="center">状态</td>
  
  </tr>
  <?php

        foreach($rowlisttext as $v){
    //echo print_r($rowlist,1);
    
            $tid = $v['id']; $name = $v['name'];




      $pidname = $v['pidname'];
       $template = $v['template'];$pidfolder = $v['pidfolder'];
        $pidcate = $v['pidcate'];   $pid = $v['pid']; $datedayhere = $v['dateday'];

        $catename ='';
        if($pid=='node' || $pid=='blockdh')
        $catename = ' <span style="background:#ccc">分类：'.get_field(TABLE_CATE,'name',$pidcate,'pidname').'</span>';
      
     

       if($dateday==$datedayhere)   $nameV = '<strong class="cred">'.$name.'</strong>';
       else $nameV = '<strong>'.$name.'</strong>';


 
  $jsname = jsdelname($v['name']);

//----------------------

 menu_changesta($v['sta_visible'],$jumpvpage,$tid,'sta_block');
 
$edit_text= "<a class='but1' target='_blank' href='$jumpv&pidname=$pidname&file=edit&type=$pid'><i class='fa fa-pencil-square-o'></i> 修改</a>";
 
 
$del_text= " <a href=javascript:delid('del_block','$tid','$jumpvpage','$jsname')  class=but2><i class='fa fa-trash-o'></i> 删除</a>";

 //$addpageregion_text= "<a   href='$jumpv&pidname=$pidname&file=addpageregion&type=$pid'>加到页面区域 </a>";

    ?>
  <tr <?php echo $tr_hide?>>
  <td align="center"><input type="text" name="<?php echo $tid;?>"  value="<?php echo $v['pos'];?>" size="5" /></td>


    <td align="left">

  <?php echo $nameV.$catename;?>  

  <?php
 
  echo  adm_previewlink($pidname);
 
?>  <br />
  <span class="mobhide">标识：</span>

  <span class="cgray"><?php echo $pidname;?> </span>
 
 <div class="mobhide">
      类型： <span class="cgray">
      <?php 
      echo select_return_string($arr_block,0,'',$pid);
     ?> 
     </span>

     &nbsp;&nbsp;&nbsp; 模板：<span class="cblue2"><?php echo $template;?> </span>
    

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
<?php echo $sort_ads_f;
echo '<br /><br />'.$text_red;



?></div>
<p class="cred"><?php echo $text_adminhide2;?></p>
</form>

<?php 

require_once HERE_ROOT.'plugin/page_2010.php';
    
?>

 
