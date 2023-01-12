<?php
/**
 * Plugin Name: Hello World Block
 * Plugin URI: https://github.com/imonweb/url
 * Description: Hello World example of Gutenberg Block
 * Author: Imon
 * Author URI: https://www.imonweb.co.uk
 * Text-Domain: plugin name
 * Version: 0.1.0
 * License: GPL2
 * License URL: https://www.gnu.org/licenses/gpl-2.0.txt
 * text-domain: plugin name
 **/

add_action('enqueue_block_editor_assets', 'hwb_enqueue_editor_assets', 10, 1);
add_ation('enqueue_block_assets', 'hwb_enqueue_assets', 10, 1);

function hwb_enqueue_editor_assets() {
  wp_enqueue_script(
    'hwb-block',
    plugins_url('hwb-block.js', __FILE__),
    array('wp-blocks', 'wp-element')
  );
  wp_enqueue_style(
    'hwb-editor-css',
    plugins_url('editor.css', __FILE__),
    array('wp-edito-blocks')
  );
}

function hwb_enqueue_assets(){
  wp_enqueue_style(
    'hwb-frontend-css',
    plugins_url('styles.css', __FILE__),
    array('wp-blocks')
  );
}