<?php
/*
	欢迎使用DM企业建站系统，本系统由www.demososo.com开发。
*/
if(!defined('IN_DEMOSOSO')) {
	exit('this is wrong page,please back to homepage');
}
?>
<?php
 
   $sql = "SELECT * from ".TABLE_NODE." where pid='$pid' and modtype='blockdh' $andlangbh order by pos desc,id desc"; 
   if(getnum($sql)==0){ 
          echo '<br><br>没有找到相关内容。'; 
}
    else {
        $rowlisttext = getall($sql); 
 ?>
 
<div style="padding:5px;display:none">
  <form id="search_form" action="mod_node.php?lang=<?php echo LANG?>&catpid=<?php echo $catpid?>&catid=<?php echo $catid?>&page=<?php echo $page?>" method="post" accept-charset="UTF-8">         
  <input class="navsearch_input" type="text" name="searchword" value="请输入文章标题" style="width:350px;padding:5px;" onfocus="javascript:this.value='';" /> 
  <input type="submit" name="Submit" value="搜索" class="searchgo" style="padding:5px 10px;cursor:pointer" />
  </form> 
  </div>
  
<form method=post action="<?php echo $jumpv;?>&act=pos">
  <table class="formtab formtabhovertr">
  <tr style="font-weight:bold;background:#eeefff">
  <td   align="center">排序号</td>
    <td   align="center">标题</td>
   <td   align="center">kv图(大图)</td>
   <td   align="center">缩略图(小图)</td>
   <td   align="center">缩略图2(小图2)</td>
  
    <td  align="center">操作</td>

    <td   align="center">状态</td>
  
  </tr>
  <?php

        foreach($rowlisttext as $v){
		//echo print_r($rowlist,1);
		
            $tid = $v['id'];
            $jsname = jsdelname($v['title']);
			$name = '<strong>'.$v['title'].'</strong>';
			$cssname = $v['cssname'];
			$dateedit = $v['dateedit'];
      $desptext = $v['desptext'];$desp = $v['desp'];$despjj = $v['despjj'];
      
         $blockcntid = $v['blockcntid'];
     
      $linkurl = $v['linkurl'];
       $titlebz1 = $v['titlebz1'];$titlebz2 = $v['titlebz2'];$titlebz3 = $v['titlebz3'];

			$day =' ['.$v['dateday'].']';
			$pid = $v['pid'];
			$pidname = $v['pidname'];
      
           $kv = $v['kv']; $kvsm = $v['kvsm'];  $kvsm2 = $v['kvsm2']; 
			$alias = alias($pidname,'node');
			
			$sta_noaccess = $v['sta_noaccess'];
			
$url = url('node',$alias,$tid,'');
 
 

 menu_changesta($v['sta_visible'],$jumpv,$tid,'sta_node');
 
$edit_text= "<a class='but1' href='$jumpv&file=edit&tid=$tid&act=edit'><i class='fa fa-pencil-square-o'></i> 修改</a>";
 
 
$del_text= " <a href=javascript:del('delnode','$pidname','$jumpv','$jsname')  class=but2><i class='fa fa-trash-o'></i> 删除</a>";

 

    ?>
  <tr <?php echo $tr_hide?>>
  <td align="center"><input type="text" name="<?php echo $tid;?>"  value="<?php echo $v['pos'];?>" size="5" /></td>


    <td align="left">

 <?php echo $name;?> <br />

  <?php
  if($despjj<>'') echo '副标题：'.$despjj.'<br />';
  if($linkurl<>'') echo '链接：'.$linkurl.'<br />';

   if($titlebz1<>'') echo '备注1：'.$titlebz1.'<br />';
  if($titlebz2>'') echo '备注2：'.$titlebz2.'<br />';
  if($titlebz3<>'') echo '备注3：'.$titlebz3.'<br />';


  ?>

 </td>


<td align="center">
<div class="imgbg1">
<?php 
echo  p2030_imgyt($kv,'y','n');


?>
</div>

<p><a class="needpopup but4 pad8lr" style="width:auto"  href="../mod_module/mod_uploadkv.php?lang=<?php echo LANG?>&pidname=<?php echo $pidname?>&type=nodekv">修改kv图</a></p>
 </td>


<td align="center">
<div class="imgbg1">
<?php 
if($kvsm<>'')
 // echo  p2030_imgyt($kvsm,'y','n');
echo   get_img($kvsm,'','div');
?>
</div>
<p><a class="needpopup but4 pad8lr" style="width:auto" href="../mod_module/mod_uploadkvsm.php?lang=<?php echo LANG?>&pidname=<?php echo $pidname?>&type=nodekvsm">修改缩略图</a></p></td>

<td align="center">
<div class="imgbg1"><?php 
if($kvsm2<>'')  echo   get_img($kvsm2,'','div');
//echo   get_thumb($kvsm2,'','div');
?>
</div>
<p><a class="needpopup but4 pad8lr" style="width:auto" href="../mod_module/mod_uploadkvsm2.php?lang=<?php echo LANG?>&pidname=<?php echo $pidname?>&type=nodekvsm2">修改缩略图2</a></p>
</td>
 


  <td align="center"><?php echo $edit_text.$del_text;?></td>

    <td> <?php   echo $sta_visible;?></td>
    
  </tr>
<?php

    } ?>
</table>


<div style="padding-bottom:22px"><input class="mysubmit" type="submit" name="Submit" value="修改排序" />
<?php echo $sort_ads_f;?></div>
</form>

<?php 
}
?>
 
 