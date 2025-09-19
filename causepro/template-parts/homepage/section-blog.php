<?php
/**
 * Template part for displaying the Blog section on the homepage.
 *
 * @package CausePro
 */

$headline = get_theme_mod( 'causepro_blog_headline', __( 'From Our Blog', 'causepro' ) );
$subtitle = get_theme_mod( 'causepro_blog_subtitle' );
$post_count = get_theme_mod( 'causepro_blog_post_count', 3 );
?>

<section class="homepage-blog">
	<div class="container">
		<h2 class="section-title blog-headline"><?php echo esc_html( $headline ); ?></h2>
		<?php if ( ! empty( $subtitle ) ) : ?>
			<p class="section-subtitle"><?php echo esc_html( $subtitle ); ?></p>
		<?php endif; ?>
		<div class="blog-grid">
			<?php
			$args = array(
				'post_type'      => 'post',
				'posts_per_page' => absint( $post_count ),
				'orderby'        => 'date',
				'order'          => 'DESC',
				'ignore_sticky_posts' => 1,
			);
			$blog_query = new WP_Query( $args );

			if ( $blog_query->have_posts() ) :
				while ( $blog_query->have_posts() ) :
					$blog_query->the_post();
			?>
				<article id="post-<?php the_ID(); ?>" <?php post_class( 'blog-item' ); ?>>
					<?php if ( has_post_thumbnail() ) : ?>
						<div class="blog-thumbnail">
							<a href="<?php the_permalink(); ?>">
								<?php the_post_thumbnail( 'medium_large' ); ?>
							</a>
						</div>
					<?php endif; ?>
					<header class="entry-header">
						<?php the_title( '<h3 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h3>' ); ?>
					</header>
					<div class="entry-summary">
						<?php the_excerpt(); ?>
					</div>
					<a href="<?php the_permalink(); ?>" class="button learn-more-button"><?php esc_html_e( 'Read More', 'causepro' ); ?></a>
				</article>
			<?php
				endwhile;
				wp_reset_postdata();
			else :
			?>
				<p><?php esc_html_e( 'No recent posts found.', 'causepro' ); ?></p>
			<?php
			endif;
			?>
		</div>
	</div>
</section>
