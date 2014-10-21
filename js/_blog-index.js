
$(window).on('load', function(){
    // add isotope
    $('#loop').isotope({
        itemSelector: 'article'
    });

    setTimeout(function(){
        //check if the post is in the viewport
        inViewport();
        console.log($(window).scrollTop());
        // remove the preload class to animate the posts
        $('#loop').removeClass('preload');
    }, 200);

    // get all posts
    $.ajax({
        type: 'POST',
        url: ajaxurl,
        data: {
            action: 'quan_get_all_posts',
        },
        success: function(response) {
            $('#loop').isotope('insert', $(response));

            setTimeout(function(){
                $('#loop').isotope({
                    itemSelector: 'article'
                });
            },500);
            inViewport();
        }
    });
});

$(document).on('mouseover', 'article', function(){
        $(this).addClass('focus');
        $(this).siblings().addClass('unfocus');
    }).on('mouseleave', 'article', function() {
        $(this).removeClass('focus');
        $(this).siblings().removeClass('unfocus');
    });

$(window).smartresize(function(){
    $('#loop').isotope({
        itemSelector: 'article'
    });
    inViewport();
});

$(document).on('scroll', function(){
    inViewport();
    $('#loop article').each(function(){
        $(this).removeClass('unfocus');
    });
});

function inViewport() {
    var vwOffset = $(window).innerHeight() + $(window).scrollTop();
    $.each($('#loop article'), function() {
        var elemOffset = parseInt($(this).offset().top,10);

        if (elemOffset + 100 < vwOffset) {
            $(this).addClass('shown');
        };
    });
}