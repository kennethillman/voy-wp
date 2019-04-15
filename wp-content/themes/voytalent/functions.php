<?php


if ( ! function_exists( 'theme_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function theme_setup() {
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
		set_post_thumbnail_size( 1568, 9999 );

		// This theme uses wp_nav_menu() in two locations.
		register_nav_menus(
			array(
				'menu-1' => __( 'Primary', 'voytalent' ),
				'footer' => __( 'Footer Menu', 'voytalent' ),
				'social' => __( 'Social Links Menu', 'voytalent' ),
			)
		);

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
			)
		);

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support(
			'custom-logo',
			array(
				'height'      => 190,
				'width'       => 190,
				'flex-width'  => false,
				'flex-height' => false,
			)
		);

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		// Add support for Block Styles.
		add_theme_support( 'wp-block-styles' );

		// Add support for full and wide align images.
		add_theme_support( 'align-wide' );

		// Add support for editor styles.
		add_theme_support( 'editor-styles' );

		// Enqueue editor styles.
		add_editor_style( 'style-editor.css' );

		// Add custom editor font sizes.
		add_theme_support(
			'editor-font-sizes',
			array(
				array(
					'name'      => __( 'Small', 'voytalent' ),
					'shortName' => __( 'S', 'voytalent' ),
					'size'      => 19.5,
					'slug'      => 'small',
				),
				array(
					'name'      => __( 'Normal', 'voytalent' ),
					'shortName' => __( 'M', 'voytalent' ),
					'size'      => 22,
					'slug'      => 'normal',
				),
				array(
					'name'      => __( 'Large', 'voytalent' ),
					'shortName' => __( 'L', 'voytalent' ),
					'size'      => 36.5,
					'slug'      => 'large',
				),
				array(
					'name'      => __( 'Huge', 'voytalent' ),
					'shortName' => __( 'XL', 'voytalent' ),
					'size'      => 49.5,
					'slug'      => 'huge',
				),
			)
		);

		// Editor color palette.
		add_theme_support(
			'editor-color-palette',
			array(
				array(
					'name'  => __( 'Primary', 'voytalent' ),
					'slug'  => 'primary',
					'color' => voy_hsl_hex( 'default' === get_theme_mod( 'primary_color' ) ? 199 : get_theme_mod( 'primary_color_hue', 199 ), 100, 33 ),
				),
				array(
					'name'  => __( 'Secondary', 'voytalent' ),
					'slug'  => 'secondary',
					'color' => voy_hsl_hex( 'default' === get_theme_mod( 'primary_color' ) ? 199 : get_theme_mod( 'primary_color_hue', 199 ), 100, 23 ),
				),
				array(
					'name'  => __( 'Dark Gray', 'voytalent' ),
					'slug'  => 'dark-gray',
					'color' => '#111',
				),
				array(
					'name'  => __( 'Light Gray', 'voytalent' ),
					'slug'  => 'light-gray',
					'color' => '#767676',
				),
				array(
					'name'  => __( 'White', 'voytalent' ),
					'slug'  => 'white',
					'color' => '#FFF',
				),
			)
		);

		// Add support for responsive embedded content.
		add_theme_support( 'responsive-embeds' );
	}
endif;
add_action( 'after_setup_theme', 'theme_setup' );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function voytalent_widgets_init() {

	register_sidebar(
		array(
			'name'          => __( 'Footer', 'voytalent' ),
			'id'            => 'sidebar-1',
			'description'   => __( 'Add widgets here to appear in your footer.', 'voytalent' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);

}
add_action( 'widgets_init', 'voytalent_widgets_init' );

/**
 * Convert HSL to HEX colors
 */
function voy_hsl_hex( $h, $s, $l, $to_hex = true ) {

    $h /= 360;
    $s /= 100;
    $l /= 100;

    $r = $l;
    $g = $l;
    $b = $l;
    $v = ( $l <= 0.5 ) ? ( $l * ( 1.0 + $s ) ) : ( $l + $s - $l * $s );
    if ( $v > 0 ) {
        $m;
        $sv;
        $sextant;
        $fract;
        $vsf;
        $mid1;
        $mid2;

        $m       = $l + $l - $v;
        $sv      = ( $v - $m ) / $v;
        $h      *= 6.0;
        $sextant = floor( $h );
        $fract   = $h - $sextant;
        $vsf     = $v * $sv * $fract;
        $mid1    = $m + $vsf;
        $mid2    = $v - $vsf;

        switch ( $sextant ) {
            case 0:
                $r = $v;
                $g = $mid1;
                $b = $m;
                break;
            case 1:
                $r = $mid2;
                $g = $v;
                $b = $m;
                break;
            case 2:
                $r = $m;
                $g = $v;
                $b = $mid1;
                break;
            case 3:
                $r = $m;
                $g = $mid2;
                $b = $v;
                break;
            case 4:
                $r = $mid1;
                $g = $m;
                $b = $v;
                break;
            case 5:
                $r = $v;
                $g = $m;
                $b = $mid2;
                break;
        }
    }
    $r = round( $r * 255, 0 );
    $g = round( $g * 255, 0 );
    $b = round( $b * 255, 0 );

    if ( $to_hex ) {

        $r = ( $r < 15 ) ? '0' . dechex( $r ) : dechex( $r );
        $g = ( $g < 15 ) ? '0' . dechex( $g ) : dechex( $g );
        $b = ( $b < 15 ) ? '0' . dechex( $b ) : dechex( $b );

        return "#$r$g$b";

    }

    return "rgb($r, $g, $b)";
}

function add_theme_scripts() {
    wp_enqueue_style( 'style', get_stylesheet_uri() );
    wp_enqueue_script( 'script', get_template_directory_uri() . '/js/script.js', array ( 'jquery' ), 1.1, true);
}
add_action( 'wp_enqueue_scripts', 'add_theme_scripts' );

