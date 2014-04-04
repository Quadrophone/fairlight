<?php
/**
 * Fairlight functions and definitions
 *
 * @package Fairlight
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */
require_once 'inc/class-tgm-plugin-activation.php';

add_action( 'tgmpa_register', 'my_theme_register_required_plugins' );

function my_theme_register_required_plugins() {
 
/**
* Array of plugin arrays. Required keys are name and slug.
* If the source is NOT from the .org repo, then source is also required.
*/
$plugins = array(
/** This is an example of how to include a plugin pre-packaged with a theme */
/** This is an example of how to include a plugin from the WordPress Plugin Repository */
array(
'name' => 'Daves WordPress Live Search',
'slug' => 'daves-wordpress-live-search',
'required' => true,
),
array(
'name' => 'Advanced Custom Fields',
'slug' => 'advanced-custom-fields',
'required' => true,
)
);
 
$theme_text_domain = 'tgmpa';

$config = array(
/*'domain' => $theme_text_domain, // Text domain - likely want to be the same as your theme. */
/*'default_path' => '', // Default absolute path to pre-packaged plugins */
/*'menu' => 'install-my-theme-plugins', // Menu slug */
'strings' => array(
/*'page_title' => __( 'Install Required Plugins', $theme_text_domain ), // */
/*'menu_title' => __( 'Install Plugins', $theme_text_domain ), // */
/*'instructions_install' => __( 'The %1$s plugin is required for this theme. Click on the big blue button below to install and activate %1$s.', $theme_text_domain ), // %1$s = plugin name */
/*'instructions_activate' => __( 'The %1$s is installed but currently inactive. Please go to the <a href="%2$s">plugin administration page</a> page to activate it.', $theme_text_domain ), // %1$s = plugin name, %2$s = plugins page URL */
/*'button' => __( 'Install %s Now', $theme_text_domain ), // %1$s = plugin name */
/*'installing' => __( 'Installing Plugin: %s', $theme_text_domain ), // %1$s = plugin name */
/*'oops' => __( 'Something went wrong with the plugin API.', $theme_text_domain ), // */
/*'notice_can_install' => __( 'This theme requires the %1$s plugin. <a href="%2$s"><strong>Click here to begin the installation process</strong></a>. You may be asked for FTP credentials based on your server setup.', $theme_text_domain ), // %1$s = plugin name, %2$s = TGMPA page URL */
/*'notice_cannot_install' => __( 'Sorry, but you do not have the correct permissions to install the %s plugin. Contact the administrator of this site for help on getting the plugin installed.', $theme_text_domain ), // %1$s = plugin name */
/*'notice_can_activate' => __( 'This theme requires the %1$s plugin. That plugin is currently inactive, so please go to the <a href="%2$s">plugin administration page</a> to activate it.', $theme_text_domain ), // %1$s = plugin name, %2$s = plugins page URL */
/*'notice_cannot_activate' => __( 'Sorry, but you do not have the correct permissions to activate the %s plugin. Contact the administrator of this site for help on getting the plugin activated.', $theme_text_domain ), // %1$s = plugin name */
/*'return' => __( 'Return to Required Plugins Installer', $theme_text_domain ), // */
),
);
 
tgmpa( $plugins, $config );
 
}

  add_action( 'admin_menu', 'my_remove_menu_pages' );

    function my_remove_menu_pages() {
        remove_menu_page('pages.php');           
    }


if ( ! isset( $content_width ) ) {
	$content_width = 640; /* pixels */
}

if ( ! function_exists( 'fairlight_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function fairlight_setup() {

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Fairlight, use a find and replace
	 * to change 'fairlight' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'fairlight', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

$args = array(
	'flex-width'    => true,
	'width'         => 1280,
	'flex-height'    => true,
	'height'        => 450,
	'default-image' => get_template_directory_uri() . '/img/header.jpg',
);
add_theme_support( 'custom-header', $args );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	//add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'fairlight' ),
	) );

	// Enable support for Post Formats.
	add_theme_support( 'post-formats', array( 'aside', 'image', 'video', 'quote', 'link' ) );

	// Enable support for HTML5 markup.
	add_theme_support( 'html5', array( 'comment-list', 'search-form', 'comment-form', ) );

}
endif; // fairlight_setup
add_action( 'after_setup_theme', 'fairlight_setup' );


/**
 * Register widgetized area and update sidebar with default widgets.
 */
function fairlight_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'fairlight' ),
		'id'            => 'sidebar-1',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
}
add_action( 'widgets_init', 'fairlight_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function fairlight_scripts() {
	wp_enqueue_style( 'fairlight-style', get_stylesheet_uri() );

	wp_enqueue_script( 'fairlight-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20120206', true );

	wp_enqueue_script( 'fairlight-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );

	wp_enqueue_script( 'prefix-free', get_template_directory_uri() . '/js/prefixfree.min.js', true );
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'fairlight_scripts' );


add_theme_support( 'post-thumbnails' ); 

add_theme_support( 'custom-header' );

function alter_comment_form_fields($fields){
	$fields['url'] = '';  
    return $fields;
}

add_filter('comment_form_default_fields','alter_comment_form_fields');

 
function acf_set_featured_image( $value, $post_id, $field  ){
    
    if($value != ''){
	    	    add_post_meta($post_id, '_thumbnail_id', $value);
    }
 
    return $value;
}

add_filter('acf/update_value/name=header_image', 'acf_set_featured_image', 10, 3);

function custom_excerpt_length( $length ) {
	return 20;
}
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );

function new_excerpt_more( $more ) {
	return '...';
}
add_filter('excerpt_more', 'new_excerpt_more');


/*
function setup_theme_admin_menus() {
    
    add_submenu_page('themes.php',
        'Front Page Elements', 'Theme Settings', 'manage_options',
        'front-page-elements', 'theme_front_page_settings');

}
function theme_front_page_settings() {
    ?>
   <div class="wrap">
        <?php screen_icon('themes'); ?> <h2>Front page elements</h2>
 
        <form method="POST" action="">
            <table class="form-table">
                <tr valign="top">
                    <th scope="row">
                        <label for="num_elements">
                            Header Image:
                        </label>
                    </th>
                    <td>
                        <input type="file" name="header_img" size="25" />
                        <input type="hidden" name="update_settings" value="Y" />
                    </td>
                </tr>
            </table>

        </form>
    </div>
<?php
if (isset($_POST["update_settings"])) {
   $num_elements = esc_attr($_POST["header_img"]);  
update_option("header_image", $header_image);
}
}
if (!current_user_can('manage_options')) {
    wp_die('You do not have sufficient permissions to access this page.');
}


// This tells WordPress to call the function named "setup_theme_admin_menus"
// when it's time to create the menu pages.
add_action("admin_menu", "setup_theme_admin_menus");
*/


/**
 * Implement the Custom Header feature.
 */
//require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

