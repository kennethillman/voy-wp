<?php
/**
 * Template for displaying s-featured image in Voy talent
 *
 * @package WordPress
 * @subpackage Voytalent
 * @since 1.0
 * @version 1.0
 */

if(is_page() && !is_home() && !is_front_page() && !empty(get_the_title(get_the_ID())) && !empty(get_post_meta( get_the_ID(), 'wps_subtitle', true ))):
    $featuredImage = get_the_post_thumbnail_url(get_the_ID());
    $theTitle = get_the_title(get_the_ID());
    $theSubTitle = get_post_meta( get_the_ID(), 'wps_subtitle', true );
endif;
$getPageImagesAndTexting = getPageImagesAndTexting(get_the_ID());
$image_position = $getPageImagesAndTexting['image_position'];
$text_position = $getPageImagesAndTexting['text_position'];
$text_size = $getPageImagesAndTexting['text_size'];
?>
<style type="text/css">
    .s-featured-image .image {
        background-image: url('<?php echo $featuredImage;?>');
    }
</style>

<section class="s-featured-image <?php echo ($text_position!='')?$text_position : '-text-pos-left'; ?> <?php echo ($text_size!='')?$text_size : ''; ?>">
    <?php if(!empty($featuredImage)) : ?>
        <figure class="image <?php echo ($image_position!='')?$image_position : '-focus-center-center'; ?>">
            <!-- <img src="assets/images/temp-featured.jpg"> -->
        </figure>
    <?php  endif; ?>
    <div class="text">
        <div class="gc">
            <div class="g-12">
                <div class="headers">
                    <?php if(!empty($theTitle)) : ?>
                        <h2 class="header">
                            <?php echo $theTitle;?>
                        </h2>
                    <?php  endif; ?>
                    <?php if(!empty($theSubTitle)) : ?>
                        <h3 class="sub-header">
                            <?php echo $theSubTitle;?>
                        </h3>
                    <?php  endif; ?>
                </div>
            </div>
        </div>
    </div>
</section>
