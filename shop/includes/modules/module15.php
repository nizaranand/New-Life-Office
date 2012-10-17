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

  $product_info_query = tep_db_query("select p.products_id, p.products_model, p.products_image, p.products_price, p.products_tax_class_id, pd.products_name,pd.products_description from " . TABLE_PRODUCTS . " p, " . TABLE_PRODUCTS_DESCRIPTION . " pd where p.products_id = '" . (int)$HTTP_GET_VARS['products_id'] . "' and p.products_status = '1' and p.products_id = pd.products_id and pd.language_id = '" . (int)$languages_id . "'");
  if (!tep_db_num_rows($product_info_query)) {
    tep_redirect(tep_href_link(FILENAME_REVIEWS));
  } else {
    $product_info = tep_db_fetch_array($product_info_query);
  }

  if ($new_price = tep_get_products_special_price($product_info['products_id'])) {
    $products_price = '<s>' . $currencies->display_price($product_info['products_price'], tep_get_tax_rate($product_info['products_tax_class_id'])) . '</s> <span class="productSpecialPrice">' . $currencies->display_price($new_price, tep_get_tax_rate($product_info['products_tax_class_id'])) . '</span>';
  } else {
    $products_price = $currencies->display_price($product_info['products_price'], tep_get_tax_rate($product_info['products_tax_class_id']));
  }

 
    $products_name = BOX_HEADING_REVIEWS. ' &raquo; '.$product_info['products_name'];
 

  $reviews_query_raw = "select r.reviews_id, left(rd.reviews_text, 100) as reviews_text, r.reviews_rating, r.date_added, r.customers_name from " . TABLE_REVIEWS . " r, " . TABLE_REVIEWS_DESCRIPTION . " rd where r.products_id = '" . (int)$product_info['products_id'] . "' and r.reviews_id = rd.reviews_id and rd.languages_id = '" . (int)$languages_id . "' order by r.reviews_id desc";
  $reviews_split = new splitPageResults($reviews_query_raw, MAX_DISPLAY_NEW_REVIEWS);

  if ($reviews_split->number_of_rows > 0) {
    if ((PREV_NEXT_BAR_LOCATION == '1') || (PREV_NEXT_BAR_LOCATION == '3')) {

$page_content .= '<div style="clear:both;height:1px"></div>'."\n";
$page_content .= '<div style="text-align:right"><small>'.$reviews_split->display_count(TEXT_DISPLAY_NUMBER_OF_REVIEWS).'&nbsp;'. TEXT_RESULT_PAGE . ' ' . $reviews_split->display_links(MAX_DISPLAY_PAGE_LINKS, tep_get_all_get_params(array('page', 'info'))).'</small></div>'."\n";
$page_content .= '<div style="clear:both;height:1px"></div>'."\n";

    }


$page_content .= '<div style="clear:both;height:1px"></div>'."\n";

$page_content .= '<div class="ngg-albumoverview">'."\n";
$page_content .= '<div class="ngg-album">'."\n";
$page_content .= '<div class="ngg-albumcontent">'."\n";

if (tep_not_null($product_info['products_image'])) {

$page_content .= '<div class="ngg-thumbnail">'."\n";
$page_content .= '<a rel="lightbox" href="' . tep_href_link(DIR_WS_IMAGES . $product_info['products_image']) . '"  title="'.$product_info['products_name'].'">' . tep_image(DIR_WS_IMAGES . $product_info['products_image'], $product_info['products_name'], 2*SMALL_IMAGE_WIDTH, 2*SMALL_IMAGE_HEIGHT) . '</a>'."\n";
$page_content .= '</div>'."\n";
}
$page_content .= '<div class="ngg-description">'."\n";
$page_content .= '<p>'."\n";
/// begin description
$page_content .= '<a href="' . tep_href_link(FILENAME_PRODUCT_INFO, 'products_id=' . $product_info['products_id']) . '"><b><u>' . $product_info['products_name'] . '</u></b></a>'."\n";
$page_content .= '<br />'."\n";
$page_content .= '<strong>'.$products_price.'</strong><br />';
if (tep_not_null($product_info['products_model'])) 
$page_content .= $product_info['products_model'] . '<br />'."\n";
$page_content .= '<small>'.short_name($product_info['products_description'],248).'</small><br />&nbsp;<br />'. "\n";

$page_content .= '<div style="text-align: center"><input type="button" class="'.cssclass('BUTTON_IN_CART').'" value="'.IMAGE_BUTTON_IN_CART.'" onclick="rk_redirect(\''. tep_href_link(basename($PHP_SELF), tep_get_all_get_params(array('action')) . 'action=buy_now' ) .'\');"></div>'. "\n";
/// end description
$page_content .= '</p>'."\n";
$page_content .= '</div>'."\n";
$page_content .= '</div>'."\n";
$page_content .= '</div>'."\n";
$page_content .= '</div>'."\n";



$page_content .= '<div style="clear:both;height:1px"></div>'."\n";


    $reviews_query = tep_db_query($reviews_split->sql_query);
    while ($reviews = tep_db_fetch_array($reviews_query)) {

$page_content .= '<a href="' . tep_href_link(FILENAME_PRODUCT_REVIEWS_INFO, 'products_id=' . $product_info['products_id'] . '&reviews_id=' . $reviews['reviews_id']) . '"><u><b>' . $product_info['products_name'] . '</b></u></a> '."\n";

$page_content .= sprintf(TEXT_REVIEW_BY, '<b>'.tep_output_string_protected($reviews['customers_name']).'</b>') . "\n";

$page_content .= '<br />' .'<small>'. sprintf(TEXT_REVIEW_DATE_ADDED, tep_date_long($reviews['date_added'])).'</small>'."\n"; 

$page_content .= '<div class="rkDescRight">'. tep_break_string(tep_output_string_protected($reviews['reviews_text']), 60, '-<br />') . ((strlen($reviews['reviews_text']) >= 100) ? '..' : '') . '<br /><br /><i>' . sprintf(TEXT_REVIEW_RATING, tep_image(DIR_WS_IMAGES . 'stars_' . $reviews['reviews_rating'] . '.gif', sprintf(TEXT_OF_5_STARS, $reviews['reviews_rating'])), sprintf(TEXT_OF_5_STARS, $reviews['reviews_rating'])) . '</i></div>'."\n";

$page_content .= '<div style="clear:both;height:10px"></div><hr />'."\n";

    }

  } else {
/// no review

$page_content .= '<div style="clear:both;height:1px"></div>'."\n";

$page_content .= '<div class="ngg-albumoverview">'."\n";
$page_content .= '<div class="ngg-album">'."\n";
$page_content .= '<div class="ngg-albumcontent">'."\n";

if (tep_not_null($product_info['products_image'])) {

$page_content .= '<div class="ngg-thumbnail">'."\n";
$page_content .= '<a rel="lightbox" href="' . tep_href_link(DIR_WS_IMAGES . $product_info['products_image']) . '" title="'.$product_info['products_name'].'">' . tep_image(DIR_WS_IMAGES . $product_info['products_image'], $product_info['products_name'], 2*SMALL_IMAGE_WIDTH, 2*SMALL_IMAGE_HEIGHT) . '</a>'."\n";
$page_content .= '</div>'."\n";
}
$page_content .= '<div class="ngg-description">'."\n";
$page_content .= '<p>'."\n";
/// begin description
$page_content .= '<a href="' . tep_href_link(FILENAME_PRODUCT_INFO, 'products_id=' . $product_info['products_id']) . '"><b><u>' . $product_info['products_name'] . '</u></b></a>'."\n";
$page_content .= '<br />'."\n";
$page_content .= '<strong>'.$products_price.'</strong><br />';
if (tep_not_null($product_info['products_model'])) 
$page_content .= $product_info['products_model'] . '<br />'."\n";
$page_content .= '<small>'.short_name($product_info['products_description'],248).'</small><br />&nbsp;<br />'. "\n";

$page_content .= '<div style="text-align: center"><input type="button" class="'.cssclass('BUTTON_IN_CART').'" value="'.IMAGE_BUTTON_IN_CART.'" onclick="rk_redirect(\''. tep_href_link(basename($PHP_SELF), tep_get_all_get_params(array('action')) . 'action=buy_now' ) .'\');"></div>'. "\n";
/// end description
$page_content .= '</p>'."\n";
$page_content .= '</div>'."\n";
$page_content .= '</div>'."\n";
$page_content .= '</div>'."\n";
$page_content .= '</div>'."\n";



$page_content .= '<div style="clear:both;height:1px"></div>'."\n";
$page_content .= '<br /><br />'.TEXT_NO_REVIEWS . '<br /><br />' ;
  }

  if (($reviews_split->number_of_rows > 0) && ((PREV_NEXT_BAR_LOCATION == '2') || (PREV_NEXT_BAR_LOCATION == '3'))) {

$page_content .= '<div style="clear:both;height:1px"></div>'."\n";
$page_content .= '<div style="text-align:right"><small>'.$reviews_split->display_count(TEXT_DISPLAY_NUMBER_OF_REVIEWS).'&nbsp;'. TEXT_RESULT_PAGE . ' ' . $reviews_split->display_links(MAX_DISPLAY_PAGE_LINKS, tep_get_all_get_params(array('page', 'info'))).'</small></div>'."\n";
$page_content .= '<div style="clear:both;height:1px"></div>'."\n";

  }

$page_content .= '<div style="clear:both;height:10px"></div>';

$page_content .= '<div  class="tablediv">';
$page_content .= '<div class="rowdiv">';
$page_content .= '<div  class="celldiv"><input type="button" class="'.cssclass('BUTTON_BACK').'" value="'.IMAGE_BUTTON_BACK.'" onclick="rk_redirect(\''. tep_href_link(FILENAME_PRODUCT_INFO, tep_get_all_get_params()) . '\');" /></div>';
$page_content .= '<div  class="celldiv"><input type="button" class="'.cssclass('BUTTON_WRITE_REVIEW').'" value="'.IMAGE_BUTTON_WRITE_REVIEW.'" onclick="rk_redirect(\''. tep_href_link(FILENAME_PRODUCT_REVIEWS_WRITE, tep_get_all_get_params()) .'\');" /></div>';
$page_content .= '</div>';
$page_content .= '</div>';

$page_content .= '<div style="clear:both;height:10px"></div>';
?>