<?php
/*
  欢迎使用DM企业建站系统，本系统由www.demososo.com开发。
  
*/

require_once '../config_a/common.inc2010.php';
ifhave_lang(LANG);//TEST if have lang,if no ,then jump

  
 $pid=$type='block';
  
 if($act <> "pos") zb_insert($_POST);
//
$jumpv='mod_form.php?lang='.LANG.'&pid='.$pid.'&type='.$type;
$jumpv_file=$jumpv.'&file='.$file;

//----------
if($act == "pos")
{
    foreach ($_POST as $k=>$v){
         $ss = "update ".TABLE_FIELD." set  pos='$v' where id='$k'  $andlangbh  limit 1";
         iquery($ss);
        }
      jump($jumpv);
}
if($act == "sta")
{
     $ss = "update ".TABLE_FIELD." set sta_visible='$v' where id=$tid $andlangbh limit 1";
	// echo $ss;exit;
    iquery($ss);
    jump($jumpv);
}

 if($act == "del") 
{ 
ifcandel_field(TABLE_FIELDOPTION,'pid',$pidname,'','出错，有选项不能删除，请先删除它的选项！或者不用删除，直接隐藏这个属性。',$jumpv);
//ifcandel_field($table,$field,$value,$typelike,$back)


ifcandel_field(TABLE_FIELDVALUE,'pid',$pidname,'','出错，有文章用到了这个选项！请先删除用了这个选项的文章！',$jumpv);
//ifcandel_field($table,$field,$value,$typelike,$back)


 ifsuredel_field(TABLE_FIELD,'pidname',$pidname,'',$jumpv);
 //ifsuredel_field($table,$field,$value,$typelike,$back)

}

$title="表单区块管理";
$title2=$title3='';
if($act<>'list') $title2= '<a style="font-size:18px" href="'.$jumpv.'">'.$title.'</a>';
else $title2 = $title;
if($act=='add') $title3='添加';
if($act=='edit') $title3='修改';
require_once HERE_ROOT.'mod_common/tpl_header.php';
?>
 
 
 <section class="content-header">
   
      <h1><?php echo $title2?> 
      <span style="font-size:14px"> <?php echo $title3;?></span></h1>
</section>


 <section class="content"> 
   

  <div class="contenttop">

 
 <?php
  if($file=='list'){?>
    <a href='<?php echo $jumpv.'&file=addedit&act=add';?>'><i class="fa fa-plus-circle"></i> 添加表单区块</a>
<?php
  }
 
  if($file<>'list'){
    ?>
  
  <?php 
  }
?>
</div>


<?php
  require_once HERE_ROOT.'mod_form/tpl_form_'.$file.'.php'; 	 
?>
</section>
<?php
require_once HERE_ROOT.'mod_common/tpl_footer.php';
?>
 