$(document).ready(function($) {
    $(".contact-us-popup-container input").focus(function(){
      $(this).addClass("field-focus");
   
     }).blur(function(){
      $(this).removeClass("field-focus");
      
      tmpval = $(this).val();
      if(tmpval == '') {
        if( $(this).hasClass('field-focus')){
            $(this).removeClass('field-focus');
        }
      }
       else {
          $(this).addClass('field-focus');
      }
     });
   });    