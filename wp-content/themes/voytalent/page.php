<?php
    get_header();
?>
<article class="content" style="background-color: white;">
    <?php get_template_part('parts/s-featured-image'); ?>
    <?php get_template_part('parts/s-breadcrumbs'); ?>
    <div class="gc">
        <?php
            while (have_posts()) :
                the_post();
                the_content();
            endwhile;
        ?>
    </div>

</article>
<?php
    get_footer();
?>
