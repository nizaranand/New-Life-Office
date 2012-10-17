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
$module = '';
if (!isset($process)) $process = false;
$module .= '<table border="0" width="100%" cellspacing="0" cellpadding="2">'."\n";
$module .= '<tr>'."\n";
$module .= '<td><table border="0" width="100%" cellspacing="0" cellpadding="2">'."\n";
$module .= '<tr>'."\n";
$module .= '<td class="main"><b>'.NEW_ADDRESS_TITLE.'</b></td>'."\n";
$module .= '<td class="inputRequirement" align="right">'.FORM_REQUIRED_INFORMATION.'</td>'."\n";
$module .= '</tr>'."\n";
$module .= '</table></td>'."\n";
$module .= '</tr>'."\n";
$module .= '<tr>'."\n";
$module .= '<td><table border="0" width="100%" cellspacing="1" cellpadding="2" class="infoBox">'."\n";
$module .= '<tr class="infoBoxContents">'."\n";
$module .= '<td><table border="0" cellspacing="2" cellpadding="2">'."\n";

  if (ACCOUNT_GENDER == 'true') {
    $male = $female = false;
    if (isset($gender)) {
      $male = ($gender == 'm') ? true : false;
      $female = !$male;
    } elseif (isset($entry['entry_gender'])) {
      $male = ($entry['entry_gender'] == 'm') ? true : false;
      $female = !$male;
    }

$module .= '<tr>'."\n";
$module .= '<td class="main">'.ENTRY_GENDER.'</td>'."\n";
$module .= '<td class="main">'.tep_draw_radio_field('gender', 'm', $male) . '&nbsp;&nbsp;' . MALE . '&nbsp;&nbsp;' . tep_draw_radio_field('gender', 'f', $female) . '&nbsp;&nbsp;' . FEMALE . '&nbsp;' . (tep_not_null(ENTRY_GENDER_TEXT) ? '<span class="inputRequirement">' . ENTRY_GENDER_TEXT . '</span>': '').'</td>'."\n";
$module .= '</tr>'."\n";

  }

$module .= '<tr>'."\n";
$module .= '<td class="main">'.ENTRY_FIRST_NAME.'</td>'."\n";
$module .= '<td class="main">'.tep_draw_input_field('firstname', $entry['entry_firstname']) . '&nbsp;' . (tep_not_null(ENTRY_FIRST_NAME_TEXT) ? '<span class="inputRequirement">' . ENTRY_FIRST_NAME_TEXT . '</span>': '').'</td>'."\n";
$module .= '</tr>'."\n";
$module .= '<tr>'."\n";
$module .= '<td class="main">'.ENTRY_LAST_NAME.'</td>'."\n";
$module .= '<td class="main">'.tep_draw_input_field('lastname', $entry['entry_lastname']) . '&nbsp;' . (tep_not_null(ENTRY_LAST_NAME_TEXT) ? '<span class="inputRequirement">' . ENTRY_LAST_NAME_TEXT . '</span>': '').'</td>'."\n";
$module .= '</tr>'."\n";
$module .= '<tr>'."\n";
$module .= '<td colspan="2">'.tep_draw_separator('pixel_trans.gif', '100%', '10').'</td>'."\n";
$module .= '</tr>'."\n";

  if (ACCOUNT_COMPANY == 'true') {

$module .= '<tr>'."\n";
$module .= '<td class="main">'.ENTRY_COMPANY.'</td>'."\n";
$module .= '<td class="main">'.tep_draw_input_field('company', $entry['entry_company']) . '&nbsp;' . (tep_not_null(ENTRY_COMPANY_TEXT) ? '<span class="inputRequirement">' . ENTRY_COMPANY_TEXT . '</span>': '').'</td>'."\n";
$module .= '</tr>'."\n";
$module .= '<tr>'."\n";
$module .= '<td colspan="2">'.tep_draw_separator('pixel_trans.gif', '100%', '10').'</td>'."\n";
$module .= '</tr>'."\n";

  }

