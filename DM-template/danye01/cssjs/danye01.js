//技术支持 DM建站系统 www.demososo.com
 
jQuery(function(){
 if($('.menudanye').length>0) menudanye();
  
 //--------end ready---
   
});
//-----------------------------
 
//-----menudanye-------------
function menudanye(){ 
	
			$('.menudanye a').click(function(e){
				
				var hash =$(this).attr('href');
				hash = hash.substr(1);
				var topv = $('#'+hash).offset().top;
				 
				if($('body').width()<800)  {
					$('.menu').hide().removeClass('show');
					$(".nav-button").toggleClass("open");
					 topv = topv -50;
				}
				else  topv = topv -100;
				bodymove(topv);
				
				
			});
			
			if(!$('body').hasClass('page_index')){
				$('.menudanye a').each(function(e){
					var hash =$(this).attr('href');
					var newhash = 'index.php'+hash
					 $(this).attr('href',newhash);
				});
			}
			else{ 
				//e.preventDefault();
				// var hash = window.location.hash;
				
				//hash = hash.substr(1);
				//console.log(hash);
				//alert(hash);
				//var topv = $('#'+hash).offset().top;
				//var topv = $('#region580').offset().top;
				
				 //alert(topv);
				 //console.log(topv);
	 
			}

		 
} 
  
 
 

    