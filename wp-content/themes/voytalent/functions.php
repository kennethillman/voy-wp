<?php
session_start();
if ( ! function_exists( 'theme_setup' ) ) :
	function theme_setup() {
		add_theme_support( 'automatic-feed-links' );
    	add_theme_support( 'title-tag' );
		add_theme_support( 'post-thumbnails' );
		set_post_thumbnail_size( 1568, 9999 );

        add_image_size( 'featured_image_480', 480, 9999 );
        add_image_size( 'featured_image_1440', 1440, 9999 );
        add_image_size( 'featured_image_2048', 2048, 9999 );

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
            'name'          => __( 'Sidebar 1', 'voytalent' ),
            'id'            => 'voy-sidebar-1',
            'description'   => __( 'Add widgets here to appear in Sidebar 1.' ),
            'before_widget' => '<section id="%1$s" class="widget %2$s">',
            'after_widget'  => '</section>',
            'before_title'  => '<h2 class="widget-title">',
            'after_title'   => '</h2>',
        )
    );

    register_sidebar(
        array(
            'name'          => __( 'Sidebar 2', 'voytalent' ),
            'id'            => 'voy-sidebar-2',
            'description'   => __( 'Add widgets here to appear in Sidebar 3.'),
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
    wp_enqueue_script( 'voy_scripts', get_template_directory_uri() . '/assets/scripts/custom.js', array ( 'jquery' ), 1.1, true);
    wp_localize_script( 'voy_scripts', 'voy_ajax', [ 'ajax_url' => admin_url( 'admin-ajax.php' ) ] );
}
add_action( 'wp_enqueue_scripts', 'add_theme_scripts' );

add_filter( 'nav_menu_link_attributes', 'menu_add_class', 10, 3 );
$i = 0;
function menu_add_class( $atts, $item, $args ) {
    global $i;
    if($args->theme_location = "menu-1" && $item->object_id == get_the_ID()){
        $class = '-active';
        $atts['class'] = $class;
    }
    $i++;
    return $atts;
}

if ( ! function_exists( 'voy_the_posts_navigation' ) ) :
    function voy_the_posts_navigation() {
        the_posts_pagination(
            array(
                'mid_size'  => 2,
                'prev_text' => sprintf(
                    '%s <span class="nav-prev-text">%s</span>',
                    '',
                    __( 'Newer posts' )
                ),
                'next_text' => sprintf(
                    '<span class="nav-next-text">%s</span> %s',
                    __( 'Older posts' ),
                    ''
                ),
            )
        );
    }
endif;

function getPageImagesAndTexting($pageId){
    $images_text = array();
    $images_text['image_position'] = get_post_meta( $pageId, 'image_position', true );
    $images_text['text_position'] = get_post_meta( $pageId, 'text_position', true );
    $images_text['text_size'] = get_post_meta( $pageId, 'text_size', true );

    return $images_text;
}

add_action('wp_ajax_post_candidate',  'post_candidate'  );
add_action('wp_ajax_nopriv_post_candidate',  'post_candidate');

function post_candidate(){
    if(isset($_POST)){
        $postData = $_POST;
        array_shift($postData);
        echo VoyWorkableAPI::post_candidate($postData);
    }
    wp_die();
}

//Contact Email
add_action('wp_ajax_send_email',  'send_email_contact'  );
add_action('wp_ajax_nopriv_send_email',  'send_email_contact');

function send_email_contact(){
    if(isset($_POST) && $_SESSION['mailalreadysent']==''){
        $pData = $_POST;
        array_shift($pData);

        $subject = $_POST['subject'];
        $comment = $_POST['comment'];
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $c_email = $_POST['c_email'];
        $c_phone = $_POST['c_phone'];

        $toAddress = get_option( 'my_option_name' );
        $toAddress = $toAddress['voy_contact_email'];

        $to = $toAddress;
        $headers = array('Content-Type: text/html; charset=UTF-8');
        $headers[] = 'From: '. $c_email . "\r\n" ;
        $headers[] = 'Reply-To: ' . $c_email . "\r\n";

        $message = "Hi,<br />";
        $message.= "There is message from below contact detail: <br /><br />";
        $message.= "<strong>Name:</strong> ".$fname. ' '.$lname ." <br />";
        $message.= "<strong>Email:</strong> ".$c_email." <br />";
        $message.= "<strong>Phone:</strong> ".$c_phone." <br />";
        $message.= "<strong>Message:</strong> ".$comment." <br />";

        $status = [];

        $sent = wp_mail($to, $subject, $message, $headers);

        if($sent) {
            $_SESSION['mailalreadysent'] = $c_email;
            $status['status'] = 'success';
            $status['msg'] = 'Mail Sent Successfully';
        }
        else{
            $status['status'] = 'error';
            $status['msg'] = 'Mail Not Sent';
        }

        echo json_encode($status);

    }else{
        $status['status'] = 'error';
        $status['msg'] = 'Mail Aleardy Sent';

        echo json_encode($status);
    }
    wp_die();
}

// custom category for voyteam post type
add_action('init', 'team_categories');
function team_categories(){
    register_taxonomy("voyfields",
        array("voyteam"),
        array(
            "hierarchical" => true,
            "label" => "Voy Fields",
            "singular_label" => "Voy Field",
            'show_ui'           => true,
            'show_admin_column' => true,
            'query_var'         => true,
            'show_in_nav_menus' => true,
            'show_in_rest' => true,
            'public' => true,
            "rewrite" => array( 'slug' => 'voyfields', 'with_front'=> false )
        )
    );
}

//SHORTCODES -S
//Display Voytalent tempalte part using shortcode

function voytalentteam_shortcode( $atts ) {
    global $queryTeam;
    $params = shortcode_atts( array(
        'count' => 2,
        'postid' => ''
    ), $atts );

    $query_args = array(
        'post_type' => 'voyteam',
        'post_status' => array( 'publish' ),
        'posts_per_page' => $params['count'],
        'orderby' => 'ID',
        'order'   => 'ASC'
    );

    if($params['postid']!= ''){
        $postid = explode(",", $params['postid']);
        $query_args ['post__in'] = $postid;
    }

    //echo "<pre>"; print_r($query_args);
    $queryTeam = new WP_Query( $query_args );

    if(!is_admin()){
        $team = get_template_part( 'parts/s-team' );
    }

    wp_reset_postdata();
}
add_shortcode( 'voytalentteam', 'voytalentteam_shortcode' );

//join voy
function joinvoy_shortcode(){
    if(!is_admin() && is_front_page()){
        get_template_part( 'parts/s-join-voy' );
    }
}
add_shortcode( 'joinvoy', 'joinvoy_shortcode' );

//SHORTCODES -E

//ACF Fields
function register_acf_block_types() {
    // register a testimonial block.
    acf_register_block_type(array(
        'name'              => 'indpro-test',
        'title'             => __('Indpro Testimonial'),
        'description'       => __('A custom testimonial block.'),
        'render_template'   => 'template-parts/blocks/testimonial/testimonial.php',
        'category'          => 'formatting',
        'icon'              => 'admin-comments',
        'keywords'          => array( 'quotessss' ),
    ));
}

// Check if function exists and hook into setup.
if( function_exists('acf_register_block_type') ) {
    add_action('acf/init', 'register_acf_block_types');
}