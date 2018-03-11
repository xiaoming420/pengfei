  <table class="formtab">
 <tr>
      <td>分类：
<?php 
 $sqlcatlist = "SELECT * from ".TABLE_CATE." where  pid='$catpid' $andlangbh order by pos desc,id";
  //echo $sqlcatlist;
$rowcatlist= getall($sqlcatlist);

    select_cate($rowcatlist,'分类',$pid);//in list left menu php
   ?>
</td></tr>


 <tr>
      <td >
  发布时间：
       
      <input name="dateedit" type="text"  value="<?php echo $dateedit;?>" class="form-control" />
  <span class="cgray">参考：<?php echo $dateall;?></span>
     
        </td>
    </tr>

 
    <tr>
      <td>禁止访问：
<?php 
 
//$disselect='';
if($user_stanoaccess=='y' && $usertype=='normal') {// $disselect='disabled="disabled"';//no use,will effect abc1
$sta_noaccess='y';
echo '<span class="cgray">您的权限 不能修改禁止访问。</span><br />';
}
 ?>
      <select name="sta_noaccess">> 
    <?php   
   
    select_from_arr($arr_yn,$sta_noaccess,'');?>
     </select>
     <?php
   if($sta_noaccess=='y') echo '<span style="color:red">禁止访问</span>';
   ?>
        </td>
    </tr>
     <tr>
      <td>是否推荐：<select name="sta_tj">
    <?php select_from_arr($arr_yn,$sta_tj,'');?>
     </select>
        </td>
    </tr>
   <tr>
      <td>是否最新：<select name="sta_new">
    <?php select_from_arr($arr_yn,$sta_new,'');?>
     </select>
        </td>
    </tr>

     <tr>
     <td>      
      点击数： 
      <input name="hit" type="text"  value="<?php echo $hit?>" size="20" />
   
    </td>
    </tr>

     <tr>   <td>
      页面跳转网址： 
      <input name="alias_jump" type="text"  value="<?php echo $alias_jump?>" class="form-control" />
 
       <?php echo $xz_maybe;?>
      <br /><?php echo $text_outlink;?> 


 <?php if($alias_jump<>'') { echo $text_jump;
      }?>
      

        </td>
    </tr>


    <tr>
     <td>     
     <?php 
        echo $field_titlebz1.'：';
     ?> 
      
      <input name="titlebz1" type="text"  value="<?php echo $titlebz1?>" size="20" />
  <div class="c5"></div>
      <?php 
          echo $field_titlebz2.'：';
     ?>  
      <input name="titlebz2" type="text"  value="<?php echo $titlebz2?>" size="20" />
 <div class="c5"></div>
        <?php 
          echo $field_titlebz3.'：';
     ?>  
      <input name="titlebz3" type="text"  value="<?php echo $titlebz3?>" size="20" />
    </td>
    </tr>


  </table>

