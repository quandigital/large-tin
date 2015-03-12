<?php
	/**
	 * Template Name: Contact Page
	 */
	
	get_header();
?>

	<div class="contact-container">
		<div class="contact">

			<h1><?php _e( 'Contact', 'quan' ); ?></h1>

			<div class="breadcrumbs">
				<div id="bcb-name" class="bcb bcb-first">
					<span class="step" data-step="1">Step 1</span>
					<span class="action">Your Name</span>
				</div>
				<div id="bcb-project" class="bcb bcb-second">
					<span class="step" data-step="2">Step 2</span>
					<span class="action">Your Project</span>
				</div>
				<div id="bcb-details" class="bcb bcb-third">
					<span class="step" data-step="3">Step 3</span>
					<span class="action">Contact Details</span>
				</div>
				<div id="bcb-review" class="bcb bcb-fourth">
					<span class="step" data-step="4">Step 4</span>
					<span class="action">Review</span>
				</div>
			</div>
			
			<section id="name">
				<label class="section-label">
					<?= __('What\'s your name?', 'quan'); ?>
				</label>
				<div class="edit" data-key="name" contentEditable></div>
			</section>

			<section class="project" id="project">
				<label class="section-label">
					<?= __('Hi', 'quan'); ?> <span id="return-name"></span>, <br /><?= __('Tell us a bit about what you are looking for:', 'quan'); ?>
				</label>
				<div class="edit" data-key="project" contentEditable></div>
			</section>

			<section class="contact-details" id="details">
				<label class="section-label">
					<?= __('How would you like us to get back to you?', 'quan'); ?>
				</label>

				<label class="check email">
					<div id="email" class="edit" data-key="email" contentEditable></div>
					<span class="label">E-Mail</span>
				</label>

				<label class="check phone">
					<div id="phone" class="edit"  data-key="phone" contentEditable></div>
					<span class="label">Phone</span>
				</label>

			</section>
		
			<section id="review" class="review">
				<label class="section-label"><?= __('Please review the information', 'quan'); ?></label>

				<div id="review-name" class="rev-item">
					<label>Your Name: </label>
					<div class="result"></div>
					<a href="?step=1" class="rev-edit"></a>
				</div>
				<div id="review-project" class="rev-item">
					<label>Your Project: </label>
					<div class="result"></div>
					<a href="?step=2" class="rev-edit"></a>
				</div>
				<div id="review-email" class="rev-item">
					<label>Your Email Address: </label>
					<div class="result"></div>
					<a href="?step=3" class="rev-edit"></a>
				</div>
				<div id="review-phone" class="rev-item">
					<label>Your Phone Number: </label>
					<div class="result"></div>
					<a href="?step=3" class="rev-edit"></a>
				</div>
				<div class="send-contact">Send Request</div>
			</section>
		</div>
	</div>
<?php

	get_footer();

	/*

		<form id="contact-form" action="<?php echo get_template_directory_uri(); ?>/send.php" method="post">
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
	 */