<?php
	//the author sidebar
	$aat_user       = get_field( 'quan_aat_user' );
	$aat_user_mail  = get_field( 'quan_aat_email' );
	$aat_user_phone = get_field( 'quan_aat_phone' );
	$job            = get_user_meta( $aat_user['ID'], 'job', true );

?>
	<aside id="sidebar">
		<div class="application-contact">
			<h3><?php _e( 'Please address your application to', 'quan' ); ?></h3>
				
			<div itemscope itemtype="http://schema.org/Person" class="c-card">
				<div class="image" itemprop="image">
					<?php the_author_image( $aat_user['ID'] ); ?>
				</div>
				<div class="name">
					<span itemprop="name"><?= $aat_user['display_name']; ?></span>

					<div class="job" itemprop="jobTitle">
						<?= $job; ?>
					</div>
				</div>

				<div class="mail">
					<a href="mailto:<?= $aat_user_mail; ?>?subject=Application: <?= get_the_title(); ?>" itemprop="email"><?= $aat_user_mail; ?></a>
				</div>

			<?php if( $aat_user_phone ) : ?>
				<div class="phone">
					<a href="callto:<?= $aat_user_phone; ?>" itemprop="telephone"><?= $aat_user_phone; ?></a>
				</div>
			<?php endif; ?>

		</div>

		<?php 
			// Better than the async shares and completely Datenschutzkonform
		?>	

		<div class="article-share">
			<?php $share_title = urlencode(get_the_title()); ?>
			<h3><?php _e( 'Share', 'quan' ); ?></h3>

			<div class="facebook">
				<a href="https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>" data-popup="true"><i class="ion-social-facebook"></i> <span><?php _e( 'on facebook', 'quan' ); ?></span></a>
			</div>	
			<div class="twitter">
				<a href="https://twitter.com/intent/tweet?original_referer=<?php the_permalink(); ?>&source=tweetbutton&text=<?php echo $share_title; ?>&url=<?php the_permalink(); ?>" data-popup="true"><i class="ion-social-twitter"></i> <span><?php _e( 'on twitter', 'quan' ); ?></span></a>
			</div>
			<div class="gplus">
				<a href="https://plusone.google.com/_/+1/confirm?hl=de&url=<?php the_permalink(); ?>&title=<?php echo $share_title; ?>')" data-popup="true">
				<i class="ion-social-googleplus-outline"></i> <span><?php _e( 'on google+', 'quan' ); ?></span></a>
			</div>
		</div>

	</aside>