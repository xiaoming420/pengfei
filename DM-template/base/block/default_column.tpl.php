                 
             
             <?php
         

        	if($blockid<>'') block($blockid);
        	else{
        		$linktitleV = '查看详情>';
        		if($linktitle<>'') $linktitleV = $linktitle;

        ?>

        <div class="boxcol <?php echo $cssname;?>">
 
           
              <?php if($kv<>''){ ?>  
                  
                <div class="img">
                 <?php 
                 if($linkurl<>'')  {
              ?>
              <a   <?php echo linktarget($linkurl);?> href="<?php echo $linkurl?>">
              <?php }
              ?>
                <img class="mt10 mb10" src="<?php echo get_img_def($kv);?>"  alt="<?php echo $namefront?>"> 
                 <?php 
                 if($linkurl<>'')  echo '</a>';
              ?>
                </div>     
              
              <?php }  ?>  
            
            
          
            <div class="text">
                  
                <?php
               if($namefront<>'') echo '<h4 class="blockhd">'.$namefront.'</h4>';
             ?> 
          
             <?php
               if($despv<>'') echo '<div class="desp">'.$despv.'</div>';
             ?>
			  
              <?php 
                 if($linkurl<>'') {  
              ?>
              <div class="dmbtn mt10">
                 <a class="more"  <?php echo linktarget($linkurl);?> href="<?php echo $linkurl?>"><?php echo $linktitleV;?> > </a>
              </div>              
               <?php 
               }
              ?>

            </div>

      </div>
      <?php
   			}
      ?>
      
    