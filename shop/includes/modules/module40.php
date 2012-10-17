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
   $product_info_query = tep_db_query("select pd.products_name from " . TABLE_PRODUCTS . " p, " . TABLE_PRODUCTS_DESCRIPTION . " pd where p.products_status = '1' and p.products_id = '" . (int)$HTTP_GET_VARS['products_id'] . "' and p.products_id = pd.products_id and pd.language_id = '" . (int)$languages_id . "'");
    $product_info = tep_db_fetch_array($product_info_query);
    $account_query = tep_db_query("select customers_firstname, customers_lastname, customers_email_address from " . TABLE_CUSTOMERS . " where customers_id = '" . (int)$customer_id . "'");
    $account = tep_db_fetch_array($account_query);
    $from_name = $account['customers_firstname'] . ' ' . $account['customers_lastname'];
    $from_email_address = $account['customers_email_address'];

$page_content = '';
$page_content .= tep_draw_form('email_friend', tep_href_link(FILENAME_TELL_A_FRIEND, 'action=process&products_id=' . $HTTP_GET_VARS['products_id']),'post','style= "border: 0px; padding: 5px; text-align:left"'); 

if ($messageStack->size('friend') > 0) {
$page_content .= $messageStack->output('friend') .'<br />'; 

}
$page_content .= FORM_TITLE_CUSTOMER_DETAILS .'<br />'; 

$page_content .= '<div style="clear:both;height:1px"></div>';

$page_content .= '<div class="rkForm" style="width: 140px">'. FORM_FIELD_CUSTOMER_NAME.'</div>';
$page_content .= '<div class="rkDescRight">' .tep_draw_input_field('from_name',$from_name).'</div>';
$page_content .= '<div style="clear:both;height:10px"></div>';


$page_content .= '<div class="rkForm" style="width: 140px">'. FORM_FIELD_CUSTOMER_EMAIL.'</div>';
$page_content .= '<div class="rkDescRight">' .tep_draw_input_field('from_email_address',$from_email_address).'</div>';
$page_content .= '<div style="clear:both;height:10px"></div>';


$page_content .= '<div class="rkForm" style="width: 140px">'. FORM_FIELD_FRIEND_NAME.'</div>';
$page_content .= '<div class="rkDescRight">' .tep_draw_input_field('to_name').'</div>';
$page_content .= '<div style="clear:both;height:10px"></div>';

$page_content .= '<div class="rkForm" style="width: 140px">'. FORM_FIELD_FRIEND_EMAIL.'</div>';
$page_content .= '<div class="rkDescRight">' .tep_draw_input_field('to_email_address').'</div>';
$page_content .= '<div style="clear:both;height:10px"></div>';

$page_content .= '<div class="rkForm" style="width: 140px">'. FORM_TITLE_FRIEND_MESSAGE.'</div>';
$page_content .= '<div class="rkDescRight">' .tep_draw_textarea_field('message', 'soft', 40, 8).'</div>';
$page_content .= '<div style="clear:both;height:10px"></div>';


$page_content .= '<table border="0" width="100%" cellspacing="1" cellpadding="2">';
$page_content .= '<tr class="infoBoxContents">';
$page_content .= '<td><table border="0" width="100%" cellspacing="0" cellpadding="2">';
$page_content .= '<tr>';
$page_content .= '<td>'. tep_draw_separator('pixel_trans.gif', '10', '1').'</td>';
$page_content .= '<td class="main"><input type="button" class="'.cssclass('BUTTON_BACK').'" value="'.IMAGE_BUTTON_BACK.'" onclick="rk_redirect(\''. tep_href_link(FILENAME_PRODUCT_INFO, 'products_id=' . $HTTP_GET_VARS['products_id']) .'\');"></td>';
$page_content .= '<td class="main"></td>';
$page_content .= '<td align="right" class="main"><input type="submit" class="'.cssclass('BUTTON_CONTINUE').'" value="'.IMAGE_BUTTON_CONTINUE.'"></td>'; 
$page_content .= '<td width="10">'.tep_draw_separator('pixel_trans.gif', '10', '1').'</td>';
$page_content .= '</tr>';
$page_content .= '</table></td>';
$page_content .= '</tr>';
$page_content .= '</table>';

$page_content .= '<div style="clear:both;height:10px"></div>';

$page_content .= '</form>';
?>