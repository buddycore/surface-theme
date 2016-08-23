<?php if(bp_group_has_members(bp_ajax_querystring('group_members'))) : ?>

	<?php do_action('bp_before_group_members_content'); ?>

	<?php do_action('bp_before_group_members_list'); ?>

	<ul id="members-list" class="item-list">

		<?php while(bp_group_members()) : bp_group_the_member(); ?>

			<li <?php bp_member_class(); ?>>
				<div class="inner">
					<div class="table">
						<div class="table-cell avatar">
							<a href="<?php bp_group_member_domain(); ?>"><?php bp_group_member_avatar_thumb(); ?></a>
						</div>
						<div class="table-cell detail">
							<?php do_action('bp_group_members_list_item'); ?>
							<h3><?php bp_group_member_link(); ?></a></h3>
							<p><?php bp_group_member_joined_since(); ?></p>
							<?php do_action('bp_directory_members_item'); ?>
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

	<?php do_action('bp_after_group_members_list'); ?>

	<div id="pag-bottom" class="bp-pagination">
		<div class="pag-count" id="member-count-bottom"><?php bp_members_pagination_count(); ?></div>
		<div class="pag-links" id="member-pag-bottom"><?php bp_members_pagination_links(); ?></div>
	</div><!-- PAGINATION -->

	<?php do_action('bp_after_group_members_content'); ?>

<?php else: ?>

	<div id="message" class="info">
		<p><?php _e('No members were found.', 'buddypress'); ?></p>
	</div>

<?php endif; ?>
