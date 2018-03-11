<?php
/*
	欢迎使用DM企业建站系统，本系统由www.demososo.com开发。
*/
if(!defined('IN_DEMOSOSO')) {
	exit('this is wrong page,please back to homepage');
}
$reqfilemeta = TPLCURROOT.'inc/meta.php';
if(!is_file($reqfilemeta)) $reqfilemeta = DISPLAYROOT.'a_meta.php';
require_once $reqfilemeta;
?>
 <div class="pagewrap">

 <style>
.headershowblock{
 margin:50px 0 20px  0;line-height:30px; 
 text-align:center;background:#37cde6;font-size:20px
}
.headershowblock span{font-size:14px;color:#666;}
 
.viewblocktab {height:30px;margin:10px 0;text-align: center}
.viewblocktab a{display: inline-block;margin-right: 16px;padding:5px;background: #e2e2e2}
.viewblocktab a.active{background: #12A7ED;color:#fff;}
</style>

<?php
require_once TPLCURROOT.'inc/header.php';
$active1 = $active2 = $active3 = '';
if($page=='custom') $active1 = ' class="active" ';
if($page=='node')  $active2 = ' class="active" ';
if($page=='blockdh') $active3 = ' class="active" ';
?>

<div class="viewblocktab"> 
公共区块演示：
<a <?php echo $active1;?> href="dmlink-blockview-custom.html">自定义区块 </a>
<a <?php echo $active2;?> href="dmlink-blockview-node.html">分类区块 </a>
<a <?php echo $active3;?> href="dmlink-blockview-blockdh.html">效果区块 </a>

</div>

<?php
  
 // $progv = 'prog_viewblock_'.$page;
 // block($progv);
?> 










 
 
<div class="container">
<?php
global $andlangbh;
 $curstyle = 'style_commonblock';
  $sqltextlist = "SELECT name,pidname,template from ".TABLE_BLOCK." where   pid='$page' and typecolumn<>'column'    and sta_visible='y'   $andlangbh order by pos desc,id desc"; //pos desc,id desc
   $result = getall($sqltextlist); 
 //echo   $sqltextlist;
   //pre($result); 
   
   foreach($result as $v){
   //$inputcopyjs= "this.select();document.execCommand('Copy')";
  //  $inputcopy = '<input style="border:0;background:#C2E8FF" onclick="'.$inputcopyjs.'" type="text" value=" [DMblockid]'.$v['pidname'].' [/DMblockid]" class="form-control">';
       $pidname = $v['pidname'];
       $template = $v['template'];
    echo '<div class="headershowblock">'.$v['name'].'<br /><span>  [DMblockid]'.$pidname.'[/DMblockid]<br /> '.$template.'</span></div>';
    block($v['pidname']);
    echo '<div class="c"></div>';

   }
   

?>
</div>





 

<?php 
  $reqfile = TPLCURROOT.'inc/footer.php';
 if(!is_file($reqfile)) $reqfile = DISPLAYROOT.'a_footer.php';
 require_once $reqfile;
  
?> 

</div><!--end pagewrap-->

<?php  		
$reqfile = TPLCURROOT.'inc/footer_last.php';
if(!is_file($reqfile)) $reqfile = DISPLAYROOT.'a_footer_last.php';
require_once $reqfile;
 
?>



</body>
</html>

