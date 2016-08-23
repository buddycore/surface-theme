<?php do_action('bp_before_activity_entry'); ?>

<?php
$activityMedia = false;
$id = bp_get_activity_id();
$activityMedia = $wpdb->get_row("SELECT activityUpload, activityId FROM activityUploads WHERE activityId = $id");

?>

<li class="<?php bp_activity_css_class(); ?>" id="activity-<?php bp_activity_id(); ?>">

	<div class="activity-content">

		<div class="activity-header">
			<div class="table-cell avatar"><a href="<?php bp_activity_user_link(); ?>"><?php bp_activity_avatar('width=40&height=40'); ?></a></div>
			<div class="table-cell detail"><?php bp_activity_action(); ?></div>
		</div><!-- HEADER -->

		<?php if(bp_activity_has_content()) : ?>

			<div class="activity-inner standardise">
			<?php bp_activity_content_body(); ?>
			<?php if($activityMedia->activityUpload) : ?>
				<div class="activity-media"><a href="<?php echo $activityMedia->activityUpload; ?>">View Attachment</a></div>
			<?php endif; ?>
			</div><!-- INNER -->

		<?php endif; ?>

		<?php do_action('bp_activity_entry_content'); ?>

		<?php if(is_user_logged_in()) : ?>

		<div class="activity-meta">

			<?php if(bp_get_activity_type() == 'activity_comment') : ?>

				<a href="<?php bp_activity_thread_permalink(); ?>" class="button view bp-secondary-action"><?php _e('View Conversation', 'buddypress'); ?></a>

			<?php endif; ?>

			<?php if(is_user_logged_in()) : ?>

				<?php if(bp_activity_can_comment()) : ?>

					<a href="<?php bp_activity_comment_link(); ?>" class="button acomment-reply bp-primary-action" id="acomment-comment-<?php bp_activity_id(); ?>"><?php printf(__('Reply %s', 'buddypress'), '<span>' . bp_activity_get_comment_count() . '</span>'); ?></a>

				<?php endif; ?>

				<?php if(bp_activity_can_favorite()) : ?>

					<?php if(!bp_get_activity_is_favorite()) : ?>

						<a href="<?php bp_activity_favorite_link(); ?>" class="button fav bp-secondary-action"><?php _e('Favorite', 'buddypress'); ?></a>

					<?php else : ?>

						<a href="<?php bp_activity_unfavorite_link(); ?>" class="button unfav bp-secondary-action"><?php _e('Remove Favorite', 'buddypress'); ?></a>

					<?php endif; ?>

				<?php endif; ?>

				<?php if(bp_activity_user_can_delete()) bp_activity_delete_link(); ?>

				<?php do_action('bp_activity_entry_meta'); ?>

			<?php endif; ?>

		</div><!-- META -->

		<?php endif; ?>

	</div><!-- CONTENT -->

	<?php do_action('bp_before_activity_entry_comments'); ?>
	<?php $set = true; ?>
	<?php if((bp_activity_get_comment_count() > 0 || bp_activity_can_comment()) || bp_is_single_activity()) : ?>
		
		<div class="activity-comments">

			<?php bp_activity_comments(); ?>

			<?php if(is_user_logged_in() && bp_activity_can_comment()) : ?>

				<form action="<?php bp_activity_comment_form_action(); ?>" method="post" id="ac-form-<?php bp_activity_id(); ?>" class="ac-form"<?php bp_activity_comment_form_nojs_display(); ?>>
					<div class="ac-reply-content">
						<div class="ac-textarea">
							<label for="ac-input-<?php bp_activity_id(); ?>" class="bp-screen-reader-text"><?php _e('Your Reply', 'buddypress'); ?></label>
							<textarea id="ac-input-<?php bp_activity_id(); ?>" class="ac-input bp-suggestions" name="ac_input_<?php bp_activity_id(); ?>"></textarea>
						</div>
						<div class="submit">
							<button type="submit" name="ac_form_submit"><?php esc_attr_e('Add Comment', 'buddypress'); ?></button>
							<a href="#" class="ac-reply-cancel"><?php _e( 'Cancel', 'buddypress' ); ?></a>
						</div>
						<input type="hidden" name="comment_form_id" value="<?php bp_activity_id(); ?>" />
					</div>
					<?php do_action('bp_activity_entry_comments'); ?>
					<?php wp_nonce_field('new_activity_comment', '_wpnonce_new_activity_comment'); ?>
				</form>

			<?php endif; ?>

		</div><!-- COMMENTS -->

	<?php endif; ?>

	<?php do_action('bp_after_activity_entry_comments'); ?>

</li>

<?php do_action('bp_after_activity_entry'); ?>
