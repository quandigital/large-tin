<?php

use QuanDigital\Jobs\Job;
use QuanDigital\WpLib\Helpers;

?>

<nav class="main-navigation" id="menu">
    <input type="checkbox" name="mt-checkbox" class="menu-trigger-checkbox" />
    <div class="navigation-corner"></div>
    <div class="menu-trigger"><?= __('Menu', 'quan'); ?></div>
    <ul class="top-menu">
        <li class="menu-home"><a href="<?= get_bloginfo( 'url' ); ?>/#intro"><?= __( 'Home', 'quan' ); ?></a></li>
        <li class="menu-blog"><a href="<?= get_bloginfo( 'url' ); ?>/blog"><?= __( 'Blog', 'quan' ); ?></a></li>
        <?php if($jobs = (new Job())->getAll()) : ?>
            <li class="menu-jobs"><a href="<?= get_bloginfo('url'); ?>/jobs"><?= __( 'Jobs', 'quan' ); ?><span class="job-count" data-jobcount="<?= $jobs; ?>"></span></a></li>   
        <?php endif; ?>
        <?php 
            wp_nav_menu([
                'theme_location' => 'main',
                'container' => false,
                'echo' => true,
                'fallback_cb' => false,
                'items_wrap' => '%3$s',
                'depth' => 1,
            ]);
        ?>
        <li><a href="<?= getContact(); ?>"><?= __('Contact', 'quan'); ?></a></li>
    </ul>

    <div class="social-menu">
        <div class="mail">
            <a href="mailto:mail@quandigital.com"><?= __( 'Write us an e-mail', 'quan' ); ?></a>
        </div>
        <div class="phone">
            <a href="<?= _x( 'tel:+123456789', 'public phone number for your country', 'quan' ); ?>"><?= __( 'Talk to us', 'quan' ); ?></a>
        </div>
        <div class="legal">
            <a href="<?= get_bloginfo('url'); ?>/impressum"><?= __( 'Read the legal stuff', 'quan' ); ?></a>
        </div>
    </div>
</nav>