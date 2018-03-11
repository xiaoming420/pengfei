<?php
/*
  欢迎使用DM企业建站系统，本系统由www.demososo.com开发。
*/

  //pre($_POST);
   $content = @htmlentitdm($_POST['content']);
    $tokenhour = @htmlentitdm($_POST['tokenhour']);

  $ip =getip();  


      $sql = " SELECT *  FROM  ".TABLE_COMMENT."  where ip='$ip' and  lang='".LANG."' and type='contact' and tokenhour='$tokenhour' order by id desc";
     // echo $sql;
    $result = getnum($sql );
   // echo $result ;
    if($result>=50){  $retvv['id']  = 'norepeat';  }
else {
    $retvv['id'] =  'yes';

    $pidname = 'comm' . $bshou;
    
  $ss = "insert into ".TABLE_COMMENT." (pbh,pidname,pid,lang,type,ip,tokenhour,desp,dateday,dateedit) values ('".USERBH."','$pidname','0','".LANG."','contact','$ip','$tokenhour','$content','$dateday','$dateall')";
 //echo $ss;
   iquery($ss);
}  



  if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
      $retvv = json_encode($retvv);
      echo $retvv;
        die();
   }
    else {
    //header("Location: ".$_SERVER["HTTP_REFERER"]);
      echo 'pls do not access here directly';
   }

  ?>