<?php
/*
  $Id: edit_orders.php,v 2.1 2006/03/21 10:42:44 ams Exp $

  osCommerce, Open Source E-Commerce Solutions
  http://www.oscommerce.com

  Copyright (c) 2006 osCommerce
  
  Released under the GNU General Public License
*/

define('HEADING_TITLE', 'Muokkaa tilausta: #%s tilattu %s');
define('ADDING_TITLE', 'Lis&auml;&auml; tuotteita tilaukseen %s');

define('ENTRY_UPDATE_TO_CC', '(P&auml;ivit&auml;  ' . ORDER_EDITOR_CREDIT_CARD . ' n&auml;hd&auml;ksesi luottokorttikent&auml;t.)');
define('TABLE_HEADING_COMMENTS', 'Kommentit');
define('TABLE_HEADING_STATUS', 'Status');
define('TABLE_HEADING_NEW_STATUS', 'Uusi status');
define('TABLE_HEADING_ACTION', 'Toimenpide');
define('TABLE_HEADING_DELETE', 'Poista?');
define('TABLE_HEADING_QUANTITY', 'Kpl');
define('TABLE_HEADING_PRODUCTS_MODEL', 'Malli');
define('TABLE_HEADING_PRODUCTS', 'Tuotteet');
define('TABLE_HEADING_TAX', 'Vero');
define('TABLE_HEADING_TOTAL', 'Yhteens&auml;');
define('TABLE_HEADING_BASE_PRICE', 'Hinta<br>(netto)');
define('TABLE_HEADING_UNIT_PRICE', 'Hinta<br>(netto + opt.)');
define('TABLE_HEADING_UNIT_PRICE_TAXED', 'Hinta<br>(brutto)');
define('TABLE_HEADING_TOTAL_PRICE', 'Yhteens&auml;<br>(netto)');
define('TABLE_HEADING_TOTAL_PRICE_TAXED', 'Yhteens&auml;<br>(brutto)');
define('TABLE_HEADING_OT_TOTALS', 'V&auml;lisummat');
define('TABLE_HEADING_OT_VALUES', 'Arvo:');
define('TABLE_HEADING_SHIPPING_QUOTES', 'Toimituskulut:');
define('TABLE_HEADING_NO_SHIPPING_QUOTES', 'Ei toimituskuluja');

define('TABLE_HEADING_CUSTOMER_NOTIFIED', 'Asiakasta <br>informoitu');
define('TABLE_HEADING_DATE_ADDED', 'Lis&auml;ysp&auml;iv&auml;');

define('ENTRY_CUSTOMER', 'Asiakas');
define('ENTRY_NAME', 'Nimi:');
define('ENTRY_CITY_STATE', 'Postitoimipaikka, L&auml;&auml;ni:');
define('ENTRY_SHIPPING_ADDRESS', 'Toimitusosoite:');
define('ENTRY_BILLING_ADDRESS', 'Laskutusosoite:');
define('ENTRY_PAYMENT_METHOD', 'Maksutapa:');
define('ENTRY_CREDIT_CARD_TYPE', 'Luottokortin tyyppi:');
define('ENTRY_CREDIT_CARD_OWNER', 'Luottokortin omistaja:');
define('ENTRY_CREDIT_CARD_NUMBER', 'Luottokortin numero:');
define('ENTRY_CREDIT_CARD_EXPIRES', 'Luottokortti vanhenee:');
define('ENTRY_SUB_TOTAL', 'Välisumma:');
define('ENTRY_TYPE_BELOW', 'Kirjoita alle');

//the definition of ENTRY_TAX is important when dealing with certain tax components and scenarios
define('ENTRY_TAX', 'ALV');
//do not use a colon (:) in the defintion, ie 'VAT' is ok, but 'VAT:' is not

define('ENTRY_SHIPPING', 'Toimituskulut:');
define('ENTRY_TOTAL', 'Yhteens&auml;:');
define('ENTRY_STATUS', 'Status:');
define('ENTRY_NOTIFY_CUSTOMER', 'Informoi asiakasta:');
define('ENTRY_NOTIFY_COMMENTS', 'L&auml;het&auml; kommentit:');
define('ENTRY_CURRENCY_TYPE', 'Valuutta');
define('ENTRY_CURRENCY_VALUE', 'Valuutan arvo');

define('TEXT_INFO_PAYMENT_METHOD', 'Maksutapa:');
define('TEXT_NO_ORDER_PRODUCTS', 'Tilauksessa ei ole tuotteita');
define('TEXT_ADD_NEW_PRODUCT', 'Lis&auml;&auml; tuotteita');
define('TEXT_PACKAGE_WEIGHT_COUNT', 'Paketin paino: %s  |  Tuotteen m&auml;&auml;r&auml;: %s');

