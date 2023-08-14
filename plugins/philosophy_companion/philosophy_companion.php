<?php
/*
 Plugin Name: Philosophy_companion
Plugin URI:
Description: Companion plugin for the  philosophy theme
Version: 1.0
Author: Rifat
Author URI:
License: GPLv2 or later
Text Domain: philosophy_companion
 */

function Philosophy_companion_register_my_cpts_book() {

    /**
     * Post Type: Books.
     */

    $labels = [
        "name" => esc_html__( "Books", "philosophy" ),
        "singular_name" => esc_html__( "Book", "philosophy" ),
        "featured_image" => esc_html__( "Cover Inage", "philosophy" ),
    ];

    $args = [
        "label" => esc_html__( "Books", "philosophy" ),
        "labels" => $labels,
        "description" => "",
        "public" => true,
        "publicly_queryable" => true,
        "show_ui" => true,
        "show_in_rest" => true,
        "rest_base" => "",
        "rest_controller_class" => "WP_REST_Posts_Controller",
        "rest_namespace" => "wp/v2",
        "has_archive" => false,
        "show_in_menu" => true,
        "show_in_nav_menus" => true,
        "delete_with_user" => false,
        "exclude_from_search" => false,
        "capability_type" => "post",
        "map_meta_cap" => true,
        "hierarchical" => false,
        "can_export" => false,
        "rewrite" => [ "slug" => "book", "with_front" => true ],
        "query_var" => true,
        "menu_icon" => "dashicons-hammer",
        "supports" => [ "title", "editor", "thumbnail", "excerpt" ],
        "show_in_graphql" => false,
    ];

    register_post_type( "book", $args );
}

add_action( 'init', 'Philosophy_companion_register_my_cpts_book' );


