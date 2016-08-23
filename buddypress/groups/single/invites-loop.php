
	<div id="invite-list">
		<ul>
			<?php bp_new_group_invite_friend_list(); ?>
		</ul>
		<?php wp_nonce_field('groups_invite_uninvite_user', '_wpnonce_invite_uninvite_user'); ?>
	</div>

	<?php do_action('bp_before_group_send_invites_list'); ?>

	<?php if(bp_group_has_invites(bp_ajax_querystring('invite') . '&per_page=10')) : ?>
		<ul id="friend-list" class="item-list">

		<?php while(bp_group_invites()) : bp_group_the_invite(); ?>

			<li>

			<div class="table">
					<div class="table-cell avatar">
						<a href="<?php bp_group_member_domain(); ?>"><?php bp_group_invite_user_avatar(); ?></a>
					</div>
					<div class="table-cell detail">
					<?php do_action('bp_group_members_list_item'); ?>
						<h3><?php bp_group_invite_user_link(); ?></h3>
						<?php do_action('bp_group_send_invites_item'); ?>
						<p class="active"><?php bp_group_invite_user_last_active(); ?></p>
						<?php do_action('bp_directory_members_item'); ?>

						<div class="action">
							<a class="button remove" href="<?php bp_group_invite_user_remove_invite_url(); ?>" id="<?php bp_group_invite_item_id(); ?>"><?php _e('Remove Invite', 'buddypress'); ?></a>

							<?php do_action('bp_group_send_invites_item_action'); ?>
						</div>
					</div>
				</div>

			</li>

		<?php endwhile; ?>

		</ul><!-- #friend-list -->

		<div id="pag-bottom" class="pagination">
			<div class="pag-count" id="group-invite-count-bottom"><?php bp_group_invite_pagination_count(); ?></div>
			<div class="pag-links" id="group-invite-pag-bottom"><?php bp_group_invite_pagination_links(); ?></div>
		</div><!-- PAGINATION -->

	<?php else : ?>

		<div id="message" class="info">
			<p><?php _e('Select friends to invite.', 'buddypress'); ?></p>
		</div>

	<?php endif; ?>

<?php do_action('bp_after_group_send_invites_list'); ?>
