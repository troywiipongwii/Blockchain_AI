$(document).ready(function() {

    $('#signed-header-container').load('ui/public/signed_header_component/signed-header.html');
    $('#send-denarii-conatainer').load('ui/public/send_denarii_component/send-denarii.html')
    $('#lend-denarii-container').load('ui/public/lend_denarii_component/lend-denarii.html')
    $('#request-denarii-container').load('ui/public/request_denarii_component/request-denarii.html')
    $('#borrow-denarii-modal-1').load('ui/public/borrow_denarii_component/borrow-denarii.html')
    $('#mint-denarii-contanier').load('ui/public/mint_danarii_component/mint-danarii.html')
    $('#dashboard_detail_component').load('ui/public/dashboard_detail_component/dashboard-detail.html');
    $('#dashboard_favourites_component').load('ui/public/dashboard_favourites_component/dashboard-favourites.html');
    $('#dashboard_all_denarii_component').load('ui/public/dashboard_all_denarii_component/dashboard-all-denarii.html');
    $('#dashboard_recent_transactions_component').load('ui/public/dashboard_recent_transactions_component/dashboard-recent-transactions.html');
    $('#dashboard_minting_component').load('ui/public/dashboard_minting_component/dashboard-minting.html');
    $('#dashboard_overview_component').load('ui/public/dashboard_overview_component/dashboard-overview.html');
    $('#dashboard-left-container').show();
    $('#share-details-wrap').load('ui/public/unsigned_header_component/share_details_component/share-details.html')
    $('#switch-node-progress-container').load('ui/public/switch_lite_node_progress_component/switch-lite-node-progress.html')
    $('#switch-node-popup-container').load('ui/public/switch_node_popup_component/switch-node-popup.html');
    $('#lite-full-node-popup-container').load('ui/public/lite_full_switch_node_popup_component/lite-full-switch-node-popup.html');
    $(document).on('click', '.signed-toggle-icon', function(){
        $('.signed-header-wrapper').toggleClass('show-signed-menu');
        if($('.signed-header-wrapper').hasClass('show-signed-menu')){
            $('body').addClass('overflow-hidden-menu');
        }
        else{
            $('body').removeClass('overflow-hidden-menu');
        }
    });

    $(document).on('click', '.menu-close-icon', function(){
        $('.signed-header-wrapper').removeClass('show-signed-menu');
        $('body').removeClass('overflow-hidden-menu');
    });
    
    $('#wallet-page').hide();
    $(document).on('click', '.signed-list-link', function(){
        var attr_value = $(this).attr('data-attr');
        $(this).addClass('signin-active');
        $(this).parents('.nav-item').siblings('.nav-item').find('.nav-link').removeClass('signin-active');
        if($('body').hasClass('overflow-hidden-menu')){
            $('body').removeClass('overflow-hidden-menu');
        }
        if( attr_value == "Dashboard"){
            $('#dashboard-page').addClass('active');
            $('#wallet-page,#learn-page').removeClass('active');
            $('#dashboard_detail_component').load('ui/public/dashboard_detail_component/dashboard-detail.html');
            $('#dashboard_favourites_component').load('ui/public/dashboard_favourites_component/dashboard-favourites.html');
            $('#dashboard_all_denarii_component').load('ui/public/dashboard_all_denarii_component/dashboard-all-denarii.html');
            $('#dashboard_recent_transactions_component').load('ui/public/dashboard_recent_transactions_component/dashboard-recent-transactions.html');
            $('#dashboard_minting_component').load('ui/public/dashboard_minting_component/dashboard-minting.html');
            $('#dashboard_overview_component').load('ui/public/dashboard_overview_component/dashboard-overview.html');
            onPageLoad();
        }  
        else if( attr_value == "Wallet"){
            $('#dashboard-page,#learn-page').removeClass('active');
            $('#wallet-page').addClass('active');
            $('#wallet_all_transactions_component').load('ui/public/wallet_all_transactions_component/wallet-all-transactions.html');
            $('#wallet_detail_component').load('ui/public/dashboard_detail_component/dashboard-detail.html');
            $('#wallet_favourites_component').load('ui/public/dashboard_favourites_component/dashboard-favourites.html');
            $('#wallet_all_denarii_component').load('ui/public/dashboard_all_denarii_component/dashboard-all-denarii.html');
            
        }
        else if( attr_value == "Mint"){
            $(document).on('click','.mint-denarii-close', function(){
                $('.nav-item').each(function(){
                    if($(this).find('a').attr('data-attr')=="Dashboard"){
                        $(this).find('a').addClass('signin-active');
                        $('#dashboard-page').addClass('active');
                        $('#wallet-page').removeClass('active');
                    }
                    else{
                        $(this).find('a').removeClass('signin-active');
                    }
                });
                
                
            })
        }

        else if( attr_value == "Learn"){
            $('#learn-page').addClass('active');
            $('#dashboard-page,#wallet-page').removeClass('active');
            $('#learn_component').load('ui/public/learn_component/learn.html');
            $('#learn_detail_component').load('ui/public/dashboard_detail_component/dashboard-detail.html');
            $('#learn_reward_component').load('ui/public/learn_component/learn_reward_component/learn-reward.html');
            $('#learn_quiz_component').load('ui/public/learn_component/learn_quiz_component/learn-quiz.html');
            $('#learn_detail_modal_component').load('ui/public/learn_component/learn_detail_modal_component/learn-detail.html');
        }
        else{
            $('#dashboard-page').addClass('active');
            $('#wallet-page').removeClass('active');
        }
        if($(window).width()<768){
            $(this).parents('.signed-header-wrapper').removeClass('show-signed-menu');
        }
    });
    $(document).on('click', '.dashboard-favourites-profile-wrap a', function(){
        var name = $(this).find('.dashboard-wallet-label').text();
        $('.send-denarii-container input').each(function(){
            $('.user-name-value').val(name);
            tmpval = $(this).val();
                if(tmpval == '') {
                    if( $(this).hasClass('field-focus')){
                        $(this).removeClass('field-focus');
                    }
                }
            else {
                $(this).addClass('field-focus');
            }
        })
        
    })
    $(document).on('click', '.signed-balance-navigation', function(){
        $(".share-details-popup").addClass('active');
        $('body').addClass('overflow-hidden-menu-popup');

    });
    $(document).on('click', '.darkshare-details-close-icon', function(){
        $("#share-details-wrap").removeClass('active');
        $('body').removeClass('overflow-hidden-menu-popup');
    })

    $(document).on('click', '.clear-value', function (e) {
        if($('body').hasClass('modal-open')){
            $('body').removeClass('overflow-hidden-menu');
        }
       
        var clearVal = $('input').val('');
        $('form input').each(function(){
            if( $(this).hasClass('field-focus')){
                $(this).removeClass('field-focus');
            }
            else {
            }
        });
    $(".form-values-container input").focus(function(){
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
        $(document).on('click', '#user-profile-pic', function(e){
            e.stopPropagation();
            $('.profile-dropdown-wrapper').toggle(250)
        });
        $(document).click(function(event){
            var $trigger = $("#user-profile-pic");
            if($trigger !== event.target && !$trigger.has(event.target).length){
                $(".profile-dropdown-wrapper").hide(250);
            } 
        });
        
        onPageLoad();
});

function onPageLoad() {

  setTimeout(function(){
    $('#dashboard_overview_component').find('.dashboard-component-main-wrapper').outerHeight($('#dashboard_detail_component').outerHeight());
    var your_overview_options = new CanvasJS.Chart("your-overview-chart-container", {
        animationEnabled: true,  
        title:{
            text: false
        },
        axisX: {
            valueFormatString: "MMM",
            labelFontColor: "#878fa4",
            lineColor: "#eeeeee",
            gridThickness: 1,
            tickLength: 10,
            tickColor: "transparent",
            gridColor: "#eeeeee"
        },
        axisY: {
            lineColor: "#eeeeee",
            labelFontColor: "#878fa4",
            tickColor: "transparent",
            includeZero: false,
            prefix: "$",
            gridColor: "#eeeeee"
        },
        axisY2: {
            lineColor: "#eeeeee",
            labelFontColor: "transparent",
            tickColor: "transparent",
            includeZero: false,
            gridColor: "#eeeeee"
        },
        legend: {
            cursor: "pointer",
        },
        data: [{
            type: "spline",
            name: "Transaction 1",
            showInLegend: false,
            xValueFormatString: "MMM YYYY",
            yValueFormatString: "$#,###",
            dataPoints: [
                { x: new Date(2016, 0, 1),  y: 120 },
                { x: new Date(2016, 1, 1), y: 135 },
                { x: new Date(2016, 2, 1), y: 144 },
                { x: new Date(2016, 3, 1),  y: 103 },
                { x: new Date(2016, 4, 1),  y: 93 },
                { x: new Date(2016, 5, 1),  y: 129 },
                { x: new Date(2016, 6, 1), y: 143 },
                { x: new Date(2016, 7, 1), y: 156 },
                { x: new Date(2016, 8, 1),  y: 122 },
                { x: new Date(2016, 9, 1),  y: 106 },
                { x: new Date(2016, 10, 1),  y: 137 },
                { x: new Date(2016, 11, 1), y: 142 }
            ]
        },
        {
            type: "spline",
            name: "Transaction 2",
            axisYType: "secondary",
            showInLegend: false,
            xValueFormatString: "MMM YYYY",
            yValueFormatString: "$#,###",
            dataPoints: [
                { x: new Date(2016, 0, 1),  y: 19034.5 },
                { x: new Date(2016, 1, 1), y: 20015 },
                { x: new Date(2016, 2, 1), y: 27342 },
                { x: new Date(2016, 3, 1),  y: 20088 },
                { x: new Date(2016, 4, 1),  y: 20234 },
                { x: new Date(2016, 5, 1),  y: 29034 },
                { x: new Date(2016, 6, 1), y: 30487 },
                { x: new Date(2016, 7, 1), y: 32523 },
                { x: new Date(2016, 8, 1),  y: 20234 },
                { x: new Date(2016, 9, 1),  y: 27234 },
                { x: new Date(2016, 10, 1),  y: 33548 },
                { x: new Date(2016, 11, 1), y: 32534 }
            ]
        }]
    });
    your_overview_options.render();

        var network_overview_options = new CanvasJS.Chart("network-chart-container", {
            animationEnabled: true,  
            title:{
                text: false
            },
            axisX: {
                valueFormatString: "MMM",
                labelFontColor: "#878fa4",
                lineColor: "#eeeeee",
                gridThickness: 1,
                tickLength: 20,
                tickColor: "transparent",
                gridColor: "#eeeeee"
            },
            axisY: {
                lineColor: "#eeeeee",
                labelFontColor: "#878fa4",
                tickColor: "transparent",
                includeZero: false,
                prefix: "$",
                gridColor: "#eeeeee"
            },
            data: [{
                type: "spline",
                name: "Transaction",
                showInLegend: false,
                yValueFormatString: "$#,###",
                xValueFormatString: "MMMM",
                dataPoints: [
                    { x: new Date(2016, 0, 1),  y: 19034.5 },
                    { x: new Date(2016, 1, 1), y: 20015 },
                    { x: new Date(2016, 2, 1), y: 27342 },
                    { x: new Date(2016, 3, 1),  y: 20088 },
                    { x: new Date(2016, 4, 1),  y: 20234 },
                    { x: new Date(2016, 5, 1),  y: 29034 },
                    { x: new Date(2016, 6, 1), y: 30487 },
                    { x: new Date(2016, 7, 1), y: 32523 },
                    { x: new Date(2016, 8, 1),  y: 20234 },
                    { x: new Date(2016, 9, 1),  y: 27234 },
                    { x: new Date(2016, 10, 1),  y: 33548 },
                    { x: new Date(2016, 11, 1), y: 32534 }
                    ]
            }]
        });
        
        network_overview_options.render();

        var semiBar = new ProgressBar.SemiCircle("#minting-progress-container", {
            strokeWidth: 7,
            trailWidth: 7,
            trailColor: "#e6e6e6",
            easing: "bounce",
            from: { color: "#3f9dfe", width: 7 },
            to: { color: "#3f9dfe", width: 7 },
            text: {
              value: '0',
              className: 'progress-text',
              style: {
                position: 'absolute',
                top: '51px',
                left: '50%',
                padding: 0,
                margin: 0,
                transform: null
              }
            },
            step: (state, shape, attachment) => {
              shape.path.setAttribute("stroke", state.color);
              shape.path.setAttribute("stroke-width", state.width);
              shape.setText('<span class="progress-value">'+Math.round(shape.value() * 100)+'</span> <span class="progress-percent">%</span>');
            }
          });
          semiBar.animate(0.75, {
            duration: 2000
          });
    }, 1000)    

}

