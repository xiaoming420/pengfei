<?php
if($act=='update'){

 if(@$_POST['inputmust']=='') {echo $inputmusterror.$backlist;exit;}


 $jump_back = $jumpv_pf.'&act=edit';

 
  //  $cssdir = ASSETSROOT.$abc2;
     // if(!is_dir($cssdir)) {alert('出错，模板目录 '.$abc2.'不存在！');  jump($jump_back); }

    //$htmldir = WEB_ROOT.'component/html/'.$abc3;
    //  if(!is_dir($htmldir)) {alert('出错，html目录 '.$abc3.'不存在！');  jump($jump_back); }

   $sql = "SELECT id from ".TABLE_STYLE." where htmldir='$abc2' and pidname<>'$pidname'  limit 1";
   if(getnum($sql)>0){
      alert('出错，模板目录 '.$abc2.' 已使用。(包括其他语言)');
       jump($jump_back);

      exit;
   }  





   $sql = "SELECT kv from ".TABLE_STYLE." where pidname='$pidname'  $andlangbh   limit 1";
                           $row = getrow($sql);
                           $imgsqlname =$row['kv'];  
       
       $delimg = zbdesp_onlyinsert($_POST['delimg']);                            
    if($delimg=='y'){
        if($imgsqlname<>'') p2030_delimg($imgsqlname,'y','y');
        $kv_v = ",kv = ''";
    }
    else{

         $imgname = $_FILES["addr"]["name"];
       $imgsize = $_FILES["addr"]["size"];
       if (!empty($imgname)) {
           $imgtype = gl_imgtype($imgname);
           $up_small = 'n';
           $up_delbig = 'n';
           $up_water = 'n';           
           $i = '';
           require_once('../plugin/upload_img.php'); //need get the return value,then upimg part turn to easy.
           $kv_v = ",kv = '$return_v'";
       }
       else  $kv_v = "";
    
    }




 
  $ss = "update ".TABLE_STYLE." set title='$abc1',htmldir='$abc2',pidmenu='$abc3',pidregion='$abc4' $kv_v where pidname='$pidname' $andlangbh limit 1";
   //echo $ss;exit;    
   iquery($ss);  


 
  

  
   jump($jump_back);


}
else{
  $sql = "SELECT * from ".TABLE_STYLE."  where  pidname='$pidname' $andlangbh   order by id limit 1";
$row = getrow($sql);
//pre($row);
$title=$row['title'];$htmldir=$row['htmldir'];$blockdir=$row['blockdir'];
$kv=$row['kv'];  
$pidmenu=$row['pidmenu'];$pidregion=$row['pidregion'];
 
 //$imgsmall2 = p2030_imgyt($kv, 'y', 'n');
$imgsmall2 = '<img src='.get_img($kv, '', '').' alt=""  height="200" />';


$jsname = jsdelname($title);

$jumpv_insert = $jumpv_pf.'&act=update';

?>

 
<?php if($curstyle<>$pidname){?>
<div class="contenttop">
<a href="javascript:del('del','<?php echo $pidname;?>','mod_style.php?lang=<?php echo LANG;?>','<?php echo $jsname;?>')" class="fr but2"><i class="fa fa-trash-o"></i> 删除</a>
</div>
<?php } ?>


<form  onsubmit="javascript:return checkhere(this)" action="<?php echo $jumpv_insert;?>" method="post" enctype="multipart/form-data">
  <table class="formtab">

      <tr>
      <td width="20%"  class="tr">模板标题：</td>
      <td > <input name="name" type="text"  value="<?php echo $title;?>" class="form-control" /> </td>
    </tr>

   <tr>
      <td class="tr">模板目录：</td>
      <td> 
   <select name="selemb" class="form-control">
         <option value="">请选择</option> 
<?php 
$arrtpltemplateroot = getDir(TEMPLATEROOT);
//pre($arrtpltemplateroot);
foreach ($arrtpltemplateroot as $k => $v) {
  if($v<>'base'){
    $htmldirv = '';
    if($v==$htmldir) $htmldirv ='selected="selected"';
   echo '<option '.$htmldirv.' value="'.$v.'">'.$v.'</option>';
}
}
     ?>
</select>
        </td>
    </tr>
 
  


     <tr>
      <td   class="tr">选择菜单：</td>
      <td >
      <select name="selemenu" class="form-control">
         <option value="">请选择</option>
          <?php 
   $sqltextlist = "SELECT * from ".TABLE_MENU." where   $noandlangbh and ppid='0'  and sta_visible='y'   order by pos desc, id "; 
   if(getnum($sqltextlist)>0){
     $res = getall($sqltextlist);
   
       foreach($res as $v){
        $pidname22 = $v['pidname'];
        if($pidname22 == $pidmenu) $selected = ' selected ';
        else  $selected = '';
         echo '<option '.$selected.' value="'.$pidname22.'">'.$v['name'].'</option>';
         
       }
      }
    
     
     ?>
     </select>   
      </td>
    </tr>

  
     <tr>
      <td   class="tr">
   
      在<a href="../mod_region/mod_mainregion.php?lang=<?php echo LANG?>" target="_blank">页面区域</a>选择一个 <br />
      做为本模板的首页内容
      </td>
      <td >
      <select name="selereg" class="form-control">
         <option value="">请选择</option>
          <?php 
   $sqltextlist = "SELECT * from ".TABLE_REGION." where   pid='0' $andlangbh   order by  pos desc, id "; 
   // and (pidstylebh='y' or pidstylebh='$pidname') 
     if(getnum($sqltextlist)>0){
         $res = getall($sqltextlist);
       foreach($res as $v){
          $pidname22 = $v['pidname'];
           $pidstylebh = $v['pidstylebh'];
           $nameg='';
           if($pidstylebh=='y') $nameg='[公共]';
          if($pidname22 == $pidregion) $selected = ' selected ';
          else  $selected = '';
           echo '<option '.$selected.' value="'.$pidname22.'">'.$nameg.$v['name'].'</option>';
         
       }
     }
     
     ?>
     </select>   
   

     <?php 
      echo check_blockid($pidregion);

      ?>
      </td>
    </tr>

 



    <tr>
            <td   class="tr">图片：</td>
            <td  > <input name="addr" type="file" id="addr"  /><?php echo $xz_maybe;?>  
<?php
echo '<br /><span class="cred">' . $format_t . '</span><br />';
// echo gl_showsmallimg($fo_bef,$imgsmall,'y');
   if($kv<>'')    echo $imgsmall2;
?>
             
    <?php  if($kv<>'')    {
              ?>
          <span class="cred"> <br />是否要删除图片？ </span> 
          <select name="delimg">
    <?php select_from_arr($arr_yn,'n','');?>
     </select>
          <?php } 
          else{ //use for : Undefined index: delimg 
              ?>          
          <select name="delimg" style="display:none" class="form-control">
              <option value=""></option>
     </select>
          <?php
          }?>
              
              <br />  <br />  
</td></tr>


    
  <tr>
      <td></td>
      <td>
      <input  class="mysubmit" type="submit" name="Submit" value="提交" /></td>
    </tr>
    </table>
<?php echo $inputmust;?>

</form>
<?php }
?>
<script>
function checkhere(thisForm) {
   if (thisForm.name.value=="")
  {
    alert("请输入标题。");
    thisForm.name.focus();
    return (false);
  } 
  
     if (thisForm.selemb.value=="")
  {
    alert("请选择模板目录。");
    thisForm.selemb.focus();
    return (false);
  } 

   if (thisForm.selemenu.value=="")
  {
    alert("请选择菜单。");
    thisForm.selemenu.focus();
    return (false);
  } 

   if (thisForm.selereg.value=="")
  {
    alert("请选择页面区域。");
    thisForm.selereg.focus();
    return (false);
  } 



}

</script>
