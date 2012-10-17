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
$module = '';

$listing_split = new splitPageResults($listing_sql,MAX_DISPLAY_SEARCH_RESULTS, 'a.articles_id');
if ( ($listing_split->number_of_rows > 0) && ( (PREV_NEXT_BAR_LOCATION == '1') || (PREV_NEXT_BAR_LOCATION == '3') ) ) {
$module .= '<div style="clear:both;height:1px"></div>'."\n";
$module .= '<div style="text-align:right"><small>'.$listing_split->display_count(TEXT_DISPLAY_NUMBER_OF_PRODUCTS). '&nbsp;'.TEXT_RESULT_PAGE . ' ' . $listing_split->display_links(MAX_DISPLAY_PAGE_LINKS, tep_get_all_get_params(array('page', 'info', 'x', 'y'))). '</small></div>';
$module .= '<div style="clear:both;height:1px"></div>'."\n";

}

  if ($listing_split->number_of_rows > 0) {
    $listing_query = tep_db_query($listing_split->sql_query);
    while ($listing = tep_db_fetch_array($listing_query)) {
$module .= '<div class="rkImg">';
    if (tep_not_null($listing['articles_image'])) {
$module .= '<a href="' . tep_href_link('articles_info.php', 'articles_id=' . $listing['articles_id']) . '">' . tep_image(DIR_WS_IMAGES . $listing['articles_image'], $listing['articles_name'], SMALL_IMAGE_WIDTH, SMALL_IMAGE_HEIGHT) . '</a>'."\n";
}
$module .= '</div>'."\n";
$module .= '<div class="rkDescRight">'."\n";
$module .= '<a href="' . tep_href_link('articles_info.php', 'articles_id=' . $listing['articles_id']) . '"><b><u>' . $listing['articles_name'] . '</u></b></a>'."\n";
$module .= '<br />'."\n";
if (tep_not_null($listing['articles_date_added'])) $module .= '<small>' .tep_date_long($listing['articles_date_added']) . '</small><br />'."\n";
$module .= '<small>'.strip_tags(short_name($listing['articles_description'],180)). '</small>'."\n";
$module .= '</div>';
$module .= '<div style="clear:both;height:10px"></div>';
    }
//// end articles

  } else {
   if (!has_category_articles ($current_category_id, 'all') ) $module .= TEXT_NO_PRODUCTS; 
  }
  if ( ($listing_split->number_of_rows > 0) && ((PREV_NEXT_BAR_LOCATION == '2') || (PREV_NEXT_BAR_LOCATION == '3')) ) {
$module .= '<div style="clear:both;height:1px"></div>'."\n";
$module .= '<div style="text-align:right"><small>'.$listing_split->display_count(TEXT_DISPLAY_NUMBER_OF_PRODUCTS). '&nbsp;'.TEXT_RESULT_PAGE . ' ' . $listing_split->display_links(MAX_DISPLAY_PAGE_LINKS, tep_get_all_get_params(array('page', 'info', 'x', 'y'))). '</small></div>';
$module .= '<div style="clear:both;height:1px"></div>'."\n";
  }
?>