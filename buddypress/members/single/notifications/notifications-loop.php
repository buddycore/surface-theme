<form action="" method="post" id="notifications-bulk-management">
	<div class="notifications">

			<?php while(bp_the_notifications()) : bp_the_notification(); ?>

				<article class="notification">

					<h2><?php bp_the_notification_description(); ?></h2>
					<p class="from-to"><?php bp_the_notification_time_since(); ?></p>


					<ul class="options">
						<li><label for="<?php bp_the_notification_id(); ?>"><input id="<?php bp_the_notification_id(); ?>" type="checkbox" name="notifications[]" value="<?php bp_the_notification_id(); ?>" class="notification-check"><span class="bp-screen-reader-text"><?php _e('Select', 'buddypress'); ?></span></label></li>
						<li class="actions"><?php bp_the_notification_action_links(); ?></li>	
					</ul>
					
				</article>

					
				</tr>

			<?php endwhile; ?>

	</div>

	<div class="notifications-options-nav">
		<label class="bulk-select" for="select-all-notifications"><input id="select-all-notifications" type="checkbox"><?php _e( 'Select all', 'buddypress' ); ?></label>
		<?php bp_notifications_bulk_management_dropdown(); ?>
	</div><!-- .messages-options-nav -->

	<?php wp_nonce_field('notifications_bulk_nonce', 'notifications_bulk_nonce'); ?>
</form>
