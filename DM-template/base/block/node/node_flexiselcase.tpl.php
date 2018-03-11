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

<!-- quotes -->
    <div class="quotes" style="background-image:url(<?php echo get_img_def($blockimg);?>)">
        <div class="container">
            <h3><span>客户满意</span> 高于一切</h3>
        </div>
    </div>
 
        <ul id="flexiselDemo1"> 
          <?php
                foreach ($result as $k => $v) {
                    $tid = $v['id'];
                     $title = $v['title'];  $alias_jump = $v['alias_jump']; 
                      $linktitle = $v['linktitle']; 
                   
                      $pidname=$v['pidname']; $alias=alias($pidname,'node');  
					  
                      $linkurl = url('node',$alias,$tid,$alias_jump);

                       
						 $imgv =  get_img_def($v['kvsm']); 
				          $despjj =  get_nodedespjj($v['despjj'],$v['desp'],$v['desptext'],$cus_substrnum);

						
             
               ?>
            <li>
                <div class="w3layouts_event_grid">
                    <div class="w3_agile_event_grid1">
                        <img src="<?php echo $imgv?>" alt=" " class="perimg100"  />                      
                    </div>
                    <div class="agileits_w3layouts_event_grid1">
                        <h3><a href="<?php echo $linkurl?>"><?php echo $title?></a></h3>
                        <p><?php echo $despjj?></p>
                    </div>
                </div>
            </li>
            <?php
                    }
            ?>
        </ul>
    
<?php 
getJsSingle(TPLBASEPATH.'assets/vendor/singlejs/jquery.flexisel.js');
?>
    <script>
$(function(){

   $("#flexiselDemo1").flexisel({
                visibleItems: <?php echo $cus_columns;?>,
                animationSpeed: 1000,
                autoPlay: true,
                autoPlaySpeed: 3000,            
                pauseOnHover: true,
                enableResponsiveBreakpoints: true,
                responsiveBreakpoints: { 
                    portrait: { 
                        changePoint:480,
                        visibleItems: 1
                    }, 
                    landscape: { 
                        changePoint:640,
                        visibleItems:2
                    },
                    tablet: { 
                        changePoint:768,
                        visibleItems: 3
                    }
                }
            });
            
            
            
            
 
});
</script>
