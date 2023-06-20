<?php
/*
 * Security Check, die if accessed directly
 */
if( !defined( 'ABSPATH' ) ) {
    die( 'Forbidden.' );
}


/*
 * all includes from inc folder
 */

// Include theme setup
require get_template_directory() . '/inc/setup.php';



/*
 * Excelovita Pattern categories
 */

//remove default pattern catogories  
    remove_theme_support( 'core-block-patterns' );

//regiter custom pattern category for this theme
// WORDPRESS CORE PATTERN CATEGORIES ***** Buttons, Columns, Gallery, Header, Footers, Text, Query, Featured(only if core patterns are active)

$wcpatterns = array("Hero", "Featured", "Testimonials", "Contact", "CTA", "Services", "Posts", "Layout", "Pricing", "Team", "Text", "Headers", "Section", "Footers", "Fullpage");

foreach ($wcpatterns as $value) {
  if ( function_exists( 'register_block_pattern_category' ) ) {
    register_block_pattern_category(
      $value,
      array( 'label' => __( $value, 'unifiedjudicialudicial' ) )
   );
}
}


/**
 * Function to return array of all images from assests/images folder for Excelovita Patterns 
 */
function get_images_from_excelovita() {
    $theme_dir_url = get_template_directory_uri();
    $images_dir_url = $theme_dir_url . '/assets/images/';
    $images = array();
    if ($handle = opendir(get_template_directory() . '/assets/images/')) {
        while (false !== ($entry = readdir($handle))) {
            if ($entry != "." && $entry != "..") {
                $extension = pathinfo($entry, PATHINFO_EXTENSION);
                if ($extension == "jpg" || $extension == "jpeg" || $extension == "png") {
                    $images[] = $images_dir_url . $entry;
                }
            }
        }
        closedir($handle);
    }
    return $images;
}