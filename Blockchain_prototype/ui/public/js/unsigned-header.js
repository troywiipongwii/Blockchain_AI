$(document).ready(function() {

    //Join Sidebar
    $('.revolution-btn').on('click', () => {
        if($('body').hasClass('overflow-hidden')){
        }else{
            setTimeout(function() {
            $('body').addClass('overflow-hidden');
        },0.7);
        };
        $('#loginSection').addClass('signup-open');
    });
    //Login Sidebar
    $('.login-btn').on('click', () => {
        if($('body').hasClass('overflow-hidden')){
        }else{
            setTimeout(function() {
            $('body').addClass('overflow-hidden');
        },0.7);
        }
        $('#loginSection').addClass('login-open');
    })

});