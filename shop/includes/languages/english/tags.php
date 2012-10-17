<?php
  if (isset($HTTP_GET_VARS['tag_id'])) {
define('NAVBAR_TITLE', $tag_name);
define('HEADING_TITLE', 'Tags &raquo; ' . $tag_name);
} else {
define('NAVBAR_TITLE','Tags');
define('HEADING_TITLE', 'Tags');
}
define('TEXT_BY', 'By');

?>