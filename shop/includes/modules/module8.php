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

  $best_query = tep_db_query("select p.products_id, pd.products_name, p.products_image, p.products_price, p.products_tax_class_id, p.products_date_added, m.manufacturers_name from " . TABLE_PRODUCTS . " p left join " . TABLE_MANUFACTURERS . " m on (p.manufacturers_id = m.manufacturers_id), " . TABLE_PRODUCTS_DESCRIPTION . " pd where p.products_status = '1' and p.products_ordered > 0 and p.products_id = pd.products_id and pd.language_id = '" . (int)$languages_id . "' order by p.products_ordered desc, pd.products_name limit " . MAX_DISPLAY_BESTSELLERS);

  if (tep_db_num_rows($best_query) > 0) {
    $rows = 0;
    while ($products_new = tep_db_fetch_array($best_query)) {
      if ($new_price = tep_get_products_special_price($products_new['products_id'])) {
        $products_price = '<s>' . $currencies->display_price($products_new['products_price'], tep_get_tax_rate($products_new['products_tax_class_id'])) . '</s> <strong>' . $currencies->display_price($new_price, tep_get_tax_rate($products_new['products_tax_class_id'])) . '</strong>';
      } else {
        $products_price = '<strong>'.$currencies->display_price($products_new['products_price'], tep_get_tax_rate($products_new['products_tax_class_id'])).'</strong>';
      }
    $rows++;
$page_content .= '<div class="rkImg"><a href="' . tep_href_link(FILENAME_PRODUCT_INFO, 'products_id=' . $products_new['products_id']) . '">' . tep_image(DIR_WS_IMAGES . $products_new['products_image'], $products_new['products_name'], SMALL_IMAGE_WIDTH, SMALL_IMAGE_HEIGHT) . '</a></div>'."\n";


$page_content .= '<div class="rkDescRight"><strong><font color="#C60000">'.$rows . '.</font></strong>&nbsp;<a href="' . tep_href_link(FILENAME_PRODUCT_INFO, 'products_id=' . $products_new['products_id']) . '"><b><u>' . $products_new['products_name'] . '</u></b></a><br /><small>' . TEXT_DATE_ADDED . ' ' . tep_date_long($products_new['products_date_added']) . '</small><br />';

if (tep_not_null($products_new['manufacturers_name'])) 
$page_content .= TEXT_MANUFACTURER . ' ' . $products_new['manufacturers_name'];

$page_content .= '<div style="text-align: right;">';

$page_content .= '<input type="button" class="'.cssclass('BUTTON_IN_CART').'" value="'.IMAGE_BUTTON_IN_CART.'" onclick="rk_redirect(\''. tep_href_link('bestsellers.php', tep_get_all_get_params(array('action')) . 'action=buy_now&products_id=' . $products_new['products_id']) .'\');" /></div>'; 
$page_content .=  TEXT_PRICE . ' ' . $products_price.'</div>'."\n";
$page_content .= '<div style="clear:both;height:10px"></div>';
    }
  } else {

$page_content .= TEXT_NO_NEW_PRODUCTS; 
  }
?>