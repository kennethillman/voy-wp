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
    $teams = get_field('teams') ?: '';
    $class_margins_options = get_field('class_margins_options') ?: '';
?>

<div class="b-repeater-team <?php echo esc_attr($className); ?> <?php echo esc_attr($class_margins_options_); ?>">
    <h2 class="header-section"><?php echo $header;?></h2>
    <p><?php echo $text;?></p>

    <?php
        foreach ($teams as $team):
    ?>
        <div class="g-6 g-m-12">
            <div class="b-teammate">
                <div class="body -pattern-striped-light">
                    <div class="header">
                        <h4 class="header-name"><?php echo $team['name'];?></h4>
                        <h5 class="header-title"><?php echo $team['title'];?></h5>
                    </div>
                    <figure class="image">
                        <img src="<?php echo $team['image']['sizes']['medium'];?>" />
                    </figure>
                </div>
                <div class="links">
                    <a href="mailto:<?php echo $team['email'];?>"><?php echo $team['email'];?></a>

                    <a href="<?php echo $team['link']['url'];?>" target="<?php echo $team['link']['target'];?>"><?php echo $team['link']['title'];?></a>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>
