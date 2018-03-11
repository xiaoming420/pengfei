<?php
/*
  欢迎使用DM企业建站系统，本系统由www.demososo.com开发。
  
*/

require_once '../config_a/common.inc2010.php';
ifhave_lang(LANG);//TEST if have lang,if no ,then jump

$submenu='product';
$sub_pidname=''; 
if($tid <> "")  {ifhasid(TABLE_CATE,$tid);
  $sqlcate = "select * from  ".TABLE_CATE." where id='$tid' $andlangbh order by pos desc,id limit 1";
     $rowcate22 = getrow($sqlcate);
     $sub_pidname=$rowcate22['pidname']; 
      $subname=$rowcate22['name']; 
     $sub_pid=$rowcate22['pid'];  
}

if($act <> "pos") zb_insert($_POST);

$catname='';
if($catid <> ""){
  ifhaspidname(TABLE_CATE,$catid);

  $catarr = get_fieldarr(TABLE_CATE,$catid,'pidname');
$catname = $catarr['name']; 
$modtype = $catarr['modtype']; 
//$mainalias= alias($catid,'cate');
}

 
 
/************************/
//$sql = "SELECT id from ".TABLE_MENU." where pbh='".USERBH."'  order by id desc";
 // $num = getnum($sql);
 // $limitnum='菜单限制数：'.$num_menu.' / 已用数：'.$num;
$jumpv='mod_category.php?lang='.LANG;
$jumpv_back=$jumpv.'&catid='.$catid;
$jumpv_file=$jumpv_back.'&file='.$file;
$jumpv_fp=$jumpv_back.'&file='.$file.'&pidname='.$pidname;
$jumpv_tid=$jumpv_back.'&tid='.$tid;
$jumpv_mainedit = $jumpv_back.'&file=mainedit';
$jumpv_maineditcan = $jumpv_back.'&file=maineditcan';
$jumpv_maineditseo = $jumpv_back.'&file=maineditseo';


$title = '主分类管理';
$breadmid=$subtitle='';

if($file=='mainadd') $title='添加主分类 - '.$catname;
if($file=='mainedit' || $file=='maineditcan') $title='修改主分类 - '.$catname;
if($file=='mainalias') $title='修改别名 - '.$catname;
if($file=='mainfield') $title='字段属性管理 - '.$catname;
if($file=='mainlayoutlist') $title='修改列表布局 - '.$catname;
if($file=='mainlayoutdetail') $title='修改详情页布局 - '.$catname;



if($file=='subadd') $title='添加子分类';
if($file=='subedit') $title='修改子分类 - '.$subname ;
if($file=='submove') $title='转移子分类';
if($file=='subalias') $title='子分类别名 - '.$subname ;
if($file=='sublayoutlist') $title='子分类列表布局 - '.$subname ;
if($file=='sublayoutdetail') $title='子分类详情页布局 - '.$subname ;


$filestring = substr($file,0,3);

if($file=='sublist') {$title= $catname;
 $filestring = '';
}

if($filestring=='sub') { $subtitle = '<a href="'.$jumpv_back.'&file=sublist">'.$catname.'</a> - ';
   $breadmid = ' <li > <a href="'.$jumpv_back.'&file=sublist">'.$catname.'</a></li>';
}

 
/*-----------
*/
 $catsublist_cur=''; $field_cur=''; $mainedit_cur=$maineditdh_cur=''; 
 $editalias_cur=''; $buju_cur=''; $bujuread_cur='';

 if($file==""  or $file=="subedit")   $catsublist_cur=' cur';
 elseif($file=="field" or $file=="fieldedit")   $field_cur=' cur';
 elseif($file=="mainedit" || $file=="maineditcan")   $mainedit_cur=' cur';
  elseif($file=="mainedit_blockdh")   $maineditdh_cur=' cur'; 
  elseif($file=="edit_alias")   $editalias_cur=' cur';
 elseif($file=="buju")   $buju_cur=' cur';
 elseif($file=="bujuread")   $bujuread_cur=' cur';
  

 //----------
 if($catid<>''){
  $relativetitle=$relativefg=$ordernowtitle='';

   $ss = "select arr_can from ".TABLE_CATE." where pidname= '$catid' $andlangbh limit 1";
   $row = getrow($ss);


   $arr_can=$row['arr_can'];

   $bscntarr = explode('==#==',$arr_can); 

   if(count($bscntarr)>1){
    foreach ($bscntarr as   $bsvalue) {
     if(strpos($bsvalue, ':##')){
       $bsvaluearr = explode(':##',$bsvalue);
       $bsccc = $bsvaluearr[0];
       $$bsccc=$bsvaluearr[1];
     }
   }
 }
} 

    //-----------------

if($act == "sta_catesub")
{
     $ss = "update ".TABLE_CATE." set sta_visible='$v' where id=$tid $andlangbh limit 1";
	// echo $ss;exit;
    iquery($ss);
    jump($jumpv_back.'&file=sublist');
}

  

if($act == "pos")
{
    foreach ($_POST as $k=>$v){
         $ss = "update ".TABLE_CATE." set  pos='$v' where id='$k'  $andlangbh  limit 1";
         iquery($ss);
        }
      jump($jumpv_back);
}
 

