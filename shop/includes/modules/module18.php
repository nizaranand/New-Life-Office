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
$page_content .= '<td width="100%" valign="top">'. tep_draw_form('checkout_payment', tep_href_link(FILENAME_CHECKOUT_CONFIRMATION, '', 'SSL'), 'post', 'onsubmit="return check_form();"') . '<table border="0" width="100%" cellspacing="0" cellpadding="0">'."\n";
$page_content .= '<tr>'."\n";
$page_content .= '<td>'. tep_draw_separator('pixel_trans.gif', '100%', '10') . '</td>'."\n";
$page_content .= '</tr>'."\n";

  if (isset($HTTP_GET_VARS['payment_error']) && is_object(${$HTTP_GET_VARS['payment_error']}) && ($error = ${$HTTP_GET_VARS['payment_error']}->get_error())) {

$page_content .= '<tr>'."\n";
$page_content .= '<td><table border="0" width="100%" cellspacing="0" cellpadding="2">'."\n";
$page_content .= '<tr>'."\n";
$page_content .= '<td class="main"><b>'. tep_output_string_protected($error['title']) . '</b></td>'."\n";
$page_content .= '</tr>'."\n";
$page_content .= '</table></td>'."\n";
$page_content .= '</tr>'."\n";
$page_content .= '<tr>'."\n";
$page_content .= '<td><table border="0" width="100%" cellspacing="1" cellpadding="2" class="infoBoxNotice">'."\n";
$page_content .= '<tr class="infoBoxNoticeContents">'."\n";
$page_content .= '<td><table border="0" width="100%" cellspacing="0" cellpadding="2">'."\n";
$page_content .= '<tr>'."\n";
$page_content .= '<td>'. tep_draw_separator('pixel_trans.gif', '10', '1') . '</td>'."\n";
$page_content .= '<td class="main" width="100%" valign="top">'. tep_output_string_protected($error['error']) . '</td>'."\n";
$page_content .= '<td>'. tep_draw_separator('pixel_trans.gif', '10', '1'). '</td>'."\n";
$page_content .= '</tr>'."\n";
$page_content .= '</table></td>'."\n";
$page_content .= '</tr>'."\n";
$page_content .= '</table></td>'."\n";
$page_content .= '</tr>'."\n";
$page_content .= '<tr>'."\n";
$page_content .= '<td>'. tep_draw_separator('pixel_trans.gif', '100%', '10'). '</td>'."\n";
$page_content .= '</tr>'."\n";

  }

