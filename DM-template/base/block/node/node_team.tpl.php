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

  <ul class="boxteameffect <?php echo $cssname;?>">
          <?php 
              foreach ($result as $k => $v) {
				  
				   $tid = $v['id'];
                     $title = $v['title'];  $alias_jump = $v['alias_jump']; 
                      
                      $pidname=$v['pidname']; $alias=alias($pidname,'node');  
					  
                      $linkurl = url('node',$alias,$tid,$alias_jump);

                       
					 $imgv =  get_img_def($v['kvsm']); 
            $titlebz1 =  $v['titlebz1']; 
				    $despjj =  get_nodedespjj($v['despjj'],$v['desp'],$v['desptext'],$cus_substrnum);
					// $despv =  get_nodedesp($v['desp'],$v['desptext']);
						  
               ?>
            <li  class="boxcol <?php echo $cus_columnsvBoot?>"> 
              <!-- profile item-->
              <div class="profile-item tc">
                <div class="pic">
                  <div class="img_cont">
				  <img src="<?php  echo $imgv;?>" alt="<?php echo $v['title']?>" />
				  </div>
                  <div class="hover-effect"></div>
                  <div class="ourteam_content">
                    <div class="title_wrap">
                      <h3 class="title"><a href="<?php echo $linkurl;?>"><?php echo $v['title']?></a></h3>
                      <div class="positions"> [ <?php echo $titlebz1;?> ] </div>
                    </div>
                        <?php 
                        if($cus_showmorebtn=='y'){ //为了保证grid的高度，这里的按钮，要不全有，要不全不要。所以不能用linkurl来判断。
                      ?>
                      <div class="dmbtn mt10   <?php echo $linkClass;?>">
                         <a class="more"  <?php echo linktarget($linkurl);?> href="<?php echo $linkurl?>"><?php echo $linktitle;?> > </a>
                      </div>              
                       <?php 
                       }
                      ?>
                         
                    
                    
                   
                  </div>
                </div>
              </div>
              <!-- ! profile item-->
            </li>
            <?php 
              }
            ?>
  </ul>