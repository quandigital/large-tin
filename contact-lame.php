<?php
	/**
	 * Template Name: Contact Page
	 */
	
	get_header();
?>

	<div class="contact-container">
		<div class="contact">

			<h1><?php _e( 'Contact', 'quan' ); ?></h1>

			<form id="contact-form" class="contact-form" action="<?php echo get_template_directory_uri(); ?>/send.php" method="post">
				<div class="user-data">
					<div class="name">
						<label for="name"><?= __('Your Name', 'quan'); ?></label>
						<input type="text" name="name" placeholder="<?php _ex( 'Name', 'Contactform placeholder', 'quan' ); ?>" required />
					</div>
					<div class="email">
						<label for="email"><?= __('Your E-Mail Address', 'quan'); ?></label>
						<input type="email" name="email" placeholder="<?php _ex( 'E Mail', 'Contactform placeholder', 'quan' ); ?>" required />
					</div>
					<div class="tel">
						<label for="tel"><?= __('Your Phonenumber', 'quan'); ?></label>
						<input type="tel" name="tel" placeholder="<?php _ex( 'Phone', 'Contactform placeholder', 'quan' ); ?>" />
					</div>
				</div>

				<div class="text">
					<label for="subject"><?= __('Tell us a little about what you are looking for', 'quan'); ?></label>	
					<textarea name="subject" placeholder="<?php _ex( 'Subject', 'Contactform placeholder', 'quan' ); ?>"></textarea>
				</div>

				<label id="leave_me" for="leave_me"><?php _ex( 'Please leave empty to send the contact form.', 'Spam Prevention', 'quan' ); ?>
					<input type="text" name="leave_me" placeholder="<?php _ex( 'Please leave empty', 'Spam Prevention', 'quan' ); ?>" />
				</label>

				<input type="submit" id="submit" value="<?php _e( 'Send', 'quan' ); ?>" />
			</form>

	</section>

	<div id="mail-success" class="modal"></div>
			
		</div>
	</div>
<?php

	get_footer();
