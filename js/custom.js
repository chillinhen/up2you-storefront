jQuery(document).ready(function ($) {
    //alert('hallo');
    $('#menu-meta a').each(function(){
        $(this).wrapInner('<span></span>');
    });
    $('.buttongroup a').addClass('button');
    $('.buttongroup div:nth-child(2n)').css('background','red');
    
    
    //smooth scrolling
    $('a[href*=#]:not([href=#])').click(function () {
        if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') && location.hostname == this.hostname) {
            var target = $(this.hash);
            target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
            if (target.length) {
                $('html,body').animate({
                    scrollTop: target.offset().top
                }, 800);
                return false;
            }
        }
    });
    
    //tabbed Content - stories
    $("ul#tabs li:first-child, ul#tab li:first-child").addClass('active');
    $("ul#tabs li").click(function(){
        if (!$(this).hasClass("active")) {
            var tabNum = $(this).index();
            var nthChild = tabNum+1;
            $("ul#tabs li.active").removeClass("active");
            $(this).addClass("active");
            $("ul#tab li.active").removeClass("active");
            $("ul#tab li:nth-child("+nthChild+")").addClass("active");
        }
    });
    // some style tweaking
    if ($("#tabbed li").length) {
        $('ul#tabs, ul#tab').addClass('style');
    }

});

