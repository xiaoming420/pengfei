 
  <table class="formtab" >
 

  <tr>
      <td  class="tr" width="80">禁止访问：</td>
      <td  >
 
      <select name="sta_noaccess">
    <?php select_from_arr($arr_yn,$sta_noaccess,'');?>
     </select>
   <?php
   if($sta_noaccess=='y') echo '<span style="color:red">禁止访问</span>';
   ?>
        </td>
    </tr>

 


 


 <tr>
      <td class="tr">资料下载链接：</td>
      <td ><input name="downloadurl" type="text"  value="<?php echo $downloadurl?>" class="form-control" /> <?php echo $xz_maybe;?>
      <br /><?php echo $text_outlink;?>
        </td>
    </tr>
 

 



</table>

