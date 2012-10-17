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

define('ENTRY_UPDATE_TO_CC', '(Oppdater til ' . ORDER_EDITOR_CREDIT_CARD . ' for å se CC felt.)');
define('TABLE_HEADING_COMMENTS', 'Kommentarer');
define('TABLE_HEADING_STATUS', 'Status');
define('TABLE_HEADING_NEW_STATUS', 'Ny status');
define('TABLE_HEADING_ACTION', 'Utførelse');
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
define('TABLE_HEADING_SHIPPING_QUOTES', 'Fraktmåter:');
define('TABLE_HEADING_NO_SHIPPING_QUOTES', 'Det er ingen fraktmåter å vise!');

define('TABLE_HEADING_CUSTOMER_NOTIFIED', 'Kunde<br>Varslet');
define('TABLE_HEADING_DATE_ADDED', 'Dato lagt til');

define('ENTRY_CUSTOMER', 'Kunde');
define('ENTRY_NAME', 'Navn:');
define('ENTRY_CITY_STATE', 'By, Kommune:');
define('ENTRY_SHIPPING_ADDRESS', 'Forsendelsesadresse');
define('ENTRY_BILLING_ADDRESS', 'Fakturaadresse');
define('ENTRY_PAYMENT_METHOD', 'Betalingsmåte');
define('ENTRY_CREDIT_CARD_TYPE', 'Korttype:');
define('ENTRY_CREDIT_CARD_OWNER', 'Kort Eier:');
define('ENTRY_CREDIT_CARD_NUMBER', 'Kortnummer:');
define('ENTRY_CREDIT_CARD_EXPIRES', 'Utløpsdato:');
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

define('TEXT_INFO_PAYMENT_METHOD', 'Betalingsmåte:');
define('TEXT_NO_ORDER_PRODUCTS', 'Denne ordren inneholder ingen produkter');
define('TEXT_ADD_NEW_PRODUCT', 'Legg til produkt');
define('TEXT_PACKAGE_WEIGHT_COUNT', 'Pakkevekt: %s  |  Produktantall: %s');

define('TEXT_STEP_1', '<b>Steg 1:</b>');
define('TEXT_STEP_2', '<b>Steg 2:</b>');
define('TEXT_STEP_3', '<b>Steg 3:</b>');
define('TEXT_STEP_4', '<b>Steg 4:</b>');
define('TEXT_SELECT_CATEGORY', '- Velg en Kategori fra listen -');
define('TEXT_PRODUCT_SEARCH', '<b>- ELLER søk i boksen under for å finne eventuelle matcher -</b>');
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
define('EMAIL_TEXT_STATUS_UPDATE', 'Tusentakk for din bestilling hos oss!' . "\n\n" . 'Statusen på din bestilling er oppdatert.' . "\n\n" . 'Ny status: %s' . "\n\n");
define('EMAIL_TEXT_STATUS_UPDATE2', 'Dersom du har spørsmål, vennligst svar på denne epost adressen.' . "\n\n" . 'Med vennlig hilsen fra ' . STORE_NAME . "\n");
define('EMAIL_TEXT_COMMENTS_UPDATE', 'Kommentarene for din bestilling er' . "\n\n%s\n\n");

define('ERROR_ORDER_DOES_NOT_EXIST', 'Feil: Ordre %s eksisterer ikke.');
define('ERROR_NO_ORDER_SELECTED', 'Du har ikke valgt en ordre å endre, eller ordre ID variabelen er ikke satt.');
define('SUCCESS_ORDER_UPDATED', 'Vellykket: Ordren er nå oppdatert.');
define('SUCCESS_EMAIL_SENT', 'Fullført: Ordren ble oppdatert og en epost med den nye informasjonen er nå sendt ut.');

