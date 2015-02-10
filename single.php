<?php
	
	//single article template

	get_header();

	echo '<div class="content">';
			if( have_posts() ) : 
				while (have_posts()) : 
					the_post(); 

				the_title( '<h1>', '</h1>' );

				echo '<div class="meta">';
					echo '<span class="date">' . __( 'Published') . ' ' . get_the_date( "m/d/Y" ) . '</span>';
					//' <span>' . _x( 'in', 'in category xyz', 'quan' ) . ' ' . get_the_category_list(",") . '</span>'; //if we ever want categories back
				echo '</div>';

				echo '<article>';

					//get the abstract if lang is not english
					if( $postlang !== 'en' ) :
						if( get_field( 'quan_abstract' ) ) :

					?>
							<div class="abstract">
								<h2>Abstract</h2>
								<p><?php the_field( 'quan_abstract' ); ?></p>
							</div>
					<?php
						endif;
					endif;

					the_content();
				echo '</article>';

				endwhile; 
			endif; 
		
		get_sidebar();
		
		comments_template();

	echo '</div>';

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