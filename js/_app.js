$('.menu-trigger').on('click', function(){
    $('#menu').toggleClass('active');
    $('.menu-trigger').toggleClass('triggered');
    setTimeout(function(){
        $('.menu-trigger').toggleClass('triggered');
    }, 1400);

    $('#menu .top-menu a').on('click', function(event) {
        event.preventDefault();
        $('#menu').toggleClass('active');
        // console.log([location.pathname, window.location, $(this).attr('href')]);
        var thisA = $(this);
        setTimeout(function() {
            if (thisA.attr('href').match(new RegExp('^'+location.origin))) {
                var link = thisA.attr('href');
            } else {
                var link = location.origin + thisA.attr('href');
            }
            location.href = link;
        }, 1700);
    });
});

$(document).ready(function() {

});
