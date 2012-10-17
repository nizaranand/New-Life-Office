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
  require(DIR_WS_LANGUAGES . $language . '/' . FILENAME_ADMIN);
  $breadcrumb->add(NAVBAR_TITLE, tep_href_link(FILENAME_ADMIN, '', 'SSL'));

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
        <td class="main">
		<? 

		    $info_box_contents = array();
		    $info_box_contents[] = array('text' => TEXT_ADMIN_CREATE_ACCOUNT);

		    new infoBoxHeading($info_box_contents, true, false);
		    unset($info_box_contents);
		    $info_box_contents[] = array('align' => 'center',
						 'text'  => '<a href="'.tep_href_link(FILENAME_ADMIN_CREATE_ACCOUNT,'','SSL').'">'.TEXT_ADMIN_CREATE_ACCOUNT.'</a>');

		    new infoBox($info_box_contents);

		?>

		<br>

		<? 

		    $info_box_contents = array();
		    $info_box_contents[] = array('text' => TEXT_ADMIN_SEARCH_ACCOUNT);

		    new infoBoxHeading($info_box_contents, true, false);

		    unset($info_box_contents);

		    $info_box_contents[] = array('align' => 'center',
						 'text'  => tep_draw_form('search_customers', tep_href_link(FILENAME_ADMIN,'','SSL'), 'get').TEXT_ADMIN_SEARCH_EMAIL.'<br>'.tep_draw_input_field('search_email').'<br>'.TEXT_ADMIN_SEARCH_LASTNAME.'<br>'.tep_draw_input_field('search_lastname').'<br>'.TEXT_ADMIN_SEARCH_PHONE.'<br>'.tep_draw_input_field('search_phone'));
		    $info_box_contents[] = array('align' => 'center',
						 'text'  => tep_image_submit('button_search.gif', IMAGE_BUTTON_SEARCH).tep_hide_session_id().'</form>');

		    if ($HTTP_GET_VARS['search_email']) {
		    	$search_email = tep_db_prepare_input($HTTP_GET_VARS['search_email']);
		    	$where_clause = "customers_email_address RLIKE '".tep_db_input($search_email)."'";
		    }

		    if ($HTTP_GET_VARS['search_phone']) {
		    	$search_phone = tep_db_prepare_input($HTTP_GET_VARS['search_phone']);
		    	$where_clause .= ($where_clause ? ' or ' : '')."customers_telephone RLIKE '".tep_db_input($search_phone)."'";
		    }

		    if ($HTTP_GET_VARS['search_lastname']) {
		    	$search_lastname = tep_db_prepare_input($HTTP_GET_VARS['search_lastname']);
		    	$where_clause .= ($where_clause ? ' or ' : '')." customers_lastname RLIKE '".tep_db_input($search_lastname)."'";
		    }

		    
		    if ($where_clause) {
		    
		    	$search_sql = "select * from ".TABLE_CUSTOMERS." where ".$where_clause;
		    	$search_query = tep_db_query($search_sql);
		    	
		    	if (tep_db_num_rows($search_query)) {
		    		
			    $info_box_contents[] = array('align' => 'center',
							 'text'  => TEXT_ADMIN_MATCHES);
		    	    
		    		
			    $search_display = '<table border="1" width="100%" cellspacing="0" cellpadding="2">';
			    $search_display .= '<tr><td class="tableHeading">'.TEXT_ADMIN_SEARCH_EMAIL.'</td><td class="tableHeading">'.TEXT_ADMIN_SEARCH_NAME.'</td><td class="tableHeading">'.TEXT_ADMIN_SEARCH_PHONE.'</td></tr>';	
			    while ($search_result = tep_db_fetch_array($search_query)) {
			    	$search_display .= '<tr><td class="smallText"><a href="'.tep_href_link(FILENAME_ADMIN_LOGIN,'email_address='.$search_result['customers_email_address'],'SSL').'">'.$search_result['customers_email_address'].'</a></td><td class="smallText">'.$search_result['customers_firstname'].' '.$search_result['customers_lastname'].'</td><td class="smallText">'.$search_result['customers_telephone'].'</td></tr>';	
			    }
			    $search_display .= '</table>';
				
			    $info_box_contents[] = array('align' => 'left',
							 'text'  => $search_display);
				
			} else {
				    $info_box_contents[] = array('align' => 'center',
								 'text'  => TEXT_ADMIN_NO_MATCHES);
			}
		    }

		    new infoBox($info_box_contents);

		 ?>

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
