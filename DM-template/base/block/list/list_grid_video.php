<div id="listnode" class="<?php echo $listcssname;?>">
<ul>
<?php
 $cus_columnsvBoot = ' '.get_css_gridcolBoot($cus_columns);
 
  foreach($result as $v){
               
			   $cus_substrnum = 120;
		$tid = $v['id'];
        $title = $v['title'];
        $pidname = $v['pidname'];$alias_jump = $v['alias_jump'];
        
        $imgv =  get_img_def($v['kvsm']);
       
        $despv =  get_nodedespjj($v['despjj'],$v['desp'],$v['desptext'],$cus_substrnum);       
		 
 
        $alias=alias($pidname,'node');  
         $linkurl = url('node',$alias,$tid,$alias_jump);
 
		  
		  
				?>

	 <li class="boxcol <?php echo $cus_columnsvBoot;?>">
 <div class="img">
 <a   <?php echo linktarget($linkurl);?>   href="<?php echo $linkurl?>">
  <img class="mt10" src="<?php echo $imgv?>"  alt="<?php echo $title?>">
  
 <div class="bgvideoarrow"></div> 

 </a>

 </div>

<div class="text tc">
  <h4><a   <?php echo linktarget($linkurl);?>  href="<?php echo $linkurl?>" ><?php echo $title?></a></h4>  
	 
</div>
 
</li>


				<?php
            }//end foreach
 
?>
</ul>
</div>
 