define('TEXT_STEP_1', '<b>Vaihe 1:</b>');
define('TEXT_STEP_2', '<b>Vaihe 2:</b>');
define('TEXT_STEP_3', '<b>Vaihe 3:</b>');
define('TEXT_STEP_4', '<b>Vaihe 4:</b>');
define('TEXT_SELECT_CATEGORY', '- Valitse kategoria -');
define('TEXT_PRODUCT_SEARCH', '<b>- TAI kirjoita hakusana n&auml;hd&auml;ksesi mahdolliset hakutulokset -</b>');
define('TEXT_ALL_CATEGORIES', 'Kaikki kategoriat/Kaikki tuotteet');
define('TEXT_SELECT_PRODUCT', '- Valitse tuote -');
define('TEXT_BUTTON_SELECT_OPTIONS', 'Valitse tuoteoptiot');
define('TEXT_BUTTON_SELECT_CATEGORY', 'Valitse t&auml;m&auml; kategoria');
define('TEXT_BUTTON_SELECT_PRODUCT', 'Valitse t&auml;m&auml; tuote');
define('TEXT_SKIP_NO_OPTIONS', '<em>Ei tuoteoptioita - vaihe ohitetaan...</em>');
define('TEXT_QUANTITY', 'M&auml;&auml;r&auml;');
define('TEXT_BUTTON_ADD_PRODUCT', 'Lis&auml;&auml; tilaukseen');
define('TEXT_CLOSE_POPUP', '<u>Sulje</u> [x]');
define('TEXT_ADD_PRODUCT_INSTRUCTIONS', 'Lis&auml;&auml; tuotteita kunnes olet valmis.<br>Sulje sitten tämä välilehti/ikkuna, palaa alkuperäiseen välilehteen/ikkunaan ja paina päivitä nappulaa.');
// above probably does not exist any more?

define('TEXT_PRODUCT_NOT_FOUND', '<b>Tuotetta ei l&ouml;ytynyt<b>');
define('TEXT_SHIPPING_SAME_AS_BILLING', 'Toimitusosoite sama kuin laskutusosoite');
define('TEXT_BILLING_SAME_AS_CUSTOMER', 'Laskutusosoite sama kuin asiakkaan osoite');

define('IMAGE_ADD_NEW_OT', 'Lis&auml;&auml; uusi oma v&auml;isumma t&auml;m&auml;n j&auml;lkeen');
define('IMAGE_REMOVE_NEW_OT', 'Poista t&auml;m&auml; v&auml;isumma');
define('IMAGE_NEW_ORDER_EMAIL', 'L&auml;het&auml; uusi vahvistuss&auml;hk&ouml;posti');

define('TEXT_NO_ORDER_HISTORY', 'Ei tilaushistoriaa');

define('PLEASE_SELECT', 'Valitse');

define('EMAIL_SEPARATOR', '------------------------------------------------------');
define('EMAIL_TEXT_SUBJECT', 'Tilauksen päivitys - tilausnro %s');
define('EMAIL_TEXT_ORDER_NUMBER', 'Tilausnumero:');
define('EMAIL_TEXT_INVOICE_URL', 'Yksityiskohtainen lasku:');
define('EMAIL_TEXT_DATE_ORDERED', 'Tilauspäivä:');
define('EMAIL_TEXT_STATUS_UPDATE', 'Asiakaspalvelu on käsitellyt juuri tilaustasi.' . "\n\n" . 'Uusi tila: %s' . "\n\n" . 'Ole hyvä vastaa tähän sähköpostiin mikäli Sinulla on kysyttävää.' . "\n");


define('EMAIL_TEXT_STATUS_UPDATE2', 'Jos teillä on kysymyksiä, vastatkaa tähän sähköpostiin.' . "\n\n" . 'Ystävällisin terveisin \n ' . STORE_NAME . "\n");
define('EMAIL_TEXT_COMMENTS_UPDATE', 'Tilaukseesi lisätyt kommentit ovat:' . "\n\n%s\n\n");

define('ERROR_ORDER_DOES_NOT_EXIST', 'Virhe: tilausta %s ei ole.');
define('ERROR_NO_ORDER_SELECTED', 'Et ole valinnut tilausta tai tilauksen ID:t&auml; ei ole asetettu.');
define('SUCCESS_ORDER_UPDATED', 'Onnnistui: tilaus on p&auml;ivitetty onnistuneesti.');
define('SUCCESS_EMAIL_SENT', 'Valmis: tilaus p&auml;ivitettiin ja s&auml;hk&ouml;posti l&auml;hetettiin asiakkaalle.');

