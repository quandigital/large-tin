<?php

	//custom index page for job openings at quan

	get_header();
?>
	<h1>404</h1>
	<p><?= __( 'Unfortunately what you were looking for is no longer here.', 'quan' ); ?></p>
    <p><a href="<?= get_bloginfo('url' ); ?>"><?= __( 'Click here to go back home', 'quan' ); ?></a></p>
	
<?php
	get_footer();