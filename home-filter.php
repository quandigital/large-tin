<?php
    /**
     * The Filterbar on the Homepage
     */
    
    //get the languages tag
    $args = array(
        'orderby'    => 'count',
        'style'      => 'none',
        'hide_empty' => 0
        );
    $langs = get_terms( 'language', $args );
?>
    <div class="filter">
        <div class="heading"><?= __( 'Filter Posts:', 'quan' ); ?></div>

        <div class="tweet-filter">
            <input type="checkbox" name="tweetfilter" id="tweet-filter" checked  />
            <div class="popup" data-checked="<?php _e( 'Hide Tweets', 'quan' ); ?>" data-unchecked="<?= __( 'Show Tweets', 'quan' ); ?>" ></div>
            <div class="replacement"></div> 
        </div>

        <div class="language">
            <div class="handle" id="language-handle"></div>
            <div class="options" id="language-options">
                <div class="option" data-lang="all"><?= __( 'All Langagues', 'quan' ); ?></div>
                <?php
                    foreach( $langs as $lang ) {
                        echo '<div class="option" data-lang="' . $lang->slug . '">' . $lang->name . '</div>';
                    }
                ?>
            </div>
        </div>
    </div>