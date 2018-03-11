<?php
/*
  欢迎使用DM企业建站系统，本系统由www.demososo.com开发。
  
*/

require_once '../config_a/common.inc2010.php';
ifhave_lang(LANG);//TEST if have lang,if no ,then jump

 

$type='blockdh';

 
if($tid <> "")  {ifhasid(TABLE_CATE,$tid);}

if($act <> "pos") zb_insert($_POST);

//-----------------
$jumpv='mod_fefilecate.php?lang='.LANG.'&type='.$type; 
$jumpvf=$jumpv.'&file='.$file;


//----------------------
  
//only one record ........
$sql = "SELECT * from ".TABLE_CATE." where   modtype='$type' and pid='0'   $andlangbh  order by pos desc,pidname desc,id desc";
  // echo $sql;
if(getnum($sql)>0){
//--------------get blockdh cate list
  $row = getrow($sql);
  $catepidname = $row['pidname'];//not pidname,conflict pidname below when del 
}
else { 

  //if not .then insert----------------
  $catbs='cate'.$bshou;
  $ss = "insert into ".TABLE_CATE." (pid,pidname,pbh,name,modtype,last,level,lang) values ('0','$catbs','$user2510','效果区块','blockdh','y',1,'".LANG."')";
      // echo $ss;exit;
   iquery($ss);

   jump($jumpv);
   exit;
   //echo '<p>暂无主类，<a href="'.$jumpv.'&file=mainaddedit">请添加主类</a></p>';
}
 

 $title='效果区块内容管理(<span style="font-size:16px">'.$catepidname.'</span>)';

 $title2='';
 if($act=='add') $title2=' - 添加';
 else if($act=='edit') $title2=' - 修改';
 //----------
 

if($act == "sta")
{
     $ss = "update ".TABLE_CATE." set sta_visible='$v' where id=$tid $andlangbh limit 1";
	// echo $ss;exit;
    iquery($ss);
    jump($jumpvf);
}

  

if($act == "pos")
{
    foreach ($_POST as $k=>$v){
         $ss = "update ".TABLE_CATE." set  pos='$v' where id='$k'  $andlangbh  limit 1";
         iquery($ss);
        }
      jump($jumpvf);
}
 


 

 
if($act == "del_blockdh")
{ 
   $ifdel1 = ifcandel(TABLE_CATE,$pidname,'出错，有子分类不能删除，请先删除它的子分类！',$jumpvf);// back is fail 
 $ifdel2 = ifcandel(TABLE_NODE,$pidname,'分类里有内容，请先在内容管理里删除内容！',$jumpvf);
 if($ifdel1 and $ifdel2 ) ifsuredel(TABLE_CATE,$pidname,$jumpvf); 

}


//-------------------

require_once HERE_ROOT.'mod_common/tpl_header.php';
?>

 

<section class="content-header">
          
      <h1>
      <?php 
        $titlelink=$title;
       if($file<>'list')  $titlelink='<a style="font-size:20px" href="'.$jumpv.'">'.$title.'</a>'; 
       
      echo  $titlelink.$title2;
     
      ?></h1>
</section>
  
 <div style="padding-left:10px">
 <?php 
  //echo $stylename;
?>
</div>

 <section class="content">  

<?php
  if($file=='list'){
?>
  <div class="contenttop">
  <a href="<?php echo $jumpv?>&file=addedit&act=add"><i class="fa fa-plus-circle"></i> 添加</a>
&nbsp;&nbsp;&nbsp;&nbsp;
<?php 

//if($type2=='n') echo '<a href="'.$jumpv.'"><i class="fa fa-caret-right"></i> 查看显示内容</a>';
//else echo '<a href="'.$jumpv.'&type2=n"><i class="fa fa-caret-right"></i> 查看隐藏内容</a>';
?>
   

</div>
<?php
  }
?>
 
        <?php   
           
          require_once HERE_ROOT.'mod_category/tpl_fefilecate_'.$file.'.php';
        ?>
 </section>
<?php
require_once HERE_ROOT.'mod_common/tpl_footer.php';
?>


