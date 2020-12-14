<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package DevIT-Basis
 */

if ( ! is_active_sidebar( 'sidebar-1' ) ) {
	return;
}
?>

<aside id="secondary" class="widget-area">
    <div class="container">
        <div class="row">
	        <?php dynamic_sidebar( 'sidebar-1' ); ?>
            <div class="col-md social">
                <p>Social networks</p>
                <img src="http://test-dev-it/wp-content/uploads/2020/12/twitter-logo-button.png" class="image wp-image-47  attachment-full size-full" alt="" loading="lazy" style="max-width: 100%; height: auto;" width="40" height="42">
                <img src="http://test-dev-it/wp-content/uploads/2020/12/linkedin-button.png" class="image wp-image-48  attachment-full size-full" alt="" loading="lazy" style="max-width: 100%; height: auto;" width="40" height="40">
                <img src="http://test-dev-it/wp-content/uploads/2020/12/facebook-logo-button-1.png" class="image wp-image-49  attachment-full size-full" alt="" loading="lazy" style="max-width: 100%; height: auto;" width="40" height="40">
                <img src="http://test-dev-it/wp-content/uploads/2020/12/instagram-1.png" class="image wp-image-46  attachment-full size-full" alt="" loading="lazy" style="max-width: 100%; height: auto;" width="40" height="40">
            </div>
        </div>
    </div>
</aside><!-- #secondary -->
