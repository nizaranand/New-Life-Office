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
$page_content .= tep_draw_form('create_account', tep_href_link(FILENAME_CREATE_ACCOUNT, '', 'SSL'), 'post', 'onsubmit="return check_form(create_account);" style= "border: 0px solid #666699; padding: 5px; text-align:left"') . tep_draw_hidden_field('action', 'process'); 

$page_content .= sprintf(TEXT_ORIGIN_LOGIN, tep_href_link(FILENAME_LOGIN, tep_get_all_get_params(), 'SSL')) . '<br />';

if ($messageStack->size('create_account') > 0) {
$page_content .= $messageStack->output('create_account') .'<br />'; 
}

$page_content .= '<div style="text-align:right">'.'<span class="inputRequirement">'.FORM_REQUIRED_INFORMATION .'</span></div>'."\n";
$page_content .= '<div style="clear:both;height:1px"></div>'."\n";

$page_content .= '<strong>'.CATEGORY_PERSONAL.'</strong><hr />'; 
$page_content .= '<div style="clear:both;height:1px"></div>'."\n";

if (ACCOUNT_GENDER == 'true') {

$page_content .= '<div class="rkForm" style="width: 140px">'. ENTRY_GENDER.'</div>'."\n";
$page_content .= '<div class="rkDescRight">' .tep_draw_radio_field('gender', 'm') . '&nbsp;&nbsp;' . MALE . '&nbsp;&nbsp;' . tep_draw_radio_field('gender', 'f') . '&nbsp;&nbsp;' . FEMALE . '&nbsp;' . (tep_not_null(ENTRY_GENDER_TEXT) ? '<span class="inputRequirement">' . ENTRY_GENDER_TEXT . '</span>': '').'</div>'."\n";
$page_content .= '<div style="clear:both;height:1px"></div>'."\n";
}

$page_content .= '<div class="rkForm" style="width: 140px">'. ENTRY_FIRST_NAME.'</div>'."\n";
$page_content .= '<div class="rkDescRight">' .tep_draw_input_field('firstname') . '&nbsp;' . (tep_not_null(ENTRY_FIRST_NAME_TEXT) ? '<span class="inputRequirement">' . ENTRY_FIRST_NAME_TEXT . '</span>': '').'</div>'."\n";
$page_content .= '<div style="clear:both;height:1px"></div>'."\n";



$page_content .= '<div class="rkForm" style="width: 140px">'. ENTRY_LAST_NAME.'</div>'."\n";
$page_content .= '<div class="rkDescRight">' .tep_draw_input_field('lastname') . '&nbsp;' . (tep_not_null(ENTRY_LAST_NAME_TEXT) ? '<span class="inputRequirement">' . ENTRY_LAST_NAME_TEXT . '</span>': '').'</div>'."\n";
$page_content .= '<div style="clear:both;height:1px"></div>'."\n";

if (ACCOUNT_DOB == 'true') {
$page_content .= '<div class="rkForm" style="width: 140px">'. ENTRY_DATE_OF_BIRTH.'</div>'."\n";
$page_content .= '<div class="rkDescRight">' .tep_draw_input_field('dob') . '&nbsp;' . (tep_not_null(ENTRY_DATE_OF_BIRTH_TEXT) ? '<span class="inputRequirement">' . ENTRY_DATE_OF_BIRTH_TEXT . '</span>': '').'</div>'."\n";
$page_content .= '<div style="clear:both;height:1px"></div>'."\n";
}


$page_content .= '<div class="rkForm" style="width: 140px">'. ENTRY_EMAIL_ADDRESS.'</div>'."\n";
$page_content .= '<div class="rkDescRight">' .tep_draw_input_field('email_address') . '&nbsp;' . (tep_not_null(ENTRY_EMAIL_ADDRESS_TEXT) ? '<span class="inputRequirement">' . ENTRY_EMAIL_ADDRESS_TEXT . '</span>': '').'</div>'."\n";
$page_content .= '<div style="clear:both;height:10px"></div>'."\n";


if (ACCOUNT_COMPANY == 'true') {
$page_content .= '<strong>'.CATEGORY_COMPANY.'</strong><hr />';  
$page_content .= '<div style="clear:both;height:1px"></div>'."\n";

$page_content .= '<div class="rkForm" style="width: 140px">'. ENTRY_COMPANY.'</div>'."\n";
$page_content .= '<div class="rkDescRight">' .tep_draw_input_field('company') . '&nbsp;' . (tep_not_null(ENTRY_COMPANY_TEXT) ? '<span class="inputRequirement">' . ENTRY_COMPANY_TEXT . '</span>': '').'</div>'."\n";
$page_content .= '<div style="clear:both;height:10px"></div>'."\n";
}


$page_content .= '<strong>'.CATEGORY_ADDRESS.'</strong><hr />'; 
$page_content .= '<div style="clear:both;height:1px"></div>'."\n";


$page_content .= '<div class="rkForm" style="width: 140px">'. ENTRY_STREET_ADDRESS.'</div>'."\n";
$page_content .= '<div class="rkDescRight">' .tep_draw_input_field('street_address') . '&nbsp;' . (tep_not_null(ENTRY_STREET_ADDRESS_TEXT) ? '<span class="inputRequirement">' . ENTRY_STREET_ADDRESS_TEXT . '</span>': '').'</div>'."\n";
$page_content .= '<div style="clear:both;height:1px"></div>'."\n";

