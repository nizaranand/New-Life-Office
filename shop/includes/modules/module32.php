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
  if (isset($HTTP_GET_VARS['edit']) && is_numeric($HTTP_GET_VARS['edit'])) {
    $entry_query = tep_db_query("select entry_gender, entry_company, entry_firstname, entry_lastname, entry_street_address, entry_suburb, entry_postcode, entry_city, entry_state, entry_zone_id, entry_country_id from " . TABLE_ADDRESS_BOOK . " where customers_id = '" . (int)$customer_id . "' and address_book_id = '" . (int)$HTTP_GET_VARS['edit'] . "'");
    $entry = tep_db_fetch_array($entry_query);
}
$page_content = '';
$page_content .= '<table border="0" width="100%" cellspacing="3" cellpadding="3">';
$page_content .= '<tr>';

$page_content .= '<td width="100%" valign="top">'."\n";

if (!isset($HTTP_GET_VARS['delete'])) 

$page_content .= tep_draw_form('addressbook', tep_href_link(FILENAME_ADDRESS_BOOK_PROCESS, (isset($HTTP_GET_VARS['edit']) ? 'edit=' . $HTTP_GET_VARS['edit'] : ''), 'SSL'), 'post', 'onSubmit="return check_form(addressbook);"'); 

$page_content .= '<table border="0" width="100%" cellspacing="0" cellpadding="0">'."\n";

  if ($messageStack->size('addressbook') > 0) {

$page_content .= '<tr>'."\n";
$page_content .= '<td>'. $messageStack->output('addressbook').'</td>'."\n";
$page_content .= ' </tr>'."\n";
$page_content .= '<tr>'."\n";
$page_content .= '<td>'. tep_draw_separator('pixel_trans.gif', '100%', '10').'</td>'."\n";
$page_content .= '</tr>'."\n";

  }

  if (isset($HTTP_GET_VARS['delete'])) {
$page_content .= '<tr>'."\n";
$page_content .= '<td class="main"><b>'. DELETE_ADDRESS_TITLE.'</b></td>'."\n";
$page_content .= '</tr>'."\n";
$page_content .= '<tr>'."\n";
$page_content .= '<td><table border="0" width="100%" cellspacing="1" cellpadding="2" class="infoBox">'."\n";
$page_content .= '<tr class="infoBoxContents">'."\n";
$page_content .= '<td><table border="0" width="100%" cellspacing="0" cellpadding="2">'."\n";
$page_content .= ' <tr>'."\n";
$page_content .= ' <td>'. tep_draw_separator('pixel_trans.gif', '10', '1').'</td>'."\n";
$page_content .= '<td class="main" width="50%" valign="top">'. DELETE_ADDRESS_DESCRIPTION.'</td>'."\n";
$page_content .= '<td align="right" width="50%" valign="top"><table border="0" cellspacing="0" cellpadding="2">'."\n";
$page_content .= '<tr>'."\n";
$page_content .= '<td class="main" align="center" valign="top"><b>'. SELECTED_ADDRESS.'</b><br>'.tep_image(DIR_WS_IMAGES . 'arrow_south_east.gif').'</td>'."\n";

$page_content .= '<td>'.tep_draw_separator('pixel_trans.gif', '10', '1').'</td>'."\n";
$page_content .= '<td class="main" valign="top">'.tep_address_label($customer_id, $HTTP_GET_VARS['delete'], true, ' ', '<br>').'</td>'."\n";
$page_content .= ' <td>'.tep_draw_separator('pixel_trans.gif', '10', '1').'</td>'."\n";
$page_content .= '</tr>'."\n";
$page_content .= '</table></td>'."\n";
$page_content .= '</tr>'."\n";
$page_content .= '</table></td>'."\n";
$page_content .= '</tr>'."\n";
$page_content .= '</table></td>'."\n";
$page_content .= '</tr>'."\n";
$page_content .= '<tr>'."\n";
$page_content .= '<td>'.tep_draw_separator('pixel_trans.gif', '100%', '10').'</td>'."\n";
$page_content .= '</tr>'."\n";
$page_content .= '<tr>'."\n";
$page_content .= '<td><table border="0" width="100%" cellspacing="1" cellpadding="2" class="infoBox">'."\n";
$page_content .= '<tr class="infoBoxContents">'."\n";
$page_content .= '<td><table border="0" width="100%" cellspacing="0" cellpadding="2">'."\n";
$page_content .= '<tr>'."\n";
$page_content .= '<td width="10">'. tep_draw_separator('pixel_trans.gif', '10', '1').'</td>'."\n";
$page_content .= '<td>'.'<input type="button" class="'.cssclass('BUTTON_BACK').'" value="'.IMAGE_BUTTON_BACK.'" onclick="javascript:rk_redirect(\''. tep_href_link(FILENAME_ADDRESS_BOOK, '', 'SSL') .'\');"></td>'."\n";

$page_content .= '<td align="right">'.'<input type="button" class="'.cssclass('BUTTON_DELETE').'" value="'.IMAGE_BUTTON_DELETE.'" onclick="javascript:rk_redirect(\''. tep_href_link(FILENAME_ADDRESS_BOOK_PROCESS, 'delete=' . $HTTP_GET_VARS['delete'] . '&action=deleteconfirm', 'SSL') .'\');"></td>'."\n";

$page_content .= '<td width="10">'.tep_draw_separator('pixel_trans.gif', '10', '1').'</td>'."\n";
$page_content .= '</tr>'."\n";
$page_content .= ' </table></td>'."\n";
$page_content .= '</tr>'."\n";
$page_content .= '</table></td>'."\n";
$page_content .= '</tr>'."\n";

  } else {

$page_content .= '<tr>'."\n";
$page_content .= '<td>';

include(DIR_WS_MODULES . 'module45.php'); 
$page_content .= $module;

$page_content .= '</td>'."\n";
$page_content .= '</tr>'."\n";
$page_content .= ' <tr>'."\n";
$page_content .= '<td>'.tep_draw_separator('pixel_trans.gif', '100%', '10').'</td>'."\n";
$page_content .= '</tr>'."\n";

    if (isset($HTTP_GET_VARS['edit']) && is_numeric($HTTP_GET_VARS['edit'])) {

$page_content .= '<tr>'."\n";
$page_content .= '<td><table border="0" width="100%" cellspacing="1" cellpadding="2">'."\n";
$page_content .= '<tr>'."\n";
$page_content .= '<td><table border="0" width="100%" cellspacing="0" cellpadding="2">'."\n";
$page_content .= '<tr><td>'."\n";

$page_content .= '<table border="0" width="100%" cellspacing="1" cellpadding="2">';
$page_content .= '<tr class="infoBoxContents">';
$page_content .= '<td><table border="0" width="100%" cellspacing="0" cellpadding="2">';
$page_content .= '<tr>';
$page_content .= '<td>'. tep_draw_separator('pixel_trans.gif', '10', '1').'</td>';
$page_content .= '<td class="main"><input type="button" class="'.cssclass('BUTTON_BACK').'" value="'.IMAGE_BUTTON_BACK.'" onclick="javascript:rk_redirect(\''. tep_href_link(FILENAME_ADDRESS_BOOK, '', 'SSL') . '\');"></td>';
$page_content .= '<td class="main">'.tep_draw_hidden_field('action', 'update') . tep_draw_hidden_field('edit', $HTTP_GET_VARS['edit']) .'</td>';
$page_content .= '<td align="right" class="main"><input type="submit" class="'.cssclass('BUTTON_UPDATE').'" value="'.IMAGE_BUTTON_UPDATE.'"></td>'; 
$page_content .= '<td width="10">'.tep_draw_separator('pixel_trans.gif', '10', '1').'</td>';
$page_content .= '</tr>';
$page_content .= '</table></td>';
$page_content .= '</tr>';
$page_content .= '</table>';

$page_content .= '</td></tr>'."\n";
$page_content .= ' </table></td>'."\n";
$page_content .= '</tr>'."\n";
$page_content .= '</table></td>'."\n";
$page_content .= '</tr>'."\n";

    } else {
      if (sizeof($navigation->snapshot) > 0) {
        $back_link = tep_href_link($navigation->snapshot['page'], tep_array_to_string($navigation->snapshot['get'], array(tep_session_name())), $navigation->snapshot['mode']);
      } else {
        $back_link = tep_href_link(FILENAME_ADDRESS_BOOK, '', 'SSL');
      }

$page_content .= '<tr>'."\n";
$page_content .= '<td><table border="0" width="100%" cellspacing="1" cellpadding="2">'."\n";
$page_content .= '<tr>'."\n";
$page_content .= '<td><table border="0" width="100%" cellspacing="0" cellpadding="2">'."\n";
$page_content .= ' <tr><td>'."\n";


$page_content .= '<table border="0" width="100%" cellspacing="1" cellpadding="2">';
$page_content .= '<tr class="infoBoxContents">';
$page_content .= '<td><table border="0" width="100%" cellspacing="0" cellpadding="2">';
$page_content .= '<tr>';
$page_content .= '<td>'. tep_draw_separator('pixel_trans.gif', '10', '1').'</td>';
$page_content .= '<td class="main"><input type="button" class="'.cssclass('BUTTON_BACK').'" value="'.IMAGE_BUTTON_BACK.'" onclick="javascript:rk_redirect(\''. $back_link . '\');"></td>';
$page_content .= '<td class="main">'.tep_draw_hidden_field('action', 'process').'</td>';
$page_content .= '<td align="right" class="main"><input type="submit" class="'.cssclass('BUTTON_CONTINUE').'" value="'.IMAGE_BUTTON_CONTINUE.'"></td>'; 
$page_content .= '<td width="10">'.tep_draw_separator('pixel_trans.gif', '10', '1').'</td>';
$page_content .= '</tr>';
$page_content .= '</table></td>';
$page_content .= '</tr>';
$page_content .= '</table>';


$page_content .= '</td></tr>'."\n";

$page_content .= '</table></td>'."\n";
$page_content .= '</tr>'."\n";
$page_content .= '</table></td>'."\n";
$page_content .= '</tr>'."\n";


    }
  }

$page_content .= '</table>'."\n";
if (!isset($HTTP_GET_VARS['delete'])) $page_content .= '</form>'; 
$page_content .= '</td>'."\n";

$page_content .= '</tr>'."\n";
$page_content .= '</table>'."\n";
?>