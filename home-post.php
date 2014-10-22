<?php

    /**
     * Output for a regular post
     */
              
?>
    <div class="post-image">
        <?php
            if( has_post_thumbnail() ) {
                echo '<img src="' . aq_resize( wp_get_attachment_url( get_post_thumbnail_id($post->ID) ), $GLOBALS['width'], $GLOBALS['height'], true ) . '" alt="" class="index-post-img" />';
            }

        ?>
    </div>

    <div class="index-post-text">
        <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
        <p>
            <?php
                if( get_field( 'quan_excerpt' ) ) {
                    the_field( 'quan_excerpt' );
                }
            ?>
        </p>
    </div>
