<?php
/**
 * Template for displaying s-team in Voy talent
 *
 * @package WordPress
 * @subpackage Voytalent
 * @since 1.0
 * @version 1.0
 */
global $queryTeam;

?>

<section class="s-team ">
	<div class="gc">

		<div class="g-12">
			<h2 class="header-section">Voy Talent team</h2>
			<!-- <p class=preamble-section>
				Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
			</p> -->
		</div>

        <?php
            if($queryTeam->have_posts() ):
            while ( $queryTeam->have_posts() ) :
                $queryTeam->the_post();
        ?>

            <div class="g-6 g-m-12">
                <div class="m-teaser-person">
                    <div class="body -pattern-striped-light">
                        <div class="header">
                            <h4 class="header-name"><?php echo get_the_title( $queryTeam->post->ID ); ?></h4>
                            <h5 class="header-title"><?php echo get_field('empdesignation', $queryTeam->post->ID, true)?></h5>
                        </div>
                        <figure class="image">
                            <?php
                                $imageUrl = get_the_post_thumbnail_url($queryTeam->post->ID);
                                if( $imageUrl == ''):
                            ?>
                                <img src="http://voy-wp:8888/wp-content/uploads/2019/05/39453707_10155733478761570_4271255941199953920_n-1.jpg">
                            <?php
                                else:
                            ?>
                                <img src="<?php echo $imageUrl; ?>">
                            <?php
                                endif;
                            ?>
                        </figure>

                    </div>
                    <div class="links">
                        <a href="mailto:<?php echo get_field('empemail', $queryTeam->post->ID, true)?>"><?php echo get_field('empemail', $queryTeam->post->ID, true)?></a><br>
                        <a href="<?php echo get_field('linked_url', $queryTeam->post->ID, true)?>" target="_blank">Connect with <?php echo get_the_title( $queryTeam->post->ID ); ?> on LinkedIn</a>
                    </div>
                </div>
            </div>

        <?php
                    endwhile;
                endif;
            wp_reset_postdata();
        ?>

	</div>
</section>
