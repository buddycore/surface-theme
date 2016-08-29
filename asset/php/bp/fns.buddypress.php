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
 
add_action('bp_activity_add', 'sc_uploadcare_activity', 10, 1);
