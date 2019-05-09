<?php
    /*
     * Template Name: Job Details Page
     * */
    get_header();
    $jobID = $_REQUEST['jid'];
    $jobDetails = json_decode(VoyWorkableAPI::getJobDetails($jobID), false);
?>

    <?php get_template_part( 'parts/s-featured-image' ); ?>
    <?php get_template_part( 'parts/s-breadcrumbs' );?>

    <article class="s- content">

        <?php get_template_part('parts/s-no-featured-image'); ?>

        <div class="p-job">
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
            <br />
            <br />
            <?php get_template_part( 'parts/jobs/job-apply' ); ?>
            <br />

        </div>
    </article>

<?php
    get_footer();
?>
