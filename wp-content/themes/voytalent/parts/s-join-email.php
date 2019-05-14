<?php
/**
 * Template for displaying s-join-email in Voy talent
 *
 * @package WordPress
 * @subpackage Voytalent
 * @since 1.0
 * @version 1.0
 */

?>

<?php
  $getJoinLink = get_site_url() . '/jobs/job-details/?jid=DF3F17BC4C';
?>

<section class="s-join-email">
  <div class="gc -g-shift-vp600">
    <div class="g-9 g-m-12">
      Sign up and recive the latest announcements, tips, networking invitations and more.
    </div>
    <div class="g-3 g-m-12">
      <a href="<?php echo $getJoinLink ?>" class="btn -black -block">Join Voy</a>
    </div>
  </div>
</section>
