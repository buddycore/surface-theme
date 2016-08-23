<?php if(post_password_required()) : return; endif; ?>

<div id="comments" class="comments-area">

    <?php if(have_comments()) : ?>

        <ol class="comment-list">
            <?php
            $args = array('style'       => 'ol',
                          'short_ping'  => true,
                          'avatar_size' => false);

            wp_list_comments($args);
            ?>          
        </ol>

        <?php the_comments_navigation(); ?>

    <?php endif; ?>

    <?php if(!comments_open() && get_comments_number() && post_type_supports(get_post_type(), 'comments')) : ?>
        
        <p class="message info"><?php _e('Comments are closed.'); ?></p>

    <?php endif; ?>

    <?php comment_form(); ?>

</div><!-- comments area -->