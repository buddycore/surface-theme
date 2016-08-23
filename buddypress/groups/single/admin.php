<ul class="button-nav outer">
	<?php bp_group_admin_tabs(); ?>
</ul>

<form action="<?php bp_group_admin_form_action(); ?>" name="group-settings-form" id="group-settings-form" class="standard-form" method="post" enctype="multipart/form-data">

<?php do_action('bp_before_group_admin_content'); ?>




<?php /* Edit Group Details */ ?>
<?php if(bp_is_group_admin_screen('edit-details')) : ?>

	<div class="padder">

	<?php do_action('bp_before_group_details_admin'); ?>

	<div class="rows">

	<div class="row">
		<div class="column">
			<div class="editfield">
				<label for="group-name"><?php _e('Group Name (required)', 'buddypress'); ?></label>
				<input type="text" name="group-name" id="group-name" value="<?php bp_group_name(); ?>" aria-required="true" />
			</div>
		</div>
	</div>

	<div class="row">
		<div class="column">
			<div class="editfield">
				<label for="group-desc"><?php _e('Group Description (required)', 'buddypress'); ?></label>
				<textarea name="group-desc" id="group-desc" aria-required="true"><?php bp_group_description_editable(); ?></textarea>
			</div>
		</div>
	</div>

	<?php do_action('groups_custom_group_fields_editable'); ?>
	
	<div class="row">
		<div class="column">
			<div class="editfield checkbox">
				<label for="group-notify-members">
					<input type="checkbox" name="group-notify-members" id="group-notify-members" value="1" /> <?php _e('Notify group members of these changes via email', 'buddypress'); ?>
				</label>
			</div>
		</div>
	</div>

	</div>

	<?php do_action('bp_after_group_details_admin'); ?>

	<div class="submit">
		<input type="submit" value="<?php esc_attr_e('Save Changes', 'buddypress'); ?>" id="save" name="save" />
	</div>
	<?php wp_nonce_field('groups_edit_group_details'); ?>

</div>

<?php endif; ?>




<?php /* Manage Group Settings */ ?>
<?php if(bp_is_group_admin_screen('group-settings')) : ?>

	<div class="padder">

	<?php do_action('bp_before_group_settings_admin'); ?>

	<?php if(bp_is_active('forums')) : ?>

		<?php if(bp_forums_is_installed_correctly()) : ?>

			<div class="checkbox">
				<label for="group-show-forum"><input type="checkbox" name="group-show-forum" id="group-show-forum" value="1"<?php bp_group_show_forum_setting(); ?> /> <?php _e('Enable discussion forum', 'buddypress'); ?></label>
			</div>

		<?php endif; ?>

	<?php endif; ?>

	<div class="radio-groups">

		<h4><?php _e('Privacy Options', 'buddypress'); ?></h4>

		<div class="radio-group">

		<label for="group-status-public"><input type="radio" name="group-status" id="group-status-public" value="public"<?php if('public' == bp_get_new_group_status() || !bp_get_new_group_status()) { ?> checked="checked"<?php } ?> aria-describedby="public-group-description" /> <?php _e('This is a public group', 'buddypress'); ?></label>

		<ul id="public-group-description">
			<li><?php _e('Any site member can join this group.', 'buddypress'); ?></li>
			<li><?php _e('This group will be listed in the groups directory and in search results.', 'buddypress'); ?></li>
			<li><?php _e('Group content and activity will be visible to any site member.', 'buddypress'); ?></li>
		</ul>

		</div>

		<div class="radio-group">

		<label for="group-status-private"><input type="radio" name="group-status" id="group-status-private" value="private"<?php if('private' == bp_get_new_group_status()) { ?> checked="checked"<?php } ?> aria-describedby="private-group-description" /> <?php _e('This is a private group', 'buddypress'); ?></label>

		<ul id="private-group-description">
			<li><?php _e('Only users who request membership and are accepted can join the group.', 'buddypress'); ?></li>
			<li><?php _e('This group will be listed in the groups directory and in search results.', 'buddypress'); ?></li>
			<li><?php _e('Group content and activity will only be visible to members of the group.', 'buddypress'); ?></li>
		</ul>

		</div>

		<div class="radio-group">

		<label for="group-status-hidden"><input type="radio" name="group-status" id="group-status-hidden" value="hidden"<?php if('hidden' == bp_get_new_group_status()) { ?> checked="checked"<?php } ?> aria-describedby="hidden-group-description" /> <?php _e('This is a hidden group', 'buddypress'); ?></label>

		<ul id="hidden-group-description">
			<li><?php _e('Only users who are invited can join the group.', 'buddypress'); ?></li>
			<li><?php _e('This group will not be listed in the groups directory or search results.', 'buddypress'); ?></li>
			<li><?php _e('Group content and activity will only be visible to members of the group.', 'buddypress'); ?></li>
		</ul>

		</div>

	</div>

	<div class="radio-options">

	<p><strong><?php _e('Which members of this group are allowed to invite others?', 'buddypress'); ?></strong></p>

	<div class="radio">
		<label for="group-invite-status-members"><input type="radio" name="group-invite-status" id="group-invite-status-members" value="members"<?php bp_group_show_invite_status_setting('members'); ?> /> <?php _e('All group members', 'buddypress'); ?></label>
		<label for="group-invite-status-mods"><input type="radio" name="group-invite-status" id="group-invite-status-mods" value="mods"<?php bp_group_show_invite_status_setting('mods'); ?> /> <?php _e('Group admins and mods only', 'buddypress'); ?></label>
		<label for="group-invite-status-admins"><input type="radio" name="group-invite-status" id="group-invite-status-admins" value="admins"<?php bp_group_show_invite_status_setting('admins'); ?> /> <?php _e('Group admins only', 'buddypress'); ?></label>
	</div>

	</div>

	<?php do_action('bp_after_group_settings_admin'); ?>

	<div class="submit">
		<input type="submit" value="<?php esc_attr_e('Save Changes', 'buddypress'); ?>" id="save" name="save" />
	</div>
	<?php wp_nonce_field('groups_edit_group_settings'); ?>

	</div><!-- PADDER -->

