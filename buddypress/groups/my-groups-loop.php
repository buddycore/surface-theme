<?php do_action('bp_before_groups_loop'); ?>

<?php if(bp_has_groups(bp_ajax_querystring('groups'))) : ?>

	<?php do_action('bp_before_directory_groups_list'); ?>

	<ul id="groups-list" class="item-list">

	<?php while(bp_groups()) : bp_the_group(); ?>

		<li <?php bp_group_class(); ?>>
			<div class="inner">
				<div class="table">
					<div class="table-cell avatar">
						<a href="<?php bp_group_permalink(); ?>"><?php bp_group_avatar('type=full&width=250&height=250'); ?></a>
					</div>
					<div class="table-cell detail">
						<h3><a href="<?php bp_group_permalink(); ?>"><?php bp_group_name(); ?></a></h3>
						<p><?php printf(__('active %s', 'buddypress'), bp_get_group_last_active()); ?></p>
						<?php do_action('bp_directory_members_item'); ?>
					</div>
				</div>
				<div class="meta">
					<ul>
						<li class="group-detail"><?php bp_group_type(); ?> / <?php bp_group_member_count(); ?></li>
						<li class="view"><a href="<?php bp_group_permalink(); ?>">Visit Group</a></li>
					</ul>
				</div>
			</div>
		</li>
		
	<?php endwhile; ?>

	</ul>

	<?php do_action('bp_after_directory_groups_list'); ?>

	<div id="pag-bottom" class="bp-pagination">
		<div class="pag-count" id="group-dir-count-bottom"><?php bp_groups_pagination_count(); ?></div>
		<div class="pag-links" id="group-dir-pag-bottom"><?php bp_groups_pagination_links(); ?></div>
	</div><!-- PAGINATION -->

<?php else: ?>

	<div id="message" class="info">
		<p><?php _e('There were no groups found.', 'buddypress'); ?></p>
	</div>

<?php endif; ?>

<?php do_action('bp_after_groups_loop'); ?>
