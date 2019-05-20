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
    $class_header_options = get_field('class_header_options') ?: '';
    $class_header_size = get_field('class_header_size') ?: '';
    $class_seo_header = get_field('class_seo_header') ?: '';
    $margins = get_field('margins') ?: '';

?>


<div class="b-header -wp-content <?php echo esc_attr($className); ?> <?php echo esc_attr($margins); ?> <?php echo esc_attr($class_header_options); ?> <?php echo esc_attr($class_header_size); ?>">
    <<?php echo esc_attr($class_seo_header); ?> class="header"><?php echo $header; ?></<?php echo esc_attr($class_seo_header); ?>>
</div>
