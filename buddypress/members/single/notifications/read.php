<?php if(bp_has_notifications('per_page=5')) : ?>

	<?php bp_get_template_part('members/single/notifications/notifications-loop'); ?>

	<div id="pag-bottom" class="bp-pagination no-ajax">
		<div class="pag-count" id="notifications-count-bottom"><?php bp_notifications_pagination_count(); ?></div>
		<div class="pag-links" id="notifications-pag-bottom"><?php bp_notifications_pagination_links(); ?></div>
	</div><!-- PAGINATION -->

<?php else : ?>

	<?php bp_get_template_part('members/single/notifications/feedback-no-notifications'); ?>

<?php endif;
