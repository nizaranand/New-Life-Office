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
$module='';
  if (isset($HTTP_GET_VARS['products_id'])) {
    $allorders_query = tep_db_query("select p.products_id, p.products_image, p.products_price, p.products_tax_class_id from " . TABLE_ORDERS_PRODUCTS . " opa, " . TABLE_ORDERS_PRODUCTS . " opb, " . TABLE_ORDERS . " o, " . TABLE_PRODUCTS . " p where opa.products_id = '" . (int)$HTTP_GET_VARS['products_id'] . "' and opa.orders_id = opb.orders_id and opb.products_id != '" . (int)$HTTP_GET_VARS['products_id'] . "' and opb.products_id = p.products_id and opb.orders_id = o.orders_id and p.products_status = '1' group by p.products_id order by o.date_purchased desc limit " . MAX_DISPLAY_ALSO_PURCHASED);
    $num_products_ordered = tep_db_num_rows($allorders_query);
    if ($num_products_ordered >= MIN_DISPLAY_ALSO_PURCHASED) {
$module .= '<strong>'.TEXT_ALSO_PURCHASED_PRODUCTS .'</strong><hr />';
      while ($allorders = tep_db_fetch_array($allorders_query)) {
        $allorders['products_name'] = tep_get_products_name($allorders['products_id']);
$rows++;
$caption = htmlentities('<a href="' . tep_href_link(FILENAME_PRODUCT_INFO, 'products_id=' . $allorders['products_id']) . '">'.$allorders['products_name'].'</a><br /><b>' . $currencies->display_price($allorders['products_price'], tep_get_tax_rate($allorders['products_tax_class_id'])).'</b><br /><a href="' .tep_href_link(FILENAME_PRODUCTS_NEW, tep_get_all_get_params(array('action')) . 'action=buy_now&products_id=' . $allorders['products_id']). '">'.IMAGE_BUTTON_IN_CART.'</a><br />', ENT_QUOTES);

$module .= '<div id="ngg-image-'.$rows.'" class="ngg-gallery-thumbnail-box"  ><div class="ngg-gallery-thumbnail" >';
$module .= '<a href="' . tep_href_link(DIR_WS_IMAGES . $allorders['products_image']) . '" title="'.$caption.'" rel="lightbox[roadtrip2]">' . tep_image(DIR_WS_IMAGES . $allorders['products_image'], $allorders['products_name'], '', SMALL_IMAGE_HEIGHT,'class="Thumb"') . '</a>'."\n";
$module .= '</div>';
$module .= '</div>';
      }
$module .= '<div style="clear:both;height:10px"></div>'."\n";
    }
  }
?>