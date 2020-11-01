<?php
/**
 * Enqueue Theme assets.
 *
 * @package Aquila
 */

namespace AQUILA_THEME\Inc;

use AQUILA_THEME\Inc\Traits\Singleton;

class Assets
{
    use Singleton;

    protected function __construct() {
        $this->setup_hooks();
    }

    protected function setup_hooks() {
        /**
         * Actions.
         */
        add_action('wp_enqueue_scripts', [$this, 'register_styles']);
        add_action('wp_enqueue_scripts', [$this, 'register_scripts']);
    }

    public function register_styles() {
        // Register Styles
        wp_register_style('main-css', get_stylesheet_uri(), [], filemtime(AQUILA_DIR_PATH . '/style.css'), 'all');
        wp_register_style('bootstrap', AQUILA_DIR_URI . '/assets/src/library/css/bootstrap.min.css', [], false, 'all');

        // Enqueue Styles
        wp_enqueue_style('main-css');
        wp_enqueue_style('bootstrap');
    }

    public function register_scripts() {
        // Register Scripts
        wp_register_script('main-js', AQUILA_DIR_URI . '/assets/main.js', [], filemtime(AQUILA_DIR_PATH . '/assets/main.js'), true);
        wp_register_script('bootstrap-js', AQUILA_DIR_URI . '/assets/src/library/js/bootstrap.min.js', ['jquery'], false, true);

        // Enqueue Scripts
        wp_enqueue_script('main-js');
        wp_enqueue_script('bootstrap-js');
    }
}