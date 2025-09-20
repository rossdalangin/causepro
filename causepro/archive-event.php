<?php
/**
 * The template for displaying the Events archive
 *
 * @package CausePro
 */

get_header();
?>

<div class="container">
	<main id="main" class="site-main">

	<?php if ( have_posts() ) : ?>

		<header class="page-header">
			<?php
			the_archive_title( '<h1 class="page-title">', '</h1>' );
			the_archive_description( '<div class="archive-description">', '</div>' );
			?>
		</header><!-- .page-header -->

		<div class="events-archive-list">
			<?php
			/* Start the Loop */
			while ( have_posts() ) :
				the_post();
				get_template_part( 'template-parts/content', 'event' );
			endwhile;
			?>
		</div>

		<?php
		the_posts_navigation();
		?>

	<?php else : ?>
		<?php get_template_part( 'template-parts/content', 'none' ); ?>
	<?php endif; ?>

	</main><!-- #main -->
</div><!-- .container -->

<?php
get_footer();
