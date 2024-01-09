<?php
/*
	Plugin Name: Core Shortcodes
	Description: This plugin defines shortcodes that need to persist (even if the WordPress theme is changed in the future).
	Plugin URI: https://github.com/joethomas/core-shortcodes
	Version: 1.1.2
	Author: Joe Thomas
	Author URI: https://github.com/joethomas
	License: GNU General Public License v3.0
	License URI: http://www.gnu.org/licenses/gpl-3.0.html
	Text Domain: core-shortcodes
	Domain Path: /languages/

	GitHub Plugin URI: https://github.com/joethomas/core-shortcodes
	GitHub Branch: master
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
function joe_cs_shortcode_current_year() {
	$current_year = date( 'Y' );
	return $current_year;
}
add_shortcode( 'current_year', 'joe_cs_shortcode_current_year' );

/**
 * Site Name
 *
 * Usage: [site_name]
 *
 * @since 1.0.0
 */
function joe_cs_shortcode_site_name() {
	$site_name = get_bloginfo( 'name' );
	return $site_name;
}
add_shortcode( 'site_name', 'joe_cs_shortcode_site_name' );

/**
 * Post Title
 *
 * Usage: [post_title]
 *
 * @link https://stackoverflow.com/q/16079490#16079704
 * @since 1.1.1
 */
function joe_cs_shortcode_post_title() {
	global $wp_query;
	return get_post_title( $wp_query->post->ID );
}
add_shortcode( 'post_title', 'joe_cs_shortcode_post_title' );

/**
 * Custom Field
 *
 * Usage: [custom_field id="custom_field_name"]
 *
 * @since 1.1.0
 */
function joe_cs_shortcode_custom_field( $atts ) {
	$atts = extract( shortcode_atts( array(
		'id' => '',
		'format' => 'full', // full, raw
	), $atts ) );
	if ( ! $id ) return;
	$id   = $id; // prefix the id
	$data = get_post_meta( get_the_ID(), $id, true );
	if ( $data && 'full' == $format )  {
		return '<span class="custom-field id-'. $id .'">'. $data .'</span>';
	} else if ( $data && 'raw' == $format ) {
		return $data;
	}
}
add_shortcode( 'custom_field', 'joe_cs_shortcode_custom_field' );
