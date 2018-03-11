//add..............
$(document).ready(function(){
   
   if($('body').width()>800)  {
	   
  xiala_show(); 
  
   }
   else {
	    xiala_showmobile(); 
		
   }
   
	 
	 
	 
//---------end ready----------------------------------------
}); //end ready


function xiala_show(){
$(".navblock").hover(
	  function () {  
		//$(".navlang ul").addClass("hover");
		$(this).children(".xialabox").show();
	  },
	  function () {
		//$(".navlang ul")removeClass("hover");
		$(this).children(".xialabox").hide();
	  }
	);
//
}//end func


function xiala_showmobile(){
	
$(".navdm_mob .navbar-toggle").click(function(){
  $(".navdm").slideToggle();
});

 
}//end func
