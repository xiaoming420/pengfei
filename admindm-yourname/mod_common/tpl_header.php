<?php 
 
$adminstyle = @$_COOKIE['mbadmin'];	
 

if($adminstyle=='y'){

	if(is_dir(HERE_ROOT.'mod_commonLTE')){
		require_once HERE_ROOT.'mod_commonLTE/tpl_headLTE.php';
		if($usertype=='normal') 
			require_once HERE_ROOT.'mod_commonLTE/tpl_header_normalLTE.php';
		else require_once HERE_ROOT.'mod_commonLTE/tpl_header_adminLTE.php';

	}
	else {
	echo '后台移动端模板，需要在 <a href="http://www.demososo.com">购买视频教程</a> 后才可以使用。';
	echo '<br /><a href="../mod_common/login.php">返回登录</a>';
	exit;
}

}
else{

require_once HERE_ROOT.'mod_common/tpl_headPC.php';
if($usertype=='normal') require_once HERE_ROOT.'mod_common/tpl_header_normal.php';
else require_once HERE_ROOT.'mod_common/tpl_header_admin.php';
}
?>