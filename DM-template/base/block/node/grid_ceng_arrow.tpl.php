  <?php 

//---获取数据-------------
 
  $sqlwhere = get_node_sqlv($pidcate);
$sqlnode="select * from ".TABLE_NODE." where  sta_visible='y' $andlangbh  $sqlwhere  order by pos desc,id desc limit $maxline";
$fenum = getnum($sqlnode);
 
if($fenum==0) {echo '没有记录。--'.$pidcate;
$result = array();
}
else  $result = getall($sqlnode);


?>

<?php
edit_fenode($pidcate);//用来在前台编辑后台。
 
?>
<div id="<?php echo $dhtrigger;?>" class="<?php echo $cssname;?>">
  <ul>
<?php 
 foreach($result as $v){ 
        $tid = $v['id'];
        $title = $v['title'];
        $pidname = $v['pidname'];$alias_jump = $v['alias_jump'];
        
        $imgv =  get_img_def($v['kvsm']);
       
        $despv =  get_nodedespjj($v['despjj'],$v['desp'],$v['desptext'],$cus_substrnum);       
		 
 
        $alias=alias($pidname,'node');  
         $linkurl = url('node',$alias,$tid,$alias_jump);
        // $linkurlarr =  get_nodelinkurl($linkurl);


?>
  <li class="gcoverlayarrow <?php echo $cus_columnsvBoot;?>">
        <a  <?php echo linktarget($linkurl);?>  href="<?php echo $linkurl?>">
            <div class="img">
                   <img src="<?php echo $imgv?>" alt="<?php echo $title?>"> 
                  </div>

                  <div  class="text transition5">
                    <h3><?php echo $title?></h3>
				       	    <div class="desp"><?php echo $despv?></div>
                  </div>

      </a>
      <a <?php echo linktarget($linkurl);?>  href="<?php echo $linkurl?>" class="linkarrow transition5"><i class="fa fa-mail-forward"></i></a>


 </li>
 
 
 <?php
    }
 ?>
 </ul>
</div>
<div class="c"> </div>

<?php 
if(is_int(strpos($cssname,'sliderenable'))=='y'){
?>
 <script>
$(function(){
  
   $('#<?php echo $dhtrigger?>>ul').slick({  //use div to avoid gridcol2
 
         infinite: true,
              slidesToShow: <?php echo $cus_columns;?>,
              slidesToScroll: 1,
              autoplay:true,
              autoplaySpeed: 2000,
                responsive: [                                   
                  {
                    breakpoint: 800,
                    settings: {
                      slidesToShow: 3,
                    }
                  },
                  {
                    breakpoint: 480,
                    settings: {
                      slidesToShow: 2,
                    }
                  }
                  ]

 });
});
</script>
<?php 
}
?>

