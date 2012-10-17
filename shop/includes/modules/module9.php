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
$totalproduct_query = tep_db_query("select count(*) as total from " . TABLE_PRODUCTS);
$totalproduct = tep_db_fetch_array($totalproduct_query);
if (($totalproduct['total'] <= 0)||(isset($HTTP_GET_VARS['si']) && ($HTTP_GET_VARS['si'] == 'article'))) {


$page_content .= tep_draw_form('advanced_search', tep_href_link(FILENAME_ADVANCED_SEARCH_RESULT, '', 'NONSSL', false), 'get', 'style= "border: 0px;  padding: 5px; text-align:left" onsubmit="return check_form(this);"') . tep_hide_session_id();
$page_content .= tep_draw_hidden_field('si', 'article');

if ($messageStack->size('search') > 0) {
	$page_content .= $messageStack->output('search'). '<br />';
}
$page_content .= '<div style="clear:both;height:1px"></div>'."\n";
$page_content .= '<div style="text-align:right">';
if ($totalproduct['total'] > 0) 
$page_content .= '<a href="' . tep_href_link(FILENAME_ADVANCED_SEARCH, 'si=product', 'NONSSL', false) . '">' . '<u>'.NAVBAR_TITLE_1. ':'. PRODUCTS.'</u>' . '</a>&nbsp;&nbsp;';

$page_content .= '<a href="javascript:popupWindow(\'' . tep_href_link(FILENAME_POPUP_SEARCH_HELP) . '\')">' . TEXT_SEARCH_HELP_LINK . '</a>'.'</div>'."\n";

$page_content .= '<div style="clear:both;height:10px"></div>'."\n";

$page_content .= '<div class="rkForm" style="width: 140px">'. HEADING_SEARCH_CRITERIA.'</div>'."\n";
$page_content .= '<div class="rkDescRight">' .tep_draw_input_field('keywords').'</div>'."\n";
$page_content .= '<div style="clear:both;height:10px"></div>'."\n";

$page_content .= '<div class="rkForm" style="width: 140px"></div>'."\n";
$page_content .= '<div class="rkDescRight">' .tep_draw_checkbox_field('search_in_description', '1', true).'&nbsp;'. INCLUDE_CONTENT.'</div>'."\n";
$page_content .= '<div style="clear:both;height:10px"></div>'."\n";

$page_content .= '<div class="rkForm" style="width: 140px">'. ENTRY_CATEGORIES.'</div>'."\n";
$page_content .= '<div class="rkDescRight">' .tep_draw_pull_down_menu('categories_id', tep_get_categories(array(array('id' => '', 'text' => TEXT_ALL_CATEGORIES)))).'</div>'."\n";
$page_content .= '<div style="clear:both;height:10px"></div>'."\n";

$page_content .= '<div class="rkForm" style="width: 140px"></div>'."\n";
$page_content .= '<div class="rkDescRight">' .tep_draw_checkbox_field('inc_subcat', '1', true).'&nbsp;'.ENTRY_INCLUDE_SUBCATEGORIES.'</div>'."\n";
$page_content .= '<div style="clear:both;height:10px"></div>'."\n";

$page_content .= '<div class="rkForm" style="width: 140px">'. ENTRY_DATE_FROM.'</div>'."\n";
$page_content .= '<div class="rkDescRight">' .tep_draw_input_field('dfrom', DOB_FORMAT_STRING, 'onfocus="RemoveFormatString(this, \'' . DOB_FORMAT_STRING . '\')"') .'</div>'."\n";
$page_content .= '<div style="clear:both;height:10px"></div>'."\n";

$page_content .= '<div class="rkForm" style="width: 140px">'. ENTRY_DATE_TO.'</div>'."\n";
$page_content .= '<div class="rkDescRight">' .tep_draw_input_field('dto', DOB_FORMAT_STRING, 'onfocus="RemoveFormatString(this, \'' . DOB_FORMAT_STRING . '\')"') .'</div>'."\n";
$page_content .= '<div style="clear:both;height:10px"></div>'."\n";


$page_content .= '<div style="text-align:right">'.'<input type="submit" class="'.cssclass('BUTTON_SEARCH').'" value="'.IMAGE_BUTTON_SEARCH.'" />'.'</div>'."\n";
$page_content .= '<div style="clear:both;height:1px"></div>'."\n";

$page_content .= '</form>';
} else {

$page_content .= tep_draw_form('advanced_search', tep_href_link(FILENAME_ADVANCED_SEARCH_RESULT, '', 'NONSSL', false), 'get', 'style= "border: 0px;  padding: 5px; text-align:left" onsubmit="return check_form(this);"') . tep_hide_session_id();
$page_content .= tep_draw_hidden_field('si', 'product');
if ($messageStack->size('search') > 0) {
	$page_content .= $messageStack->output('search'). '<br />';
}
$page_content .= '<div style="clear:both;height:1px"></div>'."\n";
$page_content .= '<div style="text-align:right">'.'<a href="' . tep_href_link(FILENAME_ADVANCED_SEARCH, 'si=article', 'NONSSL', false) . '">' . '<u>'.NAVBAR_TITLE_1. ':'. ARTICLES .'</u>' . '</a>&nbsp;&nbsp;<a href="javascript:popupWindow(\'' . tep_href_link(FILENAME_POPUP_SEARCH_HELP) . '\')">' . TEXT_SEARCH_HELP_LINK . '</a>'.'</div>'."\n";

$page_content .= '<div style="clear:both;height:10px"></div>'."\n";

$page_content .= '<div class="rkForm" style="width: 140px">'. HEADING_SEARCH_CRITERIA.'</div>'."\n";
$page_content .= '<div class="rkDescRight">' .tep_draw_input_field('keywords').'</div>'."\n";
$page_content .= '<div style="clear:both;height:10px"></div>'."\n";

$page_content .= '<div class="rkForm" style="width: 140px"></div>'."\n";
$page_content .= '<div class="rkDescRight">' .tep_draw_checkbox_field('search_in_description', '1').'&nbsp;'. TEXT_SEARCH_IN_DESCRIPTION.'</div>'."\n";
$page_content .= '<div style="clear:both;height:10px"></div>'."\n";

$page_content .= '<div class="rkForm" style="width: 140px">'. ENTRY_CATEGORIES.'</div>'."\n";
$page_content .= '<div class="rkDescRight">' .tep_draw_pull_down_menu('categories_id', tep_get_categories(array(array('id' => '', 'text' => TEXT_ALL_CATEGORIES)))).'</div>'."\n";
$page_content .= '<div style="clear:both;height:10px"></div>'."\n";

$page_content .= '<div class="rkForm" style="width: 140px"></div>'."\n";
$page_content .= '<div class="rkDescRight">' .tep_draw_checkbox_field('inc_subcat', '1', true).'&nbsp;'.ENTRY_INCLUDE_SUBCATEGORIES.'</div>'."\n";
$page_content .= '<div style="clear:both;height:10px"></div>'."\n";

$page_content .= '<div class="rkForm" style="width: 140px">'. ENTRY_MANUFACTURERS.'</div>'."\n";
$page_content .= '<div class="rkDescRight">' .tep_draw_pull_down_menu('manufacturers_id', tep_get_manufacturers(array(array('id' => '', 'text' => TEXT_ALL_MANUFACTURERS)))).'</div>'."\n";
$page_content .= '<div style="clear:both;height:10px"></div>'."\n";


$page_content .= '<div class="rkForm" style="width: 140px">'. ENTRY_PRICE_FROM.'</div>'."\n";
$page_content .= '<div class="rkDescRight">' .tep_draw_input_field('pfrom').'</div>'."\n";
$page_content .= '<div style="clear:both;height:10px"></div>'."\n";

$page_content .= '<div class="rkForm" style="width: 140px">'. ENTRY_PRICE_TO.'</div>'."\n";
$page_content .= '<div class="rkDescRight">' .tep_draw_input_field('pto').'</div>'."\n";
$page_content .= '<div style="clear:both;height:10px"></div>'."\n";

$page_content .= '<div class="rkForm" style="width: 140px">'. ENTRY_DATE_FROM.'</div>'."\n";
$page_content .= '<div class="rkDescRight">' .tep_draw_input_field('dfrom', DOB_FORMAT_STRING, 'onfocus="RemoveFormatString(this, \'' . DOB_FORMAT_STRING . '\')"') .'</div>'."\n";
$page_content .= '<div style="clear:both;height:10px"></div>'."\n";


$page_content .= '<div class="rkForm" style="width: 140px">'. ENTRY_DATE_TO.'</div>'."\n";
$page_content .= '<div class="rkDescRight">' .tep_draw_input_field('dto', DOB_FORMAT_STRING, 'onfocus="RemoveFormatString(this, \'' . DOB_FORMAT_STRING . '\')"') .'</div>'."\n";
$page_content .= '<div style="clear:both;height:10px"></div>'."\n";


$page_content .= '<div style="text-align:right">'.'<input type="submit" class="'.cssclass('BUTTON_SEARCH').'" value="'.IMAGE_BUTTON_SEARCH.'" />'.'</div>'."\n";
$page_content .= '<div style="clear:both;height:1px"></div>'."\n";

$page_content .= '</form>';
}
?>