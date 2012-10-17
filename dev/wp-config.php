<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, WordPress Language, and ABSPATH. You can find more information
 * by visiting {@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'inksp3c1_Rf19V');

/** MySQL database username */
define('DB_USER', 'inksp3c1_38');

/** MySQL database password */
define('DB_PASSWORD', 'D41syduk3');

/** MySQL hostname */
define('DB_HOST', 'db44.pair.com');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         '6gsaas L^CN]Cw%]kI6fHoVv,|AewO#$HvkH|%~VD^Se5.]_#)h29DcM(66P>+kJ');
define('SECURE_AUTH_KEY',  '`+nNYp|oR2-#n#?a0E6u,obWY3-T/Dh=XWw|h.*`X(@~Nj@I+~!7|vh-s|L YsL-');
define('LOGGED_IN_KEY',    '$P8@E&+PZj8|ED?akZf|w0+:|5gm{LtYM-`(]iEEn!dS=LQI=+qj(yJ7+v|WR?yk');
define('NONCE_KEY',        'gusG0aJ|IpDQ55ed{02XE6AOTLv^r+2zA IUY)t;spB]eELj5Wv#>%y)3Gs$ou/(');
define('AUTH_SALT',        'Js`J,2]p/LWHiN`i*>%HB(J7I2_$QY7oG^ktLM>r#3p+&o=x~!F|^*^I3zt4QyjX');
define('SECURE_AUTH_SALT', '(E,1RU<8v%U2}!-lnetNCgT!0Cj6`kA1[3<kS+OqTqIAo[g<[8l~~;,{<[|FQ(`x');
define('LOGGED_IN_SALT',   '0VUy+6 yLC4OU;Wl0T]fA0;>5D>@q(v4T8[lUr$C^nI|-vKP3b$J/zjrRtmuu:=!');
define('NONCE_SALT',       '=?Vo~56z-K^aTm?B*?o-yE#u,4)1=|5f+b}#9:3J$s8x,A$A%h4ty-c+HdoigJrf');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_pm_dev_';

/**
 * WordPress Localized Language, defaults to English.
 *
 * Change this to localize WordPress. A corresponding MO file for the chosen
 * language must be installed to wp-content/languages. For example, install
 * de_DE.mo to wp-content/languages and set WPLANG to 'de_DE' to enable German
 * language support.
 */
define('WPLANG', '');

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
