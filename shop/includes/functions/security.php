<?php
/*
  osCommerce, Open Source E-Commerce Solutions
  http://www.oscommerce.com

  Copyright (c) 2007 osCommerce

  Released under the GNU General Public License
*/
/*#### includes/functions/security.php ####
###### Security Pro                    ####
###### FWR Media                       ####
###### www.fwrmedia.co.uk              ####
###### 18th Feb 2008                   ####
###### Version 1.0                     ####
##########################################*/
function tep_clean_get__recursive($get_var)
  {
  if (!is_array($get_var))
  return preg_replace("/[^ {}%a-zA-Z0-9_.-]/i", "", $get_var);
  
  // Add the preg_replace to every element.
  return array_map('tep_clean_get__recursive', $get_var);
  }
?>