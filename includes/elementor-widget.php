<?php
// Prevent direct access to the file for security
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

// Hook into Elementor's widget registration process
add_action('elementor/widgets/register', 'register_counter_elementor_widget');

function register_counter_elementor_widget($widgets_manager) {
    // Ensure Elementor is fully loaded before proceeding
    if (!did_action('elementor/loaded')) {
        return; // Exit if Elementor is not loaded
    }

    // Include the widget class file
    require_once plugin_dir_path(__FILE__) . 'class-elementor-counter-widget.php';

    // Register the Counter Widget with Elementor
    $widgets_manager->register(new \Elementor_Counter_Widget());
}
