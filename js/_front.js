$(document).ready(function(){
    var homeSections = $('#frontpage').children('section');

    $.each(homeSections, function(){
        $(this).addClass('full-screen');
    });
    
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

    /**
     * Smoothly move to the next section on "scroll"
     */
    
        $('html').on('mousewheel DOMMouseScroll onmousewheel touchmove scroll', function(e) {
            // don't animate when viewed on a small screen
            if (breakpoints() == 'large') { 
                // if scrolling is disabled, i.e. there is already an animation don't do anything
                if (!disableScroll) {
                    // prevent defaults/don't bubble
                    if (e.target.id == 'el') return;
                    e.preventDefault();
                    e.stopPropagation();

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
                            if (!$('.intro-layout').hasClass('already-seen')) {
                                $('.intro-layout').addClass('already-seen');
                            };

                            // reset the initial view 
                            initialView = true;

                            // reverse the animation
                            $('html, body').animate({
                            scrollTop: prevOffset.top
                            }, 2000, function() {
                                location.hash = '#' + section.attr('id');
                            });

                            $('.dark-corner').animate({
                                top: '-50%',
                            }, 1000);

                            setTimeout(function() {
                                $('.intro-layout').animate({
                                    top: '0',
                                }, 3000);
                            }, 500);
                        } else {
                            $('html, body').animate({
                                scrollTop: prevOffset.top
                            }, 2000, function() {
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
                            }, 1500);
                            setTimeout(function() {
                                $('.intro-layout').animate({
                                    top: '-4000px',
                                }, 4000);
                            }, 500);
                            setTimeout(function() {
                                $('html, body').animate({
                                    scrollTop: nextOffset.top,
                                }, 2000, function() {
                                    location.hash = '#' + section.attr('id');
                                    findSections(section);
                                });
                            }, 2000);
                            initialView = false;
                        } else {
                            $('html, body').animate({
                                scrollTop: nextOffset.top
                            }, 2000, function() {
                                location.hash = '#' + section.attr('id');
                            });
                            findSections(section);
                        }
                    }

                    // enable scrolling after 500ms
                    setTimeout(function(){
                        disableScroll = false;
                        $(window).disablescroll('undo');

                        $('.frontnav-item').each(function() {
                            $(this).removeClass('active');
                            if ($(this).children('a').attr('href') == '#' + section.attr('id')) {
                                $(this).addClass('active');
                            }
                        });
                    }, 1500);
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
            }, 500);

            if (initialView) {
                initialView = false;

                $('.dark-corner').animate({
                    top: '-200%',
                    // left: '-5%'
                }, 1500);
                setTimeout(function() {
                    $('.intro-layout').animate({
                        top: '-4000px',
                    }, 4000);
                }, 500);
                
                setTimeout(function() {
                    $('html, body').animate({
                        scrollTop: $(goto).offset().top,
                    }, 2000, function() {
                        location.hash = '#' + $(goto).attr('id');
                        findSections($(goto));
                    });
                }, 2000);
            } else {
                if (goto == '#intro') {
                    if (!$('.intro-layout').hasClass('already-seen')) {
                        $('.intro-layout').addClass('already-seen');
                    };

                    // reset the initial view 
                    initialView = true;

                    // reverse the animation
                    $('html, body').animate({
                        scrollTop: $(goto).offset().top,
                    }, 2000, function() {
                        location.hash = '#' + section.attr('id');
                        findSections($(goto));
                    });

                    $('.dark-corner').animate({
                        top: '-50%',
                    }, 1000);

                    setTimeout(function() {
                        $('.intro-layout').animate({
                            top: '0',
                        }, 3000);
                    }, 500);
                } else {
                    setTimeout(function() {
                        $('html, body').animate({
                            scrollTop: $(goto).offset().top,
                        }, 2000, function() {
                            location.hash = '#' + $(goto).attr('id');
                            findSections($(goto));
                        });
                    }, 100);
                    initialView = false;
                }
            }

            // enable scrolling after 1500ms
            setTimeout(function(){
                disableScroll = false;
                $(window).disablescroll('undo');
            }, 1500);
        });
    
});

$(window).on('load', function(){
    // initial scroll
    var offset = $(location.hash).offset();
    setTimeout(function(){
        $(window).scrollTop(offset.top);
    }, 50);
});

function findSections(section) {
    // get the previous and next section
    prevSection = (section.prev().length == 1 ) ? '#' + section.prev().attr('id') : '#' + section.attr('id');
    nextSection = (section.next().length == 1 ) ? '#' + section.next().attr('id') : '#' + section.attr('id');

    // get the offset of the prev/next sections to scroll to them
    prevOffset = $(prevSection).offset();
    nextOffset = $(nextSection).offset();
}