<?php
    // Join the discussion on twitter
    $share_title = urlencode(get_the_title());
?>

<div class="twitter discussion">
    <a href="https://twitter.com/intent/tweet?original_referer=<?php the_permalink(); ?>&source=tweetbutton&text=<?php echo $share_title; ?>&url=<?php the_permalink(); ?>&via=quandigital" data-popup="true" target="_blank">
        <i class="ion-social-twitter"></i> <span>Join the discussion on twitter</span>
    </a>
</div>