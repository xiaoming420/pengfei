<?php
 
 $arr_formerror = array(
     'error0'=>'可以为空', 
     'error1'=>'不能为空',    
      'error2'=>'手机号格式不对', 
      'error3'=>'E-mail格式不对', 
      'error4'=>'必须是数字',       
    );





 $sqlsub = "SELECT * from ".TABLE_FIELD." where  pid='$pidname' $andlangbh and sta_visible='y' order by pos desc, id";
 $rowlistsub = getall($sqlsub);


    if($rowlistsub=='no') {
  echo '<p>&nbsp;&nbsp;还没有字段，请添加...</p>';
  }
  else{
  $formname = get_field(TABLE_FIELD,'name',$pidname,'pidname');
  $namefront = get_field(TABLE_FIELD,'namefront',$pidname,'pidname');
  global  $nodepidname;
$nodecnt = '';
  if(!isset($nodepidname))    $nodepidname='';
  else{
     $nodepidname= get_field(TABLE_NODE,'pidname',$nodepidname,'pidname');
    $nodetitle= get_field(TABLE_NODE,'title',$nodepidname,'pidname');
  //  $urlname = getlink($nodepidname,'node','admin-',$class='');
    $nodecnt = '<br />文章：'.$nodetitle.'<br />';

  }
 
if($namefront<>'')   echo '<div class="bodyheader"><h3>'.$namefront.'</h3></div>';
  ?>


 <div id='<?php echo $pidname;?>' class="formblock">

 
 
    <?php

   foreach($rowlistsub as $vsub){

           $tid=$vsub['id'];
       $typeinput=$vsub['typeinput']; 
       $sta_vis=$vsub['sta_visible']; 
       $pidnamefield=$vsub['pidname'];  
       $error=$vsub['error'];  
       $cssname=$vsub['cssname'];  
  
if($typeinput=='radio' || $typeinput=='checkbox' || $typeinput=='select')
  $errorv = '至少选择一个';
else  $errorv =  select_return_string($arr_formerror,0,'',$error);

  
  $value='';
 
  
?>
<div class="line <?php echo $cssname?>">
<div class="key col-md-3" data-typeinput="<?php echo $typeinput;?>" data-error="<?php echo $error;?>">
<span><?php echo $vsub['name'];?></span> 
<?php
if($error<>'error0') echo ' (*)';
?>

 :
</div>

<div class="valuediv col-md-9">
 <?php   fieldvalue($pidnamefield,$typeinput,$value); 
    
   if($error<>'error0') {
    echo '<p class="error">'.$errorv.'</p>';
   }

    ?> 

</div>

 </div>
  
  <?php 
  } //end foreach
  ?>

 
 <div class="linesubmit">
   <div class="dmbtn more3">   
  <input type="submit" class="more submit cp" value="提交">  

  <div class="submitloading dn"> </div> 
   </div>


</div>
</div> 
<?php } //end list
?>



<?php  
//$inquerytooken = 'inq_'.date("Ymd_His_").rand(1111,9999);
 $tokenhour = 'inq_'.date("Ymd_H");//minute

 ?>
 <div    data-tokenhour="<?php echo $tokenhour?>"  class="contactpostnonce" style="display:none"> </div>
<!--end homeliuyan-->

<script>
var formtitle = '<?php echo $formname.$nodecnt;?>';
var ajaxformurl = '<?php echo BASEURL?>dmpostform.php?type=formblock&lang=<?php echo LANG?>';
var ajaxsendemailurl = 'dmpostform.php?type=sendemail&lang=<?php echo LANG?>';
var nodepidname = '<?php echo $nodepidname;?>';
var formpidname = '<?php echo $pidname;?>';
 

$(function(){
    $('.formblock .submit').click(function() {
         form_ajax(formtitle,ajaxformurl,ajaxsendemailurl,nodepidname,formpidname);        
    });;
});


</script>





