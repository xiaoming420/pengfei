<?php
/*  欢迎使用DM企业建站系统，本系统由www.demososo.com开发。
*/
require_once '../config_a/common.inc2010.php';
//
 if($act <> "pos") zb_insert($_POST);
 
 
ifhave_lang(LANG);//TEST if have lang,if no ,then jump

$title='查看标识';

 
 
//-----------

require_once HERE_ROOT.'mod_common/tpl_header_iframe.php'; 

?>
<style> 
 table.formtab { margin-bottom:0 }

</style>

  <table class="formtab">


 
  <tr>
    <td  colspan="2" height="10"> 
        &nbsp;
  </td>   
  </tr>
  <tr>
    <td  colspan="2" style="background:#4d91d5;color:#fff;text-align:center;color:#fff;font-size:18px"> 
        区块标识 
  </td>   
  </tr>


 
<!--
<tr>
    <td class="tc" colspan="2" style="border:0">  
      <div class="" style="display:inline-block">
        <ul  class="nav nav-tabs" > 
          <li class="active"> <a href="#a1" data-toggle="tab"> 页面区域 </a> </li>
          <li class=""> <a href="#a2" data-toggle="tab"> 组合区块 </a> </li>
          <li class=""> <a href="#a3" data-toggle="tab"> prog文件 </a> </li>          
        </ul>
      </div>
</td>
</tr>

<tr>
    <td class="tc" colspan="2" style="border:0"> 
        <div   class="tab-content">
            <div class="tab-pane fade in active " id="a1">
            111
            </div>
            <div class="tab-pane fade in active " id="a2">
            11122
            </div>
            <div class="tab-pane fade in active " id="a3">
            111333
            </div>
        </div>
</td>
</tr>
 -->


 <tr>
    <td class="tc" colspan="2" style="border:0">  
      <div class="" style="display:inline-block">
        <ul  class="nav nav-tabs" > 
          <li class="active"> <a href="#a1" data-toggle="tab"> 页面区域 </a> </li>
          <li class=""> <a href="#a2" data-toggle="tab"> 组合区块 </a> </li>
          <li class=""> <a href="#a3" data-toggle="tab"> prog文件 </a> </li>          
        </ul>
      </div>
</td>
</tr>

<tr>
    <td class="tc" colspan="2" style="border:0"> 
        <div   class="tab-content">
            <div class="tab-pane fade in active " id="a1">
            
            
  <table class="formtab">        
<?php
//region
 
//$sql = "SELECT name,pidname,pidstylebh from ".TABLE_BLOCKGROUP." where pid='0'  and (pidstylebh='$curstyle' or pidstylebh='y') $andlangbh  order by pidstylebh ,pos desc,id desc";

 $sql = "SELECT name,pidname from ".TABLE_REGION." where pid='0'   $andlangbh  order by pos desc,id desc";

   //echo $sql.'<br/>';
if(getnum($sql)>0){
$rowlist = getall($sql);
    foreach($rowlist as $vcat){
       
       $name=$vcat['name'];   
       $pidname=$vcat['pidname'];  
 
     ?>
    <tr>
    <td width="50%" align="right">
    <?php 
   // if($pidstylebh=='y') {
      //$name ='<span style="color:blue;font-size:12px">[公共]</span> '.$name;     
   // }
    echo $name

    ?> </td>
     <td align="left">

  <?php 
   $inputcopy = admblockid($pidname); 
  echo $inputcopy.adm_previewlink($pidname);

     ?>  </td>
    </tr>
    <?php 
    } 
    ?>

    <?php }
    else echo '<tr><td></td><td>暂无内容，请添加。<td><tr>';
?> 

</table>

            </div><!--end tab content-->
            <div class="tab-pane fade" id="a2">
           
  <table class="formtab">    
           
<?php
 
//-----group block-------------
 $sql = "SELECT name,pidname,pidstylebh from ".TABLE_BLOCKGROUP." where pid='0' $andlangbh  order by pidstylebh ,pos desc,id desc";

   //echo $sql.'<br/>';
if(getnum($sql)>0){
$rowlist = getall($sql);
    foreach($rowlist as $vcat){
       
       $name=$vcat['name'];    $pidstylebh=$vcat['pidstylebh']; 
       $pidname=$vcat['pidname'];  
 
     ?>
    <tr>
    <td width="50%" align="right">
    <?php 
    echo $name
    ?> </td>
     <td align="left">

  <?php 
    $inputcopy = admblockid($pidname); 
  echo $inputcopy.adm_previewlink($pidname);

     ?>  </td>
    </tr>
    <?php 
    } 
    ?>

    <?php 
    }
    else echo '<tr><td></td><td>暂无内容，请添加。<td><tr>';
?> 
</table>


            </div><!--end tab content-->
            <div class="tab-pane fade" id="a3">
            <?php 
                  $filedir = TEMPLATEROOT.'base/prog/';                 
                  if(is_dir($filedir)){        
                    $filearr = getFile($filedir);          
                        foreach ($filearr as $v) {
                            $v = substr($v,0,-4);
                             echo '<div class="col-md-3 col-xs-6"> '.$v.' </div>';
                        }
                          
                    }
                    else{
                        echo '<option>'.$filedir.' 目录不存在</option>';
                    }

              ?>
  

            </div><!--end tab content-->
        </div>
</td>
</tr>






<!-- tab line2222222222222222222222222222222222222-->
 
 

 
<tr>
    <td class="tc" colspan="2" style="border:0">  
      <div class="" style="display:inline-block">
        <ul  class="nav nav-tabs" > 
          <li class="active"> <a href="#b1" data-toggle="tab">视频区块</a> </li>
          <li class=""> <a href="#b2" data-toggle="tab">相册区块  </a> </li>
          <li class=""> <a href="#b3" data-toggle="tab">表单区块 </a> </li>          
        </ul>
      </div>
