<?php
  $account_query = tep_db_query("select customers_gender, customers_firstname, customers_lastname, customers_dob, customers_email_address, customers_telephone, customers_fax from " . TABLE_CUSTOMERS . " where customers_id = '" . (int)$customer_id . "'");
  $account = tep_db_fetch_array($account_query);
$page_content = '';
$page_content .= tep_draw_form('account_edit', tep_href_link(FILENAME_ACCOUNT_EDIT, '', 'SSL'), 'post', 'onSubmit="return check_form(account_edit);" style= "border: 0px solid #666699; padding: 5px; text-align:left"') . tep_draw_hidden_field('action', 'process'); 

if ($messageStack->size('account_edit') > 0) {
$page_content .= $messageStack->output('account_edit').'<br />'; 
}
$page_content .= '<strong>'.MY_ACCOUNT_TITLE.'</strong>&nbsp;';
$page_content .= '<small>('.FORM_REQUIRED_INFORMATION .')</small><br />'; 
$page_content .= '<div style="clear:both;height:10px"></div>';

if (ACCOUNT_GENDER == 'true') {
    if (isset($gender)) {
      $male = ($gender == 'm') ? true : false;
    } else {
      $male = ($account['customers_gender'] == 'm') ? true : false;
    }
    $female = !$male;

$page_content .= '<div class="rkForm" style="width: 140px">'. ENTRY_GENDER.'</div>'."\n";
$page_content .= '<div class="rkDescRight">' .tep_draw_radio_field('gender', 'm', $male) . '&nbsp;&nbsp;' . MALE . '&nbsp;&nbsp;' . tep_draw_radio_field('gender', 'f', $female) . '&nbsp;&nbsp;' . FEMALE . '&nbsp;' . (tep_not_null(ENTRY_GENDER_TEXT) ? '<span class="inputRequirement">' . ENTRY_GENDER_TEXT . '</span>': '').'</div>'."\n";
$page_content .= '<div style="clear:both;height:10px"></div>'."\n";
}

$page_content .= '<div class="rkForm" style="width: 140px">'. ENTRY_FIRST_NAME.'</div>'."\n";
$page_content .= '<div class="rkDescRight">' .tep_draw_input_field('firstname', $account['customers_firstname']) . '&nbsp;' . (tep_not_null(ENTRY_FIRST_NAME_TEXT) ? '<span class="inputRequirement">' . ENTRY_FIRST_NAME_TEXT . '</span>': '').'</div>'."\n";
$page_content .= '<div style="clear:both;height:10px"></div>'."\n";


$page_content .= '<div class="rkForm" style="width: 140px">'. ENTRY_LAST_NAME.'</div>'."\n";
$page_content .= '<div class="rkDescRight">' .tep_draw_input_field('lastname', $account['customers_lastname']) . '&nbsp;' . (tep_not_null(ENTRY_LAST_NAME_TEXT) ? '<span class="inputRequirement">' . ENTRY_LAST_NAME_TEXT . '</span>': '').'</div>'."\n";
$page_content .= '<div style="clear:both;height:10px"></div>'."\n";

if (ACCOUNT_DOB == 'true') {
$page_content .= '<div class="rkForm" style="width: 140px">'. ENTRY_DATE_OF_BIRTH.'</div>'."\n";
$page_content .= '<div class="rkDescRight">' .tep_draw_input_field('dob', tep_date_short($account['customers_dob'])) . '&nbsp;' . (tep_not_null(ENTRY_DATE_OF_BIRTH_TEXT) ? '<span class="inputRequirement">' . ENTRY_DATE_OF_BIRTH_TEXT . '</span>': '').'</div>'."\n";
$page_content .= '<div style="clear:both;height:10px"></div>'."\n";
}

$page_content .= '<div class="rkForm" style="width: 140px">'. ENTRY_EMAIL_ADDRESS.'</div>'."\n";
$page_content .= '<div class="rkDescRight">' .tep_draw_input_field('email_address', $account['customers_email_address']) . '&nbsp;' . (tep_not_null(ENTRY_EMAIL_ADDRESS_TEXT) ? '<span class="inputRequirement">' . ENTRY_EMAIL_ADDRESS_TEXT . '</span>': '').'</div>'."\n";
$page_content .= '<div style="clear:both;height:10px"></div>'."\n";


$page_content .= '<div class="rkForm" style="width: 140px">'. ENTRY_TELEPHONE_NUMBER.'</div>'."\n";
$page_content .= '<div class="rkDescRight">' .tep_draw_input_field('telephone', $account['customers_telephone']) . '&nbsp;' . (tep_not_null(ENTRY_TELEPHONE_NUMBER_TEXT) ? '<span class="inputRequirement">' . ENTRY_TELEPHONE_NUMBER_TEXT . '</span>': '').'</div>'."\n";
$page_content .= '<div style="clear:both;height:10px"></div>'."\n";

$page_content .= '<div class="rkForm" style="width: 140px">'. ENTRY_FAX_NUMBER.'</div>'."\n";
$page_content .= '<div class="rkDescRight">' .tep_draw_input_field('fax', $account['customers_fax']) . '&nbsp;' . (tep_not_null(ENTRY_FAX_NUMBER_TEXT) ? '<span class="inputRequirement">' . ENTRY_FAX_NUMBER_TEXT . '</span>': '').'</div>'."\n";
$page_content .= '<div style="clear:both;height:10px"></div>'."\n";

$page_content .= '<div  class="tablediv">';
$page_content .= '<div class="rowdiv">';
$page_content .= '<div  class="celldiv"><input type="button" class="'.cssclass('BUTTON_BACK').'" value="'.IMAGE_BUTTON_BACK.'" onclick="rk_redirect(\''. tep_href_link(FILENAME_ACCOUNT, '', 'SSL') . '\');"></div>';
$page_content .= '<div  class="celldiv"><input type="submit" class="'.cssclass('BUTTON_CONTINUE').'" value="'.IMAGE_BUTTON_CONTINUE.'"></div>';
$page_content .= '</div>';
$page_content .= '</div>';


$page_content .= '<div style="clear:both;height:10px"></div>'."\n";

$page_content .= '</form>';
?>