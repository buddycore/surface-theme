<?php do_action('bp_before_group_invites_content'); ?>

<?php if(bp_has_groups('type=invites&user_id=' . bp_loggedin_user_id())) : ?>

	<ul id="groups-list" class="invites item-list">

		<?php while(bp_groups()) : bp_the_group(); ?>

			<li>
				<div class="table">
					<div class="table-cell avatar">
						<a href="<?php bp_group_permalink(); ?>"><?php bp_group_avatar('type=thumb&width=150&height=150'); ?></a>
					</div>
					<div class="table-cell detail">
						<?php if(!bp_disable_group_avatar_uploads()) : ?>
						<h3><a href="<?php bp_group_permalink(); ?>"><?php bp_group_name(); ?></a><span class="small"> - <?php printf(_nx('%d member', '%d members', bp_get_group_total_members(false),'Group member count', 'buddypress'), bp_get_group_total_members(false)); ?></span></h3>
						<?php endif; ?>
						<p class="active"><?php printf(__('active %s', 'buddypress'), bp_get_group_last_active()); ?></p>

						<p class="type"><?php bp_group_type(); ?> / <?php bp_group_member_count(); ?></p>
						<?php do_action('bp_directory_groups_item'); ?>
						
						<div class="action">
							<a class="button accept" href="<?php bp_group_accept_invite_link(); ?>"><?php _e('Accept', 'buddypress'); ?></a>
							<a class="button reject confirm" href="<?php bp_group_reject_invite_link(); ?>"><?php _e('Reject', 'buddypress'); ?></a>
							<?php do_action('bp_group_invites_item_action'); ?>
						</div>
						
					</div>
				</div>
			</li>

		<?php endwhile; ?>
	</ul>

<?php else: ?>

	<div id="message" class="info">
		<p><?php _e('You have no outstanding group invites.', 'buddypress'); ?></p>
	</div>

<?php endif;?>

<?php do_action('bp_after_group_invites_content'); ?>
