  <?php 

//---获取数据-------------
$sqlwhere = get_node_sqlv($pidcate);
$sqlnode="select * from ".TABLE_NODE." where  sta_visible='y' $andlangbh  $sqlwhere  order by pos desc,id desc limit $maxline";
$fenum = getnum($sqlnode);
if($fenum==0) echo '没有记录。 --'.$pidcate;
else  $result = getall($sqlnode);

 $dhtrigger = 'slider'.rand(1000,9999); 
   
?>

<?php
edit_fenode($pidcate);//用来在前台编辑后台。
?>

 <div id="<?php echo $dhtrigger;?>" class="blockbox <?php echo $cssname;?>">
     
      <?php 
      foreach($result as $v){
       $tid = $v['id'];
        $title = $v['title'];
        $pidname = $v['pidname'];$alias_jump = $v['alias_jump'];
        $imgv =  get_img_def($v['kvsm']);
       
        $despv =  get_nodedespjj($v['despjj'],$v['desp'],$v['desptext'],$cus_substrnum);       

 
        $alias=alias($pidname,'node');  
         $linkurl = url('node',$alias,$tid,$alias_jump);
        

    ?>
     <div class="boxcol <?php echo $cus_columnsvBoot;?>">
             <div class="img">
              <a <?php echo linktarget($linkurl);?>  href="<?php echo $linkurl;?>">                  
              <img class="mt10" src="<?php echo $imgv?>"  alt="<?php echo $title?>"> 
				 <?php 
					if($bgvideo=='y')  echo '<div class="bgvideoarrow"></div>';
						//echo '<i class="fa fa-play-circle-o"></i>';
				 ?>
            </a>

			  
            </div>

             <div class="text">
              <h4 class="tc"><?php echo $title?></h4>    
			       <?php 
              if($cus_substrnum>0) echo '<div class="desp">'.$despv.'</div>';
             ?>             
			  
              <?php 
                if($cus_showmorebtn=='y'){ //为了保证grid的高度，这里的按钮，要不全有，要不全不要。所以不能用linkurl来判断。
              ?>
              <div class="dmbtn mt10   <?php echo $linkClass;?>">
                 <a <?php echo linktarget($linkurl);?>  class="more"  <?php echo linktarget($linkurl);?> href="<?php echo $linkurl?>"><?php echo $linktitle;?> > </a>
              </div>              
               <?php 
               }
              ?>
            </div>
     </div>
  <?php
}
?>
 
</div>

 
 

<?php 
if(is_int(strpos($cssname,'sliderenable'))=='y'){
?>
 <script>
$(function(){
    
   $('#<?php echo $dhtrigger?>').slick({ 
 
         infinite: true,
              slidesToShow: <?php echo $cus_columns;?>,
              slidesToScroll: 1,
              autoplay:true,
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
