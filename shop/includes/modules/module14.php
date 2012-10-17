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
 $product_check_query = tep_db_query("select count(*) as total from " . TABLE_PRODUCTS . " p, " . TABLE_PRODUCTS_DESCRIPTION . " pd where p.products_status = '1' and p.products_id = '" . (int)$HTTP_GET_VARS['products_id'] . "' and pd.products_id = p.products_id and pd.language_id = '" . (int)$languages_id . "'");
  $product_check = tep_db_fetch_array($product_check_query);
$page_content .= tep_draw_form('cart_quantity', tep_href_link(FILENAME_PRODUCT_INFO, tep_get_all_get_params(array('action')) . 'action=add_product'),'post','style= "border: 0px; padding: 5px; text-align:left"'); 

if ($product_check['total'] < 1) {

	$page_content .= TEXT_PRODUCT_NOT_FOUND.'<br />';
	$page_content .= '<a href="' . tep_href_link(FILENAME_DEFAULT) . '">' . IMAGE_BUTTON_CONTINUE . '</a>'. '<br />';
} else {

    $product_info_query = tep_db_query("select p.products_id, pd.products_name, pd.products_description, p.products_model, p.products_quantity, p.products_image, pd.products_url, p.products_price, p.products_tax_class_id, p.products_date_added, p.products_date_available, p.manufacturers_id from " . TABLE_PRODUCTS . " p, " . TABLE_PRODUCTS_DESCRIPTION . " pd where p.products_status = '1' and p.products_id = '" . (int)$HTTP_GET_VARS['products_id'] . "' and pd.products_id = p.products_id and pd.language_id = '" . (int)$languages_id . "'");
    $product_info = tep_db_fetch_array($product_info_query);

    tep_db_query("update " . TABLE_PRODUCTS_DESCRIPTION . " set products_viewed = products_viewed+1 where products_id = '" . (int)$HTTP_GET_VARS['products_id'] . "' and language_id = '" . (int)$languages_id . "'");

    if ($new_price = tep_get_products_special_price($product_info['products_id'])) {
      $products_price = '<s>' . $currencies->display_price($product_info['products_price'], tep_get_tax_rate($product_info['products_tax_class_id'])) . '</s> <span class="productSpecialPrice">' . $currencies->display_price($new_price, tep_get_tax_rate($product_info['products_tax_class_id'])) . '</span>';
    } else {
      $products_price = $currencies->display_price($product_info['products_price'], tep_get_tax_rate($product_info['products_tax_class_id']));
    }


      $products_name = $product_info['products_name'];



    if (tep_not_null($product_info['products_image'])) {

$page_content .= '<div id="ngg-image-11111" class="ngg-gallery-thumbnail-box"  ><div class="ngg-gallery-thumbnail" >'."\n";
$page_content .= '<a  href="' . tep_href_link(DIR_WS_IMAGES . $product_info['products_image']) . '" title="'.$product_info['products_name'].'" rel="lightbox">' . tep_image(DIR_WS_IMAGES . $product_info['products_image'], $product_info['products_name'], '', 2*SMALL_IMAGE_HEIGHT,'class="Thumb"').'</a>';

$page_content .= '</div></div>'. "\n";
}
$page_content .= '<strong>'. $products_name . '<br />' .$products_price.'<br />';
if (tep_not_null($product_info['products_model'])) $page_content .= '<span class="smallText">[' . $product_info['products_model'] . ']</span><br />';
$page_content .= '</strong>';


$page_content .= stripslashes(str_replace('<br>','<br />',$product_info['products_description'])) . '<br />';


$products_attributes_query = tep_db_query("select count(*) as total from " . TABLE_PRODUCTS_OPTIONS . " popt, " . TABLE_PRODUCTS_ATTRIBUTES . " patrib where patrib.products_id='" . (int)$HTTP_GET_VARS['products_id'] . "' and patrib.options_id = popt.products_options_id and popt.language_id = '" . (int)$languages_id . "'");
    $products_attributes = tep_db_fetch_array($products_attributes_query);
    if ($products_attributes['total'] > 0) {
	$page_content .= '<div style="clear:both;height:10px"></div>';
	$page_content .= '<strong>'. TEXT_PRODUCT_OPTIONS. '</strong><br />';
           
      $products_options_name_query = tep_db_query("select distinct popt.products_options_id, popt.products_options_name from " . TABLE_PRODUCTS_OPTIONS . " popt, " . TABLE_PRODUCTS_ATTRIBUTES . " patrib where patrib.products_id='" . (int)$HTTP_GET_VARS['products_id'] . "' and patrib.options_id = popt.products_options_id and popt.language_id = '" . (int)$languages_id . "' order by popt.products_options_name");
      while ($products_options_name = tep_db_fetch_array($products_options_name_query)) {
        $products_options_array = array();
        $products_options_query = tep_db_query("select pov.products_options_values_id, pov.products_options_values_name, pa.options_values_price, pa.price_prefix from " . TABLE_PRODUCTS_ATTRIBUTES . " pa, " . TABLE_PRODUCTS_OPTIONS_VALUES . " pov where pa.products_id = '" . (int)$HTTP_GET_VARS['products_id'] . "' and pa.options_id = '" . (int)$products_options_name['products_options_id'] . "' and pa.options_values_id = pov.products_options_values_id and pov.language_id = '" . (int)$languages_id . "'");
        while ($products_options = tep_db_fetch_array($products_options_query)) {
          $products_options_array[] = array('id' => $products_options['products_options_values_id'], 'text' => $products_options['products_options_values_name']);
          if ($products_options['options_values_price'] != '0') {
            $products_options_array[sizeof($products_options_array)-1]['text'] .= ' (' . $products_options['price_prefix'] . $currencies->display_price($products_options['options_values_price'], tep_get_tax_rate($product_info['products_tax_class_id'])) .') ';
          }
        }

        if (isset($cart->contents[$HTTP_GET_VARS['products_id']]['attributes'][$products_options_name['products_options_id']])) {
          $selected_attribute = $cart->contents[$HTTP_GET_VARS['products_id']]['attributes'][$products_options_name['products_options_id']];
        } else {
          $selected_attribute = false;
        }


$page_content .= '<div class="rkForm" style="width: 140px">'.$products_options_name['products_options_name'].'</div>';
$page_content .= '<div class="rkDescRight">' .tep_draw_pull_down_menu('id[' . $products_options_name['products_options_id'] . ']', $products_options_array, $selected_attribute).'</div>';
$page_content .= '<div style="clear:both;height:10px"></div>';


      }

    }

    $reviews_query = tep_db_query("select count(*) as count from " . TABLE_REVIEWS . " where products_id = '" . (int)$HTTP_GET_VARS['products_id'] . "'");
    $reviews = tep_db_fetch_array($reviews_query);
    if ($reviews['count'] > 0) {

	$page_content .= '<br />' .TEXT_CURRENT_REVIEWS . ' ' . $reviews['count'] . '<br />';

    }

    if (tep_not_null($product_info['products_url'])) {


	$page_content .= '<br />'.sprintf(TEXT_MORE_INFORMATION, tep_href_link(FILENAME_REDIRECT, 'action=url&goto=' . urlencode($product_info['products_url']), 'NONSSL', true, false)) . '<br />';
 
    }

    if ($product_info['products_date_available'] > date('Y-m-d H:i:s')) {

	$page_content .= '<br /><small>'.sprintf(TEXT_DATE_AVAILABLE, tep_date_long($product_info['products_date_available'])) . '</small><br />';

    } else {

	$page_content .= '<br />'.'<small>'. sprintf(TEXT_DATE_ADDED, tep_date_long($product_info['products_date_added'])) . '</small><br />';

    }
$page_content .= '<div style="clear:both;height:10px"></div>';


$page_content .= '<div  class="tablediv">';
$page_content .= '<div class="rowdiv">';
$page_content .= '<div  class="celldiv"><input type="button" class="'.cssclass('BUTTON_REVIEWS').'" value="'.IMAGE_BUTTON_REVIEWS.'" onclick="rk_redirect(\''. tep_href_link(FILENAME_PRODUCT_REVIEWS, tep_get_all_get_params()) .'\');" /></div>';
$page_content .= '<div  class="celldiv">'.tep_draw_hidden_field('products_id', $product_info['products_id']) .'<input type="submit" class="'.cssclass('BUTTON_IN_CART').'" value="'.IMAGE_BUTTON_IN_CART.'" /></div>';
$page_content .= '</div>';
$page_content .= '</div>';


$page_content .= '</form>';

$page_content .= '<div style="clear:both;height:10px"></div>';

    if ((USE_CACHE == 'true') && empty($SID)) {
	$page_content .= tep_cache_also_purchased(3600);
    } else {
     include(DIR_WS_MODULES . 'module41.php');
    }
  }

