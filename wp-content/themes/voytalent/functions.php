<?php
if ( ! function_exists( 'theme_setup' ) ) :
	function theme_setup() {
		add_theme_support( 'automatic-feed-links' );
    	add_theme_support( 'title-tag' );
		add_theme_support( 'post-thumbnails' );
		set_post_thumbnail_size( 1568, 9999 );

		register_nav_menus(
			array(
				'menu-1' => __( 'Primary', 'voytalent' ),
				'footer' => __( 'Footer Menu', 'voytalent' ),
				'social' => __( 'Social Links Menu', 'voytalent' ),
			)
		);

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

		add_theme_support(
			'custom-logo',
			array(
				'height'      => 190,
				'width'       => 190,
				'flex-width'  => false,
				'flex-height' => false,
			)
		);
		add_theme_support( 'customize-selective-refresh-widgets' );
		add_theme_support( 'wp-block-styles' );
		add_theme_support( 'align-wide' );
		add_theme_support( 'editor-styles' );
		add_editor_style( 'style-editor.css' );
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
		add_theme_support( 'responsive-embeds' );
	}
endif;
add_action( 'after_setup_theme', 'theme_setup' );

/**
 * Register widget area.
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

/** Convert HSL to HEX colors */
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

/*
add_filter('nav_menu_css_class', 'custom_nav_menu_css_class', 10, 2 );
function custom_nav_menu_css_class( $classes, $items) {
    global $i;
    echo "---".$i++;
    print_r($items);
    exit;
    if( 'category' === $items->object ){
        array_push( $classes, 'dropdown' );
    }
    return $classes;
}

function wpb_first_and_last_menu_class($items) {
    $theme_locations = get_nav_menu_locations();
    if($theme_locations['menu-1']!=0){
        foreach($items as $key => $item) {
            $items[$key]->classes[] = '-active';
        }
    }
    //print_r($items);exit;
    return $items;
}
add_filter('wp_nav_menu_objects', 'wpb_first_and_last_menu_class');
*/

add_filter( 'nav_menu_link_attributes', 'menu_add_class', 10, 3 );
$i = 0;
function menu_add_class( $atts, $item, $args ) {
    global $i;
    if($args->theme_location = "menu-1" && $i==0){
        $class = '-active'; // or something based on $item
        $atts['class'] = $class;
    }
    $i++;
    return $atts;
}