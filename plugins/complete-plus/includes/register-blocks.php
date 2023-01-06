<?php
 
function cp_register_blocks() {
  register_block_type(
    CP_PLUGIN_DIR . 'build/block.json'
  );
}