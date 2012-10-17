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

$listing_split = new splitPageResults($listing_sql, MAX_DISPLAY_SEARCH_RESULTS, 'p.products_id');
if ( ($listing_split->number_of_rows > 0) && ( (PREV_NEXT_BAR_LOCATION == '1') || (PREV_NEXT_BAR_LOCATION == '3') ) ) {

$module .= '<div style="clear:both;height:1px"></div>'."\n";
$module .= '<div style="text-align:right"><small>'.$listing_split->display_count(TEXT_DISPLAY_NUMBER_OF_PRODUCTS). '&nbsp;'.TEXT_RESULT_PAGE . ' ' . $listing_split->display_links(MAX_DISPLAY_PAGE_LINKS, tep_get_all_get_params(array('page', 'info', 'x', 'y'))). '</small></div>';
$module .= '<div style="clear:both;height:1px"></div>'."\n";

}

  if ($listing_split->number_of_rows > 0) {
    $listing_query = tep_db_query($listing_split->sql_query);

$module .= '<div class="ngg-albumoverview">'."\n";	

    while ($listing = tep_db_fetch_array($listing_query)) {
      if ($new_price = tep_get_products_special_price($listing['products_id'])) {
        $products_price = '<s>' . $currencies->display_price($listing['products_price'], tep_get_tax_rate($listing['products_tax_class_id'])) . '</s> <strong><font color=\'#C60000\'>' . $currencies->display_price($new_price, tep_get_tax_rate($listing['products_tax_class_id'])) . '</font></strong>';
      } else {
        $products_price = '<strong>'.$currencies->display_price($listing['products_price'], tep_get_tax_rate($listing['products_tax_class_id'])).'</strong>';
      }
$products_price_html = str_replace(array('<', '>'), array('&lt;', '&gt;'), $products_price);
/// debut listing
$module .= '<div class="ngg-album">'."\n";
$module .= '<div class="ngg-albumcontent">'."\n";
$module .= '<div class="ngg-thumbnail">'."\n";
if (tep_not_null($listing['products_image'])) {
$module .= '<a rel="lightbox" title="&lt;a href=\'' . tep_href_link(FILENAME_PRODUCT_INFO, 'products_id=' . $listing['products_id']) . '\'&gt;'.$listing['products_name'].'&lt;/a&gt;&lt;br /&gt;&lt;b&gt;' . $products_price_html.'&lt;/b&gt;&lt;br /&gt;&lt;a href=\'' .tep_href_link(FILENAME_PRODUCTS_NEW, tep_get_all_get_params(array('action')) . 'action=buy_now&amp;products_id=' . $listing['products_id']). '\'&gt;'.IMAGE_BUTTON_IN_CART.'&lt;/a&gt;" href="' . tep_href_link(DIR_WS_IMAGES . $listing['products_image']) . '">' . tep_image(DIR_WS_IMAGES . $listing['products_image'], $listing['products_name'], SMALL_IMAGE_WIDTH, '', 'class="Thumb"') . '</a>'."\n";
}
$module .= '</div>'."\n";
$module .= '<div class="ngg-description">'."\n";
$module .= '<p>'."\n";
/// begin description
$module .= '<a href="' . tep_href_link(FILENAME_PRODUCT_INFO, 'products_id=' . $listing['products_id']) . '"><b><u>' . $listing['products_name'] . '</u></b></a>'."\n";
if (tep_not_null($listing['manufacturers_name'])) $module .= TEXT_BY. $listing['manufacturers_name']."\n";
$module .= '<br />'."\n";

$module .= '<a href="' . tep_href_link(basename($PHP_SELF), tep_get_all_get_params(array('action')) . 'action=buy_now&products_id=' . $listing['products_id']) . '">' . IMAGE_BUTTON_BUY_NOW . '</a>'. ' : ' . $products_price .'<br />';

if (tep_not_null($listing['products_date_added'])) $module .= '<small>' .tep_date_long($listing['products_date_added']) . '</small><br />'."\n";
if (tep_not_null($listing['products_model'])) $module .= '<small>' .TABLE_HEADING_MODEL. ' : ' .$listing['products_model'] . '</small><br />'."\n";

if (tep_not_null($listing['products_quantity'])) $module .= '<small>' .TABLE_HEADING_QUANTITY. ' : ' .$listing['products_quantity'] . '</small><br />'."\n";
if (tep_not_null($listing['products_weight'])) $module .= '<small>' .TABLE_HEADING_WEIGHT. ' : ' .$listing['products_weight'] . '</small><br />'."\n";

if ((!tep_not_null($listing['products_quantity']))&&(!tep_not_null($listing['products_weight']))&&(!tep_not_null($listing['products_model'])))
$module .= '<small>'.short_name($listing['products_description'],180). '</small>'."\n";

    $rev_nb_query = tep_db_query("select count(*) as total from " . TABLE_REVIEWS . " where products_id = '" . (int)$listing['products_id'] . "'");
    $rev_nb = tep_db_fetch_array($rev_nb_query);
    if ($rev_nb['total'] > 0) {
    $tr = 0;
    $rev_query = tep_db_query("select reviews_id, reviews_rating from " . TABLE_REVIEWS . " where products_id = '" . (int)$listing['products_id'] . "'");
    while ($rev = tep_db_fetch_array($rev_query)) { $tr = $tr+ $rev['reviews_rating']; }
	$tr = ceil($tr / $rev_nb['total']);
$module .= '<br /><a href="' . tep_href_link(FILENAME_PRODUCT_REVIEWS, 'products_id=' . $listing['products_id']) . '">'.tep_image(DIR_WS_IMAGES . 'stars_' . $tr . '.gif' , sprintf(BOX_REVIEWS_TEXT_OF_5_STARS, $tr)) . '</a> <a href="' . tep_href_link(FILENAME_PRODUCT_REVIEWS, 'products_id=' . $listing['products_id']) . '">' .'<small>('.$rev_nb['total'].')</small></a>' ;
    }	
/// end description
$module .= '</p>'."\n";
$module .= '</div>'."\n";
$module .= '</div>'."\n";
$module .= '</div>'."\n";
/// end listing
    }
$module .= '</div>'."\n";
$module .= '<div style="clear:both;height:10px"></div>';
  } else {
   if (!has_category_articles ($current_category_id, 'all') ) $module .= TEXT_NO_PRODUCTS; 
  }
  if ( ($listing_split->number_of_rows > 0) && ((PREV_NEXT_BAR_LOCATION == '2') || (PREV_NEXT_BAR_LOCATION == '3')) ) {
$module .= '<div style="clear:both;height:1px"></div>'."\n";
$module .= '<div style="text-align:right"><small>'.$listing_split->display_count(TEXT_DISPLAY_NUMBER_OF_PRODUCTS). '&nbsp;'.TEXT_RESULT_PAGE . ' ' . $listing_split->display_links(MAX_DISPLAY_PAGE_LINKS, tep_get_all_get_params(array('page', 'info', 'x', 'y'))). '</small></div>';
$module .= '<div style="clear:both;height:1px"></div>'."\n";
  }
?>