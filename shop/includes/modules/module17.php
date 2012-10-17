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


  if (isset($$payment->form_action_url)) {
    $form_action_url = $$payment->form_action_url;
  } else {
    $form_action_url = tep_href_link(FILENAME_CHECKOUT_PROCESS, '', 'SSL');
  }

$page_content .= tep_draw_form('checkout_confirmation', $form_action_url, 'post');

$page_content .= '<tr>'."\n";
$page_content .= '<td><table border="0" width="100%" cellspacing="1" cellpadding="2" class="infoBox">'."\n";
$page_content .= '<tr class="infoBoxContents">'."\n";

  if ($sendto != false) {

$page_content .= '<td width="100%" valign="top"><table border="0" width="100%" cellspacing="0" cellpadding="2">'."\n";
$page_content .= '<tr>'."\n";
$page_content .= '<td class="main">'.'<b>' . HEADING_DELIVERY_ADDRESS . '</b> <a href="' . tep_href_link(FILENAME_CHECKOUT_SHIPPING_ADDRESS, '', 'SSL') . '"><span class="orderEdit">(' . TEXT_EDIT . ')</span></a>'.'</td>'."\n";
$page_content .= '</tr>'."\n";
$page_content .= '<tr>'."\n";
$page_content .= '<td class="main"><table border="0" width="100%" cellspacing="0"><td class="main" width="10"></td><td class="main">'. tep_address_format($order->delivery['format_id'], $order->delivery, 1, ' ', '<br>').'</td></table></td>'."\n";
$page_content .= '</tr>'."\n";

    if ($order->info['shipping_method']) {

$page_content .= '<tr>'."\n";
$page_content .= '<td class="main">'. '<b>' . HEADING_SHIPPING_METHOD . '</b> <a href="' . tep_href_link(FILENAME_CHECKOUT_SHIPPING, '', 'SSL') . '"><span class="orderEdit">(' . TEXT_EDIT . ')</span></a>'.'</td>'."\n";
$page_content .= '</tr>'."\n";
$page_content .= '<tr>'."\n";
$page_content .= '<td class="main"><table border="0" width="100%" cellspacing="0"><td class="main" width="10"></td><td class="main">'. $order->info['shipping_method'].'</td></table></td>'."\n";
$page_content .= '</tr>'."\n";

    }

$page_content .= '</table></td>'."\n";

  }
///
$page_content .= '</tr><tr class="infoBoxContents">';
///
$page_content .= '<td width="'. (($sendto != false) ? '70%' : '100%').'" valign="top"><table border="0" width="100%" cellspacing="0" cellpadding="0">'."\n";
$page_content .= '<tr>'."\n";
$page_content .= '<td><table border="0" width="100%" cellspacing="0" cellpadding="2">'."\n";

  if (sizeof($order->info['tax_groups']) > 1) {

$page_content .= '<tr>'."\n";
$page_content .= '<td class="main" colspan="2">'.'<b>' . HEADING_PRODUCTS . '</b> <a href="' . tep_href_link(FILENAME_SHOPPING_CART) . '"><span class="orderEdit">(' . TEXT_EDIT . ')</span></a>'.'</td>'."\n";
$page_content .= '<td class="smallText" align="right"><b>'. HEADING_TAX.'</b></td>'."\n";
$page_content .= '<td class="smallText" align="right"><b>'. HEADING_TOTAL.'</b></td>'."\n";
$page_content .= ' </tr>'."\n";

  } else {

$page_content .= '<tr>'."\n";
$page_content .= '<td class="main" colspan="3">'.'<b>' . HEADING_PRODUCTS . '</b> <a href="' . tep_href_link(FILENAME_SHOPPING_CART) . '"><span class="orderEdit">(' . TEXT_EDIT . ')</span></a>'.'</td>'."\n";
$page_content .= '</tr>'."\n";

  }

  for ($i=0, $n=sizeof($order->products); $i<$n; $i++) {
    $page_content .= '<tr>' . "\n" .
         '            <td class="main" align="right" valign="top" width="30">' . $order->products[$i]['qty'] . '&nbsp;x</td>' . "\n" .
         '            <td class="main" valign="top">' . $order->products[$i]['name'];

    if (STOCK_CHECK == 'true') {
      $page_content .= tep_check_stock($order->products[$i]['id'], $order->products[$i]['qty']);
    }

    if ( (isset($order->products[$i]['attributes'])) && (sizeof($order->products[$i]['attributes']) > 0) ) {
      for ($j=0, $n2=sizeof($order->products[$i]['attributes']); $j<$n2; $j++) {
        $page_content .= '<br><nobr><small>&nbsp;<i> - ' . $order->products[$i]['attributes'][$j]['option'] . ': ' . $order->products[$i]['attributes'][$j]['value'] . '</i></small></nobr>';
      }
    }

    $page_content .= '</td>' . "\n";

    if (sizeof($order->info['tax_groups']) > 1) $page_content .= '<td class="main" valign="top" align="right">' . tep_display_tax_value($order->products[$i]['tax']) . '%</td>' . "\n";

    $page_content .= '<td class="main" align="right" valign="top">' . $currencies->display_price($order->products[$i]['final_price'], $order->products[$i]['tax'], $order->products[$i]['qty']) . '</td>' . "\n" .
         '          </tr>' . "\n";
  }

