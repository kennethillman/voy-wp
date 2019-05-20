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
    $class_margins_options_ = get_field('class_margins_options_') ?: '';
    $teaser = get_field('teaser') ?: '';
?>

<div class="b-repeater-teasers <?php echo esc_attr($className); ?> <?php echo esc_attr($class_margins_options_); ?>">
    <?php
        if(!empty($header) && $header!=''):
    ?>
        <h3 class="special-header -border-bottom"><?php echo $header; ?></h3>
    <?php endif; ?>

    <?php
        foreach ($teaser as $rt):
    ?>
        <div class="g-4 g-t-6 g-4 g-m-12">
            <a href="<?php echo $rt['link']['url']; ?>" class="b-repeater-teaser">
                <figure>
                    <img src="<?php echo $rt['image']['sizes']['medium']; ?>" />
                </figure>
                <div class="text">
                    <h4><?php echo $rt['header']; ?></h4>
                    <p><?php echo $rt['text']; ?></p>
                </div>
            </a>
        </div>

    <?php
        endforeach;
    ?>
</div>