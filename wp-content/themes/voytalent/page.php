<?php
    get_header();
?>



<article class="content">

  <div class="gc">
    <?php
        while (have_posts()) :
            the_post();

            //the_title();
            the_content();
        endwhile;
    ?>
  </div>

</article>




<?php
    get_footer();
?>