<?php endif; ?>

<?php /* Group Avatar Settings */ ?>
<?php if(bp_is_group_admin_screen('group-avatar')) : ?>

<div class="compensate">

	<?php if('upload-image' == bp_get_avatar_admin_step()) : ?>

			<?php if(bp_get_group_has_avatar()) : ?>

				<?php bp_button(array( 'id' => 'delete_group_avatar', 'component' => 'groups', 'wrapper_id' => 'delete-group-avatar-button', 'link_class' => 'edit', 'link_href' => bp_get_group_avatar_delete_link(), 'link_title' => __('Delete Group Profile Photo', 'buddypress'), 'link_text' => __('Delete Group Profile Photo', 'buddypress'))); ?>

			<?php endif; ?>

			<?php bp_avatar_get_templates(); ?>

			<?php wp_nonce_field('bp_avatar_upload'); ?>

	<?php endif; ?>

	<?php if('crop-image' == bp_get_avatar_admin_step()) : ?>

		<h4><?php _e('Crop Profile Photo', 'buddypress'); ?></h4>

		<img src="<?php bp_avatar_to_crop(); ?>" id="avatar-to-crop" class="avatar" alt="<?php esc_attr_e('Profile photo to crop', 'buddypress'); ?>" />

		<div id="avatar-crop-pane">
			<img src="<?php bp_avatar_to_crop(); ?>" id="avatar-crop-preview" class="avatar" alt="<?php esc_attr_e('Profile photo preview', 'buddypress'); ?>" />
		</div>

		<input type="submit" name="avatar-crop-submit" id="avatar-crop-submit" value="<?php esc_attr_e('Crop Image', 'buddypress'); ?>" />

		<input type="hidden" name="image_src" id="image_src" value="<?php bp_avatar_to_crop_src(); ?>" />
		<input type="hidden" id="x" name="x" />
		<input type="hidden" id="y" name="y" />
		<input type="hidden" id="w" name="w" />
		<input type="hidden" id="h" name="h" />

		<?php wp_nonce_field('bp_avatar_cropstore'); ?>

	<?php endif; ?>

</div><!-- COMPENSATE -->

<?php endif; ?>




<?php /* Group Cover image Settings */ ?>
<?php if(bp_is_group_admin_screen('group-cover-image')) : ?>

