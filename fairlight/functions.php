<?php
/**
 * Fairlight functions and definitions
 *
 * @package Fairlight
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */



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

