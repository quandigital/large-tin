<?php
    //if there is a cookie on the screen size, use the right image
    if( isset( $_COOKIE['resolution'] ) ) {
        $cookie_val = explode( ",", $_COOKIE['resolution'] );
        $screen     = $cookie_val[0] * $cookie_val[1];


        if( $screen <= 480 ) {
            $GLOBALS['height']     = 270;
            $GLOBALS['width']      = 480;
            $GLOBALS['dummy_size'] = '480x270';
        } elseif( $screen <= 960 ) {
            $GLOBALS['height']     = 540;
            $GLOBALS['width']      = 960;
            $GLOBALS['dummy_size'] = '960x540';
        } elseif( $screen <= 1920 ) {
            $GLOBALS['height']     = 1080/3;
            $GLOBALS['width']      = 1920/3;
            $GLOBALS['dummy_size'] = '1920x1080';
        } else {
            $GLOBALS['height']     = 2160/3;
            $GLOBALS['width']      = 3840/3;
            $GLOBALS['dummy_size'] = '3840x2160';
        }

        //check if the original image is even that size, if not simply take the largest possible image with the correct proportions
        $wp_attachment = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' );

        if( $wp_attachment[1] < $GLOBALS['width'] ) {
            $GLOBALS['width']  = $wp_attachment[1];
            $GLOBALS['height'] = intval( $GLOBALS['width'] * 0.5625 );
        }

    //else use the largest we have
    } else {
        $GLOBALS['thumb_size'] = 'large';
        $GLOBALS['dummy_size'] = '1920x1080';
    }
