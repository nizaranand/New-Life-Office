<?php
/*
  $Id: edit_orders.php v5.0 08/05/2007 djmonkey1 Exp $

  osCommerce, Open Source E-Commerce Solutions
  http://www.oscommerce.com

  Copyright (c) 2007 osCommerce

  Released under the GNU General Public License
*/

define('HEADING_TITLE', 'Order aanpassen #%s vom %s');
define('ADDING_TITLE', 'Artikel toevoegen aan bestelling #%s');

define('ENTRY_UPDATE_TO_CC', '(Update naar ' . ORDER_EDITOR_CREDIT_CARD . ' om de CC velden te zien.)');
define('TABLE_HEADING_COMMENTS', 'Opmerkingen');
define('TABLE_HEADING_STATUS', 'Status');
define('TABLE_HEADING_NEW_STATUS', 'Nieuwe Status');
define('TABLE_HEADING_ACTION', 'Uitvoeren');
define('TABLE_HEADING_DELETE', 'Verwijderen?');
define('TABLE_HEADING_QUANTITY', 'Hoeveelheid');
define('TABLE_HEADING_PRODUCTS_MODEL', 'Model');
define('TABLE_HEADING_PRODUCTS', 'Artikelen');
define('TABLE_HEADING_TAX', 'Belasting');
define('TABLE_HEADING_TOTAL', 'Totaal');
define('TABLE_HEADING_BASE_PRICE', 'Basis<br>Prijs');
define('TABLE_HEADING_UNIT_PRICE', 'Prijs<br>(excl.)');
define('TABLE_HEADING_UNIT_PRICE_TAXED', 'Prijs<br>(incl)');
define('TABLE_HEADING_TOTAL_PRICE', 'Totaal<br>(excl.)');
define('TABLE_HEADING_TOTAL_PRICE_TAXED', 'Totaal<br>(incl.)');
define('TABLE_HEADING_OT_TOTALS', 'Order Totaal:');
define('TABLE_HEADING_OT_VALUES', 'Waarde:');
define('TABLE_HEADING_SHIPPING_QUOTES', 'Verzendaantallen:');
define('TABLE_HEADING_NO_SHIPPING_QUOTES', 'Er zijn geen verzendaantal om te laten zien!');

define('TABLE_HEADING_CUSTOMER_NOTIFIED', 'Klant<br>berichten');
define('TABLE_HEADING_DATE_ADDED', 'Datum gewijzigd');

define('ENTRY_CUSTOMER', 'Klant');
define('ENTRY_NAME', 'Naam:');
define('ENTRY_CITY_STATE', 'Stad, Land:');
define('ENTRY_SHIPPING_ADDRESS', 'Afleveradres');
define('ENTRY_BILLING_ADDRESS', 'Factuuradres');
define('ENTRY_PAYMENT_METHOD', 'Betaalmethode');
define('ENTRY_CREDIT_CARD_TYPE', 'Creditcard:');
define('ENTRY_CREDIT_CARD_OWNER', 'Kaart eigenaar:');
define('ENTRY_CREDIT_CARD_NUMBER', 'Kaartnummer:');
define('ENTRY_CREDIT_CARD_EXPIRES', 'geldig tot:');
define('ENTRY_SUB_TOTAL', 'Sub totaal:');
define('ENTRY_TYPE_BELOW', 'onder aangegeven');

//the definition of ENTRY_TAX is important when dealing with certain tax components and scenarios
define('ENTRY_TAX', 'Belasting');
//do not use a colon (:) in the defintion, ie 'VAT' is ok, but 'VAT:' is not

define('ENTRY_SHIPPING', 'Verzending:');
define('ENTRY_TOTAL', 'Totaal:');
define('ENTRY_STATUS', 'Status:');
define('ENTRY_NOTIFY_CUSTOMER', 'Klant berichten:');
define('ENTRY_NOTIFY_COMMENTS', 'Opmerking verzenden:');
define('ENTRY_CURRENCY_TYPE', 'W�hrung');
define('ENTRY_CURRENCY_VALUE', 'betaaleenheind');

define('TEXT_INFO_PAYMENT_METHOD', 'Betaalmethode:');
define('TEXT_NO_ORDER_PRODUCTS', 'Deze order bevat geen artikelen');
define('TEXT_ADD_NEW_PRODUCT', 'Artikel toevoegen');
define('TEXT_PACKAGE_WEIGHT_COUNT', 'Gewicht: %s  |  Artikel aantal: %s');

