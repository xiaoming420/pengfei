<?php
if(!defined('IN_DEMOSOSO')) {
	exit('this is wrong page,please back to homepage');
}
?>
   <?php if($pagetop<>'')  {
            echo '<div class="c pagetop">';
                block($pagetop);
            echo '</div>';
      } 

    ?>

   <?php
	 if($sta_bread_posi=='t') require_once DISPLAYROOT.'b_bread.php';
	?>

   <?php 
 if($sta_sidebar=='')  $sta_sidebar='l';
         if($sta_sidebar=='l') {$sidebarcss = 'fl sdwidth'; $contentcss ='fr cntwidth';}
         if($sta_sidebar=='r') {$sidebarcss = 'fr sdwidth';$contentcss ='fl cntwidth';}
         if($sta_sidebar=='t' or $sta_sidebar=='b' or $sta_sidebar=='n')
          {$sidebarcss = 'sdper perwidth';$contentcss ='cntper perwidth';}         
           
        
          if($sta_sidebar=='t'){                
                 // if($sta_sidebar<>'n') require_once DISPLAYROOT.'b_sidebar.php';
                   if($modtype=='node') $modtype2='cate'; //bu guan what modtype,only cate or page in sidebar menu
                   else $modtype2='page';
                   require_once DISPLAYROOT.'b_sidebar_'.$modtype2.'_top.php';             
                   echo '<div class="c"></div>';
                  require_once DISPLAYROOT.'b_content.php';                     
          }

        else { //always content before sidebar
            require_once DISPLAYROOT.'b_content.php';
               if($sta_sidebar=='b')  echo '<div class="c"></div>';
              if($sta_sidebar<>'n') require_once DISPLAYROOT.'b_sidebar.php';
          }
   		
   		?>

        <div class="c"></div>

    
      <?php if($pagebot<>'')  {
        echo '<div class="c pagebot">';
              block($pagebot);
        echo '</div>';
        } 

    ?>
