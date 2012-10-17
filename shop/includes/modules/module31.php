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

  if ($messageStack->size('addressbook') > 0) {

$page_content .= '<tr>'."\n";
$page_content .= '<td>'.$messageStack->output('addressbook').'</td>'."\n";
$page_content .= '</tr>'."\n";
$page_content .= '<tr>'."\n";
$page_content .= '<td>'. tep_draw_separator('pixel_trans.gif', '100%', '10').'</td>'."\n";
$page_content .= '</tr>'."\n";

  }

$page_content .= '<tr>'."\n";
$page_content .= '<td class="main"><b>'.PRIMARY_ADDRESS_TITLE.'</b></td>'."\n";
$page_content .= '</tr>'."\n";
$page_content .= '<tr>'."\n";
$page_content .= '<td><table border="0" width="100%" cellspacing="1" cellpadding="2" class="infoBox">'."\n";
$page_content .= '<tr class="infoBoxContents">'."\n";
$page_content .= '<td><table border="0" width="100%" cellspacing="0" cellpadding="2">'."\n";
$page_content .= '<tr>'."\n";
$page_content .= '<td>'. tep_draw_separator('pixel_trans.gif', '10', '1').'</td>'."\n";
$page_content .= '<td class="main" width="50%" valign="top">'.PRIMARY_ADDRESS_DESCRIPTION.'</td>'."\n";
$page_content .= '<td align="right" width="50%" valign="top"><table border="0" cellspacing="0" cellpadding="2">'."\n";
$page_content .= '<tr>'."\n";
$page_content .= '<td class="main" align="center" valign="top"><b>'.PRIMARY_ADDRESS_TITLE.'</b><br>'. tep_image(DIR_WS_IMAGES . 'arrow_south_east.gif').'</td>'."\n";

$page_content .= '<td>'.tep_draw_separator('pixel_trans.gif', '10', '1').'</td>'."\n";
$page_content .= '<td class="main" valign="top">'.tep_address_label($customer_id, $customer_default_address_id, true, ' ', '<br>').'</td>'."\n";
$page_content .= '<td>'.tep_draw_separator('pixel_trans.gif', '10', '1').'</td>'."\n";
$page_content .= '</tr>'."\n";
$page_content .= '</table></td>'."\n";
$page_content .= '</tr>'."\n";
$page_content .= '</table></td>'."\n";
$page_content .= '</tr>'."\n";
$page_content .= ' </table></td>'."\n";
$page_content .= '</tr>'."\n";
$page_content .= '<tr>'."\n";
$page_content .= '<td>'.tep_draw_separator('pixel_trans.gif', '100%', '10').'</td>'."\n";
$page_content .= '</tr>'."\n";
$page_content .= '<tr>'."\n";
$page_content .= '<td class="main"><b>'.ADDRESS_BOOK_TITLE.'</b></td>'."\n";
$page_content .= ' </tr>'."\n";
$page_content .= '<tr>'."\n";
$page_content .= '<td><table border="0" width="100%" cellspacing="1" cellpadding="2" class="infoBox">'."\n";
$page_content .= '<tr class="infoBoxContents">'."\n";
$page_content .= '<td><table border="0" width="100%" cellspacing="0" cellpadding="2">'."\n";

  $addresses_query = tep_db_query("select address_book_id, entry_firstname as firstname, entry_lastname as lastname, entry_company as company, entry_street_address as street_address, entry_suburb as suburb, entry_city as city, entry_postcode as postcode, entry_state as state, entry_zone_id as zone_id, entry_country_id as country_id from " . TABLE_ADDRESS_BOOK . " where customers_id = '" . (int)$customer_id . "' order by firstname, lastname");
  while ($addresses = tep_db_fetch_array($addresses_query)) {
    $format_id = tep_get_address_format_id($addresses['country_id']);

$page_content .= '<tr>'."\n";
$page_content .= '<td>'.tep_draw_separator('pixel_trans.gif', '10', '1').'</td>'."\n";
$page_content .= '<td><table border="0" width="100%" cellspacing="0" cellpadding="2">'."\n";
$page_content .= '<tr class="moduleRow" onmouseover="rowOverEffect(this)" onmouseout="rowOutEffect(this)" onClick="document.location.href=\''.tep_href_link(FILENAME_ADDRESS_BOOK_PROCESS, 'edit=' . $addresses['address_book_id'], 'SSL').'\'">'."\n";

$page_content .= '<td class="main"><b>'.tep_output_string_protected($addresses['firstname'] . ' ' . $addresses['lastname']).'</b>';
if ($addresses['address_book_id'] == $customer_default_address_id) $page_content .= '&nbsp;<small><i>' . PRIMARY_ADDRESS . '</i></small>';
$page_content .= '</td>';

$page_content .= '<td class="main" align="right">'.'<a href="' . tep_href_link(FILENAME_ADDRESS_BOOK_PROCESS, 'edit=' . $addresses['address_book_id'], 'SSL') . '"><small><strong>[' . SMALL_IMAGE_BUTTON_EDIT . ']</strong></small></a>&nbsp;&nbsp;<a href="' . tep_href_link(FILENAME_ADDRESS_BOOK_PROCESS, 'delete=' . $addresses['address_book_id'], 'SSL') . '"><small><strong><font color="#C60000">[' . SMALL_IMAGE_BUTTON_DELETE . ']</font></strong></small></a>'; 
$page_content .= '</td>';

$page_content .= '</tr>'."\n";
$page_content .= '<tr>'."\n";
$page_content .= '<td colspan="2"><table border="0" cellspacing="0" cellpadding="2">'."\n";
$page_content .= '<tr>'."\n";
$page_content .= '<td width="10">'.tep_draw_separator('pixel_trans.gif', '10', '1').'</td>'."\n";
$page_content .= '<td class="main">'. tep_address_format($format_id, $addresses, true, ' ', '<br>').'</td>'."\n";
$page_content .= '<td width="10">'.tep_draw_separator('pixel_trans.gif', '10', '1').'</td>'."\n";
$page_content .= '</tr>'."\n";
$page_content .= '</table></td>'."\n";
$page_content .= '</tr>'."\n";
$page_content .= '</table></td>'."\n";
$page_content .= '<td>'.tep_draw_separator('pixel_trans.gif', '10', '1').'</td>'."\n";
 $page_content .= '</tr>'."\n";

  }

