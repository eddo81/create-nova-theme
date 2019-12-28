<?php
/**
 * Theme functions and definitions, this file must be parseable by PHP 5.2.
 *
 * @package <%= packageName %>
 * @author  "Daniel Andersson <daniel@bozzanova.se>"
 * @author  "Eduardo Jönnerstig <eduardo@bozzanova.se>"
 * @author  "Jon Täng <jon@bozzanova.se>"
 * @license MIT https://opensource.org/licenses/MIT
 * @link    https://developer.wordpress.org/themes/basics/theme-functions/
 * @since   <%= version %>
 */

// Define theme wide control variables.
define( 'MIN_PHP_VERSION', '<%= minPhpVersion %>' );
define( 'MIN_WP_VERSION', '<%= minWpVersion %>' );
define( 'THEME_NAME', '<%= themeName %>' );

// Define theme wide paths.
define( 'THEME_ROOT_URL', get_template_directory_uri() );
define( 'THEME_ROOT_URI', get_template_directory() );
define( 'THEME_ASSETS_URI', THEME_ROOT_URI . DIRECTORY_SEPARATOR . 'assets' );
define( 'THEME_SCRIPT_URI', THEME_ASSETS_URI . DIRECTORY_SEPARATOR . 'js' );
define( 'THEME_STYLE_URI', THEME_ASSETS_URI . DIRECTORY_SEPARATOR . 'css' );

// Disable theme editor in admin.
define( 'DISALLOW_FILE_EDIT', true );

if ( function_exists( 'theme_error' ) === false ) {
	/**
	 * Helper function for prettying up errors.
	 *
	 * @param string $message The error message body.
	 * @param string $heading The error message heading.
	 * @param string $title The page title.
	 * @param array  $options Optional arguments array.
	 */
	function theme_error( $message, $heading = '', $title = '', $options = array() ) {
		$title   = $title ?: __( 'Theme error', '<%= textDomain %>' );
		$heading = ( $heading ) ? $heading : $title;
		$message = "<h1>{$heading}</h1><br><br>{$message}";
		wp_die( $message, $title, $options );
	};
}

// Theme compatibility check, bail early if requirements are not met.
if ( version_compare( MIN_PHP_VERSION, phpversion(), '>=' ) === true || version_compare( MIN_WP_VERSION, get_bloginfo( 'version'), '>=' ) === true ) {
	require THEME_ROOT_URI . '/inc/back-compat.php';
	return;
}

// Setup autoloader.
require THEME_ROOT_URI . '/inc/theme-autoloader.php';