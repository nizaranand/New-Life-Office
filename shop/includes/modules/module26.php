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
$orders_total = tep_count_customer_orders();

if ($orders_total > 0) {
    $history_query_raw = "select o.orders_id, o.date_purchased, o.delivery_name, o.billing_name, ot.text as order_total, s.orders_status_name from " . TABLE_ORDERS . " o, " . TABLE_ORDERS_TOTAL . " ot, " . TABLE_ORDERS_STATUS . " s where o.customers_id = '" . (int)$customer_id . "' and o.orders_id = ot.orders_id and ot.class = 'ot_total' and o.orders_status = s.orders_status_id and s.language_id = '" . (int)$languages_id . "' and s.public_flag = '1' order by orders_id DESC";
    $history_split = new splitPageResults($history_query_raw, MAX_DISPLAY_ORDER_HISTORY);
    $history_query = tep_db_query($history_split->sql_query);

    while ($history = tep_db_fetch_array($history_query)) {
      $products_query = tep_db_query("select count(*) as count from " . TABLE_ORDERS_PRODUCTS . " where orders_id = '" . (int)$history['orders_id'] . "'");
      $products = tep_db_fetch_array($products_query);

      if (tep_not_null($history['delivery_name'])) {
        $order_type = TEXT_ORDER_SHIPPED_TO;
        $order_name = $history['delivery_name'];
      } else {
        $order_type = TEXT_ORDER_BILLED_TO;
        $order_name = $history['billing_name'];
      }

$page_content .= '<strong>'.TEXT_ORDER_NUMBER.'</strong> ' . $history['orders_id'];

$page_content .= '&nbsp;(<a href="' . tep_href_link(FILENAME_ACCOUNT_HISTORY_INFO, (isset($HTTP_GET_VARS['page']) ? 'page=' . $HTTP_GET_VARS['page'] . '&' : '') . 'order_id=' . $history['orders_id'], 'SSL') . '">' . SMALL_IMAGE_BUTTON_VIEW . '</a>)';

$page_content .= '<hr />';
$page_content .= '<div class="rkDescRight">';

$page_content .= tep_image(DIR_WS_IMAGES . 'arrow_green.gif') . ' <b>' . TEXT_ORDER_STATUS . '</b> ' . $history['orders_status_name'].'<br />';

$page_content .= tep_image(DIR_WS_IMAGES . 'arrow_green.gif') . ' <b>' . TEXT_ORDER_DATE . '</b> ' . tep_date_long($history['date_purchased']).'<br />';

$page_content .= tep_image(DIR_WS_IMAGES . 'arrow_green.gif') . ' <b>' . $order_type . '</b> ' . tep_output_string_protected($order_name).'<br />';

$page_content .= tep_image(DIR_WS_IMAGES . 'arrow_green.gif') . ' <b>' . TEXT_ORDER_PRODUCTS . '</b> ' . $products['count'].'<br />';
$page_content .= tep_image(DIR_WS_IMAGES . 'arrow_green.gif') . ' <b>' . TEXT_ORDER_COST . '</b> ' . strip_tags($history['order_total']).'<br />';

$page_content .= '</div>';
$page_content .= '<div style="clear:both;height:10px"></div>';

    }
  } else {
$page_content .= TEXT_NO_PURCHASES.'<br />';
  }
  if ($orders_total > 0) {

$page_content .= '<div style="clear:both;height:10px"></div>'."\n";
$page_content .= '<div style="text-align:right">'.$history_split->display_count(TEXT_DISPLAY_NUMBER_OF_ORDERS).'&nbsp;'.TEXT_RESULT_PAGE . ' ' . $history_split->display_links(MAX_DISPLAY_PAGE_LINKS, tep_get_all_get_params(array('page', 'info', 'x', 'y'))).'</div><br />'."\n";
$page_content .= '<div style="clear:both;height:10px"></div>'."\n";
}

$page_content .= '<div class="rkDescRight">' .'<input type="button" class="'.cssclass('BUTTON_BACK').'" value="'.IMAGE_BUTTON_BACK.'" onclick="javascript:rk_redirect(\''. tep_href_link(FILENAME_ACCOUNT, '', 'SSL') .'\');"></div>';

$page_content .= '<div style="clear:both;height:10px"></div>'."\n";
?>