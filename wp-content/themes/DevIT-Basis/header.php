<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package DevIT-Basis
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>"/>
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">

	<header id="masthead" class="container-fluid">
        <div class="row align-items-center">
        <div class="col-md-3 guidance-title">
            <?php
			//the_custom_logo();

				?>
                <h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?><span><img src="<?php echo get_template_directory_uri()?>/assets/images/Rectangle 898.png"</span></a></h1>

            </div>


        <div class="col-md-7">
		<nav id="site-navigation" class="navbar navbar-expand-lg navbar-light">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse " id="navbarSupportedContent">
			<?php
			wp_nav_menu(
				array(
					'theme_location' => 'menu-header',
					'menu_id'        => 'primary-menu',
                    'container' => false,
                    'menu_class' => 'navbar-nav mr-auto',
                    'walker' => new Header_Menu,
				)
			);
			?>
            </div>
		</nav>
        </div>

        <div class="col btn-header">
            <button type="button" class="btn btn-aut">Authorization</button>
        </div>
        </div>
	</header>
