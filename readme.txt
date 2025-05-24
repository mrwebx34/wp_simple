 === WP Simple ===
Contributors: ranjan
Tags: footer, custom content, enqueue style
Requires at least: 5.2
Tested up to: 6.5
Requires PHP: 7.2
Stable tag: 1.10.3
License: GPLv2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html

A simple WordPress plugin that appends a footer message to post content and enqueues a custom CSS file on the frontend.

== Description ==

WP Simple is a lightweight plugin built for demonstration and learning purposes. It does the following:

* Appends a custom footer message to post content.
* Enqueues a custom stylesheet located at `css/style.css`.
* Adds basic plugin setup with activation, deactivation, and uninstall hooks.
* Stores plugin version in the database on activation.

== Installation ==

1. Upload the plugin folder `wp-simple` to the `/wp-content/plugins/` directory.
2. Activate the plugin through the 'Plugins' menu in WordPress.
3. Create a `css/style.css` file in the plugin’s `css/` folder to add your custom styles.

== Frequently Asked Questions ==

= Can I change the footer message? =

Currently, the footer message is hardcoded. To change it, edit the `filter_footer()` method in the plugin file.

= Where do I add custom CSS? =

Add your custom styles to `wp-simple/css/style.css`.

== Changelog ==

= 1.10.3 =
* Initial public release.
* Added footer content filter.
* Enqueued frontend stylesheet.
* Added activation, deactivation, and uninstall hooks.

== Upgrade Notice ==

= 1.10.3 =
First release — no upgrade required.

== License ==

This plugin is free software licensed under the GPLv2 or later.