if (ACCOUNT_SUBURB == 'true') {

$page_content .= '<div class="rkForm" style="width: 140px">'. ENTRY_SUBURB.'</div>'."\n";
$page_content .= '<div class="rkDescRight">' .tep_draw_input_field('suburb') . '&nbsp;' . (tep_not_null(ENTRY_SUBURB_TEXT) ? '<span class="inputRequirement">' . ENTRY_SUBURB_TEXT . '</span>': '').'</div>'."\n";
$page_content .= '<div style="clear:both;height:1px"></div>'."\n";

}
$page_content .= '<div class="rkForm" style="width: 140px">'. ENTRY_POST_CODE.'</div>'."\n";
$page_content .= '<div class="rkDescRight">' .tep_draw_input_field('postcode') . '&nbsp;' . (tep_not_null(ENTRY_POST_CODE_TEXT) ? '<span class="inputRequirement">' . ENTRY_POST_CODE_TEXT . '</span>': '').'</div>'."\n";
$page_content .= '<div style="clear:both;height:1px"></div>'."\n";


$page_content .= '<div class="rkForm" style="width: 140px">'. ENTRY_CITY.'</div>'."\n";
$page_content .= '<div class="rkDescRight">' .tep_draw_input_field('city') . '&nbsp;' . (tep_not_null(ENTRY_CITY_TEXT) ? '<span class="inputRequirement">' . ENTRY_CITY_TEXT . '</span>': '').'</div>'."\n";
$page_content .= '<div style="clear:both;height:1px"></div>'."\n";


if (ACCOUNT_STATE == 'true') {

$page_content .= '<div class="rkForm" style="width: 140px">'. ENTRY_STATE.'</div>'."\n";
$page_content .= '<div class="rkDescRight">';

    if ($process == true) {
      if ($entry_state_has_zones == true) {
        $zones_array = array();
        $zones_query = tep_db_query("select zone_name from " . TABLE_ZONES . " where zone_country_id = '" . (int)$country . "' order by zone_name");
        while ($zones_values = tep_db_fetch_array($zones_query)) {
          $zones_array[] = array('id' => $zones_values['zone_name'], 'text' => $zones_values['zone_name']);
        }
        $page_content .= tep_draw_pull_down_menu('state', $zones_array);
      } else {
        $page_content .= tep_draw_input_field('state');
      }
    } else {
      $page_content .= tep_draw_input_field('state');
    }

    if (tep_not_null(ENTRY_STATE_TEXT)) $page_content .= '&nbsp;<span class="inputRequirement">' . ENTRY_STATE_TEXT.'</span>';

$page_content .= '</div>'."\n";
$page_content .= '<div style="clear:both;height:1px"></div>'."\n";
}


$page_content .= '<div class="rkForm" style="width: 140px">'. ENTRY_COUNTRY.'</div>'."\n";
$page_content .= '<div class="rkDescRight">' .tep_get_country_list('country') . '&nbsp;' . (tep_not_null(ENTRY_COUNTRY_TEXT) ? '<span class="inputRequirement">' . ENTRY_COUNTRY_TEXT . '</span>': '').'</div>'."\n";
$page_content .= '<div style="clear:both;height:10px"></div>'."\n";

$page_content .= '<strong>'.CATEGORY_CONTACT.'</strong><hr />';  
$page_content .= '<div style="clear:both;height:1px"></div>'."\n";


$page_content .= '<div class="rkForm" style="width: 140px">'. ENTRY_TELEPHONE_NUMBER.'</div>'."\n";
$page_content .= '<div class="rkDescRight">' .tep_draw_input_field('telephone') . '&nbsp;' . (tep_not_null(ENTRY_TELEPHONE_NUMBER_TEXT) ? '<span class="inputRequirement">' . ENTRY_TELEPHONE_NUMBER_TEXT . '</span>': '').'</div>'."\n";
$page_content .= '<div style="clear:both;height:1px"></div>'."\n";


$page_content .= '<div class="rkForm" style="width: 140px">'. ENTRY_FAX_NUMBER.'</div>'."\n";
$page_content .= '<div class="rkDescRight">' .tep_draw_input_field('fax') . '&nbsp;' . (tep_not_null(ENTRY_FAX_NUMBER_TEXT) ? '<span class="inputRequirement">' . ENTRY_FAX_NUMBER_TEXT . '</span>': '').'</div>'."\n";
$page_content .= '<div style="clear:both;height:10px"></div>'."\n";




$page_content .= '<strong>'.CATEGORY_PASSWORD.'</strong><hr />'; 
$page_content .= '<div style="clear:both;height:1px"></div>'."\n";


$page_content .= '<div class="rkForm" style="width: 140px">'. ENTRY_PASSWORD.'</div>'."\n";
$page_content .= '<div class="rkDescRight">' .tep_draw_password_field('password') . '&nbsp;' . (tep_not_null(ENTRY_PASSWORD_TEXT) ? '<span class="inputRequirement">' . ENTRY_PASSWORD_TEXT . '</span>': '').'</div>'."\n";
$page_content .= '<div style="clear:both;height:1px"></div>'."\n";


$page_content .= '<div class="rkForm" style="width: 140px">'. ENTRY_PASSWORD_CONFIRMATION.'</div>'."\n";
$page_content .= '<div class="rkDescRight">' .tep_draw_password_field('confirmation') . '&nbsp;' . (tep_not_null(ENTRY_PASSWORD_CONFIRMATION_TEXT) ? '<span class="inputRequirement">' . ENTRY_PASSWORD_CONFIRMATION_TEXT . '</span>': '').'</div>'."\n";
$page_content .= '<div style="clear:both;height:1px"></div>'."\n";


$page_content .= '<div style="text-align:right">'.'<input type="image" name="myclicker" src="images/continue.gif" value="'.IMAGE_BUTTON_CONTINUE.'" /></div>'."\n";
$page_content .= '<div style="clear:both;height:1px"></div>'."\n";

$page_content .= '</form>';
?>