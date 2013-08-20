<?php 
/*-----------------------------------------------------------------------------------*/
/* This theme supports WooCommerce */
/*-----------------------------------------------------------------------------------*/

add_action( 'after_setup_theme', 'woocommerce_support' );
function woocommerce_support() {
  add_theme_support( 'woocommerce' );
}
/*-----------------------------------------------------------------------------------*/
/* WooCommerce Functions */
/*-----------------------------------------------------------------------------------*/

if (class_exists('woocommerce')) {

  // Disable WooCommerce styles
  define('WOOCOMMERCE_USE_CSS', false);
  // Disable WooCommerce Lightbox
  update_option( 'woocommerce_enable_lightbox', false );
    
}
remove_action( 'woocommerce_before_shop_loop', 'woocommerce_result_count', 20);
remove_action( 'woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30);
// Redefine woocommerce_output_related_products()
function woocommerce_output_related_products() {
woocommerce_related_products(4,4); // Display 4 products in rows of 4
}
// Number of products per page
add_filter('loop_shop_per_page', 'wooframework_products_per_page');
if (!function_exists('wooframework_products_per_page')) {
  function wooframework_products_per_page() {
    global $smof_data;
    if ( isset( $smof_data['products_per_page'] ) ) {
      return $smof_data['products_per_page'];
    }
  }
}

// Display product tabs?
add_action('wp_head','wooframework_tab_check');
if ( ! function_exists( 'wooframework_tab_check' ) ) {
  function wooframework_tab_check() {
    global $smof_data;
    if ( isset( $smof_data[ 'product_tabs' ] ) && $smof_data[ 'product_tabs' ] == "0" ) {
      remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_product_data_tabs', 10);
    }
  }
}

// Display related products?
add_action('wp_head','wooframework_related_products');
if ( ! function_exists( 'wooframework_related_products' ) ) {
  function wooframework_related_products() {
    global $smof_data;
    if ( isset( $smof_data[ 'related_products' ] ) && $smof_data[ 'related_products' ] == "0" ) {
      remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20);
    }
  }
}
add_action( 'woocommerce_archive_description', 'woocommerce_category_image', 2 );
function woocommerce_category_image() {
    if ( is_product_category() ){
      global $wp_query;
      $cat = $wp_query->get_queried_object();
      $thumbnail_id = get_woocommerce_term_meta( $cat->term_id, 'thumbnail_id', true );
      $image = wp_get_attachment_url( $thumbnail_id );
      global $smof_data; if( isset( $smof_data[ 'shop_layout' ] ) && $smof_data[ 'shop_layout' ] == "sidebar" ) {$cat_width = 770;} else {$cat_width = 1170;}
      $sizeimage = aq_resize($image, $cat_width, 300, true);
      if ( $image ) {
        echo '<div class="cat_main_img"><img src="' . $sizeimage . '" alt="" /></div>';
    }
  }
}
