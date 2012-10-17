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
global $osCsid;
$box_contents = '';
$ref='<a href="'; 
$pstr='</a>'; 
if ($ddm==1) {$ref=''; $pstr='';}
if (tep_session_is_registered('customer_id')) {
	if (!in_array("1", $exclude))  
$box_contents .= $before.$ref.tep_href_link(FILENAME_ACCOUNT, '', 'SSL').'">'.HEADER_TITLE_MY_ACCOUNT.$pstr.$after;
	if (!in_array("2", $exclude)) 
$box_contents .= $before.$ref . tep_href_link(FILENAME_LOGOFF, '', 'SSL'). '">'. HEADER_TITLE_LOGOFF. $pstr.$after;
} else { 
	if (!in_array("1", $exclude)) 
$box_contents .= $before.$ref.tep_href_link(FILENAME_CREATE_ACCOUNT, '', 'SSL').'">'.HEADER_TITLE_CREATE_ACCOUNT.$pstr.$after;
	if (!in_array("2", $exclude)) 
$box_contents .= $before.$ref.tep_href_link(FILENAME_LOGIN, '', 'SSL').'">'.HEADER_TITLE_LOGIN .$pstr.$after;
}
	if (!in_array("3", $exclude)) 
$box_contents .= $before.$ref.tep_href_link(FILENAME_SHOPPING_CART).'">'.HEADER_TITLE_CART_CONTENTS.$pstr.$after;
	if (!in_array("4", $exclude)) 
$box_contents .= $before.$ref.tep_href_link(FILENAME_CHECKOUT_SHIPPING, '', 'SSL').'">'.HEADER_TITLE_CHECKOUT.$pstr.$after;

if ($ddm==0) { 

if (substr(basename($PHP_SELF), 0, 8) != 'checkout') {

	if (!in_array("5", $exclude)) { 
	//// find languages
	if (!isset($lng) || (isset($lng) && !is_object($lng))) {
	include(DIR_WS_CLASSES . 'language.php');
	$lng = new language;
	}
	$languages_string = '';
	reset($lng->catalog_languages);
	while (list($key, $value) = each($lng->catalog_languages)) {
$languages_string .= $bsubmenu.$ref . tep_href_link(basename($PHP_SELF), tep_get_all_get_params(array('language', 'currency')) . 'language=' . $key, $request_type) . '">' . $value['name'] . $pstr.$asubmenu;
	}
	$box_contents .= $before."<a href=\"javascript:unhide('rkLANG');\">".BOX_HEADING_LANGUAGES."</a>" ."\n";
	$box_contents .= '<div id="rkLANG" class="hidden">' ."\n";
	$box_contents .= $bmenu ."\n";
	$box_contents .= $languages_string ."\n";
	$box_contents .= $amenu ."\n";
	$box_contents .= '</div>' .$after."\n";
	}
	if (!in_array("6", $exclude)) { 
	/// find currencies
	if (isset($currencies) && is_object($currencies)) {
		$currencies_string = '';
   		$hidden_get_variables = '';
    		reset($HTTP_GET_VARS);
    		while (list($key, $value) = each($HTTP_GET_VARS)) {
      		if ( ($key != 'currency') && ($key != tep_session_name()) && ($key != 'x') && ($key != 'y') ) {
        	$hidden_get_variables .= '&amp;'.$key.'='.$value;
      		}
    		}
		$session_name = tep_session_name() . '=' . tep_session_id();
		reset($currencies->currencies);
		while (list($key, $value) = each($currencies->currencies)) {
		$currencies_string .= $bsubmenu.$ref . tep_href_link(basename($PHP_SELF), tep_get_all_get_params(array('language', 'currency')) . 'currency=' . $key. $hidden_get_variables . '&amp;'.$session_name, $request_type) . '">' . $value['title'] . $pstr.$asubmenu;
		}
	$box_contents .= $before."<a href=\"javascript:unhide('rkCURR');\">".BOX_HEADING_CURRENCIES."</a>"."\n";
	$box_contents .= '<div id="rkCURR" class="hidden">' ."\n";
	$box_contents .= $bmenu ."\n";
	$box_contents .= $currencies_string ."\n";
	$box_contents .= $amenu ."\n";
	$box_contents .= '</div>' .$after."\n";
	}
	}
}
}
?>