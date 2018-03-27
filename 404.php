<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * 
 * @package Esenia
 * @since Esenia 1.0
 */

get_header(); ?>

	<?php esenia_breadcrumbs(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<article class="error-404 not-found">
				<header class="page-header-not-found">
					<h1 class="page-title"><?php _e( 'Oops! That page can&rsquo;t be found.', 'esenia' ); ?></h1>
				</header><!-- .page-header -->

				<div class="page-content">
					<p><?php _e( 'It looks like nothing was found at this location. Maybe try a search?', 'esenia' ); ?></p>

					<?php get_search_form(); ?>
				</div><!-- .page-content -->
			</article><!-- .error-404 -->

		</main><!-- .site-main -->

		<?php get_sidebar( 'content-bottom' ); ?>

	</div><!-- .content-area -->

<?php 
	get_sidebar('third');
	get_sidebar();
	get_footer();