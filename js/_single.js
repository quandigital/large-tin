jQuery(document).ready(function($) {
    hljs.initHighlightingOnLoad();
    
    if (breakpoints() == 'large') {
        titleScroll();
    };

    $(window).smartresize(function() {
        if (breakpoints() !== 'large') {
            $('.single-title, #sidebar .author').removeAttr('style');
            $('#sidebar, .navigation-corner').removeClass('fade');
            $('.single-title').removeAttr('style');
        };        
    });
});

function titleScroll()
{
    $(window).on('scroll', function(){
        var scrOff = $(window).scrollTop();
        // $('.cover-image').css('background-position', '50% ' + (scrOff/10+50) +'%');
        $('.single-title').css('top', 30 + (scrOff * .025) +'vh');

        if (scrOff/$(window).height() >= 0.01) {
            $('#sidebar .author').css('opacity', 1-((scrOff/$(window).height()).toFixed(2)*2));
        } else {
            $('#sidebar .author').css('opacity', 1);
        }

        if (scrOff/$(window).height() >= 0.45) {
            $('#sidebar, .navigation-corner').addClass('fade');
        } else {
            $('#sidebar, .navigation-corner').removeClass('fade');
        }

    });
}