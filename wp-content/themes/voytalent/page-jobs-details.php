<?php
    /*
     * Template Name: Job Details Page
     * */
    get_header();
    $jobID = $_REQUEST['jid'];
    $jobDetails = json_decode(VoyWorkableAPI::getJobDetails($jobID), false);
?>
    <article class="content">

        <?php get_template_part( 'parts/s-featured-image' ); ?>
        <?php get_template_part( 'parts/s-breadcrumbs' );?>
        <?php get_template_part('parts/s-no-featured-image'); ?>

        <div class="s- p-job">
            <div class="gc job-content">
                <div class="g-7 g-push-4 g-m-12 g-m-push-0 g-t-10 g-t-push-1">
                    <h1><?php echo (isset($jobDetails->function)?$jobDetails->function.', ':''); echo $jobDetails->title; ?></span>!</h1>

                    <?php get_template_part( 'parts/jobs/job-details' ); ?>

                    <?php
                        //job description
                        echo $jobDetails->full_description;
                    ?>
                </div>
            </div>
            <?php get_template_part( 'parts/jobs/job-apply' ); ?>
        </div>
    </article>

<?php
    get_footer();
?>
