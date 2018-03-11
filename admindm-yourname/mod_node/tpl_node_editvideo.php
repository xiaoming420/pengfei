<?php 


  //mod_video/mod_video.php?lang=cn&type=block&act2=&pidname=video20180124_1938124687&act=edit
  echo $videoid;
  $jsname = $videoid;
 
  if($videoid<>''){
  $del_text= " <a href=javascript:del('delvideo','$videoid','$jumpv_file','$jsname')  class=but2><i class='fa fa-trash-o'></i> 删除</a>";
 echo $del_text;
  }
 

  if($videoid<>'')   $framesrc='../mod_video/mod_video.php?pidname='.$videoid.'&lang='.LANG.'&type=node&act=edit&act2=headless';
  else  $framesrc='../mod_video/mod_video.php?pid='.$pidname.'&lang='.LANG.'&type=node&act=edit&act2=headless';

  //$framesrc='../mod_video/mod_video.php?pid='.$pidname.'&lang='.LANG.'&type=page&act=edit&act2=headless';

  //echo $framesrc;
  iframepage($framesrc);



?>