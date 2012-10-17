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
// ** WP.osC settings ** //

// ** Mode: SYMBIOSIS or STANDALONE ? ** //
define('WPOSC_MODE', 'STANDALONE');

// ** if SYMBIOSIS : Your WordPress MySQL settings ? ** //
define('new2life_wpdb', '');    // The name of the database 
define('new2life', '');     // Your MySQL username
define('n3w0ff1c3', ''); // Your MySQL password
define('db140a.pair.com', 'localhost');    // Your MySQL Host
define('WORDPRESS_TABLE_PREFIX', 'wp_'); // Table Prefix

// ** if STANDALONE : Your active Theme ? ** //
define('ACTIVE_THEME', 'default');  

// ** Theme switcher for Web Designers. Usage : ?wptheme=theme-name ** //
// ** Theme switcher: on? off? ? ** //
define('THEME_SWITCHER', 'off');  
?>