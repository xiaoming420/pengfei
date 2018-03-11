<?php
if(!defined('IN_DEMOSOSO')) {
	exit('this is wrong page,please back to homepage');
}
?>




<?php
if($albumposi<>'y') require_once PARTROOT.'album.php';
?>
<div class="content_desp">
<?php

//download
if($downloadurl<>'') detail_downloadurl($downloadurl);

//video 
if($videoaddress<>'') require_once(PARTROOT.'plugin_detailvideo.php');

echo  $despv;

?>
</div>
<?php 
 
if($albumposi=='y') require_once PARTROOT.'album.php';
 
/* use for when has alias,then page-id not access,now it is not reasonable.so alias and page-id both use...
if($alias<>'')
{
if($page<>1)  jump($var404);
}*/
//page default is 1 by set in htaccess
?>