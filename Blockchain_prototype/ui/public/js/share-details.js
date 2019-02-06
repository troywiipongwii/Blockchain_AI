$(document).ready(function() {
    //Shared Details page functionality
    $('.darkshare-details-close-icon, .backdrop').on('click', () =>{
        $('#shareDetailsSection').removeClass('share-details-open');
    })
    $(".share-details-content input").focus(function(){
        $(this).addClass("field-focus");
        }).blur(function(){
        $(this).removeClass("field-focus");
        $(this).next('.val-button').removeClass('update-value');
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