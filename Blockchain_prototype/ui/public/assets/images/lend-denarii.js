$(document).ready(function($) {	
	$(".lend-amount-value").keyup(function(){	
		var input_raw_val = this.value;
    var input_value = input_raw_val.replace('$','');
		$(document).on('click','.inc-lend-amount', function(){	
			if(input_value >= 0){
				var inc_value = ++input_value;	
				$(".lend-amount-value").val('$' + inc_value);	
			}
		})	
		$(document).on('click','.des-lend-amount', function(){	
			if(input_value > 0){
				var dec_value = --input_value;	
				$(".lend-amount-value").val('$' + dec_value);
			}
		})	
	});	
	$(".lock-period-value").keyup(function(){
		var input_month_val = this.value;
		var input_duration_value = input_month_val.replace('Month','');
		$(document).on('click','.inc-lock-period', function(){
			if(input_duration_value < 12 ){
				var inc_value = ++input_duration_value;
				$(".lock-period-value").val(inc_value + 'Month');	
			}
			else{

			}
		})
		$(document).on('click','.dec-lock-period', function(){
			if(input_duration_value > 1){
				var inc_value = --input_duration_value;
				$(".lock-period-value").val(inc_value + 'Month');	    
			}
		})
	});
	$(".expected-rate-value").keyup(function(){	
		var input_raw_val = this.value;
    	var input_value = input_raw_val.replace('%','');
		$(document).on('click','.inc-expected-rate', function(){
			if(input_value >= 0){
				var inc_value = ++input_value;	
				$(".expected-rate-value").val(inc_value + '%');	
			}
		})	
		$(document).on('click','.dec-expected-rate', function(){
			if(input_value > 0){
				var dec_value = --input_value;	
				$(".expected-rate-value").val(dec_value + '%');
			}
		})	
	});	
});
