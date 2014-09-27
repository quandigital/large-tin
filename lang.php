<?php

	if( isset( $_COOKIE['lang'] ) )  {
		$lang = $_COOKIE['lang'];
    } else {
        if ( isset( $_GET ) ) {
            if( isset( $_GET['lang'] ) ) {
                setcookie( 'lang', $_GET[ 'lang' ], 0, '/' );
                $lang = $_GET[ 'lang' ];
            } else {
                if ( ! isset($_SERVER['HTTP_ACCEPT_LANGUAGE'] ) ) {
                    $lang = 'de';
                    setcookie( 'lang', 'de', 0, '/' );
                } else {
                    setcookie( 'lang', substr( $_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2 ), 0,'/' );
                    $lang = substr( $_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2 );
                }
            }
        } else {
            $lang = substr( $_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2 );
            if( ! isset( $_COOKIE['lang'] ) ) {
                echo '<script>location.href += "?lang=' . $lang . '";</script>';        
            }
        }
    }

    // had to be explicitly set on my machine
    $GLOBALS['lang'] = $lang;
    
    //this is a temporary thing. if the users' language is not German redirect them to their temporary page
    if( ! isset( $lang ) ) {
        $lang = 'de';
        setcookie( 'lang', 'de', 0, '/' );
    }
