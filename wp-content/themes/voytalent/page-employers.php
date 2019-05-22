<?php
/*
 * Template Name: Employers Page
 * */
get_header();
?>

<?php get_template_part('parts/s-featured-image'); ?>
<?php get_template_part('parts/s-breadcrumbs'); ?>

<article class="s- content p-stories">
    <?php get_template_part('parts/s-no-featured-image'); ?>

    <div class="gc" >
        <div class="g-8 g-push-2 g-m-12 g-m-push-0 g-t-10 g-t-push-1" >
            <?php
                while (have_posts()) :
                    the_post();
                    the_content();
                endwhile;
            ?>
        </div>
    </div>

    <?php
        if ( is_active_sidebar( 'voy-sidebar-2' ) ) :
            dynamic_sidebar( 'voy-sidebar-2' );
        endif;
    ?>

</article>

<?php
get_footer();
?>
