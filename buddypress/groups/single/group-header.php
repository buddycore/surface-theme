<?php do_action('bp_before_member_header'); ?>
<div class="component-header group">

	<div id="item-header-avatar" class="table-cell">
		<?php if(!bp_disable_group_avatar_uploads()) : ?>
			<a href="<?php echo esc_url(bp_get_group_permalink()); ?>"><?php bp_group_avatar(); ?></a>
			<?php if(bp_group_is_admin()) : ?>
				<a href="<?php echo esc_url(bp_get_group_permalink()); ?>admin/group-avatar" class="change-avatar">
					<span class="table">
						<span class="table-cell">
							<span class="icon"></span>
							<span class="text">Change Group Avatar</span>
						</span>
					</span>
				</a>
			<?php endif; ?>
		<?php endif; ?>	
	</div><!-- #item-header-avatar -->

	<div id="item-header-content" class="table-cell">

		<div class="inner">

			<div class="title">
				<h2><a href="<?php bp_group_permalink(); ?>"><?php bp_group_name(); ?></a></h2>

				<p class="activity"><strong><?php bp_group_type(); ?></strong> / <?php printf(__('active %s', 'buddypress'), bp_get_group_last_active()); ?></p>
			</div>

			<?php do_action('bp_before_member_header_meta'); ?>

			<div id="item-meta">

				<ul class="info">
					<li><a href="#">XX Updates</a></li>
					<li><a href="#">XX Member</a></li>
				</ul>

				<?php if(!bp_group_is_admin()) : ?>
					<div id="item-buttons"><?php do_action('bp_group_header_actions'); ?>	</div><!-- #item-buttons -->
				<?php endif; ?>

				<?php do_action('bp_profile_header_meta'); ?>

			</div><!-- #item-meta -->

		</div><!-- INNER -->

	</div><!-- #item-header-content -->

	<?php do_action('bp_after_member_header'); ?>

</div>