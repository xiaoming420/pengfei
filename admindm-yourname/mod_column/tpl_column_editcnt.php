<?php
/*
	欢迎使用DM企业建站系统，本系统由www.demososo.com开发。
*/
if(!defined('IN_DEMOSOSO')) {
	exit('this is wrong page,please back to homepage');
}
 
if($pidname=='') { echo 'sorry, no pidname ;';exit; }


 $sql = "SELECT id,pidname from ".TABLE_BLOCK." where pidcolumn='$pidname' and typecolumn='column'   $andlangbh order by id limit 1";
 if(getnum($sql)==0){
    //then insert into block
 $pidnamecur = 'vblock' . $bshou;
 //pid is type, is custom or node or blockdh or video
   $ss = "insert into " . TABLE_BLOCK . " (pbh,pid,pidcolumn,pidname,lang,name,typecolumn,dateday,template) values ('$user2510','custom','$pidname','$pidnamecur','" . LANG . "','namecolumn','column','$dateday','default_column')"; 
   //use template is default_column.tpl.php
  //echo $ss;exit;
    iquery($ss);
    
    jump($jumpvpf);
 }
 else{
   //then update
  $row22 = getrow($sql); 
  $pidnamecur = $row22['pidname'];
 
?>




<?php

if ($act == 'update') {
   

     if(@$_POST['inputmust']=='') {echo $inputmusterror.$backlist;exit;}

  
  // pre($_POST); exit;

  

       $sql = "SELECT kv from ".TABLE_BLOCK." where  typecolumn='column' and pidname='$pidnamecur' $andlangbh   limit 1";
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
           //make thumb
          //  $sql = "SELECT sm_w,sm_h from ".TABLE_BLOCK." where pidname='$pidname'  $andlangbh   limit 1";
           //                $row = getrow($sql);
           //                $up_w_s =$row['sm_w'];$up_h_s =$row['sm_h'];   
                        //  echo $up_w_s.'-'.$up_h_s;
          // if( $up_w_s==0 ||  $up_h_s == 0) $up_small = 'n';
           //else $up_small = 'y';  
            
            $up_small = 'n';           
           $imgtype = gl_imgtype($imgname);
          // $up_small = 'y';
           $up_delbig = 'n';//not del,just override
           $up_water = 'n';           
           $i = '';
           require_once('../plugin/upload_img.php'); //need get the return value,then upimg part turn to easy.
           $kv_v = ",kv = '$return_v'";
       }
       else  $kv_v = "";
    
    }

 
 $desp = zbdesp_onlyinsert($_POST['despcontent']); //note: desp and addr not use variable abc1.
    $desptext = zbdesp_onlyinsert($_POST['editor1text']);


 //$postarrexc=  array("name","delimg","editor1text","despcontent","Submit","inputmust");  

//if(strpos($abc1, $abc14)) $name = $abc1;
    //else   $name = $abc1.' - '.$abc14; //add template to name,for search by title.
 //$postv = zb_insertadv($_POST,$postarrexc)."name='$name',dateday='$dateday' $kv_v,desptext='$desptext',desp='$desp'"; 

/*

    [blockid] => 
    [cssname] => 
    [namefront] => 
    [linktitle] => 
    [linkurl] => 
    [delimg] => 
    [editor1text] =>  
    [despcontent] => 
    [Submit] => 提交
    [inputmust] => inputmust
    */
$postv = "namefront='$abc1',blockid='$abc2',cssname='$abc3',linktitle='$abc4',linkurl='$abc5',template='default_column' $kv_v,desptext='$desptext',desp='$desp'"; 

   $ss = "update " . TABLE_BLOCK . " set  ".$postv." where typecolumn='column' and pidname='$pidnamecur' $andlangbh limit 1";
     // echo $ss;exit;

 
     // echo $ss;exit;
   //pre($_POST);

    iquery($ss);
   jump($jumpvpf);
}



