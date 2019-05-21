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
    <form id="postCandidates" name="postCandidates" onsubmit="return post_candidates();">
        <div class="gc">
            <div class="g-12">
                <h2 class="header-section">Welcome</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras venenatis metus eu felis cursus imperdiet. Donec porttitor ac diam eu lobortis. Nam sed diam tristique, pharetra felis sed, ultrices ligula. Pellentesque elementum mollis tincidunt. Curabitur sem libero, hendrerit vitae condimentum commodo.</p>
            </div>

            <div class="g-12">
                <h2 class="header-number -solid"><figure></figure><span class="number">1.</span><span class="text">So, let's get to know eachother?</span></h2>
            </div>

            <div class="g-6">
                <input name="first_name" class="-full-width" type="text" placeholder="First name" required>
                <input name="cShortcode" type="hidden" value="<?php echo 'DF3F17BC4C'; ?>">
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
            <input class="-full-width" name="social_profiles[linkedin][name]" type="text" placeholder="Linked in Profile">
        </div>
        <div class="g-6">
            <input class="-full-width" name="social_profiles[linkedin][url]" type="url" pattern="http://.*" placeholder="Portfolio Link">
        </div>

        <div class="g-12">
            <h2 class="header-number"><figure></figure><span class="number">4.</span><span class="text">Describe your dreams and ambitions</span></h2>
        </div>

        <div class="g-12">
            <textarea name="cSummary" class="-full-width" placeholder="Describe your dreams and ambitions" required></textarea>
        </div>

        <div class="g-12">
            <p>Voy privacy text. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce et eleifend leo. Aliquam semper luctus porta. Duis augue tortor, mattis id elit at, fringilla rhoncus sem.</p>
        </div>

        <div class="g-12">
            <label class="checkbox-holder">I approve
                <input type="checkbox" checked="checked" required>
                <span class="checkmark"></span>
            </label>
        </div>

        <div class="g-12 -wip">
            <label class="checkbox-holder">Recive emails from Voy
                <input type="checkbox" checked="checked">
                <span class="checkmark"></span>
            </label>
        </div>

        <div class="g-12">
            <button type="submit" class="btn -orange -icon" id="submitCandidate">Send<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M0 3v18h24v-18h-24zm21.518 2l-9.518 7.713-9.518-7.713h19.036zm-19.518 14v-11.817l10 8.104 10-8.104v11.817h-20z"></path></svg></button>
        </div>
    </form>

    <div id="showPostCandidateResult"></div>
</section>
