<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package DevIT-Basis
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<!--<header class="entry-header">
		<?php /*the_title( '<h1 class="entry-title">', '</h1>' ); */?>
	</header>--><!-- .entry-header -->

	<?php /*devit_basis_post_thumbnail(); */?>

	<div class="entry-content">
		<?php
		//the_content();?>


        <div class="container form-body">
            <div class="row justify-content-center">
                <!--<div class="col-md- ">-->
                    <form>
                        <div class="form-group">
                            <label for="fio">ФИО</label>
                            <input type="text" class="form-control" id="fio" aria-describedby="emailHelp">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">E-mail</label>
                            <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                        </div>
                        <div class="form-group row align-items-end phone">
                            <div class="col-md-9 mb-3 phone-left">
                            <label for="phone">Телефон</label>
                            <input type="text" class="form-control" id="phone">
                            </div>
                            <div class="col-md-3  mb-3 phone-right">
                            <button type="button" class="btn btn-plus">+</button>
                            </div>
                            <div class="col-md-9 phone-left">
                                <input type="text" class="form-control" id="phone-two">
                            </div>
                            <div class="col-md-3 phone-right">
                                <button type="button" class="btn btn-delite">Удалить</button>
                            </div>

                        </div>
                          <div class="form-group row">

                          </div>
                        <div class="form-group">
                            <label for="age">Возраст</label>
                            <input type="text" class="form-control" id="age">
                        </div>
                        <div class="photo">
                            <label for="photo">Фотокрафия</label>
                            <input type="file" class="form-control" id="photo">
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">Резюме</label>
                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                        </div>

                    </form>
                <!--</div>-->
            </div>
        </div>



		<?php /*wp_link_pages(
			array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'devit-basis' ),
				'after'  => '</div>',
			)
		);*/
		?>
	</div><!-- .entry-content -->

	<?php /*if ( get_edit_post_link() ) : */?><!--
		<footer class="entry-footer">
			--><?php
/*			edit_post_link(
				sprintf(
					wp_kses(*/
						/* translators: %s: Name of current post. Only visible to screen readers */
						/*__( 'Edit <span class="screen-reader-text">%s</span>', 'devit-basis' ),
						array(
							'span' => array(
								'class' => array(),
							),
						)
					),
					wp_kses_post( get_the_title() )
				),
				'<span class="edit-link">',
				'</span>'
			);
			*/?><!--
		</footer><!-- .entry-footer -->
	<?php /*endif; */?>
</article><!-- #post-<?php the_ID(); ?> -->
