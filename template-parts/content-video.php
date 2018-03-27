<?php
/**
 * The template part for displaying content
 *
 * 
 * @package Esenia
 * @since Esenia 1.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( ); ?>>

	<header class="entry-header">
		<?php if ( is_sticky() && is_home() && ! is_paged() ) : ?>
			<span class="sticky-post"><?php _e( 'Featured', 'esenia' ); ?></span>
		<?php endif; ?>

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
		</div><!-- .entry-meta -->

		<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>

	</header><!-- .entry-header -->

	<?php //esenia_excerpt(); ?>

	<?php //esenia_post_thumbnail(); ?>

	<div class="entry-content">
		<?php
			/* translators: %s: Name of current post */
			the_content( sprintf(
				wp_kses( __( '%1$s<span class="screen-reader-text"> "%2$s"</span>', 'esenia' ), esenia_only_allow_span() ),
				esc_html__('Continue Reading', 'esenia'),
				get_the_title()
			) );

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

</article><!-- #post-## -->
