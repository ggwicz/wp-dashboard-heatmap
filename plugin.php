<?php
/**
 * Plugin Name: WP Dashboard Heatmap
 * Plugin URI:  https://github.com/ggwicz/wp-dashboard-heatmap
 * Description: A WordPress dashboard widget showing a heatmap of post publication, similar to GitHub's heatmap of commit activity.
 * Author:      George Gecewicz
 * Author URI:  https://ggwi.cz
 * Text Domain: wp-dashboard-heatmap
 * Domain Path: /languages
 * Version:     1.0.0
 *
 * @package wp-dashboard-heatmap
 */

define( 'WP_DASHBOARD_HEATMAP_FILE', __FILE__ );

$autoloader = dirname( WP_DASHBOARD_HEATMAP_FILE ) . '/vendor/autoload.php';

if ( ! is_readable( $autoloader ) ) {
	/* Translators: Placeholder is the current directory. */
	throw new \Exception( sprintf( __( 'Please run `composer install` in the plugin folder "%s" and try activating this plugin again.', 'wp-dashboard-heatmap' ), dirname( __FILE__ ) ) );
}

require_once $autoloader;

$wp_dashboard_heatmap = new \WP_Dashboard_Heatmap\Plugin();
$wp_dashboard_heatmap->run();
