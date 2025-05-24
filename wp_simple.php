<?php
if (!defined('ABSPATH')) {
    exit;
}
/*
 * Plugin Name:       wp simple

 * Version:           1.10.3
 * Requires at least: 5.2
 * Requires PHP:      7.2
 * Author:             Ranjan
 * License:           GPL v2 or later

 */
class Wp_Simple {
    public function __construct() {
        add_action('init', array($this, 'init'));
    }
    public function init() {
        add_action('wp_enqueue_scripts', array($this, 'enqueue_scripts'));
    }
    
}

if (!function_exists('register_activation_hook')) {
   register_activation_hook(__FILE__, 'activation_hook');
}
if(!function_exists('register_deactivation_hook')) {
    register_deactivation_hook(__FILE__, 'deactivation_hook');
}
if(!function_exists('register_uninstall_hook')) {
    register_uninstall_hook(__FILE__, 'uninstall_hook');
}
function activation_hook() {

    if (version_compare(PHP_VERSION, '7.2', '<')) {
        deactivate_plugins(plugin_basename(__FILE__));
        wp_die('This plugin requires PHP 7.2 or higher.');
    }
    if(!get_option('wp_simple')) {
        update_option('wp_simple', '1.10.3');
    }

}
function deactivation_hook() {
    delete_option('wp_simple');
}
function uninstall_hook() {
    delete_option('wp_simple');
}
function filter_footer() {
    echo '<h3 id="hello">Hello  This is a footer</h3>';
}
function filter_header() {
   wp_enqueue_style('wp-simple-style', plugin_dir_url(__FILE__) . 'css/style.css');
}
add_filter('the_content', 'filter_footer');
add_action('wp_enqueue_scripts', 'filter_header');
$wp_simple = new Wp_Simple();
?>