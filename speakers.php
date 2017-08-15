<?php
/*
Plugin Name: ICOET Keynote Speakers
GitHub Plugin URI: https://github.com/dCremins/speakers
GitHub Branch:      master
Description: Custom Keynote Speaker Post Type and Views for ICOET website use
Version: 1.0.0
Author: Devin Cremins
Author URI: http://octopusoddments.com
*/

// Add all files in lib folder into array
$include = [
  '/lib/add-acf.php',           // Add Advanced Custom Fields
  '/lib/cpt.php',               // Register Post Type
  '/lib/templates.php',         // Register Views
  '/lib/speaker-widget.php',   // Register Widget
];

// Require Once each file in the array
foreach ($include as $file) {
    if (!$filepath = (dirname(__FILE__) .$file)) {
        trigger_error(sprintf('Error locating %s for inclusion', $file), E_USER_ERROR);
    }
    require_once $filepath;
}
unset($file, $filepath);

/* Add main.css */
add_action('wp_enqueue_scripts', function () {
    wp_enqueue_style('speaker_css', plugins_url('/styles/main.css', __FILE__));
});
