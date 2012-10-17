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
$page_content .= tep_draw_form('login', tep_href_link(FILENAME_LOGIN, 'action=process', 'SSL'),'post','style= "border: 0px solid #666699; padding: 5px; text-align:left"');  
if ($messageStack->size('login') > 0) {
$page_content .= $messageStack->output('login') . '<br />'; 
}
if ($cart->count_contents() > 0) {
$page_content .= TEXT_VISITORS_CART . '<br /><br />';
}

$page_content .= '<strong>'.HEADING_NEW_CUSTOMER.'</strong><br /><br />'; 
$page_content .= TEXT_NEW_CUSTOMER . '<br /><br />' . TEXT_NEW_CUSTOMER_INTRODUCTION; 

$page_content .= '<div style="text-align:right">'.'<a href="create_account.php"><img src="images/continue.gif" value="'.IMAGE_BUTTON_CONTINUE.'"></a></div>'."\n";
$page_content .= '<div style="clear:both;height:20px"></div>'."\n";

$page_content .= '<strong>'.TEXT_RETURNING_CUSTOMER.'</strong><br /><br />';
$page_content .= '<div style="clear:both;height:1px"></div>';

$page_content .= '<div class="rkForm" style="width: 140px">'. ENTRY_EMAIL_ADDRESS.'</div>';
$page_content .= '<div class="rkDescRight">' .tep_draw_input_field('email_address').'</div>';
$page_content .= '<div style="clear:both;height:1px"></div>';

$page_content .= '<div class="rkForm" style="width: 140px">'. ENTRY_PASSWORD.'</div>';
$page_content .= '<div class="rkDescRight">' .tep_draw_password_field('password').'</div>';
$page_content .= '<div style="clear:both;height:5px"></div>';

$page_content .= '<div class="rkForm" style="width: 140px"></div>';
$page_content .= '<div class="rkDescRight">' .'<a href="' . tep_href_link(FILENAME_PASSWORD_FORGOTTEN, '', 'SSL') . '">' . TEXT_PASSWORD_FORGOTTEN . '</a>'.'</div>';
$page_content .= '<div style="clear:both;height:10px"></div>';

$page_content .= '<div style="text-align:right">'.'<input type="image" name="myclicker" src="images/sign-in.gif" value="'.IMAGE_BUTTON_LOGIN.'" /></div>'."\n";
$page_content .= '<div style="clear:both;height:1px"></div>'."\n";

$page_content .= '</form>';
?>

