  <?php 

//---获取数据-------------
 
  $sqlwhere = get_node_sqlv($pidcate);
$sqlnode="select * from ".TABLE_NODE." where  sta_visible='y' $andlangbh  $sqlwhere  order by pos desc,id desc limit $maxline";
$fenum = getnum($sqlnode);
 
if($fenum==0) {echo '没有记录。 --'.$pidcate;
$result = array();
}
else  $result = getall($sqlnode);

 ?>

<?php
edit_fenode($pidcate);//用来在前台编辑后台。
 
?>
 <ul class="homenews_list">
<?php
 foreach($result as $v){
 $tid = $v['id'];
 $title = $v['title'];  $pidname = $v['pidname']; 
 $dateday= substr($v['dateedit'],0,10);    
   $linkurl = getlink($pidname,'node','noadmin');


  echo '<li><span>'.$dateday.'</span>'.$linkurl.'</li>';
 } 

 ?> 
  
 </ul>