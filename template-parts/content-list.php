<?php
/**
 * The template part for displaying content
 *
 * 
 * @package Esenia
 * @since Esenia 1.0
 */
?>
<?php
$post_attr_id = is_main_query() ? 'post-' . get_the_ID() : '';
?>
<article id="<?php echo $post_attr_id ?>" <?php post_class( ); ?>>

	<?php if ( has_post_thumbnail() ) : ?>
		<a href="<?php the_permalink(); ?>" class="post-thumbnail"><?php the_post_thumbnail('large'); ?></a>
	<?php endif; ?>

	<header class="entry-header">
		<?php if ( is_sticky() && is_home() && ! is_paged() ) : ?>
			<span class="sticky-post"><?php _e( 'Featured', 'esenia' ); ?></span>
		<?php endif; ?>

		<div class="entry-cats">
			<?php esenia_entry_cats(); ?>
		</div>

		<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>

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

	</header><!-- .entry-header -->

	<?php //esenia_excerpt(); ?>

	<div class="entry-content">
		<?php
			/* translators: %s: Name of current post */
			the_excerpt();
		?>
	</div><!-- .entry-content -->

</article><!-- #post-## -->
