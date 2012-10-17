<?php
/*
  $Id: edit_orders.php v5.0 08/05/2007 djmonkey1 Exp $

  osCommerce, Open Source E-Commerce Solutions
  http://www.oscommerce.com

  Copyright (c) 2007 osCommerce

  Released under the GNU General Public License

  Translate to Danish By TheExterminator 2007/08/11
*/

define('HEADING_TITLE', 'Edit Order #%s of %s');
define('ADDING_TITLE', 'Tilføj Produkt Til Ordre');

define('ENTRY_UPDATE_TO_CC', '(Update til ' . ORDER_EDITOR_CREDIT_CARD . ' for at se CC felter.)');
define('TABLE_HEADING_COMMENTS', 'Bemærkninger');
define('TABLE_HEADING_STATUS', 'Status');
define('TABLE_HEADING_NEW_STATUS', 'Ny status');
define('TABLE_HEADING_ACTION', 'Action');
define('TABLE_HEADING_DELETE', 'Slette?');
define('TABLE_HEADING_QUANTITY', 'Stk.');
define('TABLE_HEADING_PRODUCTS_MODEL', 'Model');
define('TABLE_HEADING_PRODUCTS', 'Produkter');
define('TABLE_HEADING_TAX', 'Moms');
define('TABLE_HEADING_TOTAL', 'Total');
define('TABLE_HEADING_BASE_PRICE', 'Pris (Base)');
define('TABLE_HEADING_UNIT_PRICE', 'Pris per enhed');
define('TABLE_HEADING_UNIT_PRICE_TAXED', 'Pris (Incl.)');
define('TABLE_HEADING_TOTAL_PRICE', 'Total Pris');
define('TABLE_HEADING_TOTAL_PRICE_TAXED', 'Total (Incl.)');
define('TABLE_HEADING_OT_TOTALS', 'Ordre Total:');
define('TABLE_HEADING_OT_VALUES', 'Værdi:');
define('TABLE_HEADING_SHIPPING_QUOTES', 'Forsendelse Citat:');
define('TABLE_HEADING_NO_SHIPPING_QUOTES', 'Der er ingen forsendelse citat at vise!');

define('TABLE_HEADING_CUSTOMER_NOTIFIED', 'Kunde Er Underrettet');
define('TABLE_HEADING_DATE_ADDED', 'Tilføjet:');

define('ENTRY_CUSTOMER', 'Kunde');
define('ENTRY_NAME', 'Navn');
define('ENTRY_CITY_STATE', 'By / Land:');
define('ENTRY_SHIPPING_ADDRESS', 'Modtager Adresse:');
define('ENTRY_BILLING_ADDRESS', 'Betalings Adresse:');
define('ENTRY_PAYMENT_METHOD', 'Betallings Metode:');
define('ENTRY_CREDIT_CARD_TYPE', 'Kreditkort Type:');
define('ENTRY_CREDIT_CARD_OWNER', 'Kreditkort Ejer:');
define('ENTRY_CREDIT_CARD_NUMBER', 'Kreditkort Nr.:');
define('ENTRY_CREDIT_CARD_EXPIRES', 'Kreditkort Udløbsdato:');
define('ENTRY_SUB_TOTAL', 'Sub-Totalt:');

//the definition of ENTRY_TAX is important when dealing with certain tax components and scenarios
define('ENTRY_TAX', 'Moms');
//do not use a colon (:) in the defintion, ie 'VAT' is ok, but 'VAT:' is not

define('ENTRY_SHIPPING', 'Forsendelse:');
define('ENTRY_TOTAL', 'Total:');
define('ENTRY_STATUS', 'Status:');
define('ENTRY_NOTIFY_CUSTOMER', 'Underret Kunde:');
define('ENTRY_NOTIFY_COMMENTS', 'Tilføj Bemærkning:');
define('ENTRY_CURRENCY_TYPE', 'Valuta');
define('ENTRY_CURRENCY_VALUE', 'Valute Værdi');

define('TEXT_INFO_PAYMENT_METHOD', 'Betalings Metode:');
define('TEXT_NO_ORDER_PRODUCTS', 'Denne ordre indeholder ingen produkter');
define('TEXT_ADD_NEW_PRODUCT', 'Tilføj produkt');
define('TEXT_PACKAGE_WEIGHT_COUNT', 'Pakke Vægt: %s  |  Produkt Stk.: %s');

