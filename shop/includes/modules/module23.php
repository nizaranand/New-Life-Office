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
$page_content .= '<td width="100%" valign="top">'. tep_draw_form('order', tep_href_link(FILENAME_CHECKOUT_SUCCESS, 'action=update', 'SSL')). '<table border="0" width="100%" cellspacing="0" cellpadding="0">'."\n";
$page_content .= '<tr>'."\n";
$page_content .= '<td><table border="0" width="100%" cellspacing="4" cellpadding="2">'."\n";
$page_content .= '<tr>'."\n";
$page_content .= '<td valign="top"></td>'."\n";
$page_content .= '<td valign="top" class="main">'. TEXT_SUCCESS.'<br><br>'."\n";

  if ($global['global_product_notifications'] != '1') {
    $page_content .= TEXT_NOTIFY_PRODUCTS . '<br><p class="productsNotifications">';

    $products_displayed = array();
    for ($i=0, $n=sizeof($products_array); $i<$n; $i++) {
      if (!in_array($products_array[$i]['id'], $products_displayed)) {
        $page_content .= tep_draw_checkbox_field('notify[]', $products_array[$i]['id']) . ' ' . $products_array[$i]['text'] . '<br>';
        $products_displayed[] = $products_array[$i]['id'];
      }
    }

    $page_content .= '</p>';
  } else {
    $page_content .= TEXT_SEE_ORDERS . '<br><br>' . TEXT_CONTACT_STORE_OWNER;
  }

$page_content .= '<h3>'.TEXT_THANKS_FOR_SHOPPING.'</h3></td>'."\n";
$page_content .= '</tr>'."\n";
$page_content .= '</table></td>'."\n";
$page_content .= '</tr>'."\n";
$page_content .= '<tr>'."\n";
$page_content .= '<td>'. tep_draw_separator('pixel_trans.gif', '100%', '10').'</td>'."\n";
$page_content .= '</tr>'."\n";
$page_content .= '<tr>'."\n";
$page_content .= '<td align="right" class="main">'. '<input type="image" src="images/continue.gif" value="'.IMAGE_BUTTON_CONTINUE.'"></td>'."\n";
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
$page_content .= '<td width="25%">'. tep_draw_separator('pixel_silver.gif', '100%', '1').'</td>'."\n";
$page_content .= '<td width="25%">'. tep_draw_separator('pixel_silver.gif', '100%', '1').'</td>'."\n";
$page_content .= '<td width="25%"><table border="0" width="100%" cellspacing="0" cellpadding="0">'."\n";
$page_content .= '<tr>'."\n";
$page_content .= '<td width="50%">'. tep_draw_separator('pixel_silver.gif', '100%', '1').'</td>'."\n";
$page_content .= '<td width="50%">'. tep_image(DIR_WS_IMAGES . 'checkout_bullet.gif').'</td>'."\n";
$page_content .= '</tr>'."\n";
$page_content .= ' </table></td>'."\n";
$page_content .= '</tr>'."\n";
$page_content .= '<tr>'."\n";
$page_content .= '<td align="center" width="25%" class="checkoutBarFrom">'. CHECKOUT_BAR_DELIVERY.'</td>'."\n";
$page_content .= '<td align="center" width="25%" class="checkoutBarFrom">'. CHECKOUT_BAR_PAYMENT.'</td>'."\n";
$page_content .= '<td align="center" width="25%" class="checkoutBarFrom">'. CHECKOUT_BAR_CONFIRMATION.'</td>'."\n";
$page_content .= '<td align="center" width="25%" class="checkoutBarCurrent">'.CHECKOUT_BAR_FINISHED.'</td>'."\n";
$page_content .= ' </tr>'."\n";
$page_content .= '</table></td>'."\n";
$page_content .= '</tr>'."\n";

if (DOWNLOAD_ENABLED == 'true') include(DIR_WS_MODULES . 'module44.php'); 
$page_content .= $module;
$page_content .= '</table></form></td>'."\n";
$page_content .= '</tr>'."\n";
$page_content .= '</table>'."\n";
?>