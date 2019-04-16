<!doctype html>
<html <?php language_attributes(); ?> class="no-touch">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<link rel="profile" href="https://gmpg.org/xfn/11" />

<?php
	$css_path = get_template_directory_uri() . '/assets/styles/voy-ds.css';
?>

	<script type="text/javascript">
		
		/*///////////////////////////////////////////////////////////////////////////////////////////////////////
		Async Modular Loading With Dependencies Handling
		1kb - Modular load  - Async - https://github.com/pyrsmk/toast - MIT Licens
		*////////////////////////////////////////////////////////////////////////////////////////////////////////

		!function(e,t){"function"==typeof define&&define.amd?define([],function(){return e.toast=t()}):"object"==typeof exports?module.exports=t():e.toast=t()}(this,function(){function e(){var e=document.getElementsByTagName("head")[0],n=function(t){if(e){if(t.length){for(var a,r,c=-1;a=t[++c];)if("string"==typeof a)o(a);else if("function"==typeof a){r=a;break}i(r,Array.prototype.slice.call(t,c+1))}}else setTimeout(function(){n(t)},50)},o=function(n){var o,i,r=/\.(\w+)$/.exec(n),c=/^\[(\w+)\](.+)/.exec(n);if(null!==c)o=c[1],n=c[2];else{if(null===r)return;o=r[1]}if(!(n in t))switch(t[n]=!1,o){case"js":i=document.createElement("script"),i.src=n,i.async=!1,e.appendChild(i);var f=navigator.appVersion.match(/MSIE (\d)/);null!==f&&parseInt(f[1],10)<9?i.onreadystatechange=function(){/ded|co/.test(this.readyState)&&(t[n]=!0,i.onreadystatechange=null)}:i.onload=function(){t[n]=!0,i.onload=null};break;case"css":i=document.createElement("link"),i.rel="styleSheet",i.href=n,e.appendChild(i),a(i,n);break;default:return void delete t[n]}},i=function(e,o){for(var a in t)if(!t[a])return void setTimeout(function(){i(e,o)},50);"function"==typeof e&&e(),n(o)},a=function(e,n){e.sheet||e.styleSheet?t[n]=!0:setTimeout(function(){a(e,n)},50)};n(arguments)}var t={};return e});


		 var VOY_PRESET = {
	      // theme: '<?php echo $site_namespace ?>',
	      // version: '<?php echo $getBustHash ?>',
	      path: {
          // svg: {
          //   icons: '<?php echo $svg_icon_path ?>'
          // },
          styles: '<?php echo $css_path ?>',
          // print: '<?php echo $css_print_path ?>',
          // scripts: {
          //   polyfills: '<?php echo $js_polyfills_path ?>',
          //   voy: '<?php echo $js_seagal_path ?>',
          // },
          // critical: '',
	      }
		 };

		// LOAD CSS ASYNC
		toast('[css]'+VOY_PRESET.path.styles);

	</script>

	<?php wp_head(); ?>
</head>

<body style="padding:0;margin:0;" <?php body_class( 'ds-grid ds-typography' ); ?>>

<header class="s-header">
	<div class="gc">
        <a href="<?php echo get_site_url(); ?>">
            <figure class="logo">
                <svg id="Lager_2" data-name="Lager 2" xmlns="http://www.w3.org/2000/svg" width="361" height="101.18" viewBox="0 0 361 101.18"><title>voy-talent</title><polygon points="103 101.04 71 101.04 0 30.04 22 7.04 71 56.04 71 0.04 103 0.04 103 101.04"/><polygon points="251 101.04 251 0.04 282 0.04 282 34.04 316 0.04 338 22.04 282 78.04 282 101.04 251 101.04"/><circle cx="345" cy="85.04" r="16"/><path d="M216,80c-25-1-53.3,17.5-53,51,.29,33.26,29,52,53,50,24,2,52.71-16.74,53-50C269.3,97.5,241,79,216,80Zm0,73s-20,0-20-23,20-23,20-23,20,0,20,23S216,153,216,153Z" transform="translate(-39 -79.96)"/></svg>
            </figure>
        </a>
		<nav>
            <?php
                $menuParameters = array(
                    'theme_location' => 'menu-1',
                    'container'       => false,
                    'echo'            => false,
                    'items_wrap'      => '%3$s',
                    'depth'           => 0,
                );

                echo strip_tags(wp_nav_menu( $menuParameters ), '<a>' );
            ?>
		</nav>
		<figure class="search-temp">
            <?php get_search_form(); ?>
			<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M23.809 21.646l-6.205-6.205c1.167-1.605 1.857-3.579 1.857-5.711 0-5.365-4.365-9.73-9.731-9.73-5.365 0-9.73 4.365-9.73 9.73 0 5.366 4.365 9.73 9.73 9.73 2.034 0 3.923-.627 5.487-1.698l6.238 6.238 2.354-2.354zm-20.955-11.916c0-3.792 3.085-6.877 6.877-6.877s6.877 3.085 6.877 6.877-3.085 6.877-6.877 6.877c-3.793 0-6.877-3.085-6.877-6.877z"/></svg>
		</figure>
	</div>
</header>

