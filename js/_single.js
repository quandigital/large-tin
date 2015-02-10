jQuery(document).ready(function($) {
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

        // console.log(scrOff);
    });
        // $('article p').each(function() {
        //     var text = $(this).text().substring(0,70);
        //     $(this).prepend(text+'<br/>');
        //     console.log();
        // });
});