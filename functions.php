<?php

//l18n
add_action('after_setup_theme', 'quan_l18n');
function quan_l18n(){
    load_theme_textdomain( 'quan', WP_CONTENT_DIR . '/languages/themes' );
}

//php ini settings
@ini_set( 'upload_max_size' , '64M' );
@ini_set( 'post_max_size', '64M');
@ini_set( 'max_execution_time', '300' );

// Remove empty paragraph tags
function removeEmptyParagraphs( $content ) {
    $content = str_replace("<p></p>","",$content);
    return $content;
}
add_filter( 'the_content', 'removeEmptyParagraphs', 9999 );
remove_filter('the_excerpt', 'wpautop'); 

add_filter('the_generator', create_function('', 'return "";'));
remove_action('wp_head', 'rsd_link');
remove_action('wp_head', 'wlwmanifest_link');
remove_action('wp_head', 'wp_shortlink_wp_head');
remove_action('wp_head', 'adjacent_posts_rel_link_wp_head');

// remove wp version param from any enqueued scripts
function vc_remove_wp_ver_css_js( $src ) {
    if ( strpos( $src, 'ver=' ) )
        $src = remove_query_arg( 'ver', $src );
    return $src;
}
add_filter( 'style_loader_src', 'vc_remove_wp_ver_css_js', 9999 );
add_filter( 'script_loader_src', 'vc_remove_wp_ver_css_js', 9999 );

/**
 *	ENQUEUE SCRIPTS
 **/

add_action( 'wp_enqueue_scripts', 'quan_add_scripts' );

function quan_add_scripts() {
    // every page ressources
	wp_register_script( 'modernizr', get_template_directory_uri() .  '/js/custom.modernizr.js', false, '', true );

    // jquery
	wp_deregister_script( 'jquery' );
    wp_register_script( 'jquery', get_template_directory_uri() .  '/js/jquery.js' );

    // third party
    wp_register_script( 'smartresize', get_template_directory_uri() .  '/js/smartresize.js', array( 'jquery' ), '0.1', true );
    wp_register_script( 'disable_scroll', get_template_directory_uri() .  '/js/disablescroll.min.js', array('jquery'), '', true );
    wp_register_script( 'isotope', get_template_directory_uri() .  '/js/isotope.min.js', array( 'jquery' ), '', true );
    wp_register_script( 'cookie', get_template_directory_uri() .  '/js/jquery.cookie.js', array( 'jquery' ), '', true );
    wp_register_script( 'highlight', get_template_directory_uri() .  '/js/highlight.pack.js', array(), '8.6', true );

    
    // v2
    wp_register_script( 'functions', get_template_directory_uri() .  '/js/_functions.js', array('jquery'), '', true );
    wp_register_script( 'app', get_template_directory_uri() .  '/js/_app.js', array( 'jquery', 'functions', 'smartresize' ), '', true );
    wp_register_script( 'blog', get_template_directory_uri() .  '/js/_blog-index.js', array( 'jquery', 'isotope', 'cookie', 'app' ), '', true );
    wp_register_script( 'front', get_template_directory_uri() .  '/js/_front.js', array( 'jquery', 'disable_scroll', 'functions' ), '', true );
    wp_register_script( 'single', get_template_directory_uri() .  '/js/_single.js', array( 'jquery', 'functions', 'highlight', 'app' ), '', true );
    wp_register_script( 'contact', get_template_directory_uri() .  '/js/_contact.js', array( 'jquery', 'functions', 'app' ), '', true );
    wp_register_script( 'lpfr', get_template_directory_uri() .  '/js/_frenchlp.js', array( 'jquery', 'functions', 'app' ), '', true );
    wp_register_script( 'author', get_template_directory_uri() .  '/js/_author.js', array( 'jquery', 'isotope', 'app' ), '', true );


    //styles
    // wp_register_script
    wp_register_style( 'css', get_template_directory_uri() . '/css/app.css', array() );
    wp_register_style( 'highlight-css', '//cdnjs.cloudflare.com/ajax/libs/highlight.js/8.5/styles/paraiso.dark.min.css' );

	wp_enqueue_script(array(
		'modernizr',
		'app',
		'lang',
    ));

    wp_enqueue_style('css');

    if(is_single()) {
        wp_enqueue_script('single');
        wp_enqueue_style('highlight-css');
    }

    if (is_author()) {
        wp_enqueue_script('author');
    }

    if(is_home()) {
        wp_enqueue_script('blog');  
    }

    if(is_page_template('contact.php')) {
        wp_enqueue_script('contact');
    }

    if(is_page_template('page-lpfr.php')) {
        wp_enqueue_script('lpfr');
    }

    if(is_front_page()) {
        wp_enqueue_script('front');  
    }

    //pass wordpress url to jquery
	wp_localize_script('send-message', 'message_localization', array(
		'send_php' => get_template_directory_uri() . '/send.php'
	));

    wp_localize_script('contact', 'contactLocalization', array(
        'nameEmpty' => __('Please add a name', 'quan'),
        'projectEmpty' => __('Please tell us a little bit about your project.', 'quan'),
        'contactEmpty' => __('Please provide us with a way to contact you.', 'quan'),
        'emailInvalid' => __('Please add a valid email address.', 'quan'),
        'phoneInvalid' => __('Please add a valid phone number.', 'quan'),
    ));
}
	
