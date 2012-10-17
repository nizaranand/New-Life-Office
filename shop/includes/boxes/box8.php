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
if (!tep_not_null($width))  $width = SMALL_IMAGE_WIDTH;
if (!tep_not_null($height)) $height = SMALL_IMAGE_HEIGHT;
if (!tep_not_null($limit)) $limit = 1;

  if ($random_product = tep_random_select("select p.products_id, pd.products_name, p.products_price, p.products_tax_class_id, p.products_image, s.specials_new_products_price from " . TABLE_PRODUCTS . " p, " . TABLE_PRODUCTS_DESCRIPTION . " pd, " . TABLE_SPECIALS . " s where p.products_status = '1' and p.products_id = s.products_id and pd.products_id = s.products_id and pd.language_id = '" . (int)$languages_id . "' and s.status = '1' order by s.specials_date_added desc limit " . $limit)) {

$box_contents = '';
$new_price = '<s><strong>' . $currencies->display_price($random_product['products_price'], tep_get_tax_rate($random_product['products_tax_class_id'])) . '</s>&nbsp;<span class="productSpecialPrice">' . $currencies->display_price($random_product['specials_new_products_price'], tep_get_tax_rate($random_product['products_tax_class_id'])) . '</span></strong>';

$caption = htmlentities('<a href="' . tep_href_link(FILENAME_PRODUCT_INFO, 'products_id=' . $random_product['products_id']) . '">' . $random_product['products_name'].'</a><br />'.$new_price, ENT_QUOTES);

$box_contents .= $before .'<div id="ngg-image-644515" class="ngg-gallery-thumbnail-box" style="width:100%;" ><div class="ngg-gallery-thumbnail" ><a rel="lightbox" title="'.$caption.'" href="'.tep_href_link(DIR_WS_IMAGES . $random_product['products_image']).'" class="shutterset_test" >'.tep_image(DIR_WS_IMAGES . $random_product['products_image'], $random_product['products_name'], $width, $height, $class).'</a></div></div>';

$box_contents .= '<p style="text-align: center"><a href="' . tep_href_link(FILENAME_PRODUCT_INFO, 'products_id=' . $random_product["products_id"]) . '">' .$random_product['products_name'].'</a><br />' . $new_price.'</p>'.$after;
  }
?>