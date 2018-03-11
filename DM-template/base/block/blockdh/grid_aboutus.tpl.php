  <?php 

//---获取数据-------------
//$sqlwhere = get_node_sqlv($pidcate);
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
<div class="gridaboutus <?php echo $cssname;?>">     
      <?php 
      foreach($result as $v){       
        $title = $v['title'];
        $linkurlhere = $v['linkurl'];
        $imgv =  get_img_def($v['kv']); 

		    $despv =  get_nodedesp($v['desp'],$v['desptext']);
 
       // $linkurlarr =  get_nodelinkurl($linkurl);


    ?>
        <div class="boxcol <?php echo $cus_columnsvBoot;?>">
	 
             <div class="img">
              <?php 
                if($linkurl=='y') echo '<a href="'.linktarget($linkurlhere).'">';
              ?>  
                  
              <img class="mt10" src="<?php echo $imgv?>"  alt="<?php echo $title?>">   
               <?php 
                   if($linkurl=='y') echo '</a>';
              ?>     
               
            </div>
	 
            <div class="text">
              <h4 class="tc"><?php echo $title?></h4>    
			  
             <div class="desp"><?php echo $despv?> </div>
			  
              <?php 
              
                if($linkurl=='y'){ //为了保证grid的高度，这里的按钮，要不全有，要不全不要。 
                    $linktitlev='查看详情>';
                    if($linktitle<>'') $linktitlev=$linktitle;
              ?>
              <div class="dmbtn mt10 tc">
                 <a class="more"  <?php echo linktarget($linkurlhere);?> href="<?php echo $linkurl?>"><?php echo $linktitlev;?> </a>
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

