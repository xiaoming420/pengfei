//技术支持 DM建站系统 www.demososo.com
 
jQuery(function(){
 //console.log($(document).scrollTop());

dmfull_height();
 
 //--------end ready---
   
});
//-----------------------------

 
function dmfull_height(){	 
		
			$('.dmfull_height li').css('height', $(window).height());
			 $(window).resize(function(){
				$('.dmfull_height li').css('height', $(window).height());
			 });
		
} 