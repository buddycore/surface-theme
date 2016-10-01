<?php get_sidebar(); ?>
<div class="main-col">
	<div id="buddypress">
		<?php do_action('template_notices'); ?>
		
		<?php
		if(bp_displayed_user_use_cover_image_header()) :
			bp_get_template_part('members/single/cover-image-header');
		else :
			bp_get_template_part('members/single/member-header');
		endif;
		?>

		<div class="activity no-ajax">
			<?php if(bp_has_activities('display_comments=threaded&show_hidden=true&include=' . bp_current_action())) : ?>

				<ul id="activity-stream" class="activity-list">
				<?php while(bp_activities()) : bp_the_activity(); ?>
					<?php bp_get_template_part('activity/entry'); ?>
				<?php endwhile; ?>
				</ul>

			<?php endif; ?>
		</div><!-- ACTIVITY -->
	</div><!-- BUDDYPRESS -->
</div><!-- MAIN COL -->