$page_content .= '<tr>'."\n";
$page_content .= '<td><table border="0" width="100%" cellspacing="0" cellpadding="2">'."\n";
$page_content .= '<tr>'."\n";
$page_content .= '<td class="main"><b>'. TABLE_HEADING_BILLING_ADDRESS . '</b></td>'."\n";
$page_content .= '</tr>'."\n";
$page_content .= '</table></td>'."\n";
$page_content .= ' </tr>'."\n";
$page_content .= '<tr>'."\n";
$page_content .= '<td><table border="0" width="100%" cellspacing="1" cellpadding="2" class="infoBox">'."\n";
$page_content .= '<tr class="infoBoxContents">'."\n";
$page_content .= '<td><table border="0" width="100%" cellspacing="0" cellpadding="2">'."\n";
$page_content .= '<tr>'."\n";
$page_content .= '<td>'. tep_draw_separator('pixel_trans.gif', '10', '1'). '</td>'."\n";
$page_content .= '<td class="main" width="50%" valign="top">'. TEXT_SELECTED_BILLING_DESTINATION. '<br><br>'."\n";
$page_content .= '<a href="checkout_shipping_address.php"><img src="images/change-address.gif"></a></td>'."\n";
$page_content .= '<td align="right" width="50%" valign="top"><table border="0" cellspacing="0" cellpadding="2">'."\n";
$page_content .= '<tr>'."\n";
$page_content .= '<td class="main" align="center" valign="top"><b>'. TITLE_BILLING_ADDRESS. '</b><br>'. tep_image(DIR_WS_IMAGES . 'arrow_south_east.gif'). '</td>'."\n";
$page_content .= '<td>'. tep_draw_separator('pixel_trans.gif', '10', '1'). '</td>'."\n"; 
$page_content .= '<td class="main" valign="top">'. tep_address_label($customer_id, $billto, true, ' ', '<br>'). '</td>'."\n";
$page_content .= '<td>'. tep_draw_separator('pixel_trans.gif', '10', '1') . '</td> '."\n";
$page_content .= '</tr>'."\n";
$page_content .= '</table></td>'."\n";
$page_content .= '</tr>'."\n";
$page_content .= '</table></td>'."\n";
$page_content .= '</tr>'."\n";
$page_content .= '</table></td>'."\n";
$page_content .= '</tr>'."\n";
$page_content .= '<tr>'."\n";
$page_content .= '<td>'. tep_draw_separator('pixel_trans.gif', '100%', '10'). '</td>'."\n";
$page_content .= '</tr>'."\n";
$page_content .= '<tr>'."\n";
$page_content .= '<td><table border="0" width="100%" cellspacing="0" cellpadding="2">'."\n";
$page_content .= '<tr>'."\n";
$page_content .= '<td class="main"><b>'. TABLE_HEADING_PAYMENT_METHOD. '</b></td>'."\n";
$page_content .= '</tr>'."\n";
$page_content .= '</table></td>'."\n";
$page_content .= '</tr>'."\n";
$page_content .= '<tr>'."\n";
$page_content .= '<td><table border="0" width="100%" cellspacing="1" cellpadding="2" class="infoBox">'."\n";
$page_content .= '<tr class="infoBoxContents">'."\n";
$page_content .= '<td><table border="0" width="100%" cellspacing="0" cellpadding="2">'."\n";

  $selection = $payment_modules->selection();

  if (sizeof($selection) > 1) {

$page_content .= '<tr>'."\n";
$page_content .= '<td>'. tep_draw_separator('pixel_trans.gif', '10', '1'). '</td>'."\n";
$page_content .= '<td class="main" width="50%" valign="top">'. TEXT_SELECT_PAYMENT_METHOD. '</td>'."\n";
$page_content .= '<td class="main" width="50%" valign="top" align="right"><b>'. TITLE_PLEASE_SELECT. '</b><br>'."\n";
$page_content .= tep_image(DIR_WS_IMAGES . 'arrow_east_south.gif'). '</td>'."\n";
$page_content .= '<td>'. tep_draw_separator('pixel_trans.gif', '10', '1'). '</td>'."\n";
$page_content .= '</tr>'."\n";

  } else {

$page_content .= '<tr>'."\n";
$page_content .= '<td>'. tep_draw_separator('pixel_trans.gif', '10', '1'). '</td>'."\n";
$page_content .= '<td class="main" width="100%" colspan="2">'. TEXT_ENTER_PAYMENT_INFORMATION. '</td>'."\n";
$page_content .= '<td>'. tep_draw_separator('pixel_trans.gif', '10', '1'). '</td>'."\n";
$page_content .= '</tr>'."\n";

  }

  $radio_buttons = 0;
  for ($i=0, $n=sizeof($selection); $i<$n; $i++) {

$page_content .= '<tr>'."\n";
$page_content .= '<td>'. tep_draw_separator('pixel_trans.gif', '10', '1'). '</td>'."\n";
$page_content .= '<td colspan="2"><table border="0" width="100%" cellspacing="0" cellpadding="2">'."\n";

    if ( ($selection[$i]['id'] == $payment) || ($n == 1) ) {
$page_content .= '<tr id="defaultSelected" class="moduleRowSelected" onmouseover="rowOverEffect(this)" onmouseout="rowOutEffect(this)" onclick="selectRowEffect(this, ' . $radio_buttons . ')">' . "\n";
    } else {
$page_content .= '<tr class="moduleRow" onmouseover="rowOverEffect(this)" onmouseout="rowOutEffect(this)" onclick="selectRowEffect(this, ' . $radio_buttons . ')">' . "\n";
    }

$page_content .= '<td width="10">'. tep_draw_separator('pixel_trans.gif', '10', '1'). '</td>'."\n";
$page_content .= '<td class="main" colspan="3"><b>'. $selection[$i]['module'] . '</b></td>'."\n";
$page_content .= '<td class="main" align="right">'."\n";

    if (sizeof($selection) > 1) {
     $page_content .= tep_draw_radio_field('payment', $selection[$i]['id'], ($selection[$i]['id'] == $payment));
    } else {
      $page_content .= tep_draw_hidden_field('payment', $selection[$i]['id']);
    }

$page_content .= '</td>'."\n";
$page_content .= '<td width="10">'. tep_draw_separator('pixel_trans.gif', '10', '1'). '</td>'."\n";
$page_content .= '</tr>'."\n";

    if (isset($selection[$i]['error'])) {

$page_content .= '<tr>'."\n";
$page_content .= '<td width="10">'. tep_draw_separator('pixel_trans.gif', '10', '1'). '</td>'."\n";
$page_content .= '<td class="main" colspan="4">'. $selection[$i]['error']. '</td>'."\n";
$page_content .= '<td width="10">'. tep_draw_separator('pixel_trans.gif', '10', '1'). '</td>'."\n";
$page_content .= '</tr>'."\n";

    } elseif (isset($selection[$i]['fields']) && is_array($selection[$i]['fields'])) {

$page_content .= '<tr>'."\n";
$page_content .= '<td width="1">'. tep_draw_separator('pixel_trans.gif', '1', '1'). '</td>'."\n";
$page_content .= '<td colspan="4"><table border="0" cellspacing="0" cellpadding="2">'."\n";

      for ($j=0, $n2=sizeof($selection[$i]['fields']); $j<$n2; $j++) {

$page_content .= '<tr>'."\n";
$page_content .= '<td width="1">'. tep_draw_separator('pixel_trans.gif', '1', '1'). '</td>'."\n";
$page_content .= '<td class="main">'. $selection[$i]['fields'][$j]['title']. '</td>'."\n";
$page_content .= '<td>'. tep_draw_separator('pixel_trans.gif', '1', '1'). '</td>'."\n";
$page_content .= '<td class="main">'. $selection[$i]['fields'][$j]['field']. '</td>'."\n";
$page_content .= '<td width="1">'. tep_draw_separator('pixel_trans.gif', '1', '1'). '</td>'."\n";
$page_content .= '</tr>'."\n";

      }

$page_content .= '</table></td>'."\n";
$page_content .= '<td width="1">'. tep_draw_separator('pixel_trans.gif', '1', '1'). '</td>'."\n";
$page_content .= '</tr>'."\n";

    }

$page_content .= '</table></td>'."\n";
$page_content .= '<td>'. tep_draw_separator('pixel_trans.gif', '10', '1'). '</td>'."\n";
$page_content .= '</tr>'."\n";

    $radio_buttons++;
  }

