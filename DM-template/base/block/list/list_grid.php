<div id="listnode" class="<?php echo $listcssname;?>">     
      <?php 
      $cus_columnsvBoot = ' '.get_css_gridcolBoot($cus_columns);
      foreach($result as $v){
       $tid = $v['id'];
        $title = $v['title'];
        $pidname = $v['pidname'];$alias_jump = $v['alias_jump'];
        $imgv =  get_img_def($v['kvsm']);
       
        $despv =  get_nodedespjj($v['despjj'],$v['desp'],$v['desptext'],$cus_substrnum);       

 
        $alias=alias($pidname,'node');  
         $linkurl = url('node',$alias,$tid,$alias_jump);
        

    ?>
     <div class="boxcol <?php echo $cus_columnsvBoot;?>">
             <div class="img">
              <a  <?php echo linktarget($linkurl);?>  href="<?php echo $linkurl;?>">                  
              <img class="mt10" src="<?php echo $imgv?>"  alt="<?php echo $title?>">                 
            </a>

              
            </div>

             <div class="text">
              <h4 class="tc"><?php echo $title?></h4>    
              
             
            </div>
     </div>
  <?php
}
?>
 
</div>

