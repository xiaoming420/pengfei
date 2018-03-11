<?php
/*
	取回密码
	这个文件不用删除，
	上线后，只要删除根目录下的zzgetpassword.php文件。
	admin123 对应的是  00Ko3aqrA3ETk 
*/
?>
<?php

 
  $ss = "update " . TABLE_USER . " set  ps='00Ko3aqrA3ETk'   where id='77'";
  //echo $ss;
  iquery($ss);
	
 

?>

