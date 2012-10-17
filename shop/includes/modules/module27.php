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
$page_content .= '<table border="0" width="100%" cellspacing="3" cellpadding="3">'."\n";
$page_content .= '<tr>'."\n";
$page_content .= '<td width="100%" valign="top"><table border="0" width="100%" cellspacing="0" cellpadding="0">'."\n";
$page_content .= '<tr>'."\n";
$page_content .= '<td><table border="0" width="100%" cellspacing="0" cellpadding="2">'."\n";
$page_content .= '<tr>'."\n";
$page_content .= '<td class="main" colspan="2"><b>'. sprintf(HEADING_ORDER_NUMBER, $HTTP_GET_VARS['order_id']) . ' <small>(' . $order->info['orders_status'] . ')</small>'.'</b></td>'."\n";
$page_content .= '</tr>'."\n";
$page_content .= '<tr>'."\n";
$page_content .= '<td class="smallText">'.HEADING_ORDER_DATE . ' ' . tep_date_long($order->info['date_purchased']).'</td>'."\n";
$page_content .= '<td class="smallText" align="right">'.HEADING_ORDER_TOTAL . ' ' . $order->info['total'].'</td>'."\n";
$page_content .= '</tr>'."\n";
$page_content .= '</table></td>'."\n";
$page_content .= '</tr>'."\n";
$page_content .= '<tr>'."\n";
$page_content .= '<td><table border="0" width="100%" cellspacing="1" cellpadding="2" class="infoBox">'."\n";
$page_content .= '<tr class="infoBoxContents">'."\n";
if ($order->delivery != false) {

$page_content .= '<td width="30%" valign="top"><table border="0" width="100%" cellspacing="0" cellpadding="2">'."\n";
$page_content .= '<tr>'."\n";
$page_content .= '<td class="main"><b>'. HEADING_DELIVERY_ADDRESS.'</b></td>'."\n";
$page_content .= '</tr>'."\n";
$page_content .= '<tr>'."\n";
$page_content .= '<td class="main">'. tep_address_format($order->delivery['format_id'], $order->delivery, 1, ' ', '<br>').'</td>'."\n";
$page_content .= '</tr>'."\n";

if (tep_not_null($order->info['shipping_method'])) {

$page_content .= '<tr>'."\n";
$page_content .= '<td class="main"><b>'.HEADING_SHIPPING_METHOD.'</b></td>'."\n";
$page_content .= '</tr>'."\n";
$page_content .= '<tr>'."\n";
$page_content .= '<td class="main">'.$order->info['shipping_method'].'</td>'."\n";
$page_content .= '</tr>'."\n";
    }
$page_content .= '</table></td>'."\n";

  }

$page_content .= '<td width="'.(($order->delivery != false) ? '70%' : '100%').'" valign="top"><table border="0" width="100%" cellspacing="0" cellpadding="0">'."\n";

$page_content .= '<tr>'."\n";
$page_content .= '<td><table border="0" width="100%" cellspacing="0" cellpadding="2">'."\n";
  if (sizeof($order->info['tax_groups']) > 1) {

$page_content .= '<tr>'."\n";
$page_content .= '<td class="main" colspan="2"><b>'. HEADING_PRODUCTS .'</b></td>'."\n";
$page_content .= '<td class="smallText" align="right"><b>'. HEADING_TAX.'</b></td>'."\n";
$page_content .= '<td class="smallText" align="right"><b>'. HEADING_TOTAL.'</b></td>'."\n";
$page_content .= '</tr>'."\n";
  } else {
$page_content .= '<tr>'."\n";
$page_content .= '<td class="main" colspan="3"><b>'.HEADING_PRODUCTS.'</b></td>'."\n";
$page_content .= '</tr>'."\n";
}

