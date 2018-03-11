  <?php 

//---获取数据-------------
 if($maxline<3) alert('提示：此效果，记录数必须>=3');
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
 <div id="<?php echo $dhtrigger?>" class="news_scroll <?php   echo $cssname;?>"> 
 
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
    

 $despv =  get_nodedespjj($v['despjj'],$v['desp'],$v['desptext'],$cus_substrnum);



 $arrdate = explode("-",$dateday);
 $year = @$arrdate[0];
 $month = intval(@$arrdate[1]);
 


$Month_E = array(1 => "Jan",
        2 => "Feb",
        3 => "Mar",
        4 => "Apr",
        5 => "May",
        6 => "Jun",
        7 => "Jul",
        8 => "Aug",
        9 => "Sep",
        10 => "Oct",
        11 => "Nov",
        12 => "Dec");

    $monthen = @$Month_E[$month];
     
 
   ?>


<li class="listgd">
     <div class="boxcol col_1f6">         
            <div class="circle">
            <div class="date"><?php echo $year?><br /><?php echo $monthen?>             
            </div>    
            </div>
          </div>
          <div class="boxcol col_5f6">
          
          
                  <?php 
            			if($cus_showkvsm=='y'){
            		?>
                         <div class="img">
                          <a href="<?php echo $linkurl?>"><img class="mt10" src="<?php echo $imgv?>"  alt="<?php echo $title?>"></a>
                        </div>
            		<?php 
            			}
            		?>
                        <div class="text">
                          <h4><a href="<?php echo $linkurl?>"><?php echo $title?></a></h4>    
            			  
                         <div class="desp"><?php echo $despv?> </div>
            			  
                          <?php 
                            if($cus_showmorebtn=='y'){ //为了保证grid的高度，这里的按钮，要不全有，要不全不要。所以不能用linkurl来判断。
                          ?>
                          <div class="dmbtn mt10 <?php echo $linkClass;?>">
                             <a class="more"  <?php echo linktarget($linkurl);?> href="<?php echo $linkurl?>"><?php echo $linktitle;?> > </a>
                          </div>              
                           <?php 
                           }
                          ?>
                        </div>
                        
            
        
            
            
            
          </div>      
  </li> 
   <?php
        }
   ?>    

  </ul>
</div> 



 <?php 
if(is_int(strpos($cssname,'sliderenable'))=='y'){
?>
  <script>
$(function(){
  
   $('#<?php echo $dhtrigger?>>ul').slick({  //use div to avoid gridcol2
 
         infinite: true,
              slidesToShow: <?php echo $cus_columns;?>,
              slidesToScroll: <?php echo $cus_columns;?>,
               autoplay:true,
              vertical:true, 
              dots: true, 
              arrows: false,              
 });
});
</script>
<?php 
}
?>

