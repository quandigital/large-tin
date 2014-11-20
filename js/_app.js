$('.menu-trigger').on('click', function(){
    $('.main-navigation').toggleClass('active');
    $('.menu-trigger').toggleClass('triggered');
    setTimeout(function(){
        $('.menu-trigger').toggleClass('triggered');
    }, 1400);
});

$(document).ready(function() {

});

