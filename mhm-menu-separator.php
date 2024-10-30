<?php
/*
Plugin Name: Add menu separators to navigation
Plugin URI: https://wordpress.org/plugins/mhm-menu-separator/
Description: Add customisation to allow separator line and text-only entries to the output of the WordPress wp_nav_menu function. Use --- (three dashes) as link text for a horizontal line or use # as a URL for an unlinked menu entry.
Text Domain: mhm-menu-separator
Author: Say Hello GmbH
Version: 2.1.3
Author URI: https://sayhello.ch/
*/

class MHMWordPressMenuSeparator
{


    public $version   = '2.1.3';
    public $wpversion = '5.0';

    public function __construct()
    {
        register_activation_hook(__FILE__, [$this, 'check_version']);
        add_action('admin_init', [$this, 'check_version']);

        // Don't run anything else in the plugin, if we're on an incompatible WordPress version
        if (!$this->compatible_version()) {
            return;
        }

        add_action('plugins_loaded', [$this, 'load_textdomain']);
        add_filter('walker_nav_menu_start_el', [$this, 'nav_menu_start_el'], 10, 2);
    }

    public function check_version()
    {
        // Check that this plugin is compatible with the current version of WordPress
        if (!$this->compatible_version()) {
            if (is_plugin_active(plugin_basename(__FILE__))) {
                deactivate_plugins(plugin_basename(__FILE__));
                add_action('admin_notices', [$this, 'disabled_notice']);
                if (isset($_GET['activate'])) {
                    unset($_GET['activate']);
                }
            }
        }
    }

    public function disabled_notice()
    {
        echo '<div class="notice notice-error is-dismissible">
			<p>' . sprintf(
            _x('The plugin “%1$s” requires WordPress %2$s or higher!', 'Translators: Admin warning message', 'mhm-menu-separator'),
            _x('Add menu separators to navigation', 'Plugin name', 'mhm-menu-separator'),
            $this->wpversion
        ) . '</p>
		</div>';
    }

    private function compatible_version()
    {
        if (version_compare($GLOBALS['wp_version'], $this->wpversion, '<')) {
            return false;
        }

        return true;
    }

    public function load_textdomain()
    {
        load_plugin_textdomain('mhm-menu-separator', false, plugin_basename(dirname(__FILE__)) . '/languages');
    }

    public function nav_menu_start_el($item_output, $item)
    {
        if ('---' === $item->post_title) {
            // Horizontal line
            return apply_filters(
                'mhm-menu-separator/separator',
                '<hr class="mhm-menu-separator">',
                $item
            );
        } else if (substr($item->post_title, 0, 1) === '#') {
            // Horizontal line
            return apply_filters(
                'mhm-menu-separator/separator',
                '<h2 class="widget-title">' . substr($item->post_title, 1) . '</h2>',
                $item
            );
        } elseif ('#' === $item->url) {
            // Text without link
            return apply_filters('mhm-menu-separator/title', $item->post_title, $item);
        } else {
            // Unmodified output for this link
            return $item_output;
        }
    }
}

new MHMWordPressMenuSeparator();
