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

  $products_new_array = array();

  $products_new_query_raw = "select p.products_id, pd.products_name, p.products_image, p.products_price, p.products_tax_class_id, p.products_date_added, m.manufacturers_name from " . TABLE_PRODUCTS . " p left join " . TABLE_MANUFACTURERS . " m on (p.manufacturers_id = m.manufacturers_id), " . TABLE_PRODUCTS_DESCRIPTION . " pd where p.products_status = '1' and p.products_id = pd.products_id and pd.language_id = '" . (int)$languages_id . "' order by p.products_date_added DESC, pd.products_name";
  $products_new_split = new splitPageResults($products_new_query_raw, MAX_DISPLAY_PRODUCTS_NEW);

  if (($products_new_split->number_of_rows > 0) && ((PREV_NEXT_BAR_LOCATION == '1') || (PREV_NEXT_BAR_LOCATION == '3'))) {

$page_content .= '<div style="clear:both;height:1px"></div>'."\n";
$page_content .= '<div style="text-align:right"><small>'.$products_new_split->display_count(TEXT_DISPLAY_NUMBER_OF_PRODUCTS_NEW). '&nbsp;'.TEXT_RESULT_PAGE . ' ' . $products_new_split->display_links(MAX_DISPLAY_PAGE_LINKS, tep_get_all_get_params(array('page', 'info', 'x', 'y'))). '</small></div>';
$page_content .= '<div style="clear:both;height:1px"></div>'."\n";

  }

  if ($products_new_split->number_of_rows > 0) {
    $products_new_query = tep_db_query($products_new_split->sql_query);

$page_content .= '<div class="ngg-albumoverview">'."\n";	

    while ($products_new = tep_db_fetch_array($products_new_query)) {
      if ($new_price = tep_get_products_special_price($products_new['products_id'])) {
        $products_price = '<s>' . $currencies->display_price($products_new['products_price'], tep_get_tax_rate($products_new['products_tax_class_id'])) . '</s> <strong><font color="#C60000">' . $currencies->display_price($new_price, tep_get_tax_rate($products_new['products_tax_class_id'])) . '</font></strong>';
      } else {
        $products_price = '<strong>'.$currencies->display_price($products_new['products_price'], tep_get_tax_rate($products_new['products_tax_class_id'])).'</strong>';
      }

$page_content .= '<div class="ngg-album">'."\n";
$page_content .= '<div class="ngg-albumcontent">'."\n";
$page_content .= '<div class="ngg-thumbnail">'."\n";
$page_content .= '<a href="' . tep_href_link(FILENAME_PRODUCT_INFO, 'products_id=' . $products_new['products_id']) . '">' . tep_image(DIR_WS_IMAGES . $products_new['products_image'], $products_new['products_name'], SMALL_IMAGE_WIDTH, '') . '</a>'."\n";
$page_content .= '</div>'."\n";
$page_content .= '<div class="ngg-description">'."\n";
/// begin description
$page_content .= '<p>'."\n";
$page_content .= '<a href="' . tep_href_link(FILENAME_PRODUCT_INFO, 'products_id=' . $products_new['products_id']) . '"><b><u>' . $products_new['products_name'] . '</u></b></a><br />'."\n";
$page_content .= '<small>' . TEXT_DATE_ADDED . ' ' . tep_date_long($products_new['products_date_added']) . '</small><br />';
if (tep_not_null($products_new['manufacturers_name'])) 
$page_content .= TEXT_MANUFACTURER . ' ' . $products_new['manufacturers_name'];
$page_content .= '<div style="text-align: right;">';
$page_content .= '<input type="button" class="'.cssclass('BUTTON_IN_CART').'" value="'.IMAGE_BUTTON_IN_CART.'" onclick="rk_redirect(\''. tep_href_link(FILENAME_PRODUCTS_NEW, tep_get_all_get_params(array('action')) . 'action=buy_now&products_id=' . $products_new['products_id']) .'\');" /></div>';
$page_content .= TEXT_PRICE . ' ' . $products_price .'';
$page_content .= '</p>'."\n";
/// end description
$page_content .= '</div>'."\n";
$page_content .= '</div>'."\n";
$page_content .= '</div>'."\n";
    }
$page_content .= '<div class="ngg-clear">&nbsp;</div>'."\n"; 	
$page_content .= '</div>'."\n";
  } else {

$page_content .= TEXT_NO_NEW_PRODUCTS; 
  }
  if (($products_new_split->number_of_rows > 0) && ((PREV_NEXT_BAR_LOCATION == '2') || (PREV_NEXT_BAR_LOCATION == '3'))) {

$page_content .= '<div style="clear:both;height:1px"></div>'."\n";
$page_content .= '<div style="text-align:right"><small>'.$products_new_split->display_count(TEXT_DISPLAY_NUMBER_OF_PRODUCTS_NEW). '&nbsp;'.TEXT_RESULT_PAGE . ' ' . $products_new_split->display_links(MAX_DISPLAY_PAGE_LINKS, tep_get_all_get_params(array('page', 'info', 'x', 'y'))). '</small></div>';
$page_content .= '<div style="clear:both;height:1px"></div>'."\n";

  }
?>