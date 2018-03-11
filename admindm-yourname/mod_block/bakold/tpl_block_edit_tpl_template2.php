 

 

  <tr style="background:#dce8f4">
            <td class="tr fb">模板文件：</td>
            <td class="select--TOinput--">  
       
   
   
<?php 

 

  $arr_blocktpl_var = 'arr_blocktpl_'.$type;
   ?>

 
  <select name="template">
                    <?php  
                   select_from_arr($$arr_blocktpl_var,$template,'');
                     ?>
                   </select> 
  <br />  
  模板文件位于：</strong>  DM-template/base/block 目录下。
 

    </td>
        </tr>
