<?php
/* to get total update counts by group id*/

function get_group_total_updates_count($group_id){

    global $wpdb;
 
    $total_updates = $wpdb->get_var( "SELECT COUNT(*) FROM wp_bp_activity 
                      WHERE component = 'groups' 
                      AND   type = 'activity_update'
                      AND   item_id = '$group_id' 
                                         ");
                                      
    return $total_updates;
}

function sc_get_user_updates($user_id) {

    global $wpdb;

    $total_activity = count($wpdb->get_results("SELECT user_id FROM wp_bp_activity WHERE user_id = $user_id AND is_spam = 0 AND type != 'new_member'"));

    $tx = $total_activity === 1 ? 'update' : 'updates';

    return $total_activity . ' ' . $tx;

}

function sc_get_profile_percent($user_id) {

    global $wpdb;

    $total_rows = count($wpdb->get_results("SELECT DISTINCT object_id FROM wp_bp_xprofile_meta")) ? : 1;
    $total_completed = count($wpdb->get_results("SELECT DISTINCT field_id FROM wp_bp_xprofile_data WHERE user_id = $user_id")) - 1 ? : 1;
    $percentage = number_format($total_completed / $total_rows * 100, 0);

    return $percentage . '&#37; complete profile';

}

function sc_get_group_belongs_to_count_tx() {

    $myGroupTotal = groups_get_user_groups();

    if(groups_total_groups_for_user() === 0 || groups_total_groups_for_user() > 1) :

        return groups_total_groups_for_user() . ' groups'; 

    else :

        return groups_total_groups_for_user() . ' group'; 
    
    endif;

}

function sc_get_group_belongs_to_count() {

    if(groups_total_groups_for_user() > 0) :

        return groups_total_groups_for_user(); 
    
    endif;

}

function sc_uploadcare_activity($activity) {

    // print_r($_FILES);

    // if($_POST['attachment']) :

    //     global $wpdb;

    //     $data = array(
    //         'activityId'            => $wpdb->insert_id,
    //         'activityUpload'        => $_POST['attachment']
    //     );
    //     $wpdb->insert('activityUploads', $data, array('%d', '%s'));

    // endif;

}

function sc_bp_message_status($msg_id){

    global $wpdb, $bp;

    if(!messages_is_user_sender($bp->loggedin_user->id, $msg_id) && is_user_logged_in()) :

        $msg_seen = $wpdb->get_results("SELECT * FROM wp_bp_messages_meta WHERE message_id = $msg_id");

        if($wpdb->num_rows === 0) :

            $wpdb->insert('wp_bp_messages_meta', array('message_id' => $msg_id, 'meta_key' => 'sc_is_seen', 'meta_value' => current_time('mysql', 1)), array('%d', '%s', '%s'));

        endif;

    endif;

    $msg_status = $wpdb->get_results("SELECT * FROM wp_bp_messages_meta WHERE message_id = $msg_id");

    if($wpdb->num_rows > 0) :

        echo '<div class="status"><strong>Seen:</strong> '.date('jS F', strtotime($msg_status[0]->meta_value)).'</div>';

    else :

        echo '<div class="status unread"><strong>Unread</strong></div>';

    endif;

}
 
add_action('bp_activity_add', 'sc_uploadcare_activity', 10, 1);
