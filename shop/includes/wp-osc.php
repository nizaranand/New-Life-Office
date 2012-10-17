<?php
/*  
	This file is part of WP.osC package.
	WP.osC is a modification of original (c) osCommerce.
	Date the modification was created : <November 2008>
	Modifications Copyright (C) : <November 2008> by <Roya Khosravi>

	WP.osC is free software: you can redistribute it and/or modify 
	it under the terms of the GNU General Public License as published by
	the Free Software Foundation, either version 3 of the License, or
	(at your option) any later version.

	WP.osC is distributed in the hope that it will be useful,
	but WITHOUT ANY WARRANTY; without even the implied warranty of
	MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
	GNU General Public License for more details.
	You should have received a copy of the GNU General Public License
	along with WP.osC.  If not, see <http://www.gnu.org/licenses/>.

	http://www.wposc.com
	Contact:  roya(at)wposc.com
*/
?>
<?php
include('wposc-configure.php');
require(DIR_WS_FUNCTIONS . 'wp_database.php');
require('rk_osc.php');
if (WPOSC_MODE == 'SYMBIOSIS') {
	wp_tep_db_connect() or die('Unable to connect to Wordpress database server!');
	$template_name = get_option('template'); 
} else if (WPOSC_MODE == 'STANDALONE') {
	$template_name = ACTIVE_THEME; 
}
if (THEME_SWITCHER == 'on') $template_name = str_replace(array(" ","%20"), '-', trim(strtolower($wptheme)));
if (file_exists( 'themes/'.$template_name.'/index.php') ) {
	Define ('TEMPLATEPATH','themes/'.$template_name);
} else {
	Define ('TEMPLATEPATH','themes/default');
	$template_name = 'default';
}
function the_store($arg=''){
	return rk_osc_the_store($arg);
}
function the_owner($arg=''){
	return rk_osc_the_owner($arg);
}
function the_store_email($arg=''){
	return rk_osc_the_store_email($arg);
}
/// Categories Tags
function osc_list_categories($arg='') {
	return rk_osc_list_categories($arg);
}
function osc_dropdown_categories($arg='') {
	return rk_osc_dropdown_categories($arg);
}
/// Search Tags
function the_search_query($arg='') {
	return rk_osc_the_search_query($arg);
} 
function the_search_action($arg='') {
	return rk_osc_the_search_action($arg);
}
function the_search_key($arg='') {
	return rk_osc_the_search_key($arg);
} 
///Page Tags
function osc_list_user_pages($arg='') {
	return rk_osc_list_user_pages($arg);
}
function osc_user_pages_menu($arg='') {
	return rk_osc_user_pages_menu($arg);
}
function osc_dropdown_user_pages($arg='') {
	return rk_osc_dropdown_user_pages($arg);
} 
function osc_list_info_pages($arg='') {
	return rk_osc_list_info_pages($arg);
} 
function osc_info_pages_menu($arg='') {
	return rk_osc_info_pages_menu($arg);
} 
function osc_dropdown_info_pages($arg='') {
	return rk_osc_dropdown_info_pages($arg);
} 
function osc_list_catalog_pages($arg='') {
	return rk_osc_list_catalog_pages($arg);
}
function osc_catalog_pages_menu($arg='') {
	return rk_osc_catalog_pages_menu($arg);
}
function osc_dropdown_catalog_pages($arg='') {
	return rk_osc_dropdown_catalog_pages($arg);
} 
////Navigation Tags
function the_navigation($arg='') {
	return rk_osc_the_navigation($arg);
} 
///Shopping Cart
function osc_shopping_cart($arg='') {
	return rk_osc_shopping_cart($arg);
} 
///Boxes
function osc_best_sellers($arg='') {
	return rk_osc_display_best_sellers($arg);
}
function osc_reviews($arg='') {
	return rk_osc_display_reviews($arg);
} 
function osc_whats_new($arg='') {
	return rk_osc_display_whats_new($arg);
} 
function osc_specials($arg='') {
	return rk_osc_display_specials($arg);
} 
function osc_manufacturers($arg='') {
	return rk_osc_display_manufacturers($arg);
} 
///The Loop
function have_posts($arg=''){
	return rk_osc_have_posts($arg);
}
function the_post($arg=''){
	return rk_osc_the_post($arg);
}
function the_title($arg='') {
	return rk_osc_the_title($arg);
}
function the_content($arg=''){
	return rk_osc_the_content($arg);
} 
function in_category($arg='') {
	return rk_osc_in_category($arg);
} 
function the_category($arg=''){
	return rk_osc_the_category($arg);
}
///General Tags
function bloginfo($param = '',$echo=1){
	return rk_osc_bloginfo($param,$echo);
}
function get_bloginfo($arg=''){
	return rk_osc_get_bloginfo($arg);
}
function storeinfo($param = '',$echo=1){
	return rk_osc_storeinfo($param,$echo);
}
function get_storeinfo($arg=''){
	return rk_osc_get_storeinfo($arg);
}
function _e($arg=''){
	return rk_osc_e($arg);
}
function _c($arg=''){
	return rk_osc_c($arg);
}
function __($arg=''){
	return rk_osc_x($arg);
}
function get_option($param='', $blog_id=0) {
	return rk_osc_get_option($param, $blog_id);
}
function get_settings($arg=''){
	return rk_osc_get_settings($arg);
}

