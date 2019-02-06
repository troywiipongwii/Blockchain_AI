$(document).ready(function() {
    $(".interest-value").keyup(function(){
        var input_raw_val = this.value;
        var input_value = input_raw_val.replace('%','');
    $(document).on('click','.inc-interest-value', function(){
        if(input_value >= 0){
        var inc_value = ++input_value;
        $(".interest-value").val(inc_value + '%') ;
        }
    })
    $(document).on('click','.des-interest-value', function(){
        if(input_value > 0){
            var dec_value = --input_value;
            $(".interest-value").val(dec_value + '%');
            }
        })
    });

    $(".repay-amount").keyup(function(){
        var input_raw_val = this.value;
        var input_value = input_raw_val.replace('$','');
    $(document).on('click','.inc-repayment-amount-value', function(){
        if(input_value >= 0){
        var inc_value = ++input_value;
        $(".repay-amount").val(inc_value + '$') ;
        }
    })
    $(document).on('click','.des-repayment-amount-value', function(){
        if(input_value > 0){
            var dec_value = --input_value;
            $(".repay-amount").val(dec_value + '$');
            }
        })
    });

    $('.borrow-amount-value').keyup(function(){
        var input_amt_val = this.value;
        var input_value = input_amt_val.replace('$','');
        $(document).on('click','.inc-borrow-amt-value', function(){
        if(input_value >= 0){
            var inc_value = ++input_value;
            $(".borrow-amount-value").val('$' + inc_value);	
           }
       })
       $(document).on('click','.dec-borrow-amt-value', function(){
            if(input_value > 0){
                var dec_value = --input_value;
                $(".borrow-amount-value").val('$'+ dec_value);
            }
        })
    })
    $(".repayment-value").keyup(function(){
        var input_month_val = this.value;
        var input_duration_value = input_month_val.replace('Month','');
        $(document).on('click','.inc-repayment-value', function(){
            if(input_duration_value < 12 ){
                var inc_value = ++input_duration_value;
                $(".repayment-value").val(inc_value + 'Month');	
            }
            else{

            }
        })
        $(document).on('click','.des-repayment-value', function(){
            if(input_duration_value > 1){
                var inc_value = --input_duration_value;
                $(".repayment-value").val(inc_value + 'Month');	    
            }
        })
    });
    $(".borrow-denarii-container input").focus(function(){
        $(this).addClass("field-focus");
        if($(this).hasClass('interest-value')){
            if($(this).val().includes('%')){
                //
                
            }
            else{
                $(this).val('%');
            }
        }
        else if($(this).hasClass('borrow-amount-value')|| $(this).hasClass('repay-amount')){
            if($(this).val().includes('$')){

            }
        else if($(this).hasClass('request-date-value') || $(this).hasClass('due-date-field')){
            $(this).each(function() {
                $(this).datepicker();
            });
        }

            else{
                $(this).val('$');
            
            }
        }
        else if($(this).hasClass('repayment-value')){
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
        }
        }
        else if(tmpval == '%'){
            if( $(this).hasClass('field-focus')){
                $(this).removeClass('field-focus');
               
            }
            $(this).val('');
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



    $(".form-values-container input").focus(function(){
        $(this).addClass("field-focus");
        if($(this).hasClass('lend-amount-value') || $(this).hasClass('send-denarii-amount') || $(this).hasClass('request-denarii-value') || $(this).hasClass('mint-denarii-amount')){
            if($(this).val().includes('$')){

            }
            else{
                $(this).val('$');
                
            }
        }
        else if($(this).hasClass('request-date-value') || $(this).hasClass('due-date-field')){
            $(this).each(function() {
                console.log('date picker');
                $(this).datepicker();
                // $(this).addClass('date-picker-block');
            });
        }

        else if($(this).hasClass('duration-value') || $(this).hasClass('lock-period-value')){
            if($(this).val().includes('Month')){
            }
            else{
                $(this).val('Month');
            }
        }
        else if($(this).hasClass('expected-rate-value')){
            if($(this).val().includes('%')){
                
            }
            else{
                $(this).val('%');
            }
        }
        }).blur(function(){
        $(this).removeClass("field-focus");
        $(this).next('.val-button').removeClass('update-value');
        tmpval = $(this).val();
        if(tmpval == '') {
        if( $(this).hasClass('field-focus')){
            $(this).removeClass('field-focus');
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
        else if(tmpval == '%'){
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
