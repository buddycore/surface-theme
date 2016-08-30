<form action="<?php bp_activity_post_form_action(); ?>" method="post" class="standard-form activity-post-form" id="whats-new-form" name="whats-new-form" role="complementary" enctype="multipart/form-data">
    <?php do_action('bp_before_activity_post_form'); ?>

    <div id="whats-new-content">
        <div id="whats-new-textarea">
            <label for="whats-new" class="bp-screen-reader-text"><?php _e('Update', 'buddypress'); ?></label>
            <textarea class="bp-suggestions" name="whats-new" id="whats-new" cols="50" rows="10"<?php if(bp_is_group()) : ?> data-suggestions-group-id="<?php echo esc_attr((int) bp_get_current_group_id()); ?>" <?php endif; ?>><?php if(isset($_GET['r'])) : ?>@<?php echo esc_textarea($_GET['r']); ?> <?php endif; ?></textarea>
        </div><!-- TEXTAREA -->

        <div id="whats-new-options">

            <?php if(bp_is_active('groups') && !bp_is_my_profile() && !bp_is_group()) : ?>


                <input type="hidden" id="whats-new-post-object" name="whats-new-post-object" value="groups" />

            <?php elseif(bp_is_group_activity()) : ?>

                <input type="hidden" id="whats-new-post-object" name="whats-new-post-object" value="groups" />
                <input type="hidden" id="whats-new-post-in" name="whats-new-post-in" value="<?php bp_group_id(); ?>" />

            <?php endif; ?>

            <div id="whats-new-submit">
                <button type="submit" name="aw-whats-new-submit" id="aw-whats-new-submit"><?php esc_attr_e('Post Update', 'buddypress'); ?></button>
            </div><!-- SUBMIT -->

            <div class="posting-in"><p><strong><?php bp_group_name(); ?></strong></p></div>

            <?php do_action('bp_activity_post_form_options'); ?>

        </div><!-- WHATS NEW OPTIONS -->
    </div><!-- WHATS NEW CONTENT -->

    <?php wp_nonce_field('post_update', '_wpnonce_post_update'); ?>
    <?php do_action('bp_after_activity_post_form'); ?>
</form>