for ($i=0, $n=sizeof($order->products); $i<$n; $i++) {
$page_content .= '<tr>' . "\n" .
         '            <td class="main" align="right" valign="top" width="30">' . $order->products[$i]['qty'] . '&nbsp;x</td>' . "\n" .
         '            <td class="main" valign="top">' . $order->products[$i]['name'];

    if ( (isset($order->products[$i]['attributes'])) && (sizeof($order->products[$i]['attributes']) > 0) ) {
      for ($j=0, $n2=sizeof($order->products[$i]['attributes']); $j<$n2; $j++) {
$page_content .= '<br><nobr><small>&nbsp;<i> - ' . $order->products[$i]['attributes'][$j]['option'] . ': ' . $order->products[$i]['attributes'][$j]['value'] . '</i></small></nobr>';
      }
    }

$page_content .= '</td>' . "\n";

    if (sizeof($order->info['tax_groups']) > 1) {
$page_content .= '<td class="main" valign="top" align="right">' . tep_display_tax_value($order->products[$i]['tax']) . '%</td>' . "\n";
    }

$page_content .= '<td class="main" align="right" valign="top">' . $currencies->format(tep_add_tax($order->products[$i]['final_price'], $order->products[$i]['tax']) * $order->products[$i]['qty'], true, $order->info['currency'], $order->info['currency_value']) . '</td>' . "\n" .
         '          </tr>' . "\n";
  }

$page_content .= '</table></td>' . "\n";
$page_content .= '</tr>' . "\n";
$page_content .= '</table></td>' . "\n";
$page_content .= '</tr>' . "\n";
$page_content .= '</table></td>' . "\n";
$page_content .= '</tr>' . "\n";
$page_content .= '<tr>' . "\n";
$page_content .= '<td>'.tep_draw_separator('pixel_trans.gif', '100%', '10').'</td>' . "\n";
$page_content .= '</tr>' . "\n";
$page_content .= '<tr>' . "\n";
$page_content .= '<td class="main"><b>'.HEADING_BILLING_INFORMATION.'</b></td>' . "\n";
$page_content .= '</tr>' . "\n";
$page_content .= '<tr>' . "\n";
$page_content .= '<td>'. tep_draw_separator('pixel_trans.gif', '100%', '10').'</td>' . "\n";
$page_content .= '</tr>' . "\n";
$page_content .= '<tr>' . "\n";
$page_content .= '<td><table border="0" width="100%" cellspacing="1" cellpadding="2" class="infoBox">' . "\n";
$page_content .= '<tr class="infoBoxContents">' . "\n";
$page_content .= '<td width="30%" valign="top"><table border="0" width="100%" cellspacing="0" cellpadding="2">' . "\n";
$page_content .= '<tr>' . "\n";
$page_content .= '<td class="main"><b>'. HEADING_BILLING_ADDRESS.'</b></td>' . "\n";
$page_content .= '</tr>' . "\n";
$page_content .= '<tr>' . "\n";
$page_content .= '<td class="main">'. tep_address_format($order->billing['format_id'], $order->billing, 1, ' ', '<br>').'</td>' . "\n";
$page_content .= '</tr>' . "\n";
$page_content .= '<tr>' . "\n";
$page_content .= '<td class="main"><b>'.HEADING_PAYMENT_METHOD.'</b></td>' . "\n";
$page_content .= '</tr>' . "\n";
$page_content .= '<tr>' . "\n";
$page_content .= '<td class="main">'.$order->info['payment_method'].'</td>' . "\n";
$page_content .= '</tr>' . "\n";
$page_content .= '</table></td>' . "\n";
$page_content .= '<td width="70%" valign="top"><table border="0" width="100%" cellspacing="0" cellpadding="2">' . "\n";

  for ($i=0, $n=sizeof($order->totals); $i<$n; $i++) {
$page_content .= ' <tr>' . "\n" .
         '                <td class="main" align="right" width="100%">' . $order->totals[$i]['title'] . '</td>' . "\n" .
         '                <td class="main" align="right">' . $order->totals[$i]['text'] . '</td>' . "\n" .
         '              </tr>' . "\n";
  }
