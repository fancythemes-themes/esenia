<?php
/**
 * The template part for displaying single posts
 *
 * 
 * @package Esenia
 * @since Esenia 1.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">

		<div class="entry-cats">
			<?php esenia_entry_cats(); ?>
		</div>
		
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>

		<div class="entry-meta">
			<?php esenia_entry_meta(); ?>
			<?php
				edit_post_link(
					sprintf(
						/* translators: %s: Name of current post */
						wp_kses( __( 'Edit<span class="screen-reader-text"> "%s"</span>', 'esenia' ), esenia_only_allow_span() ),
						get_the_title()
					),
					'<span class="edit-link">',
					'</span>'
				);
			?>
		</div><!-- .entry-footer -->

	</header><!-- .entry-header -->

	<?php //esenia_excerpt(); ?>

	<?php
	if ( ! in_array( get_post_format(), array( 'video', 'audio', 'gallery') ) ) { 
		esenia_post_thumbnail();
	}
	?>

	<div class="entry-content">
		<?php
			the_content();

			esenia_entry_tags();

			if ( function_exists( 'sharing_display' ) ) {
				sharing_display( '', true );
			}

			wp_link_pages( array(
				'before'      => '<div class="page-links"><span class="page-links-title">' . esc_html__( 'Pages:', 'esenia' ) . '</span>',
				'after'       => '</div>',
				'link_before' => '<span>',
				'link_after'  => '</span>',
				'pagelink'    => '<span class="screen-reader-text">' . esc_html__( 'Page', 'esenia' ) . ' </span>%',
				'separator'   => '<span class="screen-reader-text">, </span>',
			) );

		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php

		if ( class_exists( 'Jetpack_RelatedPosts' ) ) {
			echo do_shortcode( '[jetpack-related-posts]' );
		}

		if ( '' !== get_the_author_meta( 'description' ) ) {
			get_template_part( 'template-parts/biography' );
		}
		?>
	</footer>

</article><!-- #post-## -->
