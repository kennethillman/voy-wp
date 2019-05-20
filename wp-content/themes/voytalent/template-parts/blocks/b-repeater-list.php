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
    $list_repeater = get_field('list_repeater') ?: '';
    $bottom_link = get_field('bottom_link') ?: '';
    $class_margins_options_ = get_field('class_margins_options_') ?: '';
?>

<div class="b-repeater-list <?php echo esc_attr($className); ?> <?php echo esc_attr($class_margins_options_); ?>">
  <div class="gc">
    <div class="g-12">
      <h3 class="special-header -border-bottom"><?php echo $header; ?></h3>
      <ul>
          <?php
              foreach ($list_repeater as $repeater):
          ?>
              <li>
                  <a href="<?php echo $repeater['link']['url']; ?>">
                      <div class="text">
                          <strong><?php echo $repeater['header']; ?></strong>
                          <?php echo $repeater['text']; ?>
                      </div>
                      <span class="btn -yellow -icon-only">
                          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M13.025 1l-2.847 2.828 6.176 6.176h-16.354v3.992h16.354l-6.176 6.176 2.847 2.828 10.975-11z"></path></svg>
                      </span>
                  </a>
              </li>
          <?php
              endforeach;
          ?>
      </ul>
      <a class="btn -black -icon -square -block -text-left" href="<?php echo $bottom_link['url']; ?>"><?php echo $bottom_link['title']; ?><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M13.025 1l-2.847 2.828 6.176 6.176h-16.354v3.992h16.354l-6.176 6.176 2.847 2.828 10.975-11z"></path></svg></a>
      </div>
  </div>
</div>
