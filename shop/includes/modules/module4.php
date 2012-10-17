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
$page_content .= tep_draw_form('contact', tep_href_link(FILENAME_CONTACT_US, 'action=send'), 'post','style= "border: 0px; padding: 5px; text-align:left"'); 
if ($messageStack->size('contact') > 0) {
	$page_content .= $messageStack->output('contact') . '<br />'; 
  }
if (isset($HTTP_GET_VARS['action']) && ($HTTP_GET_VARS['action'] == 'success')) {
	$page_content .= TEXT_SUCCESS . '<br />'; 
	$page_content .= '<a href="' . tep_href_link(FILENAME_DEFAULT) . '">' . IMAGE_BUTTON_CONTINUE . '</a>' . '<br />'; 
} else {

$page_content .= '<div style="clear:both;height:1px"></div>';

$page_content .= '<div class="rkForm" style="width: 140px">'. ENTRY_NAME.'</div>';
$page_content .= '<div class="rkDescRight">' .tep_draw_input_field('name').'</div>';
$page_content .= '<div style="clear:both;height:10px"></div>';


$page_content .= '<div class="rkForm" style="width: 140px">'.ENTRY_EMAIL.'</div>';
$page_content .= '<div class="rkDescRight">' .tep_draw_input_field('email').'</div>';
$page_content .= '<div style="clear:both;height:10px"></div>';


$page_content .= '<div class="rkForm" style="width: 140px">'.ENTRY_ENQUIRY.'</div>';
$page_content .= '<div class="rkDescRight">' .tep_draw_textarea_field('enquiry', 'soft', 40, 10).'</div>';
$page_content .= '<div style="clear:both;height:10px"></div>';

$imgLoc = $captcha->get_b2evo_captcha();
$page_content .= '<div class="rkForm" style="width: 140px">'.CAPTCHA.'</div>';
$page_content .= '<div class="rkDescRight">' .'<input type="text" name="attempt" value="" />' .'</div>';
$page_content .= '<div style="clear:both;height:1px"></div>';

$page_content .= '<div class="rkForm" style="width: 140px"></div>';
$page_content .= '<div class="rkDescRight">' .'<img src="'.$imgLoc.'" alt="This is a captcha-picture. It is used to prevent mass-access by robots." title="" />'. '<input type="hidden" name="image" value="'.$imgLoc.'" />'.'</div>';
$page_content .= '<div style="clear:both;height:1px"></div>';


$page_content .= '<div class="rkForm" style="width: 140px"></div>';
$page_content .= '<div class="rkDescRight">' .'<input type="submit" class="'.cssclass('BUTTON_CONTINUE').'" value="'.IMAGE_BUTTON_CONTINUE.'" />'.'</div>';
$page_content .= '<div style="clear:both;height:10px"></div>';

$page_content .= '<div style="clear:both;height:1px"></div>'."\n";
}
$page_content .= '</form>';
?>