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
$page_content .= '<strong>Pages</strong><hr /><ul>';
$args = array(
'title_li' => '',
'echo' => 0,
'before' => '',
'after' => '',
'link_before' => '<li class="sitemap_page">',
'link_after' => '</li>',
'exclude' => '5,6',
'show_bloghome' => 0,
'show_storehome' => 1);
$page_content .= osc_list_user_pages ($args);
$args = array(
'title_li' => '',
'echo' => 0,
'before' => '',
'after' => '',
'link_before' => '<li class="sitemap_page">',
'link_after' => '</li>',
'exclude' => '11',
'show_bloghome' => 0,
'show_storehome' => 0); 
$page_content .= osc_list_info_pages($args);
$args = array(
'title_li' => '',
'echo' => 0,
'before' => '',
'after' => '',
'link_before' => '<li class="sitemap_page">',
'link_after' => '</li>',
'exclude' => '',
'show_bloghome' => 0,
'show_storehome' => 0); 
$page_content .= osc_list_catalog_pages($args); 
$page_content .= '</ul>';
$page_content .= '<strong>Categories</strong><hr />';
$page_content .= '<ul class="sitemap">'.sitemap().'</ul>';

?>