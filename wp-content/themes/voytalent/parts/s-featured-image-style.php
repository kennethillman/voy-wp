<?php
    global $featuredImage;
?>
<style type="text/css">

    /* Default mobile first image
    sizeA = 480px */
    .s-featured-image .image { background-image: url('<?php echo $featuredImage['featured_image_480'];?>'); }

    /* Higher resolution
    sizeB = 1024px */
    @media only screen and (-webkit-min-device-pixel-ratio: 2),
    only screen and (min--moz-device-pixel-ratio: 2),
    only screen and (-o-min-device-pixel-ratio: 2/1),
    only screen and (min-device-pixel-ratio: 2),
    only screen and (min-resolution: 192dpi),
    only screen and (min-resolution: 2dppx)
    { .s-featured-image .image { background-image: url('<?php echo $featuredImage['large'];?>'); } }

    /* Default 768
    sizeB = 1024px */
    @media only screen and (min-width:768px) { .s-featured-image .image { background-image: url('<?php echo $featuredImage['large'];?>'); } }
    /* Higher resolution 768
    sizeD = 2048px */
    @media only screen and (-webkit-min-device-pixel-ratio: 2) and (min-width:768px),
    only screen and (min--moz-device-pixel-ratio: 2) and (min-width:768px),
    only screen and (-o-min-device-pixel-ratio: 2/1) and (min-width:768px),
    only screen and (min-device-pixel-ratio: 2) and (min-width:768px),
    only screen and (min-resolution: 192dpi) and (min-width:768px),
    only screen and (min-resolution: 2dppx) and (min-width:768px)
    { .s-featured-image .image { background-image: url('<?php echo $featuredImage['featured_image_2048'];?>'); } }

    /* Default 1024
    sizeC = 1440px */
    @media only screen and (min-width:1024px) { .s-featured-image .image { background-image: url('<?php echo $featuredImage['featured_image_1440'];?>'); } }
    /* Higher resolution 1024
    sizeD = 2048px */
    @media only screen and (-webkit-min-device-pixel-ratio: 2) and (min-width:1024px),
    only screen and (min--moz-device-pixel-ratio: 2) and (min-width:1024px),
    only screen and (-o-min-device-pixel-ratio: 2/1) and (min-width:1024px),
    only screen and (min-device-pixel-ratio: 2) and (min-width:1024px),
    only screen and (min-resolution: 192dpi) and (min-width:1024px),
    only screen and (min-resolution: 2dppx) and (min-width:1024px)
    { .s-featured-image .image { background-image: url('<?php echo $featuredImage['featured_image_2048'];?>'); } }

    /* Default 1440
    sizeC = 1440px */
    @media only screen and (min-width:1440px) { .s-featured-image .image { background-image: url('<?php echo $featuredImage['featured_image_1440'];?>'); } }
    /* Higher resolution 1440
    sizeD = 2048px */
    @media only screen and (-webkit-min-device-pixel-ratio: 2) and (min-width:1440px),
    only screen and (min--moz-device-pixel-ratio: 2) and (min-width:1440px),
    only screen and (-o-min-device-pixel-ratio: 2/1) and (min-width:1440px),
    only screen and (min-device-pixel-ratio: 2) and (min-width:1440px),
    only screen and (min-resolution: 192dpi) and (min-width:1440px),
    only screen and (min-resolution: 2dppx) and (min-width:1440px)
    { .s-featured-image .image { background-image: url('<?php echo $featuredImage['featured_image_2048'];?>'); } }

</style>