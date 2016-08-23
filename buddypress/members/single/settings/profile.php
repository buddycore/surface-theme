<?php do_action('bp_before_member_settings_template'); ?>

<form action="<?php echo trailingslashit( bp_displayed_user_domain() . bp_get_settings_slug() . '/profile' ); ?>" method="post" class="settings-form" id="settings-form">
<div class="padder">
	<?php if(bp_xprofile_get_settings_fields()) : ?>

		<?php while(bp_profile_groups()) : bp_the_profile_group(); ?>

			<?php if(bp_profile_fields()) : ?>

						<?php while(bp_profile_fields()) : bp_the_profile_field(); ?>

							<div class="row">
								<div class="column">
									<div class="editfield">
										<label><?php bp_the_profile_field_name(); ?></label>
										<?php bp_profile_settings_visibility_select(); ?>
									</div>
								</div>
							</div>

						<?php endwhile; ?>

			<?php endif; ?>

		<?php endwhile; ?>

	<?php endif; ?>

	<?php do_action('bp_core_xprofile_settings_before_submit'); ?>

	<div class="submit">
		<input id="submit" type="submit" name="xprofile-settings-submit" value="<?php esc_attr_e( 'Save Settings', 'buddypress' ); ?>" class="submit" />
	</div>

	<?php do_action('bp_core_xprofile_settings_after_submit'); ?>

	<?php wp_nonce_field('bp_xprofile_settings'); ?>

	<input type="hidden" name="field_ids" id="field_ids" value="<?php bp_the_profile_field_ids(); ?>" />
</div>
</form>

<?php do_action('bp_after_member_settings_template'); ?>
