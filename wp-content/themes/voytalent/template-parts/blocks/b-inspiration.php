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
        <div class="g-4 g-t-6 text-col">
            <h3 class="special-header"> <?php echo $header; ?></h3>
            <?php echo $text; ?>
            <?php
                if(!empty($link)){
            ?>
                <a target="<?php echo $link['target']; ?>" href="<?php echo $link['url']; ?>" class="btn -yellow -block"><?php echo $link['title']; ?></a>
            <?php
                }
            ?>
        </div>
        <div class="g-8 g-t-6 video-col">
            <img src="<?php echo $media['sizes']['medium']; ?>">
        </div>
    </div>
</section>