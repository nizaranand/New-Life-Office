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
	require('includes/application_top.php');
	require(DIR_WS_INCLUDES . 'wp-osc.php'); 
	require(DIR_WS_LANGUAGES . $language . '/' . FILENAME_PRODUCT_INFO);
	$name_query = tep_db_query("select articles_name from " . 'wposc_articles_description' . " where articles_id = '" . (int)$HTTP_GET_VARS['articles_id'] . "' and language_id = '" . (int)$languages_id . "'");
	$name_info = tep_db_fetch_array($name_query);
	$articles_name = $name_info['articles_name'];
	$breadcrumb->add($articles_name, tep_href_link('articles_info.php', 'cPath=' . $cPath . '&articles_id=' . (int)$HTTP_GET_VARS['articles_id']));
?>
<?php $where=47; ?>
<?php $nbs=1; ?>
<?php $count=0; ?>
<?php get_page(); ?>
<?php require(DIR_WS_INCLUDES . 'application_bottom.php'); ?>