$(document).ready(function() {
    $('#loginSection').load('../footer_component/unsigned_header_component/login_component/login.html');
    $('#shareDetailsSection').load('../footer_component/unsigned_header_component/share_details_component/share-details.html')
    //Join Sidebar
    $('.open-revolution-link').on('click', () => {
        if($('body').hasClass('overflow-hidden')){
        }else{
            setTimeout(function() {
            $('body').addClass('overflow-hidden');
        },0.7);
        };
        $('#loginSection').addClass('signup-open');
    });
    //Login Sidebar
    $('.open-login-link').on('click', () => {
        if($('body').hasClass('overflow-hidden')){
        }else{
            setTimeout(function() {
            $('body').addClass('overflow-hidden');
        },0.7);
        }
        $('#loginSection').addClass('login-open');
    })

});