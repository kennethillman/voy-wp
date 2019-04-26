<?php
/**
 * Template for displaying job details in Voy talent
 *
 * @package WordPress
 * @subpackage Voytalent
 * @since 1.0
 * @version 1.0
 */
global $jobDetails;
?>

<div class="job-details -pattern-stripe-light">

    <div class="company">Swisscom</div>
    <div class="detail">
        <span class="header">Job:</span>
        <span class="text"><?php echo (isset($jobDetails->function)?$jobDetails->function.', ':''); echo $jobDetails->title; ?></span>
    </div>
    <div class="detail">
        <span class="header">Employment:</span>
        <span class="text"><?php echo $jobDetails->employment_type; ?></span>
    </div>
    <div class="detail">
        <span class="header">Location:</span>
        <span class="text"><?php echo (isset($jobDetails->location->region)?$jobDetails->location->region.', ':''); echo $jobDetails->location->country; ?></span>
</div>

</div>