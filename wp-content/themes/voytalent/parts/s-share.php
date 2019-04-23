<?php
/**
 * Template for displaying s-share in Voy talent
 *
 * @package WordPress
 * @subpackage Voytalent
 * @since 1.0
 * @version 1.0
 */

?>

 <section class="s-share">
 	<div class="gc">
		<div class="g-6 g-m-12 g-t-3">
			<figure class="logo">
				<svg role="img" title="icon" class="svg-icon">
        			<use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#voy-voy-talent"  svg=""></use>
        		</svg>
			</figure>
		</div>
		<div class="g-6 g-m-12 g-t-9">
			<h3 class="header">Follow us</h3>
            <?php
                $array_menu = wp_get_nav_menu_items('Social Menu');
            ?>
			<ul>
                <?php
                    foreach ($array_menu as $menu){
                ?>
                    <li>
                        <a href="<?php echo $menu->url;?>" target="<?php echo $menu->target;?>">
                            <svg role="img" title="icon" class="svg-icon">
                                <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="<?php echo "#".$menu->classes[0];?>"  svg=""></use>
                            </svg>
                        </a>
                    </li>
				<?php
                    }
                ?>
			</ul>
		</div>
 	</div>
 </section>