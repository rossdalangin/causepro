<?php
/**
 * The template for displaying the Events archive
 *
 * @package CausePro
 */

get_header(); ?>

<div class="container">
	<div id="primary" class="content-area">
		<main id="main" class="site-main">

			<?php if ( have_posts() ) : ?>

				<header class="page-header">
					<?php
						the_archive_title( '<h1 class="page-title">', '</h1>' );
						the_archive_description( '<div class="archive-description">', '</div>' );
					?>
				</header><!-- .page-header -->

				<div class="causes-archive-grid">
					<?php
					/* Start the Loop */
					while ( have_posts() ) :
						the_post();
						get_template_part( 'template-parts/content', 'grid-item' );
					endwhile;
					?>
				</div>

				<?php
				the_posts_navigation();

			else :
				get_template_part( 'template-parts/content', 'none' );
			endif;
			?>

		</main><!-- #main -->
	</div><!-- #primary -->
</div><!-- .container -->

<?php get_footer();
