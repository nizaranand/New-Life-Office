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
$page_content .= tep_draw_form('password_forgotten', tep_href_link(FILENAME_PASSWORD_FORGOTTEN, 'action=process', 'SSL'), 'post','style= "border: 0px; padding: 5px; text-align:left"');  
if ($messageStack->size('password_forgotten') > 0) {
$page_content .= $messageStack->output('password_forgotten') .'<br />'; 
}

$page_content .= TEXT_MAIN .'<br />'; 

$page_content .= '<div style="clear:both;height:20px"></div>';

$page_content .= '<div class="rkForm" style="width: 140px">'. ENTRY_EMAIL_ADDRESS.'</div>';
$page_content .= '<div class="rkDescRight">' .tep_draw_input_field('email_address').'</div>';
$page_content .= '<div style="clear:both;height:10px"></div>';

$page_content .= '<table border="0" width="100%" cellspacing="1" cellpadding="2">';
$page_content .= '<tr class="infoBoxContents">';
$page_content .= '<td><table border="0" width="100%" cellspacing="0" cellpadding="2">';
$page_content .= '<tr>';
$page_content .= '<td>'. tep_draw_separator('pixel_trans.gif', '10', '1').'</td>';
$page_content .= '<td class="main"><input type="button" class="'.cssclass('BUTTON_BACK').'" value="'.IMAGE_BUTTON_BACK.'" onclick="rk_redirect(\''. tep_href_link(FILENAME_LOGIN, '', 'SSL') . '\');"></td>';
$page_content .= '<td class="main"></td>';
$page_content .= '<td align="right" class="main"><input type="submit" class="'.cssclass('BUTTON_CONTINUE').'" value="'.IMAGE_BUTTON_CONTINUE.'"></td>'; 
$page_content .= '<td width="10">'.tep_draw_separator('pixel_trans.gif', '10', '1').'</td>';
$page_content .= '</tr>';
$page_content .= '</table></td>';
$page_content .= '</tr>';
$page_content .= '</table>';


$page_content .= '<div style="clear:both;height:10px"></div>';

$page_content .= '</form>';
?>