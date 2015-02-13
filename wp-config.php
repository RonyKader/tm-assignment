<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, and ABSPATH. You can find more information by visiting
 * {@link http://codex.wordpress.org/Editing_wp-config.php Editing wp-config.php}
 * Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'tm_assignment');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'root');

/** MySQL hostname */
define('DB_HOST', 'localhost');

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
define('AUTH_KEY',         'V$3cPZN|!*n+1qY+=!E07j0^sI.JJ&CCD!]W0Va(rCIwR=ZJydF--)Mni/t|XUoZ');
define('SECURE_AUTH_KEY',  'i_pW|Z5+m#t3Vgv(.I(Dzu>):6lym5wx 3pI3sX]*H X_{Bo`|]{iC]8v-q:WFvk');
define('LOGGED_IN_KEY',    '4QpcLDFVgG]dO(Q3R]YH=4,FP[UL}dzS(Q[-v6|-}$IFMP_)b2--s!^?2b1]Oq?S');
define('NONCE_KEY',        '~{KrLW59)Z`#@S/.wz$-o+wj]m }`$TVx:7gU5Sc gnl8>pU7L>:RIB1:ivNwz3f');
define('AUTH_SALT',        '9TvlA;ED_KKw]b&pszg)ReW=bBUnJaC7pNW:+;EOdK:i_FAiY6|xT4F-Wo<mK@Es');
define('SECURE_AUTH_SALT', '*=0ZZ.^jT@4Y]7+ju++VLIKm^cSqPr$q;-n|_UeC@r;;OP Ez!;j9eVC[189 XJZ');
define('LOGGED_IN_SALT',   '608@|~7Hb`XMNr<Y[PA,C%i|`c!+He_Cv2jeH{Hh< B:8{z4!p),A^+H-qh|F/x|');
define('NONCE_SALT',       'p+NxwE#_^5%xK>48v?@>*cpB16>={d#E?[Jk$[*<Sswp~3qq*u=:mAqw2+?l;hV@');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'tm_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
define('WP_DEBUG', true);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
