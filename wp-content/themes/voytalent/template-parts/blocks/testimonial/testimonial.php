<?php

/**
 * Testimonial Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'testimonial-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'testimonial';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}

// Load values and assing defaults.
$text = get_field('testimonial') ?: 'Your testimonial here...';
$author = get_field('author') ?: 'Author name';
$role = get_field('role') ?: 'Author role';
$image = get_field('image') ?: 295;
$background_color = get_field('background_color');
$text_color = get_field('text_color');
$link = get_field('link');

?>
<article class="s-content p-stories">
    <section>
        <div id="<?php echo esc_attr($id); ?>" class="m-stories-teaser-big <?php echo esc_attr($className); ?>">
            <div class="gc">
                <div class="g-8">
                    <div class="header">
                        <h3 class="-block"><?php echo $author; ?></h3>
                        <?php echo $role; ?>
                    </div>
                    <p><?php echo $text; ?></p>
                </div>
                <div class="g-4">
                    <figure class="-round">
                        <img src="<?php echo $image; ?>">
                    </figure>
                </div>
            </div>
        </div>

        <style type="text/css">
            #<?php echo $id; ?> {
                background: <?php echo $background_color; ?>;
                color: <?php echo $text_color; ?>;
            }
        </style>
    </section>
</article>
