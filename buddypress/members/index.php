<?php do_action('bp_before_directory_members_page'); ?>

<?php get_sidebar(); ?>

<div class="main-col">

	<div id="buddypress">

		<?php do_action('bp_before_directory_members'); ?>

		<?php do_action('bp_before_directory_members_content'); ?>

		<?php do_action('bp_before_directory_members_tabs'); ?>

		<form action="" method="post" id="members-directory-form" class="dir-form">

		<div class="navigation-tabs">

			<div class="item-list-tabs" role="navigation">
				<ul>
					<li class="selected" id="members-all"><a href="<?php bp_members_directory_permalink(); ?>"><?php printf(__('All Members %s', 'buddypress'), '<span>' . bp_get_total_member_count() . '</span>'); ?></a></li>

					<?php if(is_user_logged_in() && bp_is_active('friends') && bp_get_total_friend_count(bp_loggedin_user_id())) : ?>
						<li id="members-personal"><a href="<?php echo bp_loggedin_user_domain() . bp_get_friends_slug() . '/my-friends/'; ?>"><?php printf(__('My Friends %s', 'buddypress'), '<span>' . bp_get_total_friend_count(bp_loggedin_user_id()) . '</span>'); ?></a></li>
					<?php endif; ?>

					<?php do_action('bp_members_directory_member_types'); ?>
				</ul>
			</div><!-- .item-list-tabs -->

			<div class="item-list-tabs filter" id="subnav" role="navigation">
				<ul>
					<?php do_action('bp_members_directory_member_sub_types'); ?>
					<li id="members-order-select" class="last filter">
						<select id="members-order-by">
							<option value="active"><?php _e('Last Active', 'buddypress' ); ?></option>
							<option value="newest"><?php _e('Newest Registered', 'buddypress'); ?></option>
							<?php if(bp_is_active('xprofile')) : ?>
								<option value="alphabetical"><?php _e('Alphabetical', 'buddypress'); ?></option>
							<?php endif; ?>
							<?php do_action('bp_members_directory_order_options'); ?>
						</select>
					</li>
				</ul>
			</div>

		</div>

		<div class="navigation-tabs-responsive">
			<div class="item-list-tabs" id="subnav" role="navigation">
				<ul>
					<li><button class="filter-toggle"><span>Toggle Menu</span></button>
						<ul class="filternav">
							<li class="selected" id="members-all"><a href="<?php bp_members_directory_permalink(); ?>"><?php printf(__('All Members %s', 'buddypress'), '<span>' . bp_get_total_member_count() . '</span>'); ?></a></li>

							<?php if(is_user_logged_in() && bp_is_active('friends') && bp_get_total_friend_count(bp_loggedin_user_id())) : ?>
								<li id="members-personal"><a href="<?php echo bp_loggedin_user_domain() . bp_get_friends_slug() . '/my-friends/'; ?>"><?php printf(__('My Friends %s', 'buddypress'), '<span>' . bp_get_total_friend_count(bp_loggedin_user_id()) . '</span>'); ?></a></li>
							<?php endif; ?>

							<?php do_action('bp_members_directory_member_types'); ?>
						</ul>
					</li>
				</ul>
			</div><!-- ITEM LIST TABS -->

			<div class="item-list-tabs filter" id="subnav" role="navigation">
				<ul>
					<?php do_action('bp_members_directory_member_sub_types'); ?>
					<li id="members-order-select" class="last filter">
						<select id="members-order-by">
							<option value="active"><?php _e('Last Active', 'buddypress' ); ?></option>
							<option value="newest"><?php _e('Newest Registered', 'buddypress'); ?></option>
							<?php if(bp_is_active('xprofile')) : ?>
								<option value="alphabetical"><?php _e('Alphabetical', 'buddypress'); ?></option>
							<?php endif; ?>
							<?php do_action('bp_members_directory_order_options'); ?>
						</select>
					</li>
				</ul>
			</div><!-- ITEM LIST TABS -->	
		</div><!-- RESPoNSIVE NAV -->

			<div id="members-dir-list" class="members dir-list"><?php bp_get_template_part('members/members-loop'); ?></div><!-- #members-dir-list -->

			<?php do_action('bp_directory_members_content'); ?>

			<?php wp_nonce_field('directory_members', '_wpnonce-member-filter'); ?>

			<?php do_action('bp_after_directory_members_content'); ?>

		</form><!-- #members-directory-form -->

		<?php do_action('bp_after_directory_members'); ?>

	</div><!-- #buddypress -->

	<?php do_action('bp_after_directory_members_page'); ?>
</div><!-- MAIN - COL -->
