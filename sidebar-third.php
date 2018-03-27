<?php
/**
 * The template for the secondary sidebar containing another widget area
 *
 * 
 * @package Esenia
 * @since Esenia 1.0
 */
?>

<?php if ( is_active_sidebar( 'sidebar-4' )  ) : ?>
	<aside id="tertiary" class="sidebar widget-area" role="complementary">
		<?php dynamic_sidebar( 'sidebar-4' ); ?>
	</aside><!-- .sidebar .widget-area -->
<?php endif; ?>
