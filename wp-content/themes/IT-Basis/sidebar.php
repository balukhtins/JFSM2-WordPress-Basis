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

            <?php if(!is_active_sidebar('sidebar-1')):?>
                <section id="nav_menu-2" class="widget widget_nav_menu"><p class="widget-title">Courses</p><div class="menu-courses-container"><ul id="menu-courses" class="menu"><li id="menu-item-34" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-34"><a href="#">Project management</a></li>
                            <li id="menu-item-35" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-35"><a href="#">Android development</a></li>
                            <li id="menu-item-36" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-36"><a href="#">Online marketing</a></li>
                            <li id="menu-item-37" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-37"><a href="#">Front-end developer</a></li>
                        </ul></div></section>

                <section id="nav_menu-3" class="widget widget_nav_menu"><p class="widget-title">Interesting</p><div class="menu-interesting-container"><ul id="menu-interesting" class="menu"><li id="menu-item-38" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-38"><a href="#">Blog</a></li>
                            <li id="menu-item-39" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-39"><a href="#">Youtube</a></li>
                            <li id="menu-item-40" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-40"><a href="#">Team</a></li>
                            <li id="menu-item-41" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-41"><a href="#">Community</a></li>
                        </ul></div></section>
            <?php endif;
            //print_r(get_option( 'devit_api_settings' ));
            ?>




            <div class="col-md social">
                <p>Social networks</p>
                <?php get_template_part( 'template-parts/social_networks' );?>
            </div>
        </div>
    </div>
</aside><!-- #secondary -->
