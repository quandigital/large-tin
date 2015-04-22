		  <div class="push"></div>
        </div> <?php //main container ?>

        <?php get_template_part( 'main', 'menu' ); ?>
		<footer>

            <div class="logo">
                <img src="<?= get_stylesheet_directory_uri(); ?>/images/circle.png" />
            </div>

			<div class="copy">
				<span>&copy; <?= date('Y'); ?> Quan Digital GmbH</span>
			</div>

            <div class="address">
                Klosterstraße 62 &middot; 10179 Berlin &middot; 030&#8239;206&#8239;13&#8239;79&#8239;232
            </div>

            <a href="<?= get_bloginfo('wpurl'); ?>/contact" class="work-with-us">Work with us</a>

		</footer>

		<script>
			window.realResolution = window.devicePixelRatio || Math.round(window.screen.availWidth / document.documentElement.clientWidth);
			document.cookie='resolution='+Math.max(screen.width,screen.height)+ "," + realResolution +'; path=/';
		</script>

        <div id="scripts">
    		<?php wp_footer(); ?>
        </div>
        