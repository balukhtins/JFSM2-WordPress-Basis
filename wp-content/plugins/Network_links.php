<?php
/*
 * Plugin name: Network Links
 * Description: Cтраница добавления ссылок на соцсети
*/

function include_myuploadscript() {
    wp_enqueue_script('jquery');
    //  скрипты и стили загрузчика изображений WordPress
    if ( ! did_action( 'wp_enqueue_media' ) ) {
        wp_enqueue_media();
    }

    wp_enqueue_script( 'devit-basis-main-js', get_template_directory_uri() . '/assets/js/network_links.js', array('jquery'), '', true );
}

add_action( 'admin_enqueue_scripts', 'include_myuploadscript' );

function devit_add_pages(){
    add_menu_page('Логотип', 'Add logo social networks', 8, 'devit_social_networks', 'devit_api_options_page'/*'devit_social_networks_function'*/);
}

function devit_api_settings_init( ) {
    register_setting( 'devit_api_settings', 'devit_api_settings' );

    add_settings_section(
        'devit_api_social_networks_section',
        __( '', 'devit-basis' ),
        'devit_api_settings_section_callback',
        'devit_social_networks'
    );

      for ($i=1; $i<5; $i++){
        add_settings_field(
            'devit_api_social_networks_icon_field_'.$i,
            __( 'Иконка соцсети-'.$i, 'devit-basis' ),
            'devit_api_icon_field_'.$i.'_render',
            'devit_social_networks',
            'devit_api_social_networks_section'
        );

        add_settings_field(
            'devit_api_social_networks_link_field_'.$i,
            __( 'Ссылка на соцсеть-'.$i, 'devit-basis' ),
            'devit_api_text_field_'.$i.'_render',
            'devit_social_networks',
            'devit_api_social_networks_section'
        );
    }
}

function devit_api_icon_field_1_render( ) {
    $options = get_option( 'devit_api_settings' );

    if( function_exists( 'true_image_uploader_field' ) ) {
        true_image_uploader_field('devit_api_settings[devit_api_social_networks_icon_field_1]', $options['devit_api_social_networks_icon_field_1'], get_stylesheet_directory_uri() . '/assets/images/twitter-logo-button.png');
    }
    ?>
    <?php
}

function devit_api_text_field_1_render( ) {
    $options = get_option( 'devit_api_settings' );
    ?>
    <input type='text' name='devit_api_settings[devit_api_social_networks_link_field_1]' value='<?php if($options['devit_api_social_networks_link_field_1']) {
        echo $options['devit_api_social_networks_link_field_1'];
    }
    else echo '#'; ?>'>
    <hr>
    <?php
}

function devit_api_icon_field_2_render( ) {
    $options = get_option( 'devit_api_settings' );

    if( function_exists( 'true_image_uploader_field' ) ) {
        true_image_uploader_field('devit_api_settings[devit_api_social_networks_icon_field_2]', $options['devit_api_social_networks_icon_field_2'], get_stylesheet_directory_uri() . '/assets/images/linkedin-button.png');
    }
    ?>
    <?php
}

function devit_api_text_field_2_render( ) {
    $options = get_option( 'devit_api_settings' );
    ?>
    <input type='text' name='devit_api_settings[devit_api_social_networks_link_field_2]' value="<?php if($options['devit_api_social_networks_link_field_2']) {
        echo $options['devit_api_social_networks_link_field_2'];
    }
    else echo '#'; ?>">
    <hr>
    <?php
}

function devit_api_icon_field_3_render( ) {
    $options = get_option( 'devit_api_settings' );

    if( function_exists( 'true_image_uploader_field' ) ) {
        true_image_uploader_field('devit_api_settings[devit_api_social_networks_icon_field_3]', $options['devit_api_social_networks_icon_field_3'], get_stylesheet_directory_uri() . '/assets/images/facebook-logo-button.png');
    }
    ?>
    <?php
}

function devit_api_text_field_3_render( ) {
    $options = get_option( 'devit_api_settings' );
    ?>
    <input type='text' name='devit_api_settings[devit_api_social_networks_link_field_3]' value='<?php if($options['devit_api_social_networks_link_field_3']) {
        echo $options['devit_api_social_networks_link_field_3'];
    }
    else echo '#'; ?>'>
    <hr>
    <?php
}

function devit_api_icon_field_4_render( ) {
    $options = get_option( 'devit_api_settings' );

    if( function_exists( 'true_image_uploader_field' ) ) {
        true_image_uploader_field('devit_api_settings[devit_api_social_networks_icon_field_4]', $options['devit_api_social_networks_icon_field_4'], get_stylesheet_directory_uri() . '/assets/images/instagram.png');
    }
    ?>
    <?php
}

function devit_api_text_field_4_render( ) {
    $options = get_option( 'devit_api_settings' );
    ?>
    <input type='text' name='devit_api_settings[devit_api_social_networks_link_field_4]' value='<?php if($options['devit_api_social_networks_link_field_4']) {
        echo $options['devit_api_social_networks_link_field_4'];
    }
    else echo '#'; ?>'>
    <hr>
    <?php
}



function devit_api_settings_section_callback( ) {
    echo __( 'Описание для секции настроек', 'devit-basis' );
}

function devit_api_options_page( ) {
    ?>

    <form id="social-networks" action="options.php" method='post'>
        <h2>Cтраница соцсетей</h2>
        <?php
        settings_fields( 'devit_api_settings' );
        do_settings_sections( 'devit_social_networks' );
        submit_button();
        ?>
    </form>
    <?php
}

function true_image_uploader_field( $name, $value = '', $default = '', $w = 40, $h = 42) {

    if( $value ) {
        $src = $value;
    } else {
        $src = $default;
    }
    echo '
	 	
	<div>
	   
		<img id="' . $name .'" data-src="' . $default . '" src="' . $src . '" width="' . $w . 'px" height="' . $h . 'px" />
	    <div>
			
			<button type="submit" class="upload_image_button button">Загрузить</button>
			<button type="submit" class="remove_image_button button">×</button>
		</div>
		 <input type="hidden" name="'. $name .'" value=' . $value . '>
	</div>
	
    <br />
	';
}

add_action('admin_menu', 'devit_add_pages');
add_action( 'admin_init', 'devit_api_settings_init' );

