<?php 

function up_recipe_summary_render_cb($atts) {
  $prepTime = isset($atts['prepTime']) ? esc_html($atts['prepTime']) : '' ;
  $cookTime = isset($atts['cookTime']) ? esc_html($atts['cookTime']) : '' ;
  $course = isset($atts['course']) ? esc_html($atts['course']) : '' ;

   ob_start();
  ?> 
    <div class="wp-block-complete-plus-recipe-summary">
      <i class="bi bi-alarm"></i>
      <div class="recipe-columns-2">
        <div class="recipe-metadata">
          <div class="recipe-title">
            <?php _e('Prep Time', 'complete-plus'); ?>
          </div>
          <div class="recipe-data recipe-prep-time">
            <?php echo $prepTime; ?>
          </div>
        </div>
        <div class="recipe-metadata">
          <div class="recipe-title">
            <?php _e('Cook Time', 'complete-plus'); ?>
          </div>
          <div class="recipe-data recipe-cook-time">
            <?php echo $cookTime; ?>
          </div>
        </div>
      </div>
      <div class="recipe-columns-2-alt">
        <div class="recipe-columns-2">
          <div class="recipe-metadata">
            <div class="recipe-title">
              <?php _e('Course', 'complete-plus'); ?>
            </div>
            <div class="recipe-data recipe-course">
              <?php echo $course; ?>
            </div>
          </div>
          <div class="recipe-metadata">
            <div class="recipe-title">
              <?php _e('Cuisine', 'complete-plus'); ?>
            </div>
            <div class="recipe-data recipe-cuisine">

            </div>
          </div>
          <i class="bi bi-egg-fried"></i>
        </div>
        <div class="recipe-metadata">
          <div class="recipe-title">
            <?php _e('Rating', 'complete-plus'); ?>
          </div>
          <i class="bi bi-hand-thumbs-up"></i>
        </div>
      </div>
    </div>
  <?php 
 
  $output = ob_get_contents();
  ob_end_clean();
 
  return $output;
}



