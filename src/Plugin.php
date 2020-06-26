<?php
/**
 * Main plugin class.
 *
 * @package wp-dashboard-heatmap
 */

namespace WP_Dashboard_Heatmap;

final class Plugin {

    /**
     * Plugin version.
     *
     * @var string
     */
    public static $version = '1.0.0';

    /**
     * Run the plugin.
     *
     * @since 1.0.0
     */
    public function run() {
        add_action( 'wp_dashboard_setup', [ new Widget(), 'register_widget' ] );
    }

    /**
	 * Get URL with a trailing slash to this plugin's root directory.
	 *
	 * @since 1.0.0
     *
	 * @return string
	 */
    public static function get_plugin_dir_url() : string {
        return plugin_dir_url( WP_DASHBOARD_HEATMAP_FILE );
    }

    /**
	 * Get file path with a trailing slash relative to this plugin's root directory.
	 *
	 * @since 1.0.0
     *
	 * @return string
	 */
    public static function get_plugin_dir_path() : string {
        return plugin_dir_path( WP_DASHBOARD_HEATMAP_FILE );
    }

}
