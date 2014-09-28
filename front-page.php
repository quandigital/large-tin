<?php 
	
	/* Front Page Template */

	get_header( 'front' );	

	$jobs = wp_count_posts( 'quan_jobs' );
	$jobs_open = $jobs->publish;
?>
    <div class="intro-layout">
        <div class="dark-corner"></div>
        <div class="light-corner-1"></div>
        <div class="light-corner-2"></div>
        <div class="background-corner"></div>
        <?php // note the width and height are needed for IE and Firefox to display the svg correctly ?>
        <img class="home-logo" src="<?php echo get_stylesheet_directory_uri() . '/images/QuanDigital.svg'; ?>" alt="" height="339" width="530" />
    </div>

	<nav class="main-navigation">
        <div class="navigation-corner"></div>
        <div class="menu-trigger"><?php _e('Menu', 'quan'); ?></div>
		<ul>
			<li><a href="./blog"><?php _e( 'Blog', 'quan' ); ?></a></li>
			<li><a href="./team"><?php _e( 'Team', 'quan' ); ?></a></li>
			<li><a href="./tour"><?php _e( 'Take the Tour', 'quan' ); ?></a></li>
			<?php
				if( $jobs_open > 0 ) : 
			?>
				<li><a href="./jobs"><?php _e( 'Jobs', 'quan' ); ?><span class="job-count" data-jobcount="<?php echo $jobs_open; ?>"></span></a></li>	
			<?php
				endif;
			?>
			<li><a href="./contact"><?php _e( 'Contact', 'quan' ); ?></a></li>

        <?php
            $lang = $lang;

            if( $lang == 'de' ) {
                $notlang = 'German';
            } else if( $lang == 'fr' ) {
                $notlang = 'French';
            } else if( $lang == 'en' ) {
                $notlang = 'English';
            } else if( $lang == 'it' ) {
                $notlang = 'Italian';
            } else if( $lang == 'es' ) {
                $notlang = 'Spanish';
            }

            function select_lang( $value, $lang ) {
                if( $lang == $value ) {
                    echo 'selected';
                }
            }
        ?>

        <div class="notlang">
            <span><?php echo $notlang; ?> is not your language? Change it here: </span>
            <div class="select">
                <select id="lang-change">
                    <option value="en" <?php select_lang( 'en', $lang ); ?>>English</option>
                    <option value="fr" <?php select_lang( 'fr', $lang ); ?>>French</option>
                    <option value="de" <?php select_lang( 'de', $lang ); ?>>German</option>
                    <option value="it" <?php select_lang( 'it', $lang ); ?>>Italian</option>
                    <option value="es" <?php select_lang( 'es', $lang ); ?>>Spanish</option>
                </select>
            </div>
        </div>
		</ul>
	</nav>

    <article class="frontpage-text">
        <h2>idea</h2>
        <section class="intro">
            Quan Digital started off with the idea of providing<br />better online marketing through innovative technology,<br /> digital strategies and a passion for our customers.
        </section>
        <section class="story">
            Every brand has its own unique story. We tell it.
        </section>
    </article>

<?php
    get_footer();
