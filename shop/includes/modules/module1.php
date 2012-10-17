<?php
$module = '';
$module .= '<div style="clear:both;height:1px"></div>'."\n";
$module .=  '<div style="text-align:left"><strong>'.sprintf(TABLE_HEADING_NEW_PRODUCTS, strftime('%B')).'</strong></div>'."\n";
$module .= '<div style="clear:both;height:10px"></div>'."\n";

  if ( (!isset($new_products_category_id)) || ($new_products_category_id == '0') ) {
    $new_products_query = tep_db_query("select p.products_id, p.products_image, p.products_tax_class_id, pd.products_name, if(s.status, s.specials_new_products_price, p.products_price) as products_price from " . TABLE_PRODUCTS . " p left join " . TABLE_SPECIALS . " s on p.products_id = s.products_id, " . TABLE_PRODUCTS_DESCRIPTION . " pd where p.products_status = '1' and p.products_id = pd.products_id and pd.language_id = '" . (int)$languages_id . "' order by p.products_date_added desc limit " . MAX_DISPLAY_NEW_PRODUCTS);
  } else {
    $new_products_query = tep_db_query("select distinct p.products_id, p.products_image, p.products_tax_class_id, pd.products_name, if(s.status, s.specials_new_products_price, p.products_price) as products_price from " . TABLE_PRODUCTS . " p left join " . TABLE_SPECIALS . " s on p.products_id = s.products_id, " . TABLE_PRODUCTS_DESCRIPTION . " pd, " . TABLE_PRODUCTS_TO_CATEGORIES . " p2c, " . TABLE_CATEGORIES . " c where p.products_id = p2c.products_id and p2c.categories_id = c.categories_id and c.parent_id = '" . (int)$new_products_category_id . "' and p.products_status = '1' and p.products_id = pd.products_id and pd.language_id = '" . (int)$languages_id . "' order by p.products_date_added desc limit " . MAX_DISPLAY_NEW_PRODUCTS);
  }

    $rows = 0;
  while ($new_products = tep_db_fetch_array($new_products_query)) {
$rows++;
$caption = htmlentities('<a href="' . tep_href_link(FILENAME_PRODUCT_INFO, 'products_id=' . $new_products['products_id']) . '">'.$new_products['products_name'].'</a><br /><b>' . $currencies->display_price($new_products['products_price'], tep_get_tax_rate($new_products['products_tax_class_id'])).'</b><br /><a href="' .tep_href_link(FILENAME_PRODUCTS_NEW, tep_get_all_get_params(array('action')) . 'action=buy_now&products_id=' . $new_products['products_id']). '">'.IMAGE_BUTTON_IN_CART.'</a>', ENT_QUOTES);

if (tep_not_null($new_products['products_image'])) {$products_image = $new_products['products_image'];} 
else {$products_image = 'no_picture.gif';}

$module .= '<div class="rkImg" style="height:'.(2*SMALL_IMAGE_HEIGHT).'px;"><a rel="lightbox[roadtrip]" href="' . tep_href_link(DIR_WS_IMAGES . $products_image) . '" title="'.$caption.'" >' . tep_image(DIR_WS_IMAGES . $products_image, $new_products['products_name'], '', SMALL_IMAGE_HEIGHT) . '</a><div class="desc">'."\n";

$module .= '<a href="' . tep_href_link(FILENAME_PRODUCT_INFO, 'products_id=' . $new_products['products_id']) . '">' . short_name($new_products['products_name'], 44) . '</a><br /><b>' . $currencies->display_price($new_products['products_price'], tep_get_tax_rate($new_products['products_tax_class_id'])).'</b></div>'."\n";

$module .= '</div>'."\n";
  }
$module .= '<div style="clear:both;height:10px"></div>'."\n"; 	
?>
