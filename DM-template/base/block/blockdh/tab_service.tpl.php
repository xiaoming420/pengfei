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

<div class="tabs_wrapper <?php echo $cssname;?>">
                       

    <div class="tabs_switch tabs_switchcss">
      <?php 
        if($fenum>0){
          foreach ($result as $k => $v) {
            ?>
             <div  class="tabs_item <?php echo $k==0?'active':''?>"><?php echo $v['title'];?></div>        
     <?php
          }
        }
      ?> 
    </div>


  <div class="tabs_content">

             <?php 
              if($fenum>0){
                 foreach ($result as $k => $v) {
                        $title = $v['title'];   
                         $linkurl = $v['linkurl'];

                        $imgv =  get_img_def($v['kv']);
                      
                        $despv =  get_nodedesp($v['desp'],$v['desptext']);
 
                       $linkurlarr =  get_nodelinkurl($linkurl);

            ?>

        <div class="tabs_container" <?php echo $k==0?'':' style="display:none"'?>>                             
               <div class="boxcol colfull">

               <?php 
                if ($k%2==0) {
                   ?>

                        <div class="img fl col_2f5">
                              <?php echo $linkurlarr[0]?>                                  
                              <img class="mt10" src="<?php echo $imgv?>"  alt="<?php echo $title?>"> 
                              <?php echo $linkurlarr[1]?>  
                          </div>
                 
                          <div class="text  fl col_3f5">
                              <h4><?php echo $title?></h4>                        
                             <div class="desp"><?php echo $despv?> </div> 
                          </div>


                  <?php 
                 }
                 else  {
                  ?>
                       
                 
                          <div class="text  fl col_3f5">
                              <h4><?php echo $title?></h4>                        
                             <div class="desp"><?php echo $despv?> </div> 
                          </div>

                           <div class="img fl col_2f5">
                              <?php echo $linkurlarr[0]?>                                  
                              <img class="mt10" src="<?php echo $imgv?>"  alt="<?php echo $title?>"> 
                              <?php echo $linkurlarr[1]?>  
                          </div>



                  <?php                   
                 }

                ?>
                              	 
                          
              
                    </div>                              

       </div>
 
         <?php

              }
                }
          ?>
        
  </div><!--end tab_content-->

   </div>
 