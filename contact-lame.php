<?php
	/**
	 * Template Name: Contact Page
	 */
	
	get_header();
?>

	<div class="contact-container">
		<div class="contact">

			<h1><?php _e( 'Contact', 'quan' ); ?></h1>

			<form id="contact" class="contact-form">
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
					<div class="message placeholder" id="message" contentEditable><?= __('Tell us a little about what you are looking for', 'quan'); ?></div>
				</div>

				<button type="submit" id="send" class="send-contact default"><?= __('Send Request', 'quan'); ?></button>
			</form>

		</div>
	</div>
<?php

	get_footer();
