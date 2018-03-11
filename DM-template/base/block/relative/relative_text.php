  <?php 

//---获取数据-------------
  $pidcate= $mainpidname;
  $maxline = 20;
$sqlwhere = get_node_sqlv($pidcate);
 
$sqlnode="select * from ".TABLE_NODE." where  sta_visible='y' and id<>$detailid $andlangbh  $sqlwhere  order by pos desc,id desc limit $maxline";
$fenum = getnum($sqlnode);
if($fenum==0) echo '没有记录。fefile--'.$pidcate;
else  $result = getall($sqlnode);

$dhtrigger = 'bxbanneracc'.rand(1000,9999); 
?>

 
<div class="relativenode relativenodetext">
<h3><?php echo $relativetitle;?></h3>
 
<ul>
<?php
 
foreach($result as $v){

       $tid = $v['id'];
     $title = $v['title'];  $alias_jump = $v['alias_jump']; 
     $pidname = $v['pidname']; 
      
     $dateday= substr($v['dateedit'],0,10);  
     
      $imgv =  get_img_def($v['kvsm']); 
       
         // $url = getlink($pidname,'node','noadmin','title');
     $alias = alias($pidname,'node');
      $linkurl = url('node',$alias,$tid,$alias_jump);
    
        
      //  $despv =  get_nodedespjj($v['despjj'],$v['desp'],$v['desptext'],$cus_substrnum); 
         

?>
  <li class="col-md-6 col-sm-6">

        <span><?php echo $dateday?></span>
       <a href="<?php echo $linkurl?>"><?php echo $title?></a>   
             
           

      </li>
<?php 
 
 }
  ?>


  
 </ul>
<div class="c"> </div>
 
</div>
  <?php 
  // must duo lie.
  
  ?>
 