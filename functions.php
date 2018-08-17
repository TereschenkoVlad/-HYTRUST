
<?php
/**
 * Chefeedback functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Chefeedback
 */


if ( ! function_exists( 'chefeedback_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */




	function chefeedback_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Chefeedback, use a find and replace
		 * to change 'chefeedback' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'chefeedback', get_template_directory() . '/languages' );

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
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.

        register_nav_menus(array( // Using array to specify more menus if needed
            // Primary Navigation
            'primary-menu'   => __('Primary Menu', 'main_menu'),
            // Page Top Navigation
            'page-top-menu' => __('Page Top Menu', 'main_menu')
        ));


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
		add_theme_support( 'custom-background', apply_filters( 'chefeedback_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
        add_theme_support( 'custom-logo' );
        function chefeedback_custom_logo_setup() {
            $defaults = array(
                'height'      => 43,
                'width'       => 171,
                'flex-height' => true,
                'flex-width'  => true,
                'header-text' => array( 'site-title', 'site-description' ),
            );
            add_theme_support( 'custom-logo', $defaults );
        }
        add_action( 'after_setup_theme', 'chefeedback_custom_logo_setup' );
	}
endif;
add_action( 'after_setup_theme', 'chefeedback_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function chefeedback_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'chefeedback_content_width', 640 );
}
add_action( 'after_setup_theme', 'chefeedback_content_width', 0 );





add_action('in_widget_form', 'spice_get_widget_id');
function spice_get_widget_id($widget_instance)
{
// Check if the widget is already saved or not.
    if ($widget_instance->number=="__i__"){
        echo "<p><strong>Widget ID is</strong>: Please save the widget</p>"   ;
    }  else {
        echo "<p><strong>Widget ID is: </strong>" .$widget_instance->id. "</p>";
    }
}

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function chefeedback_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'chefeedback' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'chefeedback' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
    register_sidebar( array(
        'name'          => esc_html__( 'Header', 'chefeedback' ),
        'id'            => 'sidebar-2',
        'description'   => esc_html__( 'Add widgets here.', 'chefeedback' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ) );
    register_sidebar( array(
        'name'          => esc_html__( 'Footer', 'chefeedback' ),
        'id'            => 'sidebar-3',
        'description'   => esc_html__( 'Add widgets here.', 'chefeedback' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ) );
    register_sidebar( array(
        'name'          => esc_html__( 'Welcome section', 'chefeedback' ),
        'id'            => 'sidebar-4',
        'description'   => esc_html__( 'Add widgets here.', 'chefeedback' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ) );
    register_sidebar( array(
        'name'          => esc_html__( 'Title post section', 'chefeedback' ),
        'id'            => 'title-for-post',
        'description'   => esc_html__( 'Add widgets here.', 'chefeedback' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ) );
    register_sidebar( array(
        'name'          => esc_html__( 'Under posts section', 'chefeedback' ),
        'id'            => 'under-post',
        'description'   => esc_html__( 'Add widgets here.', 'chefeedback' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ) );
    register_sidebar( array(
        'name'          => esc_html__( 'Lists footer', 'chefeedback' ),
        'id'            => 'list-footer',
        'description'   => esc_html__( 'Add widgets here.', 'chefeedback' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ) );
    register_sidebar( array(
        'name'          => esc_html__( 'The most bottom list', 'chefeedback' ),
        'id'            => 'last-list',
        'description'   => esc_html__( 'Add widgets here.', 'chefeedback' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ) );
}
add_action( 'widgets_init', 'chefeedback_widgets_init' );

/**===================================Custom Post Type======================================================*/



//function revcon_change_post_label() {
//    global $menu;
//    global $submenu;
//    $menu[5][0] = 'News';
//    $submenu['edit.php'][5][0] = 'News';
//    $submenu['edit.php'][10][0] = 'Add News';
//    $submenu['edit.php'][16][0] = 'News Tags';
//}
//function revcon_change_post_object() {
//    global $wp_post_types;
//    $labels = &$wp_post_types['post']->labels;
//    $labels->name = 'News';
//    $labels->singular_name = 'News';
//    $labels->add_new = 'Add News';
//    $labels->add_new_item = 'Add News';
//    $labels->edit_item = 'Edit News';
//    $labels->new_item = 'News';
//    $labels->view_item = 'View News';
//    $labels->search_items = 'Search News';
//    $labels->not_found = 'No News found';
//    $labels->not_found_in_trash = 'No News found in Trash';
//    $labels->all_items = 'All News';
//    $labels->menu_name = 'News';
//    $labels->name_admin_bar = 'News';
//}
//
//add_action( 'admin_menu', 'revcon_change_post_label' );
//add_action( 'init', 'revcon_change_post_object' );
//
//
//







/**===================================MY WIDGETS=======================================================*/





require get_template_directory().'/inc/widgest.php';

/**
 * Enqueue scripts and styles.
 */


function chefeedback_scripts() {


    wp_enqueue_style( 'main-style', get_template_directory_uri().'/css/main.css' );


    wp_enqueue_script( 'chefeedback-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

    wp_enqueue_script( 'chefeedback-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }
}
add_action( 'wp_enqueue_scripts', 'chefeedback_scripts' );

/**
 * Implement the Custom Header feature.
 */

require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}



add_theme_support( 'post-thumbnails' );
set_post_thumbnail_size( 160, 140);
add_image_size( 'single-post-thumbnail', 160, 140 );


?>


<?php
function the_breadcrumb() {
		echo '<ul id="crumbs">';
	if (!is_home()) {
		echo '<li><a href="';
		echo get_option('home');
        echo '" >';
		echo 'Home';
        echo ' >';
		echo "</a></li>";
		if (is_category() || is_single()) {
			echo '<li>';
			the_category(' </li><li> ');
            echo ' >';
			if (is_single()) {
				echo "</li><li>";
				the_title();

				echo '</li>';


			}
		} elseif (is_page()) {
			echo '<li>';
			echo the_title();
			echo '</li>';

		}
	}
	elseif (is_tag()) {single_tag_title();}
	elseif (is_day()) {echo"<li>Archive for "; the_time('F jS, Y'); echo'</li>';}
	elseif (is_month()) {echo"<li>Archive for "; the_time('F, Y'); echo'</li>';}
	elseif (is_year()) {echo"<li>Archive for "; the_time('Y'); echo'</li>';}
	elseif (is_author()) {echo"<li>Author Archive"; echo'</li>';}
	elseif (isset($_GET['paged']) && !empty($_GET['paged'])) {echo "<li>Blog Archives"; echo'</li>';}
	elseif (is_search()) {echo"<li>Search Results"; echo'</li>';}
	echo '</ul>';
}
?>