$page_content .= $module;
/*$page_content .= '</form>';*/

//// Tags begin
if (has_tag($HTTP_GET_VARS['products_id'],(int)$languages_id)) {
$page_content .= '<div style="clear:both;height:1px"></div>'."\n";
$page_content .= '<strong>'.'Tags' .'</strong><hr />';
$page_content .= the_tags((int)$HTTP_GET_VARS['products_id'],(int)$languages_id,'',', ','',false,'link');
$page_content .= '<br /><br /><div style="clear:both;height:1px"></div>'."\n";
}
//// Tags end


/// other product images begin
$my_image_dir = rk_get_image_gallery($product_info['products_id']);
if (tep_not_null($my_image_dir)) { 
	$file_extension = array(".jpg", ".gif", ".png",".bmp"); /// add any allowed file format you want here
	$files = array();
	if ($dir = @dir($my_image_dir)) {
	while ($file = $dir->read()) {
        /*if (substr($file, strrpos($file, '.')) == $file_extension) {*/
	if (in_array(strtolower(substr($file, strrpos($file, '.'))), $file_extension)) {
          $files[] = $file;
        } 
	}
	sort($files);
	$dir->close();
	} 
$rows=0;
$n=sizeof($files);
if ($n > 0) {
$page_content .= '<div style="clear:both;height:1px"></div>'."\n";
$page_content .= '<strong>'.'Other Product Images' .'</strong><hr />';
	for ($i=0, $n; $i<$n; $i++) {
	if (file_exists($my_image_dir.'/' . $files[$i])) {
/// begin gallery construct
$rows++;
$page_content .= '<div id="ngg-image-'.$rows.'" class="ngg-gallery-thumbnail-box"  ><div class="ngg-gallery-thumbnail" >';
$page_content .= '<a href="' . tep_href_link($my_image_dir.'/' . $files[$i]) . '" title="'.$product_info['products_name'].'" rel="lightbox[roadtrip]">' . tep_image($my_image_dir.'/' . $files[$i], $product_info['products_name'], '', SMALL_IMAGE_HEIGHT,'class="Thumb"') . '</a>'."\n";
$page_content .= '</div>';
$page_content .= '</div>';
/// end gallery construct
	}
	}
$page_content .= '<div style="clear:both;height:10px"></div>'."\n";
}
}
/// other product images end

