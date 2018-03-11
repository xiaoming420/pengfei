  <?php 

//---获取数据-------------
  $pidcate= $mainpidname;
  $maxline = 20;
$sqlwhere = get_node_sqlv($pidcate);
$sqlnode="select * from ".TABLE_NODE." where  sta_visible='y' and id<>$detailid  $andlangbh  $sqlwhere  order by pos desc,id desc limit $maxline";
$fenum = getnum($sqlnode);
if($fenum==0) echo '没有记录。fefile--'.$pidcate;
else  $result = getall($sqlnode);

$dhtrigger = 'bxbanneracc'.rand(1000,9999); 
?>

 
<div class="relativenode">
<h3><?php echo $relativetitle;?></h3>
<div id="<?php echo $dhtrigger;?>">
<ul>
<?php
 
foreach($result as $v){

       $tid = $v['id'];
     $title = $v['title'];  $alias_jump = $v['alias_jump']; 
     $pidname = $v['pidname']; 
     $dateday = $v['dateday'];   
     
      $imgv =  get_img_def($v['kvsm']); 
       
         // $url = getlink($pidname,'node','noadmin','title');
     $alias = alias($pidname,'node');
      $linkurl = url('node',$alias,$tid,$alias_jump);
    
        
      //  $despv =  get_nodedespjj($v['despjj'],$v['desp'],$v['desptext'],$cus_substrnum); 
         

?>
  <li class="col-md-3 col-sm-4 col-xs-6">
        
             <div class="img">
              <a href="<?php echo $linkurl?>"><img class="mt10" src="<?php echo $imgv?>"  alt="<?php echo $title?>"></a>
            </div>
      
            <div class="text">
              <h4><a href="<?php echo $linkurl?>"><?php echo $title?></a></h4>    
             
            </div>

      </li>
<?php 
 
 }
  ?>


  
 </ul>
</div>
</div>
  <?php 
  // must duo lie.
  
  ?>

 <script>
$(function(){
 
    $('#<?php echo $dhtrigger?>>ul').slick({
      slidesToShow: 5,
      slidesToScroll: 2,
      autoplay: true,
      autoplaySpeed: 2000,
      responsive: [
    {
      breakpoint: 768,
      settings: {
        slidesToShow: 3
      }
    },
    {
      breakpoint: 480,
      settings: {
        slidesToShow: 1
      }
    }
  ]
    });
 });   
</script>
