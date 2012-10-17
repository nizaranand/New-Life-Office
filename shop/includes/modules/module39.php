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
$page_content = '';
  $review_query = tep_db_query("select rd.reviews_text, r.reviews_rating, r.reviews_id, r.customers_name, r.date_added, r.reviews_read, p.products_id, p.products_price, p.products_tax_class_id, p.products_image, p.products_model, pd.products_name, pd.products_description from " . TABLE_REVIEWS . " r, " . TABLE_REVIEWS_DESCRIPTION . " rd, " . TABLE_PRODUCTS . " p, " . TABLE_PRODUCTS_DESCRIPTION . " pd where r.reviews_id = '" . (int)$HTTP_GET_VARS['reviews_id'] . "' and r.reviews_id = rd.reviews_id and rd.languages_id = '" . (int)$languages_id . "' and r.products_id = p.products_id and p.products_status = '1' and p.products_id = pd.products_id and pd.language_id = '". (int)$languages_id . "'");
  $review = tep_db_fetch_array($review_query);
  if ($new_price = tep_get_products_special_price($review['products_id'])) {
    $products_price = '<s>' . $currencies->display_price($review['products_price'], tep_get_tax_rate($review['products_tax_class_id'])) . '</s> <span class="productSpecialPrice">' . $currencies->display_price($new_price, tep_get_tax_rate($review['products_tax_class_id'])) . '</span>';
  } else {
    $products_price = $currencies->display_price($review['products_price'], tep_get_tax_rate($review['products_tax_class_id']));
  }

$products_name = $review['products_name'];


$page_content .= '<div style="clear:both;height:1px"></div>'."\n";

$page_content .= '<div class="ngg-albumoverview">'."\n";
$page_content .= '<div class="ngg-album">'."\n";
$page_content .= '<div class="ngg-albumcontent">'."\n";
$page_content .= '<div class="ngg-thumbnail">'."\n";
  if (tep_not_null($review['products_image'])) {
$page_content .= '<a href="' . tep_href_link(FILENAME_PRODUCT_INFO, 'products_id=' . $review['products_id']) . '">' . tep_image(DIR_WS_IMAGES . $review['products_image'], $review['products_name'], 2*SMALL_IMAGE_WIDTH, 2*SMALL_IMAGE_HEIGHT,'class="Thumb"') . '</a>'."\n";
}
$page_content .= '</div>'."\n";
$page_content .= '<div class="ngg-description">'."\n";
$page_content .= '<p>'."\n";
/// begin description
$page_content .= '<a href="' . tep_href_link(FILENAME_PRODUCT_INFO, 'products_id=' . $review['products_id']) . '"><b><u>' . $review['products_name'] . '</u></b></a>'."\n";
$page_content .= '<br />'."\n";
$page_content .= '<strong>'.$products_price.'</strong><br />';
if (tep_not_null($review['products_model'])) 
$page_content .= $review['products_model'] . '<br />'."\n";
$page_content .= '<small>'.short_name($review['products_description'],248).'</small><br />&nbsp;<br />'. "\n";
$page_content .= '<div style="text-align: center"><input type="button" class="'.cssclass('BUTTON_IN_CART').'" value="'.IMAGE_BUTTON_IN_CART.'" onclick="rk_redirect(\''. tep_href_link(basename($PHP_SELF), tep_get_all_get_params(array('action')) . 'action=buy_now') .'\');" /></div>'. "\n";
/// end description
$page_content .= '</p>'."\n";
$page_content .= '</div>'."\n";
$page_content .= '</div>'."\n";
$page_content .= '</div>'."\n";
$page_content .= '</div>'."\n";


$page_content .= '<div style="clear:both;height:1px"></div>'."\n";
$page_content .= '<i>' . sprintf(TEXT_REVIEW_RATING, tep_image(DIR_WS_IMAGES . 'stars_' . $review['reviews_rating'] . '.gif', sprintf(TEXT_OF_5_STARS, $review['reviews_rating'])), sprintf(TEXT_OF_5_STARS, $review['reviews_rating'])) . '</i>&nbsp;';

$page_content .= '<b>' . sprintf(TEXT_REVIEW_BY, tep_output_string_protected($review['customers_name'])) . '</b><br />'; 
$page_content .= '<small>'.sprintf(TEXT_REVIEW_DATE_ADDED, tep_date_long($review['date_added'])).'</small>'.'<br /><br />'; 
$page_content .= tep_break_string(nl2br(tep_output_string_protected($review['reviews_text'])), 60, '-<br />') . '<br /><br /><br />'; 


$page_content .= '<div  class="tablediv">';
$page_content .= '<div class="rowdiv">';
$page_content .= '<div  class="celldiv"><input type="button" class="'.cssclass('BUTTON_BACK').'" value="'.IMAGE_BUTTON_BACK.'" onclick="rk_redirect(\''. tep_href_link(FILENAME_PRODUCT_REVIEWS, tep_get_all_get_params(array('reviews_id'))) .'\');" /></div>';
$page_content .= '<div  class="celldiv"><input type="button" class="'.cssclass('BUTTON_WRITE_REVIEW').'" value="'.IMAGE_BUTTON_WRITE_REVIEW.'" onclick="rk_redirect(\''. tep_href_link(FILENAME_PRODUCT_REVIEWS_WRITE, tep_get_all_get_params(array('reviews_id'))) .'\');" /></div>';
$page_content .= '</div>';
$page_content .= '</div>';

$page_content .= '<div style="clear:both;height:10px"></div>'."\n";
?>