$page_content .= '</table></td>'."\n";
$page_content .= '</tr>'."\n";


$page_content .= '<tr class="infoBoxContents">'."\n";
$page_content .= '<td class="main">'.'<b>' . HEADING_BILLING_ADDRESS . '</b> <a href="' . tep_href_link(FILENAME_CHECKOUT_PAYMENT_ADDRESS, '', 'SSL') . '"><span class="orderEdit">(' . TEXT_EDIT . ')</span></a>'.'</td>'."\n";
$page_content .= '</tr>'."\n";
$page_content .= '<tr class="infoBoxContents">'."\n";
$page_content .= '<td class="main"><table border="0" width="100%" cellspacing="0"><td class="main" width="10"></td><td class="main">'.tep_address_format($order->billing['format_id'], $order->billing, 1, ' ', '<br>').'</td></table></td>'."\n";
$page_content .= '</tr>'."\n";
$page_content .= ' <tr class="infoBoxContents">'."\n";
$page_content .= '<td class="main">'.'<b>' . HEADING_PAYMENT_METHOD . '</b> <a href="' . tep_href_link(FILENAME_CHECKOUT_PAYMENT, '', 'SSL') . '"><span class="orderEdit">(' . TEXT_EDIT . ')</span></a>'.'</td>'."\n";
$page_content .= '</tr>'."\n";
$page_content .= '<tr class="infoBoxContents">'."\n";
$page_content .= '<td class="main"><table border="0" width="100%" cellspacing="0"><td class="main" width="10"></td><td class="main">'. $order->info['payment_method'].'</td></table></td>'."\n";
$page_content .= '</tr>'."\n";
$page_content .= '<tr class="infoBoxContents"><td width="70%" valign="top" align="right"><table border="0" cellspacing="0" cellpadding="2">'."\n";

  if (MODULE_ORDER_TOTAL_INSTALLED) {
    $page_content .= $order_total_modules->output();
  }

$page_content .= '</table></td></tr>'."\n";

