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
                            <div class="ref-period">
                                <?= get_sub_field('quan_ref_period'); ?>
                            </div>
                            <div class="ref-description">
                                <?= get_sub_field('quan_ref_description'); ?>
                            </div>
                        </div>

                    <?php
                        // echo '<code><pre>';
                        //     var_dump(get_sub_field('quan_ref_customer_logo'));
                        //     var_dump(get_sub_field('quan_ref_period'));
                        //     var_dump(get_sub_field('quan_ref_description'));
                        // echo '</pre></code>';
                        $i++;
                    endwhile;
                    ?>
                    </div></div>
                    <?php
                endif;
            endwhile; 
        endif; 

    get_footer();