function osc_counter($arg='') {
	return rk_osc_counter($arg);
} 
function wp_head($arg=''){
	return rk_osc_wp_head($arg);
}
function osc_head($arg=''){
	return rk_osc_wp_head($arg);
}
function wp_title($arg=''){
	return rk_osc_wp_title($arg);
}
function language_attributes($arg=''){
	return rk_osc_language_attributes($arg);
}
function wp_footer($arg=''){
	return rk_osc_wp_footer($arg);
}
////Date and Time Tags
function the_time($arg=''){
	return rk_osc_the_time($arg);
}
function the_date($arg=''){
	return rk_osc_the_date($arg);
}
function the_modified_date($arg=''){
	return rk_osc_the_modified_date($arg);
}
////Load functions
function get_header($arg='') {
	return rk_osc_get_header($arg);
}
function get_sidebar($name = null){
	return rk_osc_get_sidebar($name);
}
function get_footer($arg=''){
	return rk_osc_get_footer($arg);
}
function get_page($arg=''){
	return rk_osc_get_page($arg);
}
function osc_rss($arg=1){
	return rk_osc_rss($arg);
}
/// conditional tags
function is_home() {
return rk_get_position('is_home');
}
function is_products() {
return rk_get_position('is_products');
}
function is_category() {
return rk_get_position('is_category');
}
function is_product() {
return rk_get_position('is_product');
}
function is_create_account() {
return rk_get_position('is_create_account');
}
function is_create_account_success() {
return rk_get_position('is_create_account_success');
}
function is_account() {
return rk_get_position('is_account');
}
function is_login() {
return rk_get_position('is_login');
}
function is_logout() {
return rk_get_position('is_logout');
}
function is_whats_new() {
return rk_get_position('is_whats_new');
}
function is_reviews() {
return rk_get_position('is_reviews');
}
function is_specials() {
return rk_get_position('is_specials');
}
function is_bestsellers() {
return rk_get_position('is_bestsellers');
}
function is_search() {
return rk_get_position('is_search');
}
function is_search_result() {
return rk_get_position('is_search_result');
}
function is_shipping() {
return rk_get_position('is_shipping');
}
function is_privacy() {
return rk_get_position('is_privacy');
}
function is_conditions() {
return rk_get_position('is_conditions');
}
function is_contact() {
return rk_get_position('is_contact');
}
function is_shopping_cart() {
return rk_get_position('is_shopping_cart');
}
function is_tell_a_friend() {
return rk_get_position('is_tell_a_friend');
}
function is_product_reviews_write() {
return rk_get_position('is_product_reviews_write');
}
function is_product_reviews_info() {
return rk_get_position('is_product_reviews_info');
}
function is_product_reviews() {
return rk_get_position('is_product_reviews');
}
function is_password_forgotten() {
return rk_get_position('is_password_forgotten');
}
/// Since WPOSC V1.0 RC2
function has_tag($product_id,$language_id) {
return rk_has_tag($product_id,$language_id);
}
function the_tags($product_id,$language_id, $before ='', $separateur=',',$after='',$echo=false) {
return rk_the_tags($product_id,$language_id,$before, $separateur,$after, $echo);
}
function is_tag() {
return rk_is_tag();
}
function the_tag() {
return rk_the_tag(true);
}
function get_the_tag() {
return rk_the_tag(false);
}
function osc_slideshow($width='160',$height='120') {
return rk_slideshow($width,$height);
}
function osc_tag_cloud($arg='') {
return rk_tag_cloud($arg);
}
function osc_flash_tag_cloud($arg='')  {
return rk_flash_tag_cloud($arg);
}
function osc_show_banner($arg='')  {
return rk_show_banner($arg);
}
?>