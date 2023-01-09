<?php 

function up_activate_plugin() {
  // 6.0 < 5.9
  if(version_compare(get_bloginfo('version'), '5.9', '<')) {
    wp_die(__('You must have updated WordPress to use this plugin', 'complete-plus'));
  }

  up_recipe_post_type();
  flush_rewrite_rules();
}