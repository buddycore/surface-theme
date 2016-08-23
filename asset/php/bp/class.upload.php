<?php
/**
 * Custom Attachment class
 */

// Exit if accessed directly
defined( 'ABSPATH' ) or die;

if ( class_exists( 'BP_Attachment') ) :

class Custom_Attachment extends BP_Attachment {
    public function __construct() {
        // Set the Custom Attachment parameters
        parent::__construct( array(
            // The upload action used when uploading a file, $_POST['action'] must be set to this parameter
            'action'                => 'custom_upload',
            // The name attribute used in the file input. (required)
            'file_input'            => 'custom_file',
            // Max upload filesize, defaults to wp_max_upload_size()
            'original_max_filesize' => 512000,
            // List of Allowed extensions (optionnal), defaults to WordPress allowed mime types
            'allowed_mime_types'    => array( 'png', 'jpg' ),
            // Custom errors to use in the validate function (custom errors start at index 9, previous indexes are used by WordPress)
            'upload_error_strings'  => array(
                9  => __( 'Your file name must contain the term &#8220;custom&#8221;', 'custom-domain' ),
            ),
            // base upload dir for your custom component, eg: /wp-content/uploads/custom
            'base_dir'              => 'custom',
        ) );
    }

    /**
     * Optionnal, use it if you need to add some custom validation rules
     * in our example: the file must contain "custom" in its name
     */ 
    public function validate_upload( $file = array() ) {
        /** 
         * You can use the BP_Attachment->validate() function to check
         * for your max upload size
         */
        $file = parent::validate_upload( $file );

        // Bail if already an error
        if ( ! empty( $file['error'] ) ) {
            return $file;
        }

        // Add an error
        if ( false === strpos( $file['name'], 'custom' ) ) {
            $file['error'] = 9;
        }

        return $file;
    }

    /**
     * Optionnal, use it if you need to do some custom actions in the upload directory
     * eg: add a subdirectory for each user ids
     */ 
    public function upload_dir_filter( $upload_dir = array() ) {
        /** 
         * You can use the BP_Attachment->upload_dir_filter() function to get
         * your custom upload dir data
         * 
         * if you defined the $base_dir parameter in the construct method
         * 
         * you will get: array(
         *  'path'    => 'site_path/wp-content/uploads/custom',
         *  'url'     => 'site_url/wp-content/uploads/custom',
         *  'subdir'  => false,
         *  'basedir' => 'site_path/wp-content/uploads/custom',
         *  'baseurl' => 'site_url/wp-content/uploads/custom',
         *  'error'   => false
         * );
         */
        $upload_dir_data = parent::upload_dir_filter();

        if ( ! is_user_logged_in() ) {
            return $upload_dir_data;
        }

        /**
         * Or you can directly dynamically set your custom upload dir data
         * eg: /wp-content/uploads/custom/1
         */
        return array(
            'path'    => $this->upload_path . '/' . bp_loggedin_user_id(),
            'url'     => $this->url . '/' . bp_loggedin_user_id(),
            'subdir'  => '/' . bp_loggedin_user_id(),
            'basedir' => $this->upload_path . '/' . bp_loggedin_user_id(),
            'baseurl' => $this->url . '/' . bp_loggedin_user_id(),
            'error'   => false
        );
    }
}

endif;