else{
    $titleh2 = '修改';
    $sqlsub = "SELECT * from " . TABLE_BLOCK . "  where  pidcolumn='$pidname' and typecolumn='column' $andlangbh order by id limit 1";
    if(getnum($sqlsub)>0){
    //echo $sqledit;exit;
    $rowsub = getrow($sqlsub);
   //pre($rowsub);
    $kv = $rowsub['kv'];
    //$name = $rowsub['name']; 
   $namefront = $rowsub['namefront'];  
   $template = $rowsub['template'];     
   $blockid = $rowsub['blockid'];    
   $linktitle = $rowsub['linktitle']; $linkurl = $rowsub['linkurl']; 
//$titlestyle = $rowsub['titlestyle']; 
//$titlestylesub = $rowsub['titlestylesub']; 

      $cssname = $rowsub['cssname']; 
    // $despjj = zbdespedit($rowsub['despjj']);
    $pidnamehere = $rowsub['pidname'];



 $imgsmall2 = p2030_imgyt($kv, 'y', 'n');
 

//$despjj = $rowsub['despjj'];
    $desp = zbdesp_imgpath($rowsub['desp']);
    $desptext = zbdesp_imgpath($rowsub['desptext']);
    
    $jump_insertimg = $jumpvpf . '&act=update';


?>
 
<form  onsubmit="javascript:return checkhere(this)" action="<?php echo $jump_insertimg; ?>" method="post" enctype="multipart/form-data">
    <table class="formtab">

 <tr>
            <td width="12%" class="tr"> </td>
            <td width="88%"> 
                <?php echo $pidnamecur?> 
 <?php echo  adm_previewlink($pidnamecur);?>  


            </td>
        </tr>
        <tr>
            <td width="12%" class="tr">前台标题：</td>
            <td width="88%"> 
               <input name="namefront" type="text"   value="<?php echo $namefront; ?>" size="30"  /><?php echo $xz_maybe; ?>  
          <div class="inputclear"> </div>

            </td>
        </tr>


          <tr>
            <td height="60" class="tr"><strong>调用标识：</strong></td>
            <td  > 
<input name="blockid" type="text" value="<?php echo $blockid;?>"  size="30" />
<?php echo $xz_maybe;?> 
<?php 
echo  check_blockid($blockid);

$texterr = '如果有标识，则下面所有的选项不起使用。会被标识的内容替换。';
if($blockid=='') echo '<p style="color:blue;padding:10px">提示：'.$texterr.'</p>';
else echo '<p style="background:red;color:#fff;padding:10px;font-size:14px">'.$texterr.'</p>';
?>



 </td>
        </tr>




         <tr>
            <td   class="tr"> <?php echo $text_cssname; ?> </td>
            <td  > 
                <input name="cssname" type="text"  class="inputcss form-control" value="<?php echo $cssname; ?>"  /><?php echo $xz_maybe; ?>
                <p class="cgray">参考： tl, tr,  tc ，boxcolnopad ，boxcolnomag</p>  
            </td>
        </tr>

          
     

     <tr style="background: #DCE8F4">
            <td  class="tr">链接：</td>
            <td  > 
      字样：<input name="linktitle" type="text"    value="<?php echo $linktitle; ?>" size="30"  /><?php echo $xz_maybe; ?> 
 <div class="c5"> </div>
     网址：<input name="linkurl" type="text"  class="inputcss form-control"  value="<?php echo $linkurl; ?>"    /><?php echo $xz_maybe; ?> 
 
 </td>
        </tr>



 
        
        <tr>
            <td   class="tr">上传图片：
            <br />
<span class="cgray">也可用于视频封面图片</span>

            </td>
            <td  > <input name="addr" type="file" id="addr" class="form-control" /><?php echo $xz_maybe;?>  
<?php
echo '<br /><span class="cred">' . $format_t . '</span><br />';
// echo gl_showsmallimg($fo_bef,$imgsmall,'y');
echo $imgsmall2;
?>
             
          <?php  if($kv<>'') 
              {
              ?>
                  <span class="cred"> <br />是否要删除图片？ </span>
                  
                  <select name="delimg">
                    <?php select_from_arr($arr_yn,'n','');?>
                    </select>
          <?php } 
          else{ //use for : Undefined index: delimg 
              ?>          
                 <select name="delimg" style="display:none">
                      <option value=""></option>
                </select>
          <?php
          }?>
                   
            </td>
        </tr>
 
  

        <tr>
            <td class="tr">内容： </td>
            <td> <p>
 <a class="needpopup" href="../mod_imgfj/mod_imgfj.php?pid=common&lang=<?php echo LANG; ?>" target="_blank">公共编辑器附件管理</a>

                </p>



<?php require_once('../plugin/editor_textarea.php'); //textarea is in this file ?>

            </td> 
        </tr>

 

        <tr>
            <td></td>
            <td>
                <input  class="mysubmit mysubmitbig" type="submit" name="Submit" value="提交"></td>
        </tr>
    </table>

      <?php echo $inputmust;?>

</form>

<?php 

} 
else{echo '区块不存在 ';}

}

?>


<script>
    function checkhere(thisForm) {
        if (thisForm.title.value == "")
        {
            //alert("请输入标题。");
           // thisForm.title.focus();
           // return (false);
        }

        // return;

    }

   


</script>





<?php 

 }  // then update block content of the column

 ?>


 