$page_content .= '</table></td>'."\n";
$page_content .= '</tr>'."\n";
$page_content .= '</table></td>'."\n";
$page_content .= '</tr>'."\n";


  if (is_array($payment_modules->modules)) {
    if ($confirmation = $payment_modules->confirmation()) {

$page_content .= '<tr>'."\n";
$page_content .= '<td>'.tep_draw_separator('pixel_trans.gif', '100%', '10').'</td>'."\n";
$page_content .= '</tr>'."\n";
$page_content .= '<tr>'."\n";
$page_content .= '<td class="main"><b>'. HEADING_PAYMENT_INFORMATION.'</b></td>'."\n";
$page_content .= '</tr>'."\n";
$page_content .= '<tr>'."\n";
$page_content .= '<td>'.tep_draw_separator('pixel_trans.gif', '100%', '10').'</td>'."\n";
$page_content .= '</tr>'."\n";
$page_content .= '<tr>'."\n";
$page_content .= '<td><table border="0" width="100%" cellspacing="1" cellpadding="2" class="infoBox">'."\n";
$page_content .= '<tr class="infoBoxContents">'."\n";
$page_content .= '<td><table border="0" cellspacing="0" cellpadding="2">'."\n";
$page_content .= '<tr>'."\n";
$page_content .= '<td class="main" colspan="4">'. $confirmation['title'].'</td>'."\n";
$page_content .= '</tr>'."\n";

      for ($i=0, $n=sizeof($confirmation['fields']); $i<$n; $i++) {

$page_content .= '<tr>'."\n";
$page_content .= '<td width="10">'. tep_draw_separator('pixel_trans.gif', '10', '1') .'</td>'."\n";
$page_content .= '<td class="main">'. $confirmation['fields'][$i]['title'].'</td>'."\n";
$page_content .= '<td width="10">'. tep_draw_separator('pixel_trans.gif', '10', '1').'</td>'."\n";
$page_content .= '<td class="main">'. $confirmation['fields'][$i]['field'].'</td>'."\n";
$page_content .= '</tr>'."\n";

      }

$page_content .= '</table></td>'."\n";
$page_content .= '</tr>'."\n";
$page_content .= '</table></td>'."\n";
$page_content .= '</tr>'."\n";

    }
  }

$page_content .= '<tr>'."\n";
$page_content .= '<td>'.tep_draw_separator('pixel_trans.gif', '100%', '10').'</td>'."\n";
$page_content .= '</tr>'."\n";

  if (tep_not_null($order->info['comments'])) {

$page_content .= '<tr>'."\n";
$page_content .= '<td class="main">'. '<b>' . HEADING_ORDER_COMMENTS . '</b> <a href="' . tep_href_link(FILENAME_CHECKOUT_PAYMENT, '', 'SSL') . '"><span class="orderEdit">(' . TEXT_EDIT . ')</span></a>'.'</td>'."\n";
$page_content .= '</tr>'."\n";
$page_content .= '<tr>'."\n";
$page_content .= '<td>'.tep_draw_separator('pixel_trans.gif', '100%', '10').'</td>'."\n";
$page_content .= '</tr>'."\n";
$page_content .= '<tr>'."\n";
$page_content .= '<td><table border="0" width="100%" cellspacing="1" cellpadding="2" class="infoBox">'."\n";
$page_content .= '<tr class="infoBoxContents">'."\n";
$page_content .= '<td><table border="0" width="100%" cellspacing="0" cellpadding="2">'."\n";
$page_content .= '<tr>'."\n";
$page_content .= '<td class="main">'. nl2br(tep_output_string_protected($order->info['comments'])) . tep_draw_hidden_field('comments', $order->info['comments']).'</td>'."\n";
$page_content .= '</tr>'."\n";
$page_content .= '</table></td>'."\n";
$page_content .= '</tr>'."\n";
$page_content .= '</table></td>'."\n";
$page_content .= '</tr>'."\n";
$page_content .= '<tr>'."\n";
$page_content .= '<td>'.tep_draw_separator('pixel_trans.gif', '100%', '10').'</td>'."\n";
$page_content .= '</tr>'."\n";

  }

$page_content .= '<tr>'."\n";
$page_content .= '<td><table border="0" width="100%" cellspacing="0" cellpadding="0">'."\n";
$page_content .= '<tr>'."\n";
$page_content .= '<td align="right" class="main">'."\n";

  if (is_array($payment_modules->modules)) {
    $page_content .= $payment_modules->process_button();
  }

  $page_content .= '<input type="submit" class="'.cssclass('BUTTON_CONFIRM_ORDER').'" value="'.IMAGE_BUTTON_CONFIRM_ORDER.'">'. "\n";

