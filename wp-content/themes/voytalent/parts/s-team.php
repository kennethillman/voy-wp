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

    <?php if(is_front_page()): ?>
        <div class="gc">
            <div class="g-12">
                <div class="component-divider">
                    <span class="text">Join Voy talent</span>
                    <span class="icon">
							<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M0 7.33l2.829-2.83 9.175 9.339 9.167-9.339 2.829 2.83-11.996 12.17z"></path></svg>
						</span>
                </div>
            </div>
        </div>
    <?php endif; ?>

</section>
