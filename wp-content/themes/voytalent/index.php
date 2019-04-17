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

    <section id="primary" class="content-area">
        <main id="main" class="site-main">

            Site Content Here

        </main><!-- .site-main -->
    </section><!-- .content-area -->


<?php get_template_part( 'parts/s-list-latest' ); ?>
<?php get_template_part( 'parts/s-inspiration-week' ); ?>
<?php get_template_part( 'parts/s-inspiration-teasers' ); ?>
<?php get_template_part( 'parts/s-team' ); ?>


<?php
    get_footer();
?>
