<?php get_sidebar(); ?>

<div class="main-col">

<div id="buddypress">

	<?php do_action('bp_before_activation_page'); ?>

	<div class="page" id="activate-page">

		<?php do_action('bp_before_activate_content'); ?>

		<?php if(bp_account_was_activated()) : ?>

			<p class="message">
			<?php if(isset($_GET['e'])) : ?>
				<?php _e('Your account was activated successfully! Your account details have been sent to you in a separate email.', 'buddypress'); ?>
			<?php else : ?>
				<?php printf(__('Your account was activated successfully! You can now <a href="%s">log in</a> with the username and password you provided when you signed up.', 'buddypress'), wp_login_url(bp_get_root_domain())); ?>
			<?php endif; ?>
			</p>

		<?php else : ?>

		<div class="padder">

			<form action="" method="get" class="standard-form" id="activation-form">

				<div class="row">
					<div class="column">
						<div class="editfield">
							<label for="key"><?php _e('Activation Key:', 'buddypress'); ?></label>
							<input type="text" name="key" id="key" value="" />
						</div>
					</div>
				</div>

				<div class="submit"><input type="submit" name="submit" value="<?php esc_attr_e('Activate', 'buddypress'); ?>" class="submit" /></div>

			</form>

		</div>

		<?php endif; ?>

		<?php do_action('bp_after_activate_content'); ?>

	</div><!-- PAGE -->

	<?php do_action('bp_after_activation_page'); ?>

</div><!-- BUDDYPRESS -->

</div><!-- MAIN COL -->