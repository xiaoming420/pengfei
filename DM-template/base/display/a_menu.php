<?php
/*
	欢迎使用DM企业建站系统，本系统由www.demososo.com开发。
*/
if(!defined('IN_DEMOSOSO')) {
	exit('this is wrong page,please back to homepage');
}
?>

<?php //get menu
$cusmenuarr = get_fieldarr(TABLE_MENU,$pidmenu,'pidname');
//pre($cusmenuarr);
$sta_cusmenu = $cusmenuarr['sta_cusmenu'];
$cusmenudesp= $cusmenuarr['cusmenudesp'];
 if($sta_cusmenu=='y')  {
    if($cusmenudesp=='') echo 'no text in menu.  pls edit.';
 	else echo web_despdecode($cusmenudesp);}
else{

echo '<ul class="m">';
//----------------------
global $andlangbh;
$sqlmenu = "SELECT * from ".TABLE_MENU." where   ppid='$pidmenu' and pid='0' and sta_visible='y'  $andlangbh order by pos desc,id";	
 //echo $sqlmenu;
if(getnum($sqlmenu)>0){
//------------
$menulist = getall($sqlmenu);	
//pre($menulist);
		foreach($menulist as $v){	
			$pidname=$v['pidname'];
			$menu_xiala=$v['menu_xiala'];
			$linkurl=$v['linkurl'];
			 $name=decode($v['name']); 
			$type=$v['type'];	

			if($type=='index') {
                 echo '<li class="m"><a class="m" href="index.html">'.$name.'</a></li>';
			}
			else if($type=='cust' or $type=='page') { 
            if($type=='page'){
				 $pagearr = get_fieldarr(TABLE_PAGE,$pidname,'pidname');
				 if($pagearr=='no'){$name='单页面不存在';$linkurl='0';}
				 else {
				 	 $name=decode($pagearr['name']);
				 	 $tid=$pagearr['id'];
				 	 $alias_jump='';
						$aliascc = alias($pidname,'page');
				 		$linkurl = url('page',$aliascc,$tid,$alias_jump); 

				 		 if($aliascc=='index') $linkurl = BASEURLPATH;
				 	}
				 }	
			 	 
			 	 if($aliascc=='index')   $target ='';
			 		else $target = linktarget($linkurl);

			 		$target ='';


			 		if($pidname==$mainpidname) $activemenu = ' active'; 
			 		else $activemenu = '';
                    echo '<li class="m"><a class="m'.$activemenu.'" '.$target.' href="'.$linkurl.'">'.$name.'</a>';
                    //-----sub menu----------------
                    if($menu_xiala<>'') echo web_despdecode($menu_xiala);
                    else{
						$sql22 = "SELECT * from ".TABLE_MENU." where pid='$pidname' and ppid='$pidmenu' and type<>'cate' and sta_visible='y' $andlangbh order by pos desc,id";	
						if(getnum($sql22)>0){
							$rowall22 = getall($sql22);	
								echo '<ul class="sub">';
								foreach($rowall22 as $v2){	
								 
									$pidname2=$v2['pidname'];
									$name2=decode($v2['name']);
									$linkurl2=$v2['linkurl'];
									$type2=$v2['type'];	

									if($type2=='page'){
										$pagearr2 = get_fieldarr(TABLE_PAGE,$pidname2,'pidname');
										if($pagearr2=='no' ){
											$name2='单页面不存在';$linkurl2='0';
										}
											else{
												$tid2 = $pagearr2['id'];
												$name2 = $pagearr2['name'];
						 						$alias_jump2='';	
						 						$aliascc2 = alias($pidname2,'page');
						 						$linkurl2 = url('page',$aliascc2,$tid2,$alias_jump2); 
						 					}
			 						}	
					                echo '<li><a '. linktarget($alias_jump2).'  href="'.$linkurl2.'">'.$name2.'</a></li>';

								}//end foreach
								echo '</ul>';

						}//end if(getnum($sql22)>0)
					 }//end menu_xiala		

                    //-----------

                    echo '</li>';


			}//end page

			 else{//cate menu part
			 		$sqlmenu = "SELECT * from ".TABLE_CATE." where pidname='$pidname' and sta_visible='y' $andlangbh order by pos desc,id limit 1";	 
					$row = getrow($sqlmenu); 
					$name = decode($row['name']);	$tid = $row['id'];	
					$alias_jump = $row['alias_jump'];

   					$aliascc = alias($pidname,'cate');
   					$url = url('cate',$aliascc,$tid,$alias_jump); 	
   					if($pidname==$mainpidname) $activemenu = ' active'; 
			 		else $activemenu = '';

		  			 echo '<li class="m"><a class="m'.$activemenu.'"  href="'.$url.'">'.$name.'</a>';

		  			 	//begin cate level 1 
					$sql = "SELECT * from ".TABLE_CATE." where pid='$pidname' and sta_visible='y' $andlangbh order by pos desc,id";	 
					if(getnum($sql)>0){
							$rowall = getall($sql);	
							echo '<ul class="sub">';
							foreach($rowall as $v){
								$name = decode($v['name']);	$tid = $v['id'];
								$pidname = $v['pidname'];	$last = $v['last'];		

					  			$alias_jump = $v['alias_jump'];
								$aliascc = alias($pidname,'cate');
   								$url = url('cate',$aliascc,$tid,$alias_jump);

					  			echo '<li><a '. linktarget($alias_jump).'  href="'.$url.'">'.$name.'</a>';
					  			
					  			 //begin cate level 2
					  			if($last<>'y'){

									$sql2 = "SELECT * from ".TABLE_CATE." where pid='$pidname' and sta_visible='y' $andlangbh order by pos desc,id";	 
										if(getnum($sql2)>0){
										$rowall2 = getall($sql2);	
										echo '<ul class="sub">';
										foreach($rowall2 as $v2){
											$name2 = decode($v2['name']);	$tid2 = $v2['id'];
											$pidname2 = $v2['pidname']; 

								  			$alias_jump2 = $v2['alias_jump'];					
						   					 
										   $aliascc2 = alias($pidname2,'cate');
   											$url2 = url('cate',$aliascc2,$tid2,$alias_jump2);

								  			echo '<li><a '. linktarget($alias_jump2).' href="'.$url2.'">'.$name2.'</a></li>';

								  		} //end foreach
								  		echo '</ul>';
								  	}//end num



					  			}//end if($last<>'y')

					  			echo '</li>';	

							}//end foreach
							echo '</ul>';
					}//end 	if(getnum($sql)>0)	
				

		  			 
		  			//---------
		  			 echo '</li>';


			 }//end cate

			}//end main foreach







//---------------

}//end if(getnum($sqlmenu)>0)
else {
	echo '<li>no menu</li>'; 
}

//----------------------
        echo '</ul>'; 


   }

 
?>