$module .= '<tr>'."\n";
$module .= '<td class="main">'.ENTRY_STREET_ADDRESS.'</td>'."\n";
$module .= '<td class="main">'.tep_draw_input_field('street_address', $entry['entry_street_address']) . '&nbsp;' . (tep_not_null(ENTRY_STREET_ADDRESS_TEXT) ? '<span class="inputRequirement">' . ENTRY_STREET_ADDRESS_TEXT . '</span>': '').'</td>'."\n";
$module .= '</tr>'."\n";

  if (ACCOUNT_SUBURB == 'true') {

$module .= '<tr>'."\n";
$module .= '<td class="main">'.ENTRY_SUBURB.'</td>'."\n";
$module .= '<td class="main">'.tep_draw_input_field('suburb', $entry['entry_suburb']) . '&nbsp;' . (tep_not_null(ENTRY_SUBURB_TEXT) ? '<span class="inputRequirement">' . ENTRY_SUBURB_TEXT . '</span>': '').'</td>'."\n";
$module .= '</tr>'."\n";

  }

$module .= '<tr>'."\n";
$module .= '<td class="main">'.ENTRY_POST_CODE.'</td>'."\n";
$module .= '<td class="main">'.tep_draw_input_field('postcode', $entry['entry_postcode']) . '&nbsp;' . (tep_not_null(ENTRY_POST_CODE_TEXT) ? '<span class="inputRequirement">' . ENTRY_POST_CODE_TEXT . '</span>': '').'</td>'."\n";
$module .= '</tr>'."\n";
$module .= '<tr>'."\n";
$module .= '<td class="main">'.ENTRY_CITY.'</td>'."\n";
$module .= ' <td class="main">'.tep_draw_input_field('city', $entry['entry_city']) . '&nbsp;' . (tep_not_null(ENTRY_CITY_TEXT) ? '<span class="inputRequirement">' . ENTRY_CITY_TEXT . '</span>': '').'</td>'."\n";
$module .= '</tr>'."\n";

  if (ACCOUNT_STATE == 'true') {

$module .= '<tr>'."\n";
$module .= '<td class="main">'.ENTRY_STATE.'</td>'."\n";
$module .= '<td class="main">'."\n";

    if ($process == true) {
      if ($entry_state_has_zones == true) {
        $zones_array = array();
        $zones_query = tep_db_query("select zone_name from " . TABLE_ZONES . " where zone_country_id = '" . (int)$country . "' order by zone_name");
        while ($zones_values = tep_db_fetch_array($zones_query)) {
          $zones_array[] = array('id' => $zones_values['zone_name'], 'text' => $zones_values['zone_name']);
        }
        $module .= tep_draw_pull_down_menu('state', $zones_array);
      } else {
        $module .= tep_draw_input_field('state');
      }
    } else {
      $module .= tep_draw_input_field('state', tep_get_zone_name($entry['entry_country_id'], $entry['entry_zone_id'], $entry['entry_state']));
    }

    if (tep_not_null(ENTRY_STATE_TEXT)) $module .= '&nbsp;<span class="inputRequirement">' . ENTRY_STATE_TEXT.'</td>'."\n";
$module .= ' </tr>'."\n";

  }

$module .= '<tr>'."\n";
$module .= '<td class="main">'.ENTRY_COUNTRY.'</td>'."\n";
$module .= '<td class="main">'.tep_get_country_list('country', $entry['entry_country_id']) . '&nbsp;' . (tep_not_null(ENTRY_COUNTRY_TEXT) ? '<span class="inputRequirement">' . ENTRY_COUNTRY_TEXT . '</span>': '').'</td>'."\n";
$module .= '</tr>'."\n";

  if ((isset($HTTP_GET_VARS['edit']) && ($customer_default_address_id != $HTTP_GET_VARS['edit'])) || (isset($HTTP_GET_VARS['edit']) == false) ) {

$module .= '<tr>'."\n";
$module .= '<td colspan="2">'.tep_draw_separator('pixel_trans.gif', '100%', '10').'</td>'."\n";
$module .= '</tr>'."\n";
$module .= '<tr>'."\n";
$module .= '<td colspan="2" class="main">'.tep_draw_checkbox_field('primary', 'on', false, 'id="primary"') . ' ' . SET_AS_PRIMARY.'</td>'."\n";
$module .= '</tr>'."\n";

  }

$module .= '</table></td>'."\n";
$module .= '</tr>'."\n";
$module .= '</table></td>'."\n";
$module .= '</tr>'."\n";
$module .= '</table>'."\n";
?>
