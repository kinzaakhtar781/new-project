<?php
/*
Plugin Name: HS Random Coffee
Description: A simple plugin to display a random coffee image.
Version: 1.0
Author: kinza
*/


function hs_give_me_coffee() {
    $api_url = 'https://coffee.alexflipnote.dev/random.json';  

   
    $response = wp_remote_get($api_url);

    if (is_wp_error($response)) {
        return 'Sorry, there was an error fetching your coffee.';
    }

   
    $body = wp_remote_retrieve_body($response);

   
    $data = json_decode($body, true);


    if (isset($data['file'])) {
        return esc_url($data['file']); 
    } else {
        return 'Sorry, no coffee found.';
    }
}


function hs_coffee_shortcode() {
    /
    return '<img src="' . hs_give_me_coffee() . '" alt="Random Coffee" style="max-width: 100%; height: auto;" />';
}

add_shortcode('random_coffee', 'hs_coffee_shortcode');
