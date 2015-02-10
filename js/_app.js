$(document).ready(function() {
    $(document).on('click', function(ev) {
        if ($('#menu').hasClass('active')) {
            var els = [];

            $.each($(ev.target).parents('#menu').children(), function(index, val) {
                els.push($(this)[0].className);
            });

            if (els.length === 0) {
                toggleClasses(1400);
            } 

            return false;
        }   
    });

    $('#menu .top-menu a').on('click', function(event) {
        event.preventDefault();
        toggleClasses(2000);

        var thisA = $(this);
        setTimeout(function() {
            if (thisA.attr('href').match(new RegExp('^'+location.origin))) {
                var link = thisA.attr('href');
            } else {
                var link = location.origin + thisA.attr('href');
            }
            location.href = link;
        }, 1900);
    });

    $('.menu-trigger').on('click', function(){
        toggleClasses(1400);
    });
    
});

function toggleClasses(timeout)
{
    $('#menu').toggleClass('active');
    $('.menu-trigger').toggleClass('triggered');
    setTimeout(function(){
        $('.menu-trigger').toggleClass('triggered');
    }, timeout); 
}