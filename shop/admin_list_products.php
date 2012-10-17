<?php
/*


Attitude Simple Manual Order Entry for osCommerce v0.3
by Geoff Ford - Attitude Group Ltd - 28 February 2004
http://www.oscommerce.co.nz/
Contact Details available on website

Copyright (c) 2004 Attitude Group Ltd
Released under the GNU General Public License
*/

  require('includes/application_top.php');
  require('includes/configure_simple_order_entry.php');
  
  if (MANUAL_ORDER_ENTRY_LARGE_CAT) tep_redirect(tep_href_link(FILENAME_ADMIN,'','SSL'));
  
  require(DIR_WS_LANGUAGES . $language . '/' . FILENAME_ADMIN_LIST_PRODUCTS);
  $breadcrumb->add(NAVBAR_TITLE, tep_href_link(FILENAME_ADMIN_LIST_PRODUCTS, '', 'SSL'));

?>
<!doctype html public "-//W3C//DTD HTML 4.01 Transitional//EN">
<html <?php echo HTML_PARAMS; ?>>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=<?php echo CHARSET; ?>">
<base href="<?php echo (($request_type == 'SSL') ? HTTPS_SERVER : HTTP_SERVER) . DIR_WS_CATALOG; ?>">
<title><?php echo TITLE; ?></title>
<link rel="stylesheet" type="text/css" href="stylesheet.css">
</head>
<body marginwidth="0" marginheight="0" topmargin="0" bottommargin="0" leftmargin="0" rightmargin="0">
<!-- header //-->
<?php require(DIR_WS_INCLUDES . 'header.php'); ?>
<!-- header_eof //-->

<!-- body //-->
<table border="0" width="100%" cellspacing="3" cellpadding="3">
  <tr>
    <td width="<?php echo BOX_WIDTH; ?>" valign="top"><table border="0" width="<?php echo BOX_WIDTH; ?>" cellspacing="0" cellpadding="2">
<!-- left_navigation //-->
<?php require(DIR_WS_INCLUDES . 'column_left.php'); ?>
<!-- left_navigation_eof //-->
    </table></td>
<!-- body_text //-->
    <td width="100%" valign="top"><table border="0" width="100%" cellspacing="0" cellpadding="0">
      <tr>
        <td><table border="0" width="100%" cellspacing="0" cellpadding="0">
          <tr>
            <td class="pageHeading"><?php echo HEADING_TITLE; ?></td>
            <td class="pageHeading" align="right"><?php echo tep_image(DIR_WS_IMAGES . 'table_background_browse.gif', HEADING_TITLE_2, HEADING_IMAGE_WIDTH, HEADING_IMAGE_HEIGHT); ?></td>
          </tr>
        </table></td>
      </tr>
      <tr>
        <td><?php echo tep_draw_separator('pixel_trans.gif', '100%', '10'); ?></td>
      </tr>
      <tr>
        <td>
<!-- customer_orders //-->
<?php
    
    unset($info_box_contents);
    
    $customer_orders_string = '<table border="0" width="100%" cellspacing="0" cellpadding="1">' . "\n" .'  <form name="cart_quantity" method="post" action="'.tep_href_link(FILENAME_SHOPPING_CART, 'action=update_product', 'NONSSL').'">';
    $products_query = tep_db_query("select pd.products_id, pd.products_name from " . TABLE_PRODUCTS . " p ," . TABLE_PRODUCTS_DESCRIPTION . " pd where p.products_id = pd.products_id and language_id = '" . $languages_id . "' order by products_name");
    while ($products = tep_db_fetch_array($products_query)) {
      $customer_orders_string .= '  <tr>' . "\n" .
                                 //'    <td class="infoBoxContents"><a href="' . tep_href_link(FILENAME_PRODUCT_INFO, 'products_id=' . $products['products_id']) . '">' . $products['products_name'] . '</a></td>' . "\n" .
                                 '    <td class="infoBoxContents">' . $products['products_name'] . '</td>' . "\n" .
	       		         '    <input type="hidden" name="products_id[]" value="' . $products['products_id'] . '">'.
		       		 '    <td class="infoBoxContents" align="right" valign="top"><input type="text" name="cart_quantity[]" value="' . $products_quantity[$products['products_id']] . '" size="4"></td>' . "\n" .

                                 //'    <td class="infoBoxContents" align="right" valign="top"><a href="' . tep_href_link(basename($PHP_SELF), tep_get_all_get_params(array('action')) . 'action=cust_order&pid=' . $products['products_id'], 'NONSSL') . '">' . tep_image(DIR_WS_ICONS . 'cart.gif', ICON_CART) . '</a></td>' . "\n" .
                                 '  </tr>' . "\n";
    }
    $customer_orders_string .= '<tr><td colspan="2" align="right">'.tep_image_submit('button_in_cart.gif', IMAGE_BUTTON_IN_CART).'</td></form></table>';

    $info_box_contents[] = array('align' => 'left',
                                 'text'  => $customer_orders_string);

    new infoBox($info_box_contents);
?>
<!-- customer_orders_eof //-->
	</td>
      </tr>
      <tr>
        <td><?php echo tep_draw_separator('pixel_trans.gif', '100%', '10'); ?></td>
      </tr>
    </table></td>
<!-- body_text_eof //-->
    <td width="<?php echo BOX_WIDTH; ?>" valign="top"><table border="0" width="<?php echo BOX_WIDTH; ?>" cellspacing="0" cellpadding="2">
<!-- right_navigation //-->
<?php require(DIR_WS_INCLUDES . 'column_right.php'); ?>
<!-- right_navigation_eof //-->
    </table></td>
  </tr>
</table>
<!-- body_eof //-->

<!-- footer //-->
<?php require(DIR_WS_INCLUDES . 'footer.php'); ?>
<!-- footer_eof //-->
</body>
</html>
<?php require(DIR_WS_INCLUDES . 'application_bottom.php'); ?>
