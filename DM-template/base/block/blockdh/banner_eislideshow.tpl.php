  <?php 

//---获取数据-------------
$sqlwhere = get_node_sqlv($pidcate);
$sqlnode="select * from ".TABLE_NODE." where  sta_visible='y' $andlangbh  $sqlwhere  order by pos desc,id desc limit $maxline";
$fenum = getnum($sqlnode);
if($fenum==0) { 
	echo '没有记录。 '.$pidcate;
$result = array();
}
else  $result = getall($sqlnode);


?>

<?php
edit_fenode($pidcate);//用来在前台编辑后台。
?>

<div class="eisliderwrap">
        <!---start-image-slider---->
    <div class="image-slider">
         <div id="ei-slider" class="ei-slider">
           <ul class="ei-slider-large">			                    
				<?php			 
				 foreach($result as $v){
				 	    $title = $v['title'];$linkurl = $v['linkurl']; 
				        $imgv =  get_img_def($v['kv']);//大图片
				        $despv =  get_nodedesp($v['desp'],$v['desptext']);
				        $linkurlarr =  get_nodelinkurl($linkurl);
				 ?>  
	            <li>
	                <?php echo $linkurlarr[0];?>
	                <img src="<?php echo $imgv;?>" alt="<?php echo $title;?>"/>
	                <?php echo $linkurlarr[1];?>
	                <div class="ei-title">
	                   <?php echo $despv;?>
	                </div>
	            </li>
	          <?php }?>                         
            </ul><!-- ei-slider-large -->

            <ul class="ei-slider-thumbs">
                <li class="ei-slider-element">Current</li>
                <?php 
			          foreach($result as $v){
			                $title = $v['title'];
					        $imgvsm =  get_img_def($v['kvsm']); //小图片
					        $despjj = $v['despjj'];//副标题
			             
			               ?>  
			            <li>
			              <a href="#">
			                <span><?php echo $title?></span>
			                <p><?php echo $despjj?></p> 
			              </a>
			              <img src="<?php echo $imgvsm?>" alt="<?php echo $title?>" />
			            </li>
			      <?php 
			            }
			        ?>
              </ul><!-- ei-slider-thumbs -->
      </div><!-- ei-slider -->
</div>
    <!---End-image-slider---->  
</div>
 
<?php 
getCssSingle(TPLBASEPATH.'assets/vendor/eislideshow/eislideshow.css');
getJsSingle(TPLBASEPATH.'assets/vendor/eislideshow/eislideshow.js');
?>
 
 <script type="text/javascript">
     $(function() {
                $('#ei-slider').eislideshow({
			          animation     : 'center', //sides  center
			          autoplay      : true,
			          slideshow_interval  : 3000,
			          titlesFactor    : 0
                });
    });     

   </script>

