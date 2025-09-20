<?php
/**
 * The template for displaying the Events archive (full-width)
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
						// Using the structure from template-causes.php for a consistent grid item look
					?>
						<article id="post-<?php the_ID(); ?>" <?php post_class( 'cause-item' ); ?>>
							<?php if ( has_post_thumbnail() ) : ?>
								<div class="cause-thumbnail">
									<a href="<?php the_permalink(); ?>">
										<?php the_post_thumbnail( 'medium_large' ); ?>
									</a>
								</div>
							<?php endif; ?>
							<header class="entry-header">
								<?php the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' ); ?>
							</header>
							<div class="entry-summary">
								<?php the_excerpt(); ?>
							</div>
						</article>
					<?php
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