$page_content .= '</td>'."\n";
$page_content .= '</tr>'."\n";
$page_content .= '</table></td>'."\n";
$page_content .= '</tr>'."\n";
$page_content .= '<tr>'."\n";
$page_content .= '<td>'.tep_draw_separator('pixel_trans.gif', '100%', '10').'</td>'."\n";
$page_content .= '</tr>'."\n";
$page_content .= '<tr>'."\n";
$page_content .= '<td><table border="0" width="100%" cellspacing="0" cellpadding="0">'."\n";
$page_content .= '<tr>'."\n";
$page_content .= '<td width="25%"><table border="0" width="100%" cellspacing="0" cellpadding="0">'."\n";
$page_content .= '<tr>'."\n";
$page_content .= '<td width="50%" align="right">'. tep_draw_separator('pixel_silver.gif', '1', '5').'</td>'."\n";
$page_content .= '<td width="50%">'. tep_draw_separator('pixel_silver.gif', '100%', '1').'</td>'."\n";
$page_content .= '</tr>'."\n";
$page_content .= '</table></td>'."\n";
$page_content .= '<td width="25%">'. tep_draw_separator('pixel_silver.gif', '100%', '1').'</td>'."\n";
$page_content .= '<td width="25%"><table border="0" width="100%" cellspacing="0" cellpadding="0">'."\n";
$page_content .= '<tr>'."\n";
$page_content .= '<td width="50%">'. tep_draw_separator('pixel_silver.gif', '100%', '1').'</td>'."\n";
$page_content .= '<td>'. tep_image(DIR_WS_IMAGES . 'checkout_bullet.gif').'</td>'."\n";
$page_content .= '<td width="50%">'. tep_draw_separator('pixel_silver.gif', '100%', '1').'</td>'."\n";
$page_content .= '</tr>'."\n";
$page_content .= '</table></td>'."\n";
$page_content .= '<td width="25%"><table border="0" width="100%" cellspacing="0" cellpadding="0">'."\n";
$page_content .= '<tr>'."\n";
$page_content .= '<td width="50%">'. tep_draw_separator('pixel_silver.gif', '100%', '1').'</td>'."\n";
$page_content .= '<td width="50%">'. tep_draw_separator('pixel_silver.gif', '1', '5'). '</td>'."\n";
$page_content .= '</tr>'."\n";
$page_content .= '</table></td>'."\n";
$page_content .= '</tr>'."\n";
$page_content .= '<tr>'."\n";
$page_content .= '<td align="center" width="25%" class="checkoutBarFrom">'.'<a href="' . tep_href_link(FILENAME_CHECKOUT_SHIPPING, '', 'SSL') . '" class="checkoutBarFrom">' . CHECKOUT_BAR_DELIVERY . '</a>'.'</td>'."\n";
$page_content .= '<td align="center" width="25%" class="checkoutBarFrom">'. '<a href="' . tep_href_link(FILENAME_CHECKOUT_PAYMENT, '', 'SSL') . '" class="checkoutBarFrom">' . CHECKOUT_BAR_PAYMENT . '</a>'.'</td>'."\n";
$page_content .= '<td align="center" width="25%" class="checkoutBarCurrent">'. CHECKOUT_BAR_CONFIRMATION.'</td>'."\n";
$page_content .= '<td align="center" width="25%" class="checkoutBarTo">'. CHECKOUT_BAR_FINISHED.'</td>'."\n";
$page_content .= ' </tr>'."\n";
$page_content .= '</table></td>'."\n";
$page_content .= '</tr>'."\n";
$page_content .= '</table></form></td>'."\n";
$page_content .= '</tr>'."\n";
$page_content .= '</table>'."\n";
?>