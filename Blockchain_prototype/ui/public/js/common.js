$(document).ready(function() {
    $('#main-container').load('unsigned_header_component/unsigned-header.html');
    $('#footer-container').load('footer_component/footer.html');
    $('#contact-us-popup-container').load('contact_us_popup_component/contact-us-popup.html');  
    $('#home-container').load('home_component/home.html');
    $('#about-us-conatiner').load('about_us_component/about-us.html');
    $('#faq-container').load('faq_component/faq.html');
    $('#keystore-file-container').load('keystore_file_modal_component/keystore-file.html')
    $('#enter-passkey-modal').load('unsigned_header_component/login_component/enter_passkey_component/enter_passkey.html');

    $(document).on('click', '.toggle-icon', function(){
        $('.header-wrapper').toggleClass('show-menu');
        setTimeout(function() {
            $('body').addClass('overflow-hidden-menu');
        },0.7);
    })
    $(document).on('click', '.close-icon', function(){
        $('.header-wrapper').removeClass('show-menu');
        $('body').removeClass('overflow-hidden-menu');
    })

    $('#about-us-conatiner').hide();
    $('#faq-container').hide();
    $(document).on('click', '.home-navigation', function(){
        $('#home-container').show();
        $('#about-us-conatiner').hide();
        $('#faq-container').hide();

    })
    $(document).on('click', '.navigation-link', function(){
        $('.header-wrapper').removeClass('show-menu');
        $('body').removeClass('overflow-hidden-menu');
        var attt_value = $(this).attr('data-attr');
         if( attt_value == "AboutUs"){
            $('#about-us-conatiner').show();
            $('#home-container').hide();
            $('#faq-container').hide();
        }
        else if(attt_value == "FAQ"){ 
            $('#faq-container').show();
            $('#about-us-conatiner').hide();
            $('#home-container').hide();
        }
        else if(attt_value == "ContactUs"){
            $('body').addClass('overflow-hidden-menu');
            
        }
        else if(attt_value == "Home"){
            $('#home-container').show();
            $('#about-us-conatiner').hide();
            $('#faq-container').hide();
        }
        else{
            $('#home-container').show();
        }
    })
    $(document).on('click', '.contact-popup-close', function(){
        $('#home-container').show();
        $('#about-us-conatiner').hide();
        $('#faq-container').hide(); 
        if($('body').hasClass('modal-open')){
            $('body').addClass('overflow-hidden-menu');
        }
        else{
            $('body').removeClass('overflow-hidden-menu');
        }
    })
       
    
});