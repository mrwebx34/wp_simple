<?php
if (!defined('ABSPATH')) {
    exit;
}

/*
 * Plugin Name:       WP Simple
 * Description:       A simple WordPress plugin example.
 * Version:           1.10.3
 * Requires at least: 5.2
 * Requires PHP:      7.2
 * Author:            Ranjan
 * License:           GPL v2 or later
 */

class Wp_Simple {

    public function __construct() {
        add_action('init', array($this, 'init'));
    }

    public function init() {
        add_action('wp_enqueue_scripts', array($this, 'filter_header'));
        add_filter('the_content', array($this, 'filter_footer'));
    }

    public function activation_hook() {
        if (version_compare(PHP_VERSION, '7.2', '<')) {
            deactivate_plugins(plugin_basename(__FILE__));
            wp_die('This plugin requires PHP 7.2 or higher.');
        }

        if (!get_option('wp_simple')) {
            update_option('wp_simple', '1.10.3');
        }
    }

    public function deactivation_hook() {
        delete_option('wp_simple');
    }

    public function uninstall_hook() {
        delete_option('wp_simple');
    }

    public function filter_footer($content) {
        return $content . '<h3 id="hello">Hello, this is a footer</h3>';
    }

    public function filter_header() {
        wp_enqueue_style('wp-simple-style', plugin_dir_url(__FILE__) . 'css/style.css');
    }
}


$wp_simple = new Wp_Simple();

register_activation_hook(__FILE__, array($wp_simple, 'activation_hook'));
register_deactivation_hook(__FILE__, array($wp_simple, 'deactivation_hook'));
register_uninstall_hook(__FILE__, array('Wp_Simple', 'uninstall_hook'));
?>
