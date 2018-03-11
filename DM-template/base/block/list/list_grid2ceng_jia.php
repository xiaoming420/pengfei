<div id="listnode" class="<?php echo $listcssname;?>">
<ul>
<?php
 $cus_columnsvBoot = ' '.get_css_gridcolBoot($cus_columns);
 
     foreach($result as $v){
         $strnum = 0;
        $tid = $v['id'];
        $title = $v['title'];
        $pidname = $v['pidname'];$alias_jump = $v['alias_jump'];
        
        $imgv =  get_img_def($v['kvsm']);
       
        $despv =  get_nodedespjj($v['despjj'],$v['desp'],$v['desptext'],$cus_substrnum);       

 
        $alias=alias($pidname,'node');  
         $linkurl = url('node',$alias,$tid,$alias_jump); 
        ?>

<li class="gcoverlayjia <?php echo $cus_columnsvBoot;?>">
     <a   <?php echo linktarget($linkurl);?>  href="<?php echo $linkurl?>">
         <div class="overlay"><span>+</span></div>
           <div class="img">
              <img src="<?php echo $imgv?>" alt="<?php echo $title?>">
            </div>
           <h3><?php echo $title?></h3>
    </a> 
</li>

        <?php
            }//end foreach
 
?>
</ul>
</div>
 