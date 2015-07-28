<?php 
    require_once( __DIR__ . '/resolution.php' );

    // get the number of open jobs
    $jobs = wp_count_posts( 'quan_jobs' );
    $GLOBALS['jobs_open'] = $jobs->publish;
?>
	
<!DOCTYPE html>
<!--[if IE 8]> <html class="no-js lt-ie9" lang="de"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="de"> <!--<![endif]-->

<head>
	<meta charset="utf-8" />
    <meta name="viewport" content="user-scalable=no, width=device-width, initial-scale=1, maximum-scale=1">

	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

	<div id="main" class="main-container">	
        