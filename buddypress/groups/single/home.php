<?php get_sidebar(); ?>

<div class="main-col">

<div id="buddypress">

<?php do_action('template_notices'); ?>

<?php if(bp_has_groups()) : ?>

	<?php while (bp_groups()) : bp_the_group(); ?>

		<?php do_action('bp_before_group_home_content'); ?>

		<div id="item-header" role="complementary">
			<?php
			if(bp_group_use_cover_image_header()) :
				bp_get_template_part('groups/single/cover-image-header');
			else :
				bp_get_template_part('groups/single/group-header');
			endif;
			?>
		</div><!-- ITEM HEADER -->

		<div class="navigation-tabs">
			<div class="item-list-tabs no-ajax" id="object-nav" role="navigation">
				<ul>
					<?php bp_get_options_nav(); ?>
					<?php do_action('bp_group_options_nav'); ?>
				</ul>
			</div>
			<?php if(bp_is_group_activity()) : ?>
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
			<?php endif; ?>
		</div><!-- ITEM TABS -->

		<div id="item-body">

			<?php do_action('bp_before_group_body'); ?>

				<?php if(bp_is_group_home()) : ?>

					<?php if(bp_group_is_visible()) : ?>

						<?php bp_groups_front_template_part(); ?>

					<?php else : ?>

						<?php do_action('bp_before_group_status_message'); ?>

						<div id="message" class="info">
							<p><?php bp_group_status_message(); ?></p>
						</div>

						<?php do_action('bp_after_group_status_message'); ?>

					<?php endif; ?>

				<?php else : ?>
					
					<?php

					if(bp_is_group_admin_page()) : 

						bp_get_template_part('groups/single/admin');

					elseif(bp_is_group_activity()) : 

						bp_get_template_part('groups/single/activity');

					elseif(bp_is_group_members()) : 

						bp_get_template_part('groups/single/members');

					elseif(bp_is_group_invites()) : 

						bp_get_template_part('groups/single/send-invites');

					elseif(bp_is_group_forum()) : 

						bp_get_template_part('groups/single/forum');

					elseif(bp_is_group_membership_request() ) : 

						bp_get_template_part('groups/single/request-membership');

					else :

						bp_get_template_part('groups/single/plugins');

					endif;

					?>

				<?php endif; ?>

			<?php do_action('bp_after_group_body'); ?>

		</div><!-- ITEM BODY -->

		<?php do_action('bp_after_group_home_content'); ?>

	<?php endwhile; ?>

<?php endif; ?>

</div><!-- #buddypress -->

</div><!-- MAIN COL -->