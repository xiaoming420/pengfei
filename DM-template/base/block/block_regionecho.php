<?php 
 $bgimgattachment = 'n'; $bgimgposition = 'center center'; $sta_title_posi='center';
$linkradius ='';

$name=$v['name'];
$namebz=$v['namebz'];
 
$blockid=$v['blockid'];
 
$despjj=$v['despjj'];
 
$arr_cfg=$v['arr_cfg']; //sta_title in here,sta_name for regcommon


$bscntarr = explode('==#==',$arr_cfg); 
     if(count($bscntarr)>1){
          foreach ($bscntarr as   $bsvalue) {
             if(strpos($bsvalue, ':##')){
               $bsvaluearr = explode(':##',$bsvalue);
               $bsccc = $bsvaluearr[0];
               $$bsccc=$bsvaluearr[1];
             }
          }
      }
//--------bgimg---------------
    $bgsize = $bgposi = $bgfixed = '';
			if($bgimgattachment=='y') $bgfixed = ' fixed ';
			else $bgfixed = ' ';

			if($bgimgposition=='') $bgposi = ' center center ';
			else $bgposi = $bgimgposition;


	if($bgimg<>''){ 
				//$posv = $sta_bgpara<>''?'-20px':'center';  //no use ,judge by js
				// $bgimgvvv = substr($bgimg,0,4)=='http'?$bgimg:UPLOADPATHIMAGE.$bgimg;		
				// $bgimgv = ' url('.$bgimgvvv.') center center no-repeat';

					if(substr($bgimg,0,4)=='http') 
					  {$bgimgv = ' url('.$bgimg.') '.$bgfixed.$bgposi.' no-repeat;';					
					}
					 else {
					 	$bgimgv = ' url('.UPLOADPATHIMAGE.$bgimg.') '.$bgfixed.$bgposi.' no-repeat;';					 	 
					}
					$bgsize = 'background-size:cover;';
					 
			 
			}
			else $bgimgv = '';


if($bgcolor<>'' || $bgimg<>'' || $cssstyle<>''){
   $stylev =' style="background:'.$bgcolor.$bgimgv.$bgsize.';'.$cssstyle.'"';
}
else {$stylev = '';}

//------------------------
	if($titleimg<>''){ 
				$titleimgv = '<img src="'.UPLOADPATHIMAGE.$titleimg.'" alt="" />';
			}
			else { 
			    // $titleimgv = $titlebox<>''?$titlebox:$name;
			     $titleimgv = $name;
			}

//--------------------
$titlestylev = $titlestyle<>''?' style="'.$titlestyle.'"':'';
$titlestylesubv = $titlestylesub<>''?' style="'.$titlestylesub.'"':'';

$titlelinebottomV = ' titlelinebottom ';
$titlelinelongv ='';
if($titlelinelong=='none'){
	 $titlelinebottomV = '';
}
else $titlelinelongv = $titlelinelong<>''?' style="border-bottom:1px solid '.$titlelinelong.'"':'';

$titlelineshortv = $titlelineshort<>''?' style="background:'.$titlelineshort.'"':'';

$titlelineawev = $titlelineawe<>''?' titlelineawe':'';
//---------------------	
$linktitlev = $linktitle<>''?$linktitle:'更多>';
$linkClass = $linkcss.' '.$linksize.' '.$linkradius;
$linkurlv = $linkurl<>''?'<div class="link'.$linkposi.' dmbtn regionmore '.$linkClass.'"><a class="more"  href="'.$linkurl.'">'.$linktitlev.'</a></div>':'';



//-------------		
      ?>


<?php // class  block is for js or hover edit link?>
 <div id="region<?php echo $tid?>" class="regionwrap block <?php echo $cssname;?>" <?php echo $stylev?>>
 <?php if($sta_title=='y'){

 	?>
 <div class="regionhd regionhd<?php echo $sta_title_posi;?><?php if($sta_width_title<>'y') echo ' container';?>"> 
 <h3<?php echo $titlestylev?>><?php echo $titleimgv?></h3>
 

 <div class="titleline<?php echo $titlelineawev;?> <?php echo $titlelinebottomV;?> " <?php echo $titlelinelongv; ?>>	
    <?php if($titlelineawe==''){?>
	 <span class="titlelineshort"  <?php echo $titlelineshortv?>></span>
	 <?php } else {?>	 
	 <span class="awe"><i class="fa <?php echo $titlelineawe?>"></i></span>
	 <?php }?>	 

 </div>


<?php if($despjj<>'') {?>
 <div class="subtitle"<?php echo $titlestylesubv?>><?php echo web_despdecode($despjj)?></div>
<?php }?> 

 <?php   if($linkposi<>'belowtext') echo $linkurlv;   	?>

</div>
<?php }?>
 
 <div class="boxcontent<?php if($sta_width_cnt<>'y') echo ' container';?>">   
  <?php 
  //echo $allwidth_cntlast; 
  				//if($blockid<>'') block($blockid);
               // else echo  $despv;

  if($blockid==''){
      columnecho($v['pidname']);
  }
  else   block($blockid);



				?>
	</div>
	 <?php   if($linkposi=='belowtext') echo $linkurlv;  
	// echo $allwidth_cntlast; 
	  	?>
 
  </div>
