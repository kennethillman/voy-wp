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

    $header = get_field('header') ?: '';
    $text = get_field('text') ?: '';
    $link = get_field('link') ?: '';
    $class_divider_options_ = get_field('class_divider_options_') ?: '';
    $class_margins_options = get_field('class_margins_options') ?: '';
    $media = get_field('media') ?: '';
?>


<section class="b-inspiration <?php echo esc_attr($className); ?> <?php echo esc_attr($class_divider_options_); ?> <?php echo esc_attr($class_margins_options); ?>">
    <div class="gc">
        <div class="g-4 g-m-12 g-t-6 text-col">
            <?php if(!empty($header)): ?>
                <h3 class="special-header"> <?php echo $header; ?></h3>
            <?php endif; ?>

            <?php echo $text; ?>

            <?php if(!empty($link)): ?>
                <a target="<?php echo $link['target']; ?>" href="<?php echo $link['url']; ?>" class="btn -yellow -block -icon -text-left"><?php echo $link['title']; ?><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M13.025 1l-2.847 2.828 6.176 6.176h-16.354v3.992h16.354l-6.176 6.176 2.847 2.828 10.975-11z"></path></svg></a>
            <?php endif; ?>

        </div>
        <div class="g-8 g-m-12 g-t-6 video-col">

            <?php if(!empty($media)): ?>
                <img src="<?php echo $media['sizes']['medium']; ?>">
            <?php endif; ?>

        </div>
    </div>
</section>
