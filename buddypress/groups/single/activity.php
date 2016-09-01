<?php if(is_user_logged_in() && bp_group_is_member()) : ?>

    <?php bp_get_template_part('activity/group-post-form') ?>

<?php endif; ?>

<?php do_action('bp_before_group_activity_content'); ?>

<div class="activity"><?php bp_get_template_part('activity/activity-loop') ?></div><!-- .activity -->

<?php do_action('bp_after_group_activity_content'); ?>