<div id="listnode" class="grid2ceng <?php echo $listcssname;?>">
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

  <li class="gcoverlayarrow <?php echo $cus_columnsvBoot;?>">
        <a data-fancybox-type="iframe" class="various"  <?php echo linktarget($linkurl);?>  href="<?php echo $linkurl?>">
            <div class="img">
                   <img src="<?php echo $imgv?>" alt="<?php echo $title?>"> 
                  </div>

                  <div  class="text transition5">
                    <h3><?php echo $title?></h3>
				       	    <div class="desp"><?php echo $despv?></div>
                  </div>

      </a>
      <a  <?php echo linktarget($linkurl);?>  data-fancybox-type="iframe"  href="<?php echo $linkurl?>" class="various linkarrow transition5"><i class="fa fa-mail-forward"></i></a>


 </li>


				<?php
            }//end foreach
 
?>
</ul>
</div>
 

 