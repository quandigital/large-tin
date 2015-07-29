<?php

	/**
	 * Blog Index
	 */

	get_header(); 

    //the main query
    $paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;
    $quan_query = new WP_Query( array(
            'post_type'      => array( 'post', 'quan_tweets' ),
            'order'          => 'DESC',
            'orderby'        => 'date',
            'posts_per_page' => 9,
            'paged'          => $paged,
            )
        );
    
    // create the array that holds the ids, to filter them in the ajax call later on
    $ids = array();
?>    
    <div>
        <div class="main-loop-container">
            <?php require_once('home-filter.php'); ?>
            <div class="main-loop preload" id="loop">
                <?php require_once('home-query.php'); ?>
            </div>
            <div class="pagenavi">
                <?php posts_nav_link(); ?>
            </div>
        </div>
    </div>
    <div id="loading-canvas"></div>
    <input type="hidden" id="postids" value="<?= json_encode($ids); ?>" />

<?php 

    get_footer(); 