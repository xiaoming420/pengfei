<div id="backtotop" style="display: none;">
        <a href="javascript:void(0)"> 
        <i class="fa fa-angle-up"></i>
        </a>
    </div>

<script>
$(function(){
 
         jQuery(window).scroll(function () {
             // if($('body').width()<800)  return false;
            if (jQuery(this).scrollTop() > 100) {
                jQuery('#backtotop').fadeIn();
            } else {
                jQuery('#backtotop').fadeOut();
            }
        });

        // scroll body to 0px on click
        jQuery('#backtotop a').click(function () {
            jQuery('body,html').animate({
                scrollTop: 0
            }, 500);
            return false;
        });
 


});
</script>