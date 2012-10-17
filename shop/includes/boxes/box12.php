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
$box_contents = '';
if (tep_session_is_registered('customer_id')) { 
$box_contents .= $before.'<a href="'.tep_href_link(FILENAME_ACCOUNT, '', 'SSL').'">'.HEADER_TITLE_MY_ACCOUNT.'</a>'.$after;
$box_contents .= $before.'<a href="' . tep_href_link(FILENAME_LOGOFF, '', 'SSL'). '">'. HEADER_TITLE_LOGOFF. '</a>'.$after;
} else { 
$box_contents .= $before.'<a href="'.tep_href_link(FILENAME_CREATE_ACCOUNT).'">'.HEADER_TITLE_CREATE_ACCOUNT.'</a>'.$after;
$box_contents .= $before.'<a href="'.tep_href_link(FILENAME_LOGIN).'">'.HEADER_TITLE_LOGIN .'</a>'.$after;
}
$box_contents .= $before.'<a href="'.tep_href_link(FILENAME_SHOPPING_CART).'">'.HEADER_TITLE_CART_CONTENTS.'</a>'.$after;
$box_contents .= $before.'<a href="'.tep_href_link(FILENAME_CHECKOUT_SHIPPING, '', 'SSL').'">'.HEADER_TITLE_CHECKOUT.'</a>'.$after;
?>