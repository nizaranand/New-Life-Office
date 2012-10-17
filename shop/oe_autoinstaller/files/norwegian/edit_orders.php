<?php
/*
  $Id: edit_orders.php v5.0 08/05/2007 djmonkey1 Exp $

  osCommerce, Open Source E-Commerce Solutions
  http://www.oscommerce.com

  Copyright (c) 2007 osCommerce

  Released under the GNU General Public License
*/

define('HEADING_TITLE', 'Endre Ordre #%s fra %s');
define('ADDING_TITLE', 'Legger til produkt(er) til Ordre #%s');

define('ENTRY_UPDATE_TO_CC', '(Oppdater til ' . ORDER_EDITOR_CREDIT_CARD . ' for � se CC felt.)');
define('TABLE_HEADING_COMMENTS', 'Kommentarer');
define('TABLE_HEADING_STATUS', 'Status');
define('TABLE_HEADING_NEW_STATUS', 'Ny status');
define('TABLE_HEADING_ACTION', 'Utf�relse');
define('TABLE_HEADING_DELETE', 'Slett?');
define('TABLE_HEADING_QUANTITY', 'Antall');
define('TABLE_HEADING_PRODUCTS_MODEL', 'Modell');
define('TABLE_HEADING_PRODUCTS', 'Produkter');
define('TABLE_HEADING_TAX', 'MVA');
define('TABLE_HEADING_TOTAL', 'Totalt');
define('TABLE_HEADING_BASE_PRICE', 'Pris<br>(grunn)');
define('TABLE_HEADING_UNIT_PRICE', 'Pris<br>(eks.)');
define('TABLE_HEADING_UNIT_PRICE_TAXED', 'Pris<br>(ink.)');
define('TABLE_HEADING_TOTAL_PRICE', 'Totalt<br>(eks.)');
define('TABLE_HEADING_TOTAL_PRICE_TAXED', 'Totalt<br>(ink.)');
define('TABLE_HEADING_OT_TOTALS', 'Ordre Total Felt:');
define('TABLE_HEADING_OT_VALUES', 'Verdi:');
define('TABLE_HEADING_SHIPPING_QUOTES', 'Fraktm�ter:');
define('TABLE_HEADING_NO_SHIPPING_QUOTES', 'Det er ingen fraktm�ter � vise!');

define('TABLE_HEADING_CUSTOMER_NOTIFIED', 'Kunde<br>Varslet');
define('TABLE_HEADING_DATE_ADDED', 'Dato lagt til');

define('ENTRY_CUSTOMER', 'Kunde');
define('ENTRY_NAME', 'Navn:');
define('ENTRY_CITY_STATE', 'By, Kommune:');
define('ENTRY_SHIPPING_ADDRESS', 'Forsendelsesadresse');
define('ENTRY_BILLING_ADDRESS', 'Fakturaadresse');
define('ENTRY_PAYMENT_METHOD', 'Betalingsm�te');
define('ENTRY_CREDIT_CARD_TYPE', 'Korttype:');
define('ENTRY_CREDIT_CARD_OWNER', 'Kort Eier:');
define('ENTRY_CREDIT_CARD_NUMBER', 'Kortnummer:');
define('ENTRY_CREDIT_CARD_EXPIRES', 'Utl�psdato:');
define('ENTRY_SUB_TOTAL', 'Varesum:');
define('ENTRY_TYPE_BELOW', 'Skriv nedenfor');

//the definition of ENTRY_TAX is important when dealing with certain tax components and scenarios
define('ENTRY_TAX', 'MVA');
//do not use a colon (:) in the defintion, ie 'VAT' is ok, but 'VAT:' is not

define('ENTRY_SHIPPING', 'Forsendelse:');
define('ENTRY_TOTAL', 'Totalt:');
define('ENTRY_STATUS', 'Status:');
define('ENTRY_NOTIFY_CUSTOMER', 'Varsle Kunde:');
define('ENTRY_NOTIFY_COMMENTS', 'Send Kommentar:');
define('ENTRY_CURRENCY_TYPE', 'Valuta');
define('ENTRY_CURRENCY_VALUE', 'Valuta Verdi');

define('TEXT_INFO_PAYMENT_METHOD', 'Betalingsm�te:');
define('TEXT_NO_ORDER_PRODUCTS', 'Denne ordren inneholder ingen produkter');
define('TEXT_ADD_NEW_PRODUCT', 'Legg til produkt');
define('TEXT_PACKAGE_WEIGHT_COUNT', 'Pakkevekt: %s  |  Produktantall: %s');

