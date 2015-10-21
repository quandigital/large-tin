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
            $postlang = is_array($postlang) ? $postlang[0] : 'de';

            ?>
                <article id="post-<?= get_the_ID(); ?>" class="index-<?= $posttype == 'quan_tweets' ? 'tweet' : 'post'; ?> lang-<?= $postlang->slug; ?>">
                    <div>
                        <?php $posttype == 'post' ? include('home-post.php') : include('home-tweet.php'); ?>
                    </div>
                </article>
            <?php

        endwhile;
    endif; 
