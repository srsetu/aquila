<?php
/**
 * Bootstrap the theme.
 *
 * @package Aquila
 */

namespace AQUILA_THEME\Inc;

use AQUILA_THEME\Inc\Traits\Singleton;

class AQUILA_THEME
{
    use Singleton;

    protected function __construct() {
        Assets::get_instance();
        $this->setup_hooks();
    }

    protected function setup_hooks() {
        /**
         * Actions.
         */
        add_action('after_setup_theme', [$this, 'setup_theme']);
    }
    public function setup_theme() {
        add_theme_support( '' );
        add_theme_support('title-tag');
        add_theme_support('custom-logo', [
            'header-text' => [ 'site-title', 'site-description' ],
            'height'      => 100,
            'width'       => 400,
            'flex-height' => true,
            'flex-width'  => true,
        ]);
        add_theme_support( 'custom-background', [
            'default-color' => '#fff',
            'default-image' => '',
        ] );
        add_theme_support( 'post-thumbnail' );
        add_theme_support( 'customize-selective-refresh-widgets' );
        add_theme_support( 'automatic-feed-links' );
        add_theme_support( 'html5',
            [
                'search-form',
                'comment-form',
                'comment-list',
                'gallery',
                'caption',
                'script',
                'style',
            ]
        );
        add_editor_style();
        add_theme_support( 'wp-block-styles' );
        add_theme_support( 'align-wide' );

        global $content_width;
        if (! isset( $content_width )) {
            $content_width = 1240;
        }
    }
}