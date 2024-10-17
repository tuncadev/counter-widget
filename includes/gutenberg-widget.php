
<?php 
// Prevent direct access to the file for security
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

// Hook into the Gutenberg block registration process
add_action('init', 'register_counter_gutenberg_block');

function register_counter_gutenberg_block() {
    // Ensure Gutenberg is active
    if (!function_exists('register_block_type')) {
        return; // Exit if Gutenberg is not active
    }
    
    // Include the Gutenberg Counter Widget class file
    require_once plugin_dir_path(__FILE__) . 'class-gutenberg-counter-widget.php';

    // Instantiate the Gutenberg Counter Widget class
    new \Gutenberg_Counter_Widget();
    
}
