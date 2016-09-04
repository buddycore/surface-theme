<?php
global $bp, $wpdb;
$user_id = $bp->displayed_user->id;


$cover_img = bp_attachments_get_attachment('url', array(
    'item_id' => bp_displayed_user_id()
));
?>

<?php do_action('bp_before_member_header'); ?>

<div class="section-header"<?php if(!empty($cover_img)) : echo ' style="background-image: url('.$cover_img.');"'; endif; ?>>

	<?php do_action('bp_before_member_header'); ?>

	<div class="details">

		<div class="table">

			<div class="table-cell avatar">
				<a href="<?php bp_displayed_user_link(); ?>"><?php bp_displayed_user_avatar('type=full&width=200'); ?></a>
			</div>

			<div class="table-cell info">
				<div class="inner">
					<div class="title">
						<?php if(bp_is_active('activity') && bp_activity_do_mentions()) : ?>
							<h2><a href="<?php bp_displayed_user_link(); ?>">@<?php bp_displayed_user_mentionname(); ?></a></h2>
						<?php endif; ?>
						<p><?php bp_last_activity(bp_displayed_user_id()); ?></p>
					</div>

					<ul class="info">
					<?php if(bp_is_active('xprofile')) : ?>
						<li><a href="<?php bp_displayed_user_link(); ?>profile"><?php echo sc_get_profile_percent($user_id); ?></a></li>
					<?php endif; ?>
					<?php if(bp_is_active('activity')) : ?>
						<li><a href="<?php bp_displayed_user_link(); ?>"><?php echo sc_get_user_updates($user_id); ?></a></li>
					<?php endif; ?>
					<?php if(bp_is_active('friends')) : ?>
						<li><a href="<?php bp_displayed_user_link(); ?>friends"><?php echo friends_get_total_friend_count(); if(friends_get_total_friend_count() === 0 || friends_get_total_friend_count() > 1) : echo ' Friends'; else : echo ' Friend'; endif; ?></a></li>
					<?php endif; ?>
					<?php if(bp_is_active('groups')) : ?>
						<li><a href="<?php bp_displayed_user_link(); ?>groups"><?php echo groups_get_total_group_count(); if(groups_get_total_group_count() === 0 || groups_get_total_group_count() > 1) : echo ' Groups'; else : echo ' Group'; endif; ?></a></li>
					<?php endif; ?>
					</ul>
					<div class="profile-links">
						<?php if(bp_is_active('friends')) : ?>
							<?php bp_add_friend_button(); ?>
						<?php endif; ?>
						<?php if(bp_is_active('messages')) : ?>
							<div class="generic-button send-message"><a href="<?php bp_loggedin_user_link(); ?>messages/compose/?to=<?php bp_displayed_user_mentionname(); ?>">Send Message</a></div>
						<?php endif; ?>
					</div>
				</div>
			</div>
		</div>

		<?php do_action('bp_before_member_header_meta'); ?>		

		<div class="info-contain">
			<ul class="info">
				<?php if(bp_is_active('xprofile')) : ?>
					<li><a href="<?php bp_displayed_user_link(); ?>profile"><?php echo sc_get_profile_percent($user_id); ?></a></li>
				<?php endif; ?>
				<?php if(bp_is_active('activity')) : ?>
					<li><a href="<?php bp_displayed_user_link(); ?>"><?php echo sc_get_user_updates($user_id); ?></a></li>
				<?php endif; ?>
				<?php if(bp_is_active('friends')) : ?>
					<li><a href="<?php bp_displayed_user_link(); ?>friends"><?php echo friends_get_total_friend_count(); if(friends_get_total_friend_count() === 0 || friends_get_total_friend_count() > 1) : echo ' Friends'; else : echo ' Friend'; endif; ?></a></li>
				<?php endif; ?>
				<?php if(bp_is_active('groups')) : ?>
					<li><a href="<?php bp_displayed_user_link(); ?>groups"><?php echo groups_get_total_group_count(); if(groups_get_total_group_count() === 0 || groups_get_total_group_count() > 1) : echo ' Groups'; else : echo ' Group'; endif; ?></a></li>
				<?php endif; ?>
			</ul>
		</div>

		<?php do_action('bp_profile_header_meta'); ?>

	</div><!-- DETAILS -->

	<?php do_action('bp_after_member_header'); ?>

</div><!-- SECTIoN HEADER -->