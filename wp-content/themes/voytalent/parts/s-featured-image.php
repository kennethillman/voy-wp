<?php
/**
 * Template for displaying s-featured image in Voy talent
 *
 * @package WordPress
 * @subpackage Voytalent
 * @since 1.0
 * @version 1.0
 */

global $featuredImage,$theTitle,$theSubTitle,$jobID;
$featuredImage = [];

$theTitle = get_the_title(get_the_ID());
$theSubTitle = get_post_meta( get_the_ID(), 'wps_subtitle', true );

$post_thumbnail = get_field( 'featured_image_1');
$slider_shortcode = get_field( 'slider_short_code');

if($slider_shortcode!=''):
    echo do_shortcode($slider_shortcode);

elseif(is_page() && !is_home() && !is_front_page() && !empty(get_the_title(get_the_ID())) && $post_thumbnail!='' && $slider_shortcode==''):
    $featuredImage ['featured_image_480'] = $post_thumbnail['sizes']['featured_image_480'];
    $featuredImage ['large'] = $post_thumbnail['sizes']['large'];
    $featuredImage ['featured_image_1440'] = $post_thumbnail['sizes']['featured_image_1440'];
    $featuredImage ['featured_image_2048'] = $post_thumbnail['sizes']['featured_image_2048'];

    $getPageImagesAndTexting = getPageImagesAndTexting(get_the_ID());
    $image_position = $getPageImagesAndTexting['image_position'];
    $text_position = $getPageImagesAndTexting['text_position'];
    $text_size = $getPageImagesAndTexting['text_size'];
?>

<?php get_template_part('parts/s-featured-image-style'); ?>

<section class="s-featured-image <?php echo ($text_position!='')?$text_position : '-text-pos-left'; ?> <?php echo ($text_size!='')?$text_size : ''; ?>">
    <?php if(!empty($featuredImage)) : ?>
        <figure class="image <?php echo ($image_position!='')?$image_position : '-focus-center-center'; ?>">
        </figure>
    <?php  endif; ?>
    <div class="text">
        <div class="gc">
            <div class="g-12">
                <div class="headers">
                    <?php if(!empty($theTitle)) : ?>
                        <h1 class="header">
                            <?php echo $theTitle;?>
                        </h1><br>
                    <?php  endif; ?>
                    <?php if(!empty($theSubTitle)) : ?>
                        <h3 class="sub-header">
                          <?php if($jobID == "DF3F17BC4C") { ?>
                              Join us!
                          <?php } else { ?>
                              <?php echo $theSubTitle;?>
                          <?php } ?>

                        </h3>
                    <?php  endif; ?>
                </div>
            </div>
        </div>
    </div>
</section>
<?php endif; ?>
