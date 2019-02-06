$(document).ready(function(){
    $('.tdr-working-options').on('click', 'a', function(){
        $(this).closest('ul').find('li').removeClass('active');
        $(this).closest('li').addClass('active');
    });
});