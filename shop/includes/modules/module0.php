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
$page_content .= TEXT_INFORMATION;
$page_content .= '<div style="clear:both;height:20px"></div>'."\n";
$page_content .= '<div  class="tablediv">';
$page_content .= '<div class="rowdiv">';
$page_content .= '<div  class="celldiv"></div>';
$page_content .= '<div  class="celldiv"><input type="button" class="'.cssclass('BUTTON_CONTINUE').'" value="'.IMAGE_BUTTON_CONTINUE.'" onclick="rk_redirect(\''. tep_href_link(FILENAME_DEFAULT) .'\');"></div>';
$page_content .= '</div>';
$page_content .= '</div>';
?>