// always define ajaxurl
add_action('wp_head','pi_ajaxurl');

function pi_ajaxurl() {
?>
	<script type="text/javascript">
		var ajaxurl = '<?= admin_url('admin-ajax.php'); ?>';
	</script>
<?php
}

add_action('admin_menu','wphidenag');

function wphidenag() {
	remove_action( 'admin_notices', 'update_nag', 3 );
}

/**
 * Inserts an array of strings into a file (.htaccess ), placing it between
 * BEGIN and END markers. Replaces existing marked info. Retains surrounding
 * data. Creates file if none exists.
 *
 * @param array|string $insertion
 * @return bool True on write success, false on failure.
 */

add_action( 'admin_init', 'add_htaccess' );

function add_htaccess($insertion) {
    $htaccess_file = ABSPATH.'.htaccess';
    $insertion = array(
    	'AddType application/vnd.ms-fontobject .eot',
		'AddType font/ttf .ttf',
		'AddType font/otf .otf',
		'AddType application/font-woff .woff',
		'AddType application/x-font-woff .woff',
		'php_value upload_max_filesize 64M',
		'php_value post_max_size 64M'
    	);
    return insert_with_markers($htaccess_file, 'Font-MIME-Type', $insertion);
}

function sgr_filter_image_sizes( $sizes) {
		
	// unset( $sizes['thumbnail']);
	unset( $sizes['medium']);
	unset( $sizes['large']);
	
	return $sizes;
}

add_filter('intermediate_image_sizes_advanced', 'sgr_filter_image_sizes');

require_once('aq_resizer.php');

add_theme_support( 'post-thumbnails' );

function quanPostThumbs($postId) {
    if(has_post_thumbnail($postId)) {
        $img = aq_resize(wp_get_attachment_url( get_post_thumbnail_id($postId) ), $GLOBALS['width'], $GLOBALS['height'], true);
        $imgSizes = wp_get_attachment_image_src(get_post_thumbnail_id($postId), 'full');
        $img = !$img ? aq_resize(wp_get_attachment_url(get_post_thumbnail_id($postId)), $imgSizes[1], $imgSizes[1] * 16/9, true) : $img;
        $img = !$img ? wp_get_attachment_thumb_url(get_post_thumbnail_id($postId)) : $img;
        return sprintf('<img src="%s" alt="" class="index-post-img" />', $img);
    }
}

// add_action( 'wp_ajax_nopriv_quan_query_posts', 'quan_load_posts' );
// add_action( 'wp_ajax_quan_query_posts', 'quan_load_posts' );

function quan_load_posts() {
	$query_strings = $_POST[ 'query_strings' ];
	if( isset( $query_strings['cat_id'] ) ) {
		$cat_id = $query_strings['cat_id'];
		$cat_id = str_replace( 'cat-', '', $cat_id );
	}
	if( isset( $query_strings['tag_id'] ) ) {
		$tag_id = $query_strings['tag_id'];
		$tag_id = str_replace( 'tag-', '', $tag_id );
	}
	if( isset( $query_strings['lang'] ) ) {
		$query_lang = $query_strings['lang'];
		$lang = explode(', ', $query_lang );
	}
	if( isset( $query_strings['twitter'] ) ) {
		$twitter = $query_strings['twitter'];
	}

	if( isset( $twitter ) && $twitter === 'true' ) {
		$posttypes = array( 'post', 'quan_tweets' );
	} else {
		$posttypes = array( 'post' );
	}

	$args = array(
		'post_type'      => $posttypes,
		'posts_per_page' => -1,
		'order'          => 'DESC',
		'orderby'        => 'date',
		'post_status'    => 'publish'
	);

	if( isset( $cat_id ) ) {
		$args['cat'] = $cat_id;
	}

	if( isset( $tag_id ) ) {
		$args['tag_id'] = $tag_id;
	}

	if( isset( $lang ) ) {
		$taxquery = array(
				array(
					'taxonomy' => 'language',
					'field'    => 'slug',
					'terms'    => $lang,
				)
			
		);
		$args['tax_query'] = $taxquery;
			
	}

	$ajax_query = new WP_Query( $args );

	$ajax_ids = array();

	if( $ajax_query->have_posts() ) :
		while( $ajax_query->have_posts() ) :
			$ajax_query->the_post();

			$ajax_ids[] = get_the_id();

		endwhile;
	endif;
	
	// echo json_encode( $args );
	echo json_encode( $ajax_ids );

	die();

}

