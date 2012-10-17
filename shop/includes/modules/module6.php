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
  $reviews_query_raw = "select r.reviews_id, left(rd.reviews_text, 100) as reviews_text, r.reviews_rating, r.date_added, p.products_id, pd.products_name, p.products_image, r.customers_name from " . TABLE_REVIEWS . " r, " . TABLE_REVIEWS_DESCRIPTION . " rd, " . TABLE_PRODUCTS . " p, " . TABLE_PRODUCTS_DESCRIPTION . " pd where p.products_status = '1' and p.products_id = r.products_id and r.reviews_id = rd.reviews_id and p.products_id = pd.products_id and pd.language_id = '" . (int)$languages_id . "' and rd.languages_id = '" . (int)$languages_id . "' order by r.reviews_id DESC";
  $reviews_split = new splitPageResults($reviews_query_raw, MAX_DISPLAY_NEW_REVIEWS);

  if ($reviews_split->number_of_rows > 0) {
    if ((PREV_NEXT_BAR_LOCATION == '1') || (PREV_NEXT_BAR_LOCATION == '3')) {

$page_content .= '<div style="clear:both;height:1px"></div>'."\n";
$page_content .= '<div style="text-align:right"><small>'.$reviews_split->display_count(TEXT_DISPLAY_NUMBER_OF_REVIEWS).'&nbsp;'. TEXT_RESULT_PAGE . ' ' . $reviews_split->display_links(MAX_DISPLAY_PAGE_LINKS, tep_get_all_get_params(array('page', 'info'))).'</small></div>'."\n";
$page_content .= '<div style="clear:both;height:1px"></div>'."\n";

}

$reviews_query = tep_db_query($reviews_split->sql_query);
$page_content .= '<div class="ngg-albumoverview">'."\n";	

while ($reviews = tep_db_fetch_array($reviews_query)) {

	
$page_content .= '<div class="ngg-album">'."\n";
$page_content .= ''."\n";
/// begin title
$page_content .= '<a href="' . tep_href_link(FILENAME_PRODUCT_REVIEWS_INFO, 'products_id=' . $reviews['products_id'] . '&reviews_id=' . $reviews['reviews_id']) . '"><u><b>' . $reviews['products_name'] . '</b></u></a> '."\n";
$page_content .= '<small>' . sprintf(TEXT_REVIEW_BY, tep_output_string_protected($reviews['customers_name'])) . '</small>'."\n";
$page_content .= '<br />' .'<small>'. sprintf(TEXT_REVIEW_DATE_ADDED, tep_date_long($reviews['date_added'])).'</small>'."\n";
/// end title
$page_content .= ''."\n";
$page_content .= '<div class="ngg-albumcontent">'."\n";
$page_content .= '<div class="ngg-thumbnail">'."\n";
/// begin image
$page_content .= '<a href="' . tep_href_link(FILENAME_PRODUCT_REVIEWS_INFO, 'products_id=' . $reviews['products_id'] . '&reviews_id=' . $reviews['reviews_id']) . '">' . tep_image(DIR_WS_IMAGES . $reviews['products_image'], $reviews['products_name'], SMALL_IMAGE_WIDTH, '',' class="Thumb"') . '</a>'."\n";
/// end image
$page_content .= '</div>'."\n";
$page_content .= '<div class="ngg-description">'."\n";
$page_content .= '<p>'."\n";
/// begin description
$page_content .= tep_break_string(tep_output_string_protected($reviews['reviews_text']), 60, '-<br />') . ((strlen($reviews['reviews_text']) >= 100) ? '..' : '') . '<br /><br /><i>' . sprintf(TEXT_REVIEW_RATING, tep_image(DIR_WS_IMAGES . 'stars_' . $reviews['reviews_rating'] . '.gif', sprintf(TEXT_OF_5_STARS, $reviews['reviews_rating'])), sprintf(TEXT_OF_5_STARS, $reviews['reviews_rating'])) . '</i>'."\n";
/// end description
$page_content .= '</p>'."\n";
$page_content .= '</div>'."\n";
$page_content .= '</div>'."\n";
$page_content .= '</div>'."\n";
}
$page_content .= '</div>'."\n";
  } else {
$page_content .= TEXT_NO_REVIEWS; 
  }

  if (($reviews_split->number_of_rows > 0) && ((PREV_NEXT_BAR_LOCATION == '2') || (PREV_NEXT_BAR_LOCATION == '3'))) {

$page_content .= '<div style="clear:both;height:1px"></div>'."\n";
$page_content .= '<div style="text-align:right"><small>'.$reviews_split->display_count(TEXT_DISPLAY_NUMBER_OF_REVIEWS).'&nbsp;'. TEXT_RESULT_PAGE . ' ' . $reviews_split->display_links(MAX_DISPLAY_PAGE_LINKS, tep_get_all_get_params(array('page', 'info'))).'</small></div>'."\n";
$page_content .= '<div style="clear:both;height:1px"></div>'."\n";
}
?>