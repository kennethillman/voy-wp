<?php
/**
 * Template for displaying s-footer in Voy talent
 *
 * @package WordPress
 * @subpackage Voytalent
 * @since 1.0
 * @version 1.0
 */
?>
 <section class="s-footer">
 	<div class="gc">
		<div class="g-3 g-m-12 hide-tab-desktop">
            <?php
                $voy_address = get_option( 'my_option_name' );
                echo $voy_address["voy_address"];
            ?>
		</div>
		<div class="g-3 g-t-6 g-m-12">
            <?php
                $menuFooterParameters = array(
                    'theme_location' => 'footer',
                    'container' => false,
                    'depth' => 0,
                );

                wp_nav_menu($menuFooterParameters);
            ?>
		</div>
		<div class="g-6 g-m-12 hide-tab-desktop">
			<!-- <a href="<?php echo get_privacy_policy_url();?>">Voy talent Privacy</a> -->
	 	</div>
	 </div>
   <div class="pattern"></div>
 </section>
