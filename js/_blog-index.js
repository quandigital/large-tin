// check if the blog is paged (unlikely but can happen); if yes redirect to /blog
var pathname = window.location.pathname; // returns path only
var tagID = $.urlParam('tag');

if(pathname.match("^/blog") && ! pathname.match("blog/$")) {
    window.location.href = '/blog/';
} else if(tagID) {
    window.location.replace('./' );
}

$(window).on('load', function(){
    var refresh = false
    if (document.referrer.match("^(https?:\/\/)(www.)?([a-zA-Z0-9-\.]*)(\/blog)(.*)")) {
        refresh = true;
    }

    // add isotope
    
    $('#loop').imagesLoaded(function() {
        $(this).isotope({
            itemSelector: 'article',
        });
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
                $('#loop')
                    .isotope({
                        itemSelector: 'article',
                    })
                    // redo isotope
                    .imagesLoaded(function() {
                        $(this).isotope({
                            itemSelector: 'article',
                        });
                    });

                // show all posts in the viewport
                inViewport();

                // if we have a previous scroll position
                if($.cookie('scrollTop') && refresh === true) {
                    
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

$(document).ready(function(){
    // filter the posts based on language and/or hide tweets
    $('.filter').show();

    // add the currently selected language to the handle
    $('#language-handle').text($('#language-options div:first-of-type').text()).data('lang', 'all')
        .on('click', function() {
            $('#language-filter').toggleClass('active');
        });

    // change the handle and filter the posts when a language is clicked
    $('#language-options .option').on('click', function(){
        $('#language-handle').data('lang', $(this).data('lang'));
        $('#language-handle').text($(this).text());    
        filterPosts();
        $('#language-filter').toggleClass('active');
    });

    // show/hide tweets
    $('#tweet-filter').on('change', function(){
        filterPosts();
    });
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
    .on('click', '.index-post', function() {
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

// save the current scroll position to a cookie
window.onbeforeunload = function() {
    $.cookie('scrollTop', $(window).scrollTop());
}

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

/**
 * filter the posts based on clicks on filter elements
 * @return false
 */
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
    }, 300);

    return false;
}