<?php

if (!function_exists('version_compare') || version_compare( phpversion(), '5.2.0', '<' ) ){
	
	echo "The autoinstaller script requires PHP 5.2.0";
	
} else {
	
	include "control.php";
	
}	

?>