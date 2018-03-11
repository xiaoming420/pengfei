<?php
/*
  欢迎使用DM企业建站系统，本系统由www.demososo.com开发。
*/
if(!defined('IN_DEMOSOSO')) {
  exit('this is wrong page,please back to homepage');
}

?>

 
<?php 
 
 $sql = "SELECT * from ".TABLE_CATE." where   modtype='node' and pid='0'   $andlangbh  order by pos desc,pidname desc,id desc";
 $rowlist = getall($sql);
  if($rowlist=='no') echo $norr2;
  else{
   
  ?>

<style>
.menu_list_edit a{color:blue;}
</style>
<table class="formtab  formtabhovertr menu_list_edit" style="width:100%">

    <td width="300" align=center>分类名称</td>
    <td width="220" class=proname></td>
   

  </tr> 
  <?php
      foreach($rowlist as $v ){

        $name = $v['name'];
        $pidnamemain = $v['pidname'];
        // $jsname = jsdelname($v['name']);
      
     //mod_category/mod_category.php?lang=cn&catid=cate20150805_1125344029&file=edit&act=edit
  $linkedit='   <a style="font-weight:normal" title="访问此分类网址" href="'.$jumpv.'&catid='.$pidnamemain.'&file='.$file.'&act=edit">编辑</a>';
    
//echo $linkedit;
 
 ?>
<tr  style="border-top:2px solid #999">
  <td align="left"><strong><?php echo $name;?></strong>
    </td>
    <td >
    <?php  
  if($pidnamemain==$catid) echo '正在编辑';
   else  echo $linkedit; 
    ?></td>
   
  </tr>
<?php
    } ?>
</table>

 

<?php 
}
 
?>