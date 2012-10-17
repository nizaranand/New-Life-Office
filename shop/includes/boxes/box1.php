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
  $cart_contents_string = '';
  if ($cart->count_contents() > 0) {
    $cart_contents_string = '';
    $products = $cart->get_products();
    for ($i=0, $n=sizeof($products); $i<$n; $i++) {
      $cart_contents_string .= $before;

      if ((tep_session_is_registered('new_products_id_in_cart')) && ($new_products_id_in_cart == $products[$i]['id'])) {
        $cart_contents_string .= '';
      } else {
        $cart_contents_string .= '';
      }

      $cart_contents_string .= $products[$i]['quantity'] . '&nbsp;x&nbsp;<a href="' . tep_href_link(FILENAME_PRODUCT_INFO, 'products_id=' . $products[$i]['id']) . '">';

      if ((tep_session_is_registered('new_products_id_in_cart')) && ($new_products_id_in_cart == $products[$i]['id'])) {
        $cart_contents_string .= '';
      } else {
        $cart_contents_string .= '';
      }

      $cart_contents_string .= $products[$i]['name'] . '</a>'.$after;

      if ((tep_session_is_registered('new_products_id_in_cart')) && ($new_products_id_in_cart == $products[$i]['id'])) {
        tep_session_unregister('new_products_id_in_cart');
      }
    }
    $cart_contents_string .= '';
  } else {
    $cart_contents_string .= $before. BOX_SHOPPING_CART_EMPTY.$after;
  }

  $box_contents .= $cart_contents_string;

  if ($cart->count_contents() > 0) {
    $box_contents .= $before;
    $box_contents .= $currencies->format($cart->show_total());
    $box_contents .= $after;
  }
  $box_contents .= '';
?>