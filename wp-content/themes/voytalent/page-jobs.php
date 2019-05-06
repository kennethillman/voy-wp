<?php
/*
 * Template Name: Jobs
 * */
get_header();
$pageLimit = 5;
$jobOpportunities = json_decode(VoyWorkableAPI::getJobs($pageLimit, $_REQUEST['since_id']), false);
if (count($jobOpportunities) > 0):
    $jobOpportunitiesTotal = json_decode(VoyWorkableAPI::getJobs(0), false);
    $totalNoOfPages = ceil(count($jobOpportunitiesTotal->jobs) / $pageLimit);
    $nextJobID = VoyWorkableAPI::getNextJobs($pageLimit);
    //print_r($nextJobID);
endif;
?>
<article class="content">
    <?php get_template_part('parts/s-featured-image'); ?>
    <?php get_template_part('parts/s-breadcrumbs'); ?>

    <div class="s- p-jobs">
        <div class="gc">
            <div class="g-12">
                <div class="m-list">
                    <h3 class="m-list-header">See all our open positions</h3>
                    <ul>
                        <?php
                            if (count($jobOpportunities) > 0):
                                foreach ($jobOpportunities->jobs as $job):
                                    $jDetail = json_decode(VoyWorkableAPI::getJobDetails($job->shortcode), false);
                        ?>
                                <li>
                                    <a href="<?php echo get_the_permalink(url_to_postid(site_url('jobs/job-details'))) . "?jid=" . $job->shortcode; ?>">
                                        <div class="text">
                                            <!--<strong>Creative director /</strong> Swisscom-->
                                            <strong><?php echo(isset($jDetail->function) ? $jDetail->function . ', ' : '');
                                                echo $jDetail->title; ?></strong>
                                            <!--<div class="type">Full time / 23 employees</div>-->
                                            <!-- <div class="type"><?php echo $jobDetails->employment_type; ?></div> -->
                                        </div>
                                        <span class="btn -orange -icon-only">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                             viewBox="0 0 24 24"><path
                                                    d="M13.025 1l-2.847 2.828 6.176 6.176h-16.354v3.992h16.354l-6.176 6.176 2.847 2.828 10.975-11z"/></svg>
                                    </span>
                                    </a>
                                </li>
                        <?php
                                endforeach;
                            endif;
                        ?>
                    </ul>
                </div>

                <div class="m-paginate">
                    <?php
                    $currentPageNo = isset($_REQUEST['link'])?$_REQUEST['link']:1;

                    if ($currentPageNo==2){
                    $_SESSION['previousJob'] = get_the_permalink(url_to_postid(site_url('jobs'))).'?link='.($currentPageNo-1);
                    }else{
                    $_SESSION['previousJob'] = get_the_permalink(url_to_postid(site_url('jobs'))).'?link='.($currentPageNo-1).'&since_id='.$nextJobID[$currentPageNo-2];
                    }

                    if (isset($_REQUEST['link']) && $_REQUEST['link']>1){
                    echo '<a class="prev page-numbers" href="'.$_SESSION['previousJob'].'"> << Prev</a>';
                    }

                    for ($p = 1;
                    $p<=$totalNoOfPages;
                    $p++){
                    $_SESSION['nextJob'] = get_the_permalink(url_to_postid(site_url('jobs'))).'?link='.($currentPageNo+1).'&since_id='.$nextJobID[$currentPageNo];

                    $currentPage = ($p==$currentPageNo)?'current':'';

                    if (($p==$currentPageNo)){
                    $purl = '#';
                    }elseif ($p==1){
                    $purl = get_the_permalink(url_to_postid(site_url('jobs'))).'?link='.$p;
                    }else{
                    $purl = get_the_permalink(url_to_postid(site_url('jobs'))).'?link='.$p.'&since_id='.$nextJobID[$p-1];
                    }

                    ?>
                    <a class="page-numbers <?php echo $currentPage; ?>"
                       href="<?php echo $purl; ?>"><?php echo $p; ?></a>
                    <?php } ?>
                            <?php

                    if ($currentPageNo!=$totalNoOfPages){
                    echo '<a class="prev page-numbers" href="'.$_SESSION['nextJob'].'"> Next >> </a>';
                    }
                    ?>

                </div>
            </div>
        </div>
    </div>
</article>

<?php
get_footer();
?>
