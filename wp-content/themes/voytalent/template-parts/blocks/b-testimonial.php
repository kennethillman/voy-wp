<?php
    $id = $block['id'];
    if( !empty($block['anchor']) ) {
        $id = $block['anchor'];
    }

    $className = '';
    if( !empty($block['className']) ) {
        $className .= ' ' . $block['className'];
    }
    if( !empty($block['align']) ) {
        $className .= ' align' . $block['align'];
    }

    $testimonialname = get_field('testimonialname') ?: '';
    $description = get_field('description') ?: '';
    $testimonialdesignation = get_field('testimonialdesignation') ?: '';
    $image = get_field('image') ?: '';
    $link = get_field('link') ?: '';
    $class_image_align_options_ = get_field('class_image_align_options_') ?: '';
    $class_margins_options_ = get_field('class_margins_options_') ?: '';
    $class_divider_options = get_field('class_divider_options') ?: '';

?>

<div class="b-testamonials <?php echo esc_attr($className); ?> <?php echo esc_attr($class_divider_options); ?> <?php echo esc_attr($class_margins_options_); ?> <?php echo esc_attr($class_image_align_options_); ?>">
    <div class="gc">
        <div class="g-4">
            <?php if(!empty($image)): ?>
                <figure class="-round">
                    <img src="<?php echo $image['sizes']['large']; ?>" />
                </figure>
            <?php endif; ?>
        </div>
        <div class="g-8">
            <div class="header">
                <?php if(!empty($testimonialname)): ?>
                    <h3 class="-block"><?php echo $testimonialname; ?> </h3>
                <?php endif; ?>
                <?php echo $testimonialdesignation; ?>
            </div>

            <?php if(!empty($description)): ?>
                <p><?php echo $description; ?></p>
            <?php endif; ?>

            <?php if(!empty($link)): ?>
                <a href="<?php echo $link['url']; ?>" class="btn -yellow -icon-only">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M13.025 1l-2.847 2.828 6.176 6.176h-16.354v3.992h16.354l-6.176 6.176 2.847 2.828 10.975-11z"/></svg>
                </a>
            <?php endif; ?>
        </div>
    </div>
</div>
