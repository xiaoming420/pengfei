
<div class="homeliuyan">
 <div class="c line1">
    <div class="col-md-4 col-sm-4">   
     <span class="label"><?php echo LIUYAN_NAME?>：(*)</span>
     <input type="text" class="name yzfield inp_name" data-format="text" data-must="req"  data-error="<?php echo LIUYAN_INPUT.LIUYAN_NAME?>" name="yourname" value="" />
    
    </div>

    <div class="col-md-4 col-sm-4">
   
    <span class="label"><?php echo LIUYAN_EMAIL?>： (*)</span>
     <input type="text" class="email yzfield inp_email" data-format="email" data-must="req"  name="email" value="" />
  
    
    </div>

    <div class="col-md-4 col-sm-4">
  
    <span class="label"><?php echo LIUYAN_PHONE?>：(*)</span>
     <input type="text" class="title yzfield inp_phone" data-format="phone" data-must="req"   name="phone" value="" />
   
     
    </div>
</div>

<div class="line2">

<span class="label"><?php echo LIUYAN_CONTENT?>：(*)</span>
     <textarea class="message yzfield inp_content" data-format="text" data-must="req"  data-error="<?php echo LIUYAN_INPUT.LIUYAN_CONTENT?>" name="message" cols="40" rows="10"></textarea>
   
 </div>

 <div class="line3">
   <div class="dmbtn more3">   
  <input type="submit" class="more submit cp" value="<?php echo LIUYAN_SUBMIT?>">  

  <div class="submitloading dn"> </div> 
   </div>


</div>
</div><!--end homeliuyan-->
<?php  
//$inquerytooken = 'inq_'.date("Ymd_His_").rand(1111,9999);
 $tokenhour = 'inq_'.date("Ymd_H");//minute

 ?>
 <div    data-tokenhour="<?php echo $tokenhour?>"  class="contactpostnonce" style="display:none"> </div>
<!--end homeliuyan-->
 
<script>
$(function(){

    $('.homeliuyan .submit').click(function() {
         homeliuyanvalidate();
        
    });;
});


function homeliuyanvalidate(){ 
     
      var emailPattern = /^([.a-zA-Z0-9_-])+@([a-zA-Z0-9_-])+(.[a-zA-Z0-9_-])+/;
      var mobilePattern = /^(1[3568][0-9]{1})(-)?([0-9]{8})$/;


     $('.homeliuyan .yzfield').each(function(){
      
           var yzvalue = $(this).val();
           var yzformat = $(this).data('format');
           var yzmust = $(this).data('must');
           var yzerror = $(this).data('error');
       
        

          if(yzmust=='req'){  

               if(!$(this).hasClass('iserror')){
                  $(this).addClass('iserror');
                 // $('<p class="error dn"></span>').insertAfter($(this).parent());
                    $(this).parent().append('<p class="error dn"></p>');
                  }



      
           if(yzformat=='text'){
                if(yzvalue==''){               
                      //$(this).parent().siblings('.error').text(yzerror).show();
                      $(this).parent().find('.error').text(yzerror).show();                       
                     $(this).focus();                    
                   return false; 
                       }              
                else {$(this).parent().find('.error').hide();
                     
                }

           }
             else if(yzformat=='phone'){

                    if(yzvalue==''){                 
                          $(this).parent().find('.error').text('<?php echo LIUYAN_INPUT.LIUYAN_PHONE?>').show();
                         $(this).focus();
                          return false;
                           }   
                    else if(!mobilePattern.test(yzvalue)){                    
                          $(this).parent().find('.error').text('<?php echo LIUYAN_ERROREPHONE?>').show();
                         $(this).focus();
                          return false;
                           }  
 
                    else {$(this).parent().find('.error').hide();
                      
                        
                    }
                 }
            else if(yzformat=='email'){

                    if(yzvalue==''){                 
                          $(this).parent().find('.error').text('<?php echo LIUYAN_INPUT.LIUYAN_EMAIL?>').show();
                         $(this).focus();
                          return false;
                           }   
                    else if(!emailPattern.test(yzvalue)){                    
                          $(this).parent().find('.error').text('<?php echo LIUYAN_ERROREMAIL?>').show();
                         $(this).focus();
                          return false;
                           }  

                    else {$(this).parent().find('.error').hide();
                      
                        
                    }
                 }
                 

            }//end yzmust
 


  }); //end each

if($('.homeliuyan .error:visible').length==0) {
  homeliuyan_ajax();
}
  

 
 // else if(vcellphone=='') 
    //  {alert('请输入手机号码');
    //  $('.lpbox_form .cellphone').focus(); return false;
  //}
  //else if(!mobilePattern.test(vcellphone)) 
    //  {alert('手机格式不对');
     // $('.lpbox_form .cellphone').focus(); return false;
  //}
   


}

function homeliuyan_ajax(){  
     $('.homeliuyan .submitloading').show();
var tokenhour = jQuery('.contactpostnonce').data('tokenhour');
var content = '昵称：'+$('.homeliuyan .inp_name').val()+'<br />电子邮箱：'+$('.homeliuyan .inp_email').val()+'<br />手机：'+$('.homeliuyan .inp_phone').val()+'<br />内容：'+$('.homeliuyan .inp_content').val();
       jQuery.ajax({
            type: 'POST',
            url: '<?php echo BASEURL?>dmpostform.php?type=contact&lang=<?php echo LANGPATH?>', //这个是wp-admin/admin-ajax.php
      dataType : "json",
            data: {content : content,tokenhour: tokenhour},  
//这个很重要，它会产生上面两个hook:wp_ajax_view_site_description和 wp_ajax_nopriv_view_site_description
             //所以，这时会去调view_site_description函数，这才是真正要执行的部分。因为前面有add_action
            success: function(data){
         
        
        if(data.id=='norepeat') { 
          $.fancybox.open([
                {content : '<p style="text-align:center;color:red;padding:50px;font-size:14px"><?php echo LIUYAN_REPEAT?></p>',
            },
                 ] );

         }
       if(data.id=='yes'){ homeliuyan_success();
              dmsendemail(content);
         }       
        $('.homeliuyan .submitloading').hide();
      }
        });
    
    
}


function dmsendemail(contentv){  

         jQuery.ajax({
            type: 'POST',
            url: 'dmpostform.php?type=sendemail&lang=<?php echo LANG?>', //这个是wp-admin/admin-ajax.php
            dataType : "json",
            data: {content : contentv},  
            success: function(data){
          
                }
        });
    



  }



function homeliuyan_success(){    
    // popup('<p style="text-align:center;padding:50px;font-size:14px">留言成功</p>','popcontentbox1');
//http://fancyapps.com/fancybox/#useful , so  use fancybox 
//http://jsfiddle.net/STgGM/
//http://jsfiddle.net/Py2RA/
$.fancybox.open([
    {content : '<p style="text-align:center;padding:50px;font-size:14px"><?php echo LIUYAN_OK?>。</p>',
},
     ] );
//------------
$('.homeliuyan .submit').val('<?php echo LIUYAN_OK?>').unbind().css('cursor','default');
//-------------
}


</script>