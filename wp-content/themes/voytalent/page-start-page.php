<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage voytalent
 * @since 1.0.0
 */

get_header();
?>

<?php get_template_part( 'parts/s-list-latest' ); ?>

<article class="content">
    <div class="gc">
        <div class="g-8 g-push-2 g-m-12 g-m-push-0 g-t-10 g-t-push-1" >
          <?php
              if ( have_posts() ) :
                  while ( have_posts() ) :
                      the_post();
                      the_content();
                  endwhile;
              endif;
          ?>
        </div>
    </div>
</article>

<?php
    if ( is_active_sidebar( 'voy-start-page' ) ) :
        dynamic_sidebar( 'voy-start-page' );
    endif;
?>

<?php
    get_footer();
?>
