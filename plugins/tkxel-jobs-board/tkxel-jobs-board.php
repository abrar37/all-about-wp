<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://https://tkxel.com/
 * @since             1.0.0
 * @package           Tkxel_Jobs_Board
 *
 * @wordpress-plugin
 * Plugin Name:       Tkxel Jobs Board
 * Plugin URI:        https://tkxel.com/
 * Description:       Fetches and displays job openings from the Zoho API by TKXEL. Shortcodes: [job_search_form], [total_jobs_num], [six_open_jobs], [all_open_jobs] 
 * Version:           1.0.0
 * Author:            Abrar A.
 * Author URI:        https://tkxel.com/
 * Text Domain:       tkxel-jobs-board
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-tkxel-jobs-board-activator.php
 */
function activate_tkxel_jobs_board() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-tkxel-jobs-board-activator.php';
	Tkxel_Jobs_Board_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-tkxel-jobs-board-deactivator.php
 */
function deactivate_tkxel_jobs_board() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-tkxel-jobs-board-deactivator.php';
	Tkxel_Jobs_Board_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_tkxel_jobs_board' );
register_deactivation_hook( __FILE__, 'deactivate_tkxel_jobs_board' );


// Include plugin functionality files
require_once plugin_dir_path( __FILE__ ) . 'includes/class-tkxel-jobs-board-api.php';
require_once plugin_dir_path( __FILE__ ) . 'includes/tkxel-jobs-board-shortcodes.php';

/**
 * Enqueuing Plugin CSS and JS Files
 */
function tjb_styles_scripts(){
	wp_enqueue_style('tjb-style', plugin_dir_url( __FILE__ ) . '/assets/css/tkxel-jobs-board.css' );
	wp_enqueue_script('tjb-script', plugin_dir_url( __FILE__ ) . '/assets/js/tkxel-jobs-board.js', array(), '1.0.0', true);
}
add_action('wp_enqueue_scripts', 'tjb_styles_scripts');

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */

// function run_tkxel_jobs_board() {

// 	$plugin = new Tkxel_Jobs_Board();
// 	$plugin->run();

// }
// run_tkxel_jobs_board();