define('TEXT_STEP_1', '<b>Stap 1:</b>');
define('TEXT_STEP_2', '<b>Stap 2:</b>');
define('TEXT_STEP_3', '<b>Stap 3:</b>');
define('TEXT_STEP_4', '<b>Stap 4:</b>');
define('TEXT_SELECT_CATEGORY', '- Kies catagorie uit de lijst -');
define('TEXT_PRODUCT_SEARCH', '<b>- Of geef zoekopdracht in om matches te zien -</b>');
define('TEXT_ALL_CATEGORIES', 'Alle categorien/Alle artikellen');
define('TEXT_SELECT_PRODUCT', '- Kies een artikel -');
define('TEXT_BUTTON_SELECT_OPTIONS', 'Selecteer deze options');
define('TEXT_BUTTON_SELECT_CATEGORY', 'Selecteer deze categorie');
define('TEXT_BUTTON_SELECT_PRODUCT', 'Selecteer deze Artikelen');
define('TEXT_SKIP_NO_OPTIONS', '<em>Geen Opties - Overslaan...</em>');
define('TEXT_QUANTITY', 'Aantal:');
define('TEXT_BUTTON_ADD_PRODUCT', 'Aan order toevoegen');
define('TEXT_CLOSE_POPUP', '<u>Sluiten</u> [x]');
define('TEXT_ADD_PRODUCT_INSTRUCTIONS', 'Artikelen toevoegen tot je klaar bent. <br> Daarna sluit dit venster, ga terug naar hoofdmenu, en klik op de "update" button".');
define('TEXT_PRODUCT_NOT_FOUND', '<b>Artikel niet gevonden<b>');
define('TEXT_SHIPPING_SAME_AS_BILLING', 'Afleveradres is het zelfde als factuuradres');
define('TEXT_BILLING_SAME_AS_CUSTOMER', 'Factuuradres is het zelfde als Klantadres');

define('IMAGE_ADD_NEW_OT', 'Insert nieuwe Klantenorder na deze');
define('IMAGE_REMOVE_NEW_OT', 'Verwijder dit order totaalcomponent');
define('IMAGE_NEW_ORDER_EMAIL', 'Verzend nieuwe order bevestiging per email');

define('TEXT_NO_ORDER_HISTORY', 'Geen Bestelhistorie verkrijgbaar');

define('PLEASE_SELECT', 'Kiezen aub.');

define('EMAIL_SEPARATOR', '------------------------------------------------------');
define('EMAIL_TEXT_SUBJECT', ' U bestelling is aangepast');
define('EMAIL_TEXT_ORDER_NUMBER', 'Bestelnummer:');
define('EMAIL_TEXT_INVOICE_URL', 'Detail overzicht:');
define('EMAIL_TEXT_DATE_ORDERED', 'Besteldatum:');
define('EMAIL_TEXT_STATUS_UPDATE', 'Hartelijk dank voor u bestelling!!' . "\n\n" . 'De Stutus van uw bestelling is aangepast.' . "\n\n" . 'Nieuwe status is: %s' . "\n\n");
define('EMAIL_TEXT_STATUS_UPDATE2', 'Bij vragen beantwoordt u deze e-mail.' . "\n\n" . 'Hartelijk dank en tot snel. <br> m.vr.gr. ' . STORE_NAME . "\n");
define('EMAIL_TEXT_COMMENTS_UPDATE', 'Opmerkingen voor u order' . "\n\n%s\n\n");

define('ERROR_ORDER_DOES_NOT_EXIST', 'Error: Order %s bestaat niet.');
define('ERROR_NO_ORDER_SELECTED', 'U heeft geen order geselecteerd om aan te passen, of de Order-ID bestaat niet.');
define('SUCCESS_ORDER_UPDATED', 'Succes: Uw order is succesvol aangepast.');
define('SUCCESS_EMAIL_SENT', 'Gereed: De order is aangepast en de e-mail met nieuwe informatie is verstuurd.');

