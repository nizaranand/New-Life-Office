<?
/*
Attitude Simple Manual Order Entry for osCommerce v0.3
by Geoff Ford - Attitude Group Ltd - 28 February 2004
http://www.oscommerce.co.nz/
Contact Details available on website

Copyright (c) 2004 Attitude Group Ltd
Released under the GNU General Public License
*/

/*
MANUAL ORDER STATUS
-------------------
MANUAL_ORDER_STATUS corresponds to the order status you want 
the order set to for manual orders
*/
	
	define('MANUAL_ORDER_ENTRY_STATUS',4);
        
/*
LARGE PRODUCT CATALOG
---------------------
setting this to true redirects to the advanced search page and 
disables the admin_list_products.php page.
*/
        
        define('MANUAL_ORDER_ENTRY_LARGE_CAT',false);
        
/*
SECURITY SETTINGS
-----------------
setting MANUAL_ORDER_AUTH enables password protection of simple 
manual order entry. To enable you must also define the username 
and password as well.
*/

	define('MANUAL_ORDER_AUTH',false);
	define('MANUAL_ORDER_USERNAME','');
	define('MANUAL_ORDER_PASSWORD','');
	
	//message on unsuccessful login
	define('MANUAL_ORDER_AUTH_FAILURE','Login failed.');
	//message on ssl enabled but not used to access page
	define('MANUAL_ORDER_SSL_FAILURE','Please access this file under SSL');

/*
the remainder of this file contains shared code
*/

//authentication code
if (MANUAL_ORDER_AUTH && MANUAL_ORDER_USERNAME && MANUAL_ORDER_PASSWORD) {

	//check for ssl
  	if (ENABLE_SSL && getenv('HTTPS') != 'on') {
		die(MANUAL_ORDER_SSL_FAILURE);
  	}	
	
	//authenticate
	//based on "Admin Authentication for 2.2" by Bao Quoc Nguyen
	//http://www.oscommerce.com/community/contributions,687
	
	if(!isset($PHP_AUTH_USER)) {	
		header('WWW-Authenticate: Basic realm="' . TITLE. '"');
		header('HTTP/1.0 401 Unauthorized');
		die(MANUAL_ORDER_AUTH_FAILURE);
	} else {	
		if (($PHP_AUTH_USER != MANUAL_ORDER_USERNAME) || ($PHP_AUTH_PW != MANUAL_ORDER_PASSWORD)) {	
			header('WWW-Authenticate: Basic realm="' . TITLE. '"');
			header('HTTP/1.0 401 Unauthorized');
			die(MANUAL_ORDER_AUTH_FAILURE);
		}
	}


}

//controls where redirected after login or account creation
if (MANUAL_ORDER_ENTRY_LARGE_CAT) {
	//change this if you want to redirect to another page for large catalogs
	define('MANUAL_ORDER_REDIRECT',tep_href_link(FILENAME_ADVANCED_SEARCH)); 
} else {
	define('MANUAL_ORDER_REDIRECT',tep_href_link(FILENAME_ADMIN_LIST_PRODUCTS,'','SSL')); 
}

//this will be entered in session for recording when order processed
$administrator_login = MANUAL_ORDER_ENTRY_STATUS;

?>