// use this tp get more blog content on an ajax call

add_action( 'wp_ajax_nopriv_quan_get_all_posts', 'quan_all_posts' );
add_action( 'wp_ajax_quan_get_all_posts', 'quan_all_posts' );

function quan_all_posts() {

    global $post;

    // get the posts that are already on the page, i.e. the first 9
    $already_showing_query = new WP_Query( array(
        'post_type'      => array( 'post', 'quan_tweets' ),
        'post_status'         => 'publish',
        'order'          => 'DESC',
        'orderby'        => 'date',
        'posts_per_page' => 9,
        )
    );

    $already_showing = array();

    foreach ($already_showing_query->posts as $already_showing_post ) {
        $already_showing[] = $already_showing_post->ID;
    }

    //get the remaining posts
    $quan_query = new WP_Query( array(
        'post_type'      => array( 'post', 'quan_tweets' ),
        'post_status'    => 'publish',
        'order'          => 'DESC',
        'orderby'        => 'date',
        'posts_per_page' => -1,
        'post__not_in'   => $already_showing
        )
    );
        

    ob_start();

    require_once('home-query.php');

    ob_end_flush();

    die();
}

// add_action( 'personal_options_update', 'quan_transfer_gplus_authorurl' );
// add_action( 'edit_user_profile_update', 'quan_transfer_gplus_authorurl' );

// function quan_transfer_gplus_authorurl( $user_id ) {
// 	$user_login = get_the_author_meta('user_login', $user_id);
//     $author_links = get_option('apau_author_links');
	
//     if( isset( $_POST['googleplus'] ) && ! empty( $_POST['googleplus'] ) ) {
//     	if( $_POST['googleplus'] == $author_links[$user_login] ) {
//     		die();
//     	} else {
//     		$author_links[$user_login] = $_POST['googleplus'];
//     	}
//     }

// 	update_option( 'apau_author_links', $author_links );    

//     // error_log( $log . "\n", 3, get_theme_root() . '/sailor-quan/debug.log' );
// }

add_action( 'after_setup_theme', 'quan_contact_email' );

function quan_contact_email() {
	update_option( 'quan_contact_email', 'mail@quandigital.com' );
}


//customize the excerpt
function custom_excerpt_length( $length ) {
	return 200;
}
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );

function new_excerpt_more( $more ) {
	$readmore  = "\n";
	$readmore .= '<a href="' . get_permalink() . '">';
	$readmore .= __( 'Details', 'quan' );
	$readmore .= '</a>';

	return $readmore;
}
add_filter('excerpt_more', 'new_excerpt_more');


function get_the_content_with_formatting ($more_link_text = '(more...)', $stripteaser = 0, $more_file = '') {
	$content = get_the_content($more_link_text, $stripteaser, $more_file);
	$content = apply_filters('the_content', $content);
	$content = str_replace(']]>', ']]&gt;', $content);
	return $content;
}

function quan_job_excerpt() {
	$content = get_the_content_with_formatting();
	 
	 //remove any new lines already in there
    $content = str_replace("\n", "", $content);

    //remove all <p>
    $content = str_replace("<p>", "", $content);

    //replace it just with a random string that should not occur anywhere else
    $content = str_replace("</p>", "::|::", $content);      

    $content_array = explode( '::|::', $content );
	
	return '<p>' . $content_array[0] . '</p><a class="job-details" href="' . get_permalink() . '">' . __( 'Details', 'quan' ) . ' &rarr;</a>';
}

/**
 * Auto-subscribe or unsubscribe an Edit Flow user group when a post changes status
 *
 * @see http://editflow.org/extend/auto-subscribe-user-groups-for-notifications/
 *
 * @param string $new_status New post status
 * @param string $old_status Old post status (empty if the post was just created)
 * @param object $post The post being updated
 * @return bool $send_notif Return true to send the email notification, return false to not
 */
