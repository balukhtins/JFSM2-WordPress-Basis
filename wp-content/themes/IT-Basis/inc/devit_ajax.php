<?php

/**
 * Handles my AJAX request.
 */
add_action( 'wp_enqueue_scripts', 'my_enqueue' );
function my_enqueue() {

    wp_enqueue_script('devit_ajax', get_template_directory_uri() . '/assets/js/devit_ajax.js', array('jquery'), '', true);

    $title_nonce = wp_create_nonce( 'devit-form' );

    wp_localize_script(
        'devit_ajax',
        'DevITAjax',
        array(
            'ajaxurl' => admin_url( 'admin-ajax.php' ),
            'nonce'    => $title_nonce,
        )
    );
}

add_action( 'wp_ajax_nopriv_divit_ajax_response', 'my_ajax_handler' );
add_action( 'wp_ajax_divit_ajax_response', 'my_ajax_handler' );
/**
 * Handles my AJAX request.
 */
function my_ajax_handler() {
    if( is_user_logged_in() )  wp_send_json_success( 'Вы уже авторизованы.');
    if (empty($_POST['nonce'])) wp_send_json_error('Ошибка');
    if (check_ajax_referer('devit-form', 'nonce', false)){
        if (!$_POST['name'] || !$_POST['email'] || !$_POST['age'] || !$_POST['phone-1'] || !$_POST['resume'] || !$_FILES['photo']) wp_send_json_error('Нужно заполнить все поля.');

        //Проверка на уникальность e-mail и телефона
        //global $wpdb;
        //$table_name = $wpdb->get_blog_prefix() . 'usermeta';
        //$res = $wpdb->get_results( "SELECT user_email FROM {$table_name} WHERE user_email='" . $_POST['email'] . "'" );
        //if ($res) wp_send_json_error('Такой e-mail уже есть.');
        //if ($wpdb->get_results( "SELECT phone_1 FROM {$table_name} WHERE phone_1='" . $_POST['phone-1'] . "'" )) wp_send_json_error('Такой телефон уже есть.');






        //Если загружена картинка сохраняем
        if( !($_FILES) ){
           // ограничим размер загружаемой картинки
            $sizedata = getimagesize( $_FILES['photo']['tmp_name'] );
            $max_size = 1000;
            if( $sizedata[0]/*width*/ > $max_size || $sizedata[1]/*height*/ > $max_size )
                wp_send_json_error( __('Картинка не может быть больше чем '. $max_size .'px в ширину или высоту...'));
            // обрабатываем загрузку файла
            require_once ABSPATH . 'wp-admin/includes/image.php';
            require_once ABSPATH . 'wp-admin/includes/file.php';
            require_once ABSPATH . 'wp-admin/includes/media.php';

            // фильтр допустимых типов файлов - разрешим только картинки
            add_filter( 'upload_mimes', function( $mimes ){
                return [
                    'jpg|jpeg|jpe' => 'image/jpeg',
                    'gif'          => 'image/gif',
                    'png'          => 'image/png',
                ];
            } );

            $attach_id = media_handle_upload( 'photo', 0 );

            // ошибка
            if( is_wp_error( $attach_id ) )
                wp_send_json_error('Ошибка загрузки файла "'. $_FILES['photo']['name'] .'"');
            else  /*URL-картинки*/
                $uploaded_imgs = wp_get_attachment_url( $attach_id );
        }

        // Сохраняем в базу данных
        /*if (!$wpdb->insert(
            $table_name,
            array(
                'name' => $_POST['name'],
                'email' => $_POST['email'],
                'phone_1' => $_POST['phone-1'],
                'phone_2' => $_POST['phone-2'],
                'age' => $_POST['age'],
                'photo' => $uploaded_imgs,
                'resume' => $_POST['resume'] )
        )) wp_send_json_error('Данные не отправлены, попробуйте еще раз.');
        wp_send_json_success( 'Данные сохранены.');*/

        $user_login = preg_replace('#@.+#', '', $_POST['email']);
        $user_password = wp_generate_password( 12 );
        $userdata = array(
            'user_login' => $user_login,
            'user_pass'  => $user_password,
            'user_email' => $_POST['email'],
            'first_name' => $_POST['name'],
            'description' => $_POST['resume'],
            'show_admin_bar_front' => 'false',
        );
        $user_id = wp_insert_user( $userdata );
        if (is_wp_error($user_id)) wp_send_json_error( $user_id->get_error_message() );
        add_user_meta( $user_id, 'phone_1', $_POST['phone-1']);
        if ($_POST['phone_2']) add_user_meta( $user_id, 'phone_2', $_POST['phone-2']);
        add_user_meta( $user_id, 'age', $_POST['age']);
        if ($_FILES['photo']) add_user_meta( $user_id, 'photo', $uploaded_imgs);

        //wp_safe_redirect( 'wp-login.php?checkemail=registered' );
        wp_send_json_success( $user_id);


    }
    else{
        wp_send_json_error('Эх!', 403);
    }
}