define('TEXT_STEP_1', '<b>Steg 1:</b>');
define('TEXT_STEP_2', '<b>Steg 2:</b>');
define('TEXT_STEP_3', '<b>Steg 3:</b>');
define('TEXT_STEP_4', '<b>Steg 4:</b>');
define('TEXT_SELECT_CATEGORY', '- Velg en Kategori fra listen -');
define('TEXT_PRODUCT_SEARCH', '<b>- ELLER s�k i boksen under for � finne eventuelle matcher -</b>');
define('TEXT_ALL_CATEGORIES', 'Alle Kategorier/Alle Produkter');
define('TEXT_SELECT_PRODUCT', '- Velg et Produkt -');
define('TEXT_BUTTON_SELECT_OPTIONS', 'Velg Disse Mulighetene');
define('TEXT_BUTTON_SELECT_CATEGORY', 'Velg Denne Kategorien');
define('TEXT_BUTTON_SELECT_PRODUCT', 'Velg Dette Produktet');
define('TEXT_SKIP_NO_OPTIONS', '<em>Ingen Valgmuligheter - Hoppet over...</em>');
define('TEXT_QUANTITY', 'Antall:');
define('TEXT_BUTTON_ADD_PRODUCT', 'Legg til Ordre');
define('TEXT_CLOSE_POPUP', '<u>Lukk</u> [x]');
define('TEXT_ADD_PRODUCT_INSTRUCTIONS', 'Fortsett og legg til produkter inntil du er ferdig.<br>Lukk deretter dette vinduet, returner til hovedvinduet, og trykk "oppdater" knappen.');
define('TEXT_PRODUCT_NOT_FOUND', '<b>Produktet ble ikke funnet<b>');
define('TEXT_SHIPPING_SAME_AS_BILLING', 'Forsendelsesadresse samme som fakturaadresse');
define('TEXT_BILLING_SAME_AS_CUSTOMER', 'Fakturaadresse samme som kundeadresse');

define('IMAGE_ADD_NEW_OT', 'Legg inn nytt ordrefelt etter dette');
define('IMAGE_REMOVE_NEW_OT', 'Fjern dette ordrefeltet');
define('IMAGE_NEW_ORDER_EMAIL', 'Send ny ordrebekreftelses epost');

define('TEXT_NO_ORDER_HISTORY', 'Ingen ordrehistorie tilgjengelig');

define('PLEASE_SELECT', 'Vennligst Velg');

define('EMAIL_SEPARATOR', '------------------------------------------------------');
define('EMAIL_TEXT_SUBJECT', 'Din ordre er oppdatert');
define('EMAIL_TEXT_ORDER_NUMBER', 'Ordrenummer:');
define('EMAIL_TEXT_INVOICE_URL', 'Detaljert Faktura:');
define('EMAIL_TEXT_DATE_ORDERED', 'Bestillingsdato:');
define('EMAIL_TEXT_STATUS_UPDATE', 'Tusentakk for din bestilling hos oss!' . "\n\n" . 'Statusen p� din bestilling er oppdatert.' . "\n\n" . 'Ny status: %s' . "\n\n");
define('EMAIL_TEXT_STATUS_UPDATE2', 'Dersom du har sp�rsm�l, vennligst svar p� denne epost adressen.' . "\n\n" . 'Med vennlig hilsen fra ' . STORE_NAME . "\n");
define('EMAIL_TEXT_COMMENTS_UPDATE', 'Kommentarene for din bestilling er' . "\n\n%s\n\n");

define('ERROR_ORDER_DOES_NOT_EXIST', 'Feil: Ordre %s eksisterer ikke.');
define('ERROR_NO_ORDER_SELECTED', 'Du har ikke valgt en ordre � endre, eller ordre ID variabelen er ikke satt.');
define('SUCCESS_ORDER_UPDATED', 'Vellykket: Ordren er n� oppdatert.');
define('SUCCESS_EMAIL_SENT', 'Fullf�rt: Ordren ble oppdatert og en epost med den nye informasjonen er n� sendt ut.');

