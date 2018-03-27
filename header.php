<?php
/**
 * The template for displaying the header
 *
 * Displays all of the head element and everything up until the "site-content" div.
 *
 * 
 * @package Esenia
 * @since Esenia 1.0
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<?php if ( is_singular() && pings_open( get_queried_object() ) ) : ?>
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<?php endif; ?>
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<div class="site-inner">
		<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'esenia' ); ?></a>

		<header id="masthead" class="site-header" role="banner">
			<div class="site-header-main">
				<div class="site-top-menu">
					<div>

						<?php if ( has_nav_menu( 'top-menu' ) ) : ?>
							<nav id="top-navigation" class="top-navigation" role="navigation" aria-label="<?php esc_attr_e( 'Primary Menu', 'esenia' ); ?>">
								<?php
									wp_nav_menu( array(
										'theme_location' => 'top-menu',
										'menu_class'     => 'top-menu',
									 ) );
								?>
							</nav><!-- .main-navigation -->
						<?php endif; ?>


						<?php if ( has_nav_menu( 'social' ) ) : ?>
							<nav id="social-navigation" class="social-navigation" role="navigation" aria-label="<?php esc_attr_e( 'Social Links Menu', 'esenia' ); ?>">
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


						<div id="site-search" class="site-search">
							<?php get_search_form(); ?>
						</div>
					</div>

				</div>

				<div class="site-branding">
					<?php esenia_the_custom_logo(); ?>

					<?php if ( is_front_page() && is_home() ) : ?>
						<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
					<?php else : ?>
						<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
					<?php endif;

					$description = get_bloginfo( 'description', 'display' );
					if ( $description || is_customize_preview() ) : ?>
						<p class="site-description"><?php echo esc_html( $description ); ?></p>
					<?php endif; ?>
				</div><!-- .site-branding -->


				<?php if ( has_nav_menu( 'primary' ) ) : ?>
					<button id="menu-toggle" class="menu-toggle"><?php echo esenia_svg_icon('menu'); ?><span class="screen-reader-text"><?php esc_html_e( 'Menu', 'esenia' ); ?></span></button>

					<div id="site-header-menu" class="site-header-menu">
						<?php if ( has_nav_menu( 'primary' ) ) : ?>
							<nav id="site-navigation" class="main-navigation" role="navigation" aria-label="<?php esc_attr_e( 'Primary Menu', 'esenia' ); ?>">
								<?php
									wp_nav_menu( array(
										'theme_location' => 'primary',
										'menu_class'     => 'primary-menu',
									 ) );
								?>
							</nav><!-- .main-navigation -->
						<?php endif; ?>

					</div><!-- .site-header-menu -->
				<?php endif; ?>

			</div><!-- .site-header-main --> 

			<?php if ( get_header_image() ) : ?>
				<?php
					/**
					 * Filter the default esenia custom header sizes attribute.
					 *
					 * @since Esenia 1.0
					 *
					 * @param string $custom_header_sizes sizes attribute
					 * for Custom Header. Default '(max-width: 709px) 85vw,
					 * (max-width: 909px) 81vw, (max-width: 1362px) 88vw, 1200px'.
					 */
					$custom_header_sizes = apply_filters( 'esenia_custom_header_sizes', '(max-width: 709px) 85vw, (max-width: 909px) 81vw, (max-width: 1362px) 88vw, 1200px' );
				?>
<!-- 				<div class="header-image">
 -->						<img src="<?php header_image(); ?>" class="header-image" srcset="<?php echo esc_attr( wp_get_attachment_image_srcset( get_custom_header()->attachment_id ) ); ?>" sizes="<?php echo esc_attr( $custom_header_sizes ); ?>" width="<?php echo esc_attr( get_custom_header()->width ); ?>" height="<?php echo esc_attr( get_custom_header()->height ); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>">
				<!-- </div> --><!-- .header-image -->
			<?php endif; // End header image check. ?>
		</header><!-- .site-header -->

		<div id="content" class="site-content">
