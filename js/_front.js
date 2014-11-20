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

        // get the previous and next section
        var prevSection = (section.prev().length == 1 ) ? '#' + section.prev().attr('id') : '#' + section.attr('id');
        var nextSection = (section.next().length == 1 ) ? '#' + section.next().attr('id') : '#' + section.attr('id');

        // get the offset of the prev/next sections to scroll to them
        var prevOffset = $(prevSection).offset();
        var nextOffset = $(nextSection).offset();

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


    /**
     * Smoothly move to the next section on "scroll"
     */
    
        $('html').on('mousewheel DOMMouseScroll onmousewheel touchmove scroll', function(e) {
            // don't animate when viewed on a small screen
            if (breakpoints() != 'small') { 
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
                        console.log([prevSection, section.attr('id'), nextSection]);
                        if (prevSection == '#intro' && nextSection !== '#concept') {
                            if (!$('.intro-layout').hasClass('already-seen')) {
                                $(this).addClass('already-seen');
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
                                // left: '-5%'
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

                        prevSection = (section.prev().length == 1 ) ? '#' + section.prev().attr('id') : '#' + section.attr('id');
                        nextSection = (section.next().length == 1 ) ? '#' + section.next().attr('id') : '#' + section.attr('id');
                        prevOffset = $(prevSection).offset();
                        nextOffset = $(nextSection).offset();
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
                                    prevSection = (section.prev().length == 1 ) ? '#' + section.prev().attr('id') : '#' + section.attr('id');
                                    nextSection = (section.next().length == 1 ) ? '#' + section.next().attr('id') : '#' + section.attr('id');
                                    prevOffset = $(prevSection).offset();
                                    nextOffset = $(nextSection).offset();
                                });
                            }, 2000);
                            initialView = false;
                        } else {
                            $('html, body').animate({
                                scrollTop: nextOffset.top
                            }, 2000, function() {
                                location.hash = '#' + section.attr('id');
                            });
                            prevSection = (section.prev().length == 1 ) ? '#' + section.prev().attr('id') : '#' + section.attr('id');
                            nextSection = (section.next().length == 1 ) ? '#' + section.next().attr('id') : '#' + section.attr('id');
                            prevOffset = $(prevSection).offset();
                            nextOffset = $(nextSection).offset();
                        }
                    }

                    
                    // enable scrolling after 500ms
                    setTimeout(function(){
                        disableScroll = false;
                        $(window).disablescroll('undo');
                    }, 1500);
                }
            }
        });
});

$(window).on('load', function(){
    // initial scroll
    var offset = $(location.hash).offset();
    setTimeout(function(){
        $(window).scrollTop(offset.top);
    }, 50);
})
