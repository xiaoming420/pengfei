<?php
/*
	欢迎使用DM企业建站系统，本系统由www.demososo.com开发。
*/
if(!defined('IN_DEMOSOSO')) {
	exit('this is wrong page,please back to homepage');
}
 ?>
 <div class="menu">
<a href="../mod_category/mod_taxo.php?lang=<?php echo LANG?>&type=blockdh"  ><strong>管理效果分类 ></strong></a>
 <span class="cred">(这里的内容不可以在前台直接访问。只能作为效果区块来调用。<a href="http://www.demososo.com/jc_blocknd.html" target="_blank">查看教程></a>)</span>
</div>


 <div class="pro_album_left" style="width:19%">


 <h3><?php echo $maincate;?></h3>
 <ul>
    <?php
	$sqlcatlist = "SELECT * from ".TABLE_CATE." where  pid='$catpid' $andlangbh order by pos desc,id desc";
	//echo $sqlcatlist;
  if(getnum($sqlcatlist)>0){
$rowcatlist= getall($sqlcatlist);

  if($catpid==$catid) $cur2='class="cur"'; else $cur2='';
  //echo '<li><a '.$cur2.' href='.$jumpv.'&catid='.$catpid.'>'.$maincate.'</a><ul>';

   echo '<li><strong>'.$maincate.'</strong><ul>';

        foreach($rowcatlist as $vcat){
          $pidname=$vcat['pidname'];
          if($pidname==$catid) $cur='class="cur"'; else $cur='';
          if($vcat['sta_visible']<>'y') $catname_hide='(已隐藏)';else $catname_hide='';

           $sqlnode = "SELECT id from ".TABLE_NODE." where  pid='$pidname' and modtype='blockdh' $andlangbh  order by id";
             $nodenum = getnum($sqlnode);

  echo '<li><a '.$cur.' href='.$jumpv.'&catid='.$pidname.'>'.decode($vcat['name']).$catname_hide.'</a><span class="cred">('.$nodenum.')</span><span style="display:block;color:#666">标识：'.$pidname.'</span>';


			 //----cancel sub cate...................
     // $sqlsubcatlist = "SELECT pidname,name,sta_visible from ".TABLE_CATE." where  pid='$pidname' $andlangbh  order by pos desc,id";
     //            $rowlist_cat_sub = getall($sqlsubcatlist);
     //            if($rowlist_cat_sub<>'no') {
     //                echo '<ul>';
     //                    foreach($rowlist_cat_sub as $vcat_sub){
     //                                $subpidname=$vcat_sub['pidname'];
     //                                if($subpidname==$catid) $cur='class="cur"'; else $cur='';
     //                                if($vcat_sub['sta_visible']<>'y') $subname_hide='(已隐藏)';else $subname_hide='';

     //          $sqlnode2 = "SELECT id from ".TABLE_NODE." where  pid='$subpidname' and modtype='blockdh' $andlangbh  order by id";

     //         $nodenum2 = getnum($sqlnode2);

     //                        echo '<li><a '.$cur.' href='.$jumpv.'&catid='.$subpidname.'>'.decode($vcat_sub['name']).$subname_hide.'</a><span class="cred">('.$nodenum2.')</span><span style="display:block;color:#666">标识：'.$subpidname.'</span></li>';
     //                    }

     //                echo '</ul>';


     //            }

             echo '</li>';

            } //end foreach
		echo '</ul></li>';

?>
</ul>


 <?php }
 else echo '暂无内容';?>
</div><!-- end pro_album_left-->
<div class="pro_album_right" style="width:75%">
<?php if($catid<>'' && $file<>'edit') {?>
 <p>
 <a href='<?php echo $jumpv_add;?>'>添加内容</a>
 </p>
 <?php } ?>
<?php
//echo $catzj;//modlist_news.php
// if($act=="list") require_once HERE_ROOT.'mod_node/tpl_blockdh_list_inc.php';
// elseif($act=="add" or $act=="insert") require_once HERE_ROOT.'mod_node/tpl_blockdh_add.php';
if($file=='') $file='list';
if($catid=='') echo '<p class="pad8 f14b cred">请先在左边选择。 </p>';
else  require_once HERE_ROOT.'mod_node/tpl_blockdh_'.$file.'.php';

?>
</div>

<div class="c"></div><!--end right-->
