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
 
 $sql_22 = "SELECT * from ".TABLE_NODE." where pid='$pid'  $andlangbh order by pos desc,id desc"; 
  
 $rowlist_22 = getall($sql_22);
    if($rowlist_22 == 'no')  echo '无内容';
    else {
  ?>

<style>
.menu_list_edit a{color:blue;}
</style>
<table class="formtab  formtabhovertr menu_list_edit" style="width:100%">

    <td width="300" align=center>标题</td>
    
    <td width="220" class=proname></td>
   

  </tr> 
  <?php
      foreach($rowlist_22 as $v_22){
            $title22 = $v_22['title'];
             $tidhere22 = $v_22['id'];  
              $sta_visi_v = $v_22['sta_visible'];

  
$jumpv='';

             menu_changesta($sta_visi_v,$jumpv,$tidhere22,'sta_menu');

  //mod_blockdh.php?lang=cn&catpid=cate20160707_0437114782&catid=csub20160707_0904417537&page=0&file=edit&tid=148&act=edit
      $linkedit = 'mod_blockdh.php?lang='.LANG.'&pid='.$pid.'&file=edit&tid='.$tidhere22.'&act=edit';
 $edittext_22='<a href="'.$linkedit.'">编辑</a>';

    ?>
<tr  <?php echo $tr_hide;?>  style="border-top:2px solid #999">
  <td align="left">
  <?php  echo '标题：'.$title22;   

 ?>

 
 </td>
 

    <td ><?php  
     if($tid==$tidhere22) echo '正在编辑';
     else echo $edittext_22;      ?></td>
   
  </tr>
 <?php
     
 
    } ?>
</table>


 <?php
     
 
    } ?>