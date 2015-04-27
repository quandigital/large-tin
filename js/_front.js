$(function(){
    overflowing();
    headingHeight();
    singleAction();
});

$(window).smartresize(function(e) {
    overflowing();
    headingHeight();
    if (!$('body').hasClass('overflowing') && breakpoints() == 'large') {
        var offset = $(location.hash).offset();
        setTimeout(function(){
            $(window).scrollTop(offset.top);
        }, 50);
    }
});

$(window).on('load', function(){
    // initial scroll
    if (location.hash !== '') {
        var offset = $(location.hash).offset();
        setTimeout(function(){
            $(window).scrollTop(offset.top);
        }, 50);
    };
});

function headingHeight()
{
    $('.full-screen h3').each(function() {
        $(this).removeAttr('style');       
    });

    if (breakpoints() == 'large') {
        var heights;
        $('.full-screen').each(function() {
            heights = 0;
            $(this).find('h3').each(function() {
                if (heights == 0) {
                    heights = $(this).height()/parseInt($(this).css('line-height'));
                } else {
                    heights = $(this).height()/parseInt($(this).css('line-height')) >= heights ? heights = $(this).height()/parseInt($(this).css('line-height')) : heights;
                }
            });
            $(this).find('h3').each(function() {
                if ($(this).height()/parseInt($(this).css('line-height')) !== heights) {
                    $(this).css('line-height', '2.4');
                }
            });
        });
    };
}

function overflowing()
{
    var homeSections = $('#frontpage').children('section');
    var overflowing = false;

    $.each(homeSections, function(){
        $('body').removeClass('overflowing');
        var hasOverflow = $(this).children('.contents').innerHeight() > $(this)[0].scrollHeight;
        if (!hasOverflow) {
            $(this).addClass('full-screen');
        } else {
            $(this).removeClass('full-screen');
            overflowing = true;
        }
        // console.log([$(this)[0].scrollHeight, $(this).children('.contents').innerHeight()]);
        // console.log($(this)[0].className +' has overflow? '+ hasOverflow + '/'+overflowing);
    });

    overflowing ? $('body').addClass('overflowing') : $('body').removeClass('overflowing');

    if ($('body').hasClass('overflowing')) {
        // remove 300px that are present because of the presentational css in #intro
        $('#main').css('height', $('#main').height() - 300);
    }
}