//the hints
define('HINT_UPDATE_TO_CC', 'Sett betalingsmåte til ' . ORDER_EDITOR_CREDIT_CARD . ' og de andre feltene vil automatisk bli synlige. CC felt er skjult dersom annen betalingsmåte er valgt. Navnet på betalingsmåten, som når valgt vil vise CC feltene, er mulige å endre i Ordre Editor området i Konfigurasjonsdelen av Administrasjonspanelet.');
define('HINT_UPDATE_CURRENCY', 'Endring av valuta vil føre til omkalkulering av forsendelsespriser og ordre totalen.');
define('HINT_SHIPPING_ADDRESS', 'Dersom du endrer forsendelsesstatusen, postnummer, eller land vil du få valget om å omkalkulere totalprisene og laste inn fraktmetodene på nytt.');
define('HINT_TOTALS', 'Gi rabatter ved å legge inn negative verdier. Varesum, mva, og totalsum feltene er ikke mulige å endre. Når du legger inn egne verdier i AJAX må du først legge inn tittel, ellers vil ikke koden gjenkjenne inntastingen (merk: et felt med tomt innhold vil bli slettet fra ordren).');
define('HINT_PRESS_UPDATE', 'Vennligst klikk "Oppdater" for å lagre endringene.');
define('HINT_BASE_PRICE', 'Pris (grunn) er produktprisen FØR mva samt produktattributter er lagt til (f.eks, farger, størrelser osv.)');
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
define('EMAIL_TEXT_PAYMENT_METHOD', 'Betalingsmåte');
// If you want to include extra payment information, enter text below (use <br> for line breaks):
//define('EMAIL_TEXT_PAYMENT_INFO', ''); //why would this be useful???
// If you want to include footer text, enter text below (use <br> for line breaks):
define('EMAIL_TEXT_FOOTER', '');
//end email

//add-on for downloads
define('ENTRY_DOWNLOAD_COUNT', 'Nedlasting #');
define('ENTRY_DOWNLOAD_FILENAME', 'Filnavn');
define('ENTRY_DOWNLOAD_MAXDAYS', 'Dager til utløp');
define('ENTRY_DOWNLOAD_MAXCOUNT', 'Gjenstående nedlastinger');

//add-on for Ajax
define('AJAX_CONFIRM_PRODUCT_DELETE', 'Er du sikker på at du ønsker å slette dette produktet fra ordren?');
define('AJAX_CONFIRM_COMMENT_DELETE', 'Er du sikker på at du ønsker å slette denne kommentaren fra ordrens statushistorie?');
define('AJAX_MESSAGE_STACK_SUCCESS', 'Vellykket! \' + %s + \' er oppdatert');
define('AJAX_CONFIRM_RELOAD_TOTALS', 'Du har endret forsendelses informasjon. Ønsker du å omkalkulere totalordren og forsendelsesprisen?');
define('AJAX_CANNOT_CREATE_XMLHTTP', 'Kan ikke opprette XMLHTTP instance');
define('AJAX_SUBMIT_COMMENT', 'Legg inn ny kommentar og/eller status');
define('AJAX_NO_QUOTES', 'Det er ingen fraktmåter å vise.');
define('AJAX_SELECTED_NO_SHIPPING', 'Du har valgt en fraktmåte for denne ordren som ikke finnes i databasen. Ønsker du å legge til denne fraktkostnaden til ordren?');
define('AJAX_RELOAD_TOTALS', 'Den nye fraktmåten er lagt til i databaseen, men totalsummen har ikke blitt omkalkulert. Klikk ok nå for å omkalkulere totalsummen. Dersom internett tilkoblingen din er treg bør du vente til alle komponentene er lastet inn før du trykker ok.');
define('AJAX_NEW_ORDER_EMAIL', 'Er du sikker på at du ønsker å sende en ny ordrebekreftelse for denne ordren?');
define('AJAX_INPUT_NEW_EMAIL_COMMENTS', 'Vennligst skriv inn kommentarer her, dersom du har noen. Der er okei å la dette feltet være tomt dersom du ikke ønsker å legge til en kommentar. Vennligst husk mens du skriver, at dersom du trykker på "enter" tasten, vil meldingen sendes slik den fremstår i det du trykker. Det er for øyeblikket ikke mulig å inkludere linjeskift.');
define('AJAX_SUCCESS_EMAIL_SENT', 'Vellykket! En ny ordrebekreftelses epost ble sendt til %s');
define('AJAX_WORKING', 'Jobber, vennligst vent....');

?>
