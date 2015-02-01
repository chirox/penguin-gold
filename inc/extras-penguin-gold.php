<?php
/**
 * Defines theme specific functions
 *
 * @package PENGU!N Gold
 */

/**
 * Header image body class
 */
function penguin_get_headerimg_body_class( $classes ) {
	global $post;

	if ( is_single() && 'no' == get_post_meta( $post->ID, 'header-img', true ) ) {
		$classes[] = 'no-headerimg';
	}

	elseif ( is_single() && ! is_404 () && has_post_thumbnail() && ( is_page() || is_single() && !is_attachment() ) ) {
		$classes[] = 'has-headerimg';
	}

	return $classes;

}
add_filter( 'body_class', 'penguin_get_headerimg_body_class' );

/**
 * Custom Excerpt
*/
function penguin_excerpt_read_more_link($output) {
	global $post;
	return $output . '<a href="'. get_permalink($post->ID) . '" class="read-more-link">' . __("Read more", "penguin") . '</a>';
}
add_filter( 'the_excerpt', 'penguin_excerpt_read_more_link' );

function penguin_new_excerpt_more( $more ) {
	return ' ...';
}
add_filter( 'excerpt_more', 'penguin_new_excerpt_more' );

/**
 * Link to scroll back to the top of the page.
 */
function penguin_back_to_top() {
	echo '<a data-scroll href="#masthead" id="scroll-to-top"><span class="screen-reader-text">' . __( 'Scroll To Top', 'penguin' ) . '</span></a>';
}
add_action( 'tha_footer_top', 'penguin_back_to_top' );

/**
 * Check if have a logo
 */
function penguin_gold_add_logo_and_navbar_body_class( $classes ) {
	$logo = get_theme_mod( 'logo' );
	$navbar = get_theme_mod( 'brightness-navbar' );
	if ($logo != '') {
		$classes[] = 'has-logo';
	}
	if ($navbar == 'bright' ) {
		$classes[] = 'bright-navbar';
	}
	return $classes;
}
add_filter( 'body_class', 'penguin_gold_add_logo_and_navbar_body_class' );

/**
 * Add search box to primary menu
 */
function penguin_gold_add_search_box($items, $args) {
	$menusearch = get_theme_mod( 'menu-search' );
	if ( $args->theme_location == 'primary' && $menusearch == 1 ) {
		ob_start();
		get_search_form();
		$searchform = ob_get_contents();
		ob_end_clean();

		$items .= '<li class="menu-search"><span class="penguin-search-icon"></span>' . $searchform . '</li>';
	}
	return $items;
}
add_filter( 'wp_nav_menu_items','penguin_gold_add_search_box', 10, 2 );

/**
 * Sidebar layout
 */
function penguin_gold_add_sidebar_body_class( $classes ) {
	$sidebar = get_theme_mod( 'sidebar-layout' );
	if ($sidebar == 'sidebar-left') {
		$classes[] = 'sidebar-left';
	}
	else {
		$classes[] = 'sidebar-right';
	}
	return $classes;
}
add_filter( 'body_class', 'penguin_gold_add_sidebar_body_class' );

/**
 * Footer text
 */
function penguin_gold_poweredby() {
	$footertext = get_theme_mod( 'footer-text' );
	$wpzoo = '<a href="http://wpzoo.ch" rel="designer">PENGU!N WordPress Theme made by WPZOO</a>';

	if ( $footertext != '' ) {
		echo '<div id="poweredby">' . $footertext . '</div>';
	}
	else {
		echo '<div id="poweredby">' . $wpzoo . '</div>';
	}
}
add_action( 'tha_footer_bottom', 'penguin_gold_poweredby' );