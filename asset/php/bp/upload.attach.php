<?php
/**
 * Functions
 */

// Exit if accessed directly
defined( 'ABSPATH' ) or die;

/**
 * Add the file input and action to the messages compose screen. 
 */ 
function custom_file_for_messages() {
    ?>
    <label for="messages-custom-file"><?php _e( 'Custom Attachment', 'custom-domain' ); ?></label>
    <p id="messages-custom-file">
        <?php
        /**
         * The name attribute of the file type input must be set with the
         * $file_input parameter of the Custom_Attachment class.
         */ 
        ?>
        <input type="file" name="custom_file" id="custom-file" />
        <?php
        /**
         * Create an input for the action, and set its value to the $action
         * parameter of the Custom_Attachment class.
         */ 
        ?>
        <input type="hidden" name="action" id="custom-action" value="custom_upload" />
    </p>
    <?php
}
add_action( 'bp_after_messages_compose_content', 'custom_file_for_messages' );

/**
 * Handle file uploads
 */ 
function custom_file_for_messages_upload_file() {
    if ( ! bp_is_messages_compose_screen() ) {
        return;
    }

    $redirect = trailingslashit( bp_loggedin_user_domain() . bp_get_messages_slug() . '/compose' );

    if ( isset( $_POST['action'] ) && 'custom_upload' === $_POST['action'] && ! empty( $_FILES['custom_file']['name'] ) ) {
        // Let's get ready to upload a new custom attachment
        $attachment = new Custom_Attachment();

        /**
         * Everything is in place to upload the file
         * @see Custom_Attachment->__construct()
         * 
         * - custom errors > eg : only upload file containing custom in their name,
         * - max upload file > eg: 512000,
         * - location in /wp-content/uploads > eg: '/wp-content/uploads/custom', 
         * - allowed mime types > eg: array( 'png', 'jpg' )
         */ 
        $file = $attachment->upload( $_FILES );
        
        // Display the error and do not send the message
        if ( ! empty( $file['error'] ) ) {
            bp_core_add_message( $file['error'], 'error' );
            bp_core_redirect( $redirect );

        // The file was successfully uploaded!!
        } else {
            /**
             * Globalize the file array
             * 
             * the file array returned is array(
             *  'file' => 'path_to_the_file',
             *  'url'  => 'url_to_the_file',
             *  'type' => 'file mime type'
             * )
             */ 
            buddypress()->messages->attachment = $file;
            
            // Hook to 'messages_message_sent' to add a new message meta containing the file data
            add_action( 'messages_message_sent', 'custom_file_for_messages_attach_file', 10, 1 );

            // Hook to 'messages_screen_compose' in case the message was not sent to delete the file
            add_action( 'messages_screen_compose', 'custom_file_for_messages_delete_file' );
        }
    }
}
add_action( 'bp_actions', 'custom_file_for_messages_upload_file', 9 );

/**
 * Don't keep the uploaded file if sending the message failed
 */ 
function custom_file_for_messages_delete_file() {
    $bp = buddypress();

    // The message was not sent due to an error, simply remove the file
    if ( isset( $bp->messages->attachment['file'] ) && file_exists( $bp->messages->attachment['file'] ) ) {
        unlink( $bp->messages->attachment['file'] );
    }
}

/**
 * If the message was successfully sent, save the attached file data in a messages meta.
 */ 
function custom_file_for_messages_attach_file( $message = null ) {
    $bp = buddypress();

    // Save a new message meta
    if ( ! empty( $message->id ) && ! empty( $bp->messages->attachment['file'] ) && file_exists( $bp->messages->attachment['file'] ) ) {
        bp_messages_update_meta( $message->id, '_custom_file_attached_file', $bp->messages->attachment );

        // Reset the global to avoid custom_file_for_messages_delete_file() to delete it..
        unset( $bp->messages->attachment );
    }
}

/**
 * Simply output the link of the attached file if any.
 */
function custom_file_for_messages_display() {
    $message_id = (int) bp_get_the_thread_message_id();

    $file = bp_messages_get_meta( $message_id, '_custom_file_attached_file' );

    if ( ! empty( $file['url'] ) ) {
        ?>
        <p>
            <a href="<?php echo esc_url( $file['url'] ); ?>" title="<?php esc_attr_e( 'Get attached file', 'custom-domain' ); ?>">
                <?php esc_html_e( 'Get attached file', 'custom-domain' ); ?>
            </a>
        </p>
        <?php
    }
}
add_action( 'bp_after_message_content', 'custom_file_for_messages_display' );