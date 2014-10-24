// check if the blog is paged (unlikely but can happen); if yes redirect to /blog
var pathname = window.location.pathname; // returns path only
var tagID = $.urlParam('tag');

if(pathname.match("^/blog") && ! pathname.match("blog/$")) {
    window.location.href = '/blog/';
} else if(tagID) {
    window.history.replaceState( history.state, 'BOO', './' );
}

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

    // get all posts
    $.ajax({
        type: 'POST',
        url: ajaxurl,
        data: {
            action: 'quan_get_all_posts',
        },
        success: function(response) {
            var insert = $('#loop').isotope('insert', $(response));

            setTimeout(function(){
                // redo isotope
                $('#loop').isotope({
                    itemSelector: 'article'
                });

                // show all posts in the viewport
                inViewport();

                // if we have a previous scroll position
                if($.cookie('scrollTop')) {
                    
                    // scroll there (duration relative to offset top)
                    $('html, body').animate({
                        scrollTop: $.cookie('scrollTop')
                    }, $.cookie('scrollTop') * .1);

                    // and remove the cookie
                    $.removeCookie('scrollTop');
                }
            }, 300);
        }
    });

});

// hover effect
$(document).on('mouseover', 'article', function(){
    $(this).addClass('focus');
    $(this).siblings().addClass('unfocus');
}).on('mouseleave', 'article', function() {
    $(this).removeClass('focus');
    $(this).siblings().removeClass('unfocus');
});

// after resize has finished
$(window).smartresize(function(){
    $('#loop').isotope({
        itemSelector: 'article'
    });
    inViewport();
});

// dont show the hover effect when the page is scrolled
$(document).on('scroll', function(){
    inViewport();
    $('#loop article').each(function(){
        $(this).removeClass('unfocus');
    });
});

// save the current scroll position to a cookie
window.onbeforeunload = function() {
    $.cookie('scrollTop', $(window).scrollTop());
}

// filter the posts based on language and/or hide tweets
$(document).ready(function(){
    $('.filter').show();
    $('#language-handle').text($('#language-options div:first-of-type').text()).data('lang', 'all')
        .on('click', function() {
            $('#language-filter').toggleClass('active');
        });

    $('#language-options .option').on('click', function(){
        $('#language-handle').data('lang', $(this).data('lang'));
        $('#language-handle').text($(this).text());    
        filterPosts();
        $('#language-filter').toggleClass('active');
    });

    $('#tweet-filter').on('change', function(){
        filterPosts();
    });
});



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

function filterPosts() {
    // language
    var langF = $('#language-handle').data('lang');

    if(langF !== 'all') {
        var lang = '.lang-' + langF; 
    } else {
        var lang = 'article';
    }

    // twitter
    var twitterF = $('#tweet-filter').prop('checked');

    if(twitterF) {
        var twitter = '';
    } else {
        var twitter = ':not(.index-tweet)';
    }

    // filter isotope
    $('#loop').isotope({
        filter: lang + twitter
    });

    setTimeout(function() {
        inViewport();
    }, 200);

    return false;
}