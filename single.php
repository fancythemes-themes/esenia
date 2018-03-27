<?php
/**
 * The template for displaying all single posts and attachments
 *
 * 
 * @package Esenia
 * @since Esenia 1.0
 */

get_header(); ?>

<?php esenia_breadcrumbs(); ?>

<div id="primary" class="content-area">

	<main id="main" class="site-main" role="main">
		<?php
		// Start the loop.
		while ( have_posts() ) : the_post();

			// Include the single post content template.
			get_template_part( 'template-parts/content', 'single' );

			if ( is_singular( 'attachment' ) ) {
				// Parent post navigation.
				the_post_navigation( array(
					'prev_text' => _x( '<span class="meta-nav">Published in</span><span class="post-title">%title</span>', 'Parent post link', 'esenia' ),
				) );
			} elseif ( is_singular( 'post' ) ) {
				// Previous/next post navigation.
				the_post_navigation( array(
					'next_text' => '<span class="meta-nav" aria-hidden="true">' . esc_html__( 'Next Post', 'esenia' ) . '</span> ' .
						'<span class="screen-reader-text">' . esc_html__( 'Next post:', 'esenia' ) . '</span> ' .
						'<span class="post-title">%title</span>',
					'prev_text' => '<span class="meta-nav" aria-hidden="true">' . esc_html__( 'Previous Post', 'esenia' ) . '</span> ' .
						'<span class="screen-reader-text">' . esc_html__( 'Previous post:', 'esenia' ) . '</span> ' .
						'<span class="post-title">%title</span>',
				) );
			}

			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) {
				comments_template();
			}

			// End of the loop.
		endwhile;
		?>

	</main><!-- .site-main -->

</div><!-- .content-area -->

<?php get_sidebar('third'); ?>
<?php get_sidebar(); ?>
<?php get_footer(); ?>