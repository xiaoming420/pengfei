 
  <tr style="background:#dce8f4">
            <td class="tr fb">效果文件：</td>
            <td class="select--TOinput--">  
       
      
       <div class="c5"> </div>

   <?php 
   
   if($pidfolder=='vipblock'){
$arrtpltemplateroot = getFile(VIPBLOCKROOTADMIN.'block/');
 //pre($arrtpltemplateroot);
      ?>
 
 <select name="template"> 
<?php 

foreach ($arrtpltemplateroot as  $v) { 

$vv='block/'.str_replace(".tpl.php",'',$v);

  if($template==$vv) $cur=' selected="selected"'; 
     else $cur=''; 
     
   echo '<option  '.$cur.' value="'.$vv.'">'.$v.'</option>';
 
}
     ?>
</select>




  <br />  
  模板文件位于：</strong>  DM-template/base/vipblock/block 目录下。
   <br />  <span class="cgray"> 格式：模板文件必须以tpl.php结尾   </span> 
  <br />
      <?php
       $tpl = VIPBLOCKROOTADMIN.$template.'.tpl.php';
  
    if(!is_file($tpl)) echo '<span class="cred">出错： '.$template.'.tpl.php 文件不存在。请注意格式。</span>';
      

   }else{

  $arr_blocktpl_var = 'arr_blocktpl_'.$type;
   ?>



          公共区块：<br />

          <select name="template">
                    <?php  
                   select_from_arr($$arr_blocktpl_var,$template,'');
                     ?>
                   </select> 
  <br />  
  模板文件位于：</strong>  DM-template/base/block 目录下。
<?php 

  
 


}
?>

    </td>
        </tr>
