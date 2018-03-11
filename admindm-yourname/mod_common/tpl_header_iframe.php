<?php 
$adminstyle = @$_COOKIE['mbadmin'];	

if($adminstyle=='y'){
	require_once HERE_ROOT.'mod_commonLTE/tpl_headLTE.php';
 
}
else{

require_once HERE_ROOT.'mod_common/tpl_headPC.php';
 
}
?>