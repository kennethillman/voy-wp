<?php
/*
 * Template Name: Jobs
 * */
get_header();
$pageLimit = 4;
$jobOpportunities = json_decode(VoyWorkableAPI::getJobs($pageLimit,$_REQUEST['since_id']), false);
$jobOpportunitiesTotal = json_decode(VoyWorkableAPI::getJobs(0), false);
$totalNoOfPages = floor(count($jobOpportunitiesTotal->jobs)/$pageLimit);
$nextJobID = VoyWorkableAPI::getNextJobs($pageLimit);
?>
    <article class="content">
        <?php get_template_part( 'parts/s-featured-image' ); ?>

        <div class="p-jobs">
            <div class="gc">
                <div class="g-12">
                    <div class="m-list">
                        <ul>
                            <?php
                                foreach ($jobOpportunities->jobs as $job):
                                $jDetail = json_decode(VoyWorkableAPI::getJobDetails($job->shortcode), false);
                            ?>
                                <li>
                                    <a href="<?php echo get_the_permalink(url_to_postid( site_url('jobs/job-details') ))."?jid=".$job->shortcode;?>">
                                    <div class="text">
                                            <!--<strong>Creative director /</strong> Swisscom-->
                                            <strong><?php echo (isset($jDetail->function)?$jDetail->function.', ':''); echo $jDetail->title; ?></strong>
                                            <!--<div class="type">Full time / 23 employees</div>-->
                                            <div class="type"><?php echo $jobDetails->employment_type; ?></div>
                                        </div>
                                        <span class="btn -orange -icon-only">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path
                                                    d="M13.025 1l-2.847 2.828 6.176 6.176h-16.354v3.992h16.354l-6.176 6.176 2.847 2.828 10.975-11z"/></svg>
                                    </span>
                                    </a>
                                </li>
                            <?php
                                endforeach;
                            ?>
                        </ul>
                    </div>

                    <div class="m-paginate">
                        <?php
                            $currentPageNo = isset($_REQUEST['link'])?$_REQUEST['link']:1;

                            if($currentPageNo==2){
                                $_SESSION['previousJob'] = get_the_permalink(url_to_postid( site_url('jobs') )).'?link='.($currentPageNo-1);
                            }else{
                                $_SESSION['previousJob'] = get_the_permalink(url_to_postid( site_url('jobs') )).'?link='.($currentPageNo-1).'&since_id='.$nextJobID[$currentPageNo-2];
                            }

                            if(isset($_REQUEST['link']) && $_REQUEST['link']>1){
                                echo  '<a class="prev page-numbers" href="'.$_SESSION['previousJob'].'"> << Prev</a>';
                            }

                            for ($p=1;$p<=$totalNoOfPages;$p++){
                                $_SESSION['nextJob'] = get_the_permalink(url_to_postid( site_url('jobs') )).'?link='.($currentPageNo+1).'&since_id='.$nextJobID[$currentPageNo];

                                $currentPage = ($p==$currentPageNo)?'current':'';

                                if(($p==$currentPageNo)){
                                    $purl = '#';
                                }elseif($p==1){
                                    $purl = get_the_permalink(url_to_postid( site_url('jobs') )).'?link='.$p;
                                }else{
                                    $purl = get_the_permalink(url_to_postid( site_url('jobs') )).'?link='.$p.'&since_id='.$nextJobID[$p-1];
                                }

                            ?>
                                <a class="page-numbers <?php echo $currentPage;?>" href="<?php echo $purl;?>"><?php echo $p; ?></a>
                            <?php } ?>
                            <?php

                                if($currentPageNo!=$totalNoOfPages ){
                                    echo  '<a class="prev page-numbers" href="'.$_SESSION['nextJob'].'"> Next >> </a>';
                                }
                            ?>

                    </div>
                </div>
            </div>
        </div>
    </article>

    <figure class="svg-sprite -hide">
        <?php echo '<? xml version="1.0" encoding="utf-8" ?>'; ?>
        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
            <symbol viewBox="0 0 24 24" id="voy-arrow" xmlns="http://www.w3.org/2000/svg">
                <path d="M13.025 1l-2.847 2.828 6.176 6.176H0v3.992h16.354l-6.176 6.176L13.025 23 24 12z"/>
            </symbol>
            <symbol viewBox="0 0 24 24" id="voy-email" xmlns="http://www.w3.org/2000/svg">
                <path d="M0 3v18h24V3H0zm21.518 2L12 12.713 2.482 5h19.036zM2 19V7.183l10 8.104 10-8.104V19H2z"/>
            </symbol>
            <symbol viewBox="0 0 24 24" id="voy-facebook" xmlns="http://www.w3.org/2000/svg">
                <path d="M12 0C5.373 0 0 5.373 0 12s5.373 12 12 12 12-5.373 12-12S18.627 0 12 0zm3 8h-1.35c-.538 0-.65.221-.65.778V10h2l-.209 2H13v7h-3v-7H8v-2h2V7.692C10 5.923 10.931 5 13.029 5H15v3z"/>
            </symbol>
            <symbol viewBox="0 0 24 24" id="voy-instagram" xmlns="http://www.w3.org/2000/svg">
                <path d="M17.25 7.288v1.269a.539.539 0 0 1-.538.539h-1.269a.538.538 0 0 1-.538-.539V7.288c0-.297.239-.538.538-.538h1.269c.297 0 .538.241.538.538zM12 14.691a2.691 2.691 0 1 0 0 0zm4.261-3.291c.028.196.046.396.046.599A4.307 4.307 0 1 1 7.693 12c0-.204.018-.403.046-.599.027-.194.066-.383.118-.567H6.75v5.879c0 .297.241.538.538.538h9.424a.538.538 0 0 0 .538-.538v-5.879h-1.107c.05.184.09.373.118.566zM24 12c0 6.627-5.373 12-12 12S0 18.627 0 12 5.373 0 12 0s12 5.373 12 12zm-5-5.385C19 5.723 18.277 5 17.385 5H6.615C5.723 5 5 5.723 5 6.615v10.769C5 18.277 5.723 19 6.615 19h10.77c.892 0 1.615-.723 1.615-1.616V6.615z"/>
            </symbol>
            <symbol viewBox="0 0 24 24" id="voy-linkedin" xmlns="http://www.w3.org/2000/svg">
                <path d="M12 0C5.373 0 0 5.373 0 12s5.373 12 12 12 12-5.373 12-12S18.627 0 12 0zm-2 16H8v-6h2v6zM9 9.109c-.607 0-1.1-.496-1.1-1.109 0-.612.492-1.109 1.1-1.109s1.1.497 1.1 1.109c0 .613-.493 1.109-1.1 1.109zM17 16h-1.998v-2.861c0-1.881-2.002-1.722-2.002 0V16h-2v-6h2v1.093c.872-1.616 4-1.736 4 1.548V16z"/>
            </symbol>
            <symbol viewBox="0 0 24 24" id="voy-magnifier" xmlns="http://www.w3.org/2000/svg">
                <path d="M23.809 21.646l-6.205-6.205a9.68 9.68 0 0 0 1.857-5.711C19.461 4.365 15.096 0 9.73 0 4.365 0 0 4.365 0 9.73c0 5.366 4.365 9.73 9.73 9.73a9.678 9.678 0 0 0 5.487-1.698L21.455 24l2.354-2.354zM2.854 9.73c0-3.792 3.085-6.877 6.877-6.877s6.877 3.085 6.877 6.877-3.085 6.877-6.877 6.877A6.884 6.884 0 0 1 2.854 9.73z"/>
            </symbol>
            <symbol viewBox="0 0 24 24" id="voy-media-control" xmlns="http://www.w3.org/2000/svg">
                <path d="M4 3.532L18.113 12 4 20.468V3.532zM2 0v24l20-12L2 0z"/>
            </symbol>
            <symbol viewBox="0 0 24 24" id="voy-menu" xmlns="http://www.w3.org/2000/svg">
                <path d="M24 6H0V2h24v4zm0 4H0v4h24v-4zm0 8H0v4h24v-4z"/>
            </symbol>
            <symbol fill-rule="evenodd" clip-rule="evenodd" viewBox="0 0 24 24" id="voy-menu-thin"
                    xmlns="http://www.w3.org/2000/svg">
                <path d="M24 18v1H0v-1h24zm0-6v1H0v-1h24zm0-6v1H0V6h24z" fill="#1040e2"/>
                <path d="M24 19H0v-1h24v1zm0-6H0v-1h24v1zm0-6H0V6h24v1z"/>
            </symbol>
            <symbol viewBox="0 0 24 24" id="voy-minus" xmlns="http://www.w3.org/2000/svg">
                <path d="M12 2c5.514 0 10 4.486 10 10s-4.486 10-10 10S2 17.514 2 12 6.486 2 12 2zm0-2C5.373 0 0 5.373 0 12s5.373 12 12 12 12-5.373 12-12S18.627 0 12 0zm6 13H6v-2h12v2z"/>
            </symbol>
            <symbol fill-rule="evenodd" clip-rule="evenodd" viewBox="0 0 24 24" id="voy-play"
                    xmlns="http://www.w3.org/2000/svg">
                <path d="M23 12L1 24V0l22 12zM2 22.315L20.912 12 2 1.685v20.63z"/>
            </symbol>
            <symbol viewBox="0 0 24 24" id="voy-plus" xmlns="http://www.w3.org/2000/svg">
                <path d="M24 10H14V0h-4v10H0v4h10v10h4V14h10z"/>
            </symbol>
            <symbol viewBox="0 0 24 24" id="voy-plus-circle" xmlns="http://www.w3.org/2000/svg">
                <path d="M12 2c5.514 0 10 4.486 10 10s-4.486 10-10 10S2 17.514 2 12 6.486 2 12 2zm0-2C5.373 0 0 5.373 0 12s5.373 12 12 12 12-5.373 12-12S18.627 0 12 0zm6 13h-5v5h-2v-5H6v-2h5V6h2v5h5v2z"/>
            </symbol>
            <symbol fill-rule="evenodd" clip-rule="evenodd" viewBox="0 0 24 24" id="voy-sound"
                    xmlns="http://www.w3.org/2000/svg">
                <path d="M15 23l-9.309-6H0V7h5.691L15 1v22zM6 7.991v8.018l8 5.157V2.834L6 7.991zm14.228-4.219A10.779 10.779 0 0 1 24 12.001a10.78 10.78 0 0 1-3.77 8.229l-.708-.708C21.658 17.731 23 15.021 23 12s-1.342-5.731-3.478-7.522l.706-.706zm-2.929 2.929A6.848 6.848 0 0 1 19.775 12a6.848 6.848 0 0 1-2.476 5.299l-.706-.706a5.861 5.861 0 0 0 2.182-4.591 5.861 5.861 0 0 0-2.184-4.593l.708-.708zM5 8H1v8h4V8z"/>
            </symbol>
            <symbol viewBox="0 0 24 24" id="voy-twitter" xmlns="http://www.w3.org/2000/svg">
                <path d="M12 0C5.373 0 0 5.373 0 12s5.373 12 12 12 12-5.373 12-12S18.627 0 12 0zm6.066 9.645c.183 4.04-2.83 8.544-8.164 8.544A8.127 8.127 0 0 1 5.5 16.898a5.778 5.778 0 0 0 4.252-1.189 2.879 2.879 0 0 1-2.684-1.995 2.88 2.88 0 0 0 1.298-.049c-1.381-.278-2.335-1.522-2.304-2.853.388.215.83.344 1.301.359a2.877 2.877 0 0 1-.889-3.835 8.153 8.153 0 0 0 5.92 3.001 2.876 2.876 0 0 1 4.895-2.62 5.73 5.73 0 0 0 1.824-.697 2.884 2.884 0 0 1-1.263 1.589 5.73 5.73 0 0 0 1.649-.453 5.765 5.765 0 0 1-1.433 1.489z"/>
            </symbol>
            <symbol viewBox="0 0 361 101.18" id="voy-voy-talent" xmlns="http://www.w3.org/2000/svg">
                <path d="M103 101.04H71l-71-71 22-23 49 49v-56h32v101zM251 101.04V.04h31v34l34-34 22 22-56 56v23h-31z"/>
                <circle cx="345" cy="85.04" r="16"/>
                <path d="M177 .04c-25-1-53.3 17.5-53 51 .29 33.26 29 52 53 50 24 2 52.71-16.74 53-50 .3-33.5-28-52-53-51zm0 73s-20 0-20-23 20-23 20-23 20 0 20 23-20 23-20 23z"/>
            </symbol>
            <symbol viewBox="0 0 24 24" id="voy-x" xmlns="http://www.w3.org/2000/svg">
                <path d="M23.954 21.03l-9.184-9.095 9.092-9.174L21.03-.046l-9.09 9.179L2.764.045l-2.81 2.81L9.14 11.96.045 21.144l2.81 2.81 9.112-9.192 9.18 9.1z"/>
            </symbol>
        </svg>
    </figure>

<?php
    get_footer();
?>