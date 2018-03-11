<?php
//adminfrom.php?to=';alert(1);//
 
function htmlentitdm2($v){   
   return htmlentities(trim($v),ENT_QUOTES,"utf-8");
}//end func


$to = htmlentitdm2(@$_GET['to']);
$mb = htmlentitdm2(@$_GET['mb']);
$tov = htmlentitdm2(@$_GET['tov']);


if($to=='colordemo') $to = 'dmpostform.php?type=colordemo&mb='.$mb;
else if($to=='previewofndlist') {
	//adminfrom.php?to=previewofndlist&tov=ndlist20160713_0526137228=en
	//ndlist20160713_0526137228=en
 // echo $tov;
 // exit;
  $toarr = explode('=', $tov);

  //if($toarr[1]=='cn') 	$to = 'dmpostform.php?type=previewofndlist&pidname='.$toarr[0];
  //else $to = $toarr[1].'/dmpostform.php?type=previewofndlist&pidname='.$toarr[0].'&lang='.$toarr[1];

  $to = 'dmpostform.php?type=previewofndlist&pidname='.$toarr[0].'&lang='.$toarr[1];

}
else {

if($to=='') $to='index.html';

}


  //print_r($to);
 

?>
<script>
  window.location.href='<?php echo $to?>';
</script>
 