</td>
</tr>

<tr>
    <td class="tc" colspan="2" style="border:0"> 
        <div   class="tab-content">
            <div class="tab-pane fade in active " id="b1">
            
 <table class="formtab">        
<?php
 $sql = "SELECT title,pidname from ".TABLE_VIDEO." where pid='block' and type='block'  $andlangbh  order by pos desc,id desc";
if(getnum($sql)>0){
$rowlist = getall($sql);
foreach($rowlist as $vcat){       
       $name=$vcat['title'];   
       $pidname=$vcat['pidname'];  
 
     ?>
    <tr>
    <td width="50%" align="right">
    <?php     echo $name ?> </td>
     <td align="left">

  <?php 
$inputcopy = admblockid($pidname); 
  echo $inputcopy.adm_previewlink($pidname);

     ?>  </td>
    </tr>
    <?php 
    } 
    ?>

    <?php }
    else echo '<tr><td></td><td>暂无内容，请添加。<td><tr>';

?> 

</table>



            </div>
            <div class="tab-pane fade" id="b2">
            
            
                      
 <table class="formtab">        
<?php
 $sql = "SELECT title,pidname from ".TABLE_ALBUM." where pid='block' and type='block'  $andlangbh  order by pos desc,id desc";
if(getnum($sql)>0){
$rowlist = getall($sql);
foreach($rowlist as $vcat){       
       $name=$vcat['title'];   
       $pidname=$vcat['pidname'];  
 
     ?>
    <tr>
    <td width="50%" align="right">
    <?php     echo $name ?> </td>
     <td align="left">

  <?php 
$inputcopy = admblockid($pidname); 
  echo $inputcopy.adm_previewlink($pidname);

     ?>  </td>
    </tr>
    <?php 
    } 
    ?>

    <?php }
    else echo '<tr><td></td><td>暂无内容，请添加。<td><tr>';

?> 

</table>


            </div>
            <div class="tab-pane fade" id="b3">
            
            
                                  
 <table class="formtab">        
<?php
 $sql = "SELECT name,pidname from ".TABLE_FIELD." where pid='block' and type='block'  $andlangbh  order by pos desc,id desc";
if(getnum($sql)>0){
$rowlist = getall($sql);
foreach($rowlist as $vcat){       
       $name=$vcat['name'];   
       $pidname=$vcat['pidname'];  
 
     ?>
    <tr>
    <td width="50%" align="right">
    <?php     echo $name ?> </td>
     <td align="left">

  <?php 
$inputcopy = admblockid($pidname); 
  echo $inputcopy.adm_previewlink($pidname);

     ?>  </td>
    </tr>
    <?php 
    } 
    ?>

    <?php }
    else echo '<tr><td></td><td>暂无内容，请添加。<td><tr>';

?> 

</table>


            </div>
        </div>
</td>
</tr>
 






<!-- tab line33333333333333333333333333333333333333333333333333333333333333333333333-->
 
 


  <tr>
    <td class="tc" colspan="2" style="border:0"> 
 
<div class="" style="display:inline-block">

<ul  class="nav nav-tabs" >
 
<?php 
$i=0;
 
foreach ($arr_block as $k => $v) {
  ?>

    <li <?php if($i==0) echo 'class="active"';?>>
    <a href="#<?php echo $k?>" data-toggle="tab">
       <?php echo $v?>
    </a>
  </li>

  <?php
  $i++;
}
?>


</ul>

</div></td></tr>

  <tr>
    <td class="tc" colspan="2" style="border:0"> 

<div   class="tab-content">
   

 <?php 
$i=0;
foreach ($arr_block as $k => $v) {
  ?>
 <div class="tab-pane fade <?php if($i==0) echo 'in active'?>" id="<?php echo $k;?>">
     <?php

 

  $sql = "SELECT name,pidname,pidcate,pidstylebh from ".TABLE_BLOCK."  where pid='$k' and sta_visible='y' and typecolumn<>'column'   $andlangbh order by pidstylebh ,pos desc,id desc";
 //echo $sql;
  if(getnum($sql)>0){
$rowvblock = getall($sql);
foreach ($rowvblock as $value) {
  $name = $value['name'];
  $pidnamev = $value['pidname'];
  $pidcate = $value['pidcate'];
   $pidstylebh = $value['pidstylebh'];

$edit = '<a class="but1" target="_blank" href="../mod_block/mod_block.php?lang='.LANG.'&pidname='.$pidnamev.'&act=edit&type='.$k.'"><i class="fa fa-pencil-square-o"></i> 修改</a>';


  $catename ='';
  if($k=='node' || $k=='blockdh')  
  // $catename = ' <span class="mobshow"><br></span>  <span style="background:#ccc">分类：'.get_field(TABLE_CATE,'name',$pidcate,'pidname').'</span>';
      
?>
  <table class="formtab">
  <tr>
    <td width="50%" align="right"> 
 <?php  
if($pidstylebh=='y') {
  $name ='<span style="color:blue;font-size:12px">[公共]</span> '.$name;
 
}
echo $name;
?>
  </td>
   <td align="left"> 
         <?php 
          $inputcopy = admblockid($pidnamev);
           echo $inputcopy.' '.adm_previewlink($pidnamev);
         ?>
  </td>
   
  </tr>
  </table>
<?php
}

} else echo '暂无内容';

?>


  </div>
<?php
$i++;
}

?>
 
 </div>

 
 </td>   
  </tr>
  </table>
 


 <?php
require_once HERE_ROOT.'mod_common/tpl_footer_iframe.php';

?>