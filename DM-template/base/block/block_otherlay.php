<?php
/*
	欢迎使用DM企业建站系统，本系统由www.demososo.com开发。
*/
if(!defined('IN_DEMOSOSO')) {
	exit('this is wrong page,please back to homepage');
}
//when in layout,use this file to render,like group,ndli etc, different from region.
 
 
 // <div  class="block" data-effect="<php echo $effect>">  
 $pidnameeditlink = $pidname;
?>

 <div  class="block" data-effect="<?php echo $effect?>">   <?php //block is for hover edit link...?>
  <?php 

 //echo $reqfile;	
  if($reqfile=='imgfj') {//no cancel ,because other region(no banner) use it ,banner will limit height
  //if banner,reset in page.php
        echo '<img src="'.UPLOADPATHIMAGE.$pidname.'" alt="" />';

     //if(isdmmobile()) echo '<div class="bannerimg perimgwrap"><img src="'.UPLOADPATHIMAGE.$pidname.'" alt="" /></div>';
    /// else echo '<div class="bannerimg" style="background:url('.UPLOADPATHIMAGE.$pidname.') center center no-repeat"></div>';
   } 
   else {     
    
        if($edittype=='prog') $reqfile2 = TPLBASEROOT.$reqfile;
        else if($edittype=='video') $reqfile2 = EFFECTROOT.'video/'.$reqfile;
        else if($edittype=='album') $reqfile2 = EFFECTROOT.$reqfile;
        else if($edittype=='form') $reqfile2 = EFFECTROOT.'form/'.$reqfile;
        else $reqfile2 = EFFECTROOT.$reqfile;

// echo $reqfile2;
   		 if(is_file($reqfile2)) require $reqfile2;//go to vblock.php
   		 else echo '<p style="background:#ccc;color:red">没有此文件: '.$reqfile2.' </p>';
	 }


 ?>

<?php 

if(dmlogin()){ //is in func_block. bec declare.bec this file repeat require
  
    if($edittype=='vblock') dmeditlink($pidnameeditlink,'','vblock');
    if($edittype=='imgfj') dmeditlink($pidnameeditlink,'','imgfj');
    if($edittype=='prog') dmeditlink($pidnameeditlink,'','prog');   
  // if($edittype=='fefile') dmeditlink($reqfile,'','fefile');
     if($edittype=='video') dmeditlink($pidnameeditlink,'','video');
     if($edittype=='album') dmeditlink($pidnameeditlink,'','album');
     if($edittype=='form') dmeditlink($pidnameeditlink,'','form');
}
?>
 </div>