<div class="compensate">

	<?php do_action('bp_before_group_settings_cover_image'); ?>

	<?php bp_attachments_get_template_part('cover-images/index'); ?>

	<?php do_action('bp_after_group_settings_cover_image'); ?>

</div>

<?php endif; ?>

<?php /* Manage Group Members */ ?>
<?php if(bp_is_group_admin_screen('manage-members')) : ?>

	<?php do_action('bp_before_group_manage_members_admin'); ?>

	<div class="bp-widget">

		<h4><?php _e('Administrators', 'buddypress'); ?></h4>

		<?php if(bp_has_members('&include='. bp_group_admin_ids())) : ?>

		<ul id="members-list" class="item-list single-line">

			<?php while(bp_members()) : bp_the_member(); ?>

				<li <?php bp_member_class(); ?>>
					<div class="inner">
						<div class="table">
							<div class="table-cell avatar">
								<a href="<?php bp_member_permalink(); ?>"><?php echo bp_core_fetch_avatar(array('item_id' => bp_get_member_user_id(), 'type' => 'thumb', 'width' => 250, 'height' => 250, 'alt' => sprintf(__('Profile picture of %s', 'buddypress'), bp_get_member_name()))); ?></a>
							</div>
							<div class="table-cell detail">
								<?php do_action('bp_group_members_list_item'); ?>
								<h3><a href="<?php bp_member_permalink(); ?>"> <?php bp_member_name(); ?></a></h3>
								<p><?php bp_group_member_joined_since(); ?></p>
								<?php if(count(bp_group_admin_ids(false, 'array')) > 1) : ?>
								<span class="small">
									<a class="button confirm admin-demote-to-member" href="<?php bp_group_member_demote_link(bp_get_member_user_id()); ?>"><?php _e('Demote to Member', 'buddypress'); ?></a>
								</span>
								<?php endif; ?>
							</div>
						</div>
						<div class="meta">
							<ul>
								<li class="updates">75 updates</li>
								<li class="view"><a href="<?php bp_member_permalink(); ?>">Visit Profile</a></li>
							</ul>
						</div>
					</div>
				</li>
			<?php endwhile; ?>

		</ul>

		<?php endif; ?>

	</div><!-- BP WIDGET -->

	<?php if(bp_group_has_moderators() ) : ?>
		<div class="bp-widget">

			<h4><?php _e('Moderators', 'buddypress'); ?></h4>

			<?php if(bp_has_members('&include=' . bp_group_mod_ids())) : ?>
				<ul id="mods-list" class="item-list single-line">

					<?php while(bp_members()) : bp_the_member(); ?>
					<li>
						<?php echo bp_core_fetch_avatar(array('item_id' => bp_get_member_user_id(), 'type' => 'thumb', 'width' => 30, 'height' => 30, 'alt' => sprintf(__('Profile picture of %s', 'buddypress'), bp_get_member_name()))); ?>
						<h5>
							<a href="<?php bp_member_permalink(); ?>"> <?php bp_member_name(); ?></a>
							<span class="small">
								<a href="<?php bp_group_member_promote_admin_link(array('user_id' => bp_get_member_user_id())); ?>" class="button confirm mod-promote-to-admin"><?php _e('Promote to Admin', 'buddypress'); ?></a>
								<a class="button confirm mod-demote-to-member" href="<?php bp_group_member_demote_link(bp_get_member_user_id()); ?>"><?php _e('Demote to Member', 'buddypress'); ?></a>
							</span>
						</h5>
					</li>
					<?php endwhile; ?>

				</ul>
			<?php endif; ?>
		</div><!-- BP WIDGET -->
	<?php endif ?>


	<div class="bp-widget">
		<h4><?php _e("Members", 'buddypress'); ?></h4>

		<?php if(bp_group_has_members('per_page=15&exclude_banned=0')) : ?>

			<?php if(bp_group_member_needs_pagination()) : ?>

				<div class="pagination no-ajax">
					<div id="member-count" class="pag-count"><?php bp_group_member_pagination_count(); ?></div>
					<div id="member-admin-pagination" class="pagination-links"><?php bp_group_member_admin_pagination(); ?></div>
				</div><!-- PAGINATION -->

			<?php endif; ?>

			<ul id="members-list" class="item-list single-line">

				<?php while(bp_group_members()) : bp_group_the_member(); ?>

					<li class="<?php bp_group_member_css_class(); ?>">
						<?php bp_group_member_avatar_mini(); ?>

						<h5>
							<?php bp_group_member_link(); ?>
							<?php if(bp_get_group_member_is_banned() ) _e('(banned)', 'buddypress'); ?>

							<span class="small">
								<?php if(bp_get_group_member_is_banned()) : ?>

									<a href="<?php bp_group_member_unban_link(); ?>" class="button confirm member-unban"><?php _e('Remove Ban', 'buddypress'); ?></a>

								<?php else : ?>

									<a href="<?php bp_group_member_ban_link(); ?>" class="button confirm member-ban"><?php _e('Kick &amp; Ban', 'buddypress'); ?></a>
									<a href="<?php bp_group_member_promote_mod_link(); ?>" class="button confirm member-promote-to-mod"><?php _e('Promote to Mod', 'buddypress'); ?></a>
									<a href="<?php bp_group_member_promote_admin_link(); ?>" class="button confirm member-promote-to-admin"><?php _e('Promote to Admin', 'buddypress'); ?></a>

								<?php endif; ?>

								<a href="<?php bp_group_member_remove_link(); ?>" class="button confirm"><?php _e('Remove from group', 'buddypress'); ?></a>

								<?php do_action('bp_group_manage_members_admin_item'); ?>
							</span>
						</h5>
					</li>

				<?php endwhile; ?>
			</ul>

			<?php if(bp_group_member_needs_pagination()) : ?>

				<div class="pagination no-ajax">
					<div id="member-count" class="pag-count"><?php bp_group_member_pagination_count(); ?></div>
					<div id="member-admin-pagination" class="pagination-links"><?php bp_group_member_admin_pagination(); ?></div>
				</div>

			<?php endif; ?>

		<?php else: ?>

			<div id="message" class="info">
				<p><?php _e('This group has no members.', 'buddypress'); ?></p>
			</div>

		<?php endif; ?>

	</div>

	<?php do_action('bp_after_group_manage_members_admin'); ?>