if (ALLOW_GUEST_TO_TELL_A_FRIEND =='true') {
///tell_a_friend
$page_content .= '<strong>'.BOX_HEADING_TELL_A_FRIEND .'</strong><hr />';
$page_content .= '<a href="' . tep_href_link(FILENAME_TELL_A_FRIEND, 'products_id='.$HTTP_GET_VARS['products_id'], 'NONSSL', false) . '">' . BOX_TELL_A_FRIEND_TEXT .'</a><br /><br />';
/*$page_content .= '</form>';*/
/// tell_a_friend_eof 
}

/// product_notification begin
$page_content .= '<strong>'.BOX_HEADING_NOTIFICATIONS .'</strong><hr />';

if (tep_session_is_registered('customer_id')) {
      $check_query = tep_db_query("select count(*) as count from " . TABLE_PRODUCTS_NOTIFICATIONS . " where products_id = '" . (int)$HTTP_GET_VARS['products_id'] . "' and customers_id = '" . (int)$customer_id . "'");
      $check = tep_db_fetch_array($check_query);

      $notification_exists = (($check['count'] > 0) ? true : false);
    } else {
      $notification_exists = false;
    }

if ($notification_exists == true) {
$page_content .= '<a href="' . tep_href_link(basename($PHP_SELF), tep_get_all_get_params(array('action')) . 'action=notify_remove', $request_type) . '">' . sprintf(BOX_NOTIFICATIONS_NOTIFY_REMOVE, tep_get_products_name($HTTP_GET_VARS['products_id'])) .'</a><br /><br />';

    } else {
$page_content .= '<a href="' . tep_href_link(basename($PHP_SELF), tep_get_all_get_params(array('action')) . 'action=notify', $request_type) . '">' . sprintf(BOX_NOTIFICATIONS_NOTIFY, tep_get_products_name($HTTP_GET_VARS['products_id'])) .'</a><br /><br />';
    }
$page_content .= '<div style="clear:both;height:1px"></div>'."\n";
/// product_notification end

//// manufacturer_info

    $manufacturer_query = tep_db_query("select m.manufacturers_id, m.manufacturers_name, m.manufacturers_image, mi.manufacturers_url from " . TABLE_MANUFACTURERS . " m left join " . TABLE_MANUFACTURERS_INFO . " mi on (m.manufacturers_id = mi.manufacturers_id and mi.languages_id = '" . (int)$languages_id . "'), " . TABLE_PRODUCTS . " p  where p.products_id = '" . (int)$HTTP_GET_VARS['products_id'] . "' and p.manufacturers_id = m.manufacturers_id");
    if (tep_db_num_rows($manufacturer_query)) {
      $manufacturer = tep_db_fetch_array($manufacturer_query);
	
	$page_content .= '<strong>'.BOX_HEADING_MANUFACTURER_INFO .'</strong><hr />';
        $page_content .= '<div style="clear:both;height:1px"></div>'."\n";

      if (tep_not_null($manufacturer['manufacturers_image'])) 

	$page_content .= '<div class="rkImg">'. tep_image(DIR_WS_IMAGES . 
$manufacturer['manufacturers_image'], $manufacturer['manufacturers_name']) . '</div>';

	$page_content .= '<div class="rkDescRight">'."\n";
	$page_content .= '<strong>'. $manufacturer['manufacturers_name'].'</strong><br />';
      if (tep_not_null($manufacturer['manufacturers_url'])) 

	$page_content .= '&bull; <a href="' . tep_href_link(FILENAME_REDIRECT, 'action=manufacturer&manufacturers_id=' . $manufacturer['manufacturers_id']) . '" target="_blank">' . sprintf(BOX_MANUFACTURER_INFO_HOMEPAGE, $manufacturer['manufacturers_name']) . '</a><br />';
	$page_content .= '&bull; <a href="' . tep_href_link(FILENAME_DEFAULT, 'manufacturers_id=' . $manufacturer['manufacturers_id']) . '">' . BOX_MANUFACTURER_INFO_OTHER_PRODUCTS . '</a><br />';
	$page_content .= '</div>'."\n";



        $page_content .= '<div style="clear:both;height:1px"></div>'."\n";

    }

?>