
       

        <tr>
            <td  class="tr">  分类标识：</td>
            <td  class="selectTOinput">
              <?php 
           
                $subpidcate = substr($pidcate,0,4);
                if($subpidcate=='cate') {
                      $linkvv = '../mod_node/mod_node.php?lang='.LANG.'&catpid='.$pidcate;
                    }
                else{
                    $catpid22 = get_field(TABLE_CATE,'pid',$pidcate,'pidname'); 


                    $linkvv = '../mod_node/mod_'.$type.'.php?lang='.LANG.'&catpid='.$catpid22.'&catid='.$pidcate;
                }

             ?>
                  <select name="pidcatesele">
                  <option value="">请选择</option>
                      <?php  
                      // select_from_arr($arr_cate,$pidcate,'');

  if($type=='node')
   $sql = "SELECT * from ".TABLE_CATE." where   modtype='$type' and pid='0'   $andlangbh  order by pos desc,pidname desc,id desc";
else 
   $sql = "SELECT * from ".TABLE_CATE." where   modtype='$type' and pid<>'0'   $andlangbh  order by pos desc,pidname desc,id desc";

$rowlist = getall($sql);

$arr_cate = array(); 

 if($rowlist=='no') {
       $arr_cate = array('none'=>'无分类',   ); 

        select_from_arr($arr_cate,$pidcate,'');

}
 else{

  foreach ($rowlist as $v) {
       if($pidcate == $v['pidname']) $selected = ' selected = "selected" ';
       else $selected = '';
        echo '<option value="'.$v['pidname'].'" '.$selected.'>'.$v['name'].'</option>';
  }

 }
 


                       ?>
                   </select> 
                   <div class="c5"> </div>

 <input name="pidcate" type="text"  value="<?php echo $pidcate; ?>" class="form-control" /><?php echo $xz_must; ?>  


 
 <a href="../mod_category/mod_category.php?lang=<?php echo LANG?>" target="_blank">分类管理></a> | 
  <a href="../mod_category/mod_fefilecate.php?lang=<?php echo LANG?>" target="_blank">效果内容管理></a>

            </td>
        </tr>
 