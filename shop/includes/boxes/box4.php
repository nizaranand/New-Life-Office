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
$box_contents = '';
$ref='<a href="'; 
$pstr='</a>'; 
if ($ddm==1) {$ref=''; $pstr='';}
	if (!in_array("12", $exclude)) 
$box_contents .= $before.$ref.tep_href_link(FILENAME_PRODUCTS_NEW).'">'.BOX_HEADING_WHATS_NEW.$pstr.$after;
	if (!in_array("13", $exclude)) 
$box_contents .= $before.$ref.tep_href_link(FILENAME_REVIEWS).'">'.BOX_HEADING_REVIEWS.$pstr.$after;
	if (!in_array("14", $exclude)) 
$box_contents .= $before.$ref.tep_href_link(FILENAME_SPECIALS).'">'.BOX_HEADING_SPECIALS.$pstr.$after;
	if (!in_array("15", $exclude)) 
$box_contents .= $before.$ref . tep_href_link('best_sellers.php') . '">' . BOX_HEADING_BESTSELLERS . $pstr.$after;
	if (!in_array("16", $exclude)) 
$box_contents .= $before.$ref . tep_href_link(FILENAME_ADVANCED_SEARCH) . '">' . BOX_SEARCH_ADVANCED_SEARCH . $pstr.$after;
?>