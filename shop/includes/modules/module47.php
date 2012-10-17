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
 $article_check_query = tep_db_query("select count(*) as total from " . 'wposc_articles' . " a, " . 'wposc_articles_description' . " ad where a.articles_status = '1' and a.articles_id = '" . (int)$HTTP_GET_VARS['articles_id'] . "' and ad.articles_id = a.articles_id and ad.language_id = '" . (int)$languages_id . "'");
  $article_check = tep_db_fetch_array($article_check_query);

if ($article_check['total'] < 1) {

	$page_content .= TEXT_PRODUCT_NOT_FOUND.'<br />';
	$page_content .= '<a href="' . tep_href_link(FILENAME_DEFAULT) . '">' . IMAGE_BUTTON_CONTINUE . '</a>'. '<br />';
} else {

    $article_info_query = tep_db_query("select a.articles_id, ad.articles_name, ad.articles_description, a.articles_image, a.articles_date_added from " . 'wposc_articles' . " a, " . 'wposc_articles_description' . " ad where a.articles_status = '1' and a.articles_id = '" . (int)$HTTP_GET_VARS['articles_id'] . "' and ad.articles_id = a.articles_id and ad.language_id = '" . (int)$languages_id . "'");
    $article_info = tep_db_fetch_array($article_info_query);

    tep_db_query("update " . 'wposc_articles_description' . " set articles_viewed = articles_viewed+1 where articles_id = '" . (int)$HTTP_GET_VARS['articles_id'] . "' and language_id = '" . (int)$languages_id . "'");

 
 $articles_name = $article_info['articles_name'];
 if (tep_not_null($article_info['articles_image'])) {

$page_content .= '<div class="rkImg">'."\n";
$page_content .= '<a href="' . tep_href_link(DIR_WS_IMAGES . $article_info['articles_image']) . '" target="_blank">' . tep_image(DIR_WS_IMAGES . $article_info['articles_image'], $article_info['articles_name']).'</a>';

$page_content .= '<div class="desc"></div></div>'. "\n";
}

$page_content .= stripslashes($article_info['articles_description']) . '<br />';

$page_content .= '<small>'. tep_date_long($article_info['articles_date_added']) . '</small>';
$page_content .= '<div style="clear:both;height:10px"></div>';

}
?>