$page_content .= '</table></td>'."\n";
$page_content .= ' </tr>'."\n";
$page_content .= '</table></td>'."\n";
$page_content .= '</tr>'."\n";
$page_content .= '<tr>'."\n";
$page_content .= '<td>'.tep_draw_separator('pixel_trans.gif', '100%', '10').'</td>';
$page_content .= '</tr>'."\n";
$page_content .= '<tr>'."\n";
$page_content .= '<td><table border="0" width="100%" cellspacing="1" cellpadding="2" class="infoBox">'."\n";
$page_content .= '<tr class="infoBoxContents">'."\n";
$page_content .= '<td><table border="0" width="100%" cellspacing="0" cellpadding="2">'."\n";
$page_content .= ' <tr>'."\n";
$page_content .= ' <td width="10">'.tep_draw_separator('pixel_trans.gif', '10', '1').'</td>'."\n";
$page_content .= '<td class="smallText"><input type="button" class="'.cssclass('BUTTON_BACK').'" value="'.IMAGE_BUTTON_BACK.'" onclick="javascript:rk_redirect(\''. tep_href_link(FILENAME_ACCOUNT, '', 'SSL') .'\');"></td>';
  if (tep_count_customer_address_book_entries() < MAX_ADDRESS_BOOK_ENTRIES) {


$page_content .= '<td class="smallText" align="right">'. '<input type="button" class="'.cssclass('BUTTON_ADD_ADDRESS').'" value="'.IMAGE_BUTTON_ADD_ADDRESS.'" onclick="javascript:rk_redirect(\''. tep_href_link(FILENAME_ADDRESS_BOOK_PROCESS, '', 'SSL') .'\');"></td>';

  }
$page_content .= '<td width="10">'.tep_draw_separator('pixel_trans.gif', '10', '1').'</td>'."\n";
$page_content .= '</tr>'."\n";
$page_content .= '</table></td>'."\n";
$page_content .= '</tr>'."\n";
$page_content .= '</table></td>'."\n";
$page_content .= '</tr>'."\n";
$page_content .= '<tr>'."\n";
$page_content .= '<td>'. tep_draw_separator('pixel_trans.gif', '100%', '10').'</td>'."\n";
$page_content .= ' </tr>'."\n";
$page_content .= '<tr>'."\n";
$page_content .= '<td class="smallText">'. sprintf(TEXT_MAXIMUM_ENTRIES, MAX_ADDRESS_BOOK_ENTRIES).'</td>'."\n";
$page_content .= '</tr>'."\n";
$page_content .= '</table></td>'."\n";
$page_content .= '</tr>'."\n";
$page_content .= '</table>'."\n";
?>