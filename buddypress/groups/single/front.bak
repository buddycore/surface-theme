<div class="group-front">
    <div class="description">
        <div class="title">
            <h2><a href="<?php bp_group_permalink(); ?>"><?php bp_group_name(); ?></a></h2>
            <p class="activity"><strong><?php bp_group_type(); ?></strong> / <?php printf(__('active %s', 'buddypress'), bp_get_group_last_active()); ?></p>
        </div>
        <?php bp_group_description(); ?>
    </div>

    <div class="admins">
        <h3><?php _e('Group Admins', 'buddypress'); ?></h3>
        <?php bp_group_list_admins(); ?>
        <?php do_action('bp_after_group_menu_admins'); ?>
    </div>

    <?php if(bp_group_has_moderators()) : ?>
        <div class="mods">   
            <?php do_action('bp_before_group_menu_mods'); ?>
            <h3><?php _e('Group Mods' , 'buddypress'); ?></h3>
            <?php bp_group_list_mods(); ?>
            <?php do_action('bp_after_group_menu_mods'); ?>
        </div>
    <?php endif; ?>
</div>