<?php

	/*
		Page
	*/

	get_header();

	
			if( have_posts() ) : 
				while (have_posts()) : 
					the_post(); 

				the_title( '<h1>', '</h1>' );
	
				echo '<article>';				
					the_content();
				echo '</article>';

				endwhile; 
			endif; 


	get_footer();

