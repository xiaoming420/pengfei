        <div class="boxcol-no <?php echo $cssname;?>">
 
           
              <?php if($kv<>''){ ?>  
                  
                <div class="img-no">
                <img   src="<?php echo get_img_def($kv);?>"  alt="<?php echo $namefront?>"> 
                </div>     
              
              <?php }  ?>  
            
            
           
            <div class="text">
                  
               <?php
               if($namefront<>'') echo '<div class="title">'.$namefront.'</div>';
             ?>     			  
              <?php
               if($despjj<>'') echo '<div class="despjj-no">'.$despjj.'</div>';
             ?>
			  
        
             <?php
               if($despv<>'') echo '<div class="desp-no">'.$despv.'</div>';
             ?>
			  
              <?php 
                 if($linkurl<>'') {  
              ?>
              <div class="dmbtn mt10 <?php echo $linkClass;?>">
                 <a class="more"  <?php echo linktarget($linkurl);?> href="<?php echo $linkurl?>"><?php echo $linktitle;?> > </a>
              </div>              
               <?php 
               }
              ?>
            </div>

      </div>
      
    