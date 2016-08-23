<?php
global $bp, $wpdb;
$user_id = $bp->displayed_user->id;
$total_rows = count($wpdb->get_results("SELECT DISTINCT object_id FROM wp_bp_xprofile_meta")) ? : 1;
$total_completed = count($wpdb->get_results("SELECT DISTINCT field_id FROM wp_bp_xprofile_data WHERE user_id = $user_id")) - 1 ? : 1;
$percentage = number_format($total_completed / $total_rows * 100, 0);

$total_activity = count($wpdb->get_results("SELECT user_id FROM wp_bp_activity WHERE user_id = $user_id AND is_spam = 0 AND type != 'new_member'"));
# Maybe update DOM count via jQuery if an item is deleted whilst on user profile

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
						<li><a href="<?php bp_displayed_user_link(); ?>profile"><?php echo $percentage; ?>% complete profile</a></li>
						<li><a href="<?php bp_displayed_user_link(); ?>"><?php echo $total_activity; ?> update<?php if($total_activity > 1) : echo 's'; endif; ?></a></li>
						<li><a href="<?php bp_displayed_user_link(); ?>friends"><?php echo friends_get_total_friend_count(); if(friends_get_total_friend_count() === 0 || friends_get_total_friend_count() > 1) : echo ' Friends'; else : echo ' Friend'; endif; ?></a></li>
						<li><a href="<?php bp_displayed_user_link(); ?>groups"><?php echo groups_get_total_group_count(); if(groups_get_total_group_count() === 0 || groups_get_total_group_count() > 1) : echo ' Groups'; else : echo ' Group'; endif; ?></a></li>
					</ul>
					<?php bp_add_friend_button(); ?>
				</div>
			</div>
		</div>

		<?php do_action('bp_before_member_header_meta'); ?>		

		<div class="info-contain">
			<ul class="info">
				<li><a href="<?php bp_displayed_user_link(); ?>profile"><?php echo $percentage; ?>% complete profile</a></li>
				<li><a href="<?php bp_displayed_user_link(); ?>"><?php echo $total_activity; ?> update<?php if($total_activity > 1) : echo 's'; endif; ?></a></li>
				<li><a href="<?php bp_displayed_user_link(); ?>friends"><?php echo friends_get_total_friend_count(); if(friends_get_total_friend_count() === 0 || friends_get_total_friend_count() > 1) : echo ' Friends'; else : echo ' Friend'; endif; ?></a></li>
				<li><a href="<?php bp_displayed_user_link(); ?>groups"><?php echo groups_get_total_group_count(); if(groups_get_total_group_count() === 0 || groups_get_total_group_count() > 1) : echo ' Groups'; else : echo ' Group'; endif; ?></a></li>
			</ul>
		</div>

		<?php do_action('bp_profile_header_meta'); ?>

	</div><!-- DETAILS -->

	<?php do_action('bp_after_member_header'); ?>

</div><!-- SECTIoN HEADER -->