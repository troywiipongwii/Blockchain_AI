$(document).on('click', '.switch-node-progress-block', function(){
    $('.progress-bar-loading').animate(
        {width:'100%'}, 
        {
            duration:5000     
        }    
    )
});