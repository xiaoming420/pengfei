
<div class="ordernow">
<ul class="form">
      <li>
        <div class="w1">订购数量：</div>
         <div class="w2" class="inp_num">
              <div class="inpnum">
                    <span class="numfh cp numjian">-</span>
                      <span>
                      <input type="number"  class="inptext curnum" value="1"   name="num" />
                      </span>
                   <span class="numfh cp numjia">+</span>
               </div>
          </div>
    </li>

  <li>
        <div class="w1">客户姓名：(*)</div>
        <div class="w2"><input class="inptext yzfield fname" data-format="text" data-must="req"  data-error="请输入客户姓名" type="text" name="username" value="" /> 
         </div>
    </li>

      <li>
        <div class="w1">联系电话：(*)</div>
        <div class="w2"><input class="inptext yzfield fcellphone" data-format="text" data-must="req" data-error="请输入联系电话" type="text"  name="cellphone" value="" /> 
         </div>
    </li>
    <li>
        <div class="w1">电子邮箱：(*)</div>
        <div class="w2"><input class="inptext yzfield femail"  data-format="email" data-must="req"  type="text"  name="cellphone" value="" /> 
         </div>
    </li>

  <li>
        <div class="w1">详细地址：(*)</div>
        <div class="w2"><input class="inptext yzfield faddress" data-format="text" data-must="req"  data-error="请输入详细地址" type="text" name="address" value="" />  
         </div>
    </li>
  <li>
        <div class="w1">客户留言：</div>
        <div class="w2">
        <textarea class="inptextarea yzfield fcontent" name="comment">请输入补充信息</textarea>

         </div>
    </li>



      <li>
        <div class="w1">支付方式：</div>
        <div class="w2 payway"> 货到付款 
         </div>
    </li>
  


<li>
<?php
       global $ordernowtitle;
      global $detailid;
     ?>

<div class="ptb10 tc dmbtn ordernowsubmit">
<div class="more" id="<?php echo $detailid;?>">
<i class="fa fa-shopping-cart"></i> <span>
<?php   echo $ordernowtitle;?>
       </span>
       </div>
<div class="submitloading dn"> </div> 
       </div>

    </li>

</ul>
</div>
 
<?php  
//$inquerytooken = 'inq_'.date("Ymd_His_").rand(1111,9999);
 $tokenhour = 'inq_'.date("Ymd_H");//minute

 ?>
 <div    data-tokenhour="<?php echo $tokenhour?>"  class="contactpostnonce" style="display:none"> </div>
<!--end homeliuyan-->
 
<script>
$(function(){

    $('.ordernowsubmit .more').click(function() {
         homeliuyanvalidate();
        
    });;
});


function homeliuyanvalidate(){  
     
      var emailPattern = /^([.a-zA-Z0-9_-])+@([a-zA-Z0-9_-])+(.[a-zA-Z0-9_-])+/;
      var mobilePattern = /^(1[3568][0-9]{1})(-)?([0-9]{8})$/;


     $('.ordernow .yzfield').each(function(){  
      
           var yzvalue = $(this).val().trim();
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

if($('.ordernow .error:visible').length==0) {
  homeliuyan_ajax();
}
  

 
 

}

function homeliuyan_ajax(){  
     $('.homeliuyan .submitloading').show();
     var nodeid = jQuery('.ordernowsubmit .more').attr('id'); 

var tokenhour = jQuery('.contactpostnonce').data('tokenhour');
var curnum = jQuery('.curnum').val().trim();
var fname = jQuery('.fname').val().trim();
var fcellphone = jQuery('.fcellphone').val().trim();
var femail = jQuery('.femail').val().trim();
var faddress = jQuery('.faddress').val().trim();
var fcontent = jQuery('.fcontent').val().trim();
var payway = jQuery('.payway').text().trim();
var content = '姓名：'+fname+'<br />数量：'+curnum+'<br />联系方式：'+fcellphone+'<br />电子邮箱：'+femail+'<br />地址：'+faddress+'<br />支付方式：'+payway+'<br />补充内容：'+fcontent;
       jQuery.ajax({
            type: 'POST',
            url: '<?php echo BASEURL?>dmpostform.php?type=ordernow&lang=<?php echo LANGPATH?>', //这个是wp-admin/admin-ajax.php
      dataType : "json",
            data: {content : content,nodeid : nodeid,tokenhour: tokenhour},  
//这个很重要，它会产生上面两个hook:wp_ajax_view_site_description和 wp_ajax_nopriv_view_site_description
             //所以，这时会去调view_site_description函数，这才是真正要执行的部分。因为前面有add_action
            success: function(data){
         
        
        if(data.id=='norepeat') { 
          $.fancybox.open([
                {content : '<p style="text-align:center;color:red;padding:50px;font-size:14px"><?php echo LIUYAN_REPEAT?></p>',
            },
                 ] );

         }
       if(data.id=='yes'){ 
              homeliuyan_success(content);
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



function homeliuyan_success(content){  
 
//http://fancyapps.com/fancybox/#useful , so  use fancybox 
//http://jsfiddle.net/STgGM/
//http://jsfiddle.net/Py2RA/
var content = '<div style="padding:20px 0;line-height:26px"><h3>您的下单内容：</h3>'+content+'</div>';

$.fancybox.open([
    {content : content,
},
     ] );
//------------
$('.ordernowsubmit span').text('已下单');
$('.ordernowsubmit .more').unbind().css('cursor','default');
 
//-------------
}

 $(function(){

  $('.curnum').blur(function(){
     var curnum = $('.curnum').val();
             if(curnum<=0)  {alert('不能少于1');$('.curnum').val(1)}
   
    });


       $('.numjian').click(function(){
              
             var curnum = $('.curnum').val();
             if(curnum>=2)  curnum --;
             else {
             // alert('不能少于1');
            }
            
               $('.curnum').val(curnum);
                //totalprice(curnum);

       });
       $('.numjia').click(function(){       
             var curnum = $('.curnum').val();
             curnum ++;
             $('.curnum').val(curnum);
           //  totalprice(curnum);
        
       });

});
</script>