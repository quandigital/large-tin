
<?php

    /**
     * Twitter "Cards" on Blog Index
     */
    
    $twitterName = get_post_meta( $post->ID, 'quan_tweet_author_twitter_name', true );
    $twitterScreenName = get_post_meta( $post->ID, 'quan_tweet_author_twitter', true );
    
    //check if we have this author in the database
    $tweetauthor = get_users( array( 'meta_key' => 'twitter', 'meta_value' => $twitterScreenName ) );

    if (is_array($tweetauthor) && !empty($tweetauthor)) {
        $author = $tweetauthor[0];
        $userData = new \Quan\UserData\UserData($author);
    }
    
    // get the author image; either our image or the one from twitter
    $twitImg = isset($userData) ? $userData->image : get_post_meta( $post->ID, 'quan_tweet_avatar_url', true );

    //if this still does not return an author, get the tweet author
    if( empty( $tweetauthor ) ) {
        $tweetauthor = $twitterScreenName; 
    }

    // if the twitter name is empty also give it the screenname
    if (empty($twitterName)) {
        $twitterName = $twitterScreenName; 
    }

    //if the tweet has an image
    $attachment = get_post_meta( $post->ID, 'quan_tweet_media_attachment', true );

    // get the tweet content
    $content = get_the_content();
?>
    
    <div class="index-author tweet-author">
        <div class="twitter-image-container">
            <a class="twitter-link" href="https://twitter.com/<?= $twitterScreenName; ?>" target="_blank"></a>
            <div class="twitter-image" style="background-image: url(<?= $twitImg; ?>)"></div>
        </div>

        <div class="display-name">
            <a class="twitter-name" href="https://twitter.com/<?= $twitterScreenName; ?>" target="_blank">
                <?= is_array($tweetauthor) ? $tweetauthor[0]->display_name : $twitterName; ?>
            </a>
            <br />
            <a class="twitter-screenname" href="https://twitter.com/<?= $twitterScreenName; ?>" target="_blank">
                @<?= $twitterScreenName; ?>
            </a>
        </div>

    </div>

    <div class="tweet-content">
        <?php if( $attachment != '' ) : ?>
            <div class="tweet-attachment" style="background-image: url(<?= $attachment; ?>);"></div>
        <?php endif; ?>
        <p>
            <?= $content; ?>
        </p>

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
    //unset the userData/screen name, so it gets newly created on each iteration
    unset( $userData );
    unset( $twitterScreenName );
    