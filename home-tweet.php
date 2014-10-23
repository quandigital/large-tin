
<?php

    /**
     * Twitter "Cards" on Blog Index
     */
    
    $twitterName = get_post_meta( $post->ID, 'quan_tweet_author_twitter_name', true );
    $twitterScreenName = get_post_meta( $post->ID, 'quan_tweet_author_twitter', true );
    //check if we have this author in the database
    $tweetauthor = get_users( array( 'meta_key' => 'twitter', 'meta_value' => $twitterScreenName ) );
    
    //if this still does not return an author, get the tweet author
    if( empty( $tweetauthor ) ) {
        $tweetauthor = $twitterScreenName; 
    }

    //if the tweet has an image
    $attachment = get_post_meta( $post->ID, 'quan_tweet_media_attachment', true );

    // get the tweet content
    $content = get_the_content();
?>
    
    <div class="index-author tweet-author">
        <a class="twitter-image" href="https://twitter.com/<?= $twitterScreenName; ?>" target="_blank">
            <?php
                if( is_array( $tweetauthor ) ) :
                    //get their author image
                    the_author_image_size( 100, 100, $tweetauthor[0]->ID ); 
                else :
                //get their twitter image (retain the stupid class name of the author image plugin)
            ?>
                <div class="entry_author_image"><img src="<?= get_post_meta( $post->ID, 'quan_tweet_avatar_url', true ); ?>" alt="" /></div>    
            <?php 
                endif; 
            ?>
        </a>

        <div class="display-name">
        <?php if( is_array( $tweetauthor ) ) : ?>
            <a class="twitter-name" href="https://twitter.com/<?= $twitterScreenName; ?>" target="_blank"><?= $tweetauthor[0]->display_name; ?></a>
        <?php else : ?>
            <a class="twitter-name" href="https://twitter.com/<?= $twitterScreenName; ?>" target="_blank"><?= $twitterName; ?></a>
        <?php endif; ?>
            <br />
            <a class="twitter-screenname" href="https://twitter.com/<?= $twitterScreenName; ?>" target="_blank">@<?= $twitterScreenName; ?></a>
        </div>

    </div>

    <div class="tweet-content">
    <?php if( $attachment != '' ) : ?>
        <div class="tweet-attachment" style="background-image: url(<?= $attachment; ?>);"></div>
    <?php endif; ?>
    
       <p><?= $content; ?></p>

    </div>

    <div class="intents">
        <div class="intent" data-intent="<?= __( 'Favorite', 'quan' ); ?>">
            <a href="https://twitter.com/intent/favorite?tweet_id=<?= get_post_meta( $post->ID, 'quan_tweet_tweet_id', true ); ?>" target="_blank"><i class="ion-star"></i></a>
        </div>
        
        <div class="intent" data-intent="<?= __( 'Retweet', 'quan' ); ?>">
            <a href="https://twitter.com/intent/retweet?tweet_id=<?= get_post_meta( $post->ID, 'quan_tweet_tweet_id', true ); ?>" target="_blank"><i class="ion-loop"></i></a>
        </div>
        
        <div class="intent" data-intent="<?= __( 'Reply', 'quan' ); ?>">
            <a href="https://twitter.com/intent/tweet?in_reply_to=<?= get_post_meta( $post->ID, 'quan_tweet_tweet_id', true ); ?>" target="_blank"><i class="ion-reply"></i></a>
        </div>
    </div>

<?php                   
    //unset the tweetauthor, so it gets newly created on each iteration
    unset( $tweetauthor );
    unset( $twitterScreenName );
    