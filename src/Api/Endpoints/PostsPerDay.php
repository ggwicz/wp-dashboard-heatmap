<?php
/**
 * Sets up the custom REST API routes and endpoints.
 *
 * @package wp-dashboard-heatmap
 */

namespace WP_Dashboard_Heatmap\Api\Endpoints;

use WP_Dashboard_Heatmap\Api\EndpointTrait;

use \WP_REST_Server;
use \WP_REST_Request;
use \WP_REST_Controller;
use \WP_REST_Response;
use \WP_Error;

class PostsPerDay extends WP_REST_Controller {
    use EndpointTrait;

    /**
	 * This endpoint's rest base.
	 *
	 * @since 1.0.0
	 *
	 * @var string
	 */
	protected $rest_base = 'posts-per-day';

    public function register_endpoint() {
        register_rest_route(
			$this->api_namespace,
			"$this->api_version/$this->rest_base",
			[
				[
					'methods'             => WP_REST_Server::READABLE,
					'callback'            => [ $this, 'get_items' ],
					'permission_callback' => [ $this, 'get_items_permissions_check' ],
					// 'args'                => Schema::get_collection_params(),
				],
				// 'schema' => [ '\\Schema', 'get_public_item_schema' ],
			]
		);
    }

	/**
	 * Whether a given request is authorized to return results (true all of the time).
     *
     * @since 1.0.0
	 *
	 * @param  WP_REST_Request $request Full details about the request.
	 * @return WP_Error|boolean
	 */
	public function get_items_permissions_check( $request ) {
		return true;
	}

	/**
	 * Get items for the API response.
     *
     * @since 1.0.
	 *
	 * @param WP_REST_Request $request The REST request.
	 * @return array
	 */
	public function get_items( $request ) {
		global $wpdb;

		$params   = $request->get_query_params();
		$page     = $this->get_page_param( $params );
		$per_page = $this->get_per_page_param( $params );
		$offset   = 1 === $page ? 0 : ( $page - 1 ) * $per_page;

		$response = [
			'dates' => [
                [
                    'day' => '2020-01-02',
                    'num_published' => 20,
                ],
                [
                    'day' => '2020-01-01',
                    'num_published' => 5,
                ],
                [
                    'day' => '2019-12-31',
                    'num_published' => 2,
                ],
                [
                    'day' => '2019-12-30',
                    'num_published' => 8,
                ],
                [
                    'day' => '2019-12-29',
                    'num_published' => 0,
                ],
            ],
            'time_zone' => 'America/New_York',
            'post_type' => 'post',
            'author'    => 1,
            'page'      => $page,
            'per_page'  => $per_page,
		];

		return new WP_REST_Response( $response, 200 );
    }

    /**
	 * Get the "page" request param.
     *
     * @since 1.0.0
	 *
	 * @param array $params The request params.
	 * @return int
	 */
	private function get_page_param( array $params ) : int {
		return (int) isset( $params['page'] ) ? $params['page'] : 1;
    }

    /**
	 * Get the "per_page" request param.
     *
     * @since 1.0.0
	 *
	 * @param array $params The request params.
	 * @return int
	 */
	private function get_per_page_param( array $params ) : int {
		return (int) isset( $params['per_page'] ) ? $params['per_page'] : 10;
	}

}
