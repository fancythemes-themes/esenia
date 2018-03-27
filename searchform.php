<?php
/**
 * Template for displaying search forms in Esenia
 *
 * 
 * @package Esenia
 * @since Esenia 1.0
 */
?>

<form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<label>
		<span class="screen-reader-text"><?php echo _x( 'Search for:', 'label', 'esenia' ); ?></span>
		<input type="search" class="search-field" placeholder="<?php echo esc_attr_x( 'Search here', 'placeholder', 'esenia' ); ?>" value="<?php echo get_search_query(); ?>" name="s" />
	</label>
	<button type="submit" class="search-submit"><?php echo esenia_svg_icon('search'); ?><span class="screen-reader-text"><?php echo _x( 'Search', 'submit button', 'esenia' ); ?></span></button>
</form>
