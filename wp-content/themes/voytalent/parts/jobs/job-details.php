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
global $jobID;
?>

<div class="job-details -pattern-stripe-light">
    <div class="detail">

        <?php if($jobID != "DF3F17BC4C") { ?>
            <span class="header">Job: </span>
        <?php } else { ?>
            <span class="header">Join: </span>
        <?php } ?>

        <span class="text"><?php echo (isset($jobDetails->function)?$jobDetails->function.', ':''); echo $jobDetails->title; ?></span>
    </div>

    <?php if($jobDetails->employment_type != "") : ?> <!-- OR : Hide if empty -->
      <div class="detail">
        <span class="header">Employment:</span>
        <span class="text"><?php echo $jobDetails->employment_type ?></span>
      </div>
    <?php endif; ?>

    <?php if($jobDetails->location->country != "") : ?> <!-- OR : Hide if empty -->
      <div class="detail"> <!-- Hide if empty -->
          <span class="header">Location:</span>
          <span class="text"><?php echo (isset($jobDetails->location->region)?$jobDetails->location->region.', ':''); echo $jobDetails->location->country; ?></span>
      </div>
    <?php endif; ?>

</div>
