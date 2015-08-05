$(window).on('load', function(){

    // add isotope
    $('#loop').isotope({
        itemSelector: 'article',
    });

    setTimeout(function(){
        //check if the post is in the viewport
        inViewport();

        // remove the preload class to animate the posts
        $('#loop').removeClass('preload');

    }, 200);

});


$(document)
    // hover effect
    .on('mouseover', '#loop article', function(){
        $(this).addClass('focus').css('cursor', 'pointer');
        $(this).siblings().addClass('unfocus');
    })
    // unhover
    .on('mouseleave', '#loop article', function() {
        $(this).removeClass('focus');
        $(this).siblings().removeClass('unfocus');
    })
    // when element is clicked (anywhere) go to article
    .on('click', '.user-post', function() {
        window.location = $(this).find('.postlink').attr('href');
    });

// after resize has finished
$(window).smartresize(function(){
    $('#loop').isotope({
        itemSelector: 'article'
    });
    inViewport();
});

// don't show the hover effect when the page is scrolled
$(document).on('scroll', function(){
    inViewport();
    $('#loop article').each(function(){
        $(this).removeClass('unfocus');
    });
});

/**
 * check whether the post is already in the viewport, if yes add a class to show it
 * @return void
 */
function inViewport() {
    var vwOffset = $(window).innerHeight() + $(window).scrollTop();
    $.each($('#loop article'), function() {
        var elemOffset = parseInt($(this).offset().top,10);

        if (elemOffset < vwOffset) {
            $(this).addClass('shown');
        } else {
            $(this).removeClass('shown');
        }
    });
}