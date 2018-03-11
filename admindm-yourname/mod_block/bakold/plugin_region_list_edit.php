<?php
/*
  欢迎使用DM企业建站系统，本系统由www.demososo.com开发。
*/
if(!defined('IN_DEMOSOSO')) {
  exit('this is wrong page,please back to homepage');
}

 
?>

 
<?php 
 
 //mod_blockdh.php?lang=cn&catpid=cate20160707_0437114782&page=0&catid=csub20160707_0904417537

 
 $sql_22 = "SELECT * from ".TABLE_REGION." where    $noandlangbh and type='indexcnt' and sta_sub='n'  order by pos desc,id desc"; 
  
 $rowlist_22 = getall($sql_22);
    if($rowlist_22 == 'no')  echo '无内容';
    else {
  ?>

<style>
.menu_list_edit a{color:blue;}
</style>
<table class="formtab  formtabhovertr menu_list_edit" style="width:100%">

    <td width="80" align=center>标题</td>
     <td width="220" class=proname></td>
   
      <td width="100" align=center>标识</td>
   

  </tr> 
  <?php
      foreach($rowlist_22 as $v_22){
          
           $tid22=$v_22['id']; $title22=$v_22['name']; 
   $pidnamecur22=$v_22['pidname']; 


  //mod_nodelist.php?lang=cn
  $linkedit = 'mod_nodelist.php?lang='.LANG.'&pid2='.$pidnamecur22;
 $edittext_22='<a href="'.$linkedit.'">选择样式</a>';

    ?>
<tr   style="border-top:2px solid #999">

<td align="left">
  <?php  echo '标题：'.$title22;  

   if($curregionindex==$pidnamecur22) echo '<span style="color:red">(正在使用)</span>';
  if($pid2==$pidnamecur22) echo '<span style="color:blue">(当前选择)</span>';
 

  ?>
 </td>
    <td ><?php  echo $edittext_22;      ?></td>
  <td   align=center><?php echo $pidnamecur22;?></td>

 
   
  </tr>
 <?php
     
 
    } ?>
</table>


 <?php
     
 
    } ?>