define('TEXT_STEP_1', '<b>Trin 1:</b>');
define('TEXT_STEP_2', '<b>Trin 2:</b>');
define('TEXT_STEP_3', '<b>Trin 3:</b>');
define('TEXT_STEP_4', '<b>Trin 4:</b>');
define('TEXT_SELECT_CATEGORY', '- Vælg en Katagori fra listen -');
define('TEXT_PRODUCT_SEARCH', '<b>- ELLER søg i boxen neden under, for at se om nogen matcher -</b>');
define('TEXT_ALL_CATEGORIES', 'Alle Katagorier/Alle Produkter');
define('TEXT_SELECT_PRODUCT', '- Vælg et Produkt -');
define('TEXT_BUTTON_SELECT_OPTIONS', 'Vælg En Mulighed');
define('TEXT_BUTTON_SELECT_CATEGORY', 'Vælg En Katagori');
define('TEXT_BUTTON_SELECT_PRODUCT', 'Vælg Et Produkt');
define('TEXT_SKIP_NO_OPTIONS', '<em>Ingen Mulighed - Forsæt...</em>');
define('TEXT_QUANTITY', 'Antal:');
define('TEXT_BUTTON_ADD_PRODUCT', 'Tilføj til Ordre');
define('TEXT_CLOSE_POPUP', '<u>Luk</u> [x]');
define('TEXT_ADD_PRODUCT_INSTRUCTIONS', 'Forsæt med at tilføje produkter til du er færdig.<br>Luk dette vindue, når du er tilbage til Ordren, tryk på "update" knappen.');
define('TEXT_PRODUCT_NOT_FOUND', '<b>Produkt ikke fundet<b>');
define('TEXT_SHIPPING_SAME_AS_BILLING', 'Forsendelse samme som betalings adresse');
define('TEXT_BILLING_SAME_AS_CUSTOMER', 'Forsendelse samme som kundes adresse');

define('IMAGE_ADD_NEW_OT', 'Indsæt ny kunde ordre total efter dette');
define('IMAGE_REMOVE_NEW_OT', 'Fjer denne ordre total del');
define('IMAGE_NEW_ORDER_EMAIL', 'Send ny ordre bekræftelse email');

define('TEXT_NO_ORDER_HISTORY', 'Ingen Baggrund For Denne Ordre');

define('PLEASE_SELECT', 'Vælg Venligst');

define('EMAIL_SEPARATOR', '------------------------------------------------------');
define('EMAIL_TEXT_SUBJECT', 'Din Ordre Er Blevet Opdateret');
define('EMAIL_TEXT_ORDER_NUMBER', 'Ordre ID:');
define('EMAIL_TEXT_INVOICE_URL', 'Faktura:');
define('EMAIL_TEXT_DATE_ORDERED', 'Bestillings Dato:');
define('EMAIL_TEXT_STATUS_UPDATE', 'Din Ordre Er Blevet Opdateret Til Følgene Status' . "\n\n" . 'Ny Status: %s' . "\n\n" . 'Besvar Endelig Denne E-Mail Hvis Du Har Nogen Spørgsmål.' . "\n");
define('EMAIL_TEXT_STATUS_UPDATE2', 'Hvis Du Har Spørgsmål, Så Send Endlig En E-Mail.' . "\n\n" . 'Med Venlig Hilsen ' . STORE_NAME . "\n");
define('EMAIL_TEXT_COMMENTS_UPDATE', 'Der Er Følgene Bemærkning Til Dig:' . "\n\n%s\n\n");

define('ERROR_ORDER_DOES_NOT_EXIST', 'Fejl: Ordre Findes Ikke.');
define('SUCCESS_ORDER_UPDATED', 'Succes: Ordren Er Blevet Opdateret');
define('SUCCESS_EMAIL_SENT', 'Succes: Ordren Er Blevet Opdateret, Og En Email Til Kunden Er Sendt.');