function singleAction() 
{    
    /**
     * set inital values for sections and offsets
     */
    
        // check the hash 
        var hash = location.hash;
        var section = $(hash);

        // if there is no hash, use the first section (#intro)
        if (hash == '' ) {
            hash = '#intro';
            location.hash = hash;
            section = $(hash);
        }

        findSections(section);

        // allow scroll
        var disableScroll = false
    
        // animate the first section differently on initial view
        var initialView = false;

        if (hash == '#intro') {
            initialView = true;
        } else {
            $('.dark-corner').css('top', '-200%');
            $('.intro-layout').css('top', '-4000px').addClass('already-seen');
        }

        $('.frontnav-item').each(function() {
            if ($(this).children('a').attr('href') == hash) {
                $(this).addClass('active');
            }
        });

        var animationDuration = 1000;

    /**
     * Smoothly move to the next section on "scroll"
     */

        $('html').on('mousewheel DOMMouseScroll onmousewheel touchmove scroll', function(e) {
            // don't animate when viewed on a small screen
            if (breakpoints() == 'large' && !$('body').hasClass('overflowing')) {
                $('#main').removeAttr('style');
                // prevent defaults/don't bubble
                if (e.target.id == 'el') return;
                e.preventDefault();
                e.stopPropagation();
                // if scrolling is disabled, i.e. there is already an animation don't do anything
                if (!disableScroll) {
                    // disable scroll --> throttle
                    disableScroll = true;
                    $(window).disablescroll();

                    //Determine Direction
                    if ( (e.originalEvent.wheelDelta && e.originalEvent.wheelDelta >= 0) || (e.originalEvent.detail && e.originalEvent.detail <= 0) ) {
                        // up
                        e.stopPropagation();
                        section = $(prevSection);

                        // if the scroll is back to intro
                        if (prevSection == '#intro' && nextSection !== '#concept') {

                            // reset the initial view 
                            initialView = true;

                            // reverse the animation
                            $('html, body').animate({
                                scrollTop: prevOffset.top
                            }, animationDuration, function() {
                                location.hash = '#' + section.attr('id');
                            });

                            $('.dark-corner').animate({
                                top: '-50%',
                            }, animationDuration * .5);

                            setTimeout(function() {
                                $('.intro-layout').animate({
                                    top: '0',
                                }, animationDuration * 1.5);
                            }, animationDuration * .25);
                        } else {
                            $('html, body').animate({
                                scrollTop: prevOffset.top
                            }, animationDuration, function() {
                                location.hash = '#' + section.attr('id');
                            });
                        }
                        findSections(section);
                    } else {
                        // down
                        e.stopPropagation();
                        section = $(nextSection);

                        // if this is the first view of the first section
                        if (initialView) {

                            $('.dark-corner').animate({
                                top: '-200%',
                                // left: '-5%'
                            }, animationDuration * .75);
                            setTimeout(function() {
                                $('.intro-layout').animate({
                                    top: '-4000px',
                                }, animationDuration * 2);
                            }, animationDuration * .25);
                            setTimeout(function() {
                                $('html, body').animate({
                                    scrollTop: nextOffset.top,
                                }, animationDuration, function() {
                                    location.hash = '#' + section.attr('id');
                                    findSections(section);
                                });
                            }, animationDuration);
                            initialView = false;
                        } else {
                            $('html, body').animate({
                                scrollTop: nextOffset.top
                            }, animationDuration, function() {
                                location.hash = '#' + section.attr('id');
                            });
                            findSections(section);
                        }
                    }

                    // enable scrolling after animationDuration
                    setTimeout(function(){
                        disableScroll = false;
                        $(window).disablescroll('undo');

                        $('.frontnav-item').each(function() {
                            $(this).removeClass('active');
                            if ($(this).children('a').attr('href') == '#' + section.attr('id')) {
                                $(this).addClass('active');
                            }
                        });
                    }, animationDuration + 500);
                }
            }
        }); // scroll

    /**
     * Side Navigation clicks
     */
        $('.frontnav-item').on('click', function(e) {
            e.preventDefault();
            // disable scroll --> throttle
            disableScroll = true;
            $(window).disablescroll();

            var goto = $(this).children('a').attr('href');
            section = $(hash);

            var clickedItem = $(this); // maintain scope within setTimeout
            $(this).addClass('clicking');
            $(this).siblings().each(function() {
                $(this).removeClass('active');
            });
            setTimeout(function() {
                clickedItem.addClass('active').removeClass('clicking');
            }, animationDuration * .25);

            if (initialView) {
                initialView = false;

                $('.dark-corner').animate({
                    top: '-200%',
                }, animationDuration * .75);
                setTimeout(function() {
                    $('.intro-layout').animate({
                        top: '-4000px',
                    }, animationDuration * 2);
                }, animationDuration * .25);
                
                setTimeout(function() {
                    $('html, body').animate({
                        scrollTop: $(goto).offset().top,
                    }, animationDuration, function() {
                        location.hash = '#' + $(goto).attr('id');
                        findSections($(goto));
                    });
                }, animationDuration);
            } else {
                console.log([prevSection, nextSection]);
                if (goto == '#intro') {
                    // reset the initial view 
                    initialView = true;

                    findSections($(goto));

                    console.log([prevSection, nextSection]);

                    // reverse the animation
                    $('html, body').animate({
                        scrollTop: $(goto).offset().top,
                    }, animationDuration, function() {
                        location.hash = goto;
                        findSections($(goto));
                    });

                    $('.dark-corner').animate({
                        top: '-50%',
                    }, animationDuration * .5);

                    setTimeout(function() {
                        $('.intro-layout').animate({
                            top: '0',
                        }, animationDuration * 1.5);
                    }, animationDuration * .25);
                } else {
                    console.log(goto);
                    setTimeout(function() {
                        $('html, body').animate({
                            scrollTop: $(goto).offset().top,
                        }, animationDuration, function() {
                            location.hash = '#' + $(goto).attr('id');
                            findSections($(goto));
                        });
                    }, 100);
                    initialView = false;
                }
            }

            // enable scrolling after animationDuration
            setTimeout(function(){
                disableScroll = false;
                $(window).disablescroll('undo');
            }, animationDuration);
        });
};

function findSections(section) {
    // get the previous and next section
    prevSection = (section.prev().length == 1 ) ? '#' + section.prev().attr('id') : '#' + section.attr('id');
    nextSection = (section.next().length == 1 ) ? '#' + section.next().attr('id') : '#' + section.attr('id');

    // get the offset of the prev/next sections to scroll to them
    prevOffset = $(prevSection).offset();
    nextOffset = $(nextSection).offset();
}

function debounce(fn, delay) {
    var timeout;

    return function () {
        var context = this,
            args = arguments;

        clearTimeout(timeout);
        timeout = setTimeout(function () {
            fn.apply(context, args);
        }, delay || 250);
    };
}