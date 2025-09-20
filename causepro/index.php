<?php
/**
 * The main template file
 *
 * @package CausePro
 */

get_header();

$layout = get_theme_mod( 'causepro_blog_layout', 'standard' );
$load_more_enabled = get_theme_mod( 'causepro_blog_load_more', false );
$grid_class = ( $layout === 'masonry' ) ? 'blog-archive-grid masonry-grid' : 'blog-archive-list';
?>

<div class="container">
	<div class="site-content-wrapper">
		<main id="main" class="site-main">

			<div class="<?php echo esc_attr( $grid_class ); ?>">
				<?php
				if ( have_posts() ) :

					/* Start the Loop */
					while ( have_posts() ) :
						the_post();
						get_template_part( 'template-parts/content', get_post_format() );
					endwhile;

				else :

					get_template_part( 'template-parts/content', 'none' );

				endif;
				?>
			</div>

			<?php
			if ( $load_more_enabled && $layout === 'masonry' ) :
				global $wp_query;
				if ( $wp_query->max_num_pages > 1 ) :
			?>
				<button id="load-more-posts" data-paged="1" data-max-pages="<?php echo $wp_query->max_num_pages; ?>"><?php esc_html_e( 'Load More', 'causepro' ); ?></button>
			<?php
				endif;
			else :
				the_posts_navigation();
			endif;
			?>

		</main><!-- #main -->

		<?php get_sidebar(); ?>
	</div><!-- .site-content-wrapper -->
</div><!-- .container -->


<?php
get_footer();
