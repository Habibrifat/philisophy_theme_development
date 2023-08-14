<?php
define('ATTACHMENTS_SETTINGS_SCREEN', false);
add_filter('attachments_default_instance', '__return_false');

function philosophy_attachments($attachments)
{
    $post_id = null;
    if (isset($_REQUEST['post'] ) || isset($_REQUEST['post_ID'])){
        $post_id = empty( $_REQUEST['post_ID']) ? $_REQUEST['post'] : $_REQUEST['post_ID'];
    }
    if ( !$post_id || get_post_format($post_id) != "gallery" ){
        return;
    }


    $fields = array(
        array(
            'name' => 'title',                         // unique field name
            'type' => 'text',                          // registered field type
            'label' => __('Title', 'philosophy'),    // label to display
//            'default' => 'title',                         // default value upon selection
        ),
    );
    $args = array(

        // title of the meta box (string)
        'label' => 'Gallery',

        // all post types to utilize (string|array)
        'post_type' => array('post', 'page'),

        // allowed file type(s) (array) (image|video|text|audio|application)
        'filetype' => array("image"),  // no filetype limit

        // include a note within the meta box (string)
        'note' => 'Attach Gallery files here!',

        // text for 'Attach' button in meta box (string)
        'button_text' => __('Attach Files', 'philosophy'),

        // fields array
        'fields' => $fields,

    );

    $attachments->register('gallery ', $args); // unique instance name

}

add_action('attachments_register', 'philosophy_attachments');
