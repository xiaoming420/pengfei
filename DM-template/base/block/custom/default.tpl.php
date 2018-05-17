        <div class="boxcol <?php echo $cssname;?>">
 
           
              <?php if($kv<>''){ ?>  
                  
                <div class="img">
                <img class="mt10 mb10" src="<?php echo get_img_def($kv);?>"  alt="<?php echo $namefront?>"> 
                </div>     
              
              <?php }  ?>  
            
            
          
            <div class="text" style="width: 780px;">
                  
               <?php
               if($namefront<>'') echo '<h4 class="blockhd">'.$namefront.'</h4>';
             ?>     			  
              <?php
               if($despjj<>'') echo '<div class="despjj">'.$despjj.'</div>';
             ?>
			  
         

             <?php
               if($despv<>'') echo '<div class="desp">'.$despv.'</div>';
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
      
    