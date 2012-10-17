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

?>
<?php
$box_contents = '';
$ref='<a href="'; 
$pstr='</a>'; 
if ($ddm==1) {$ref=''; $pstr='';}
$box_contents = '';
	if (!in_array("7", $exclude))  
$box_contents .= $before . $ref . tep_href_link(FILENAME_SHIPPING) . '">' . BOX_INFORMATION_SHIPPING . $pstr.$after;
	if (!in_array("8", $exclude))  
$box_contents .= $before . $ref . tep_href_link(FILENAME_PRIVACY) . '">' .  BOX_INFORMATION_PRIVACY .$pstr.$after;
	if (!in_array("9", $exclude))  
$box_contents .= $before . $ref .  tep_href_link(FILENAME_CONDITIONS) . '">' . BOX_INFORMATION_CONDITIONS . $pstr.$after;
	if (!in_array("10", $exclude))  
$box_contents .= $before . $ref . tep_href_link(FILENAME_CONTACT_US) . '">' . BOX_INFORMATION_CONTACT . $pstr.$after;
	if (!in_array("12", $exclude))  
$box_contents .= $before . $ref . tep_href_link(FILENAME_SITEMAP) . '">' . BOX_SITEMAP . $pstr.$after;
	if (!in_array("13", $exclude))  
$box_contents .= $before . $ref . tep_href_link(FILENAME_TAGS) . '">' . BOX_TAGS . $pstr.$after;

if ($ddm==0) { 
	if (!in_array("11", $exclude)) 
$box_contents .= $before . $counter_now . ' ' . FOOTER_TEXT_REQUESTS_SINCE . ' ' . $counter_startdate_formatted.$after;
}
?>*/