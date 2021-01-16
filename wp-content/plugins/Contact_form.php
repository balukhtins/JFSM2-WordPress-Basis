<?php
/*
 * Plugin name: Contact Form
 * Description: Cтраница заявок пользователей
*/


/**
 * create_table devit_contact_form
 */
function devit_contact_form_create_table() {
    global $wpdb;

    require_once ABSPATH . 'wp-admin/includes/upgrade.php';

    $table_name = $wpdb->get_blog_prefix() . 'devit_contact_form';
    $charset_collate = "DEFAULT CHARACTER SET {$wpdb->charset} COLLATE {$wpdb->collate}";

    $sql = "CREATE TABLE {$table_name} (
	id  bigint(20) unsigned NOT NULL auto_increment,
	name varchar(255) NOT NULL default '',
	email varchar(100) NOT NULL UNIQUE default '',
	phone_1 bigint(30) NOT NULL UNIQUE,
	phone_2 bigint(30),
	age int(11) NOT NULL,
	photo varchar(255) default '',
	resume longtext NOT NULL,
	PRIMARY KEY  (id)
	)
	{$charset_collate};";

    if($wpdb->get_var("SHOW TABLES LIKE '$table_name'") != $table_name) dbDelta($sql);
}

register_activation_hook(__FILE__, 'devit_contact_form_create_table');


/**
 * Add page Contact Form
 */

$table_name = $wpdb->prefix . 'devit_contact_form';
//$devit_count = $wpdb->get_var( "SELECT COUNT(*) FROM {$table_name};" );

function devit_contact_form_pages(){
    add_menu_page('Contact Form', 'Contact Form', 'manage_options', 'devit_contact_form', 'devit_contact_form_options_page');
}

function devit_contact_form_options_page( ) {
    ?>

    <!--<form id="social-networks" action="options.php" method='post'>-->
    <h2>Запросы пользователей</h2>
    <?php
    /*settings_fields( 'devit_contact_form_settings' );*/
    do_settings_sections( 'devit_contact_form' );
    /*submit_button();*/
    ?>
    <!--</form>-->
    <?php
}

function devit_contact_form_settings_init( )
{
    register_setting('devit_contact_form_settings', 'devit_contact_form_settings');
    add_settings_section(
        'devit_contact_form_custom_section',
        __('Секция Запросов Пользователей', 'devit-basis'),
        'devit_contact_form_settings_section_callback',
        'devit_contact_form'
    );

    add_settings_field(
        'wpschool_api_text_field_0',
        __('Requests', 'devit-basis'),
        'devit_contact_form_field_0_render',
        'devit_contact_form',
        'devit_contact_form_custom_section'
    );
}

function devit_contact_form_settings_section_callback( ) {
    echo __( 'Здесь все запросы пользователей', 'devit-basis' );
}

function devit_contact_form_field_0_render( ) {
    //$options = get_option( 'devit_contact_form_settings' );
    global $wpdb;
    global $table_name;
    //global $devit_count;
    //$table_name = $wpdb->get_blog_prefix() . 'devit_contact_form';
    $res = $wpdb->get_results( "SELECT * FROM {$table_name}" );
    foreach($res as $result){
    ?>
        <a href="">
            <?php
            //print_r($res);
            print_r ($result->name)/*[0]->name*/;
            ?>
        </a>
        <hr>
        <?php
    }
        //$devit_count = $wpdb->get_var( "SELECT COUNT(*) FROM {$table_name};" );
        //echo $devit_count;
        ?>

    <?php
}

add_action('admin_menu', 'devit_contact_form_pages');
add_action( 'admin_init', 'devit_contact_form_settings_init' );

