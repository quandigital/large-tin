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
            <div> <?php //container 1 ?>
                <div> <?php //container 2 ?>
                    <div class="heading"><?= __( 'Filter Posts:', 'quan' ); ?></div>

                    <div class="tweet-filter">
                        <input type="checkbox" name="tweetfilter" id="tweet-filter" checked  />
                        <div class="popup" data-checked="<?php _e( 'Hide Tweets', 'quan' ); ?>" data-unchecked="<?= __( 'Show Tweets', 'quan' ); ?>" ></div>
                        <div class="replacement"></div> 
                    </div>

                    <div class="language">
                        <select id="language-filter">
                        <?php
                            $slugs = array();
                            foreach( $langs as $lang ) {
                                $slugs[] = $lang->slug; 
                            }
                            $slugs = implode( ', ', $slugs );

                            echo '<option value="all">' . __( 'All Langagues', 'quan' ) . '</option>';
                            foreach( $langs as $lang ) {
                                echo '<option value="' . $lang->slug . '">' . $lang->name . '</option>';
                            }
                        ?>
                        </select>
                    </div>
                </div>
            </div>
        </div>