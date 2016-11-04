<?php
/*
	Plugin Name: Core Shortcodes
	Description: This plugin defines shortcodes that would need to persist (even if the WordPress theme is changed in the future).
	Plugin URI: http://joethomas.co
	Version: 1.0.0
	Author: Joe Thomas
	Author URI: http://joethomas.co
	License: GNU General Public License v3.0
	License URI: http://www.gnu.org/licenses/gpl-3.0.html
*/

// Prevent direct file access
defined( 'ABSPATH' ) or exit;

/* Shortcodes
==============================================================================*/

/**
 * Current Year
 *
 * Usage: [current_year]
 *
 * @since 1.0.0
 */
function joe_shortcode_current_year() {

	$current_year = date( 'Y' );

	return $current_year;

}
add_shortcode( 'current_year', 'joe_shortcode_current_year' );

/**
 * Site Name
 *
 * Usage: [site_name]
 *
 * @since 1.0.0
 */
function joe_shortcode_site_name() {

	$site_name = get_bloginfo( 'name' );

	return $site_name;

}
add_shortcode( 'site_name', 'joe_shortcode_site_name' );
