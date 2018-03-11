<?php
/*
	power by JASON.ZHANG  DM建站  www.demososo.com
*/
if(!defined('IN_DEMOSOSO')) {
	exit('this is wrong page,please back to homepage');
}
?>
<?php
	
	if($act=='update'){  
	 
		 if($abc1=="" or strlen($abc1)<3) {
		 	alert('请输入分类名称或字太少！'); 
		 	 jump($jumpvedit);
		 	  }
		//if($abc3=="" or strlen($abc3)<3) {alert('请输入别名或字太少！');  jump($jumpv_editsub); }
		//if(!in_array($catid,$art_cat_id)){alert('先选择父级分类。');jump($PHP_SELF);}
		ifhaspidname(TABLE_CATE,$abc2);
		$catpidname_qian3=substr($abc2,0,3); 
		if($catpidname_qian3<>'cat')  {
		 
		$ss = "SELECT id from ".TABLE_CATE." where pid='$pidname' $andlangbh  limit 1";
		//$sub_pidname in mod file
				$row=getrow($ss);				 
				  if($row<>'no'){
							alert('出错，请先移走它的子分类。');//only judge when father cat is sub cat
							jump($jumpv);
						}
						
		 }		

			$ss = "update ".TABLE_CATE." set name='$abc1',pid='$abc2',sta_noaccess='$abc3',alias_jump='$abc4',cateimg='$abc5',listcssname='$abc6',maxline='$abc7',cus_substrnum='$abc8',cus_substrnum='$abc9',listfg='$abc10',detailfg='$abc11' where pidname='$pidname' $andlangbh limit 1";
			iquery($ss); 	
		    jump($jumpvedit);
	
	}

 if($act=='edit'){
	$ss = "select * from ".TABLE_CATE." where pidname= '$pidname' $andlangbh limit 1";
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

		   $listcssname=$row['listcssname']; 
    $maxline=$row['maxline']; 
    $cus_columns=$row['cus_columns']; 
    $cus_substrnum=$row['cus_substrnum'];
    $listfg=$row['listfg']; 
    $detailfg=$row['detailfg']; 

		  

}	 



  
	
if($act=='edit')	{
?>


  <div class="contenttop">

   <a class="needpopup" href="../mod_seo/mod_seo_edit.php?lang=<?php echo LANG;?>&act=edit&pidname=<?php echo $pidname;?>&type=cate"><i class="fa fa-pencil-square-o"></i> 修改SEO</a>

&nbsp;&nbsp;&nbsp;&nbsp;
  <a class="needpopup" href="../mod_seo/mod_alias_edit.php?lang=<?php echo LANG;?>&act=edit&pidname=<?php echo $pidname;?>&type=cate"><i class="fa fa-pencil-square-o"></i> 修改别名</a> 
  <?php 
  $alias= alias($pidname,'cate');
  if($alias<>'') echo '( '.spangray($alias).' )';
  ?> 
</div>



<form  onsubmit="javascript:return catsub(this)" action="<?php  echo $jumpvf;?>&act=update&pidname=<?php echo $pidname?>" method="post" enctype="multipart/form-data">
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

					   
			  if($opt_pidname == $subpid) $selected2=' selected="selected"';else $selected2='';

			  if($vcla['sta_visible']<>'y') $subname_hide22='(已隐藏)';else $subname_hide22='';

				//echo $opt_pidname.'--'.$cur_pidname.'|||';
				 if($opt_pidname<>$pidname){
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

  	
 



    <tr>
    <td class="tr">列表：</td>
    <td>
  
<?php echo $text_cssname;?>
 <br />
  <input name="listcssname" class="inputcss form-control"  type="text" value="<?php echo $listcssname; ?>"  /><?php echo $xz_maybe; ?>

   <div class="c5"></div>

    每页记录数maxline：

    <input name="maxline" type="text"  value="<?php echo $maxline; ?>" size="10">
   <span class="cgray">(为数字，且要大于0，仅作用于前台)</span>

<div class="c5"> ></div>


   列数：<select name="cus_columns">
                          <?php 
                         
                          select_from_arr($arr_columns,$cus_columns,'');?>
                     </select>

              <div class="c5"> </div>
                摘要的内容长度：
                <input name="cus_substrnum" type="text"   value="<?php echo $cus_substrnum; ?>"  size="10" />
                (为整数，如果为0，则不显示摘要)

                  <div class="c5"> </div>

              

                  <br />
                  <span class="cgray">(个别效果文件不适用于上面的 所有的参数)</span>


   

<div class="c5"> ></div>
   效果文件：
  <select name="listfg">
      <?php  
    select_from_arr($arr_listfg,$listfg,'');?>
     </select>
 <?php echo $xz_must;?> 
     </td>
  </tr>
 


     <tr>
      <td class="tr"><br />  详情页效果文件：</td>
      <td> <br />  
      <select name="detailfg">    
      <?php   
      select_from_arr($arr_detailfg,$detailfg,'');?>
      </select>
 <?php echo $xz_must;?>  
        </td>
    </tr>


  <tr>
    <td></td>
    <td> <input class="mysubmit" type="submit" name="Submit" value="修改"></td>
  </tr>
 </table>
</form>

  <?php } ?>
