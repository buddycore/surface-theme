<?php
$cover_img = bp_attachments_get_attachment('url', array(
    'object_dir' => 'groups',
    'item_id' => bp_get_group_id(),
));
if(empty($cover_img)) :
    $cover_img = get_bloginfo('template_directory').'/asset/img/default/group-cover.png';
endif;
?>


<div class="section-header"<?php if(!empty($cover_img)) : echo ' style="background-image: url('.$cover_img.');"'; endif; ?>>
<?php do_action('bp_before_group_header'); ?>

    <div class="details">

        <div class="table">

            <div class="table-cell avatar">
                <a href="<?php echo esc_url(bp_get_group_permalink()); ?>"><?php bp_group_avatar(); ?></a>
            </div>

            <div class="table-cell info">
                <div class="inner">
                    <div class="title">
                        <h2><a href="<?php bp_group_permalink(); ?>"><?php bp_group_name(); ?></a></h2>
                        <p><strong><?php bp_group_type(); ?></strong> / <?php printf(__('active %s', 'buddypress'), bp_get_group_last_active()); ?></p>
                    </div>

                    <ul class="info">
                        <li><a href="#"><?php echo get_group_total_updates_count(bp_get_group_id()); ?> Updates</a></li>   
                        <li><a href="#"><?php echo bp_get_group_total_members(); ?> Member</a></li>                     
                    </ul>                    

                    <?php if(!bp_group_is_admin()) : ?>
                        <?php do_action('bp_group_header_actions'); ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>


        <div class="info-contain">
            <ul class="info">
                <li><a href="#"><?php echo get_group_total_updates_count(bp_get_group_id()); ?> Updates</a></li>   
                <li><a href="#"><?php echo bp_get_group_total_members(); ?> Member</a></li>                     
            </ul> 
        </div>


    </div><!-- DETAILS -->

    <?php do_action('bp_after_group_header'); ?>
</div><!-- SECTIoN HEADER -->