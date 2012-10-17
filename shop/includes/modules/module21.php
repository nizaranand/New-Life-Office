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
$page_content .= '<td width="100%" valign="top">'.tep_draw_form('checkout_address', tep_href_link(FILENAME_CHECKOUT_SHIPPING, '', 'SSL')) . tep_draw_hidden_field('action', 'process'). '<table border="0" width="100%" cellspacing="0" cellpadding="0">'."\n";
$page_content .= '<tr>'."\n";
$page_content .= '<td>'. tep_draw_separator('pixel_trans.gif', '100%', '10').'</td>'."\n";
$page_content .= '</tr>'."\n";
$page_content .= '<tr>'."\n";
$page_content .= '<td><table border="0" width="100%" cellspacing="0" cellpadding="2">'."\n";
$page_content .= '<tr>'."\n";
$page_content .= '<td class="main"><b>'.TABLE_HEADING_SHIPPING_ADDRESS.'</b></td>'."\n";
$page_content .= '</tr>'."\n";
$page_content .= '</table></td>'."\n";
$page_content .= '</tr>'."\n";
$page_content .= '<tr>'."\n";
$page_content .= '<td><table border="0" width="100%" cellspacing="1" cellpadding="2" class="infoBox">'."\n";
$page_content .= '<tr class="infoBoxContents">'."\n";
$page_content .= '<td><table border="0" width="100%" cellspacing="0" cellpadding="2">'."\n";
$page_content .= '<tr>'."\n";
$page_content .= '<td>'. tep_draw_separator('pixel_trans.gif', '10', '1').'</td>'."\n"; 
$page_content .= '<td class="main" width="50%" valign="top">'. TEXT_CHOOSE_SHIPPING_DESTINATION . '<br><br><a href="checkout_shipping_address.php"><img src="images/change-address.gif"></a></td>'."\n";
$page_content .= '<td align="right" width="50%" valign="top"><table border="0" cellspacing="0" cellpadding="2">'."\n";
$page_content .= '<tr>'."\n";
$page_content .= '<td class="main" align="center" valign="top">'. '<b>' . TITLE_SHIPPING_ADDRESS . '</b><br>' . tep_image(DIR_WS_IMAGES . 'arrow_south_east.gif').'</td>'."\n";
$page_content .= '<td>'.tep_draw_separator('pixel_trans.gif', '10', '1').'</td>'."\n"; 
$page_content .= '<td class="main" valign="top">'. tep_address_label($customer_id, $sendto, true, ' ', '<br>').'</td>'."\n";
$page_content .= '<td>'.tep_draw_separator('pixel_trans.gif', '10', '1').'</td>'."\n"; 
$page_content .= '</tr>'."\n";
$page_content .= '</table></td>'."\n";
$page_content .= '</tr>'."\n";
$page_content .= '</table></td>'."\n";
$page_content .= ' </tr>'."\n";
$page_content .= '</table></td>'."\n";
$page_content .= '</tr>'."\n";
$page_content .= '<tr>'."\n";
$page_content .= '<td>'. tep_draw_separator('pixel_trans.gif', '100%', '10').'</td>'."\n";
$page_content .= '</tr>'."\n";

  if (tep_count_shipping_modules() > 0) {

$page_content .= '<tr>'."\n";
$page_content .= '<td><table border="0" width="100%" cellspacing="0" cellpadding="2">'."\n";
$page_content .= '<tr>'."\n";
$page_content .= '<td class="main"><b>'.TABLE_HEADING_SHIPPING_METHOD.'</b></td>'."\n";
$page_content .= '</tr>'."\n";
$page_content .= '</table></td>'."\n";
$page_content .= '</tr>'."\n";
$page_content .= '<tr>'."\n";
$page_content .= '<td><table border="0" width="100%" cellspacing="1" cellpadding="2" class="infoBox">'."\n";
$page_content .= '<tr class="infoBoxContents">'."\n";
$page_content .= '<td><table border="0" width="100%" cellspacing="0" cellpadding="2">'."\n";

    if (sizeof($quotes) > 1 && sizeof($quotes[0]) > 1) {

$page_content .= '<tr>'."\n";
$page_content .= '<td>'. tep_draw_separator('pixel_trans.gif', '10', '1'). '</td>'."\n";
$page_content .= '<td class="main" width="50%" valign="top">'. TEXT_CHOOSE_SHIPPING_METHOD. '</td>'."\n";
$page_content .= '<td class="main" width="50%" valign="top" align="right">'.'<b>' . TITLE_PLEASE_SELECT . '</b><br>' . tep_image(DIR_WS_IMAGES . 'arrow_east_south.gif').'</td>'."\n";
$page_content .= '<td>'. tep_draw_separator('pixel_trans.gif', '10', '1').'</td>'."\n";
$page_content .= '</tr>'."\n";

    } elseif ($free_shipping == false) {

$page_content .= '<tr>'."\n";
$page_content .= '<td>'. tep_draw_separator('pixel_trans.gif', '10', '1') .'</td>'."\n";
$page_content .= '<td class="main" width="100%" colspan="2">'. TEXT_ENTER_SHIPPING_INFORMATION. '</td>'."\n";
$page_content .= '<td>'. tep_draw_separator('pixel_trans.gif', '10', '1').'</td>'."\n";
$page_content .= '</tr>'."\n";
    }

    if ($free_shipping == true) {
$page_content .= '<tr>'."\n";
$page_content .= '<td>'. tep_draw_separator('pixel_trans.gif', '10', '1'). '</td>'."\n";
$page_content .= '<td colspan="2" width="100%"><table border="0" width="100%" cellspacing="0" cellpadding="2">'."\n";
$page_content .= '<tr>'."\n";
$page_content .= '<td width="10">'. tep_draw_separator('pixel_trans.gif', '10', '1'). '</td>'."\n";
$page_content .= '<td class="main" colspan="3"><b>'.FREE_SHIPPING_TITLE.'</b>&nbsp;'. $quotes[$i]['icon'].'</td>'."\n";
$page_content .= '<td width="10">'. tep_draw_separator('pixel_trans.gif', '10', '1').'</td>'."\n";
$page_content .= '</tr>'."\n";
$page_content .= '<tr id="defaultSelected" class="moduleRowSelected" onmouseover="rowOverEffect(this)" onmouseout="rowOutEffect(this)" onclick="selectRowEffect(this, 0)">'."\n";
$page_content .= '<td width="10">'. tep_draw_separator('pixel_trans.gif', '10', '1').'</td>'."\n";
$page_content .= '<td class="main" width="100%">'. sprintf(FREE_SHIPPING_DESCRIPTION, $currencies->format(MODULE_ORDER_TOTAL_SHIPPING_FREE_SHIPPING_OVER)) . tep_draw_hidden_field('shipping', 'free_free').'</td>'."\n";
$page_content .= '<td width="10">'.tep_draw_separator('pixel_trans.gif', '10', '1').'</td>'."\n";
$page_content .= '</tr>'."\n";
$page_content .= '</table></td>'."\n";
$page_content .= '<td>'. tep_draw_separator('pixel_trans.gif', '10', '1').'</td> '."\n";
$page_content .= ' </tr>'."\n";
    } else {
      $radio_buttons = 0;
      for ($i=0, $n=sizeof($quotes); $i<$n; $i++) {

$page_content .= '<tr>'."\n";
$page_content .= '<td>'.tep_draw_separator('pixel_trans.gif', '10', '1').'</td>'."\n";
$page_content .= ' <td colspan="2"><table border="0" width="100%" cellspacing="0" cellpadding="2">'."\n";
$page_content .= '<tr>'."\n";
$page_content .= '<td width="10">'.tep_draw_separator('pixel_trans.gif', '10', '1').'</td>'."\n";
$page_content .= '<td class="main" colspan="3"><b>'. $quotes[$i]['module'].'</b>&nbsp;';
if (isset($quotes[$i]['icon']) && tep_not_null($quotes[$i]['icon'])) {$page_content .= $quotes[$i]['icon']; }
$page_content .= '</td>'."\n";
$page_content .= '<td width="10">'. tep_draw_separator('pixel_trans.gif', '10', '1').'</td>'."\n";
$page_content .= '</tr>'."\n";

        if (isset($quotes[$i]['error'])) {

$page_content .= '<tr>'."\n";
$page_content .= '<td width="10">'. tep_draw_separator('pixel_trans.gif', '10', '1').'</td>'."\n";
$page_content .= '<td class="main" colspan="3">'.$quotes[$i]['error'].'</td>'."\n";
$page_content .= ' <td width="10">'.tep_draw_separator('pixel_trans.gif', '10', '1').'</td>'."\n";
$page_content .= '</tr>'."\n";

        } else {
          for ($j=0, $n2=sizeof($quotes[$i]['methods']); $j<$n2; $j++) {
// set the radio button to be checked if it is the method chosen
            $checked = (($quotes[$i]['id'] . '_' . $quotes[$i]['methods'][$j]['id'] == $shipping['id']) ? true : false);

            if ( ($checked == true) || ($n == 1 && $n2 == 1) ) {
              $page_content .= '<tr id="defaultSelected" class="moduleRowSelected" onmouseover="rowOverEffect(this)" onmouseout="rowOutEffect(this)" onclick="selectRowEffect(this, ' . $radio_buttons . ')">' . "\n";
            } else {
              $page_content .= '<tr class="moduleRow" onmouseover="rowOverEffect(this)" onmouseout="rowOutEffect(this)" onclick="selectRowEffect(this, ' . $radio_buttons . ')">' . "\n";
            }
$page_content .= '<td width="10">'. tep_draw_separator('pixel_trans.gif', '10', '1').'</td>'."\n";
$page_content .= '<td class="main" width="75%">'.$quotes[$i]['methods'][$j]['title'].'</td>'."\n";

            if ( ($n > 1) || ($n2 > 1) ) {

$page_content .= '<td class="main">'. $currencies->format(tep_add_tax($quotes[$i]['methods'][$j]['cost'], (isset($quotes[$i]['tax']) ? $quotes[$i]['tax'] : 0))).'</td>'."\n";
$page_content .= '<td class="main" align="right">'.tep_draw_radio_field('shipping', $quotes[$i]['id'] . '_' . $quotes[$i]['methods'][$j]['id'], $checked).'</td>'."\n";

            } else {

$page_content .= '<td class="main" align="right" colspan="2">'."\n";
$page_content .= $currencies->format(tep_add_tax($quotes[$i]['methods'][$j]['cost'], $quotes[$i]['tax'])) . tep_draw_hidden_field('shipping', $quotes[$i]['id'] . '_' . $quotes[$i]['methods'][$j]['id']). '</td>'."\n";

            }

$page_content .= '<td width="10">'. tep_draw_separator('pixel_trans.gif', '10', '1'). '</td>'."\n";
$page_content .= '</tr>'."\n";

            $radio_buttons++;
          }
        }
$page_content .= '</table></td>'."\n";
$page_content .= '<td>'.tep_draw_separator('pixel_trans.gif', '10', '1'). '</td>'."\n"; 
$page_content .= '</tr>'."\n";

      }
    }
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
$page_content .= '<td class="main"><b>'.TABLE_HEADING_COMMENTS .'</b></td>'."\n";
$page_content .= '</tr>'."\n";
$page_content .= '</table></td>'."\n";
$page_content .= '</tr>'."\n";
$page_content .= '<tr>'."\n";
$page_content .= '<td><table border="0" width="100%" cellspacing="1" cellpadding="2" class="infoBox">'."\n";
$page_content .= '<tr class="infoBoxContents">'."\n";
$page_content .= '<td><table border="0" width="100%" cellspacing="0" cellpadding="2">'."\n";
$page_content .= '<tr>'."\n";
$page_content .= '<td>'. tep_draw_textarea_field('comments', 'soft', '60', '5') .'</td>'."\n";
$page_content .= '</tr>'."\n";
$page_content .= '</table></td>'."\n";
$page_content .= '</tr>'."\n";
$page_content .= '</table></td>'."\n";
$page_content .= '</tr>'."\n";
$page_content .= '<tr>'."\n";
$page_content .= '<td>'. tep_draw_separator('pixel_trans.gif', '100%', '10'). '</td>'."\n";
$page_content .= ' </tr>'."\n";
$page_content .= '<tr>'."\n";
$page_content .= '<td><table border="0" width="100%" cellspacing="1" cellpadding="2" class="infoBox">'."\n";
$page_content .= '<tr class="infoBoxContents">'."\n";
$page_content .= '<td><table border="0" width="100%" cellspacing="0" cellpadding="2">'."\n";
$page_content .= '<tr>'."\n";
$page_content .= '<td width="10">'.tep_draw_separator('pixel_trans.gif', '10', '1').'</td>'."\n";
$page_content .= '<td class="main">'.'<b>' . TITLE_CONTINUE_CHECKOUT_PROCEDURE . '</b><br>' . TEXT_CONTINUE_CHECKOUT_PROCEDURE.'</td>'."\n";
$page_content .= '<td class="main" align="right">'.'<input type="image" src="images/continue.gif" value="'.IMAGE_BUTTON_CONTINUE.'"></td>'."\n";
$page_content .= '<td width="10">'. tep_draw_separator('pixel_trans.gif', '10', '1').'</td>'."\n";
$page_content .= '</tr>'."\n";
$page_content .= '</table></td>'."\n";
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
$page_content .= '<td width="50%" align="right">'.tep_image(DIR_WS_IMAGES . 'checkout_bullet.gif').'</td>'."\n";
$page_content .= '<td width="50%">'.tep_draw_separator('pixel_silver.gif', '100%', '1').'</td>'."\n";
$page_content .= '</tr>'."\n";
$page_content .= '</table></td>'."\n";
$page_content .= '<td width="25%">'. tep_draw_separator('pixel_silver.gif', '100%', '1').'</td>'."\n";
$page_content .= '<td width="25%">'. tep_draw_separator('pixel_silver.gif', '100%', '1'). '</td>'."\n";
$page_content .= '<td width="25%"><table border="0" width="100%" cellspacing="0" cellpadding="0">'."\n";
$page_content .= '<tr>'."\n";
$page_content .= '<td width="50%">'.tep_draw_separator('pixel_silver.gif', '100%', '1').'</td>'."\n";
$page_content .= '<td width="50%">'.tep_draw_separator('pixel_silver.gif', '1', '5').'</td>'."\n";
$page_content .= '</tr>'."\n";
$page_content .= '</table></td>'."\n";
$page_content .= '</tr>'."\n";
$page_content .= '<tr>'."\n";
$page_content .= '<td align="center" width="25%" class="checkoutBarCurrent">'.CHECKOUT_BAR_DELIVERY.'</td>'."\n";
$page_content .= '<td align="center" width="25%" class="checkoutBarTo">'. CHECKOUT_BAR_PAYMENT.'</td>'."\n";
$page_content .= '<td align="center" width="25%" class="checkoutBarTo">'. CHECKOUT_BAR_CONFIRMATION.'</td>'."\n";
$page_content .= '<td align="center" width="25%" class="checkoutBarTo">'. CHECKOUT_BAR_FINISHED.'</td>'."\n";
$page_content .= '</tr>'."\n";
$page_content .= '</table></td>'."\n";
$page_content .= '</tr>'."\n";
$page_content .= '</table></form></td>'."\n";
$page_content .= '</tr>'."\n";
$page_content .= '</table>'."\n";
?>