<?php

/**
 * Testimonial Block Template.
 */

    $id = 'testimonial-' . $block['id'];
    if( !empty($block['anchor']) ) {
        $id = $block['anchor'];
    }

    $className = 'testimonial';
    if( !empty($block['className']) ) {
        $className .= ' ' . $block['className'];
    }
    if( !empty($block['align']) ) {
        $className .= ' align' . $block['align'];
    }

    // Load values and assing defaults.
    $testimonialname = get_field('testimonialname') ?: 'Name';
    $testimonialemail = get_field('testimonialemail') ?: 'email';
    $testimonialdesignation = get_field('testimonialdesignation') ?: 'Designation';
    $description = get_field('description') ?: 'Designation';
    $image = get_field('image') ?: 295;
    $image_align = get_field('image_align') ?: '';
    $link = get_field('link') ?: '';
?>
<article class="s-content p-stories <?php echo esc_attr($className); ?>" id="<?php echo esc_attr($id); ?>">
    <section>
        <div id="<?php echo esc_attr($id); ?>" class="m-stories-teaser-big <?php echo esc_attr($className); ?>">
            <div class="gc">
                <div class="g-8">
                    <div class="header">
                        <h3 class="-block"><?php echo $testimonialname; ?></h3>
                        <?php echo $testimonialdesignation. ", ".$testimonialemail; ?>
                    </div>
                    <p><?php echo $description; ?></p>
                    <?php
                        if(!empty($link)){
                    ?>
                        <a href="<?php echo $link['url']; ?>" target="<?php echo $link['target']; ?>"><?php echo $link['title']; ?></a>
                    <?php
                        }
                    ?>
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
