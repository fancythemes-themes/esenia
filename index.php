<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link http://codex.wordpress.org/Template_Hierarchy
 *
 * 
 * @package Esenia
 * @since Esenia 1.0
 */

get_header(); ?>
	<?php if ( is_active_sidebar( 'sidebar-2' )  ) : ?>
		<div class="header-widget widget-area-full" >
			<?php dynamic_sidebar( 'sidebar-2' ); ?>
		</div><!-- .header-full .widget-area -->
	<?php endif; ?>

	<?php $list_class = get_theme_mod( 'blog_list_view', 'classic') . '-view'; ?>
	<div id="primary" class="content-area <?php echo esc_attr($list_class); ?>">
		<main id="main" class="site-main" role="main">

		<?php if ( have_posts() ) : ?>

			<?php if ( is_home() && ! is_front_page() ) : ?>
				<header>
					<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
				</header>
			<?php endif; ?>

			<?php
			// Start the loop.
			while ( have_posts() ) : the_post();
				if ( 'classic' == get_theme_mod( 'blog_list_view', 'classic') )
					get_template_part( 'template-parts/content', get_post_format() );
				else
					get_template_part( 'template-parts/content-list', get_post_format() );

			// End the loop.
			endwhile;

			if ( get_theme_mod( 'pagination_load_more', false ) ) {
				//if ( max_num_page() > 1 ) {
					echo '<div class="load-more">';
					next_posts_link( esc_html__( 'Load More', 'esenia' ) );
					echo '</div>';
				//}
			} else {
				// Previous/next page navigation.
				the_posts_pagination( array(
					'prev_text'          => esc_html__( 'Previous', 'esenia' ),
					'next_text'          => esc_html__( 'Next', 'esenia' ),
					'before_page_number' => '<span class="meta-nav screen-reader-text">' . esc_html__( 'Page', 'esenia' ) . ' </span>',
				) );
			}

		// If no content, include the "No posts found" template.
		else :
			get_template_part( 'template-parts/content', 'none' );

		endif;
		?>

		</main><!-- .site-main -->
	</div><!-- .content-area -->

	<?php get_sidebar('third'); ?>

	<?php get_sidebar(); ?>

	<?php if ( is_active_sidebar( 'sidebar-3' )  ) : ?>
		<div class="header-widget widget-area-full" >
			<?php dynamic_sidebar( 'sidebar-3' ); ?>
		</div><!-- .header-full .widget-area -->
	<?php endif; 

	 get_footer();