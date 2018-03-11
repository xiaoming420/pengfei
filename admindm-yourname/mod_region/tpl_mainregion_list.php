<?php
/*
  欢迎使用DM企业建站系统，本系统由www.demososo.com开发。
*/
if(!defined('IN_DEMOSOSO')) {
  exit('this is wrong page,please back to homepage');
}

 
//echo $stylename; 
?>

 

<div class=" ">
 
<form method=post action="<?php echo $jumpv;?>&act=posmain">
<table class="formtab formtabhovertr">
<tr style="background:#B3C0E0">
<td>排序</td>
<td>标题</td> 
<td align="center">操作</td>
 <td align="center"> 状态</td>  
 </tr>


<?php
 //if($type=='style') $wherev = " and  pidstylebh='$curstyle'  and type='style' ";
 //else    $wherev = "   and  type='page' ";
$sql = "SELECT * from ".TABLE_REGION." where pid='0'   $andlangbh order by pos desc,id desc";
//and  (pidstylebh='y' or pidstylebh='$curstyle')  
  // echo $sql;
if(getnum($sql)>0){
$rowlist = getall($sql);
    foreach($rowlist as $vcat){
       $tidmain=$vcat['id']; //tidmain ,not use tid,for conflict in subedit.php
      $name=$vcat['name'];
       $pidname=$vcat['pidname'];  
        $pidstylebh=$vcat['pidstylebh'];    

         menu_changesta($vcat['sta_visible'],$jumpv,$tidmain,'sta');


 $jsname = jsdelname($name);

$numsubnode = num_subnode(TABLE_REGION,'pid',$pidname);


$edit =  '<a class="but1"  href="'.$jumpvedit.'&tid='.$tidmain.'"><span><i class="fa fa-pencil-square-o"></i> 修改</span></a>';
  $del ="   <a class='but2'  href=javascript:del('delregion','$pidname','$jumpv','$jsname')><span><i class='fa fa-trash-o'></i> 删除</span></a>";
if($numsubnode>0)   $del ='';
 
 
$namecopy ='确定要复制页面区域：'.$jsname;
$js_back = $jumpv.'&pidname='.$pidname;
 //$movelink=  " <a class=but3  href=javascript:confirmaction('move','notdel','$js_back','$namecopy')><i class='fa  fa-files-o'></i> 复制</a>"; 

 if($numsubnode==0)   $movelink ='';
 
  
 $stylev=' style="color:blue;font-size:16px" ';
 if($pidname == $pidregion)  { 
  $stylev=' style="color:red;font-size:16px" ';
}




$gl =  '<a  '.$stylev.'   href="mod_region.php?lang='.LANG.'&pid='.$pidname.'">'.$name.'</a> <span class="cred">('.$numsubnode.')</span>'; 




     ?>
     <tr <?php echo $tr_hide;?>>
    <td align="center"><input type="text" name="<?php echo $tidmain;?>"  value="<?php echo $vcat['pos'];?>" size="5" /></td>
     <td> 
        <strong><?php echo $gl;?></strong>
        <?php 
       echo  adm_previewlink($pidname);
        ?>
        <br />
        标识: <?php echo $pidname; ?>
          <?php
              if($pidname == $pidregion) {echo '<br /><span class="cred">当前模板的首页 正在使用此区域</span>';}
            ?>
  </td>
 
 
 
<td align="center">  <?php echo $edit.$del?></td>
 
  <td  align="center"> <?php echo $sta_visible;?></td>

    </tr>
    <?php 
    } 
    ?>
  

    <?php }
    else echo '<tr><td></td><td>暂无内容，请添加。<td><tr>';



//----------------
//}
//---------------



?>
</table>
  <div style="padding-bottom:22px"><input class="mysubmit" type="submit" name="Submit" value="排序" /><?php echo $sort_ads?></div>
  </form>

</div> 



 
 
<div class="c"></div>
<p class="cred ptb10"><?php echo $text_adminhide2;?></p>

