<?php
$id = $block['id'];
if (!empty($block['anchor'])) {
    $id = $block['anchor'];
}

$className = '';
if (!empty($block['className'])) {
    $className .= ' ' . $block['className'];
}
if (!empty($block['align'])) {
    $className .= ' align' . $block['align'];
}

$header = get_field('header') ?: '';
$class_margins_options_ = get_field('class_margins_options_') ?: '';
$teaser = get_field('teaser') ?: '';
?>

<div class="b-repeater-teasers -wp-block <?php echo esc_attr($className); ?> <?php echo esc_attr($class_margins_options_); ?>">
    <div class="gc">
        <?php
            if (!empty($header) && $header != ''):
        ?>
            <h3 class="special-header "><?php echo $header; ?></h3>
        <?php endif; ?>

        <?php
            if (!empty($teaser)):
                foreach ($teaser as $rt):
        ?>
                <div class="g-4 g-t-6 g-4 g-m-12">
                    <a href="<?php echo ($rt['link']['url'] != '') ? $rt['link']['url'] : '#'; ?>"
                       class="b-repeater-teaser -wp-content">
                        <?php
                            if (!empty($rt['image'])):
                        ?>
                            <figure>
                                <img src="<?php echo $rt['image']['sizes']['large']; ?>"/>
                            </figure>
                        <?php endif; ?>
                        <div class="text">
                            <h4><?php echo $rt['header']; ?></h4>
                            <p><?php echo $rt['text']; ?></p>
                        </div>
                    </a>
                </div>
        <?php
                endforeach;
            endif;
        ?>
    </div>
</div>
