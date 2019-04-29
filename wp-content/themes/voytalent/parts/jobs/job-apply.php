<?php
/**
 * Template for displaying jobapply in Voy talent
 *
 * @package WordPress
 * @subpackage Voytalent
 * @since 1.0
 * @version 1.0
 */
global $jobDetails;
?>

<div class="gc job-apply">
    <div class="g-12">
        <div class="component-divider">
            <span class="text">Apply</span>
            <span class="icon">
						<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M0 7.33l2.829-2.83 9.175 9.339 9.167-9.339 2.829 2.83-11.996 12.17z"></path></svg>
					</span>
        </div>
    </div>

    <div class="g-12 ds-typography">
        <h2 class="header-section">Interested!</h2>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce et eleifend leo. Aliquam semper luctus porta. Duis augue tortor, mattis id elit at, fringilla rhoncus sem. Donec dapibus neque in venenatis pulvinar. Pellentesque sit amet leo ac erat ornare venenatis pulvinar bibendum nibh. Quisque pharetra finibus velit non luctus.</p>
    </div>

    <div class="g-12 ds-typography">
        <h2 class="header-number -solid"><figure></figure><span class="number">1.</span><span class="text">So, let's get to know eachother?</span></h2>
    </div>

    <div class="g-6">
        <input class="-full-width" type="text" placeholder="First name">
    </div>
    <div class="g-6">
        <input class="-full-width" type="text" placeholder="Last name">
    </div>

    <div class="g-6">
        <input class="-full-width" type="email" placeholder="Email">
    </div>
    <div class="g-6">
        <input class="-full-width" type="phone" placeholder="Phone">
    </div>

    <div class="g-12 ds-typography">
        <h2 class="header-number"><figure></figure><span class="number">2.</span><span class="text">So, let's get to know eachother?</span></h2>
    </div>

    <div class="g-6">
        <input class="-full-width" type="email" placeholder="Linked in Profile">
    </div>
    <div class="g-6">
        <input class="-full-width" type="phone" placeholder="Portfolio Link">
    </div>

    <div class="g-12 ds-typography">
        <h2 class="header-number"><figure></figure><span class="number">3.</span><span class="text">Describe your dreams and ambitions</span></h2>
    </div>

    <div class="g-12">
        <textarea class="-full-width" placeholder="Describe your dreams and ambitions"></textarea>
    </div>

    <div class="g-12">
        <p>Voy privacy text. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce et eleifend leo. Aliquam semper luctus porta. Duis augue tortor, mattis id elit at, fringilla rhoncus sem.</p>
    </div>

    <div class="g-12">
        <label class="checkbox-holder">I approve
            <input type="checkbox" checked="checked">
            <span class="checkmark"></span>
        </label>
    </div>

    <div class="g-12">
        <label class="checkbox-holder">Recive emails from Voy
            <input type="checkbox" checked="checked">
            <span class="checkmark"></span>
        </label>
    </div>

    <div class="g-12">
        <a class="btn -orange -icon">Send<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M0 3v18h24v-18h-24zm21.518 2l-9.518 7.713-9.518-7.713h19.036zm-19.518 14v-11.817l10 8.104 10-8.104v11.817h-20z"></path></svg></a>
    </div>
</div>