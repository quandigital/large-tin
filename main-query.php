<?php

    // main query (we'll use it a couple of times)

    //the main query
    $quan_query = new WP_Query( array(
            'post_type'      => array( 'post', 'quan_tweets' ),
            'order'          => 'DESC',
            'orderby'        => 'date',
            'posts_per_page' => 9,
            )
        );
    
    // create the array that holds the ids, to filter them in the ajax call later on
    $ids = array();

                while( $quan_query->have_posts() ) :
                $quan_query->the_post();

                //write all ids to an array, we'll then use to filter the list
                $ids[] = get_the_ID();

                $posttype = $quan_query->post->post_type;

                //post container
                echo '<article id="post-' . get_the_ID() . '" ' . ( $posttype == 'quan_tweets' ? 'class="index-tweet">' : 'class="index-post">' );
                echo '<div>';

                //only do the whole image thing when the post is an actual post and not a tweet
                if( $posttype == 'post' ) :
            ?>          

                    <div class="post-image">
                        <?php
                            if( has_post_thumbnail() ) {
                                echo '<img src="' . aq_resize( wp_get_attachment_url( get_post_thumbnail_id($post->ID) ), $width, $height, true ) . '" alt="" class="index-post-img" />';
                            } else {
                                echo '<img src="' . get_stylesheet_directory_uri() . '/images/dummy-' . $dummy_size . '.png" alt="" class="index-post-img" />';
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
            <?php
                else : //if posttype is tweet
                    include('index-tweet.php');
                endif; // posttype post or tweet

            echo '</div></article>';

            endwhile;
            echo '</div></div>';