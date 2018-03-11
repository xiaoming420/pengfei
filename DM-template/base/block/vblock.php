
 <?php 
 global $andlangbh;global $curstyle;
    $sqlall="select * from ".TABLE_BLOCK." where pidname='$pidname'   $andlangbh  order by id desc limit 1";
  // echo $sqlall;
    if(getnum($sqlall)>0){
        $v = getrow($sqlall);
      //  pre($v);
 
$cus_columns=$cus_coldivi=$cus_showkvsm=$cus_cirimg=$cus_imgzoom=$cus_showmorebtn=$cus_bxpager='n';
$cus_substrnum=0;
$cus_bxwidth=300;  $cus_bxlinenum=3; 
 
    
  /*
  $arr_can=$v['arr_can'];

$bscntarr = explode('==#==',$arr_can); 
     if(count($bscntarr)>1){
          foreach ($bscntarr as   $bsvalue) {
             if(strpos($bsvalue, ':##')){
               $bsvaluearr = explode(':##',$bsvalue);
               $bsccc = $bsvaluearr[0];
               $$bsccc=$bsvaluearr[1];
             }
          }
      }
    
  */   
      
    
     $tid = $v['id'];$pid = $v['pid'];$pidstylebh = $v['pidstylebh'];
     $name = $v['name'];$namefront = $v['namefront'];
$typecolumn = $v['typecolumn'];
     

     $titlestyle = $v['titlestyle'];$titlestylesub = $v['titlestylesub'];
     
      $pidfolder = $v['pidfolder']; 
      $template = $v['template'];   
      $blockid = $v['blockid'];


      $cssname = $v['cssname'];
      $cus_columns = $v['cus_columns'];$cus_substrnum = $v['cus_substrnum'];
      
       $linktitle = $v['linktitle'];$linkurl = $v['linkurl']; 
     
       $pidcate = $v['pidcate'];
        $maxline = $v['maxline'];    if($maxline<1) $maxline=1;
       
   $bgcolor = $v['bgcolor']; 
   $blockimg = $v['blockimg'];
   $kv = $v['kv'];
     
    

$cus_cirimgv = $cus_cirimg=='y'?' cirimg':'';
$cus_imgzoomv = $cus_imgzoom=='y'?' zoomimgwrap':'';
$cus_columnsv = ' '.get_css_gridcol($cus_columns);
$cus_columnsvBoot = ' '.get_css_gridcolBoot($cus_columns);

//$css_colborderv = $cus_colborder=='y'?' gridboxshadow':'';
$cus_coldiviv = $cus_coldivi=='y'?' gridcol2divi':''; 
 
$cssname = $cssname.' '.$cus_cirimgv.$cus_imgzoomv.$cus_coldiviv;
 
 

 
  $bxauto= 'true';
if(is_int(strpos($cssname,'bxstop'))) $bxauto= 'false'; 
  $bxtitle= 'false';
if(is_int(strpos($cssname,'showtitle'))) $bxauto= 'true'; 
 
 $dhtrigger = 'slick'.rand(1000,9999);  
 
   $bgvideo= 'n';
 if(is_int(strpos($cssname,'bgvideo'))) $bgvideo= 'y';


 
$linkurlv ='';
$linktitle = $linktitle<>''?$linktitle:'查看详情 >';

  
    
 
    $despjj = decode($v['despjj']);
    $desp= web_despdecode($v['desp']);
      $desptext= web_despdecode($v['desptext']);
      $despv='';
      if($desptext<>'') $despv = $desptext;
      else  $despv = $desp;

 //echo $pidstylebh;
 //echo $curstyle;

 if($typecolumn=='column'){
     $req_file = TPLBASEROOT.'block/'.$template.'.tpl.php'; 
       $req_name ='base/block/'.$template.'.tpl.php';  
 }
 else{     
       
         $req_file = TPLBASEROOT.'block/'.$pid.'/'.$template; 
         $req_name ='base//block/'.$pid.'/'.$template;  

 }
    
       if(is_file($req_file)) require $req_file;
       else echo '<p style="background:#ccc;color:red">没有此文件: '.$req_name.' </p>';

           
}
else { echo '<p>暂无内容，找不到区块： '.$pidname.'</p>';}
?>


