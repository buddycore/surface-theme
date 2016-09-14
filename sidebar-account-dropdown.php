<ul>
    <li class="title">Your Account</li>
    <?php if(bp_is_active('activity')) : ?>
    <?php 
    global $bp, $wpdb;
    $user_id = $bp->displayed_user->id; 
    $loggedin_user_id = $bp->loggedin_user->id; 
    $total_activity = count($wpdb->get_results("SELECT user_id FROM wp_bp_activity WHERE user_id = $user_id AND is_spam = 0 AND type != 'new_member'")); 
    ?>
    <li class="nv-activity"><a href="<?php echo bp_loggedin_user_domain(); ?>">Activity <span><?php echo $total_activity; ?></span></a></li>
    <?php endif; ?>
    <?php if(bp_is_active('xprofile')) : ?>
    <li class="nv-profile"><a href="<?php echo bp_loggedin_user_domain(); ?>profile">Profile</a></li>
    <?php endif; ?>
    <?php if(class_exists('bbPress')) : ?>
    <li class="nv-forums"><a href="<?php echo bp_loggedin_user_domain(); ?>forums">Forums</a></li>
    <?php endif; ?>
    <?php if(bp_is_active('notifications')) : ?>
    <li class="nv-notifications"><a href="<?php echo bp_loggedin_user_domain(); ?>notifications">Notifications
        <?php if(bp_notifications_get_unread_notification_count(bp_loggedin_user_id())) : ?>
            <span><?php echo bp_notifications_get_unread_notification_count(bp_loggedin_user_id()); ?></span>
        <?php endif; ?>
        </a>
    </li>
    <?php endif; ?>
    <?php if(bp_is_active('messages')) : ?>
    <li class="nv-messages"><a href="<?php echo bp_loggedin_user_domain(); ?>messages">Messages <?php if(bp_get_total_unread_messages_count()) : ?> <span> <?php bp_total_unread_messages_count(); ?></span><?php endif; ?></a></li>
    <?php endif; ?>
    <?php if(bp_is_active('friends')) : ?>
    <li class="nv-friends"><a href="<?php echo bp_loggedin_user_domain(); ?>friends">Friends <span><?php echo friends_get_friend_count_for_user($user_id); ?></span></a></li>
    <?php endif; ?>
    <?php if(bp_is_active('groups')) : ?>
    <li class="nv-groups"><a href="<?php echo bp_loggedin_user_domain(); ?>groups">Groups <?php if(sc_get_group_belongs_to_count() > 0) : ?><span><?php echo sc_get_group_belongs_to_count(); ?></span><?php endif; ?></a></li>
    <?php endif; ?>
    <?php if(bp_is_active('blogs')) : ?>
    <li class="nv-blogs"><a href="<?php echo bp_loggedin_user_domain(); ?>blogs">Blogs</a></li>
    <?php endif; ?>
    <?php if(bp_is_active('settings')) : ?>
    <li class="nv-settings"><a href="<?php echo bp_loggedin_user_domain(); ?>settings">Settings</a></li>
    <?php endif; ?>
    <li class="nv-logout"><a href="<?php echo wp_logout_url(home_url('/')); ?>">Logout</a></li>
</ul>