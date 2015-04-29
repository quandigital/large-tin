<?php

    /**
     * Output for a regular post
     */
              
?>
    <div class="post-image">
        <?php
            if( has_post_thumbnail() ) {
                $img = aq_resize(wp_get_attachment_url( get_post_thumbnail_id($post->ID) ), $GLOBALS['width']/3, $GLOBALS['height']/3, true);
                $imgSizes = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'full');
                $img = !$img ? aq_resize(wp_get_attachment_url(get_post_thumbnail_id($post->ID)), $imgSizes[1]/3, (($imgSizes[1]/3) * 16/9), true) : $img;
                $img = !$img ? wp_get_attachment_thumb_url(get_post_thumbnail_id($post->ID)) : $img;
                echo '<img src="' . $img . '" alt="" class="index-post-img" />';
            }

        ?>
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
