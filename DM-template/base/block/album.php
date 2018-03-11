<?php 
    $sqlabm = "SELECT effect,cssname  from ".TABLE_ALBUM."  where  pidname='$pidname'   $andlangbh  order by  id desc";
      //echo '==============='.$sqlabm;
$dhtrigger = 'album'.rand(1000,9999);  

    if(getnum($sqlabm)>0){
         $row = getrow($sqlabm);
         $effect = $row['effect'];$cssname = $row['cssname'];
        if($effect=='album.php') {
            echo ' 出错，效果文件不能选择 album.php';
        }
        else{
 

               $sql = "SELECT * from ".TABLE_ALBUM."  where  pid='$pidname' and sta_visible='y'   $andlangbh  order by pos desc,id desc";
                   if(getnum($sql)>0){

                       $reqfile = EFFECTROOT.'album/'.$effect; 
                       if(is_file($reqfile)) {
                          echo '<div class="albumwrap tc" '.$cssname.'>';
                            $row_abm = getall($sql);
                           echo '</div>'; 

                        require $reqfile;

                      }
                       else echo '相册效果 - base/block/album/'.$effect.' 不存在';

                   }
                   else{
                     echo  '<div class="tc p30"><img src = "'.STAPATH.'img/noimg.png" alt="此相册里没有图片" /></div>';
                   }
          }         

     
    }
    else{
        echo '出错，相册不存在。- '.$pidname;
    }


?>