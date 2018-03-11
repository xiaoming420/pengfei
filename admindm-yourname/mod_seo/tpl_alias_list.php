
<form  onsubmit="return formvalidate()"  action="<?php  echo $jumpv.'&act=search';?>"   method="post" enctype="multipart/form-data">
<table class="formtab">


  <tr>
   
    <td width="88%"><strong>搜索别名： </strong>
  
  <br /><input name="alias"   type="text"  value="" class="form-control" />
  <br />
 <input class="mysubmit" type="submit" name="Submit" value="搜索别名">
  </td>
  </tr>

  
 </table>
</form>
   
 
<hr><br />
 
<?php 
 if($act=='search') $where = "where  name like '%$abc1%' $andlangbh ";
 else $where=" where $noandlangbh ";
$sql = "SELECT * from ".TABLE_ALIAS." $where order by id desc"; 
 // echo $sql;exit;
 $num_rows = getnum($sql);

     if($num_rows>0){
 
        $offset=5;
        $maxline=20;
        $page_total=ceil($num_rows/$maxline);  

        if (!isset($page)||($page<=0)) $page=1;
        if($page>$page_total) $page=$page_total;
        $start=($page-1)*$maxline;
        $sql2="$sql  limit $start,$maxline"; 
        $rowlist = getall($sql2);   


       ?>

     

 <table class="formtab">

<tr class="formtitle">
  <td>别名</td> 
    <td>类别</td> 
    <td>标题</td> 
    
    <td align="center">操作</td>
     
  </tr> 

<?php
      foreach($rowlist as $v){
        $type = $v['type']; $pid = $v['pid'];  
          $tid = $v['id']; 

if($type=='node') $title = '文章：'.get_field(TABLE_NODE,'title',$pid,'pidname');
elseif($type=='page') $title = '页面：'.get_field(TABLE_PAGE,'name',$pid,'pidname');
elseif($type=='cate')  $title = '分类：'.get_field(TABLE_CATE,'name',$pid,'pidname');

 $jsname = '删除别名：'.jsdelname($title);

//mod_seo/mod_alias_edit.php?lang=cn&act=edit&pidname=page20160307_1115284044&type=page
$editlink='<a class="but1 needpopup" href="mod_alias_edit.php?lang='.LANG.'&pidname='.$pid.'&type='.$type.'&act=edit"><span><i class="fa fa-pencil-square-o"></i> 修改</span></a>';
$del_text= " <a  class='but2' href=javascript:delid('del','$tid','$jumpv','$jsname') ><span><i class='fa fa-trash-o'></i> 删除</span></a>";


 

?>

  <tr>
         <td>
            别名：<span class="cred"><?php echo $v['name'];?></span> <br />
             
        </td>

<td> <?php echo $type;?>  
        </td>

        <td>
          标识：<?php echo $pid;?>   
           (<?php echo $title;?>)
        </td>
     
       <td align="center"><?php echo $editlink.$del_text;?></td>   
    
  </tr>
<?php } ?>
  
 </table>
 <?php
   
 

require_once HERE_ROOT.'plugin/page_2010.php';
 
  } 

else {echo '没有找到相关的别名。';
   
}   


  ?>
 
 

 
  <script>
function formvalidate(){
    var valias = $.trim($('.formtab input[name=alias]').val());
     if(valias=='') {alert('别名不能为空。'); 
          $('.formtab input[name=alias]').focus();
         return false;}


}

 </script>