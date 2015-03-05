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
                            <?php 
                                the_content();
                                get_template_part('discussion', 'join');
                                get_template_part('image', 'attribution');    
                            ?>
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
