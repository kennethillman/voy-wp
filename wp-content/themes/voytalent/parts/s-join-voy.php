<?php
    global $jobID;
    $jobID = ($jobID == '')? 'DF3F17BC4C':$jobID;
?>
<section class="s-welcome">
    <?php
        $areaOfExpertice = array(
            '3D design', '3D Designer', 'Account management', 'Ad operations',
            'AR/VR', 'Back-end development', 'Blockchain', 'Brand / Graphic Designer',
            'Content', 'Content Manager', 'Content Producer', 'Copywriting', 'Creative Director', 'CRM',
            'Data & analytics', 'Data / Analytics', 'Digital / Conceptual Designer', 'Digital Art Director', 'Digital Copywriter', 'Digital design',
            'Digital Product Owner', 'Digital Project Manager', 'Digital Statergy / Planning', 'eCommerce', 'Front-end development', 'Fullstack development', 'Gaming',
            'Graphic/brand design', 'Management', 'Mobile', 'Motion design', 'Motion Designer', 'Online marketing', 'Paid Search', 'Planing & stragety',
            'PR & comms', 'Product design', 'Programmatic & tech', 'Programmatic & Technology', 'Project management', 'SEM/SEO',
            'Service design', 'Socail Media', 'Software Developer', 'Software development', 'UI design', 'UX',
            'UX Designer / Visual Designer', 'Video', 'Video & photography', 'Web design', 'Web Developer'
        );
    ?>
    <form id="postCandidates" name="postCandidates" method="post" enctype="multipart/form-data" onsubmit="return post_candidates(event)">
        <div class="gc">
          <div class="g-12">
                <div class="component-divider">
                    <span class="text">
                        <?php
                            if ($jobID == "DF3F17BC4C" || get_the_ID() == 40) {
                                echo "Join Voy talent";
                            } else {
                                echo "Apply";
                            }
                        ?>
                    </span>
                    <span class="icon">
              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M0 7.33l2.829-2.83 9.175 9.339 9.167-9.339 2.829 2.83-11.996 12.17z"></path></svg>
            </span>
                </div>
            </div>

            <div class="g-12">
                <h2 class="header-section">
                <?php
                    if ($jobID == "DF3F17BC4C" || get_the_ID() == 40) {
                        echo "Welcome!";
                    } else {
                        echo "Interested!";
                    }
                ?>
                </h2>
               <!--  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras venenatis metus eu felis cursus imperdiet. Donec porttitor ac diam eu lobortis. Nam sed diam tristique, pharetra felis sed, ultrices ligula. Pellentesque elementum mollis tincidunt. Curabitur sem libero, hendrerit vitae condimentum commodo.</p> -->
            </div>

            <div class="g-12">
                <h2 class="header-number -solid"><figure></figure><span class="number">1.</span><span class="text">So, let's get to know eachother?</span></h2>
            </div>

            <div class="g-6">
                <input name="first_name" class="-full-width" type="text" placeholder="First name" required>
                <input name="cShortcode" type="hidden" value="<?php echo $jobID; ?>">
            </div>
            <div class="g-6">
                <input name="last_name" class="-full-width" type="text" placeholder="Last name" required>
            </div>

            <div class="g-6">
                <input name="cEmail" class="-full-width" type="email" placeholder="Email" required>
            </div>
            <div class="g-6">
                <input name="cPhone"  class="-full-width" type="phone" placeholder="Phone" required>
            </div>

            <div class="g-12">
                <h2 class="header-number"><figure></figure><span class="number">2.</span><span class="text">And what's your area of expertice?</span></h2>
            </div>

            <div class="m-form-expertice-choices">
                <?php foreach($areaOfExpertice as $jobtype): ?>
                    <div class="btn-w"><div class="btn-choice" onclick="this.classList.toggle('selectable');" id="<?php echo strtolower($jobtype); ?>"><?php echo $jobtype; ?></div></div>
                <?php endforeach; ?>

            </div>

        <div class="g-12">
            <h2 class="header-number"><figure></figure><span class="number">3.</span><span class="text">So, let's get to know eachother?</span></h2>
        </div>

        <div class="g-6">
            <input class="-full-width" name="social_profiles[linkedin][url]" type="text" placeholder="Linked in Profile (url)">
        </div>
        <div class="g-6">
            <input class="-full-width" name="social_profiles[portfolio][url]" type="text" placeholder="Portfolio Link (url)">
        </div>

        <!-- ORG - Prad -->
<!--         <div class="g-6">
            <label for="resume_file">Upload your resume </label>
            <input class="-full-width" name="resume_file" id="resume_file" type="file" accept="application/pdf">
        </div>
        <div class="g-6">
            <label for="portfolio_file">Enclose File </label>
            <input class="-full-width" name="portfolio_file" id="portfolio_file" type="file" accept="application/pdf">
        </div> -->

        <!-- STYLED - Ken -->
        <div class="g-6">
          <input class="-full-width -input-file" name="resume_file" id="resume_file" type="file" accept="application/pdf">
            <label for="resume_file" class="-label-file"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="17" viewBox="0 0 20 17"><path d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z"/></svg><span>Upload your resume</span></label>
            <span class="-input-file-desc">(Only .pdf, max 3mb)</span>
        </div>
        <div class="g-6">
          <input class="-full-width -input-file" name="portfolio_file" id="portfolio_file" type="file" accept="application/pdf">
            <label for="portfolio_file" class="-label-file"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="17" viewBox="0 0 20 17"><path d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z"/></svg><span>Upload your portfolio</span></label>
            <span class="-input-file-desc">(Only .pdf, max 3mb)</span>
        </div>



        <div class="g-12">
            <h2 class="header-number"><figure></figure><span class="number">4.</span><span class="text">Describe your dreams and ambitions</span></h2>
        </div>

        <div class="g-12">
            <textarea name="cSummary" class="-full-width" placeholder="Describe your dreams and ambitions" required></textarea>
        </div>

<!--         <div class="g-12">
            <p>View Voy privacy policy here</a>. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce et eleifend leo. Aliquam semper luctus porta. Duis augue tortor, mattis id elit at, fringilla rhoncus sem.</p>
        </div> -->

        <div class="g-12">
            <label class="checkbox-holder">I approve <a href="<?php echo get_privacy_policy_url();?>" target="_blank">Voy privacy policy</a>
                <input type="checkbox" required>
                <span class="checkmark"></span>
            </label>
        </div>

        <div class="g-12">
          <br>
            <button type="submit" class="btn -orange -icon" id="submitCandidate" >Send<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M0 3v18h24v-18h-24zm21.518 2l-9.518 7.713-9.518-7.713h19.036zm-19.518 14v-11.817l10 8.104 10-8.104v11.817h-20z"></path></svg></button>
        </div>
    </form>

    <div class="g-12" id="showPostCandidateResult" style="display: none">
        <div class="sent-result -sent" id="result_sent">
            <h2 class="header">Sent! Thank you!</h2>
        </div>
        <div class="sent-result -error" id="result_error">
            <h2 class="header">Something went wrong, sorry!</h2>
        </div>
    </div>

    <div id="formLoading" class="form-loader"><div class="loader"></div></div>

</section>
