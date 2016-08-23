<?php do_action('bp_before_member_header'); ?>
<div class="component-header">

	<div id="item-header-avatar" class="table-cell">
		<a href="<?php bp_displayed_user_link(); ?>"><?php bp_displayed_user_avatar('type=full&width=200'); ?></a>
		<?php if(bp_is_my_profile()) : ?>
			<a href="<?php echo bp_loggedin_user_domain(); ?>profile/change-avatar" class="change-avatar">
				<span class="table">
					<span class="table-cell">
						<span class="icon"></span>
						<span class="text">Change Profile Avatar</span>
					</span>
				</span>
			</a>
		<?php endif; ?>
	</div><!-- #item-header-avatar -->

	<div id="item-header-content" class="table-cell">

		<div class="inner">

			<div class="title">
				<?php if(bp_is_active('activity') && bp_activity_do_mentions()) : ?>
					<h2 class="user-nicename"><a href="<?php bp_displayed_user_link(); ?>">@<?php bp_displayed_user_mentionname(); ?></a></h2>
				<?php endif; ?>

				<p class="activity"><?php bp_last_activity(bp_displayed_user_id()); ?></p>
			</div>

			<?php do_action('bp_before_member_header_meta'); ?>

			<div id="item-meta">

				<?php
				global $bp, $wpdb;
				$user_id = $bp->displayed_user->id;
				$total_rows = count($wpdb->get_results("SELECT DISTINCT object_id FROM wp_bp_xprofile_meta"));
				$total_completed = count($wpdb->get_results("SELECT DISTINCT field_id FROM wp_bp_xprofile_data WHERE user_id = $user_id")) - 1; // Minus one for Base profile field.
				$percentage = number_format($total_completed / $total_rows * 100, 0);

				$total_activity = count($wpdb->get_results("SELECT user_id FROM wp_bp_activity WHERE user_id = $user_id AND is_spam = 0 AND type != 'new_member'"));
				# Maybe update DOM count via jQuery if an item is deleted whilst on user profile
				?>

				<ul class="info">
					<?php if(bp_is_active('xprofile')) : ?>
					<li><a href="<?php bp_displayed_user_link(); ?>profile"><?php echo $percentage; ?>% complete profile</a></li>
					<?php endif; ?>
					<?php if(bp_is_active('activity')) : ?>
					<li><a href="<?php bp_displayed_user_link(); ?>"><?php echo $total_activity; ?> update(s)</a></li>
					<?php endif; ?>	
					<?php if(bp_is_active('friends')) : ?>
					<li><a href="<?php bp_displayed_user_link(); ?>friends"><?php echo friends_get_total_friend_count(); ?> sss</a></li>
					<?php endif; ?>
					<?php if(bp_is_active('groups')) : ?>
					<li><a href="<?php bp_displayed_user_link(); ?>groups"><?php echo bp_get_group_total_for_member($user_id); ?> group(s)</a></li>
					<?php endif; ?>
					<?php if(class_exists('bbPress')) : ?>
					<li><a href="#">xx Forum Posts</a></li>
					<?php endif; ?>
					<?php if(bp_is_active('blogs')) : ?>
					<li><a href="<?php bp_displayed_user_link(); ?>blogs">xx Sites</a></li>
					<?php endif; ?>
				</ul>

				<?php if(!bp_is_my_profile() && is_user_logged_in()) : ?>
					<div id="item-buttons"><?php do_action('bp_member_header_actions'); ?></div><!-- #item-buttons -->
				<?php endif; ?>

				<?php do_action('bp_profile_header_meta'); ?>

			</div><!-- #item-meta -->

		</div><!-- INNER -->

	</div><!-- #item-header-content -->

	<?php do_action('bp_after_member_header'); ?>

</div>