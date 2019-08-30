<?php
/*
 * Template Name: Contact
 * */

    get_header();
?>

    <?php get_template_part('parts/s-featured-image'); ?>
    <?php get_template_part('parts/s-breadcrumbs'); ?>

<article class="s- content" style="background-color: white;">

    <?php get_template_part('parts/s-no-featured-image'); ?>

            <section class="p-getInTouch">

              <div class="gc">
                  <div class="g-12 ds-typography">
                      <?php
                          if ( have_posts() ) :
                              while ( have_posts() ) :
                                  the_post();
                                  the_content();
                              endwhile;
                          endif;
                      ?>
                  </div>
              </div>

              <div class="gc">
                <div class="g-12 ds-typography">
                    <h2 class="header-section">Get in touch!</h2>
                </div>
              </div>

                <form id="submitContact" name="submitContact" onsubmit="return submit_contact();">
                    <div class="gc">
                        <div class="g-12">
                            <input name="subject" class="-full-width" type="text" placeholder="Subject" required>
                        </div>
                        <div class="g-12">
                            <textarea name="comment" class="-full-width" placeholder="How can we help?" required></textarea>
                        </div>
                        <div class="g-6">
                            <input name="fname" class="-full-width" type="text" placeholder="First name" required>
                        </div>
                        <div class="g-6">
                            <input name="lname" class="-full-width" type="text" placeholder="Last name" required>
                        </div>
                        <div class="g-6">
                            <input name="c_email" class="-full-width" type="email" placeholder="Email" required pattern="^([^\x00-\x20\x22\x28\x29\x2c\x2e\x3a-\x3c\x3e\x40\x5b-\x5d\x7f-\xff]+|\x22([^\x0d\x22\x5c\x80-\xff]|\x5c[\x00-\x7f])*\x22)(\x2e([^\x00-\x20\x22\x28\x29\x2c\x2e\x3a-\x3c\x3e\x40\x5b-\x5d\x7f-\xff]+|\x22([^\x0d\x22\x5c\x80-\xff]|\x5c[\x00-\x7f])*\x22))*\x40([^\x00-\x20\x22\x28\x29\x2c\x2e\x3a-\x3c\x3e\x40\x5b-\x5d\x7f-\xff]+|\x5b([^\x0d\x5b-\x5d\x80-\xff]|\x5c[\x00-\x7f])*\x5d)(\x2e([^\x00-\x20\x22\x28\x29\x2c\x2e\x3a-\x3c\x3e\x40\x5b-\x5d\x7f-\xff]+|\x5b([^\x0d\x5b-\x5d\x80-\xff]|\x5c[\x00-\x7f])*\x5d))*$">
                        </div>
                        <div class="g-6">
                            <input name="c_phone" class="-full-width" type="phone" placeholder="012 345 67 89" required>
                        </div>
                        <div class="g-12">
                            <div class="btn-holder">
                                <button type="submit" class="btn -yellow -icon" id="send_email">Send<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M0 3v18h24v-18h-24zm21.518 2l-9.518 7.713-9.518-7.713h19.036zm-19.518 14v-11.817l10 8.104 10-8.104v11.817h-20z"/></svg></button>
                            </div>
                            <div id="contactSubmitResult"></div>
                        </div>
                    </div>
                </form>



            </section>

            <?php
                if ( is_active_sidebar( 'voy-contact-page' ) ) :
                    dynamic_sidebar( 'voy-contact-page' );
                endif;
            ?>

    </article>
<?php
    get_footer();
?>
