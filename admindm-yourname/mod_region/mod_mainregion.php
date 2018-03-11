<?php
/*	欢迎使用DM企业建站系统，本系统由www.demososo.com开发。
*/
require_once '../config_a/common.inc2010.php';

ifhave_lang(LANG);//TEST if have lang,if no ,then jump

 
if($pidname<>'') {ifhaspidname(TABLE_REGION,$pidname);}
 

if($pid<>'') {ifhasrecord(TABLE_REGION,$pid,'pidname','no pid');}

if(is_numeric($tid)) {   ifhasid(TABLE_REGION,$tid);}




 if($act <> "pos") zb_insert($_POST);

 
//$typearr =  array("page", "style");  
//if(!in_array($type,$typearr))   {echo 'type is error.';exit;}

$title2='';
if($act=='add') $title2 = ' - 添加'; 
else if($act=='edit') $title2 = ' - 修改'; 

$title = '页面区域管理'; 
 
$jumpv='../mod_region/mod_mainregion.php?lang='.LANG.'&type='.$type;
 
$jumpvf=$jumpv.'&file='.$file;
$jumpvp=$jumpv.'&pidname='.$pidname;
$jumpvpf=$jumpvf.'&pidname='.$pidname;

$jumpvadd=$jumpv.'&file=addedit&act=add'; 
$jumpvinsert=$jumpv.'&file=addedit&act=insert'; 

$jumpvedit=$jumpv.'&file=addedit&act=edit'; 
$jumpvupdate=$jumpv.'&file=addedit&act=update'; 



 
//---
if($act == "sta")
{
     $ss = "update ".TABLE_REGION." set sta_visible='$v' where id=$tid $andlangbh limit 1";
	// echo $ss;exit;
    iquery($ss);
    jump($jumpv); 
}

//-------------
if($act == "posmain")
{
    foreach ($_POST as $k=>$v){
         $ss = "update ".TABLE_REGION." set  pos='$v' where id='$k' and pid='0' $andlangbh  limit 1";
         iquery($ss);
        }
      jump($jumpv);
}

//-------------
if($act == "move")
{
     $name = get_field(TABLE_REGION,'name',$pidname,'pidname');
     $pidnamennew='region'.$bshou;
     $name = '【复制页面区域】'.$name;
      $ss = "insert into ".TABLE_REGION." (pid,pidname,pbh,name,lang,dateedit) values ('0','$pidnamennew','$user2510','$name','".LANG."','$dateall')";
      //  echo $ss;exit;
      iquery($ss);
      //---------begin copy---------------

      $sql = "SELECT * from ".TABLE_REGION."  where pid='$pidname'   $andlangbh order by id";
     // echo $sql;exit;
      //echo getnum($sql);exit;
      if(getnum($sql)>0){
        $result = getall($sql);
          foreach ($result as $row222) { 
      //$desp=zbdesp_imgpath($row['desp']);
      $name= $row222['name']; 
      $namebz= $row222['namebz']; $pos= $row222['pos']; 
      $despjj= $row222['despjj']; 
      $blockid= $row222['blockid']; 
      //$desp= $row222['desp']; 
      //$desptext= $row222['desptext']; 
      $arr_cfg= $row222['arr_cfg']; 

      //pre($_POST);
             
       $pidnamesub='sreg'.$bshou;

       $ss = "insert into ".TABLE_REGION." (pid,pidname,pbh,name,namebz,pos,despjj,blockid,arr_cfg,sta_visible,lang,dateedit) values ('$pidnamennew','$pidnamesub','$user2510','$name','$namebz','$pos','$despjj','$blockid','$arr_cfg','y','".LANG."','$dateall')";
         //  echo $ss;exit;
            iquery($ss);  

              
          }

       alert('复制成功！');

       }
       else    alert('没有复制内容！');


 

      jump($jumpv);


}
 


//-----------------------
if($act == "delregion")
{ 
 $ifdel1 = ifcandel(TABLE_REGION,$pidname,'区域有记录，请先删除。',$jumpv);// back is fail 
 if($ifdel1) ifsuredel(TABLE_REGION,$pidname,$jumpv);
	  
}


//-----------
 
  require_once HERE_ROOT.'mod_common/tpl_header.php'; 

 ?>

<section class="content-header">
     
<h1><?php 

if($act<>'list')  $title = '<a style="font-size:20px"  href="'.$jumpv.'">'.$title.'</a>';

echo $title
    ?> 
      <span style="font-size:14px"> <?php echo $title2;?></span></h1>
     
</section>
  
  <div style="padding-left:10px">
 <?php 
  // if($type=='style') echo $stylename;
?>
</div>
 <section class="content">  

<?php
  if($file=='list'){
?>
  <div class="contenttop">
  <a href="<?php echo $jumpv?>&file=addedit&act=add"><i class="fa fa-plus-circle"></i> 添加</a>

 
 

</div>
<?php
  }
?>
 
        <?php   
           
          require_once HERE_ROOT.'mod_region/tpl_mainregion_'.$file.'.php';
 
        ?>
 </section>
<?php
require_once HERE_ROOT.'mod_common/tpl_footer.php';
?>

