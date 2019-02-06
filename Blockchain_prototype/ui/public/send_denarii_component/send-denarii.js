$(document).ready(function($) {
     $(".send-denarii-amount").keyup(function(){
        var input_raw_val = this.value;
        var input_value = input_raw_val.replace('$','');
       $(document).on('click','.inc-send-denarii-amt-val', function(){
        if(input_value >= 0){
            var inc_value = ++input_value;
            $(".send-denarii-amount").val('$' + inc_value);
        }
       })
       $(document).on('click','.dec-send-denarii-amt-val', function(){
        if(input_value > 0){
            var dec_value = --input_value;
            $(".send-denarii-amount").val('$' + dec_value);
        }
        })
      });
   });  