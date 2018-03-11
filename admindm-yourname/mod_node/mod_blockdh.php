<?php
/*	欢迎使用DM企业建站系统，本系统由www.demososo.com开发。
*/
$mod_previ = 'normal';//default is admin,and set in common.inc
require_once '../config_a/common.inc2010.php';
require_once HERE_ROOT.'config_a/func.previ.php';//when normal,require is here.
//
//if($catpid <> "")  ifhaspidname(TABLE_CATE,$catpid);
//if($catid <> "")  ifhaspidname(TABLE_CATE,$catid);

ifhave_lang(LANG);//TEST if have lang,if no ,then jump
if($act <> "pos") zb_insert($_POST);

 
//-----------------------------
//
$jumpv='mod_blockdh.php?lang='.LANG.'&pid='.$pid;
$jumpv_file=$jumpv.'&file='.$file; 

/********************************************************/
/*get title***************************/
  $nameparent = get_field(TABLE_CATE,'name',$pid,'pidname');
  if($nameparent=='noid') {
    echo 'pid error.';
    exit;
  }
  else  $title =$nameparent;

  if($act=='list')
 $title2 ='<a style="font-size:18px" href="../mod_category/mod_fefilecate.php?lang='.LANG.'">效果区块的内容管理</a> - '.$nameparent;
else $title2 = '<a style="font-size:18px" href="'.$jumpv.'">'.$nameparent.'</a>';

 



$title3='';
 if($file=='add')    $title3 =' - 添加';
 else if($file=='edit')  $title3 =' - 修改';


/****************************/


if($act == "sta_node")
{
     $ss = "update ".TABLE_NODE." set sta_visible='$v' where id='$tid'   $andlangbh limit 1";
    iquery($ss);
    jump($jumpv);
}

if($act == "pos")
{
   foreach ($_POST as $k=>$v){
         $ss = "update ".TABLE_NODE." set  pos='$v' where id='$k'   $andlangbh limit 1";
         iquery($ss);
        }
    jump($jumpv);
}


if($act == "delnode")
{

$nodearr = get_fieldarr(TABLE_NODE,$pidname,'pidname');
$kv = $nodearr['kv'];
$kvsm = $nodearr['kvsm'];
$kvsm2 = $nodearr['kvsm2'];
p2030_delimg($kv,'y','n');//p2030_delimg($addr,$delbig,$delsmall);
p2030_delimg($kvsm,'y','n');
p2030_delimg($kvsm2,'y','n');

//pre($nodearr);
 ifsuredel_field(TABLE_NODE,'pidname',$pidname,'equal',$jumpv);

}

/*****
****
***
*********************/


require_once HERE_ROOT.'mod_common/tpl_header.php';
 ?>


<section class="content-header">

      <h1>
        <?php

 if($file=='list') echo $title2;
 else echo $title2.$title3;
 ?>
 </h1>

</section>


 <section class="content">

<?php
  if($file=='list'){
?>
  <div class="cred mb10">(每个记录可以上传三张图片，如果模板只显示一张图片，则会用kv大图。)</div>
  <div class="contenttop">
  <a href="<?php echo $jumpv?>&file=add&act=add"><i class="fa fa-plus-circle"></i> 添加</a>
</div>
<?php
  }
?>

  <?php      
      $reqname = 'mod_node/tpl_blockdh_'.$file.'.php';
        require_once admreq($reqname);
        ?>
 </section>
<?php
require_once HERE_ROOT.'mod_common/tpl_footer.php';
?>
