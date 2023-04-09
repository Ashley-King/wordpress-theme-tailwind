<?php






if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * WordPress Boilerplate 2.0 functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 *
 */

if ( ! function_exists( 'wpbp_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function wpbp_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on WordPress Boilerplate 2.0, use a find and replace
		 * to change 'wpbp' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'aria', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support('post-thumbnails', array(
			'post',
			'page',
			));


		register_nav_menus( array(
            'main-menu' => esc_html__( 'Main menu', 'example' ),
            'footer-menu' => esc_html__( 'Footer menu', 'example' ),
        ) );

			


		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'wpbp_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
        add_theme_support( 'customize-selective-refresh-widgets' );

        // Add theme support for menus

        add_theme_support('menus');


		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );
	}
endif;
add_action( 'after_setup_theme', 'wpbp_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function wpbp_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'wpbp_content_width', 640 );
}
add_action( 'after_setup_theme', 'wpbp_content_width', 0 );



/**
 * Enqueue scripts and styles.
 */
function wpbp_scripts() {
  /**********************************************
 * INITIAL STYLES
 *********************************************/
	wp_enqueue_style( 'styles', get_template_directory_uri() . '/style.css', false, null ,'all');
	


/**********************************************
 * CUSTOM JS
 *********************************************/
  wp_enqueue_script('custom-scripts', get_template_directory_uri() . '/js/custom.js', null, null, true);
	

  


}
add_action( 'wp_enqueue_scripts', 'wpbp_scripts' );









/**********************************************
 * Customizations
 *********************************************/




/**********************************************
 * GOOGLE FONTS
 *********************************************/
add_action( 'wp_enqueue_scripts', 'custom_add_google_fonts' );
/**
 * Summary of custom_add_google_fonts
 * @return void
 */
function custom_add_google_fonts() {
    wp_enqueue_style( 'custom-google-fonts', 'https://fonts.googleapis.com/css2?family=Poppins:wght@100;300;400;500;600;700;900&display=swap', false );

}



/**********************************************
 * THEME OPTIONS PAGE
 *********************************************/
  if( function_exists('acf_add_options_page') ) {

	acf_add_options_page(array(
		'page_title' 	=> 'Site Options',
		'menu_title'	=> 'Site Options',
		'menu_slug' 	=> 'site-options',
		'capability'	=> 'edit_posts',
		'redirect'		=> false
	));

	acf_add_options_sub_page(array(
		'page_title' 	=> 'Header Settings',
		'menu_title'	=> 'Header',
		'parent_slug'	=> 'site-options',
	));

	acf_add_options_sub_page(array(
		'page_title' 	=> 'Footer Settings',
		'menu_title'	=> 'Footer',
		'parent_slug'	=> 'site-options',
  ));
  
}

/**********************************************
 * FAVICON
 *********************************************/
// function examplefavicon() {
//     echo '<link rel="Shortcut Icon" type="image/x-icon" href="'.get_bloginfo('wpurl').'/wp-content/themes/example/images/favicon.ico" />';
// }
// add_action('wp_head', 'examplefavicon');






/**********************************************
 * ADMIN - make backend easier to read
 *********************************************/

 /**
  * Summary of my_acf_admin_head
  * @return void
  */
 function my_acf_admin_head() {
?>
<style type="text/css">
.acf-fields.-left>.acf-field.acf-field-wysiwyg.admin-line-name:before {
  background-color: #ffed89;
}
</style>
<?php
}

add_action('acf/input/admin_head', 'my_acf_admin_head');






/**********************************************
 * ADD tinyMCE buttons
 */


/**
 * Summary of my_mce_buttons_2
 * @param mixed $buttons
 * @return mixed
 */
function my_mce_buttons_2( $buttons ) {
	/**
	 * Add in a core button that's disabled by default
	 */
	$buttons[] = 'superscript';
	$buttons[] = 'subscript';
    $buttons[] = 'underline';
    $buttons[] = 'removeformat';

	return $buttons;
}
add_filter( 'mce_buttons_2', 'my_mce_buttons_2' );