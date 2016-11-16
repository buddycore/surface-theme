<div class="navigation-tabs neutral">
	<div class="item-list-tabs no-ajax" id="subnav" role="navigation">
		<ul>
			<?php bp_get_options_nav(); ?>
		</ul>
	</div><!-- .item-list-tabs -->
	<div class="item-list-tabs filter">
		<ul>
			<li id="activity-filter-select" class="last">
				<select id="activity-filter-by">
					<option value="-1"><?php _e('Show: Everything', 'buddypress'); ?></option>
					<?php bp_activity_show_filters(); ?>
					<?php do_action('bp_member_activity_filter_options'); ?>
				</select>
			</li>
		</ul>
	</div>
</div><!-- NAVIGATION TABS -->

<div class="navigation-tabs-responsive">
	<div class="item-list-tabs no-ajax" id="subnav" role="navigation">
		<ul>
			<li><button class="filter-toggle"><span>Toggle Menu</span></button>
				<ul class="filternav">
					<?php bp_get_options_nav(); ?>
				</ul>
			</li>
		</ul>
	</div><!-- ITEM LIST TABS -->

	<div class="item-list-tabs filter" id="subnav" role="navigation">
		<ul>
			<li id="activity-filter-select" class="last">
				<select id="activity-filter-by">
					<option value="-1"><?php _e('Show: Everything', 'buddypress'); ?></option>
					<?php bp_activity_show_filters(); ?>
					<?php do_action('bp_member_activity_filter_options'); ?>
				</select>
			</li>
		</ul>
	</div><!-- ITEM LIST TABS -->	
</div><!-- RESPoNSIVE NAV -->

<?php do_action('bp_before_member_activity_post_form'); ?>

<?php if(is_user_logged_in() && bp_is_my_profile() && (!bp_current_action() || bp_is_current_action('just-me'))) : ?>

	<?php bp_get_template_part('activity/post-form'); ?>

<?php endif; ?>

<?php do_action('bp_after_member_activity_post_form'); ?>

<?php do_action('bp_before_member_activity_content'); ?>

<div class="activity"><?php bp_get_template_part('activity/activity-loop') ?></div><!-- .activity -->

<?php do_action('bp_after_member_activity_content'); ?>
