//技术支持 DM建站系统 www.demososo.com

jQuery(function(){
	
	//console.log($(document).scrollTop());

dmfull_height();
dmnodetab();
ordernowclick();
 
 //alert($(document).width());

if($('body').width()>800)  {
	superfish();
 
	sidermenutop();
	}
else{dmmobjs();
 $(".nav-button").click(function () {
				$(".nav-button").toggleClass("open");
				if($(".menu").hasClass('show'))  $(".menu").hide().removeClass('show'); 
				else $(".menu").show().addClass('show'); 
			}); 
//--------
 $('.menu').height(0);
//-----
}
 

			
$("[data-type='imgpara']").each(function(){
     $(this).css({
		  "background-position":"center -50px"
		  });
     
});

 $("[data-type='imgpara']").parallax({
		speed: 0.20
	});
$('.detailfontsize a').click(function(){
    var thisv = $(this).data('size');
	$('.detailfontsize a').removeClass('cur');
	$(this).addClass('cur');
	$('.content_desp p,.content_desp').css({'font-size':thisv,'line-height':'30px'});
	 
});
/*-----newstab toggledesp----------*/
$(".toggledesp .despjj").eq(0).show();
  $(".toggledesp li").hover(function(){
        $(this).siblings().find(".despjj").hide();
         $(this).find(".despjj").show();
        },function(){
       
        });
//-----------------
		
 

if($('.homenotice .cnt').length>0){
	 popcookie = getCookie('popcookie');
	 if(!popcookie){
	 	  $.fancybox.open("#homenoticedesp")
			// var v = $('.homenotice .desp').html();
			// popup(v,'');
		}
	setCookie('popcookie',true);	 
}


  
onlineqq();  
 $(".popup").fancybox();
 
 dmedit();
 tabs_switch(); 
 
 headermobsearch();
 clicknextshow();
//change video width and height
$('.videodesp iframe,.videodesp embed').attr('style','');
 $('.videodesp iframe,.videodesp embed').attr('width','100%').attr('height','100%');
 
 //--------end ready---
   
});
//-----------------------------


 function clicknextshow(){ 
	 $('.clicknextshow').click(function(event) {
		 $(this).next().toggle();//slideToggle
	});
}

 function headermobsearch(){ 
	 	$('.headermobsearch').click(function(){ 
	 		 $(".topsearchbox").slideToggle();
			 
			 // if($(".menu").hasClass('show'))  $(".menu").hide().removeClass('show'); 
			 // $(".nav-button").toggleClass("open");
  
	 
	 	}); 		
 	}

 function dmedit(){ 
	$('.block').hover(function(){ 
	        $(this).find('.dmedit').show();
		},function(){
		      $(this).find('.dmedit').hide();
		});
	$('.blockregion').hover(function(){ 
	        $(this).find('.dmeditregion').show();
		},function(){
		      $(this).find('.dmeditregion').hide();
		});



	
 }
 
 function makeimg100(){  //cancel ...
 	var cntwidth =$('.content_default').width()-10;
 	//alert(cntwidth);
	// $('.content_desp img,.albumupdown img,.caseright img,.perimgwrap img').each(function(){
  
   $('.content img').each(function(){
	  // console.log(cntwidth);
   	 
	 	   if($(this).width()>cntwidth) {
	 	     	$(this).attr('style','');
				$(this).addClass('perimgmax100');
				
	 	   			//$(this).attr('max-width','98%');
	 	   			//alert(cntwidth);
	 	   		}
	 		 
	 });
	 	    
}







//-----------------------------
function superfish(){ 
	jQuery('.needsuperfish ul.m').superfish({
				//useClick: true
			});

}
//-----------------
function dmmobjs(){
	$(".needmenumob").find("li ul.sub").each(function() {
			$(this).parent().prepend('<span class="sub-nav-toggle plus"></span>')
		});			
	$('.sub-nav-toggle').click(function(){
	      $(this).toggleClass("plus");
		  //if($(this).siblings("ul.sub").hasClass('show'))  $(this).siblings("ul.sub").removeClass('show');
		 // else $(this).siblings("ul.sub").addClass('show');
		// $(this).siblings("ul.sub").toggleClass('show');
		 if($(this).siblings("ul.sub").css("display") == "none")  {$(this).siblings("ul.sub").slideDown(500);}
		  else $(this).siblings("ul.sub").slideUp(500);		 
	});		

//------------
}
//-----------------------------
function onlineqq(){ 
	$('.onlineopen').click(function(){
			 $(this).hide();
				 $('.onlinecontent').show(); $('.onlineclose').show();
	});
	$('.onlineclose').click(function(){
			 $(this).hide();
				 $('.onlinecontent').hide(); $('.onlineopen').show();
	});
	
	 $('.sitecolorchange .onlineclosecolor').click(function(){
			$('.sitecolorchange').hide();
	});
	
	 
}
 
  
function bodymove(topv){ 
	  jQuery('body,html').animate({
                scrollTop: topv
            }, 500);
			 
}

