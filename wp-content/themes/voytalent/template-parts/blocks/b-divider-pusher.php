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

// Load values and assing defaults.
$link_text = get_field('link_text') ?: '';
$link = get_field('link') ?: '';
$_background_color = get_field('_background_color') ?: '';
$margins = get_field('margins') ?: '';
?>

<section class="b-divider-pusher -wp-block <?php echo esc_attr($margins); ?> <?php echo esc_attr($_background_color); ?> <?php echo esc_attr($className); ?>">
    <div class="gc -g-shift-vp600">
        <div class="g-9 g-m-12">
            <?php
                if(!empty($link_text)){
                    echo $link_text;
                }
            ?>
        </div>
        <div class="g-3 g-m-12">
            <?php
                if(!empty($link)){
            ?>
                    <a class="btn" target="<?php echo $link['target']; ?>" href="<?php echo $link['url']; ?>"><?php echo $link['title']; ?></a>
            <?php
                }
            ?>
        </div>
    </div>
</section>