<?php

namespace App\Core;

use function esc_html;
use function esc_url;
use function get_the_title;
use function get_option;
use function get_page_link;
use function home_url;
use function is_front_page;

/**
 * Class Breadcrumb.
 *
 * @package <%= packageName %>
 * @author "eddo81 <eduardo_jonnerstig@live.com>"
 * @license <%= license.type %> <%= license.url %>
 * @since   <%= version %>
 */
class Breadcrumb {

	/**
	 * Constructor.
	 */
	public function __construct() {
	}

	/**
	 * Get an object containing the navigation scheme ordered from the site root to the current page.
	 *
	 * @return array
	 */
	public function get_navigation_scheme() : array {
		global $post;
		$front_page_id = get_option( 'page_on_front' );
		$breadcrumbs   = [];

		if ( is_front_page() ) {
			array_push( $breadcrumbs, [
				'title'     => esc_html( get_the_title() ),
				'permalink' => null,
			] );
		} else {
			array_push( $breadcrumbs, [
				'title'     => esc_html( get_the_title( $front_page_id ) ),
				'permalink' => esc_url( home_url( '/' ) ),
			]);

			if ( $post->ancestors ) {
				foreach ( array_reverse( $post->ancestors ) as $parent ) {

					if ( (int) $front_page_id === $parent ) {
						continue;
					}

					array_push( $breadcrumbs, [
						'title'     => esc_html( get_the_title( $parent ) ),
						'permalink' => get_page_link( $parent ),
					] );
				}
			} elseif ( $post->parent ) {
				array_push( $breadcrumbs, [
					'title'     => esc_html( get_the_title( $post->parent ) ),
					'permalink' => get_page_link( $post->parent ),
				] );
			}

			array_push($breadcrumbs, [
				'title'     => esc_html( get_the_title() ),
				'permalink' => null,
			]);
		}

		return $breadcrumbs;
	}
}