//-----------------------------//nrg  themes
function tabs_switch(){ 
      $('.tabs_switch .tabs_item').click(function(){
		var $t = $(this);
		var curVal = $t.closest('.tabs_switch').find('.tabs_item').index(this);			
		$t.closest('.tabs_wrapper').find('.tabs_container:visible').fadeOut(300, function(){		 
			$t.closest('.tabs_wrapper').find('.tabs_container').eq(curVal).fadeIn(300);
		});

		$t.closest('.tabs_switch').find('.active').removeClass('active');
		$t.addClass('active');
		return false;
		//$t.parent().parent().find('.tabs-select-text .text').text($t.text());
	});
	
    

}
 
//-------------
function sidermenutop(){ 
     if($('.sidermenutop').length>0){
	    //$('.sidermenutop .subcatemenu').hide();
		//------------------
		 
		 $('.sidermenutop .maincatemenu').hover(function(){
				$(this).find('.subcatemenu').show();
			},function(){
				//$(this).find('.subcatemenu').hide();
		});

		
		
		//------------------
	 }

}
 
//-------------
 

 //JS操作cookies方法!
//写cookies
function setCookie(name,value)
{
	var Days = 1;
	var exp = new Date();
	exp.setTime(exp.getTime() + Days*24*60*60*1000);
	document.cookie = name + "="+ escape (value) + ";expires=" + exp.toGMTString();
}

function getCookie(name)
{
	var arr,reg=new RegExp("(^| )"+name+"=([^;]*)(;|$)");
	if(arr=document.cookie.match(reg))
	return unescape(arr[2]);
	else
	return null;
}
function delCookie(name)
{
	var exp = new Date();
	exp.setTime(exp.getTime() - 1);
	var cval=getCookie(name);
	if(cval!=null)
	document.cookie= name + "="+cval+";expires="+exp.toGMTString();
}

/*----------scrollscroll-------------------------------*/ 
$(window).scroll(function(){ 
  //var scrolldistance = $(document).scrollTop(); 
    if ($('.stickyPcMobi').length) {stickyfunc('.stickyPcMobi');	}
	if($('body').width()>800)  {
		if ($('.stickyPc').length) {stickyfunc('.stickyPc');	}
	}
	else{
		if ($('.stickyMobi').length) {stickyfunc('.stickyMobi');	}	
	}	
	 
	 
 });


 function stickyfunc(v){ 
  var strickyScrollPos = 25;
 if($('body').width()>800) var strickyScrollPos = 100;
		 
			if($(window).scrollTop() > strickyScrollPos) { 
				$(v).removeClass('fadeIn animated');
				$(v).addClass('stricky-fixed fadeInDown animated');
			}
			else if($(this).scrollTop() <= strickyScrollPos) {
				$(v).removeClass('stricky-fixed fadeInDown animated');
				$(v).addClass('slideIn animated');
			}
 }
function dmfull_height(){	 
		
			$('.dmfull_height li').css('height', $(window).height());
			 $(window).resize(function(){
				$('.dmfull_height li').css('height', $(window).height());
			 });
		
}

function dmnodetab(){
	$('.nodetabhd span').click(function(){
		var index= $(this).index();
		$('.nodetabhd span').removeClass('cur');
		$('.nodetabhd span').eq(index).addClass('cur');
		
		$('.nodetab .nodetabcntinc').hide();
		$('.nodetab .nodetabcntinc').eq(index).show();
		
	});
}
function ordernowclick(){
	var hash = window.location.hash;
	if(hash == '#ordernow')  ordernowFUNC();
 
	$('.ordernowclick').click(function(){
		
		 ordernowFUNC();
	});
}


