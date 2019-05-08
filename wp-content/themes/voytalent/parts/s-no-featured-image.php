<?php
    global $theTitle,$theSubTitle ;
    if(get_the_post_thumbnail_url(get_the_ID()) == ''):
?>

    <div class="headers">
        <?php if(!empty($theTitle)) : ?>
            <h2 class="header">
                <?php echo $theTitle;?>
            </h2>
        <?php  endif; ?>
        <?php if(!empty($theSubTitle)) : ?>
            <h3 class="sub-header">
                <?php echo $theSubTitle;?>
            </h3>
        <?php  endif; ?>
    </div>

<?php  endif; ?>