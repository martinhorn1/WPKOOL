jQuery(document).ready(function($) {
    "use strict";

    //FontAwesome Icon Control JS
    $('body').on('click', '.digital-services-icon-list li', function(){
        var icon_class = $(this).find('i').attr('class');
        $(this).addClass('icon-active').siblings().removeClass('icon-active');
        $(this).parent('.digital-services-icon-list').prev('.digital-services-selected-icon').children('i').attr('class','').addClass(icon_class);
        $(this).parent('.digital-services-icon-list').next('input').val(icon_class).trigger('change');
    });

    $('body').on('click', '.digital-services-selected-icon', function(){
        $(this).next().slideToggle();
    });

});
