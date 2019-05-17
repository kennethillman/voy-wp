<?php

/**
 * Testimonial Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

    $id = 'testimonial-' . $block['id'];
    if( !empty($block['anchor']) ) {
        $id = $block['anchor'];
    }

    // Load values and assing defaults.
    $testimonialname = get_field('testimonialname') ?: 'Name';
    $testimonialemail = get_field('testimonialemail') ?: 'email';
    $testimonialdesignation = get_field('testimonialdesignation') ?: 'Designation';
    $description = get_field('description') ?: 'Designation';
    $image = get_field('image') ?: 295;
?>
<article class="s-content p-stories">
    <section>
        <div id="<?php echo esc_attr($id); ?>" class="m-stories-teaser-big <?php echo esc_attr($className); ?>">
            <div class="gc">
                <div class="g-8">
                    <div class="header">
                        <h3 class="-block"><?php echo $testimonialname; ?></h3>
                        <?php echo $testimonialdesignation. ", ".$testimonialemail; ?>
                    </div>
                    <p><?php echo $description; ?></p>
                </div>
                <div class="g-4">
                    <figure class="-round">
                        <img src="<?php echo $image['sizes']['medium']; ?>">
                    </figure>
                </div>
            </div>
        </div>
    </section>
</article>
