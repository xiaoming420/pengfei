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

<?php 
$stylev ='';
if($bgcolor<>''){ 
if(is_int(strpos($bgcolor,'/'))){
	$bgimgv = ' url('.UPLOADPATHIMAGE.$bgcolor.') center bottom no-repeat;';
	$bgsize = 'background-size:cover;';	
   $stylev =' style="background:'.$bgimgv.$bgsize.' ';
}
else{
   $stylev =" style='background:$bgcolor' ";
}
}

?>

<div class="gridservices <?php echo $cssname?>" <?php echo $stylev ?>>
			<div class="container">
			   <div class="gridheader">
			  
						 <h2 class="title"><?php echo $namefront?></h2>
						<div class="desp">	<?php echo $despjj?>	 </div>
			</div>
			</div>

			<div class="container">
			<ul class="gridtext"> 
<?php
 
foreach($result as $k=>$v){

          $title = $v['title'];$linkurl = $v['linkurl'];//$iconimg = $v['iconimg'];
        $imgv =  get_img_def($v['kv']);
        
        $despv =  get_nodedesp($v['desp'],$v['desptext']);
     //$linkurlarr =  get_nodelinkurl($linkurl);
 
 
?>

					<li class="<?php echo $cus_columnsv;?>">
					 <div class="textinc">						
							<div class="img">
								<a href="<?php echo $linkurl?>" >
								<img src="<?php echo $imgv?>" alt="<?php echo $title?>" class="img-responsive zoomimg">
								</a>
							</div>
							<div class="text">
								<h3 class="title"><?php echo $title?></h3>
								<div class="desp">	
									<?php echo $despv?>
								</div>	
								<div class="moreother">
									<a href="<?php echo $linkurl?>">
									查看更多  
									<i class="fa fa-arrow-circle-o-right fa-lg" aria-hidden="true"></i>
									</a>
								</div>
							</div>
						</div>
					</li>

<?php 
}
?>
</ul>			 
 </div>
</div> 
