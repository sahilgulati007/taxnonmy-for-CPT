<?php
function create_posttype() {
 
    register_post_type( 'properties',
    // CPT Options
        array(
            'labels' => array(
                'name' => __( 'Properties' ),
                'singular_name' => __( 'Property' )
            ),
            'public' => true,
            'has_archive' => false,
            'rewrite' => array('slug' => 'properties'),
            'show_in_rest' => true,
            'supports' => array('title', 'editor', 'thumbnail'),
            'taxonomies' => array('category', 'stays'),
        )
    );
    // register_taxonomy( 'properties_categories', 'properties',array(
    //     'rewrite'      => array( 'slug' => 'City' )
    // ) );, 'with_front'=> false
     register_taxonomy( 'stays', array('properties'), array(
        'hierarchical' => true, 
        'label' => 'Stays', 
        'singular_label' => 'Stay',
        'public'                     => true,
        'show_ui'                    => true,
        'show_admin_column'          => true,
        'show_in_nav_menus'          => true,
        'show_tagcloud'              => true,
        'show_in_rest' => true, 
        'rewrite' => array( 'slug' => 'stays' )
        )
    );

    register_taxonomy_for_object_type( 'categories', 'properties' ); // Better be safe than sorry
}
// Hooking up our function to theme setup
add_action( 'init', 'create_posttype' );
