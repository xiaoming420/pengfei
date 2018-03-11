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

        $ss = "SELECT * from ".TABLE_NODE." where  pid='$pidnamemain'  $andlangbh  order by id"; 
        $num = getnum($ss);
        if($num>0)   $namemain =  '<a href="'.$jumpv.'&catid='.$pidnamemain.'">'.$namemain.'('.$num.')</a>';
        else $namemain =  $namemain.'('.$num.')';
       
        echo '<li>';
        echo '<h3>'.$namemain.'  </h3>';
      
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

        $ss2 = "SELECT * from ".TABLE_NODE." where  pid='$pidname'  $andlangbh  order by id"; 
        $num2 = getnum($ss2);
        if($num2>0)   $name =  '<a href="'.$jumpv.'&catid='.$pidname.'">'.$name.'('.$num2.')</a>';
        else $name =  $name.'('.$num2.')';

      
 
       echo '<li>';
        echo '<h3> '.$name .' </h3>';
      
          
//----if sub sub cat------------------------
         $sqlsub_sub = "SELECT  *  from ".TABLE_CATE." where  pid='$pidname' $andlangbh order by pos desc,id";   
         $row_sub = getall($sqlsub_sub);
    


  
      //----if sub sub cat------------------------       
         if($row_sub<>'no'){
           echo '<ul>';
              foreach($row_sub as $v2_sub){
           $nameSub=decode($v2_sub['name']);   
           $subpidname=$v2_sub['pidname'];

        $ss3 = "SELECT * from ".TABLE_NODE." where  pid='$subpidname'  $andlangbh  order by id"; 
        $num3 = getnum($ss3);
        if($num3>0)   $nameSub =  '<a href="'.$jumpv.'&catid='.$subpidname.'">'.$nameSub.'('.$num3.')</a>';
        else $nameSub =  $nameSub.'('.$num3.')';


           
          echo '<li>';
          echo '<h3> '.$nameSub.' </h3>';
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