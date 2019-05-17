<!doctype html>
<html <?php language_attributes(); ?> class="no-touch">
<head>
    <meta charset="<?php bloginfo('charset'); ?>"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <link rel="profile" href="https://gmpg.org/xfn/11"/>


	<?php

  	// Cache busting for CSS/JS and SVG
  	$getCacheBustFile = './wp-content/themes/voytalent/assets/styles/voy-ds.css';
  	if ( file_exists( $getCacheBustFile ) ) {
      	$getBustHash = '?' . filemtime( $getCacheBustFile );
   	} else {
        $getBustHash = '';
    }

	  $svg_icon_path = get_template_directory_uri() . '/assets/svg/svg-sprite.svg' . $getBustHash;
		$css_path = get_template_directory_uri() . '/assets/styles/voy-ds.css' . $getBustHash;
		$js_path = get_template_directory_uri() . '/assets/scripts/voy.js' . $getBustHash;
	?>

	<script type="text/javascript">

    /* - - Inline Sync resource loader - - */
		<?php
			$toastloader = file_get_contents( 'assets/scripts/vendor/toast.min.js' , true );
	    echo $toastloader;
    ?>

    var VOY_PRESET = {
      path: {
        svg: {
          icons: '<?php echo $svg_icon_path ?>'
        },
        styles: '<?php echo $css_path ?>',
        // print: '<?php echo $css_print_path ?>',
        scripts: {
        //   polyfills: '<?php echo $js_polyfills_path ?>',
        	voy: '<?php echo $js_path ?>',
        },
        // critical: '',
      }
    };

    /* - - Inline Critical JS - - */
    <?php
      $js_inline_head = 'assets/scripts/voy.inlineHead.js'; // KI -> Gulp beautify this one!
      $jsInlineHead = file_get_contents( $js_inline_head , true );
      echo $jsInlineHead;
    ?>


    var VOY_PRESET = {
        version: '<?php echo $getBustHash ?>',
        file: '<?php echo $getCacheBustFile ?>',
        path: {
            svg: {
                icons: '<?php echo $svg_icon_path ?>'
            },
            styles: '<?php echo $css_path ?>',
            // print: '<?php echo $css_print_path ?>',
            scripts: {
                //   polyfills: '<?php echo $js_polyfills_path ?>',
                voy: '<?php echo $js_path ?>',
            },
            // critical: '',
        }
    };

    </script>

    <?php wp_head(); ?>
</head>

<?php
    $bodyClass = '';
    if(is_page() || is_front_page()){
        $pid = (is_front_page())? get_option('page_on_front'): get_the_ID();
        $hasFeaturedImage = get_the_post_thumbnail_url($pid);
        $bodyClass = ($hasFeaturedImage!='')? '-has-featured-image': '';
    }

?>

<body <?php body_class( array( "ds-grid", "ds-typography", $bodyClass ) ); ?>>

<script type="text/javascript">
  VOY.initial.loadGoogleFONTS();
</script>

<figure class="svg-sprite -hide">
	<?php
    $svgSprite = file_get_contents( $svg_icon_path , true );
    echo $svgSprite;
  ?>
</figure>


<header class="s-header">
    <div class="gc">
        <!-- LOGO -->
        <a href="<?php echo get_site_url(); ?>" class="logo">
            <svg id="Lager_2" data-name="Lager 2" xmlns="http://www.w3.org/2000/svg" width="361" height="101.18"
                 viewBox="0 0 361 101.18"><title>voy-talent</title>
                <polygon points="103 101.04 71 101.04 0 30.04 22 7.04 71 56.04 71 0.04 103 0.04 103 101.04"/>
                <polygon
                        points="251 101.04 251 0.04 282 0.04 282 34.04 316 0.04 338 22.04 282 78.04 282 101.04 251 101.04"/>
                <circle cx="345" cy="85.04" r="16"/>
                <path d="M216,80c-25-1-53.3,17.5-53,51,.29,33.26,29,52,53,50,24,2,52.71-16.74,53-50C269.3,97.5,241,79,216,80Zm0,73s-20,0-20-23,20-23,20-23,20,0,20,23S216,153,216,153Z"
                      transform="translate(-39 -79.96)"/>
            </svg>
        </a>

<!-- NAV -->

        <nav>
            <?php
                $menuParameters = array(
                    'theme_location' => 'menu-1',
                    'container' => false,
                    'echo' => false,
                    'items_wrap' => '<span>%3$s</span>',
                    'depth' => 0,
                    'link_before' => '<span>',
                    'link_after' => '</span>',
                );

                echo strip_tags(wp_nav_menu($menuParameters), '<a><span>');
            ?>
        </nav>

<!-- SEARCH -->

        <figure class="search">
            <?php get_search_form(); ?>
        </figure>

<!-- TOGGLE ICONS -->

        <div id="toggle-search">
          <svg role="img" title="icon" class="svg-icon">
            <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#voy-magnifier"  svg=""></use>
          </svg>
        </div>

        <div id="toggle-mobile-menu">
          <svg role="img" title="icon" class="svg-icon">
            <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#voy-menu-thin"  svg=""></use>
          </svg>
        </div>


    </div>
</header>

<?php
    global $featuredImage;
    $featuredImage = [];

    if(is_front_page()) :
        $front_page_ID = get_option('page_on_front');

        $featuredImage ['featured_image_480'] = get_the_post_thumbnail_url($front_page_ID, 'featured_image_480' );
        $featuredImage ['large'] = get_the_post_thumbnail_url($front_page_ID, 'large' );
        $featuredImage ['featured_image_1440'] = get_the_post_thumbnail_url($front_page_ID, 'featured_image_1440' );
        $featuredImage ['featured_image_2048'] = get_the_post_thumbnail_url($front_page_ID, 'featured_image_2048' );

        $front_page_theTitle = get_the_title($front_page_ID);
        $front_page_theSubTitle = get_post_meta( $front_page_ID, 'wps_subtitle', true );

        $getPageImagesAndTexting = getPageImagesAndTexting($front_page_ID);
        $front_page_image_position = $getPageImagesAndTexting['image_position'];
        $front_page_text_position = $getPageImagesAndTexting['text_position'];
        $front_page_text_size = $getPageImagesAndTexting['text_size'];
?>

<?php get_template_part('parts/s-featured-image-style'); ?>

<section class="<?php echo (get_the_post_thumbnail_url($front_page_ID)!='')? 's-featured-image' : 's-no-featured-image'; ?> <?php echo ($front_page_text_position!='')?$front_page_text_position : '-text-pos-left'; ?> <?php echo ($front_page_text_size!='')?$front_page_text_size : ''; ?>">
        <figure class="image <?php echo ($front_page_image_position!='')?$front_page_image_position : '-focus-center-center'; ?>"></figure>
        <div class="text">
        <div class="gc">
            <div class="g-12">
                <div class="headers">
                    <?php if(!empty($front_page_theTitle)) : ?>
                        <h1 class="header">
                            <?php echo $front_page_theTitle;?>
                        </h1>
                    <?php  endif; ?>
                    <?php if(!empty($front_page_theSubTitle)) : ?>
                        <h3 class="sub-header">
                            <?php echo $front_page_theSubTitle;?>
                        </h3>
                    <?php  endif; ?>
                </div>
            </div>
        </div>
    </div>
</section>
<?php  endif; ?>