function ordernowFUNC(){		
		 var topv=$('.ordertab').offset().top-100;
		 jQuery('body,html').animate({
                scrollTop: topv
            }, 500);
		 $('.nodetabhd span').removeClass('cur');
		$('.nodetabhd span.ordertab').addClass('cur');
		
		$('.nodetab .nodetabcntinc').hide();
		$('.nodetab .ordernowcnt').show();
	 
}


/*begin form js*/
function form_ajax(formtitle,ajaxformurl,ajaxsendemailurl,nodepidname,formpidname){  
  $('.formblock .error').hide();

     $('.formblock .submitloading').show();
     var tokenhour = jQuery('.contactpostnonce').data('tokenhour');
     var content = '表单标题：'+formtitle;
	 var thisvalue = '';
	 var  errorhint = false;

	$('.formblock .line').each(function(){
		var thiskey = $(this).find('.key span').text();
		var thistype = $(this).find('.key').data('typeinput');
		var thiserror = $(this).find('.key').data('error');

  if(thistype=='text' || thistype=='textarea')  {
      thisvalue = $.trim($(this).find('.value').val());

      if(thiserror=='error1' && thisvalue==''){
          $(this).find('.error').show();
          errorhint = true;           
      }
       
      if(thiserror=='error2' && !checkphone(thisvalue)){
          $(this).find('.error').show();
          errorhint = true;           
      }

      if(thiserror=='error3' && !checkemail(thisvalue)){
          $(this).find('.error').show();
          errorhint = true;           
      }
      if(thiserror=='error4' && !checknumber(thisvalue)){
          $(this).find('.error').show();
          errorhint = true;           
      }




  } 
  if(thistype=='checkbox'){ 
    thisvalue = '';
    $(this).find('input:checkbox:checked').each(function(){
          thisvalue = thisvalue+$(this).val()+',';         
    });

    if($(this).find('input:checkbox:checked').length==0){
        $(this).find('.error').show();
          errorhint = true; 
    }
  }
   if(thistype=='radio')   {
    thisvalue = $(this).find('input:radio:checked').val();
    if($(this).find('input:radio:checked').length==0){
        $(this).find('.error').show();
          errorhint = true; 
    }

  }
   if(thistype=='select')  {
     thisvalue = $(this).find('select').val();
       if(thisvalue==''){
        $(this).find('.error').show();
          errorhint = true; 
      }
  }
 
  var thiscnt = thiskey + ': ' + thisvalue + '<br />';
  content = content+thiscnt;




});

if(errorhint)  return;
 
//var content = '昵称：'+$('.homeliuyan .inp_name').val()+'<br />电子邮箱：'+$('.homeliuyan .inp_email').val()+'<br />手机：'+$('.homeliuyan .inp_phone').val()+'<br />内容：'+$('.homeliuyan .inp_content').val();
       jQuery.ajax({
            type: 'POST',
            url: ajaxformurl,
            dataType : "json",
            data: {content : content,nodepidname : nodepidname,tokenhour: tokenhour,pid: formpidname},  
            success: function(data){         
        
        if(data.id=='norepeat') { 
          $.fancybox.open([
                {content : '<p style="text-align:center;color:red;padding:50px;font-size:14px">请不要重复提交。</p>',
            },
                 ] );

         }
       if(data.id=='yes'){ fromajax_success();
              dmsendemail(content);
         }       
        $('.formblock .submitloading').hide();
      }
        });
    
    
}


function dmsendemail(contentv,ajaxsendemailurl){  

         jQuery.ajax({
            type: 'POST',
            url: ajaxsendemailurl,  
            dataType : "json",
            data: {content : contentv},  
            success: function(data){
          
                }
        });
    



  }



function fromajax_success(){    
$.fancybox.open([
    {content : '<p style="text-align:center;padding:50px;font-size:14px">提交成功。</p>',
},
     ] );
//------------
$('.formblock .submit').val('已提交').unbind().css('cursor','default');
//-------------
}


function checkphone(v){  
    var mobilePattern = /^(1[3568][0-9]{1})(-)?([0-9]{8})$/;
    return mobilePattern.test(v);
}
function checkemail(v){  
    var emailPattern = /^([.a-zA-Z0-9_-])+@([a-zA-Z0-9_-])+(.[a-zA-Z0-9_-])+/;
    return emailPattern.test(v);
}
function checknumber(v){  
    var  Pattern = /^[0-9]+.?[0-9]*/;
    return Pattern.test(v);
}

/*end form js*/



