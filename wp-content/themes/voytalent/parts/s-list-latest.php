<?php
/**
 * Template for displaying s-list-latest in Voy talent
 *
 * @package WordPress
 * @subpackage Voytalent
 * @since 1.0
 * @version 1.0
 */
$latestOpportunities = json_decode(VoyWorkableAPI::getJobs(3), false);
?>
<?php
    if(count($latestOpportunities->jobs)>0):
?>
    <section class="s-">
        <div class="gc">
            <div class="g-12">
                <div class="m-list">
                    <h3 class="special-header -border-bottom">Latest opportunities</h3>
                        <ul>
                            <?php
                                foreach ($latestOpportunities->jobs as $latestOpportunity):
                                    $jDetail = json_decode(VoyWorkableAPI::getJobDetails($latestOpportunity->shortcode), false);
                            ?>

                            <li>
                                <a href="<?php echo get_the_permalink(url_to_postid( site_url('jobs/job-details') ))."?jid=".$latestOpportunity->shortcode;?>">

                                    <div class="text">
                                     <?php if(isset($jDetail->function)) : ?>
                                        <strong><?php echo (isset($jDetail->function)?$jDetail->function.'':''); ?></strong>
                                      <?php  endif; ?>
                                      <?php if(!empty($jDetail->title)) : ?>
                                        <?php echo $jDetail->title; ?>
                                      <?php  endif; ?>
                                    </div>

                                    <?php if(!empty($jDetail->location->region)) : ?>
                                        <div class="box"><?php  echo $jDetail->location->region; ?></div>
                                    <?php  endif; ?>

                                    <span class="btn -yellow -icon-only">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M13.025 1l-2.847 2.828 6.176 6.176h-16.354v3.992h16.354l-6.176 6.176 2.847 2.828 10.975-11z"></path></svg>
                                    </span>
                                </a>
                            </li>

                            <?php
                                endforeach;
                            ?>

                        </ul>
                    <a class="btn -black -icon -square -block -text-left" href="<?php echo get_the_permalink(url_to_postid( site_url('jobs') ));?>">See all<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M13.025 1l-2.847 2.828 6.176 6.176h-16.354v3.992h16.354l-6.176 6.176 2.847 2.828 10.975-11z"></path></svg></a>
                </div>
            </div>
        </div>
    </section>
<?php endif; ?>
