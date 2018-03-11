
 <div class="layoutsidebar fl col-xs-12 col-sm-12  col-md-2">
 
     <?php  require_once HERE_ROOT.'mod_seo/tpl_seo_node_sidebar.php'; ?>

</div>

 <div class="fl col-xs-12 col-sm-12  col-md-10">

 
 <?php 
   if($catid=='') echo '请在左边选择。';
   else{

        require_once  admreq('mod_seo/tpl_seo_node_list.php');

   }
    
?>

</div>
<div class="c"> </div>