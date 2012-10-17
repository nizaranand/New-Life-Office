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
/*
  $Id: contact_us.php 1755 2007-12-21 14:02:36Z hpdl $

  osCommerce, Open Source E-Commerce Solutions
  http://www.oscommerce.com

  Copyright (c) 2007 osCommerce

  Released under the GNU General Public License
*/
?>
<?php
  require('includes/application_top.php');
  require(DIR_WS_INCLUDES . 'wp-osc.php'); 
  require(DIR_WS_LANGUAGES . $language . '/' . FILENAME_CONTACT_US);
  require_once('includes/animation/captcha/b2evo_captcha.config.php');
  require_once('includes/animation/captcha/b2evo_captcha.class.php');
  //Initialize the captcha object with our configuration options
  $captcha =& new b2evo_captcha($CAPTCHA_CONFIG);
  $error = false;
  if (isset($HTTP_GET_VARS['action']) && ($HTTP_GET_VARS['action'] == 'send')) {

    $name = tep_db_prepare_input($HTTP_POST_VARS['name']);
    $email_address = tep_db_prepare_input($HTTP_POST_VARS['email']);
    $enquiry = tep_db_prepare_input($HTTP_POST_VARS['enquiry']);

    if (isset($_POST['image'])) {
		switch($captcha->validate_submit($_POST['image'],$_POST['attempt']))
		{
	
			// form was submitted with incorrect key
				case 0:
				$error = true;
				$messageStack->add('contact', CAPTCHA_ERROR);
				break;
			// form was submitted and has valid key
			case 1:
			if (tep_validate_email($email_address)) {
			tep_mail(STORE_OWNER, STORE_OWNER_EMAIL_ADDRESS, EMAIL_SUBJECT, $enquiry, $name, $email_address);

			tep_redirect(tep_href_link(FILENAME_CONTACT_US, 'action=success'));
			} else {
			$error = true;

			$messageStack->add('contact', ENTRY_EMAIL_ADDRESS_CHECK_ERROR);
			}		
		}
	}
  }
  $breadcrumb->add(NAVBAR_TITLE, tep_href_link(FILENAME_CONTACT_US));
?>
<?php $where=4; ?>
<?php $nbs=1; ?>
<?php $count=0; ?>
<?php get_page(); ?>
<?php require(DIR_WS_INCLUDES . 'application_bottom.php'); ?>