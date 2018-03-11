<div class="container c">

<?php
/*
  欢迎使用DM企业建站系统，本系统由www.demososo.com开发。
*/
if(!defined('IN_DEMOSOSO')) {
  exit('this is wrong page,please back to homepage');
}
 if(dmlogin()){  
 echo '<title>预览</title>';

 require_once DISPLAYROOT.'a_meta.php'; 


$pidname = @htmlentitdm($_GET['pidname']);

 
//$pidname = 'ndlist20160712_1014264451';
echo '<div class="container">';
 
block($pidname);
echo '</div>';

}
else {
  echo 'sorry,pls login...';
}

?>

</div>

<p style="height:100px;padding:50px;text-align:center">
提示：个别预览可能不会有结果或不正常。这时以前台正式显示为准。
<br />
如果目录区块没有正常显示，则可能是 当前模板 没有 使用这个目录区块。
</p>

<script>
$(function(){
	$('.blockregion').show();
});

</script>




 <?php 

  if(is_file(TPLCURROOT.'display/a_head.php')) { 
	require_once TPLCURROOT.'display/a_head.php'; 
}

 
  if(is_file(TPLCURROOT.'display/a_foot.php')) { 
	require_once TPLCURROOT.'display/a_foot.php'; 
}


   require_once DISPLAYROOT.'a_footer_last_js.php';  ?>