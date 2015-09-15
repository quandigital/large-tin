<?php

use QuanDigital\WpLib\Helpers;
use QuanDigital\UserData\UserData;

//the author sidebar

$user = new WP_User(get_the_author_meta('ID'));
$userData = new UserData($user);
	
	if (has_post_thumbnail()) :
	?>        
	        <div class="cover-image" style="background-image: url('<?= wp_get_attachment_url(get_post_thumbnail_id()); ?>');"><div class="overlay"></div></div>
	<?php
	    endif;
	?>
	<aside id="sidebar" class="sidebar">
		<div class="author">
			<?php Helpers::log(empty($userData->profileLink)); ?>
			<?php if (Helpers::notEmpty($userData->profileLink)) : ?>
				<a class="profile-link" href="<?= $userData->profileLink; ?>"></a>
			<?php endif; ?>
			<div class="author-name"><?= get_the_author(); ?></div>
			<div class="author-job">
				<?= $userData->job; ?>
			</div>
			<div class="author-image-container">
				<div class="author-image" style="background-image:url(<?= $userData->getUserSidebarImage(); ?>)"></div>
			</div>
		</div>	
	</aside>