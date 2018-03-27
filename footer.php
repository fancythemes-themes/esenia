<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after
 *
 * 
 * @package Esenia
 * @since Esenia 1.0
 */
?>

		</div><!-- .site-content -->

		<footer id="colophon" class="site-footer" role="contentinfo">

			<?php get_sidebar('footer'); ?>

			<?php if ( has_nav_menu( 'social' ) && false ) : ?>
				<nav class="social-navigation" role="navigation" aria-label="<?php esc_attr_e( 'Footer Social Links Menu', 'esenia' ); ?>">
					<?php
						add_filter( 'walker_nav_menu_start_el', 'esenia_social_menu_item_output', 10, 4 );
						wp_nav_menu( array(
							'theme_location' => 'social',
							'menu_class'     => 'social-links-menu',
							'depth'          => 1,
							'link_before'    => esenia_svg_icon('icon_replace') . '<span class="screen-reader-text">',
							'link_after'     => '</span>',
						) );
						remove_filter( 'walker_nav_menu_start_el', 'esenia_social_menu_item_output' );
					?>
				</nav><!-- .social-navigation -->
			<?php endif; ?>
			<?php if ( has_nav_menu( 'footer-menu' ) ) : ?>
				<nav class="footer-navigation" role="navigation" aria-label="<?php esc_attr_e( 'Footer Menu', 'esenia' ); ?>">
					<?php
						wp_nav_menu( array(
							'theme_location' => 'footer-menu',
							'menu_class'     => 'footer-menu',
						 ) );
					?>
				</nav><!-- .main-navigation -->
			<?php endif; ?>
			<div class="site-info">
				<?php
					/**
					 * Fires before the esenia footer text for footer customization.
					 *
					 * @since Esenia 1.0
					 */
					do_action( 'esenia_credits' );
					esenia_footer_credit(true);
				?>
			</div><!-- .site-info -->
		</footer><!-- .site-footer -->
	</div><!-- .site-inner -->
</div><!-- .site -->

<?php wp_footer(); ?>
</body>
</html>
