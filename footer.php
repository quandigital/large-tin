		</div> <?php //main container ?>

        <?php get_template_part( 'main', 'menu' ); ?>
		<footer>
			<div class="legal">
				<span>&copy; 2013 <a href="<?php bloginfo( 'wpurl' ); ?>"><?php bloginfo( 'name' ); ?></a></span>
			</div>
		</footer>

		<script>
			window.realResolution = window.devicePixelRatio || Math.round(window.screen.availWidth / document.documentElement.clientWidth);
			document.cookie='resolution='+Math.max(screen.width,screen.height)+ "," + realResolution +'; path=/';
		</script>

        <div id="scripts">
    		<?php wp_footer(); ?>
        </div>
        