$page_content .= '</table></td>' . "\n";
$page_content .= '</tr>' . "\n";
$page_content .= '</table></td>' . "\n";
$page_content .= ' </tr>' . "\n";
$page_content .= '<tr>' . "\n";
$page_content .= '<td>'.tep_draw_separator('pixel_trans.gif', '100%', '10').'</td>' . "\n";
$page_content .= '</tr>' . "\n";
$page_content .= '<tr>' . "\n";
$page_content .= '<td class="main"><b>'.HEADING_ORDER_HISTORY.'</b></td>' . "\n";
$page_content .= '</tr>' . "\n";
$page_content .= '<tr>' . "\n";
$page_content .= '<td>'.tep_draw_separator('pixel_trans.gif', '100%', '10').'</td>' . "\n";
$page_content .= '</tr>' . "\n";
$page_content .= '<tr>' . "\n";
$page_content .= '<td><table border="0" width="100%" cellspacing="1" cellpadding="2" class="infoBox">' . "\n";
$page_content .= '<tr class="infoBoxContents">' . "\n";
$page_content .= '<td valign="top"><table border="0" width="100%" cellspacing="0" cellpadding="2">' . "\n";

  $statuses_query = tep_db_query("select os.orders_status_name, osh.date_added, osh.comments from " . TABLE_ORDERS_STATUS . " os, " . TABLE_ORDERS_STATUS_HISTORY . " osh where osh.orders_id = '" . (int)$HTTP_GET_VARS['order_id'] . "' and osh.orders_status_id = os.orders_status_id and os.language_id = '" . (int)$languages_id . "' and os.public_flag = '1' order by osh.date_added");
  while ($statuses = tep_db_fetch_array($statuses_query)) {
$page_content .= ' <tr>' . "\n" .
         '                <td class="main" valign="top" width="70">' . tep_date_short($statuses['date_added']) . '</td>' . "\n" .
         '                <td class="main" valign="top" width="70">' . $statuses['orders_status_name'] . '</td>' . "\n" .
         '                <td class="main" valign="top">' . (empty($statuses['comments']) ? '&nbsp;' : nl2br(tep_output_string_protected($statuses['comments']))) . '</td>' . "\n" .
         '              </tr>' . "\n";
  }

$page_content .= '</table></td>' . "\n";
$page_content .= ' </tr>' . "\n";
$page_content .= '</table></td>' . "\n";
$page_content .= '</tr>' . "\n";

if (DOWNLOAD_ENABLED == 'true') include(DIR_WS_MODULES . 'module44.php');
$page_content .= $module;

$page_content .= '<tr>' . "\n";
$page_content .= '<td>'.tep_draw_separator('pixel_trans.gif', '100%', '10').'</td>' . "\n";
$page_content .= '</tr>' . "\n";
$page_content .= '<tr>' . "\n";
$page_content .= '<td><table border="0" width="100%" cellspacing="1" cellpadding="2" class="infoBox">' . "\n";
$page_content .= '<tr class="infoBoxContents">' . "\n";
$page_content .= '<td><table border="0" width="100%" cellspacing="0" cellpadding="2">' . "\n";
$page_content .= '<tr>' . "\n";
$page_content .= '<td width="10">'.tep_draw_separator('pixel_trans.gif', '10', '1').'</td>' . "\n";
$page_content .= '<td>'.'<input type="button" class="'.cssclass('BUTTON_BACK').'" value="'.IMAGE_BUTTON_BACK.'" onclick="javascript:rk_redirect(\''. tep_href_link(FILENAME_ACCOUNT_HISTORY, tep_get_all_get_params(array('order_id')), 'SSL') .'\');"></td>' . "\n";
$page_content .= '<td width="10">'.tep_draw_separator('pixel_trans.gif', '10', '1').'</td>' . "\n";
$page_content .= '</tr>' . "\n";
$page_content .= '</table></td>' . "\n";
$page_content .= '</tr>' . "\n";
$page_content .= '</table></td>' . "\n";
$page_content .= '</tr>' . "\n";
$page_content .= '</table></td>' . "\n";
$page_content .= '</tr>' . "\n";
$page_content .= '</table>' . "\n";
?>