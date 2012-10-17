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

// check if the 'install' directory exists, and warn of its existence
  if (WARN_INSTALL_EXISTENCE == 'true') {
    if (file_exists(dirname($HTTP_SERVER_VARS['SCRIPT_FILENAME']) . '/install')) {
$page_content .= '<small>'.WARNING_INSTALL_DIRECTORY_EXISTS.'</small><br /><br />';
    }
  }
// check if the configure.php file is writeable
  if (WARN_CONFIG_WRITEABLE == 'true') {
    if ( (file_exists(dirname($HTTP_SERVER_VARS['SCRIPT_FILENAME']) . '/includes/configure.php')) && (is_writeable(dirname($HTTP_SERVER_VARS['SCRIPT_FILENAME']) . '/includes/configure.php')) ) {
$page_content .= '<small>'.WARNING_CONFIG_FILE_WRITEABLE.'</small><br /><br />';
    }
  }
// check if the session folder is writeable
  if (WARN_SESSION_DIRECTORY_NOT_WRITEABLE == 'true') {
    if (STORE_SESSIONS == '') {
      if (!is_dir(tep_session_save_path())) {
$page_content .= '<small>'.WARNING_SESSION_DIRECTORY_NON_EXISTENT.'</small><br /><br />';
      } elseif (!is_writeable(tep_session_save_path())) {
$page_content .= '<small>'.WARNING_SESSION_DIRECTORY_NOT_WRITEABLE.'</small><br /><br />';
      }
    }
  }
// check session.auto_start is disabled
  if ( (function_exists('ini_get')) && (WARN_SESSION_AUTO_START == 'true') ) {
    if (ini_get('session.auto_start') == '1') {
$page_content .= '<small>'.WARNING_SESSION_AUTO_START.'</small><br /><br />';
    }
  }
  if ( (WARN_DOWNLOAD_DIRECTORY_NOT_READABLE == 'true') && (DOWNLOAD_ENABLED == 'true') ) {
    if (!is_dir(DIR_FS_DOWNLOAD)) {
$page_content .= '<small>'.WARNING_DOWNLOAD_DIRECTORY_NON_EXISTENT.'</small><br /><br />';
    }
  }
if (isset($HTTP_GET_VARS['error_message']) && tep_not_null($HTTP_GET_VARS['error_message'])) {
$page_content .= '<small>'.htmlspecialchars(stripslashes(urldecode($HTTP_GET_VARS['error_message']))).'</small><br /><br />';
}
if (isset($HTTP_GET_VARS['info_message']) && tep_not_null($HTTP_GET_VARS['info_message'])) {
$page_content .= '<small>'.htmlspecialchars(stripslashes(urldecode($HTTP_GET_VARS['info_message']))).'</small><br /><br />';
  }
$totalproduct_query = tep_db_query("select count(*) as total from " . TABLE_PRODUCTS);
$totalproduct = tep_db_fetch_array($totalproduct_query);
$page_content .= rk_get_articles($current_category_id, $languages_id,'top');
if ($totalproduct['total'] > 0) {
$page_content .= tep_customer_greeting().'<br /><br />';
}
$page_content .= rk_get_articles($current_category_id, $languages_id,'mid');
if ($totalproduct['total'] > 0) {
include(DIR_WS_MODULES . 'module1bis.php');
/* Use this module if you want to display products name with price */
/*include(DIR_WS_MODULES . 'module1.php');*/ 
$page_content .= $module;
include(DIR_WS_MODULES . 'module2.php');
$page_content .= $module;
}
$page_content .= rk_get_articles($current_category_id, $languages_id,'bot');
?>