@@ -6,31 +6,12 @@ jQuery(document).ready(function ($) {
            $(this).toggleClass('open');
        });
    });
    
    ///active links
    $('.header nav a').click(function(){
        $(this).parent('li').addClass('active');
        $(this).parent('li').siblings().removeClass('active');
    });

    //external links
    $('a').filter(function () {
        return this.hostname && this.hostname !== location.hostname;
    }).attr("target", "_blank");

    //scroll-to-top
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
});
jQuery(document).ready(function () {

@@ -44,7 +25,7 @@ jQuery(document).ready(function () {
    });

    //Click event to scroll to top
    jQuery('.scroll-to-top a.back').click(function () {
    jQuery('.scroll-to-top').click(function () {
        jQuery('html, body').animate({scrollTop: 0}, 800);
        return false;
    });