<?php endif; ?>




<?php /* Manage Membership Requests */ ?>
<?php if(bp_is_group_admin_screen('membership-requests')) : ?>

	<?php do_action('bp_before_group_membership_requests_admin'); ?>

	<div class="requests"><?php bp_get_template_part('groups/single/requests-loop'); ?></div>

	<?php do_action('bp_after_group_membership_requests_admin'); ?>

<?php endif; ?>

<?php do_action('groups_custom_edit_steps'); ?>




<?php /* Delete Group Option */ ?>
<?php if(bp_is_group_admin_screen('delete-group')) : ?>

	<div class="padder">

	<?php do_action('bp_before_group_delete_admin'); ?>
	
	
		<p class="message"><strong><?php _e('WARNING: Deleting this group will completely remove ALL content associated with it. There is no way back, please be careful with this option.', 'buddypress'); ?></strong></p>
	
	<div class="rows">
	
	<div class="row">
		<div class="column">
			<div class="editfield checkbox">
				<label for="delete-group-understand"><input type="checkbox" name="delete-group-understand" id="delete-group-understand" value="1" onclick="if(this.checked) { document.getElementById('delete-group-button').disabled = ''; } else { document.getElementById('delete-group-button').disabled = 'disabled'; }" /> <?php _e('I understand the consequences of deleting this group.', 'buddypress'); ?></label>			
			</div>
		</div>
	</div>

	</div>
	

	<?php do_action('bp_after_group_delete_admin'); ?>

	<div class="submit">
		<input type="submit" disabled="disabled" value="<?php esc_attr_e('Delete Group', 'buddypress'); ?>" id="delete-group-button" name="delete-group-button" />
	</div>

	<?php wp_nonce_field('groups_delete_group'); ?>

	</div><!-- PADDER -->

<?php endif; ?>

	<input type="hidden" name="group-id" id="group-id" value="<?php bp_group_id(); ?>" />

<?php do_action('bp_after_group_admin_content'); ?>

</form>

