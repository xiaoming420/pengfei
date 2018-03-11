<?php
/*
	power by JASON.ZHANG  DM建站  www.demososo.com
*/
if(!defined('IN_DEMOSOSO')) {
	exit('this is wrong page,please back to homepage');
}

  if(!in_array($imgtype,$attach_type))//如果不存在能上传的类型
  {
  alert('出错，格式不支持。');echo $backlist;exit;
  }
 if($attach_size<$imgsize)
  {
  alert('出错，文件超出允许的大小。');echo $backlist;exit;
  }
  //echo UPLOADROOTIMAGE;
 $saveimgdir = UPLOADROOTIMAGE.$uploaddir;
   if(!is_dir($saveimgdir))
    {
 alert('出错，保存文件的目录不存在。');exit;
    }
 
	
 // echo strlen('y1010/20101007_1120501091.jpg');exit;is 29 jpeg is 30
 //echo '$imgsqlname:'.$imgsqlname;
   if($imgsqlname<>'') $return_v=$imgsqlname;//edit img
	 else   $return_v = $uploaddir.date("Ymd_His").'_'.rand(1000,9999).'.'.$imgtype; //echo "== $return_v =";
	 
    $imgdate2 = UPLOADROOTIMAGE.$return_v;//need to root folder;
	
 //echo $imgdate2.'<br>';
	
   //echo '===='.$imgsqlname;exit;
//echo $_FILES["addr$i"]["tmp_name"].'<br>';;
    move_uploaded_file($_FILES["addr$i"]["tmp_name"],$imgdate2);
    //small img
    if($up_add_s=='y'){
       $imgfirstpart= gl_img_s($imgdate2,$imgtype);
        $addrrr_sm=$imgfirstpart. "_s.".$imgtype;
        $return_v_s='';
    }
    else{
       $return_v_s = $return_v;   
       $addrrr_sm = UPLOADROOTIMAGE.$return_v_s;   

    }
  
  //echo $imgdate2.'<br>';;

 //echo $addrrr_sm;

 if($up_small=='y'){
          require("../plugin/upload_imgsm.php");
     }
    if($up_water=='y') { require("../plugin/upload_water.php");}
  
   if($up_delbig=='y'){unlinkdm($imgdate2);}
   

    ?>