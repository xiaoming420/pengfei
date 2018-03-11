<?php
if(!defined('IN_DEMOSOSO')) {
	exit('this is wrong page,please back to homepage');
}
 
?>
<div class="sidebarmenu">
<div class="sdheader"><?php echo $maintitle?></div>
<div class="sdcontent">
<?php 

						 	//begin cate level 1 
					$sql = "SELECT * from ".TABLE_CATE." where pid='$mainpidname'  and sta_visible='y' $andlangbh order by pos desc,id";	 
					if(getnum($sql)>0){
							$rowall = getall($sql);	
							echo '<ul>';
							foreach($rowall as $v){
								$name = decode($v['name']);	$tid = $v['id'];
								$pidname = $v['pidname'];	$last = $v['last'];		

					  			$alias_jump = $v['alias_jump'];
								$aliascc = alias($pidname,'cate');
   								$url = url('cate',$aliascc,$tid,$alias_jump);
   								if($pidname==$curcatepidname) $activemenu = 'class="active" '; 
			 		             else $activemenu = '';

					  			echo '<li><a '.$activemenu.' '.linktarget($alias_jump).'href="'.$url.'">'.$name.'</a>';
					  			
					  			 //begin cate level 2
					  			if($last<>'y'){

									$sql2 = "SELECT * from ".TABLE_CATE." where pid='$pidname' $andlangbh order by pos desc,id";	 
										if(getnum($sql2)>0){
										$rowall2 = getall($sql2);	
										echo '<ul>';
										foreach($rowall2 as $v2){
											$name2 = decode($v2['name']);	$tid2 = $v2['id'];
											$pidname2 = $v2['pidname']; 

								  			$alias_jump2 = $v2['alias_jump'];					
						   					 
										   $aliascc2 = alias($pidname2,'cate');
   											$url2 = url('cate',$aliascc2,$tid2,$alias_jump2);
   								if($pidname2==$curcatepidname) $activemenu = 'class="active" '; 
			 		             else $activemenu = '';

								  			echo '<li><a '.$activemenu.' '.linktarget($alias_jump2).' href="'.$url2.'">'.$name2.'</a></li>';

								  		} //end foreach
								  		echo '</ul>';
								  	}//end num



					  			}//end if($last<>'y')

					  			echo '</li>';	

							}//end foreach
							echo '</ul>';
					}//end 	if(getnum($sql)>0)
				

 


?> 
</div>
<div class="sdcontent_bot"> </div>
</div>