if($act == "subpos")
{
    foreach ($_POST as $k=>$v){
         $ss = "update ".TABLE_CATE." set  pos='$v' where id='$k'  $andlangbh  limit 1";
         iquery($ss);
        }
      jump($jumpv_back.'&file=sublist');
}
 



if($act == "delmaincate")
{ 
 $ifdel1 = ifcandel(TABLE_CATE,$pidname,'出错，有子分类不能删除，请先删除它的子分类！',$jumpv_back);// back is fail 
 $ifdel2 = ifcandel(TABLE_FIELD,$pidname,'分类里有字段！请先在字段管理里删除字段！',$jumpv_back);
 $ifdel3 = ifcandel(TABLE_NODE,$pidname,'分类里有内容，请先在内容管理里删除内容！',$jumpv_back);
 $ifdel4 = ifcandel(TABLE_MENU,$pidname,'此分类有子菜单，请先在菜单管理 里删除。！',$jumpv_back);

 if($ifdel1 and $ifdel2 and $ifdel3 and $ifdel4) {

  ifsuredel_field(TABLE_LAYOUT,'pid',$pidname,'eq','noback');
   ifsuredel_field(TABLE_ALIAS,'pid',$pidname,'eq','noback');
	//ifcandel_bypid(TABLE_LAYOUT,$pidname,'noback');
	//ifcandel_bypid(TABLE_ALIAS,$pidname,'noback');

	ifsuredel(TABLE_MENU,$pidname,'noback'); //DEF IS BY PIDNAME
	ifsuredel(TABLE_CATE,$pidname,$jumpv);
 }
	
}
if($act == "delsubcate")
{ 
$jumpv_back = $jumpv.'&file=sublist&catid='.$catid;
 $ifdel1 = ifcandel(TABLE_CATE,$pidname,'出错，有子分类不能删除，请先删除它的子分类！',$jumpv_back);// back is fail 
 $ifdel2 = ifcandel(TABLE_NODE,$pidname,'分类里有内容，请先在内容管理里删除内容！',$jumpv_back);
 if($ifdel1 and $ifdel2 ) ifsuredel(TABLE_CATE,$pidname,$jumpv_back);	
}


//-------------------

require_once HERE_ROOT.'mod_common/tpl_header.php';
?>
<!-- Content Header (Page header) -->
<section class="content-header">
     
      <ol class="breadcrumb">
        <li><a href="../mod_category/mod_category.php?lang=<?php echo LANG?>"><?php echo $breadfaicon?> 分类管理</a></li>
        <?php echo $breadmid;?>
        <li class="active"><?php echo $title?> </li>
      </ol>
       <h1>  <?php echo $title?>  </h1>

</section>
 
    <?php     

      if($file=='mainedit' || $file=='maineditcan' || $file=='maineditseo' || $file=='mainalias' || $file=='mainlayoutlist' || $file=='mainlayoutdetail' || $file=='mainfield' )
    {
      echo '<div class="contenttoptop">';
        require_once HERE_ROOT.'mod_category/tpl_category_maintab.php';
         echo '</div>';
    }


    if($file=='subedit'  || $file=='subedit' || $file=='subalias' || $file=='sublayoutlist' || $file=='sublayoutdetail' )
    {
      echo '<div class="contenttoptop">';
        require_once HERE_ROOT.'mod_category/tpl_category_subtab.php';
         echo '</div>';
    }
           
          ?> 

    <section class="content">

    <??>
        
           <?php  
$heresubtring = substr($file,0,3);
 
if($heresubtring=='sub'){$herepidname = $sub_pidname;
  $type='csub';
}
 else {
  $herepidname = $catid;
  $type='cate';
}

 if($file=='subalias' || $file=='mainalias'){  
 $framesrc='../mod_module/mod_alias.php?pid='.$herepidname.'&lang='.LANG.'&type=cate&file=edit';
 //alias type only cate,not csub.
iframepage($framesrc);
 
}

elseif($file=='sublayoutlist' || $file=='mainlayoutlist'){
  
 echo $text_imgfjlink;
  $framesrc='../mod_layout/mod_layout.php?pid='.$herepidname.'&lang='.LANG.'&type='.$type;
iframepage($framesrc);

}
elseif($file=='sublayoutdetail' || $file=='mainlayoutdetail'){

 echo $text_imgfjlink;
  $framesrc='../mod_layout/mod_layout.php?pid='.$herepidname.'&lang='.LANG.'&type=read';
iframepage($framesrc);

  //cate sub de detail is read too.no use csubread
}

elseif($file=='mainfield'){
  //echo '<p>只要把下面的全部隐藏，就不会在前台显示。(不需要删除)</p>';
  $framesrc='../mod_field/mod_field.php?pid='.$herepidname.'&lang='.LANG.'&type='.$type;
iframepage($framesrc);
  }

else  require_once HERE_ROOT.'mod_category/tpl_category_'.$file.'.php';

?> 
       

       

 </section>


<?php 

require_once HERE_ROOT.'mod_common/tpl_footer.php';

?>
