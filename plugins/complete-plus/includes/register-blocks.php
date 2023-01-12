<?php
 
function cp_register_blocks() {
  $blocks = [
    [ 'name' => 'fancy-header' ],
    [ 'name' => 'search-form', 'options' => [
      'render_callback' => 'up_search_form_render_cb'
    ]  ],
    ['name' =>  'page-header', 'options' => [
      'render_callback' =>  'up_page_header_render_cb'
    ]],
    ['name' => 'header-tools', 'options' => [
      'render_callback' => 'up_header_tools_render_cb'
    ]],
    [
      'name' => 'auth-modal', 'options' => [
       'render_callback' => 'up_auth_modal_render_cb'
      ]],
    [
      'name' => 'recipe-summary', 'options' => [
       'render_callback' => 'up_recipe_summary_render_cb'
    ]]   
  ];

  foreach($blocks as $block) {
      register_block_type(
      CP_PLUGIN_DIR . 'build/blocks/' . $block['name'],
      isset($block['options']) ? $block['options'] : []
    );
  }
  
}