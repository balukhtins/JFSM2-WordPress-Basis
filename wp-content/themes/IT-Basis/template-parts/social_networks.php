<?php
if(get_option('devit_api_settings')) $options = get_option('devit_api_settings');
$default = [get_template_directory_uri() . '/assets/images/twitter-logo-button.png',
            get_template_directory_uri() . '/assets/images/linkedin-button.png',
            get_stylesheet_directory_uri() . '/assets/images/facebook-logo-button.png',
            get_stylesheet_directory_uri() . '/assets/images/instagram.png'];
?>
<?php for($i=1;$i<5;$i++){
    $src = ($options['devit_api_social_networks_icon_field_' . $i]) ? $options['devit_api_social_networks_icon_field_' . $i] : $default[$i-1];
    $href = $options['devit_api_social_networks_link_field_' . $i];
    echo '<a href="' . $href . '"><img src="' . ($src)  .'" class="image wp-image-47  attachment-full size-full" alt="" loading="lazy" style="max-width: 100%; height: auto;" width="40" height="42"></a>';
}?>

