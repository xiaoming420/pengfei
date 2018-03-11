 <?php 
 //参数配置
 
//fecheck_cateid($pidcate); //本模板的分类标识  $pidcate 必须是主分类的标识

$css_gridcol = get_css_gridcol($cus_columns);
 
//---获取数据-------------
$sql = "SELECT * from ".TABLE_CATE." where pid='$pidcate' and alias_jump=''  and sta_visible='y' $andlangbh order by pos desc,id limit $cus_columns";
//echo $sql;  
$fecatenum = getnum($sql);
if($fecatenum==0) echo '没有cate记录。'.$pidcate;
else  $result_cate = getall($sql);

?>

<ul class="newsgridlist <?php echo $cssname?>">
<?php 
if($fecatenum>0){

   $showimgV= 'n';
   if(is_int(strpos($cssname,'showimg'))) $showimgV= 'y'; 


 foreach($result_cate as $v){
      $tid = $v['id'];
      $name = $v['name']; 
      $pidname = $v['pidname']; 
      $pid = $v['pid'];
      $cate_level = $v['level'];
      $cate_last = $v['last'];
  
      $alias_jump = $v['alias_jump'];
      $aliascc = alias($pidname,'cate');
      $linkurl = url('cate',$aliascc,$tid,$alias_jump);

      ?>
      <li class="main boxcol <?php echo $cus_columnsvBoot;?>"><div class="boxheader">  
	      <a class="more" href="<?php echo $linkurl?>">更多></a>
       <h3><?php echo $name?></h3> 
       </div>
 
        <ul class="sublist <?php echo $cssname?>">
             <?php 
              $sqlwhere = get_node_sqlv($pidname);

              $sqlall22="select * from ".TABLE_NODE." where sta_visible='y'  $sqlwhere  $andlangbh  order by pos desc,id desc limit $maxline";
                                       // echo $sqlall22;
                if(getnum($sqlall22)>0){
                    $result22 = getall($sqlall22);
                    foreach ($result22 as $k22 => $v22) {
                           $tid=$v22['id'];
                            $title=$v22['title'];  
                            $alias_jump = $v['alias_jump']; 
                            $pidname=$v22['pidname']; $kvsm=$v22['kvsm'];   
                            $alias=alias($pidname,'node');  
                            $url = url('node',$alias,$tid,$alias_jump);

                           
                            $imgvsm  = get_img_def($kvsm);



                           if($k22==0 && $showimgV =='y') 
                           { 
                            ?>
                            <li class="first img">
                            <a  <?php echo linktarget($url);?>  href="<?php echo $url?>">
                            <img class="zoomimg" src="<?php echo $imgvsm?>" alt="<?php echo $title?>" />
                            <div class="text"><?php echo $title?></div></a></li>
                                <?php
                            }
                            else {?>
                                 <li><a <?php echo linktarget($url);?>  href="<?php echo $url?>"><?php echo $title?></a></li>
                            <?php } 

                    }
                    
                }
                else echo '<li>sorry,no result sub.</li>';

                    ?>
         </ul> 
    </li> 

 
<?php
}
?>


 

</ul>
<div class="c"> </div>
<?php }
 
?>
 

