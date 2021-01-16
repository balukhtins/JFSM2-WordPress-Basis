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
        <div class="row header-row <!--align-items-center--> justify-content-sm-between">

        <div class="<!--offset-md-1--> col-md-3 col-7 guidance-title order-sm-1 order-1 col-4 col-lg-2">
            <?php
            if (has_custom_logo()) : the_custom_logo();
                else:?>
                <h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?><span><img src="<?php echo get_template_directory_uri()?>/assets/images/Rectangle 898.png"</span></a></h1>
            <?php endif;?>
         </div>


        <div class="col-md-6 col-5 order-md-2 order-3 col-lg-8">
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

                <?php if(!is_nav_menu('Header Menu')):?>
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item active">
                            <a class="nav-link" href="<?php echo esc_url( home_url( '/' ) );?>">Home <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Courses</a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link" href="#">About</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link disabled" href="#">Video</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link disabled" href="#">Interesting</a>
                        </li>
                    </ul>
                <?php endif;?>

            </div>
		</nav>
        </div>

        <div class="col-md-3 col-sm col-4 btn-header <!--offset-md-1--> <!--offset-sm-2 offset-3--> order-md-3 order-2 col-lg-2">
            <div class="row justify-content-center justify-content-sm-end">
                <div class="col-9">
                    <button type="submit" class="btn btn-aut"  form="form-guidance">Authorization</button>
                </div>
            </div>
        </div>
        </div>
	</header>
