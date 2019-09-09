<?php
    /*
     * Template Name: Jobs
     * */
    get_header();
    $pageLimit = 10;

    if (false === ($getAllJobs = get_transient('getAllJobsLatest'))) {

        $getJobs = json_decode(VoyWorkableAPI::getJobs($pageLimit), false);
        $getAllJobs = [];

        if (count($getJobs->jobs) > 0):
            $i = 0;
            foreach ($getJobs->jobs as $getJob) {
                $jDetail = json_decode(VoyWorkableAPI::getJobDetails($getJob->shortcode), false);
                $getAllJobs[$i]['shortcode'] = $getJob->shortcode;
                $getAllJobs[$i]['function'] = $jDetail->function;
                $getAllJobs[$i]['title'] = $jDetail->title;
                $getAllJobs[$i]['region'] = $jDetail->location->region;
                $i++;
            }
        endif;

        set_transient('getAllJobsLatest', $getAllJobs, 30 * MINUTE_IN_SECONDS);
    }

    $totalNoOfPages = ceil(count($getAllJobs) / $pageLimit);
?>

<?php get_template_part('parts/s-featured-image'); ?>
<?php get_template_part('parts/s-breadcrumbs'); ?>

<article class="s- content p-jobs">

    <?php get_template_part('parts/s-no-featured-image'); ?>

    <div class="gc">
        <div class="g-12">
            <div class="m-list">
                <h3 class="special-header -border-bottom">See all our open positions</h3>
                <ul>
                    <?php

                        $count = isset($_REQUEST['link'])?$_REQUEST['link']:0;

                        if (count($getAllJobs) > 0):
                            foreach ($getAllJobs as $key => $job):
                                if($getAllJobs[$count]['shortcode'] == "DF3F17BC4C"){
                                    $count++;
                                    continue;
                                }
                    ?>
                            <?php
                                if(!empty($getAllJobs[$count]['title'])):
                            ?>
                                <li>
                                    <a href="<?php echo get_the_permalink(url_to_postid(site_url('jobs/job-details'))) . "?jid=" . $getAllJobs[$count]['shortcode']; ?>">

                                        <div class="text">
                                            <?php if (!empty($getAllJobs[$count]['function'])) : ?>
                                                <strong><?php echo $getAllJobs[$count]['function']; ?></strong>
                                            <?php endif; ?>
                                            <?php if (!empty($getAllJobs[$count]['title'])) : ?>
                                                <?php echo $getAllJobs[$count]['title']; ?>
                                            <?php endif; ?>
                                        </div>

                                        <?php if (!empty($getAllJobs[$count]['region'])) : ?>
                                            <div class="box"><?php echo $getAllJobs[$count]['region']; ?></div>
                                        <?php endif; ?>

                                        <span class="btn -yellow -icon-only">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path
                                            d="M13.025 1l-2.847 2.828 6.176 6.176h-16.354v3.992h16.354l-6.176 6.176 2.847 2.828 10.975-11z"></path></svg>
                                        </span>
                                    </a>
                                </li>
                            <?php endif;?>
                    <?php
                            if((($count + 1) % $pageLimit) == 0){
                                break;
                            }

                            $count++;
                            endforeach;
                        endif;
                    ?>
                </ul>
            </div>

            <div class="m-paginate">
                <?php
                    $currentPageNo = isset($_REQUEST['pl'])?$_REQUEST['pl']:1;
                    for ($p = 1; $p<=$totalNoOfPages; $p++){

                        if (($p==($currentPageNo))) {
                            $purl = '#';
                            $currentPage = 'current';
                        }else{
                            $currentPage = '';
                            $purl = get_the_permalink(url_to_postid(site_url('jobs'))).'?link='.(($p*$pageLimit) - $pageLimit).'&pl='.$p;
                        }
                ?>
                        <a class="page-numbers <?php echo $currentPage; ?>"
                           href="<?php echo $purl; ?>"><?php echo $p; ?></a>
                <?php
                    }
                ?>
            </div>
        </div>
    </div>

    <article class="content">
        <div class="gc">
            <div class="g-8 g-push-2 g-m-12 g-m-push-0 g-t-10 g-t-push-1">
                <?php
                if (have_posts()) :
                    while (have_posts()) :
                        the_post();
                        the_content();
                    endwhile;
                endif;
                ?>
            </div>
        </div>
    </article>

</article>

<?php
get_footer();
?>
