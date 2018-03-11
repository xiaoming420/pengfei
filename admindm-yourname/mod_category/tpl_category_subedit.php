<?php
/*
	power by JASON.ZHANG  DM建站  www.demososo.com
*/
if(!defined('IN_DEMOSOSO')) {
	exit('this is wrong page,please back to homepage');
}

/***here is common list part  ****
***********/

 
	
	if($act=='update'){  
	 
		 if($abc1=="" or strlen($abc1)<3) {alert('请输入分类名称或33字太少！');  jump($jumpv_editsub); }
		//if($abc3=="" or strlen($abc3)<3) {alert('请输入别名或字太少！');  jump($jumpv_editsub); }
		//if(!in_array($catid,$art_cat_id)){alert('先选择父级分类。');jump($PHP_SELF);}
		ifhaspidname(TABLE_CATE,$abc2);
		$catpidname_qian3=substr($abc2,0,3); 
		if($catpidname_qian3<>'cat')  {
		 
		$ss = "SELECT id from ".TABLE_CATE." where pid='$sub_pidname' $andlangbh  limit 1";
		//$sub_pidname in mod file
				$row=getrow($ss);				 
				  if($row<>'no'){
							alert('出错，请先移走它的子分类。');//only judge when father cat is sub cat
							jump($jumpv_back.'&file=sublist');
						}
						
		 }		

			$ss = "update ".TABLE_CATE." set name='$abc1',pid='$abc2',sta_noaccess='$abc3',alias_jump='$abc4',cateimg='$abc5',listfg='$abc6',listcssname='$abc7',seo1='$abc8',seo2='$abc9',seo3='$abc10' where id='$tid' $andlangbh limit 1";
			iquery($ss); 	
		 
		jump($jumpv_file.'&act=edit&tid='.$tid);
	
	}

 if($act=='edit'){
	$ss = "select * from ".TABLE_CATE." where id= '$tid' $andlangbh limit 1";
		$row = getrow($ss);
		if($row=='no'){alert($text_edit_nothisid);exit;}
		
		  $pidnamesub=$row['pidname'];
		  $sta_noaccess=$row['sta_noaccess'];
		  $name=$row['name'];
		  $seo1=$row['seo1'];
		  $seo2=$row['seo2'];
		  $seo3=$row['seo3'];
		  $alias_jump=$row['alias_jump'];
		  $cateimg=$row['cateimg'];
		  

}	 



  
	
if($act=='edit')	{
?>


<form  onsubmit="javascript:return catsub(this)" action="<?php  echo $jumpv_file;?>&act=update&tid=<?php echo $tid?>" method="post" enctype="multipart/form-data">
<table class="formtab">

  <tr>
    <td width="12%" class="tr">分类名称：</td>
    <td width="88%"><input name="name" type="text" id="name" value="<?php echo $name?>" class="form-control" />
     </td>
  </tr>
 
  
<tr>
    <td width="12%" class="tr">选择分类的父级：</td>
    <td width="88%">
	<?php	
 $sql_sel = "select pidname,pid,name,sta_visible from  ".TABLE_CATE." where pid='$catid' $andlangbh order by pos desc,id";
    $rowlist_sel = getall($sql_sel);
	//echo $sql_sel;exit;	
	?>
 <select name='pcla' class="form-control"><option  value='<?php echo $catid;?>'>(主类)<?php echo $catname;?></option>
<?php 
   foreach ($rowlist_sel as $vcla){  //by pidname is father.
			$opt_pidname=$vcla['pidname'];	
			$optname=$vcla['name'];

			// $sqlcate = "select * from  ".TABLE_CATE." where id='$tid' $andlangbh order by pos desc,id limit 1";
    		//$rowcate22 = getrow($sqlcate);
    		//$cur_pidname=$rowcate22['pidname'];	
    		//$cur_pid=$rowcate22['pid'];  //more to mod file


			//$cur_pid_here = web_getpid_cat($tid);
			//$pidname_here = web_getpidname_cat($tid);
			  
		   
			  if($opt_pidname == $sub_pid) $selected2=' selected="selected"';else $selected2='';

			  if($vcla['sta_visible']<>'y') $subname_hide22='(已隐藏)';else $subname_hide22='';

				//echo $opt_pidname.'--'.$cur_pidname.'|||';
				 if($opt_pidname<>$sub_pidname){
					echo '<option value='.$opt_pidname.$selected2.'>&nbsp;&nbsp;├ '.$optname.$subname_hide22.'</option>';
					 }
			}
 
		?>
 </select> 
 

 </td>
  </tr>
    <tr>
      <td  class="tr">禁止访问：</td>
      <td   ><select name="selxeacc">
	  <?php select_from_arr($arr_yn,$sta_noaccess,'');?>
     </select>
	 
	 <?php
	 if($sta_noaccess=='y') echo '<span style="color:red">禁止访问</span>';
	 ?>
        </td>
    </tr>

      <tr>
    <td class="tr">链接跳转：</td>
    <td><input name="alias_jump" type="text"  value="<?php echo $alias_jump?>" class="form-control" />
	  <?php echo $aliasjumptext.$xz_maybe;?>
      <?php if($row['alias_jump']<>'') { echo $text_jump;
      }?>
     </td>
  </tr>
   <tr>
    <td class="tr">分类图片：</td>
    <td><input name="cateimg" type="text"  value="<?php echo $cateimg?>" class="form-control" />
	  <?php echo $xz_maybe; 
       ?>
        <?php   echo  p2030_imgyt($cateimg,'y','y');
echo $text_imgfjlink; 
?>
     </td>
  </tr>

   <tr  style="background:#dde7ff">
      <td class="tr">分类列表页:</td>
      <td>
      显示类型：
      <select name="listfg">
      <option value="">继承主类</option>
	  <?php select_from_arr($arr_listfg,$row['listfg'],'');?>
     </select>
 <?php echo $xz_must;?>  
 <div class="c5"></div>
 列表页的<?php echo $text_cssname;?>
  <input name="listcssname" class="inputcss form-control"  type="text" value="<?php echo $row['listcssname']?>"  /><?php echo $xz_maybe; ?>

        </td>
    </tr>
	
  <tr>
    <td width="12%" class="tr">搜索引擎优化：</td>
    <td width="88%"> SEO标题：<input name="page_seo1" type="text" id="page_seo1" value="<?php echo $seo1 ;?>" class="form-control" />
      <?php echo $xz_maybe;?>
     <div class="c5"></div>SEO关键字：
      <input name="page_seo2" type="text" id="page_seo2" value="<?php echo $seo2;?>" class="form-control" />
      <?php echo $xz_maybe;?><br />多个关键字，请以空格隔开。
      <div class="c5"></div>
SEO描述：
<textarea id="page_seodesp" name="page_seodesp" class="form-control" rows="3" ><?php echo $seo3;?></textarea>
      <?php echo $xz_maybe;?>
      </td>
  </tr>


  <?php } ?>
  <tr>
    <td></td>
    <td> <input class="mysubmit" type="submit" name="Submit" value="修改"></td>
  </tr>
 </table>
</form>


 