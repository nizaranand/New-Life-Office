<?php

/*
Plugin Name: OSCommerce Product Generator
Plugin URI: http://www.gavinflood.com
Description: Plugin used to display products from an OSCommerce database on a WordPress site. Idea based on C. Lupu's NetTuts tutorial.
Author: Gavin Flood
Version: 1.0
Author URI: http://www.gavinflood.com
*/

function oscommerce_generate_products($number_to_show) {
	
	/* Connect to the OSCommerce database. */
	$oscommerce_database = new wpdb(get_option('oscommerce_db_user'),get_option('oscommerce_db_password'), get_option('oscommerce_db_name'), get_option('oscommerce_db_host'));

	$generated_html = '';
	
	/* Array holds previous products to ensure no repetition occurs when generating. */
	$previous_products = array();
	
	for ($i = 0; $i < $number_to_show; $i++) {
		
		/* Retreive a random product. */
		$product_id = $oscommerce_database->get_var("SELECT products_id FROM products where products_image != '' ORDER BY RAND() LIMIT 1");
		
		/* Repeat the product_id generator until a unique id is generated. */
		while (in_array($product_id, $previous_products)) {
			$product_id = $oscommerce_database->get_var("SELECT products_id FROM products where products_image != '' ORDER BY RAND() LIMIT 1");
		}
		
		/* Add product_id to array of previous products */
		array_push($previous_products, $product_id);
		
		/* Get the string value of the product's image, name, url and folder. */
		$product_image = $oscommerce_database->get_var("SELECT products_image FROM products WHERE products_id = $product_id");
		$product_name = $oscommerce_database->get_var("SELECT products_name FROM products_description WHERE products_id = $product_id");
		$store_url = get_option('oscommerce_store_url');
		$image_folder = get_option('oscommerce_product_image_folder');

		/* Generate the HTML code for the product. */
		$generated_html .= '<p class="oscommerce-product-display-p">';
		$generated_html .= '<a class="oscommerce-product-display-a" href="'.$store_url.'product_info.php?products_id='.$product_id.'">'.$product_name.'</a>';
		$generated_html .= '<img src="'.$image_folder.$product_image.'" alt="" class="oscommerce-product-display-img" /></p>';
	}
	
	echo $generated_html;
}

/* Display user specified content around generated HTML. */
function widget_oscommerce_product_display($args) {
	extract($args);
	
	$options = get_option("widget_oscommerce_product_display");
	if (!is_array($options)) {
		$options = array(
			'title' => 'In Store',
			'num_products' => 3
		);
	}
	
	echo $before_widget;
	echo $before_title;
	echo $options['title'];
	echo $after_title;
	oscommerce_generate_products($options['num_products']);
	echo $after_widget;
}

/* User controls for widget. */
function oscommerce_product_display_control() {
	$options = get_option('widget_oscommerce_product_display');
	
	if (!is_array($options)) {
		$options = array(
			'title' => 'In Store',
			'num_products' => 3
		);
	}
	
	if ($_POST['oscommerce_product_display_submit']) {
		$options['title'] = htmlspecialchars($_POST['oscommerce_product_display_title']);
		$options['num_products'] = htmlspecialchars($_POST['oscommerce_num_products']);
		update_option('widget_oscommerce_product_display', $options);
	}
	
	echo '<p>';
	echo '<label for="oscommerce_product_display_title">Title: </label><br />';
	echo '<input type="text" id="oscommerce_product_display_title" name="oscommerce_product_display_title" value="'.$options['title'].'" /><br /><br />';
	echo '<label for="oscommerce_num_products">Number Of Products To Show: </label><br />';
	echo '<input type="text" id="oscommerce_num_products" name="oscommerce_num_products" value="'.$options['num_products'].'" />';
	echo '<input type="hidden" id="oscommerce_product_display_submit" name="oscommerce_product_display_submit" value="1" />';
}

/* Initialise the product generator */
function product_generator_init() {
	register_sidebar_widget(__('Product Generator'), 'widget_oscommerce_product_display');
	register_widget_control(  ('Product Generator'), 'oscommerce_product_display_control', 300, 300);
}

/*
 *	Admin Functions.
 */
function oscommerce_admin_include() {
	include('oscommerce_product_display_admin.php');
}

function oscommerce_admin_options() {
    add_options_page("Product Generator", "Product Generator", 1, "Product-Generator", "oscommerce_admin_include");
}

add_action('admin_menu', 'oscommerce_admin_options');
add_action('plugins_loaded', 'product_generator_init');

?>