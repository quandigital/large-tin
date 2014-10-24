<?php 
    require_once( __DIR__ . '/lang.php' );
    require_once( __DIR__ . '/resolution.php' );

    // get the number of open jobs
    $jobs = wp_count_posts( 'quan_jobs' );
    $GLOBALS['jobs_open'] = $jobs->publish;
?>
	
<!DOCTYPE html>
<!--[if IE 8]> <html class="no-js lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->

<head>
	<meta charset="utf-8" />
    <meta name="viewport" content="user-scalable=no, width=device-width, initial-scale=1, maximum-scale=1">
	<title><?php bloginfo( 'name' ); ?></title>

	<?php wp_head(); ?>
	<script>
		var $ = jQuery.noConflict();
		if (window.navigator.msMaxTouchPoints) {
			$( 'html' ).removeClass( 'no-touch' ).addClass( 'touch' );
		}
	</script>
</head>
<body <?php body_class(); ?>>

	<div id="main" class="main-container">	
        