function efx_auto_subscribe_usergroup( $new_status, $old_status, $post ) {
    global $edit_flow;
 
    // When the post is first created, the group copy editors will automatically follow this post
    if ( in_array( $new_status, array( 'pitch', 'pending' ) ) ) {
        $copyeditors = get_term_by( 'slug', 'ef-usergroup-copy-editors', 'ef_usergroup' );
        $usergroup_ids_to_follow = $copyeditors->term_id;
        $edit_flow->notifications->follow_post_usergroups( $post->ID, $usergroup_ids_to_follow, true );
    }
 
    // Return true to send the email notification
    return $new_status;
}

add_filter( 'ef_notification_status_change', 'efx_auto_subscribe_usergroup', 10, 3 );


/**
 * Limit custom statuses based on user role
 * In this example, we limit the statuses available to the
 * 'contributor' user role
 *
 * @see http://editflow.org/extend/limit-custom-statuses-based-on-user-role/
 *
 * @param array $custom_statuses The existing custom status objects
 * @return array $custom_statuses Our possibly modified set of custom statuses
 */
function efx_limit_custom_statuses_by_role( $custom_statuses ) {
 
    $current_user = wp_get_current_user();
    switch( $current_user->roles[0] ) {
        // Only allow a contributor to access specific statuses from the dropdown
        case 'author':
            $permitted_statuses = array(
                    'pitch',
                    'draft',
                    'pending'
                );
            // Remove the custom status if it's not whitelisted
            foreach( $custom_statuses as $key => $custom_status ) {
                if ( !in_array( $custom_status->slug, $permitted_statuses ) )
                    unset( $custom_statuses[$key] );
            }
            break;
    }
    return $custom_statuses;
}
add_filter( 'ef_custom_status_list', 'efx_limit_custom_statuses_by_role' );

/**
 * Hide the "Publish" button until a post is ready to be published
 * In this example, we only show the "Publish button" until the post has the "Pending" status
 *
 * @see http://editflow.org/extend/hide-the-publish-button-for-certain-custom-statuses/
 */
function efx_hide_publish_button_until() {
 
    if ( ! function_exists( 'EditFlow' ) )
        return;
 
    if ( ! EditFlow()->custom_status->is_whitelisted_page() )
        return;
 
    // Show the publish button if the post has one of these statuses
    $show_publish_button_for_status = array(
            'pending',
            // The statuses below are WordPress' public statuses
            'future',
            'publish',
            'schedule',
            'private',
        );
    if ( ! in_array( get_post_status(), $show_publish_button_for_status ) ) {
        ?>
        <style>
            #publishing-action { display: none; }
        </style>
        <?php
    }
}
add_action( 'admin_head', 'efx_hide_publish_button_until' );


function efx_only_allow_status( $custom_statuses ) {
	$screen = get_current_screen();
    $current_user = wp_get_current_user();
    $status = get_post_status();

   
    if( $screen->base == 'post' && $screen->action == 'add' && $screen->post_type == 'post' ) { //new post screen
	    switch( $current_user->roles[0] ) {
	        // Only allow pitch for author
	        case 'author':
	            $permitted_statuses = array(
	                    'pitch'
	                );
	            // Remove the custom status if it's not whitelisted
	            foreach( $custom_statuses as $key => $custom_status ) {
	                if ( !in_array( $custom_status->slug, $permitted_statuses ) )
	                    unset( $custom_statuses[$key] );
	            }
	            break;
	    }
	} elseif( $screen->base == 'post' && $screen->action == '' && $screen->post_type == 'post' && $status = 'assigned' ) { //should be the edit screen
		switch( $current_user->roles[0] ) {
	        // Only allow a contributor to access specific statuses from the dropdown
	        case 'author':
	            $permitted_statuses = array(
	                    'pitch',
	                    'draft',
	                    'pending'
	                );
	            // Remove the custom status if it's not whitelisted
	            foreach( $custom_statuses as $key => $custom_status ) {
	                if ( !in_array( $custom_status->slug, $permitted_statuses ) )
	                    unset( $custom_statuses[$key] );
	            }
	            break;
	    }
	} elseif( $screen->base == 'post' && $screen->post_type == 'quan_jobs' ) { 
		switch( $current_user->roles[0] ) {
	        // Only allow a contributor to access specific statuses from the dropdown
	        case 'author':
	            $permitted_statuses = array(
	                    'pitch',
	                    'draft',
	                    'pending'
	                );
	            // Remove the custom status if it's not whitelisted
	            foreach( $custom_statuses as $key => $custom_status ) {
	                if ( !in_array( $custom_status->slug, $permitted_statuses ) )
	                    unset( $custom_statuses[$key] );
	            }
	            break;
	    }
	}

    return $custom_statuses;
}

