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
if ($messageStack->size('account') > 0) {
$page_content .= $messageStack->output('account').'<br />';
}

if (tep_count_customer_orders() > 0) {
$page_content .= '<strong>'.OVERVIEW_TITLE.'</strong>&nbsp;&nbsp;'.'<a href="' . tep_href_link(FILENAME_ACCOUNT_HISTORY, '', 'SSL') . '"><u>' . OVERVIEW_SHOW_ALL_ORDERS . '</u></a>'.'<br />';

$page_content .= '<div class="rkImg"><b>' . OVERVIEW_PREVIOUS_ORDERS . '</b><br>' . tep_image(DIR_WS_IMAGES . 'arrow_south_east.gif').'</div>'."\n";
$page_content .= '<div class="rkDescRight"><br />';
    $orders_query = tep_db_query("select o.orders_id, o.date_purchased, o.delivery_name, o.delivery_country, o.billing_name, o.billing_country, ot.text as order_total, s.orders_status_name from " . TABLE_ORDERS . " o, " . TABLE_ORDERS_TOTAL . " ot, " . TABLE_ORDERS_STATUS . " s where o.customers_id = '" . (int)$customer_id . "' and o.orders_id = ot.orders_id and ot.class = 'ot_total' and o.orders_status = s.orders_status_id and s.language_id = '" . (int)$languages_id . "' and s.public_flag = '1' order by orders_id desc limit 3");
    while ($orders = tep_db_fetch_array($orders_query)) {
      if (tep_not_null($orders['delivery_name'])) {
        $order_name = $orders['delivery_name'];
        $order_country = $orders['delivery_country'];
      } else {
        $order_name = $orders['billing_name'];
        $order_country = $orders['billing_country'];
      }
$page_content .= '<span class="moduleRow" onMouseOver="rowOverEffect(this);" onMouseOut="rowOutEffect(this);">'."\n";
$page_content .= tep_date_short($orders['date_purchased']).'&nbsp;'."\n";
$page_content .= '#' . $orders['orders_id'].'&nbsp;'."\n";
$page_content .= $orders['orders_status_name'].'&nbsp;'."\n";
$page_content .= $orders['order_total']."\n";
$page_content .= '&nbsp;(<a href="' . tep_href_link(FILENAME_ACCOUNT_HISTORY_INFO, 'order_id=' . $orders['orders_id'], 'SSL') . '">' . SMALL_IMAGE_BUTTON_VIEW . '</a>)'."\n";
$page_content .= '</span>'."\n";
} /// end while
$page_content .= '</div>'."\n";
$page_content .= '<div style="clear:both;height:10px"></div>'."\n";
} /// end if order


$page_content .= '<strong>'.MY_ACCOUNT_TITLE.'</strong>'.'<br />';
$page_content .= '<div class="rkImg">'.tep_image(DIR_WS_IMAGES . 'account_personal.gif').'</div>'."\n";
$page_content .= '<div class="rkDescRight">';
$page_content .= tep_image(DIR_WS_IMAGES . 'arrow_green.gif') . ' <a href="' . tep_href_link(FILENAME_ACCOUNT_EDIT, '', 'SSL') . '">' . MY_ACCOUNT_INFORMATION . '</a>'.'<br />'."\n";
$page_content .= tep_image(DIR_WS_IMAGES . 'arrow_green.gif') . ' <a href="' . tep_href_link(FILENAME_ADDRESS_BOOK, '', 'SSL') . '">' . MY_ACCOUNT_ADDRESS_BOOK . '</a>'.'<br />'."\n";
$page_content .= tep_image(DIR_WS_IMAGES . 'arrow_green.gif') . ' <a href="' . tep_href_link(FILENAME_ACCOUNT_PASSWORD, '', 'SSL') . '">' . MY_ACCOUNT_PASSWORD . '</a>'.'<br />'."\n";
$page_content .= '</div>'."\n";
$page_content .= '<div style="clear:both;height:10px"></div>'."\n";



$page_content .= '<strong>'.MY_ORDERS_TITLE.'</strong>'.'<br />';
$page_content .= '<div class="rkImg">'.tep_image(DIR_WS_IMAGES . 'account_orders.gif').'</div>'."\n";
$page_content .= '<div class="rkDescRight">';
$page_content .= tep_image(DIR_WS_IMAGES . 'arrow_green.gif') . ' <a href="' . tep_href_link(FILENAME_ACCOUNT_HISTORY, '', 'SSL') . '">' . MY_ORDERS_VIEW . '</a>'.'<br />'."\n";
$page_content .= '</div>'."\n";
$page_content .= '<div style="clear:both;height:10px"></div>'."\n";



$page_content .= '<strong>'.EMAIL_NOTIFICATIONS_TITLE.'</strong>'.'<br />';
$page_content .= '<div class="rkImg">'.tep_image(DIR_WS_IMAGES . 'account_notifications.gif').'</div>'."\n";
$page_content .= '<div class="rkDescRight">';

$page_content .= tep_image(DIR_WS_IMAGES . 'arrow_green.gif') . ' <a href="' . tep_href_link(FILENAME_ACCOUNT_NEWSLETTERS, '', 'SSL') . '">' . EMAIL_NOTIFICATIONS_NEWSLETTERS . '</a>'.'<br />'."\n";

$page_content .= tep_image(DIR_WS_IMAGES . 'arrow_green.gif') . ' <a href="' . tep_href_link(FILENAME_ACCOUNT_NOTIFICATIONS, '', 'SSL') . '">' . EMAIL_NOTIFICATIONS_PRODUCTS . '</a>'.'<br />'."\n";

$page_content .= '</div>'."\n";
$page_content .= '<div style="clear:both;height:10px"></div>'."\n";
?>