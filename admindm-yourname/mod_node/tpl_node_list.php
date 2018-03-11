<?php
/*
  欢迎使用DM企业建站系统，本系统由www.demososo.com开发。
*/
if(!defined('IN_DEMOSOSO')) {
  exit('this is wrong page,please back to homepage');
}
?>
<?php
 
  $key = @htmlentitdm($_POST['searchword']); 
 if($key == "") $keyV="" ;
     else $keyV="and title like '%$key%'" ;   

 if($catid=="") $catid_v="ppid='$catpid' ".$keyV ;
     else $catid_v="ppid='$catpid' and pid='$catid' ".$keyV ;
   
     $sqltextlist = "SELECT * from ".TABLE_NODE." where $catid_v  $andlangbh order by pos desc,id desc"; //pos desc,id desc
  //echo $sqltextlist;
    /*begin page roll*/
     $num_rows = get_numrows($sqltextlist);
     if($num_rows>0){
 
        $offset=5;
        $page_total=ceil($num_rows/$maxline); //maxline is in mod_node.php

        if (!isset($page)||($page<=0)) $page=1;
        if($page>$page_total) $page=$page_total;
        $start=($page-1)*$maxline;
        $sqltextlist2="$sqltextlist  limit $start,$maxline";  
        $rowlisttext = getall($sqltextlist2); 
     }//end $num_rows>0

/*end page roll*/
 
 ?>
 
<div class="c" style="margin-bottom:15px">
<div class="fl col-md-3">
 
过滤：<select onchange="selectjump(this.value)">
<option value="">请选择</option>
<option value="<?php echo $jumpv;?>">管理列表</option>


 
    <?php
  $sqlcatlist = "SELECT * from ".TABLE_CATE." where  pid='$catpid' $andlangbh order by pos desc,id";
  //echo $sqlcatlist;
  if(getnum($sqlcatlist)>0){
    ?>

    <?php
$rowcatlist= getall($sqlcatlist);
 
  if($catpid==$catid) $cur2='class="cur"'; else $cur2='';
  echo '<option value='.$jumpv.'&catid='.$catpid.'>'.$maincate.'</option>';
 
        foreach($rowcatlist as $vcat){
          $pidname=$vcat['pidname'];    
          if($pidname==$catid) $cur='class="cur"'; else $cur='';    
          if($vcat['sta_visible']<>'y') $catname_hide='(已隐藏)';else $catname_hide='';
             echo '<option value='.$jumpv.'&catid='.$pidname.'>&nbsp; ├ '.decode($vcat['name']).$catname_hide.'</option>';
       
     $sqlsubcatlist = "SELECT pidname,name,sta_visible from ".TABLE_CATE." where  pid='$pidname' $andlangbh  order by pos desc,id";
                $rowlist_cat_sub = getall($sqlsubcatlist);
                if($rowlist_cat_sub<>'no') {
                   // echo '<ul>';
                        foreach($rowlist_cat_sub as $vcat_sub){
                                    $subpidname=$vcat_sub['pidname'];
                                    if($subpidname==$catid) $cur='class="cur"'; else $cur='';
                                    if($vcat_sub['sta_visible']<>'y') $subname_hide='(已隐藏)';else $subname_hide='';
                            echo '<option value='.$jumpv.'&catid='.$subpidname.'>&nbsp;&nbsp; ├ '.decode($vcat_sub['name']).$subname_hide.'</option>';
                        }

                   // echo '</ul>';


                }

           

            } //end foreach
            }
   
     
?>
 
</select>
 
</div>
<div class="fl col-md-9">
  <form onsubmit="javascript:return checksearch(this)" id="search_form" action="mod_node.php?lang=<?php echo LANG?>&catpid=<?php echo $catpid?>&catid=<?php echo $catid?>&page=<?php echo $page?>" method="post" accept-charset="UTF-8">         
 搜索： <input class="navsearch_input" type="text" name="searchword" value="请输入标题" style="width:250px;padding:5px;" onfocus="javascript:this.value='';" /> 
  <input type="submit" name="Submit" value="搜索" class="searchgo" style="padding:5px 10px;cursor:pointer" />
  </form> 
  </div>

  </div>

  <?php 
  if($num_rows==0) {
        echo '<br><br>没有找到相关内容，请添加。<br><br>注意：<br>这里和前台不一样，只显示当前分类的内容，不会显示子分类的内容。<br><br>如果要显示所有子分类的内容，请点击  管理列表 链接<br><br>';
        echo '</div><div class=blank></div>';
    }
    else {
          require_once HERE_ROOT.'mod_node/tpl_node_list_inc.php';
      }
      ?>
  

 
  <script>
    function checksearch(thisForm) {
        

        if (thisForm.searchword.value == "" || thisForm.searchword.value == "请输入标题" )
        {
            alert("请输入标题。");
            thisForm.searchword.focus();
            return (false);
        }

        // return;

    }

 
function selectjump(url){
  if(url!='') window.location.href=url;   
}


</script>
