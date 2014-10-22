<?php

    /**
     * main query output (we'll use it a couple of times)
     */

    if( $quan_query->have_posts() ) :
        while( $quan_query->have_posts() ) :
            $quan_query->the_post();

            require_once('resolution.php');

            //write all ids to an array, we'll then use to filter the list
            $ids[] = get_the_ID();

            $posttype = $quan_query->post->post_type;
            $postlang = wp_get_post_terms($quan_query->post->ID, 'language');
            $postlang = $postlang[0];

            //post container
            echo '<article id="post-' . get_the_ID() . '" class="' . ( $posttype == 'quan_tweets' ? 'index-tweet' : 'index-post' ) . ' lang-' . $postlang->slug . '">';
            echo '<div>';

                //only do the whole image thing when the post is an actual post and not a tweet
                if( $posttype == 'post' ) :
            
                    include('home-post.php');

                else : //if posttype is tweet
                
                    include('home-tweet.php');
                
                endif; // posttype post or tweet

            echo '</div></article>';

        endwhile;
    endif; 
