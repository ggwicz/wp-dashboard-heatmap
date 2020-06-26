<?php
/**
 * Trait defining shared features of WP Dashboard Heatmap API endpoints.
 *
 * @package wp-dashboard-heatmap
 */

namespace WP_Dashboard_Heatmap\Api;

trait EndpointTrait {

    /**
     * REST API namespace.
     *
     * @since 1.0.0
     *
     * @var string
     */
    protected $api_namespace = 'wp-dashboard-heatmap';

    /**
     * REST API version.
     *
     * @since 1.0.0
     *
     * @var string
     */
    protected $api_version = 'v1';
}
