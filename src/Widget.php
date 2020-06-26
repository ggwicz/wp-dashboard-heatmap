<?php
/**
 * Sets up the dashboard widget in WordPress.
 *
 * @package wp-dashboard-heatmap
 */

namespace WP_Dashboard_Heatmap;

class Widget {

    /**
     * Register the dashboard widget in WordPress.
     *
     * @since 1.0.0
     */
    public function register_widget() {
        wp_add_dashboard_widget( 'dashboard_widget', 'Publishing Frequency', [ $this, 'render_widget' ] );
    }

    /**
     * Render the dashboard widget.
     *
     * @since 1.0.0
     */
    public function render_widget() {
        include Plugin::get_plugin_dir_path() . 'templates/widget.php';
    }

}
