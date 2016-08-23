<?php do_action('bp_before_activity_comment'); ?>

<li id="acomment-<?php bp_activity_comment_id(); ?>">

	<div class="comment-header">
		<div class="table-cell acomment-avatar">
			<a href="<?php bp_activity_comment_user_link(); ?>"><?php bp_activity_avatar('width=30&height=30&type=thumb&user_id=' . bp_get_activity_comment_user_id()); ?></a>
		</div><!-- AVATAR -->
		<div class="table-cell acomment-meta">
			<?php printf(__('<a href="%1$s">%2$s</a> replied <a href="%3$s" class="activity-time-since"><span class="time-since">%4$s</span></a>', 'buddypress'), bp_get_activity_comment_user_link(), bp_get_activity_comment_name(), bp_get_activity_comment_permalink(), bp_get_activity_comment_date_recorded()); ?>
		</div><!-- META -->
	</div><!-- HEADER -->

	<div class="acomment-content standardise"><?php bp_activity_comment_content(); ?></div><!-- CONTENT -->

	<?php if(is_user_logged_in()) : ?>

	<div class="acomment-options">

		<?php if(is_user_logged_in() && bp_activity_can_comment_reply( bp_activity_current_comment())) : ?>

			<a href="#acomment-<?php bp_activity_comment_id(); ?>" class="acomment-reply bp-primary-action" id="acomment-reply-<?php bp_activity_id(); ?>-from-<?php bp_activity_comment_id(); ?>"><?php _e('Reply', 'buddypress'); ?></a>

		<?php endif; ?>

		<?php if(bp_activity_user_can_delete()) : ?>

			<a href="<?php bp_activity_comment_delete_link(); ?>" class="delete acomment-delete confirm bp-secondary-action" rel="nofollow"><?php _e('Delete', 'buddypress'); ?></a>

		<?php endif; ?>

		<?php do_action('bp_activity_comment_options'); ?>

	</div><!-- OPTIONS -->

	<?php endif; ?>
	<?php bp_activity_recurse_comments(bp_activity_current_comment()); ?>
</li>

<?php do_action('bp_after_activity_comment'); ?>
