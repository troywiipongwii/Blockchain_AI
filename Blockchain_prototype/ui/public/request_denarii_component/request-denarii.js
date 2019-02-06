$(document).ready(function($) {
    $(".request-denarii-value").keyup(function(){
        var input_raw_val = this.value;
        var input_value = input_raw_val.replace('$','');
      $(document).on('click','.inc-request-amt-value', function(){
        if(input_value >= 0){
          var inc_value = ++input_value;
          $(".request-denarii-value").val('$'  + inc_value);
        }
      })
      $(document).on('click','.des-request-amt-value', function(){
        if(input_value > 0){
          var dec_value = --input_value;
          $(".request-denarii-value").val('$' + dec_value);
        }
      })
    });
   

    $(document).on('click', '.request-date-value', function(){
        var tdate = new Date();
        var dd = tdate.getDate(); 
        var MM = tdate.getMonth(); 
        var yyyy = tdate.getFullYear(); 
        var currentDate = dd + "/" + MM + "/" + yyyy;

        $(".request-date-value").val(currentDate);
        $(document).on('click','.inc-request-value', function() {
            tdate.setDate(tdate.getDate()+1);
            $('input.request-date-value').val(tdate.getDate() + '/'+ tdate.getMonth()+ '/'+ tdate.getFullYear())
        });
        $(document).on('click','.dec-request-value', function() {
            tdate.setDate(tdate.getDate()-1);
            $('input.request-date-value').val(tdate.getDate() + '/'+ tdate.getMonth()+ '/'+ tdate.getFullYear())
        });
    });
    $(document).on('click', '.due-date-field', function(){
        var tdate = new Date();
        var dd = tdate.getDate(); 
        var MM = tdate.getMonth(); 
        var yyyy = tdate.getFullYear(); 
        var currentDate = dd + "/" + MM + "/" + yyyy;

        $(".due-date-field").val(currentDate);
        $(document).on('click','.inc-due-date', function() {
            tdate.setDate(tdate.getDate()+1);
            $('input.due-date-field').val(tdate.getDate() + '/'+ tdate.getMonth()+ '/'+ tdate.getFullYear())
        });
        $(document).on('click','.dec-due-date', function() {
            tdate.setDate(tdate.getDate()-1);
            $('input.due-date-field').val(tdate.getDate() + '/'+ tdate.getMonth()+ '/'+ tdate.getFullYear())
        });
    });
    
});
