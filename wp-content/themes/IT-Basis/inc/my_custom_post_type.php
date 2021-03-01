<?php
function my_custom_post_type(){
    register_post_type('devit_contact_form', array(
        'labels'             => array(
            'name'               => 'Mесседжи от пользователей', // Основное название типа записи
            'singular_name'      => 'месседж пользователя', // отдельное название записи типа Book
            'menu_name'          => 'devit_contact_form'

        ),
        'public'             => true,
        'exclude_from_search' => true,
        'show_in_nav_menus' => false,
        'publicly_queryable' => false,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => true,
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => null,
        'supports'           => array('title','editor','author','thumbnail','excerpt','comments')
    ) );


}
