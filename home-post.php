<?php

    /**
     * Output for a regular post
     */
              
?>
    <div class="post-image">
        <?= quanPostThumbs($post->ID); ?>
    </div>

    <div class="index-post-text">
        <h2><a href="<?php the_permalink(); ?>" class="postlink"><?php the_title(); ?></a></h2>
        <p>
            <?php
                if( get_field( 'quan_excerpt' ) ) {
                    the_field( 'quan_excerpt' );
                }
            ?>
        </p>
    </div>
