jQuery(document).ready(function ($) {
    //alert('hallo');
    $('#menu-meta a').each(function(){
        $(this).wrapInner('<span></span>');
    });
    $('.buttongroup a').addClass('button');
});

