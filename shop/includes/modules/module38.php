<?php
  $product_info_query = tep_db_query("select p.products_id, p.products_model, p.products_image, p.products_price, p.products_tax_class_id, pd.products_name,pd.products_description  from " . TABLE_PRODUCTS . " p, " . TABLE_PRODUCTS_DESCRIPTION . " pd where p.products_id = '" . (int)$HTTP_GET_VARS['products_id'] . "' and p.products_status = '1' and p.products_id = pd.products_id and pd.language_id = '" . (int)$languages_id . "'");
  $product_info = tep_db_fetch_array($product_info_query);


  $customer_query = tep_db_query("select customers_firstname, customers_lastname from " . TABLE_CUSTOMERS . " where customers_id = '" . (int)$customer_id . "'");
  $customer = tep_db_fetch_array($customer_query);

  if ($new_price = tep_get_products_special_price($product_info['products_id'])) {
    $products_price = '<s>' . $currencies->display_price($product_info['products_price'], tep_get_tax_rate($product_info['products_tax_class_id'])) . '</s> <span class="productSpecialPrice">' . $currencies->display_price($new_price, tep_get_tax_rate($product_info['products_tax_class_id'])) . '</span>';
  } else {
    $products_price = $currencies->display_price($product_info['products_price'], tep_get_tax_rate($product_info['products_tax_class_id']));
  }

$products_name = $product_info['products_name'];

$page_content = '';
$page_content .= tep_draw_form('product_reviews_write', tep_href_link(FILENAME_PRODUCT_REVIEWS_WRITE, 'action=process&products_id=' . $HTTP_GET_VARS['products_id']), 'post', 'onSubmit="return checkForm();" style= "border: 0px solid #666699; padding: 5px; text-align:left"'); 

if ($messageStack->size('review') > 0) {
$page_content .= $messageStack->output('review') . '<br />'."\n"; 
}

$page_content .= '<div style="clear:both;height:1px"></div>'."\n";
$page_content .= '<div class="rkImg" style="height:'.(int)(2.5*SMALL_IMAGE_HEIGHT).'px">';
  if (tep_not_null($product_info['products_image'])) {

$page_content .= '<a href="' . tep_href_link(FILENAME_PRODUCT_INFO, 'products_id=' . $product_info['products_id']) . '">' . tep_image(DIR_WS_IMAGES . $product_info['products_image'], $product_info['products_name'], 2*SMALL_IMAGE_WIDTH, 2*SMALL_IMAGE_HEIGHT) . '</a>'."\n";
}

$page_content .= '</div>'."\n";

$page_content .= '<div class="rkDescRight">'."\n";
$page_content .= '<a href="' . tep_href_link(FILENAME_PRODUCT_INFO, 'products_id=' . $product_info['products_id']) . '"><b><u>' . $product_info['products_name'] . '</u></b></a>'."\n";
$page_content .= '<br />'."\n";
$page_content .= '<strong>'.$products_price.'</strong><br />';
if (tep_not_null($product_info['products_model'])) 
$page_content .= $product_info['products_model'] . '<br />'."\n";
$page_content .= '<small>'.short_name($product_info['products_description'],248).'</small><br />&nbsp;<br />'. "\n";

$page_content .= '<div style="text-align: center"><input type="button" class="'.cssclass('BUTTON_IN_CART').'" value="'.IMAGE_BUTTON_IN_CART.'" onclick="rk_redirect(\''. tep_href_link(basename($PHP_SELF), tep_get_all_get_params(array('action')) . 'action=buy_now') .'\');"></div>'. "\n";

$page_content .= '</div>'."\n";

$page_content .= '<div style="clear:both;height:1px"></div>'."\n";
$page_content .= '<hr />'."\n";

$page_content .= '<div class="rkForm" style="width: 140px"><strong>'. SUB_TITLE_FROM.'</strong></div>'."\n";
$page_content .= '<div class="rkDescRight">' .tep_output_string_protected($customer['customers_firstname'] . ' ' . $customer['customers_lastname']).'</div>'."\n";

$page_content .= '<div class="rkForm" style="width: 140px"><strong>'. SUB_TITLE_REVIEW.'</strong></div>'."\n";
$page_content .= '<div class="rkDescRight">' .tep_draw_textarea_field('review', 'soft', 30, 10).'</div>'."\n";
$page_content .= '<br /><small>'.TEXT_NO_HTML.'</small><br />'."\n";
$page_content .= '<div style="clear:both;height:10px"></div>'."\n";

$page_content .= '<div class="rkForm" style="width: 140px"><strong>'. SUB_TITLE_RATING.'</strong></div>'."\n";
$page_content .= '<div class="rkDescRight">' . TEXT_BAD . ' ' . tep_draw_radio_field('rating', '1') . ' ' . tep_draw_radio_field('rating', '2') . ' ' . tep_draw_radio_field('rating', '3') . ' ' . tep_draw_radio_field('rating', '4') . ' ' . tep_draw_radio_field('rating', '5') . ' ' . TEXT_GOOD.'</div>';
$page_content .= '<div style="clear:both;height:10px"></div>'."\n";

$page_content .= '<div  class="tablediv">';
$page_content .= '<div class="rowdiv">';
$page_content .= '<div  class="celldiv"><input type="button" class="'.cssclass('BUTTON_BACK').'" value="'.IMAGE_BUTTON_BACK.'" onclick="rk_redirect(\''. tep_href_link(FILENAME_PRODUCT_REVIEWS, tep_get_all_get_params(array('reviews_id', 'action'))) .'\');"></div>';
$page_content .= '<div  class="celldiv"><input type="submit" class="'.cssclass('BUTTON_CONTINUE').'" value="'.IMAGE_BUTTON_CONTINUE.'"></div>';
$page_content .= '</div>';
$page_content .= '</div>';


$page_content .= '<div style="clear:both;height:10px"></div>'."\n";
$page_content .= '</form>'."\n";
?>