
<form method=post action="<?php echo $jumpv_catid;?>&act=pos">
  <table class="formtab formtabhovertr">
  <tr style="font-weight:bold;background:#eeefff">
  <td  align="center">排序号</td>
   <td   align="center">缩略图</td>
    <td  align="left">标题</td>
    <td   align="center">操作</td> 
    <td  align="center" >状态</td>
 
  </tr>
  <?php

        foreach($rowlisttext as $v){
    //echo print_r($rowlist,1);
 // get arr value here. put head...
$arr_can=$v['arr_can'];
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
      //-----------------
    
            $tid = $v['id']; 
             $jsname = jsdelname($v['title']);
           // echo $jsname; 

      $name = '<strong>'.$v['title'].'</strong>';
      $titlecss = $v['titlecss'];
      $dateedit = $v['dateedit'];
      
      $pid = $v['pid'];
      $pidname = $v['pidname'];$alias_jump = $v['alias_jump'];
      $kv = $v['kv'];
       $kvsm = $v['kvsm'];
     //if($sta_kvtothumb=='y') $kvsm = $kv; //$sta_kvtothumb in arr_can

       $kvsm2 = $v['kvsm2'];
      $alias = alias($pidname,'node');
      
      $sta_noaccess = $v['sta_noaccess']; 
      $sta_new = $v['sta_new'];$sta_tj = $v['sta_tj'];
 

 
      
//$url = url('node',$alias,$tid,$alias_jump);
 
//$urlname = '<a style="color:#999" target="_blank" href="'.$userurl.$url.'">前台预览:'.$url.'</a>';
$urlname = getlink($pidname,'node','admin',$class='');

if($kvsm<>""){
    // $imgsmall_src= get_thumb($kvsm,$name,'div');

     $imgsmall_src =  p2030_imgyt($kvsm,'y','n'); 

//$imgsmall ='<span class="fl nodekvsm"><a target="_blank"  href="mod_node_edit.php?lang=cn&tid='.$tid.'&act=list&file=editkvsm">'. $imgsmall_src.'</a></span>';
     $imgsmall ='<span class="fl nodekvsm">'. $imgsmall_src.'</span>';

}
else $imgsmall='<span class="cgray">无缩略图</span>';

 

$sta_access_v = $sta_noaccess=='y'?'<span class="cred">(禁止访问)</span>':'';
$sta_new_v = $sta_new=='y'?'<span class="cred">(最新)</span>':'';
$sta_tj_v = $sta_tj=='y'?'<span class="cred">(推荐)</span>':'';
 

if($titlecss=="y"){
     $titlecss_v= '';
}
else   $titlecss_v= ' style="'.$titlecss.'"';

// if($kv<>""){
//      $kv2= ' | <a target="_blank" href="mod_node_edit.php?lang=cn&tid='.$tid.'&act=list&file=editkv"><span class="cred">(有kv)</span></div>';

// }
// else   $kv2= '';

//
 
$sqlalbum = "SELECT id from ".TABLE_ALBUM." where pid='$pidname' $andlangbh order by id desc";//$pidname is in pro-modnews.php 
$num_abm = '  <a target="_blank" href="mod_node_edit.php?lang=cn&tid='.$tid.'&act=list&file=editalbum">[相册图片有<span class="cred">'.getnum($sqlalbum).'</span>个]</a>';
//
 
$num_imgfj = ' | [编辑器附件有'.num_imgfj($pidname).'个]';

//----------------------

 menu_changesta($v['sta_visible'],$jumpv_catid,$tid,'sta_node');
 
//$edit_text= "<a class='but1' href='mod_node_edit.php?lang=".LANG."&act=editcan&tid=$tid&file=editcan' target='_blank'>修改标题</a>";
$edit_text2= "<a class='but1' href='mod_node_edit.php?lang=".LANG."&act=editdesp&tid=$tid&file=editdesp' target='_blank'><i class='fa fa-pencil-square-o'></i> 修改</a>";
 
 //$del_text= "<a href=javascript:delself('$PHP_SELF','$tid')  class=but2>删除</a>";
$del_text= " <a href=javascript:del('delnode','$pidname','$jumpv_catid','$jsname')  class=but2><i class='fa fa-trash-o'></i> 删除</a>";
 
 ?>
  <tr <?php echo $tr_hide?>>
  <td align="center">
  <input type="text" name="<?php echo $tid;?>"  value="<?php echo $v['pos'];?>" size="5" />
<?php //if($sta_sticky=='y') echo '<p class="cgray">置顶</p>'?>
  </td>
<td align="center"><?php echo $imgsmall?> </td>
    <td align="left"><?php
     //   $pidname=decode(web_getcatname2($pid));
        $catname = get_field(TABLE_CATE,'name',$pid,'pidname');
        $pidlink="<a href='$jumpv&catid=$pid' title='显示这个分类'>[$catname]</a>";
    echo $pidlink.' '.$name.'<br />'.$num_imgfj.$num_abm.$sta_access_v.$sta_new_v.$sta_tj_v;
    if($kv<>"") echo '<span class="cred">(有kv)</span>';
    if($kvsm2<>"") echo '<span class="cred">(有小图2)</span>';
    echo '<br />'.$urlname.'<i class="fa fa-external-link-square"></i>';

if($downloadurl<>'') echo ' <span class="cgray">[有资料下载]</span>';
 
    ?> 



<?php 
if($sta_tag=='y'){
  echo '<div class="cgray"><strong>'.$tag_title.':</strong>';
 
   $ss="select * from  ".TABLE_TAGNODE."  where node='$pidname'  ".ANDLANGBH." order by id desc";
  // echo $ss;exit;
      if(getnum($ss)>0){
        $res = getall($ss);
          foreach ($res as $v) {
              $tag = $v['tag'];
              echo get_field(TABLE_TAG,'name',$tag,'pidname').'&nbsp;&nbsp;';
              
          }//end foreach

      }
echo '</div>';
 
   } 


   ?>
    </td>
    <td  align="center"><?php echo  $edit_text2.$del_text?></td> 
    <td  align="center">
      <?php   echo $sta_visible;?>
        <br/>
   <?php echo $dateedit;?>
   
     
    </td>
  </tr>
<?php

    } ?>
</table>


<div style="padding-bottom:22px"><input class="mysubmit" type="submit" name="Submit" value="修改排序" />
<br />
<?php echo $sort_ads_f;?></div>
</form>

<?php 

require_once HERE_ROOT.'plugin/page_2010.php';
   
?>