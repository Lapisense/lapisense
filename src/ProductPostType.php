<?php

namespace Lapisense;

class ProductPostType
{
    public function setup()
    {
        add_action('init', [$this, 'registerPostType']);
    }

    public function registerPostType()
    {
        $labels = array(
            'name'               => _x( 'Product', 'post type general name', 'lapisense' ),
            'singular_name'      => _x( 'Product', 'post type singular name', 'lapisense' ),
            'menu_name'          => _x( 'Products', 'admin menu', 'lapisense' ),
            'name_admin_bar'     => _x( 'Product', 'add new on admin bar', 'lapisense' ),
            'add_new'            => _x( 'Add New', 'Product', 'lapisense' ),
            'add_new_item'       => __( 'Add New Product', 'lapisense' ),
            'new_item'           => __( 'New Product', 'lapisense' ),
            'edit_item'          => __( 'Edit Product', 'lapisense' ),
            'view_item'          => __( 'View Product', 'lapisense' ),
            'all_items'          => __( 'All Products', 'lapisense' ),
            'search_items'       => __( 'Search Products', 'lapisense' ),
            'parent_item_colon'  => __( 'Parent Products:', 'lapisense' ),
            'not_found'          => __( 'No Products found.', 'lapisense' ),
            'not_found_in_trash' => __( 'No Products found in Trash.', 'lapisense' )
        );

        $args = array(
            'labels'             => $labels,
            'description'        => __( 'Description.', 'lapisense' ),
            'public'             => true,
            'publicly_queryable' => true,
            'show_ui'            => true,
            'show_in_menu'       => true,
            'query_var'          => true,
            'rewrite'            => array( 'slug' => 'products' ),
            'capability_type'    => 'post',
            'has_archive'        => true,
            'hierarchical'       => false,
            'menu_position'      => null,
            'supports'           => array( 'title', 'editor' )
        );

        register_post_type( 'lapisense_product', $args );
    }
}