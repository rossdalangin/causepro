<?php
/**
 * Template Name: Events Calendar
 *
 * This template displays a full-page calendar of events.
 *
 * @package CausePro
 */

get_header(); ?>

<div id="primary" class="content-area">
	<main id="main" class="site-main">

		<header class="page-header">
			<?php the_title( '<h1 class="page-title">', '</h1>' ); ?>
		</header><!-- .page-header -->

		<div class="entry-content">
			<div id='calendar'></div>
		</div>

	</main><!-- #main -->
</div><!-- #primary -->

<?php get_footer();
