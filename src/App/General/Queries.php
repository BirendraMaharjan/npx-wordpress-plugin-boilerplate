<?php
/**
 * {{The Plugin Name}}
 *
 * @package   {{the-plugin-name}}
 * @author    {{author_name}} <{{author_email}}>
 * @copyright {{author_copyright}}
 * @license   {{author_license}}
 * @link      {{author_url}}
 */

declare( strict_types = 1 );

namespace ThePluginName\App\General;

use ThePluginName\Common\Abstracts\Base;
use ThePluginName\App\General\PostTypes;

/**
 * Class Queries
 *
 * @package ThePluginName\App\General
 * @since 1.0.0
 */
class Queries extends Base {

	/**
	 * Initialize the class.
	 *
	 * @since 1.0.0
	 */
	public function init() {
		/**
		 * This general class is always being instantiated as requested in the Bootstrap class
		 *
		 * @see Bootstrap::__construct
		 *
		 * Add plugin code here
		 */
	}

	/**
	 * Retrieve a custom query for fetching posts.
	 *
	 * This method returns a custom WP_Query object for retrieving posts based on specified parameters.
	 *
	 * @param int    $posts_count The number of posts to retrieve.
	 * @param string $orderby     Optional. The parameter to order the posts by (default: 'date').
	 *
	 * @return \WP_Query The custom WP_Query object for retrieving posts.
	 */
	public function getPosts( $posts_count, $orderby = 'date' ): \WP_Query {
		return new \WP_Query(
			array(
				'post_type'      => PostTypes::POST_TYPE['id'],
				'post_status'    => 'publish',
				'order'          => 'DESC',
				'posts_per_page' => $posts_count,
				'orderby'        => $orderby,
			)
		);
	}

	/**
	 * Example
	 *
	 * @return array
	 */
	public function getPostIds(): array {
		global $wpdb;

		$cache_key = 'my_custom_query_result';
		$post_ids  = wp_cache_get( $cache_key, 'my_custom_query_group' );

		if ( false === $post_ids ) {
			// Query the database if not found in the cache.
			$post_ids = $wpdb->get_col( "SELECT ID FROM {$wpdb->posts} LIMIT 3" ); // phpcs:ignore WordPress.DB.DirectDatabaseQuery.DirectQuery

			// Cache the result.
			wp_cache_set( $cache_key, $post_ids, 'my_custom_query_group' );
		}

		return $post_ids;
	}
}
