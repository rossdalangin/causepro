<?php
/**
 * Template part for displaying a grid item for various post types.
 *
 * @package CausePro
 */
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
