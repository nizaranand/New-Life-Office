<?php
/* image rotator for WP.osC by Roya Khosravi */
require('includes/application_top.php');
$limit = isset($_GET['number']) ? $_GET['number'] : '45';
$siteurl = HTTP_SERVER.DIR_WS_HTTP_CATALOG;
$show_products_query = tep_db_query("select distinct p.products_id, p.products_image, p.products_date_added, pd.products_name from " . TABLE_PRODUCTS . " p, " . TABLE_PRODUCTS_DESCRIPTION . " pd where p.products_status = '1' and p.products_id = pd.products_id and pd.language_id = '" . (int)$languages_id . "' order by p.products_date_added DESC limit " . $limit);
header("content-type:text/xml;charset=utf-8");
echo '<?xml version="1.0" encoding="utf-8"?>'."\n";
echo '<playlist version="1" xmlns="http://xspf.org/ns/0/">'."\n";
echo '	<trackList>'."\n";
while ($show_products = tep_db_fetch_array($show_products_query)) {
echo '		<track>'."\n";
echo '			<title>'.strip_tags(stripslashes(html_entity_decode($show_products['products_name']))).'</title>'."\n";
echo '			<creator>'.$siteurl.'</creator>'."\n";
echo '			<location>'.$siteurl.DIR_WS_IMAGES.$show_products['products_image'].'</location>'."\n";
echo '			<info>'.tep_href_link(FILENAME_PRODUCT_INFO, 'products_id=' . $show_products['products_id']).'</info>'."\n";
echo '		</track>'."\n";
  }
echo '	</trackList>'."\n";
echo '</playlist>'."\n";
require('includes/application_bottom.php');
?>