<?php
/**
 * Template for displaying s-breadcrumbs in Voy talent
 *
 * @package WordPress
 * @subpackage Voytalent
 * @since 1.0
 * @version 1.0
 */

?>

<section class="s-breadcrumbs">
  <div class="body">
      <div class="gc">
        <!--<div class="g-12"><a href="">Voy</a><a href="">Jobs</a>Creative director</div>-->
        <div class="g-12">
            <?php
                if (!is_home() && !is_front_page() && function_exists('yoast_breadcrumb')) {
                    yoast_breadcrumb('', '');
                }
            ?>
        </div>
    </div>
  </div>

</section>
