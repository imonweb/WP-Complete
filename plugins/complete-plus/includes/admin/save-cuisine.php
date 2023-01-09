<?php 

function up_save_cuisine_meta($termID) {
  if(!isset($_POST['up_more_info_url'])){
    return;
  }

  // add_term_meta(
  update_term_meta(
    $termID, 
    'more_info_url', 
    sanitize_url($_POST['up_more_info_url'])
  );
}