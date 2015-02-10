<nav class="main-navigation" id="menu">
    <input type="checkbox" name="mt-checkbox" class="menu-trigger-checkbox" />
        <div class="navigation-corner"></div>
        <div class="menu-trigger"><?php _e('Menu', 'quan'); ?></div>
        <ul class="top-menu">
            <li class="menu-home"><a href="<?= get_bloginfo( 'wpurl' ); ?>/#intro"><?php _e( 'Home', 'quan' ); ?></a></li>
            <li class="menu-blog"><a href="/blog"><?php _e( 'Blog', 'quan' ); ?></a></li>
            <li><a href="/team"><?php _e( 'Team', 'quan' ); ?></a></li>
            <li><a href="/tour"><?php _e( 'Take the Tour', 'quan' ); ?></a></li>
            <?php
                if( $GLOBALS['jobs_open'] > 0 ) : 
            ?>
                <li class="menu-jobs"><a href="/jobs"><?php _e( 'Jobs', 'quan' ); ?><span class="job-count" data-jobcount="<?= $GLOBALS['jobs_open']; ?>"></span></a></li>   
            <?php
                endif;
            ?>
            <li><a href="/contact"><?php _e( 'Contact', 'quan' ); ?></a></li>
        </ul>

        <?php
            $lang = $GLOBALS['lang'];

            if( $lang == 'de' ) {
                $notlang = 'German';
            } else if( $lang == 'fr' ) {
                $notlang = 'French';
            } else if( $lang == 'en' ) {
                $notlang = 'English';
            } else if( $lang == 'it' ) {
                $notlang = 'Italian';
            } else if( $lang == 'es' ) {
                $notlang = 'Spanish';
            }

            function select_lang( $value, $lang ) {
                if( $lang == $value ) {
                    echo 'selected';
                }
            }
        ?>

            <div class="notlang">
                <span><?php echo $notlang; ?> is not your language? Change it here: </span>
                <div class="select">
                    <select id="lang-change">
                        <option value="en" <?php select_lang( 'en', $lang ); ?>>English</option>
                        <option value="fr" <?php select_lang( 'fr', $lang ); ?>>French</option>
                        <option value="de" <?php select_lang( 'de', $lang ); ?>>German</option>
                        <option value="it" <?php select_lang( 'it', $lang ); ?>>Italian</option>
                        <option value="es" <?php select_lang( 'es', $lang ); ?>>Spanish</option>
                    </select>
                </div>
            </div>

        <div class="social-menu">
            <div class="mail">
                <a href="mailto:info@quandigital.com"><?php _e( 'Write us an e-mail', 'quan' ); ?></a>
            </div>
            <div class="phone">
                <a href="<?php _ex( 'tel:+123456789', 'public phone number for your country', 'quan' ); ?>"><?php _e( 'Talk to us', 'quan' ); ?></a>
            </div>
            <?php
                /*
                <div class="blog">
                    <a href="<?php echo get_bloginfo( 'wpurl' ) . '/blog'; ?>"><?php _e( 'Read our blog', 'quan' ); ?></span></a>
                </div>
                <div class="facebook">
                    <a href="https://www.facebook.com/quandigital" target="_blank">
                        <span><?php _e( 'Like us on  facebook', 'quan' ); ?></span>
                    </a>
                </div>
                <div class="twitter">
                    <a href="https://twitter.com/quandigital" target="_blank">
                        <span><?php _e( 'Follow us on twitter', 'quan' ); ?></span>
                    </a>
                </div>
                <div class="gplus">
                    <a href="https://plus.google.com/115674308506276261482/posts" target="_blank">
                         <span><?php _e( 'Add us to your circles', 'quan' ); ?></span>
                    </a>
                </div>
                */
            ?>
            <div class="legal">
                <a href="<?php echo get_bloginfo( 'wpurl' ) . '/impressum'; ?>"><?php _e( 'Read the legal stuff', 'quan' ); ?></a>
            </div>
        </div>
    </nav>