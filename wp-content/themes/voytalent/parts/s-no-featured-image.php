<?php
    global $theTitle,$theSubTitle ;
    if(get_the_post_thumbnail_url(get_the_ID()) == ''):
?>


  <section class="s-no-featured-image">
    <div class="gc">
      <div class="g-12" >

        <div class="headers">
            <?php if(!empty($theTitle)) : ?>
                <h2 class="header">
                    <?php echo $theTitle;?>
                </h2><br>
            <?php  endif; ?>
            <?php if(!empty($theSubTitle)) : ?>
                <h3 class="sub-header">
                    <?php echo $theSubTitle;?>
                </h3>
            <?php  endif; ?>
        </div>

      </div>
    </div>
  </section>

<?php  endif; ?>
