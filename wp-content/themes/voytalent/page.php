<?php
    get_header();
?>

<article class="s-content content" style="background-color: white;">
    <?php get_template_part('parts/s-featured-image'); ?>
    <?php get_template_part('parts/s-breadcrumbs'); ?>
    <?php get_template_part('parts/s-no-featured-image'); ?>

    <div class="gc" style="background: #eee;">
        <div class="g-8 g-push-2 g-m-12 g-m-push-0" style="background: #ddd;">

        <?php
            while (have_posts()) :
                the_post();
                the_content();
            endwhile;
        ?>

        </div>
    </div>

</article>
<?php
    get_footer();
?>

