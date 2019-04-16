<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package WordPress
 * @subpackage Twenty_Nineteen
 * @since 1.0.0
 */

get_header();
?>

	<section id="primary" class="content-area">
		<main id="main" class="site-main">

		<?php if ( have_posts() ) : ?>

			<header class="page-header">
				<h1 class="page-title">
					<?php _e( 'Search results for:', 'twentynineteen' ); ?>
				</h1>
				<div class="page-description"><?php echo get_search_query(); ?></div>
			</header><!-- .page-header -->

			<?php
                // Start the Loop.
                    while ( have_posts() ) :
                        the_post();
                        the_excerpt();
                    endwhile;
                endif;
            ?>
		</main><!-- #main -->
	</section><!-- #primary -->

<?php
get_footer();
?>
