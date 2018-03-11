<?php
/*
  欢迎使用DM企业建站系统，本系统由www.demososo.com开发。
 */
if (!defined('IN_DEMOSOSO')) {
    exit('this is wrong page,please back to homepage');
}
if ($act == 'insert') {
    // pre($_POST);
    //   exit;
    $pidnamecur = 'vblock' . $bshou;
    /*     * ***************** */
//$desp = zbdespadd2($abc3);    
 
    if ($abc1 == '')   $abc1 = '请输入标题';
//group_i20160101_0932453193 change vblock
    $arr_can='cus_columns:##1==#==cus_coldivi:##n==#==cus_showkvsm:##n==#==cus_cirimg:##n==#==cus_imgzoom:##n==#==cus_bxwidth:##300==#==cus_bxlinenum:##3==#==cus_bxpager:##true==#==cus_substrnum:##0==#==cus_showmorebtn:##n';
    $ss = "insert into " . TABLE_BLOCK . " (pbh,pid,pidname,lang,name,arr_can,dateday) values ('$user2510','$abc2','$pidnamecur','" . LANG . "','$abc1','$arr_can','$dateday')"; 
 
     // echo $ss;exit;
    iquery($ss);
   // alert("添加成功");
    //lang=cn&catpid=vipblock&catid=custom&page=1
     jump($jumpv.'&catpid='.$abc3.'&catid='.$abc2);
}



else{

?>
 
<form  onsubmit="javascript:return checkhere(this)" action="<?php echo $jumpv; ?>&file=add&act=insert" method="post" enctype="multipart/form-data">
    <table class="formtab">
        <tr>
            <td width="12%" class="tr">标题：</td>
            <td width="88%"> 
                <input name="title" type="text"   value="<?php echo $name; ?>" class="form-control" />  <?php echo $xz_must; ?> 
                
            </td>
        </tr>
        

   <tr>
            <td class="tr">区块的类型：</td>
            <td>  <select name="singlemb">
            <!--   <option value="">请选择</option> -->
                  <?php                  
                  select_from_arr($arr_block,$catid,'pls');?>
                   </select> 
                   <br />
                 <span class="cgray">  此项选择后不能再改。</span> 
            </td>

        </tr>

 


        <tr>
            <td></td>
            <td>  <br />
             <span class="cred">添加后，再进行详细修改。</span> 
             <br />
                <input  class="mysubmit" type="submit" name="Submit" value="提交">
                

                </td>
        </tr>
    </table>
</form>


<?php 
}
?>

<script>
    function checkhere(thisForm) {
        if (thisForm.title.value == "")
        {
            alert("请输入标题。");
            thisForm.title.focus();
            return (false);
        }

  if (thisForm.singlemb.value == "")
        {
            alert("请选择类型。");
            thisForm.singlemb.focus();
            return (false);
        }

  

        // return;

    }


</script>