//the hints
define('HINT_UPDATE_TO_CC', 'Sæt betalings metode til ' . ORDER_EDITOR_CREDIT_CARD . ' Og de andre felter vil komme frem automatisk. CC feltet er skjult, hvis ander betalings metoder er valgt, husk at sæt "Ordre Editor I My Store" til True');
define('HINT_UPDATE_CURRENCY', 'Ændring af valute vil bevirke den forsendelse citat og ordre total for beregningen og reloade.');
define('HINT_SHIPPING_ADDRESS', 'Hvis en af forsendelser destination er ændret, kunne dette forandre skatte området. Du vil måske trykke på ajourføringen knappen om på den anden side. Regne moms totaler i dette tilfælde.');
define('HINT_TOTALS', 'Føler fri til at give rabatter med tillæg og synlige værdier. Hvilken som helst felt med en værdi fra om med 0 er slettet når opdateringen er slet (Indsigelse: Forsendelse). Vægt, pris -moms, moms total, og total felt er ikke regigeret. On-The-Fly beregning er estimater, små rounding differencer for mulig opdatering.');
define('HINT_PRESS_UPDATE', 'Vær venlig at klik på "Opdatere" for at gemme forandringer.');
define('HINT_NEW_CONFIRMATION', 'Sæt hak i boxen, og tryk på "Opdater" for at sende en ny order bekræftelse til kundes email. Det er lige meget vil box du checker af i.');
define('HINT_BASE_PRICE', 'Pris (base) er produkt værdi, før produkt antal (ie, en af katalog værdi fra og med en af posterne)');
define('HINT_PRICE_EXCL', 'Pris (ex) er den basis værdi, samt hvilke produkt antal prisen kunne finde');
define('HINT_PRICE_INCL', 'Pris (incl) er prisen (ex) gange afgift');
define('HINT_TOTAL_EXCL', 'Total (ex) er prisen (ex) gange stk.');
define('HINT_TOTAL_INCL', 'Total (incl) er prisen (ex) gange afgift og stk.');
//end hints

//new order confirmation email- this is a separate email from order status update
define('ENTRY_SEND_NEW_ORDER_CONFIRMATION', 'Ny order til kunden:');
define('EMAIL_TEXT_SUBJECT', 'Ordre Proces');
define('EMAIL_TEXT_DATE_MODIFIED', 'Dato Konfigureret:');
define('EMAIL_TEXT_PRODUCTS', 'Produkt');
define('EMAIL_TEXT_DELIVERY_ADDRESS', 'Modtager Adresse');
define('EMAIL_TEXT_BILLING_ADDRESS', 'Betalings Adresse');
define('EMAIL_TEXT_PAYMENT_METHOD', 'Betallings Metode');
// If you want to include extra payment information, enter text below (use <br> for line breaks):
define('EMAIL_TEXT_PAYMENT_INFO', '');
// If you want to include footer text, enter text below (use <br> for line breaks):
define('EMAIL_TEXT_FOOTER', '');
//end email

//add-on for downloads
define('ENTRY_DOWNLOAD_COUNT', 'Download #');
define('ENTRY_DOWNLOAD_FILENAME', 'Filnavn');
define('ENTRY_DOWNLOAD_MAXDAYS', 'Max dage');
define('ENTRY_DOWNLOAD_MAXCOUNT', 'Downloads resterende');

//add-on for Ajax
define('AJAX_CONFIRM_PRODUCT_DELETE', 'Er du sikker på du vil slette dette produkt fra denne ordre?');
define('AJAX_CONFIRM_COMMENT_DELETE', 'er du sikker på du vil slette denne kommentar fra ordre status history?');
define('AJAX_MESSAGE_STACK_SUCCESS', 'Succes! \' + %s + \' er blevet opdateret');
define('AJAX_CONFIRM_RELOAD_TOTALS', 'Du har ændrede nogen forsendelse information. Vil du lige efter beregne ordrens totaler og forsendelse citat?');
define('AJAX_CANNOT_CREATE_XMLHTTP', 'Kan ikke lave XMLHTTP eksempel');
define('AJAX_SUBMIT_COMMENT', 'Lav ny kommentar og/eller status');
define('AJAX_NO_QUOTES', 'Der er ingen forsendelse citat at vise.');
define('AJAX_SELECTED_NO_SHIPPING', 'Du har valgt en forendelse metode for denne ordre der ikke eksitere i databasen.  Vil du tilføje denne forsendelse afgift til denne ordre?');
define('AJAX_RELOAD_TOTALS', 'Den nye forsendelses del er blevet skrevet i databasen, den totaler er endnu ikke blevet re-beregnet.  Klik ok nu for at re-berehne ordrens totaler.  Hvis din forbindelse er langsom virkende, vent venligst så alle delene er loadet inden du klikker ok.');
define('AJAX_NEW_ORDER_EMAIL', 'Er du sikker på du vil sende en ny ordre bekræftelse email for denne ordre?');
define('AJAX_INPUT_NEW_EMAIL_COMMENTS', 'Vær venlig at tilføje hvilken som helst kommentar du kunne have her.  Det er okay at der ikke bliver skrevet noget, hvis du ingen kommentar har.  Vær venlig at huske at trykke på "enter", for at gemme kommentar i boxen.  Det er ikke muligt endnu at lave linje skift.');
define('AJAX_SUCCESS_EMAIL_SENT', 'Succes!  En ny ordre bekræftelse email er sendt til %s');
define('AJAX_WORKING', 'Arbejder, vent venligst....');

?>
