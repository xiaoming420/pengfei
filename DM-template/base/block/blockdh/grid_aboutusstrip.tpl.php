 <?php 

//---获取数据-------------
$sqlwhere = get_node_sqlv($pidcate);
$sqlnode="select * from ".TABLE_NODE." where  sta_visible='y' $andlangbh  $sqlwhere  order by pos desc,id desc";
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

<div class="oddabout">
<ul> 
<?php
 
foreach($result as $k=>$v){

          $title = $v['title'];$linkurl = $v['linkurl'];//$iconimg = $v['iconimg'];
        $imgv =  get_img_def($v['kv']);
        
        $despv =  get_nodedesp($v['desp'],$v['desptext']);
     //$linkurlarr =  get_nodelinkurl($linkurl);

 if ($k%2==0) {
 	$bgv = 'line1';
 	 
 }
 else  {
 	$bgv = 'line2';
 	 
 }

 
 
?>
	<li class="<?php echo $bgv?>">
		<div class="container">
				<?php
					 if ($k%2==0) {
				?>
					<div class="col-md-8 text">
						 <div class="title"><?php echo $title?></div>
						<div class="desp">
							<?php echo $despv?>
							</div>

						<div class="moreother">
						<a href="<?php echo $linkurl?>">
							  查看更多
							 <i class="fa fa-arrow-circle-o-right  fa-lg" aria-hidden="true"></i></a>
						</div>
					</div>


					<div class="col-md-4 img">
						<a href="<?php echo $linkurl?>" >
						<img src="<?php echo $imgv?>" alt="<?php echo $title?>" class="img-responsive zoomimg">
						</a>
					</div>
				<?php
				 }
					else {
				?>
 
					<div class="col-md-4 img">
						<a href="<?php echo $linkurl?>" >
						<img src="<?php echo $imgv?>" alt="<?php echo $title?>" class="img-responsive zoomimg">
						</a>
					</div>

					<div class="col-md-8 text">
						<div class="title"><?php echo $title?></div>
						<div class="desp">
							<?php echo $despv?>
							</div>

						<div class="moreother">
						<a href="<?php echo $linkurl?>">
							  查看更多
							 <i class="fa fa-arrow-circle-o-right  fa-lg" aria-hidden="true"></i></a>
						</div>
					</div>


				<?php
					}
				?>
 

				</div>
			</li>
 
<?php 
 
 }
  ?>  

 </ul></div>
