<form action="<?php bp_activity_post_form_action(); ?>" method="post" class="standard-form activity-post-form" id="whats-new-form" name="whats-new-form" role="complementary" enctype="multipart/form-data">
    <?php do_action('bp_before_activity_post_form'); ?>

    <div id="whats-new-container">

        <div id="whats-new-avatar">
            <a href="<?php echo bp_loggedin_user_domain(); ?>">
                <?php bp_loggedin_user_avatar( 'width=50&height=50'); ?>
            </a>
        </div>

        <div id="whats-new-content">
            <div id="whats-new-textarea">
                <label for="whats-new" class="bp-screen-reader-text"><?php _e('Update', 'buddypress'); ?></label>
                <textarea class="bp-suggestions" 
                <?php if(bp_is_group()) : ?>
                    placeholder="<?php printf(__("What's new in %s, %s?", 'buddypress'), bp_get_group_name(), bp_get_user_firstname(bp_get_loggedin_user_fullname())); ?>"
                <?php else : ?>
                    placeholder="<?php printf(__("What's new, %s?", 'buddypress'), bp_get_user_firstname(bp_get_loggedin_user_fullname())); ?>"
                <?php endif; ?>
                 name="whats-new" id="whats-new" cols="50" rows="10"<?php if(bp_is_group()) : ?> data-suggestions-group-id="<?php echo esc_attr((int) bp_get_current_group_id()); ?>" <?php endif; ?>><?php if(isset($_GET['r'])) : ?>@<?php echo esc_textarea($_GET['r']); ?> <?php endif; ?></textarea>
            </div><!-- TEXTAREA -->

            <div id="whats-new-options">

                <div id="whats-new-submit">
                    <button type="submit" name="aw-whats-new-submit" id="aw-whats-new-submit"><?php esc_attr_e('Post Update', 'buddypress'); ?></button>
                </div><!-- SUBMIT -->

                <?php if(bp_is_active('groups') && !bp_is_my_profile() && !bp_is_group()) : ?>

                    <input type="hidden" id="whats-new-post-object" name="whats-new-post-object" value="groups" />

                <?php elseif(bp_is_group_activity()) : ?>

                    <div class="posting-in"><p><strong><?php bp_group_name(); ?></strong></p></div>

                    <input type="hidden" id="whats-new-post-object" name="whats-new-post-object" value="groups" />
                    <input type="hidden" id="whats-new-post-in" name="whats-new-post-in" value="<?php bp_group_id(); ?>" />

                <?php endif; ?>

                <?php if(bp_is_active('groups') && !bp_is_my_profile() && !bp_is_group()) : ?>
                <div id="whats-new-post-in-box">
                    <select id="whats-new-post-in" name="whats-new-post-in">
                        <option selected="selected" value="0"><?php _e('Post in: My Profile', 'buddypress'); ?></option>
                        <?php if(bp_has_groups('user_id=' . bp_loggedin_user_id() . '&type=alphabetical&max=100&per_page=100&populate_extras=0&update_meta_cache=0')) : ?>
                            <?php while(bp_groups()) : bp_the_group(); ?>
                                <option value="<?php bp_group_id(); ?>"><?php bp_group_name(); ?></option>
                            <?php endwhile; ?>
                        <?php endif; ?>
                    </select>
                </div><!-- POST IN -->
                <?php endif; ?>

                <?php do_action('bp_activity_post_form_options'); ?>

            </div><!-- WHATS NEW OPTIONS -->
        </div><!-- WHATS NEW CONTENT -->

    </div><!-- CONTAINER -->

    <?php wp_nonce_field('post_update', '_wpnonce_post_update'); ?>
    <?php do_action('bp_after_activity_post_form'); ?>
</form>