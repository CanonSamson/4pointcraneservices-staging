<?php 

/**
 * Check if WooCommerce is active
 **/
function mazo_is_woocommerce_active(){
	if ( 
	  in_array( 
		'woocommerce/woocommerce.php', 
		apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) 
	  ) 
	) {
		return true;
	}else{
		return false;
	}
}

/* Show "Free" instead of zero price of product */

//For shop page
function mazo_price_override( $price, $product ) {
   
   if ( empty($product->get_price()) ) {
      /*
       * Replace the word "Free" with whatever text you would like. Also
       * remember to update the textdomain for translation if required.
       */
      $price = __( 'Free', 'mazo' );
   }
 
   return $price;
}
add_filter( 'woocommerce_get_price_html', 'mazo_price_override', 100, 2 );

//For cart and checkout page
function mazo_price_cart_override( $price, $product ) {
  
   if ( empty($product['data']->get_price()) ) {
		$price = __( 'Free', 'mazo' );
   }
 
   return $price;
}
add_filter( 'woocommerce_cart_item_price', 'mazo_price_cart_override', 100, 2 );
add_filter( 'woocommerce_cart_item_subtotal', 'mazo_price_cart_override', 100, 2 );

// For thankyou page and email
function mazo_price_subtotal_override( $price, $product ) {
   
   if ( empty($product->get_subtotal()) ) {
      $price = __( 'Free', 'mazo' );
   }
 
   return $price;
}
add_filter( 'woocommerce_order_formatted_line_subtotal', 'mazo_price_subtotal_override', 100, 2 );

/* Show "Free" instead of zero price of product END */


/**
 * Remove Woo-Commerce Filters
 */

function mazo_woo_remove_action()
{
	
	$show_related_product = mazo_get_opt('show_related_product');
	
	$remove_action_arr = array(
							'woocommerce_before_shop_loop' => array(
								 array('woocommerce_result_count', 20)
							),
							'woocommerce_after_shop_loop_item' => array(
								 array('woocommerce_template_loop_add_to_cart', 10),
							),
							'woocommerce_before_main_content' => array(
								 array('woocommerce_breadcrumb', 20),
								 array( 'woocommerce_output_content_wrapper', 10)
							),
							'woocommerce_after_main_content' => array(
								 array( 'woocommerce_output_content_wrapper_end', 10)
							),
							
							'woocommerce_before_shop_loop_item_title' => array(
								array( 'woocommerce_template_loop_product_thumbnail', 10 )
							),
							'woocommerce_after_shop_loop_item_title' => array(
								 array( 'woocommerce_template_loop_price', 10 ),
								 array('woocommerce_template_loop_rating', 5 )
							),
							'woocommerce_sidebar' => array(
								 array('woocommerce_get_sidebar', 10),
							),
						);
	
		
	if(!$show_related_product)
	{
		$remove_action_arr['woocommerce_after_single_product_summary'] = array(
								array('woocommerce_output_related_products', 20)
							);			
	}
	
	foreach( $remove_action_arr as $key => $value )
	{
		foreach( $value as $item )
		{
			remove_action( $key, $item[0], $item[1] );
		}
	}
}

add_action( 'init', 'mazo_woo_remove_action');

/* Replace text Onsale */
add_filter( 'woocommerce_sale_flash', 'mazo_replace_sale_text' );
function mazo_replace_sale_text( $html ) {

	$regular_price = get_post_meta( get_the_ID(), '_regular_price', true);
	$sale_price = get_post_meta( get_the_ID(), '_sale_price', true);

	$product_sale = '';
	if(!empty($sale_price)) {
		$product_sale = intval( ( (intval($regular_price) - intval($sale_price)) / intval($regular_price) ) * 100);
		return str_replace( 'Sale!', '<span class="onsale-inner"><span>' .$product_sale. '%</span></span>', $html );
	}
}
 
 
/**
 * Change number of products that are displayed per page (shop page)
 */
add_filter( 'loop_shop_per_page', 'mazo_loop_shop_per_page', 20 );

function mazo_loop_shop_per_page( $cols ) 
{
  // $cols contains the current number of products per page based on the value stored on Options –> Reading
  // Return the number of products you wanna show per page.
  $no_of_product_per_page = mazo_get_opt('no_of_product_per_page');
  $no_of_product_per_page = !empty($no_of_product_per_page)?$no_of_product_per_page:get_option('posts_per_page');
  $cols = $no_of_product_per_page;
  return $cols;
}

/**
 * Change number of related products output
 */ 
function mazo_related_products_limit() 
{
	$no_of_related_product = mazo_get_opt('no_of_related_product');
    $no_of_related_product = !empty($no_of_related_product)?$no_of_related_product:3;
  
	$args['posts_per_page'] = $no_of_related_product;
	return $args;
}
add_filter( 'woocommerce_output_related_products_args', 'mazo_related_products_limit', 20 );

/**
* Change Gallery Thumbnail Size
**/
function mazo_gallery_thumbnail_size($size)
{
	return array(
        'width' => 300,
        'height' => 300,
        'crop' => 0,
    );
}
add_filter( 'woocommerce_get_image_size_gallery_thumbnail','mazo_gallery_thumbnail_size');


function mazo_is_woo_catalog_shop_enable(){
	
	$is_enable = true;
	
	if(class_exists('YITH_WooCommerce_Catalog_Mode')){
		
		$obj = new YITH_WooCommerce_Catalog_Mode();
		$response = $obj->disable_shop();
		if($response){
			$is_enable = false;
		}
	}
	
	return $is_enable;
}


function mazo_woo_review_gravatar_size($a){
	return 100;
}

add_filter('woocommerce_review_gravatar_size','mazo_woo_review_gravatar_size',10,2);