add_filter( 'ef_custom_status_list', 'efx_only_allow_status', 10, 3 );

// add_action('admin_head', 'my_admin_add_page');

function my_admin_add_page() {
	$status = get_post_status();

	echo '<code><pre>';
		var_dump($status);
	echo '</pre></code>';
}

// Apply filter
add_filter('body_class', 'multisite_body_classes');

function multisite_body_classes($classes) {

    if (is_front_page()) {
        foreach ($classes as $key => $class) {
            if ($class == 'page-template-default') {
                unset($classes[$key]);
            }
        }
    }
        return $classes;
}

/**
 * send the contact email from the french landing page
 */

add_action( 'wp_ajax_send_email', 'quanSendEmail' );
add_action( 'wp_ajax_nopriv_send_email', 'quanSendEmail' );

function quanSendEmail()
{
    $email = isset($_POST['email']) ? filter_var($_POST['email'], FILTER_SANITIZE_EMAIL, FILTER_VALIDATE_EMAIL) : 'false';
    $phone = isset($_POST['phone']) ? filter_var($_POST['phone'], FILTER_SANITIZE_NUMBER_INT) : 'false';
    $name = isset($_POST['name']) ? filter_var($_POST['name'], FILTER_SANITIZE_STRING) : 'false';
    $msg = isset($_POST['project']) ? filter_var($_POST['project'], FILTER_DEFAULT) : 'false';

    $body = '<div class="emailbody"><table><tr><td>Name:</td><td>'.$name.'</td></tr><tr><td>Nachricht:</td><td>'.$msg.'</td></tr><tr><td>Kontakt:</td><td>'.$email.' '.$phone.'</td></tr></table></div>';

    echo wp_mail( 
        'mail@quandigital.com', 
        'Neue Anfrage von ' . $name, 
        $body,
        array('Content-Type: text/html; charset=UTF-8')
    );
    wp_die();
}

/**
 * send the contact email from the french landing page
 */

add_action( 'wp_ajax_fr_send_email', 'quanFrSendEmail' );
add_action( 'wp_ajax_nopriv_fr_send_email', 'quanFrSendEmail' );

function quanFrSendEmail()
{
    $email = isset($_POST['email']) ? filter_var($_POST['email'], FILTER_SANITIZE_EMAIL, FILTER_VALIDATE_EMAIL) : 'false';
    $phone = isset($_POST['phone']) ? filter_var($_POST['phone'], FILTER_SANITIZE_NUMBER_INT) : 'false';
    $name = isset($_POST['name']) ? filter_var($_POST['name'], FILTER_SANITIZE_STRING) : 'false';
    $company = isset($_POST['company']) ? filter_var($_POST['company'], FILTER_SANITIZE_STRING) : 'false';
    $website = isset($_POST['website']) ? filter_var($_POST['website'], FILTER_SANITIZE_STRING) : 'false';

    $body = '<div class="emailbody"><table><tr><td>Name:</td><td>'.$name.'</td></tr><tr><td>Email:</td><td>'.$email.'</td></tr><tr><td>Phone:</td><td>'.$phone.'</td></tr><tr><td>Company:</td><td>'.$company.'</td></tr><tr><td>Website:</td><td>'.$website.'</td></tr></table></div>';

    echo wp_mail( 
        'fr@quandigital.com', 
        'New Message from ' . $name, 
        $body,
        array('Content-Type: text/html; charset=UTF-8')
    );
    wp_die();
}

// Escape HTML tags in post content
add_filter('the_content', 'escape_code_fragments');

function escape_code_fragments($source) {
  $encoded = preg_replace_callback('/<code>(.*?)<\/code>/ims',
  create_function(
    '$matches',
    '$matches[1] = preg_replace(
        array("%^(\r|\n|<br.*?>)+%i", "%(\r|\n|<br.*?>|\s<p>)+$%i"), "",
        $matches[1]);
      return "<code>" . esc_html( $matches[1] ) . "</code>";'
  ),
  $source);

  if ($encoded)
    return $encoded;
  else
    return $source;
}

function getContact()
{
    $url = get_bloginfo('url') . '/kontakt';

    if (function_exists('is_ios') && is_ios()) {
        $url = 'mailto:mail@quandigital.com';
    }

    return $url;   
}

add_action('after_setup_theme', function() {
  register_nav_menu('main', 'Main Menu Appendix');
});