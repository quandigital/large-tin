<?php

	/*
		Page
	*/

	get_header();

		if( have_posts() ) : 
			while (have_posts()) : 
				the_post(); 
			?>

			<h1><?php the_title(); ?></h1>

			<article>
				<?php the_content(); ?>
			</article>
			
			<?php
			endwhile; 
		endif; 

	get_footer();

