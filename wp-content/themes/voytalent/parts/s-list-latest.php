<?php
/**
 * Template for displaying s-list-latest in Voy talent
 *
 * @package WordPress
 * @subpackage Voytalent
 * @since 1.0
 * @version 1.0
 */

    if ( false === ( $joblatestOpportunities = get_transient( 'jlatestOpportunities' ) ) ) {

        $latestOpportunities = json_decode(VoyWorkableAPI::getJobs(3), false);
        $joblatestOpportunities = [];

        if(count($latestOpportunities->jobs)>0):
            $i=0;
            foreach ($latestOpportunities->jobs as $latestOpportunity){
                $jDetail = json_decode(VoyWorkableAPI::getJobDetails($latestOpportunity->shortcode), false);
                $joblatestOpportunities[$i]['shortcode'] = $latestOpportunity->shortcode;
                $joblatestOpportunities[$i]['function'] = $jDetail->function;
                $joblatestOpportunities[$i]['title'] = $jDetail->title;
                $joblatestOpportunities[$i]['region'] = $jDetail->location->region;
                $i++;
            }
        endif;

        set_transient( 'jlatestOpportunities', $joblatestOpportunities, 30 * MINUTE_IN_SECONDS );
    }


?>
<?php
    if(count($joblatestOpportunities)>0):
?>
    <section class="s-">
        <div class="gc">
            <div class="g-12">
                <div class="m-list">
                    <h3 class="special-header -border-bottom">Latest opportunities</h3>
                        <ul>
                            <?php
                                foreach ($joblatestOpportunities as $joblatestOpportunity):
                                    if($joblatestOpportunity['shortcode'] == "DF3F17BC4C"){
                                        continue;
                                    }
                            ?>
                                <?php if(!empty($joblatestOpportunity['title'])): ?>
                                    <li>
                                        <a href="<?php echo get_the_permalink(url_to_postid( site_url('jobs/job-details') ))."?jid=".$joblatestOpportunity['shortcode'];?>">

                                            <div class="text">
                                             <?php if(!empty($joblatestOpportunity['function'])) : ?>
                                                <strong><?php echo $joblatestOpportunity['function']; ?></strong>
                                              <?php  endif; ?>
                                              <?php if(!empty($joblatestOpportunity['title'])) : ?>
                                                <?php echo $joblatestOpportunity['title']; ?>
                                              <?php  endif; ?>
                                            </div>

                                            <?php if(!empty($joblatestOpportunity['region'])) : ?>
                                                <div class="box"><?php  echo $joblatestOpportunity['region']; ?></div>
                                            <?php  endif; ?>

                                            <span class="btn -yellow -icon-only">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M13.025 1l-2.847 2.828 6.176 6.176h-16.354v3.992h16.354l-6.176 6.176 2.847 2.828 10.975-11z"></path></svg>
                                            </span>
                                        </a>
                                    </li>
                                <?php endif; ?>

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
