 <?php 
 //参数配置
 
//fecheck_cateid($pidcate); //本模板的分类标识  $pidcate 必须是主分类的标识

$css_gridcol = get_css_gridcol($cus_columns);
 
//---获取数据-------------
$sql = "SELECT * from ".TABLE_CATE." where pid='$pidcate' and alias_jump=''  and sta_visible='y' $andlangbh order by pos desc,id limit $cus_columns";
$fecatenum = getnum($sql);
 
if($fecatenum==0) echo '没有cate记录。'.$pidcate;
else  $result_cate = getall($sql);

?>

<?php
edit_fenode($pidcate);//用来在前台编辑后台。
?>

<div class="tabs_wrapper <?php echo $cssname;?>">
                       

    <div class="tabs_switch tabs_switchcss">
      <?php 
        if($fecatenum>0){
          foreach ($result_cate as $k => $v) {
             $name = decode($v['name']); $pidname = $v['pidname'];
            ?>
             <div  class="tabs_item <?php echo $k==0?'active':''?>"><?php echo $name;?></div>        
     <?php
          }
        }
      ?> 
    </div>


 <div class="tabs_content">
    
      <?php 
        if($fecatenum>0){
          foreach ($result_cate as $kc => $vc) {
 
              $pidname = $vc['pidname'];
             
              if($kc<>0)   $displayv ='style="display:none"';
              else $displayv = '';
          
   echo  '<div class="tabs_container" '.$displayv.'>';

              $sqlnode="select * from ".TABLE_NODE." where pid='$pidname' and sta_visible='y' $andlangbh  order by pos desc,id desc limit $maxline";
              $fenum = getnum($sqlnode);
              if($fenum>0)  {

                  $result = getall($sqlnode); 
                 foreach ($result as $k => $v) {
                        $tid = $v['id']; 
                        $title = $v['title'];   
                        $pidnamec = $v['pidname'];   
                        $alias=alias($pidnamec,'node');
                        $alias_jump = $v['alias_jump'];                        
                        $linkurl = url('node',$alias,$tid,$alias_jump); 
                        $imgv =  get_img_def($v['kv']);
                      
                        $despv =  get_nodedesp($v['desp'],$v['desptext']);
 
                      // $linkurlarr =  get_nodelinkurl($linkurl);
 
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
         
            </div>
     </div>


                        <?php

     
                       } //end foreach
                     }
 echo '</div>';
              }
          }
 ?>

             
  </div><!--end tab_content-->

   </div>
 