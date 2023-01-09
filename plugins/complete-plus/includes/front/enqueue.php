<?php 

function up_enqueue_scripts() {
  $authURLs = json_encode([
    'signup'  =>  esc_url_raw(rest_url('up/v1/signup'))
  ]);

  wp_add_inline_script(
    'complete-plus-auth-modal-view-script',
    "const up_auth_rest = {$authURLs}",
    'before'
  );
}