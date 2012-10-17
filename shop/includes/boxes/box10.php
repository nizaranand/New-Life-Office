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
if (!tep_not_null($width))  $width = SMALL_IMAGE_WIDTH;
if (!tep_not_null($height)) $height = SMALL_IMAGE_HEIGHT;
if (!tep_not_null($limit)) $limit = 1;

  $box_contents = '';
  $random_select = "select r.reviews_id, r.reviews_rating, p.products_id, p.products_image, pd.products_name from " . TABLE_REVIEWS . " r, " . TABLE_REVIEWS_DESCRIPTION . " rd, " . TABLE_PRODUCTS . " p, " . TABLE_PRODUCTS_DESCRIPTION . " pd where p.products_status = '1' and p.products_id = r.products_id and r.reviews_id = rd.reviews_id and rd.languages_id = '" . (int)$languages_id . "' and p.products_id = pd.products_id and pd.language_id = '" . (int)$languages_id . "'";
  if (isset($HTTP_GET_VARS['products_id'])) {
    $random_select .= " and p.products_id = '" . (int)$HTTP_GET_VARS['products_id'] . "'";
  }
  $random_select .= " order by r.reviews_id desc limit " . $limit;
  $random_product = tep_random_select($random_select);

  if ($random_product) {
// display random review box
    $rand_review_query = tep_db_query("select substring(reviews_text, 1, 60) as reviews_text from " . TABLE_REVIEWS_DESCRIPTION . " where reviews_id = '" . (int)$random_product['reviews_id'] . "' and languages_id = '" . (int)$languages_id . "'");
    $rand_review = tep_db_fetch_array($rand_review_query);

    $rand_review_text = tep_break_string(tep_output_string_protected($rand_review['reviews_text']), 15, '-<br>');

   $caption = htmlentities('<a href="' . tep_href_link(FILENAME_PRODUCT_REVIEWS_INFO, 'products_id=' . $random_product['products_id'] . '&reviews_id=' . $random_product['reviews_id']) . '">' .$random_product['products_name'] . '</a><br />' . '<a href="' . tep_href_link(FILENAME_PRODUCT_REVIEWS_INFO, 'products_id=' . $random_product['products_id'] . '&reviews_id=' . $random_product['reviews_id']) . '">' .$rand_review_text.'</a>', ENT_QUOTES);

  $box_contents .= $before .'<div id="ngg-image-16543" class="ngg-gallery-thumbnail-box" style="width:100%;text-align:center" ><div class="ngg-gallery-thumbnail" ><a rel="lightbox" title="'.$caption.'" href="'.tep_href_link(DIR_WS_IMAGES . $random_product['products_image']).'" class="shutterset_test" >'.tep_image(DIR_WS_IMAGES . $random_product['products_image'], $random_product['products_name'], $width, $height, $class).'</a></div></div>';

  $box_contents .= '<p style="text-align:center;"><a href="' . tep_href_link(FILENAME_PRODUCT_REVIEWS_INFO, 'products_id=' . $random_product['products_id'] . '&reviews_id=' . $random_product['reviews_id']) . '">' . $random_product['products_name'] . '</a><br /><a href="' . tep_href_link(FILENAME_PRODUCT_REVIEWS_INFO, 'products_id=' . $random_product['products_id'] . '&reviews_id=' . $random_product['reviews_id']) . '">' . $rand_review_text . ' ...</a></p>' . tep_image(DIR_WS_IMAGES . 'stars_' . $random_product['reviews_rating'] . '.gif' , sprintf(BOX_REVIEWS_TEXT_OF_5_STARS, $random_product['reviews_rating']) ,'','', $class). $after;


  } elseif (isset($HTTP_GET_VARS['products_id'])) {
// display 'write a review' box

  $box_contents .= $before.'<a href="' . tep_href_link(FILENAME_PRODUCT_REVIEWS_WRITE, 'products_id=' . $HTTP_GET_VARS['products_id']) . '">' . tep_image(DIR_WS_IMAGES . 'box_write_review.gif', IMAGE_BUTTON_WRITE_REVIEW ,'','', $class) . '</a>';
  $box_contents .= '<p style="text-align: center"><a href="' . tep_href_link(FILENAME_PRODUCT_REVIEWS_WRITE, 'products_id=' . $HTTP_GET_VARS['products_id']) . '">' .BOX_REVIEWS_WRITE_REVIEW.'</a></p>'.$after;
  } else {
// display 'no reviews' box
    $box_contents .= $before.BOX_REVIEWS_NO_REVIEWS.$after;
  }
?>