$page_content .= '</table></td>'."\n";
$page_content .= '</tr>'."\n";
$page_content .= '</table></td>'."\n";
$page_content .= '</tr>'."\n";
$page_content .= '<tr>'."\n";
$page_content .= '<td>'. tep_draw_separator('pixel_trans.gif', '100%', '10'). '</td>'."\n";
$page_content .= '</tr>'."\n";
$page_content .= '<tr>'."\n";
$page_content .= '<td><table border="0" width="100%" cellspacing="0" cellpadding="2">'."\n";
$page_content .= '<tr>'."\n";
$page_content .= '<td class="main"><b>'. TABLE_HEADING_COMMENTS. '</b></td>'."\n";
$page_content .= '</tr>'."\n";
$page_content .= '</table></td>'."\n";
$page_content .= '</tr>'."\n";
$page_content .= '<tr>'."\n";
$page_content .= '<td><table border="0" width="100%" cellspacing="1" cellpadding="2" class="infoBox">'."\n";
$page_content .= '<tr class="infoBoxContents">'."\n";
$page_content .= '<td><table border="0" width="100%" cellspacing="0" cellpadding="2">'."\n";
$page_content .= '<tr>'."\n";
$page_content .= '<td>'. tep_draw_textarea_field('comments', 'soft', '60', '5', $comments). '</td>'."\n";
$page_content .= '</tr>'."\n";
$page_content .= '</table></td>'."\n";
$page_content .= '</tr>'."\n";
$page_content .= '</table></td>'."\n";
$page_content .= '</tr>'."\n";
$page_content .= '<tr>'."\n";
$page_content .= '<td>'. tep_draw_separator('pixel_trans.gif', '100%', '10'). '</td>'."\n";
$page_content .= '</tr>'."\n";
$page_content .= '<tr>'."\n";
$page_content .= '<td><table border="0" width="100%" cellspacing="1" cellpadding="2" class="infoBox">'."\n";
$page_content .= '<tr class="infoBoxContents">'."\n";
$page_content .= '<td><table border="0" width="100%" cellspacing="0" cellpadding="2">'."\n";
$page_content .= '<tr>'."\n";
$page_content .= '<td width="10">'. tep_draw_separator('pixel_trans.gif', '10', '1').'</td>'."\n";
$page_content .= '<td class="main"><b>'.TITLE_CONTINUE_CHECKOUT_PROCEDURE . '</b><br>' . TEXT_CONTINUE_CHECKOUT_PROCEDURE.'</td>'."\n";
$page_content .= '<td class="main" align="right">'.'<input type="image" src="images/continue.gif" value="'.IMAGE_BUTTON_CONTINUE.'">' . '</td>'."\n";
$page_content .= '<td width="10">'. tep_draw_separator('pixel_trans.gif', '10', '1').'</td>'."\n";
$page_content .= '</tr>'."\n";
$page_content .= '</table></td>'."\n";
$page_content .= '</tr>'."\n";
$page_content .= '</table></td>'."\n";
$page_content .= '</tr>'."\n";
$page_content .= '<tr>'."\n";
$page_content .= '<td>'. tep_draw_separator('pixel_trans.gif', '100%', '10').'</td>'."\n";
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
$page_content .= '<td width="25%"><table border="0" width="100%" cellspacing="0" cellpadding="0">'."\n";
$page_content .= '<tr>'."\n";
$page_content .= '<td width="50%">'. tep_draw_separator('pixel_silver.gif', '100%', '1'). '</td>'."\n";
$page_content .= '<td>'. tep_image(DIR_WS_IMAGES . 'checkout_bullet.gif'). '</td>'."\n";
$page_content .= '<td width="50%">'. tep_draw_separator('pixel_silver.gif', '100%', '1').'</td>'."\n";
$page_content .= '</tr>'."\n";
$page_content .= '</table></td>'."\n";
$page_content .= '<td width="25%">'. tep_draw_separator('pixel_silver.gif', '100%', '1').'</td>'."\n";
$page_content .= '<td width="25%"><table border="0" width="100%" cellspacing="0" cellpadding="0">'."\n";
$page_content .= '<tr>'."\n";
$page_content .= '<td width="50%">'. tep_draw_separator('pixel_silver.gif', '100%', '1').'</td>'."\n";
$page_content .= '<td width="50%">'. tep_draw_separator('pixel_silver.gif', '1', '5').'</td>'."\n";
$page_content .= '</tr>'."\n";
$page_content .= '</table></td>'."\n";
$page_content .= '</tr>'."\n";
$page_content .= '<tr>'."\n";
$page_content .= '<td align="center" width="25%" class="checkoutBarFrom">'. '<a href="' . tep_href_link(FILENAME_CHECKOUT_SHIPPING, '', 'SSL') . '" class="checkoutBarFrom">' . CHECKOUT_BAR_DELIVERY . '</a>'.'</td>'."\n";
$page_content .= '<td align="center" width="25%" class="checkoutBarCurrent">'. CHECKOUT_BAR_PAYMENT.'</td>'."\n";
$page_content .= '<td align="center" width="25%" class="checkoutBarTo">'. CHECKOUT_BAR_CONFIRMATION.'</td>'."\n";
$page_content .= '<td align="center" width="25%" class="checkoutBarTo">'. CHECKOUT_BAR_FINISHED.'</td>'."\n";
$page_content .= '</tr>'."\n";
$page_content .= '</table></td>'."\n";
$page_content .= '</tr>'."\n";
$page_content .= '</table></form></td>'."\n";
$page_content .= '</tr>'."\n";
$page_content .= '</table>'."\n";
?>