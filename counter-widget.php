<?php
/*
Plugin Name: Counter Widget for Elementor and Gutenberg
Description: A customizable counter widget for Elementor and Gutenberg that features number animation using Odometer.js.
Version: 1.0.0
Author: Murat Tunca
Text Domain: counter-widget
*/

// Prevent direct access to the plugin file for security reasons
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

// Define the plugin version for enqueueing scripts and styles
define('COUNTER_WIDGET_VERSION', '1.0.0');

// Ensure PHP version compatibility
if (version_compare(PHP_VERSION, '8.3.12', '<')) {
    add_action('admin_notices', function() {
        echo '<div class="error"><p>Counter Widget requires PHP version 8.3.12 or higher.</p></div>';
    });
    return; // Stop execution if PHP version is lower than required
}

// Register activation and deactivation hooks for the plugin
register_activation_hook(__FILE__, 'counter_widget_activate');
register_deactivation_hook(__FILE__, 'counter_widget_deactivate');

// Activation logic to check dependencies
function counter_widget_activate() {
    // Check if Gutenberg is available
    if (!function_exists('register_block_type')) {
        deactivate_plugins(plugin_basename(__FILE__));
        wp_die('This plugin requires WordPress 5.0 or higher and Gutenberg support.');
    }
}

// Deactivation logic (cleanup tasks can be performed here)
function counter_widget_deactivate() {
    // Place any necessary cleanup code here
}

// Enqueue Odometer.js and custom styles for the Counter widget
function counter_widget_enqueue_assets() {
    // Skip loading scripts in the admin area
    if (is_admin()) {
        return;
    }

    // Load assets only if the block or Elementor is active
    if (has_block('counter-widget/block') || is_elementor_active()) {
        // Elementor 
        wp_enqueue_script(
            'odometer-js',
            'https://cdnjs.cloudflare.com/ajax/libs/odometer.js/0.4.7/odometer.min.js',
            array('jquery'), // Ensure jQuery is loaded first
            '0.4.8',
            true // Load script in the footer
        );
        wp_enqueue_style(
            'odometer-theme-default',
            'https://cdnjs.cloudflare.com/ajax/libs/odometer.js/0.4.8/themes/odometer-theme-default.css',
            array(),
            '0.4.8'
        );
        
        // Enqueue the custom styles for the widget
        wp_enqueue_style(
            'counter-widget-style',
            plugin_dir_url(__FILE__) . 'assets/css/counter-widget.css',
            array(),
            COUNTER_WIDGET_VERSION
        );  
        if (!is_admin()) {
            wp_enqueue_script(
                'font-awesome',
                'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/js/all.min.js',
                array(),
                '5.15.4',
                true
            );
        }
    }
}
add_action('wp_enqueue_scripts', 'counter_widget_enqueue_assets');

function counter_widget_enqueue_gutenberg_assets() {
    // Enqueue the block editor script
    wp_enqueue_script(
        'counter-widget-editor-script',
        plugin_dir_url(__FILE__) . 'assets/js/gutenberg-block.js', // Path to your block script
        ['wp-blocks', 'wp-element', 'wp-editor'], // Dependencies
        COUNTER_WIDGET_VERSION,
        true // Load in the footer
    );

    
    wp_enqueue_script(
        'odometer-js',
        'https://cdnjs.cloudflare.com/ajax/libs/odometer.js/0.4.7/odometer.min.js',
        array('jquery'), // Ensure jQuery is loaded first
        '0.4.8',
        true // Load script in the footer
    );
    wp_enqueue_style(
        'odometer-theme-default',
        'https://cdnjs.cloudflare.com/ajax/libs/odometer.js/0.4.8/themes/odometer-theme-default.css',
        array(),
        '0.4.8'
    );
    if (!is_admin()) {
        wp_enqueue_script(
            'font-awesome',
            'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/js/all.min.js',
            array(),
            '5.15.4',
            true
        );
    }
}
add_action('enqueue_block_editor_assets', 'counter_widget_enqueue_gutenberg_assets');



// Check if Elementor is active and being used on a page
function is_elementor_active() {
    // Verify if Elementor is loaded
    if (did_action('elementor/loaded')) {
        // Check if we are in preview mode (editing with Elementor)
        if (\Elementor\Plugin::$instance->preview->is_preview_mode()) {
            return true;
        }

        // Determine if the current post is built with Elementor
        global $post;
        if ($post && get_post_meta($post->ID, '_elementor_edit_mode', true)) {
            return true;
        }
    }
    return false; // Return false if Elementor is not active
}


// Load additional files for Elementor and Gutenberg support
require_once plugin_dir_path(__FILE__) . 'includes/elementor-widget.php';
require_once plugin_dir_path(__FILE__) . 'includes/gutenberg-widget.php';

?>
