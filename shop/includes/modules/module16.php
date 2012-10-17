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
$page_content .= '<table border="0" width="100%" cellspacing="3" cellpadding="3">'."\n";
$page_content .= '<tr>'."\n";
$page_content .= '<td width="100%" valign="top">'.tep_draw_form('cart_quantity', tep_href_link(FILENAME_SHOPPING_CART, 'action=update_product')). '<table border="0" width="100%" cellspacing="0" cellpadding="0">'."\n";
$page_content .= '<tr>'."\n";
$page_content .= '<td>'. tep_draw_separator('pixel_trans.gif', '100%', '10').'</td>'."\n";
$page_content .= '</tr>'."\n";

  if ($cart->count_contents() > 0) {

$page_content .= '<tr>'."\n";
$page_content .= '<td>'."\n";

    $info_box_contents = array();
    $info_box_contents[0][] = array('align' => 'center',
                                    'params' => 'class="productListing-heading"',
                                    'text' => TABLE_HEADING_REMOVE);

    $info_box_contents[0][] = array('params' => 'class="productListing-heading"',
                                    'text' => TABLE_HEADING_PRODUCTS);

    $info_box_contents[0][] = array('align' => 'center',
                                    'params' => 'class="productListing-heading"',
                                    'text' => TABLE_HEADING_QUANTITY);

    $info_box_contents[0][] = array('align' => 'right',
                                    'params' => 'class="productListing-heading"',
                                    'text' => TABLE_HEADING_TOTAL);

    $any_out_of_stock = 0;
    $products = $cart->get_products();
    for ($i=0, $n=sizeof($products); $i<$n; $i++) {
// Push all attributes information in an array
      if (isset($products[$i]['attributes']) && is_array($products[$i]['attributes'])) {
        while (list($option, $value) = each($products[$i]['attributes'])) {
          $page_content .= tep_draw_hidden_field('id[' . $products[$i]['id'] . '][' . $option . ']', $value);
          $attributes = tep_db_query("select popt.products_options_name, poval.products_options_values_name, pa.options_values_price, pa.price_prefix
                                      from " . TABLE_PRODUCTS_OPTIONS . " popt, " . TABLE_PRODUCTS_OPTIONS_VALUES . " poval, " . TABLE_PRODUCTS_ATTRIBUTES . " pa
                                      where pa.products_id = '" . (int)$products[$i]['id'] . "'
                                       and pa.options_id = '" . (int)$option . "'
                                       and pa.options_id = popt.products_options_id
                                       and pa.options_values_id = '" . (int)$value . "'
                                       and pa.options_values_id = poval.products_options_values_id
                                       and popt.language_id = '" . (int)$languages_id . "'
                                       and poval.language_id = '" . (int)$languages_id . "'");
          $attributes_values = tep_db_fetch_array($attributes);

          $products[$i][$option]['products_options_name'] = $attributes_values['products_options_name'];
          $products[$i][$option]['options_values_id'] = $value;
          $products[$i][$option]['products_options_values_name'] = $attributes_values['products_options_values_name'];
          $products[$i][$option]['options_values_price'] = $attributes_values['options_values_price'];
          $products[$i][$option]['price_prefix'] = $attributes_values['price_prefix'];
        }
      }
    }

    for ($i=0, $n=sizeof($products); $i<$n; $i++) {
      if (($i/2) == floor($i/2)) {
        $info_box_contents[] = array('params' => 'class="productListing-even"');
      } else {
        $info_box_contents[] = array('params' => 'class="productListing-odd"');
      }

      $cur_row = sizeof($info_box_contents) - 1;

      $info_box_contents[$cur_row][] = array('align' => 'center',
                                             'params' => 'class="productListing-data" valign="top"',
                                             'text' => tep_draw_checkbox_field('cart_delete[]', $products[$i]['id']));

      $products_name = '<table border="0" cellspacing="2" cellpadding="2">' .
                       '  <tr>' .
                       '    <td class="productListing-data" align="center"><a href="' . tep_href_link(FILENAME_PRODUCT_INFO, 'products_id=' . $products[$i]['id']) . '">' . tep_image(DIR_WS_IMAGES . $products[$i]['image'], $products[$i]['name'], SMALL_IMAGE_WIDTH, '') . '</a></td>' .
                       '    <td class="productListing-data" valign="top"><a href="' . tep_href_link(FILENAME_PRODUCT_INFO, 'products_id=' . $products[$i]['id']) . '"><b>' . $products[$i]['name'] . '</b></a>';

      if (STOCK_CHECK == 'true') {
        $stock_check = tep_check_stock($products[$i]['id'], $products[$i]['quantity']);
        if (tep_not_null($stock_check)) {
          $any_out_of_stock = 1;

          $products_name .= $stock_check;
        }
      }

      if (isset($products[$i]['attributes']) && is_array($products[$i]['attributes'])) {
        reset($products[$i]['attributes']);
        while (list($option, $value) = each($products[$i]['attributes'])) {
          $products_name .= '<br><small><i> - ' . $products[$i][$option]['products_options_name'] . ' ' . $products[$i][$option]['products_options_values_name'] . '</i></small>';
        }
      }

      $products_name .= '    </td>' .
                        '  </tr>' .
                        '</table>';

      $info_box_contents[$cur_row][] = array('params' => 'class="productListing-data"',
                                             'text' => $products_name);

      $info_box_contents[$cur_row][] = array('align' => 'center',
                                             'params' => 'class="productListing-data" valign="top"',
                                             'text' => tep_draw_input_field('cart_quantity[]', $products[$i]['quantity'], 'size="4"') . tep_draw_hidden_field('products_id[]', $products[$i]['id']));

      $info_box_contents[$cur_row][] = array('align' => 'right',
                                             'params' => 'class="productListing-data" valign="top"',
                                             'text' => '<b>' . $currencies->display_price($products[$i]['final_price'], tep_get_tax_rate($products[$i]['tax_class_id']), $products[$i]['quantity']) . '</b>');
    }

$page_content .= rktableBox($info_box_contents);

$page_content .= '</td>';
$page_content .= '</tr>';
$page_content .= '<tr>';
$page_content .= '<td>'.tep_draw_separator('pixel_trans.gif', '100%', '10').'</td>';
$page_content .= '</tr>';
$page_content .= '<tr>';
$page_content .= '<td align="right" class="main"><b>'.SUB_TITLE_SUB_TOTAL.' '.$currencies->format($cart->show_total()).'</b></td>';
$page_content .= '</tr>';

    if ($any_out_of_stock == 1) {
      if (STOCK_ALLOW_CHECKOUT == 'true') {

$page_content .= '<tr>';
$page_content .= '<td class="stockWarning" align="center"><br>'. OUT_OF_STOCK_CAN_CHECKOUT.'</td>';
$page_content .= '</tr>';

      } else {

$page_content .= '<tr>';
$page_content .= '<td class="stockWarning" align="center"><br>'.OUT_OF_STOCK_CANT_CHECKOUT.'</td>';
$page_content .= '</tr>';

      }
    }

$page_content .= '<tr>';
$page_content .= '<td>'.tep_draw_separator('pixel_trans.gif', '100%', '10').'</td>';
$page_content .= '</tr>';
$page_content .= '<tr>';
$page_content .= '<td><table border="0" width="100%" cellspacing="1" cellpadding="2" class="infoBox">';
$page_content .= '<tr class="infoBoxContents">';
$page_content .= '<td><table border="0" width="100%" cellspacing="0" cellpadding="2">';
$page_content .= '<tr>';
$page_content .= '<td width="10">'. tep_draw_separator('pixel_trans.gif', '10', '1').'</td>';
$page_content .= '<td class="main"><input type="image" name="myclicker" src="images/update-cart.gif"> </td>';

    $back = sizeof($navigation->path)-2;
    if (isset($navigation->path[$back])) {

$page_content .= '<td class="main"><img src="images/add-components.gif" value="'.IMAGE_BUTTON_CONTINUE_SHOPPING.'" onclick="rk_redirect(\''. tep_href_link('add_components.php') .'\');"></td>';

    }

$page_content .= '<td align="right" class="main"><img src="images/checkout.gif" value="'.IMAGE_BUTTON_CHECKOUT.'" onclick="rk_redirect(\''. tep_href_link(FILENAME_CHECKOUT_SHIPPING, '', 'SSL') .'\');"></td>'; 

$page_content .= '<td width="10">'.tep_draw_separator('pixel_trans.gif', '10', '1').'</td>';
$page_content .= '</tr>';
$page_content .= '</table></td>';
$page_content .= '</tr>';
$page_content .= '</table></td>';
$page_content .= '</tr>';

    $initialize_checkout_methods = $payment_modules->checkout_initialization_method();

    if (!empty($initialize_checkout_methods)) {

$page_content .= '<tr>';
$page_content .= '<td>'. tep_draw_separator('pixel_trans.gif', '100%', '10').'</td>';
$page_content .= '</tr>';
$page_content .= '<tr>';
$page_content .= '<td align="right" class="main" style="padding-right: 50px;">'.TEXT_ALTERNATIVE_CHECKOUT_METHODS.'</td>';
$page_content .= ' </tr>';

      reset($initialize_checkout_methods);
      while (list(, $value) = each($initialize_checkout_methods)) {

$page_content .= '<tr>';
$page_content .= '<td>'. tep_draw_separator('pixel_trans.gif', '100%', '10').'</td>';
$page_content .= '</tr>';
$page_content .= '<tr>';
$page_content .= '<td align="right" class="main">'.$value.'</td>';
$page_content .= '</tr>';

      }
    }

  } else {
        
$page_content .= '<tr>';
$page_content .= '<td align="center" class="main">';
$page_content .= rktableBox(array(array('text' => TEXT_CART_EMPTY)));
$page_content .= '</td>';
$page_content .= '</tr>';
$page_content .= '<tr>';
$page_content .= '<td>'. tep_draw_separator('pixel_trans.gif', '100%', '10').'</td>';
$page_content .= '</tr>';
$page_content .= '<tr>';
$page_content .= '<td><table border="0" width="100%" cellspacing="1" cellpadding="2">';
$page_content .= '<tr>';
$page_content .= '<td><table border="0" width="100%" cellspacing="0" cellpadding="2">';
$page_content .= '<tr>';
$page_content .= '<td width="10">'. tep_draw_separator('pixel_trans.gif', '10', '1').'</td>';
$page_content .= '<td align="right" class="main">'. '<img src="images/add-components.gif" value="'.IMAGE_BUTTON_CONTINUE.'" onclick="rk_redirect(\''. tep_href_link('add_components.php') .'\');"></td>'; 

$page_content .= '<td width="10">'. tep_draw_separator('pixel_trans.gif', '10', '1').'</td>';
$page_content .= '</tr>';
$page_content .= '</table></td>';
$page_content .= '</tr>';
$page_content .= '</table></td>';
$page_content .= '</tr>';

  }

$page_content .= '</table></form></td>';
$page_content .= '</tr>';
$page_content .= '</table>';
?>