<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package DevIT-Basis
 */

?>

	<footer id="colophon" class="site-footer">

        <div class="col-md-7 footer-menu">
            <nav id="site-navigation" class="navbar navbar-expand-lg navbar-light">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse " id="navbarSupportedContent">
                    <?php
                    wp_nav_menu(
                        array(
                            'theme_location' => 'menu-footer',
                            'menu_id'        => 'foter-menu-1',
                            'container' => false,
                            'menu_class' => 'navbar-nav mr-auto',
                            'walker' => new Header_Menu,
                        )
                    );
                    ?>

                    <?php if(!is_nav_menu('Footer Menu-1')):?>
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
        <hr>

       <?php get_sidebar(); ?>

        <hr>

        <div class="container policy">
            <div class="row">
                <div class="col-md-2 offset-md-8">
                    Terms of Service
                </div>
                <div class="col-md-2">
                    Privacy policy
                </div>
            </div>
        </div>



		<!--<div class="site-info">
			<a href="<?php /*echo esc_url( __( 'https://wordpress.org/', 'devit-basis' ) ); */?>">
				--><?php
				/* translators: %s: CMS name, i.e. WordPress. */
				/*printf( esc_html__( 'Proudly powered by %s', 'devit-basis' ), 'WordPress' );
				*/?><!--
			</a>
			<span class="sep"> | </span>
				--><?php
				/* translators: 1: Theme name, 2: Theme author. */
				/*printf( esc_html__( 'Theme: %1$s by %2$s.', 'devit-basis' ), 'devit-basis', 'Balukhtin' );
				*/?><!--
		</div>--><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