//the hints
define('HINT_UPDATE_TO_CC', 'Sett betalingsm�te til ' . ORDER_EDITOR_CREDIT_CARD . ' og de andre feltene vil automatisk bli synlige. CC felt er skjult dersom annen betalingsm�te er valgt. Navnet p� betalingsm�ten, som n�r valgt vil vise CC feltene, er mulige � endre i Ordre Editor omr�det i Konfigurasjonsdelen av Administrasjonspanelet.');
define('HINT_UPDATE_CURRENCY', 'Endring av valuta vil f�re til omkalkulering av forsendelsespriser og ordre totalen.');
define('HINT_SHIPPING_ADDRESS', 'Dersom du endrer forsendelsesstatusen, postnummer, eller land vil du f� valget om � omkalkulere totalprisene og laste inn fraktmetodene p� nytt.');
define('HINT_TOTALS', 'Gi rabatter ved � legge inn negative verdier. Varesum, mva, og totalsum feltene er ikke mulige � endre. N�r du legger inn egne verdier i AJAX m� du f�rst legge inn tittel, ellers vil ikke koden gjenkjenne inntastingen (merk: et felt med tomt innhold vil bli slettet fra ordren).');
define('HINT_PRESS_UPDATE', 'Vennligst klikk "Oppdater" for � lagre endringene.');
define('HINT_BASE_PRICE', 'Pris (grunn) er produktprisen F�R mva samt produktattributter er lagt til (f.eks, farger, st�rrelser osv.)');
define('HINT_PRICE_EXCL', 'Pris (eks) er grunnprisen PLUSS eventuelle produktattributter');
define('HINT_PRICE_INCL', 'Pris (ink) er prisen inkludert MVA');
define('HINT_TOTAL_EXCL', 'Totalt (eks) er totalprisen (* antall) eksklusiv MVA');
define('HINT_TOTAL_INCL', 'Totalt (ink) er totalprisen (* antall) inklusiv MVA');
//end hints

//new order confirmation email- this is a separate email from order status update
define('ENTRY_SEND_NEW_ORDER_CONFIRMATION', 'Ny ordrebekreftelse:');
define('EMAIL_TEXT_DATE_MODIFIED', 'Dato Endret:');
define('EMAIL_TEXT_PRODUCTS', 'Produkter');
define('EMAIL_TEXT_DELIVERY_ADDRESS', 'Leveringsadresse');
define('EMAIL_TEXT_BILLING_ADDRESS', 'Fakturaadresse');
define('EMAIL_TEXT_PAYMENT_METHOD', 'Betalingsm�te');
// If you want to include extra payment information, enter text below (use <br> for line breaks):
//define('EMAIL_TEXT_PAYMENT_INFO', ''); //why would this be useful???
// If you want to include footer text, enter text below (use <br> for line breaks):
define('EMAIL_TEXT_FOOTER', '');
//end email

//add-on for downloads
define('ENTRY_DOWNLOAD_COUNT', 'Nedlasting #');
define('ENTRY_DOWNLOAD_FILENAME', 'Filnavn');
define('ENTRY_DOWNLOAD_MAXDAYS', 'Dager til utl�p');
define('ENTRY_DOWNLOAD_MAXCOUNT', 'Gjenst�ende nedlastinger');

//add-on for Ajax
define('AJAX_CONFIRM_PRODUCT_DELETE', 'Er du sikker p� at du �nsker � slette dette produktet fra ordren?');
define('AJAX_CONFIRM_COMMENT_DELETE', 'Er du sikker p� at du �nsker � slette denne kommentaren fra ordrens statushistorie?');
define('AJAX_MESSAGE_STACK_SUCCESS', 'Vellykket! \' + %s + \' er oppdatert');
define('AJAX_CONFIRM_RELOAD_TOTALS', 'Du har endret forsendelses informasjon. �nsker du � omkalkulere totalordren og forsendelsesprisen?');
define('AJAX_CANNOT_CREATE_XMLHTTP', 'Kan ikke opprette XMLHTTP instance');
define('AJAX_SUBMIT_COMMENT', 'Legg inn ny kommentar og/eller status');
define('AJAX_NO_QUOTES', 'Det er ingen fraktm�ter � vise.');
define('AJAX_SELECTED_NO_SHIPPING', 'Du har valgt en fraktm�te for denne ordren som ikke finnes i databasen. �nsker du � legge til denne fraktkostnaden til ordren?');
define('AJAX_RELOAD_TOTALS', 'Den nye fraktm�ten er lagt til i databaseen, men totalsummen har ikke blitt omkalkulert. Klikk ok n� for � omkalkulere totalsummen. Dersom internett tilkoblingen din er treg b�r du vente til alle komponentene er lastet inn f�r du trykker ok.');
define('AJAX_NEW_ORDER_EMAIL', 'Er du sikker p� at du �nsker � sende en ny ordrebekreftelse for denne ordren?');
define('AJAX_INPUT_NEW_EMAIL_COMMENTS', 'Vennligst skriv inn kommentarer her, dersom du har noen. Der er okei � la dette feltet v�re tomt dersom du ikke �nsker � legge til en kommentar. Vennligst husk mens du skriver, at dersom du trykker p� "enter" tasten, vil meldingen sendes slik den fremst�r i det du trykker. Det er for �yeblikket ikke mulig � inkludere linjeskift.');
define('AJAX_SUCCESS_EMAIL_SENT', 'Vellykket! En ny ordrebekreftelses epost ble sendt til %s');
define('AJAX_WORKING', 'Jobber, vennligst vent....');

?>
