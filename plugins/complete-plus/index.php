<?php
/**
 * Plugin Name:       Complete Plus
 * Plugin URI:        https://github.com/imonweb/WP-Complete/tree/master/plugins/complete-plus
 * Description:       A plugin for adding blocks to a theme. 
 * Version:           0.0.1
 * Requires at least: 5.9
 * Requires PHP:      7.2
 * Author:            Imon
 * Author URI:        http://imonweb.co.uk
 * Text Domain:       completeplus
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Domain Path:       /languages
 * GitHub Plugin URI: https://github.com/imonweb/WP-Complete/tree/master/plugins/complete-plus
 */

if(!function_exists('add_action')){
  echo 'Seems like you stumbled here by accident. 😛';
  exit;
}
 
// Setup
define('CP_PLUGIN_DIR', plugin_dir_path(__FILE__));

// Includes
$rootFiles = glob(CP_PLUGIN_DIR . 'includes/*.php');
$subdirectoryFiles = glob(CP_PLUGIN_DIR . 'includes/**/*.php');
$allFiles = array_merge($rootFiles, $subdirectoryFiles);

foreach($allFiles as $filename){
  include_once($filename);
}

// include(CP_PLUGIN_DIR . 'includes/register-blocks.php');
// include(CP_PLUGIN_DIR . 'includes/blocks/search-form.php');
// include(CP_PLUGIN_DIR . 'includes/blocks/page-header.php');

// Hooks
register_activation_hook(__FILE__, 'up_activate_plugin');

add_action('init', 'cp_register_blocks');
add_action('rest_api_init', 'up_rest_api_init');
add_action('wp_enqueue_scripts', 'up_enqueue_scripts');

// custom post types
add_action('init', 'up_recipe_post_type');
add_action('cuisine_add_form_fields', 'up_cuisine_add_form_fields');
add_action('create_cuisine','up_save_cuisine_meta');
add_action('cuisine_edit_form_fields', 'up_cuisine_edit_form_fields');
add_action('edited_cuisine', 'up_save_cuisine_meta');
add_action('save_post_recipe', 'up_save_post_recipe');