
<?php do_action('bp_before_members_loop'); ?>

<?php if(bp_get_current_member_type()) : ?>
	<p class="current-member-type"><?php bp_current_member_type_message() ?></p>
<?php endif; ?>

<?php if(bp_has_members( bp_ajax_querystring('members'))) : ?>

	<?php do_action('bp_before_directory_members_list'); ?>

	<ul id="members-list" class="item-list">

	<?php while(bp_members()) : bp_the_member(); ?>
		
		<li <?php bp_member_class(); ?>>
			<div class="inner">
				<div class="table">
					<div class="table-cell avatar">
						<a href="<?php bp_member_permalink(); ?>"><?php bp_member_avatar('type=full&width=250'); ?></a>
					</div>
					<div class="table-cell detail">
						<h3><a href="<?php bp_member_permalink(); ?>"><?php bp_member_name(); ?></a></h3>
						<p><?php bp_member_last_active(); ?></p>
						<?php do_action('bp_directory_members_item'); ?>
					</div>
				</div>
				<div class="meta">
					<ul>
						<li class="updates"><?php echo sc_get_user_updates(bp_get_member_user_id()); ?></li>
						<li class="view"><a href="<?php bp_member_permalink(); ?>">Visit Profile</a></li>
					</ul>
				</div>
			</div>
		</li>

	<?php endwhile; ?>

	</ul>

	<?php do_action('bp_after_directory_members_list'); ?>

	<?php bp_member_hidden_fields(); ?>

	<div id="pag-bottom" class="bp-pagination">
		<div class="pag-count" id="member-dir-count-bottom"><?php bp_members_pagination_count(); ?></div>
		<div class="pag-links" id="member-dir-pag-bottom"><?php bp_members_pagination_links(); ?></div>
	</div>

<?php else: ?>

	<div id="message" class="info">
		<p><?php _e("Sorry, no members were found.", 'buddypress'); ?></p>
	</div>

<?php endif; ?>

<?php do_action('bp_after_members_loop'); ?>
