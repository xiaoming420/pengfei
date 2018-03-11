<?php
/*
	power by JASON.ZHANG  DM建站  www.demososo.com
*/
if(!defined('IN_DEMOSOSO')) {
	exit('this is wrong page,please back to homepage');
}
?>
 <div class="contenttop">
  <a href="<?php echo $jumpv?>&file=add&act=add"><i class="fa fa-plus-circle"></i> 添加子分类 </a>
</div>


 
<?php
 $sqlsub = "SELECT * from ".TABLE_CATE." where  pid='$catid' $andlangbh order by pos desc,id";
 $rowlistsub = getall($sqlsub);
 if($rowlistsub=='no') {
  echo '<p>&nbsp;&nbsp;还没有分类，请添加...</p>';
  }
  else{
  ?>


 <form method=post action="<?php echo $jumpv;?>&act=subpos">
  <table class="formtab formtabhovertr" style="width:100%">
  <tr style="font-weight:bold;background:#eeefff;">
  <td   align="center">排序号</td>
    <td   align="left">分类名称</td>
    <td   align="center" class="mobhide">分类图片</td>
    <td  align="center">操作</td>
  
    <td  align="center">状态</td>
   
	<td width="50">其他</td>
  </tr>  
    <?php
   foreach($rowlistsub as $vsub){
           $tid=$vsub['id'];  $jsname = jsdelname($vsub['name']);
		   $level=$vsub['level'];$last=$vsub['last']; 
		   $cateimg=$vsub['cateimg']; 
		   $pidname=$vsub['pidname'];  $alias_jump=$vsub['alias_jump'];   		   
		   $aliascc = alias($pidname,'cate');	   
		   
		  // $catid=$vsub['pid'];//catid use edit when select degree cate.
            menu_changesta($vsub['sta_visible'],$jumpv,$tid,'sta_catesub');
        $edit_desp='<a class=but1 href='.$jumpv.'&file=edit&act=edit&pidname='.$pidname.'><i class="fa fa-pencil-square-o"></i> 修改</a>';
		$del_text= " <a href=javascript:del('delsubcate','$pidname','$jumpv','$jsname')  class=but2><i class='fa fa-trash-o'></i> 删除</a>";
 
 	$move= '<a class=but3 href='.$jumpv.'&file=move&act=edit&pidname='.$pidname.'>转移</a>';
 	 if($last=='n') $move='';

	 if($alias_jump<>'') $aliasjumpv = '<span class="cred" >(跳转)</span>';
		 else  $aliasjumpv = '';

		$url_subcc = url('cate',$aliascc,$tid,$alias_jump); 
		 $url_sub_httpcc = $userurl.$url_subcc;

		 
		  if($aliascc<>'') $texturl = $aliascc.'.html';
		else $texturl = 'category-'.$tid.'.html';


		 $url_subcc=l($url_sub_httpcc,$texturl.$aliasjumpv,'','');
					
//----if sub sub cat------------------------
         $sqlsub_sub = "SELECT * from ".TABLE_CATE." where  pid='$pidname' $andlangbh order by pos desc,id";		
         $row_sub = getall($sqlsub_sub);
		  if($row_sub<>'no') $sslevel = "update ".TABLE_CATE." set level=1,last='n' where id='$tid' $andlangbh limit 1";
			else $sslevel = "update ".TABLE_CATE." set level=1,last='y' where id='$tid' $andlangbh limit 1";
        iquery($sslevel); 
?>
  <tr <?php echo $tr_hide?>>
  <td align="center"><input type="text" name="<?php echo $tid;?>"  value="<?php echo $vsub['pos'];?>" size="5" /></td>
    <td align="left">

    <strong><?php echo decode($vsub['name']);?></strong>
     <br /><?php   echo $pidname;?>
     <br /><?php    echo $url_subcc;?><i class="fa fa-external-link-square"></i>

    </td>
     <td align="center" class="mobhide">
     		<?php
     			 echo  p2030_imgyt($cateimg,'y','y'); 
     		?>
     </td>

    <td align="center"><?php echo $edit_desp.$del_text.$move;?></td>
    
    <td align="center"> <?php   echo $sta_visible;?></td>
  
   <td>  <?php   echo $level.'-'.$last;?></td>
  </tr>
  
  <?php 
  
      //----if sub sub cat------------------------       
         if($row_sub<>'no'){
              foreach($row_sub as $v2_sub){
					$subtid=$v2_sub['id'];  $jsname = jsdelname($v2_sub['name']);
					$level_sub=$v2_sub['level'];$last_sub=$v2_sub['last'];
					
					$subname=$v2_sub['name'];  $alias_jump2=$v2_sub['alias_jump'];   
					$sub_pid=$v2_sub['pid'];
					$sub_cateimg=$v2_sub['cateimg'];
					$subpidname=$v2_sub['pidname'];
					$alias_sub=alias($subpidname,'cate');
				 
					menu_changesta($v2_sub['sta_visible'],$jumpv,$subtid,'sta_catesub');
					
					$edit_desp='<a class=but1 href='.$jumpv.'&file=edit&act=edit&pidname='.$subpidname.'><i class="fa fa-pencil-square-o"></i> 修改</a>';
					 
					$del_text= " <a  class='but2' href=javascript:del('delsubcate','$subpidname','$jumpv','$jsname')><i class='fa fa-trash-o'></i> 删除</a>";
				 
					$move='<a class="but3" href='.$jumpv.'&file=move&act=edit&pidname='.$subpidname.'>转移</a>';
					 if($last_sub=='n') $move='';

					if($alias_jump2<>'') $aliasjumpv2 = '<span class="cred" >(跳转)</span>';
					else  $aliasjumpv2 = '';
					
					$url_sub = url('cate',$alias_sub,$subtid,$alias_jump2); 
					$url_sub_http = $userurl.$url_sub;

					  if($alias_sub<>'') $subtexturl = $alias_sub.'.html';
					else $subtexturl = 'category-'.$tid.'.html';


					$url_sub2=l($url_sub_http,$subtexturl.$aliasjumpv2,'','');
					 
					
					 $sslevel = "update ".TABLE_CATE." set level=2,last='y' where id='$subtid' $andlangbh limit 1";
					iquery($sslevel); 
		
				?>  
				<tr <?php echo $tr_hide;?>>
				  <td align="center">&nbsp;&nbsp;├ <input type="text" name="<?php echo $subtid;?>"  value="<?php echo $v2_sub['pos'];?>" size="3" /></td>
					<td align="left" style="color:#999;padding-left:15px">
					 ├ <?php echo decode($subname);?>
					 <br /><?php   echo $subpidname;?>
					  <br /><?php   echo $url_sub2;?><i class="fa fa-external-link-square"></i>

					 </td>
					  <td align="center" class="mobhide">
				     		<?php
				     			 echo  p2030_imgyt($sub_cateimg,'y','y'); 
				     		?>
				     </td>
									 
					  <td align="center"><?php echo $edit_desp.$del_text.$move;?></td>
					   <td align="center"> <?php   echo $sta_visible;?></td>
						<td>  <?php   echo $level_sub.'-'.$last_sub;?></td>
				  </tr>
					
					<?php
						$ss2222 = "update ".TABLE_CATE." set level=2,last='y' where pidname='$subpidname'  $andlangbh limit 1";
						//echo $ss2222.'<br>';
						iquery($ss2222);
	}//end foreach
	
	$ss = "update ".TABLE_CATE." set level=1,last='n' where pidname='$pidname' $andlangbh limit 1";
	iquery($ss);
	 

			}
	 else{		
			$ss = "update ".TABLE_CATE." set level=1,last='y' where pidname='$pidname'  $andlangbh limit 1";
			iquery($ss);
	 }
	 
  }
  ?>

</table>

<div style="padding-bottom:22px"><input class="mysubmit" type="submit" name="Submit" value="排序" />
<br />
<?php echo $sort_ads?></div>
</form>
<?php
  }
  ?>