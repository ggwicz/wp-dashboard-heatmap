<?php
/**
 * Registrar for the custom REST API: registers routes and endpoints.
 *
 * @package wp-sdashboard-heatmap
 */

namespace WP_Dashboard_Heatmap\Api;

use WP_Dashboard_Heatmap\Api\Endpoints\PostsPerDay;

class Registrar {

    /**
     * REST API endpoints to register.
     *
     * @since 1.0.0
     *
     * @var array
     */
    protected $endpoints = [
        PostsPerDay::class,
    ];

    /**
     * Register REST API endpoints.
     *
     * @since 1.0.0
     */
    public function register_rest_endpoints() {
        foreach ( $this->endpoints as $endpoint ) {
            ( new $endpoint() )->register_endpoint();
        }
    }

}