//the hints
define('HINT_UPDATE_TO_CC', 'Zet betaal methode op ' . ORDER_EDITOR_CREDIT_CARD . ' en de ordervelden worden automatisch weer gegeven.  CC velden zijn onzichtbaar als een ander betaalmethode is geselecteerd.  De betaalmethode de, indien geselcteerd, wordt weergegeven is aan te passen in de "Order Editor" omgeving.');
define('HINT_UPDATE_CURRENCY', 'Een verandering van de betaaleenheid resulteerd in een herberekening van de order.');
define('HINT_SHIPPING_ADDRESS', 'Na aanpassen van het Leveradres (postcode, stad of land) verschijnt de optie om de order totalen te herberekenen en de verzendkosten te aktualiseren.');
define('HINT_TOTALS', 'U bent vrij om kortingen te geven door het invoeren van negatieve bedragen. Subtotaal, BTW totaal, en Totaal velden zijn niet aanpasbaar. Als een order aan het aanpassen bent middels AJAX zorg er dan voor dat je de titel eerst invoerd anders zal de code de invoer niet herkennen (een onderdeel met een blank veld word verwijderd van de order.');
define('HINT_PRESS_UPDATE', 'Klik aub op "update" om wijzigingen op te slaan.');
define('HINT_BASE_PRICE', 'De basis prijs is de product prijs voor product atributen (m.a.w., de catalogusprjs)');
define('HINT_PRICE_EXCL', 'Prijs (excl) is de basis prijs plus product attributes prijzen die kunnen bestaan');
define('HINT_PRICE_INCL', 'Prijs (incl.) is de prijs (exlc.) plus BTW');
define('HINT_TOTAL_EXCL', 'Totaal (excl.) is de prijs (exlc.) maal aantal');
define('HINT_TOTAL_INCL', 'Totaal (incl.) is de prijs (exlc.) plus BTW maal aantal');
//end hints

//new order confirmation email- this is a separate email from order status update
define('ENTRY_SEND_NEW_ORDER_CONFIRMATION', 'Nieuwe order bevestiging:');
define('EMAIL_TEXT_DATE_MODIFIED', 'Datum aangepast:');
define('EMAIL_TEXT_PRODUCTS', 'Artikelen');
define('EMAIL_TEXT_DELIVERY_ADDRESS', 'Afleveradres');
define('EMAIL_TEXT_BILLING_ADDRESS', 'Factuuradres');
define('EMAIL_TEXT_PAYMENT_METHOD', 'Betaalmethode');
// If you want to include extra payment information, enter text below (use <br> for line breaks):
//define('EMAIL_TEXT_PAYMENT_INFO', ''); //why would this be useful???
// If you want to include footer text, enter text below (use <br> for line breaks):
define('EMAIL_TEXT_FOOTER', '');
//end email

//add-on for downloads
define('ENTRY_DOWNLOAD_COUNT', 'Download #');
define('ENTRY_DOWNLOAD_FILENAME', 'Bestandsnaam');
define('ENTRY_DOWNLOAD_MAXDAYS', 'Geldigheidsdagen');
define('ENTRY_DOWNLOAD_MAXCOUNT', 'Hoevaak gedownload');

//add-on for Ajax
define('AJAX_CONFIRM_PRODUCT_DELETE', 'Weet je zeker dat je dit artikel van de order wil verwijderen?');
define('AJAX_CONFIRM_COMMENT_DELETE', 'Weet je zeker dat je deze opmerking van de orderstatus geschiedenis wil verwijderen?');
define('AJAX_MESSAGE_STACK_SUCCESS', ' \' + %s + \' Reeds aangepast');
define('AJAX_CONFIRM_RELOAD_TOTALS', 'Je hebt de de verzendgegevens veranderd. Wilt u de vezendkosten en aantallen opnieuw berekenen?');
define('AJAX_CANNOT_CREATE_XMLHTTP', 'Kan geen XMLHTTP omgeving herstellen');
define('AJAX_SUBMIT_COMMENT', 'Nieuwe opmerkingen en/of status toepassen');
define('AJAX_NO_QUOTES', 'Geen verzendaantalen om te laten zien.');
define('AJAX_SELECTED_NO_SHIPPING', 'U heeft een verzendmethode geselecteerd. Tot dusver zijn er geen verzendkosten berekent. Wilt u deze verzendkosten toevoegen?');
define('AJAX_RELOAD_TOTALS', 'Het nieuwe verzendadres wordt opgeslagen. Nu moet het totaalbedrag opnieuw berekent worden.  Klik OK om opnieuw te berekenen.  Als u een langzame internet verbingen heeft wacht dan aub eerst tot alle onderdelen zijn geladen en klik daarna pas op "OK".');
define('AJAX_NEW_ORDER_EMAIL', 'wilt u een nieuwe bevestigings email voor deze order verzenden?');
define('AJAX_INPUT_NEW_EMAIL_COMMENTS', 'Opmerking toevoegen.  Je kan dit veld leeg laten indien u geen opmerkingen wil toevoegen.  Let op!!! Als u tijdens het invoeren op ENTER drukt verzend u de order.');
define('AJAX_SUCCESS_EMAIL_SENT', 'Succes! Een nieuwe orderbevestiging is verzonden aan %s');
define('AJAX_WORKING', 'Bezig, een ogeblik geduld aub.....');

?>
