<?php
/*
	power by JASON.ZHANG  DM建站  www.demososo.com
*/
if(!defined('IN_DEMOSOSO')) {
	exit('this is wrong page,please back to homepage');
}

/***here is common list part  ****
***********/

	if($act=='insert'){ 
			if($abc1=="" or strlen($abc1)<3) {alert('请输入分类名称或字太少！');  jump($jumpv_file.'&act=add'); }
			ifhaspidname(TABLE_CATE,$catid);
			$pidname='csub'.$bshou;
			$ss = "insert into ".TABLE_CATE." (pid,pidname,pbh,name,last,level,lang) values ('$abc2','$pidname','$user2510','$abc1','y',1,'".LANG."')";
			 //echo $ss;exit;
			iquery($ss);
			//tongbu_pidname($table);//change id to pidname
			// alert("添加成功");
			 jump($jumpv_back.'&file=sublist');
	}
	 
 
 
 
 



  if($act=='add')	{
  ?>
<form  onsubmit="javascript:return catsub(this)" action="<?php  echo $jumpv_file.'&act=insert';?>" method="post" enctype="multipart/form-data">
<table class="formtab">

  <tr>
    <td width="12%" class="tr">分类名称：</td>
    <td width="88%"><input name="name" type="text" id="name" value="" class="form-control" />
     </td>
  </tr>


  <tr>
    <td width="12%" class="tr">选择分类的父级：</td>
    <td width="88%">
	<?php	
 $sql_sel = "select pidname,pid,name,sta_visible from  ".TABLE_CATE." where pid='$catid' and level=1 $andlangbh order by pos desc,id";
    $rowlist_sel = getall($sql_sel);
	//echo $sql_sel;exit;	
	?>
 <select name='pcla' class="form-control">
 <option  value='<?php echo $catid;?>'>(主类)<?php echo $catname;?></option>
<?php 
if($rowlist_sel<>'no'){
   foreach ($rowlist_sel as $vcla){  //by pidname is father.
			 
				 if($vcla['sta_visible']<>'y') $subname_hide22='(已隐藏)';else $subname_hide22='';			
			
					echo '<option value='.$vcla['pidname'].'>&nbsp;&nbsp;├ '.$vcla['name'].$subname_hide22.'</option>';
				
			}
 }
		?>
 </select> 
 

 </td>
  </tr>
  
  
 
  <tr>
    <td></td>
    <td> <input class="mysubmit" type="submit" name="Submit" value="添加"></td>
  </tr>
 </table>
</form>
<?php 
}
?>

 