<?php

    /**
     * Template Name: Customer References
     */

    get_header();

        if( have_posts() ) :
            while (have_posts()) :
                the_post();
            ?>
                <div class="content">
                    <h1><?= get_the_title(); ?></h1>

                    <article>
                        <?php the_content(); ?>
                    </article>
                </div>
            <?php
                if (have_rows('quan_references')) :
                    $i = 0;
                ?>
                    <div class="references-container">
                        <div class="reference-row"><div class="ref-row-dummy"></div>
                <?php
                    while (have_rows('quan_references')) :
                        the_row();
                        $logo = get_sub_field('quan_ref_customer_logo');

                        if ($i > 0 && $i % 3 === 0) :
                        ?>
                            </div><div class="reference-row"><?= ($i % 2 === 0) ? '<div class="ref-row-dummy"></div>' : ''; ?>
                        <?php
                        endif;
                    ?>
                        <div class="single-reference">
                            <div class="ref-logo-container">
                                <div class="ref-logo" style="background-image: url(<?= $logo['sizes']['medium']; ?>)"></div>
                            </div>
                            <div class="ref-client-name">
                                <?= get_sub_field('quan_ref_customer_name'); ?>
                            </div>
                            <div class="ref-period">
                                <?php
                                    $from = get_sub_field('quan_ref_period_from');
                                    $to = get_sub_field('quan_ref_period_to');

                                    if ($to !== '' && $from !== '') {
                                        $period = sprintf(__('%s  &ndash; %s', 'quan'), $from, $to);
                                    } elseif ($from !== '' && $to === '') {
                                        $period = sprintf(__('since %s', 'quan'), $from);
                                    }
                                 ?>
                                 <?= $period; ?>
                            </div>
                            <div class="ref-url">
                                <?= ($refUrl = get_sub_field('quan_ref_url')) !== '' ? sprintf('<a href="%s" target="_blank">%s</a>', $refUrl, $refUrl) : ''; ?>
                            </div>
                            <div class="ref-langs">
                                <?= is_array(get_sub_field('quan_ref_lang')) ? '<label>' . __('Languages', 'quan') .  ':</label> ' . strtoupper(implode(', ', get_sub_field('quan_ref_lang'))) : ''; ?>
                            </div>
                            <div class="ref-type">
                                <?= is_array(get_sub_field('quan_ref_type')) ? '<label>' . __('Type', 'quan') .  ':</label> ' . strtoupper(implode(', ', get_sub_field('quan_ref_type'))) : ''; ?>
                            </div>
                            <div class="ref-description">
                                <?= get_sub_field('quan_ref_description'); ?>
                            </div>
                        </div>

                    <?php
                        $i++;
                    endwhile;
                    ?>
                    </div></div>
                    <?php
                endif;
            endwhile;
        endif;

    get_footer();