//the hints
define('HINT_UPDATE_TO_CC', 'Aseta maksutavaksi ' . ORDER_EDITOR_CREDIT_CARD . ' ja muut kent&auml;t n&auml;ytet&auml;&auml;n automaattisesti. Luottokorttikent&auml;t
ovat piilossa, jos joku muu maksutapa on valittu. Valitse luottokortin maksumoduli hallinnasta.');
define('HINT_UPDATE_CURRENCY', 'Valuutan vaihtaminen p&auml;ivitt&auml;&auml; tilauksen toimitusmaksut ja loppusummat.');
define('HINT_SHIPPING_ADDRESS', 'Jos vaihdat toimitusosoitetta, sinulle tarjotaan mahdollisuus laskea tilauksen toimituskulut ja loppusumma uudelleen.');
define('HINT_TOTALS', 'Voit vapaasti antaa alennusta lis&auml;&auml;m&auml;ll&auml; negatiivisia arvoja. V&auml;lisummien, verojen ja loppusumman arvoja ei voi muuttaa. Jos lis&auml;&auml;t yhteissummamoduleita, laita ensin yhteissummamodulin nimi tai koodi ei tunnista yhteissummamodulia (tyhj&auml;ll&auml; arvolla oleva poistetaan tilauksesta)');
define('HINT_PRESS_UPDATE', 'Klikkaa "P&auml;ivit&auml;" tallentaaksesi kaikki muutokset.');
define('HINT_BASE_PRICE', 'Hinta (netto) on tuotteen nettohinta ilman tuoteoptioita.');
define('HINT_PRICE_EXCL', 'Hinta (netto + opt.) on tuotteen nettohinta tuoteoptioiden kanssa.');
define('HINT_PRICE_INCL', 'Hinta (brutto) on  Hinta (netto + opt.) kerrottuna veroilla');
define('HINT_TOTAL_EXCL', 'Yhteens&auml; (netto) on Hinta (netto + opt.) kerrottuna m&auml;&auml;r&auml;ll&auml;');
define('HINT_TOTAL_INCL', 'Yhteens&auml; (brutto) on Yhteens&auml; (netto) kerrottuna veroilla');
//end hints





//new order confirmation email- this is a separate email from order status update
define('ENTRY_SEND_NEW_ORDER_CONFIRMATION', 'Uusi tilausvahvistus:');
define('EMAIL_TEXT_DATE_MODIFIED', 'Muokkauspvm:');
define('EMAIL_TEXT_PRODUCTS', 'Tuotteet');
define('EMAIL_TEXT_DELIVERY_ADDRESS', 'Toimitusosoite');
define('EMAIL_TEXT_BILLING_ADDRESS', 'Laskutusosoite');
define('EMAIL_TEXT_PAYMENT_METHOD', 'Maksutapa');
// If you want to include extra payment information, enter text below (use <br> for line breaks):
//define('EMAIL_TEXT_PAYMENT_INFO', ''); //why would this be useful???
// If you want to include footer text, enter text below (use <br> for line breaks):
define('EMAIL_TEXT_FOOTER', '');
//end email

//add-on for downloads
define('ENTRY_DOWNLOAD_COUNT', 'Lataa #');
define('ENTRY_DOWNLOAD_FILENAME', 'Tiedoston nimi');
define('ENTRY_DOWNLOAD_MAXDAYS', 'Vanhenee päivässä');
define('ENTRY_DOWNLOAD_MAXCOUNT', 'Latauksia j&auml;ljell&auml;');

//add-on for Ajax
define('AJAX_CONFIRM_PRODUCT_DELETE', 'Haluatko varmasti poistaa t&auml;m&auml;n tuotteen tilauksesta?');
define('AJAX_CONFIRM_COMMENT_DELETE', 'Haluatko varmasti poistaa t&auml;m&auml;n kommentin tilaushistoriasta?');
define('AJAX_MESSAGE_STACK_SUCCESS', 'Onnnistui! \' + %s + \' on p&auml;ivitetty');
define('AJAX_CONFIRM_RELOAD_TOTALS', 'Olet vaihtanut postitusta. Haluatko laskea uudelleen loppusumman ja postikulut?');
define('AJAX_CANNOT_CREATE_XMLHTTP', 'XMLHTTP instanssin luonti ei onnistu');
define('AJAX_SUBMIT_COMMENT', 'Lis&auml;&auml; uusia kommentteja ja/tai status');
define('AJAX_NO_QUOTES', 'Tilaukselle ei ole postimaksuja.');
define('AJAX_SELECTED_NO_SHIPPING', 'Olet valinnut toimitustavan t&auml;lle tilaukselle, mutta sit&auml; ei ole tietokannassa. Haluatko lis&auml;t&auml; t&auml;m&auml;n toimitustavan tilaukselle?');
define('AJAX_RELOAD_TOTALS', 'Uusi toimitustapa on on tallennettu tietokantaan, mutta yhteissummia ei ole laskettu uudelleen. Klikkaa ok laskeaksesi tilauksen loppusumma uudelleen.');
define('AJAX_NEW_ORDER_EMAIL', 'Haluatko varmasti l&auml;hett&auml;&auml; uuden tilausvahvistuksen asiakkaalle s&auml;hk&ouml;postitse?');
define('AJAX_INPUT_NEW_EMAIL_COMMENTS', 'Lis&auml;&auml; mahdolliset kommentit. Voit j&auml;tt&auml;&auml; t&auml;m&auml;n my&ouml;s tyhj&auml;ksi. Muista, ett&auml; "enter"-nappulan painaminen l&auml;hett&auml;&auml; kommentit sit&auml; mukaa kun klikkaat "enter"-nappulaa. Et voi toistaiseksi k&auml;ytt&auml;&auml; rivinvaihtoja.');
define('AJAX_SUCCESS_EMAIL_SENT', 'Onnistui! Uusi tilausvahvistus l&auml;hetettiin %s');
define('AJAX_WORKING', 'P&auml;ivitet&auml;&auml;n, odota....');
?>