<?php
 $sqlmain = "SELECT * from ".TABLE_CATE." where  pid='0' and modtype='node' $andlangbh order by pos desc,id";
 $rowlistmain = getall($sqlmain);
 if($rowlistmain=='no') {
  echo '<p>&nbsp;&nbsp;还没有分类，请添加...</p>';
  }
  else{

  echo '<ul class="seolist ">';
   foreach($rowlistmain as $vmain){
        $pidnamemain=$vmain['pidname'];  
        $namemain='<strong>'.decode($vmain['name']).'</strong>';  
         $seo1=spangray(decode($vmain['seo1'])); 
          $seo2=spangray(decode($vmain['seo2'])); 
          $seo3=spangray(decode($vmain['seo3'])); 

          $seoedit = ' &nbsp;&nbsp;<a class="needpopup" href="'.$jumpv_seoedit.'&pidname='.$pidnamemain.'&type=cate">修改SEO</a> | ';
 $alias = alias($pidnamemain,'cate');
  if($alias<>'') $alias =  '( '.spangray($alias).' )';
   else $alias='';
 $aliasedit = ' <a class="needpopup" href="'.$jumpv_aliasedit.'&pidname='.$pidnamemain.'&type=cate">修改别名</a>'.$alias;


        echo '<li>';
        echo '<h3> '.$namemain.$seoedit.$aliasedit.' </h3>';
        echo '<div class="tdk">title: '.$seo1.'<br />descriptiton: '.$seo2.'<br />keywords: '.$seo3.'</div>';


 $sqlsub = "SELECT * from ".TABLE_CATE." where  pid='$pidnamemain' $andlangbh order by pos desc,id";
 $rowlistsub = getall($sqlsub);
 if($rowlistsub=='no') {
  echo '<p>&nbsp;&nbsp;还没有子分类，请添加...</p>';
  }
  else{
  ?>
 
 <?php
 echo '<ul class="seolist seolistcate">';
   foreach($rowlistsub as $vsub){
          
       $pidname=$vsub['pidname'];  
       $name='<strong>'.decode($vsub['name']).'</strong>'; 
       $seo1S=spangray(decode($vsub['seo1'])); 
       $seo2S=spangray(decode($vsub['seo2'])); 
       $seo3S=spangray(decode($vsub['seo3']));  

       $seoedit2 = ' &nbsp;&nbsp;<a class="needpopup" href="'.$jumpv_seoedit.'&pidname='.$pidname.'&type=cate">修改SEO</a> | ';
        $alias2 = alias($pidname,'cate');
        if($alias2<>'') $alias2 =  '( '.spangray($alias2).' )';
        else $alias2='';
        $aliasedit2 = ' <a class="needpopup" href="'.$jumpv_aliasedit.'&pidname='.$pidname.'&type=cate">修改别名</a>'.$alias2;  

       echo '<li>';
        echo '<h3> '.$name.$seoedit2.$aliasedit2.' </h3>';
        echo '<div class="tdk">title: '.$seo1S.'<br />descriptiton: '.$seo2S.'<br />keywords: '.$seo3S.'</div>';

    
          
//----if sub sub cat------------------------
         $sqlsub_sub = "SELECT  *  from ".TABLE_CATE." where  pid='$pidname' $andlangbh order by pos desc,id";   
         $row_sub = getall($sqlsub_sub);
    


  
      //----if sub sub cat------------------------       
         if($row_sub<>'no'){
           echo '<ul>';
              foreach($row_sub as $v2_sub){
           $nameSub=decode($v2_sub['name']);   
           $subpidname=$v2_sub['pidname'];
           $seo1sub=spangray(decode($v2_sub['seo1']));  
           $seo2sub=spangray(decode($v2_sub['seo2']));  
           $seo3sub=spangray(decode($v2_sub['seo3']));   

         $seoedit3 = ' &nbsp;&nbsp;<a class="needpopup" href="'.$jumpv_seoedit.'&pidname='.$subpidname.'&type=cate">修改SEO</a> | ';
         $alias3 = alias($subpidname,'cate');
        if($alias3<>'') $alias3 =  '( '.spangray($alias3).' )';
        else $alias3='';
         $aliasedit3 = ' <a class="needpopup" href="'.$jumpv_aliasedit.'&pidname='.$subpidname.'&type=cate">修改别名</a>'.$alias3;    
 
          echo '<li>';
          echo '<h3> '.$nameSub.$seoedit3.$aliasedit3.' </h3>';
          echo '<div class="tdk">title:'.$seo1sub.'<br />descriptiton:'.$seo2sub.'<br />keywords:'.$seo3sub.'</div>';
          echo '</li>';
               
        }
         echo '</ul>';
         



  }
  echo '</li>';
  }
  echo '</ul>';
}
//--------------
echo '</li>';
}
echo '</ul>';
}

?>