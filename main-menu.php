<nav class="main-navigation" id="menu">
    <input type="checkbox" name="mt-checkbox" class="menu-trigger-checkbox" />
        <div class="navigation-corner"></div>
        <div class="menu-trigger"><?php _e('Menu', 'quan'); ?></div>
        <ul class="top-menu">
            <li class="menu-home"><a href="<?= get_bloginfo( 'wpurl' ); ?>/#intro"><?php _e( 'Home', 'quan' ); ?></a></li>
            <li class="menu-blog"><a href="/blog"><?php _e( 'Blog', 'quan' ); ?></a></li>
            <?php
                if( $GLOBALS['jobs_open'] > 0 ) : 
            ?>
                <li class="menu-jobs"><a href="<?= get_bloginfo('wpurl'); ?>/jobs"><?php _e( 'Jobs', 'quan' ); ?><span class="job-count" data-jobcount="<?= $GLOBALS['jobs_open']; ?>"></span></a></li>   
            <?php
                endif;
            ?>
            <li><a href="<?= get_bloginfo('wpurl'); ?>/contact"><?php _e( 'Contact', 'quan' ); ?></a></li>
        </ul>

        <div class="social-menu">
            <div class="mail">
                <a href="mailto:info@quandigital.com"><?php _e( 'Write us an e-mail', 'quan' ); ?></a>
            </div>
            <div class="phone">
                <a href="<?php _ex( 'tel:+123456789', 'public phone number for your country', 'quan' ); ?>"><?php _e( 'Talk to us', 'quan' ); ?></a>
            </div>
            <div class="legal">
                <a href="<?= get_bloginfo('wpurl'); ?>/impressum"><?php _e( 'Read the legal stuff', 'quan' ); ?></a>
            </div>
        </div>
    </nav>