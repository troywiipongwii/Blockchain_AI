$(document).ready(function($) {
     $(".amount-value").keyup(function(){
        var input_raw_val = this.value;
        var input_value = input_raw_val.replace('$','');
       $(document).on('click','.inc-commit-value', function(){
            if(input_value >= 0){
                var inc_value = ++input_value;
                $(".amount-value").val('$' + inc_value);	
            }
       })
       $(document).on('click','.dec-commit-value', function(){
            if(input_value > 0){
                var dec_value = --input_value;
                $(".amount-value").val('$'+ dec_value);
            }
        })
    });
    $(".duration-value").keyup(function(){
        var input_month_val = this.value;
        var input_duration_value = input_month_val.replace('Month','');
        $(document).on('click','.inc-duration-month', function(){
            if(input_duration_value < 12 ){
                var inc_value = ++input_duration_value;
                $(".duration-value").val(inc_value + 'Month');	
            }
            else{

            }
        })
        $(document).on('click','.dec-duration-month', function(){
            if(input_duration_value > 1){
                var inc_value = --input_duration_value;
                $(".duration-value").val(inc_value + 'Month');	    
            }
        })
    });
    $(".estimated-value").keyup(function(){
        var input_raw_val = this.value;
        var input_value = input_raw_val.replace('$','');
        if(input_value == ''){
            if($(this).hasClass('error-msg-active')){
                $(this).removeClass('error-msg-active');
                $('.suceess-msg').hide();
                $('.error-msg').hide();
            }
        } 
        else if(input_value  == 150){
            $(this).addClass('sucess-active')
            $('.suceess-msg').show();
            $('.error-msg').hide();
            if($(this).hasClass('error-msg-active')){
                $(this).removeClass('error-msg-active');
            }
        }
    
        else{
            $('.error-msg').show();
            $('.suceess-msg').hide();
            $(this).addClass('error-msg-active')
            if($(this).hasClass('sucess-active')){
                $(this).removeClass('sucess-active');

            }
        }
       $(document).on('click','.inc-estimate-value', function(){
           if(input_value >= 0){
            var inc_value = ++input_value;
            $(".estimated-value").val('$' + inc_value);	
           }
            
       })
       $(document).on('click','.dec-estimate-value', function(){
            if(input_value > 0){
                var dec_value = --input_value;
                $(".estimated-value").val('$'+ dec_value);
            }
        })
    });
    $(".mint-reward-field").keyup(function(){
        var input_raw_val = this.value;
        var input_value = input_raw_val.replace('$','');
       $(document).on('click','.reward-inc-btn', function(){
           if(input_value >= 0){
            var inc_value = ++input_value;
            $(".mint-reward-field").val('$' + inc_value);	
           }
            
       })
       $(document).on('click','.reward-dec-btn', function(){
            if(input_value > 0){
                var dec_value = --input_value;
                $(".mint-reward-field").val('$'+ dec_value);
            }
        })
    });
   


    $(".mint-denarii-form input").focus(function(){
        $(this).addClass("field-focus");
      
        if($(this).hasClass('amount-value') || $(this).hasClass('estimated-value') ||  $(this).hasClass('mint-reward-field')){
            if($(this).val().includes('$')){

            }
            else{
                $(this).val('$');
                
            }
            
        }
        else if($(this).hasClass('duration-value') || $(this).hasClass('lock-period-value')){
            if($(this).val().includes('Month')){
            }
            else{
                $(this).val('Month');
            }
        }
    }).blur(function(){
        $(this).removeClass("field-focus");
        $(this).next('.val-button').removeClass('update-value');
        tmpval = $(this).val();
        if(tmpval == '') {
        if( $(this).hasClass('field-focus')){
            $(this).removeClass('field-focus');
            if($(this).hasClass('error-msg-active')){
                $(this).removeClass('error-msg-active');
            }
        }
        }
        else if(tmpval == '$'){
            if( $(this).hasClass('field-focus')){
                $(this).removeClass('field-focus');
               
            }
            $(this).val('');
        }
        else if(tmpval == 'Month'){
            if( $(this).hasClass('field-focus')){
                $(this).removeClass('field-focus');
               
            }
            $(this).val('');
        }
        else {
            $(this).addClass('field-focus');
        }
    });
});