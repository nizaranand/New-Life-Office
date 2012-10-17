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

$specials_query_raw = "select p.products_id, pd.products_name, p.products_price, p.products_tax_class_id, p.products_image, s.specials_new_products_price from " . TABLE_PRODUCTS . " p, " . TABLE_PRODUCTS_DESCRIPTION . " pd, " . TABLE_SPECIALS . " s where p.products_status = '1' and s.products_id = p.products_id and p.products_id = pd.products_id and pd.language_id = '" . (int)$languages_id . "' and s.status = '1' order by s.specials_date_added DESC";
  $specials_split = new splitPageResults($specials_query_raw, MAX_DISPLAY_SPECIAL_PRODUCTS);

  if (($specials_split->number_of_rows > 0) && ((PREV_NEXT_BAR_LOCATION == '1') || (PREV_NEXT_BAR_LOCATION == '3'))) {

$page_content .= '<div style="clear:both;height:1px"></div>'."\n";
$page_content .= '<div style="text-align:right"><small>'.$specials_split->display_count(TEXT_DISPLAY_NUMBER_OF_SPECIALS).'&nbsp;'.TEXT_RESULT_PAGE . ' ' . $specials_split->display_links(MAX_DISPLAY_PAGE_LINKS, tep_get_all_get_params(array('page', 'info', 'x', 'y'))).'</small></div>'."\n";
$page_content .= '<div style="clear:both;height:1px"></div>'."\n";

}
/// begin listing
    $specials_query = tep_db_query($specials_split->sql_query);
$page_content .= '<div class="ngg-albumoverview">'."\n";
    while ($specials = tep_db_fetch_array($specials_query)) {
$page_content .= '<div class="ngg-album-compact">'."\n";
$page_content .= '<div class="ngg-album-compactbox">'."\n";
$page_content .= '<div class="ngg-album-link">'."\n";
$page_content .= '<a class="Link" href="' . tep_href_link(FILENAME_PRODUCT_INFO, 'products_id=' . $specials['products_id']) . '">' . tep_image(DIR_WS_IMAGES . $specials['products_image'], $specials['products_name'], SMALL_IMAGE_WIDTH, SMALL_IMAGE_HEIGHT,'class="Thumb"') . '</a>'."\n";
$page_content .= '</div>'."\n";
$page_content .= '</div>'."\n";
$page_content .= '<div style="text-align:center"><a href="' . tep_href_link(FILENAME_PRODUCT_INFO, 'products_id=' . $specials['products_id']) . '">' . short_name($specials['products_name'],44) . '</a><br /><s><b>' . $currencies->display_price($specials['products_price'], tep_get_tax_rate($specials['products_tax_class_id'])) . '</b></s><br /><font color="#C60000"><b>' . $currencies->display_price($specials['specials_new_products_price'], tep_get_tax_rate($specials['products_tax_class_id'])) . '</b></font></div>'."\n";
$page_content .= '</div>'."\n";
}
$page_content .= '</div>'."\n";
/// end listing
$page_content .= '<div style="clear:both;height:20px"></div><br />'."\n";
  if (($specials_split->number_of_rows > 0) && ((PREV_NEXT_BAR_LOCATION == '2') || (PREV_NEXT_BAR_LOCATION == '3'))) {

$page_content .= '<div style="clear:both;height:1px"></div>'."\n";
$page_content .= '<div style="text-align:right"><small>'.$specials_split->display_count(TEXT_DISPLAY_NUMBER_OF_SPECIALS).'&nbsp;'.TEXT_RESULT_PAGE . ' ' . $specials_split->display_links(MAX_DISPLAY_PAGE_LINKS, tep_get_all_get_params(array('page', 'info', 'x', 'y'))).'</small></div>'."\n";
$page_content .= '<div style="clear:both;height:1px"></div>'."\n";

}
?>