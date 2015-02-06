<?php
	
	//single article template

	get_header();

?>
    <h1 class="single-title"><?= get_the_title(); ?></h1>
    <div class="single-wrapper">
    <div class="single-content">
            <?php 
                if( have_posts() ) : 
                    while (have_posts()) : 
                        the_post(); 
            ?>

				

				
				<article>
                <?php the_content(); ?>
				</article>
<?php
				endwhile; 
			endif; 
		
		get_sidebar('single');
?>
	</div>
    </div>
<?php
	get_footer();



    //image attribution
                        if( get_field( 'quan_img_license_url' ) || get_field( 'quan_img_license_name' ) || get_field( 'quan_img_url' ) || get_field( 'quan_img_name' ) ) {
                            echo '<div class="attribution">';
                                if( get_field( 'quan_img_url' ) ) { 
                                    echo '<a href="' . get_field( 'quan_img_url' ) . '" target="_blank"><span>' . get_field( 'quan_img_name' ) . '</span></a>';
                                }
                                if( get_field( 'quan_img_license_url' ) && get_field( 'quan_img_license_name' ) ) {
                                    if( in_array( get_field( 'quan_img_license_name' ), array( 'cc', 'CC', 'CreativeCommons', 'Creative Commons', 'creative commons', 'creativecommons' ) ) ) {
                                        $anchor = '<img src="' . get_stylesheet_directory_uri() . '/images/cc.png' . '" alt="cc" class="cc" />';
                                    } else {
                                        $anchor = '<span>' . get_field( 'quan_img_license_name' ) . '</span>';
                                    }
                                    echo '<a href="' . get_field( 'quan_img_license_url' ) . '" target="_blank" class="license">' . $anchor . '</a>';   
                                }
                            echo '</div>'; //.attribution

                        }
    ?>