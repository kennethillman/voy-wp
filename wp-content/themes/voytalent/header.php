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


<body style="padding:0;margin:0;" <?php body_class( 'ds ds-grid ds-typography' ); ?>>

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
        <nav>
            <?php
                $menuParameters = array(
                    'theme_location' => 'menu-1',
                    'container' => false,
                    'echo' => false,
                    'items_wrap' => '%3$s',
                    'depth' => 0,
                );

                echo strip_tags(wp_nav_menu($menuParameters), '<a>');
            ?>
        </nav>
        <figure class="search-temp">
            <?php get_search_form(); ?>
        </figure>
    </div>
</header>

<?php
    if(is_page() && !is_home() && !is_front_page()):
        echo "<img src='".get_the_post_thumbnail_url(get_the_ID())."' />";
        echo get_the_title(get_the_ID())."<br />";
        echo get_the_subtitle(get_the_ID());
    endif;
?>

<?php get_template_part( 'parts/s-breadcrumbs' );?>