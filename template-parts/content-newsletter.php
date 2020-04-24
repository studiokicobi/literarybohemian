<?php
/**
 * Template part for the newsletter signup
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package The_Literary_Bohemian
 */

?>

<div id="newsletter" class="newsletter">

	<h2 class="newsletter__heading">Join The Literary Bohemian Wanderlust Club</h2>
	<p class="newsletter__subheading">and receive a regular missive from your journal of journeys</p>

		<!-- newsletter form -->
		<div id="mc_embed_signup">
			<form action="https://literarybohemian.us3.list-manage.com/subscribe/post?u=e10427dc014f047245e843d80&amp;id=cf83fcce33" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
				<div id="mc_embed_signup_scroll" class="newsletter__form-wrapper">
					<div class="mc-field-group has-float-label">
						<input placeholder="you@email.com" type="email" value="" name="EMAIL" class="required email newsletter__input" id="mce-EMAIL">
						<label for="mce-EMAIL" class="newsletter__label">Your email address</label>
					</div>
					<!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
					<div style="position: absolute; left: -5000px;" aria-hidden="true"><input type="text" name="b_e10427dc014f047245e843d80_cf83fcce33" tabindex="-1" value=""></div>
		    	<div class="clear"><input type="submit" value="Subscribe" name="subscribe" id="mc-embedded-subscribe" class="button newsletter__submit"></div>
				</div>

				<div id="mce-responses" class="clear newsletter__alert">
					<!-- <div class="response newsletter__alert--error" id="mce-error-response" style="display:none"></div>
					<div class="response newsletter__alert--success" id="mce-success-response" style="display:none"></div> -->
				</div>

			</form>
		</div>

		<!-- <script type='text/javascript' src='//s3.amazonaws.com/downloads.mailchimp.com/js/mc-validate.js'></script><script type='text/javascript'>(function($) {window.fnames = new Array(); window.ftypes = new Array();fnames[0]='EMAIL';ftypes[0]='email';fnames[1]='FNAME';ftypes[1]='text';fnames[2]='LNAME';ftypes[2]='text';fnames[3]='WEBSITE';ftypes[3]='url';}(jQuery));var $mcj = jQuery.noConflict(true);</script> -->
		<!-- /newsletter form -->

</div> <!-- .newsletter -->
