<?php
/**
 * Plugin Name: Custom IP Redirect

 * Description: Redirect users based on their IP address if it starts with 77.29.
 * Version: 1.0
 * Author: Kinza
 */


function redirect_if_ip_starts_with_77_29() {
    // Get the user's IP address
    $user_ip = $_SERVER['REMOTE_ADDR'];

    // Check if the IP starts with '77.29'
    if (strpos($user_ip, '77.29') === 0) {
        
        wp_redirect(home_url());  
        exit(); 
    }
}

// Attach the redirection function to 'template_redirect' hook
add_action('template_redirect', 'redirect_if_ip_starts_with_77_29');
