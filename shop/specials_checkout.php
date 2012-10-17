<?php
 /*
  $Id: Impulse Item, v0.1  2005/10/22
  (contrib based on osc's specials.php)
  Created by Fredrik Johansson (aka jfj or redrum)
  osCommerce, Open Source E-Commerce Solutions
  http://www.oscommerce.com
  Copyright (c) 2003 osCommerce
  Released under the GNU General Public License
*/
 
  $specials2_query_raw = "select p.products_id, pd.products_name, p.products_price, p.products_tax_class_id, p.products_image, s.specials_new_products_price from " . TABLE_PRODUCTS . " p, " . TABLE_PRODUCTS_DESCRIPTION . " pd, " . TABLE_SPECIALS_CHECKOUT . " s where s.products_id = p.products_id and p.products_id = pd.products_id and pd.language_id = '" . (int)$languages_id . "' and s.status = '1' order by s.specials_date_added DESC";

  $specials2_split = new splitPageResults($specials2_query_raw, MAX_DISPLAY_SPECIAL_PRODUCTS);

  if (($specials2_split->number_of_rows > 0) && ((PREV_NEXT_BAR_LOCATION == '1') || (PREV_NEXT_BAR_LOCATION == '3'))) {
?>
     
<?php
  }
?>
  <tr>
        <td><table border="0" width="100%" cellspacing="0" cellpadding="2">
          <tr> 

		<span class="pageHeading">Special offer</span>
		
		  
<?php
    $row = 0;
    $specials2_query = tep_db_query($specials2_split->sql_query);
    while ($specials2 = tep_db_fetch_array($specials2_query)) {
      $row++;


      echo ' <script language="javascript"><!--
               function popupWindow(url) {
               window.open(url,\'popupWindow\',\'toolbar=no,location=no,directories=no,status=no,menubar=no,scrollbars=no,resizable=yes,copyhistory=no,width=100,height=100,screenX=150,screenY=150,top=150,left=150\')
             }
            //--></script>  
	        
			 <td align="center" width="33%" class="smallText">
	             
				 <script language="javascript"><!--
				document.write(\'<a href="javascript:popupWindow(\\\'' . tep_href_link(FILENAME_POPUP_IMAGE, 'pID=' . $specials2['products_id']) . '\\\')">' . tep_image(DIR_WS_IMAGES . $specials2['products_image'], addslashes($listing['products_name'] .'klicka för större format'), SMALL_IMAGE_WIDTH, SMALL_IMAGE_HEIGHT, 'hspace="5" vspace="5"  class="bild"') . '<br>click to enlarge</a>\');
				//--></script>
				<noscript>
				<a href="' . tep_href_link(DIR_WS_IMAGES . $specials2['products_image']) . '" target="_blank">' . tep_image(DIR_WS_IMAGES . $specials2['products_image'], $specials2['products_name'], SMALL_IMAGE_WIDTH, SMALL_IMAGE_HEIGHT, 'hspace="5" vspace="5" class="bild"') . '<br><img src="includes/languages/svenska/images/buttons/click_to_enlarge.gif" alt="klicka för större bild" width="90" height="18" border="0"></a>
				</noscript>
				 <br>
				 ' . $specials2['products_name'] . '
				 <br>
				 <span class="productSpecialPrice">' . $currencies->display_price($specials2['specials_new_products_price'], tep_get_tax_rate($specials2['products_tax_class_id'])) . '</span>
				 <br>
			      <a href="' . tep_href_link(basename($PHP_SELF), tep_get_all_get_params(array('action')) . 'action=buy_now&products_id=' . $specials2['products_id']) . '">' . tep_image_button('button_buy_now.gif', IMAGE_BUTTON_BUY_NOW) . '</a>
			</td>' . "\n";

      if ((($row / 3) == floor($row / 3))) {
?>
   </tr>
          <tr>
            <td><?php echo tep_draw_separator('pixel_trans.gif', '100%', '10'); ?></td>
          </tr>
          <tr>
<?php
      }
    }
?>
          </tr>
        </table></td>
      </tr>
    
<?php
  if (($specials2_split->number_of_rows > 0) && ((PREV_NEXT_BAR_LOCATION == '2') || (PREV_NEXT_BAR_LOCATION == '3'))) {
?>
      
<?php
  }
?>


