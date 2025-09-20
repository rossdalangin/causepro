<?php
/**
 * Template Name: Causes Page
 *
 * This template displays all posts from the 'cause' custom post type.
 *
 * @package CausePro
 */

get_header(); ?>

<div id="primary" class="content-area">
	<main id="main" class="site-main">

		<header class="page-header">
			<?php the_title( '<h1 class="page-title">', '</h1>' ); ?>
			<?php the_archive_description( '<div class="archive-description">', '</div>' ); ?>
		</header><!-- .page-header -->

		<div class="causes-archive-grid">
			<?php
			$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
			$args = array(
				'post_type'      => 'cause',
				'posts_per_page' => 9, // Adjust as needed
				'paged'          => $paged,
			);
			$causes_query = new WP_Query( $args );

			if ( $causes_query->have_posts() ) :
				while ( $causes_query->have_posts() ) :
					$causes_query->the_post();
					// We can reuse the content part from the homepage section for consistency
					// or create a new one if the layout needs to be different.
					// For now, let's create a compact version here.
			?>
					<article id="post-<?php the_ID(); ?>" <?php post_class( 'cause-item' ); ?>>
						<?php if ( has_post_thumbnail() ) : ?>
							<div class="cause-thumbnail">
								<a href="<?php the_permalink(); ?>">
									<?php the_post_thumbnail( 'causepro-featured-image' ); ?>
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

				// Pagination
				the_posts_pagination( array(
					'mid_size'  => 2,
					'prev_text' => __( '&laquo; Prev', 'causepro' ),
					'next_text' => __( 'Next &raquo;', 'causepro' ),
				) );

				wp_reset_postdata();
			else :
				get_template_part( 'template-parts/content', 'none' );
			endif;
			?>
		</div>

	</main><!-- #main -->
</div><!-- #primary -->

<?php get_footer();
