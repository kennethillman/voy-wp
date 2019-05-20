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

?>

<div class="b-testamonials  <?php echo esc_attr($className); ?>  <?php echo esc_attr($class_image_align_options_); ?>">
    <div class="gc">
        <div class="g-4">
            <figure class="-round">
                <img src="<?php echo $image['sizes']['medium']; ?>" />
            </figure>
        </div>
        <div class="g-8">
            <div class="header"><h3 class="-block"><?php echo $testimonialname; ?> </h3> <?php echo $testimonialdesignation; ?></div>
            <p><?php echo $description; ?></p>
            <a href="<?php echo $link['url']; ?>" class="btn -yellow -icon-only">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M13.025 1l-2.847 2.828 6.176 6.176h-16.354v3.992h16.354l-6.176 6.176 2.847 2.828 10.975-11z"/></svg>
            </a>
        </div>
    </div>
</div>
