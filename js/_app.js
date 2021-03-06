var $ = jQuery.noConflict();
if (window.navigator.msMaxTouchPoints) {
    $( 'html' ).removeClass( 'no-touch' ).addClass( 'touch' );
}

$(document).ready(function() {

    // close the menu when the click occurs outside of the menu
    $(document).on('click', function(ev) {
        if ($('#menu').hasClass('active')) {
            var els = [];

            $.each($(ev.target).parents('#menu').children(), function(index, val) {
                els.push($(this)[0].className);
            });

            if (els.length === 0) {
                toggleClasses(1400);
                return false;
            } 
        }   
    });

    // let the user click the whole navigation corner and not only the link
    $('.navigation-corner').on('mouseenter', function() {
        if (!$('#menu').hasClass('active')) {
            $('.menu-trigger').toggleClass('hover');
        }
    }).on('mouseleave', function() {
        if (!$('#menu').hasClass('active')) {
            $('.menu-trigger').toggleClass('hover');
        }
    }).on('click', function() {
        if (!$('#menu').hasClass('active')) {
            // $('#menu').addClass('active');
            // $('.menu-trigger').toggleClass('hover');
            toggleClasses(0);
        }
    });

    // close animation after clicking on link
    $('#menu .top-menu a').on('click', function(event) {
        event.preventDefault();
        toggleClasses(2000);

        var thisA = $(this);
        setTimeout(function() {
            if (thisA.attr('href').match(new RegExp('^'+location.origin)) || thisA.attr('href').substr(0, 7) == 'mailto:') {
                var link = thisA.attr('href');
            } else {
                var link = location.origin + thisA.attr('href');
            }
            location.href = link;
        }, 1900);
    });

    // toggle the menu via clicks on the trigger
    $('.menu-trigger').on('click', function(){
        toggleClasses(1400);
    });


    // show a top bar (or not)
    if (breakpoints() == 'large') {
        $('body').removeClass('initial-menu');
    };

    $(window).smartresize(function() {
        if (breakpoints() == 'large') {
            $('body').removeClass('initial-menu');
        };
    });
});

function toggleClasses(timeout)
{
    $('#menu').toggleClass('active');

    $('.menu-trigger').toggleClass('triggered').removeClass('hover');
    setTimeout(function(){
        $('.menu-trigger').toggleClass('triggered');
    }, timeout); 
}