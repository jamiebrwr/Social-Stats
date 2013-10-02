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
define('DB_NAME', 'social-stats');

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
define('AUTH_KEY',         'F oNO.4AS(e 5r,4<*ThU]ts MVQflXL`xTvaYLr4%h1d[r>=>@LqxH/MRgR_cm}');
define('SECURE_AUTH_KEY',  '{WYA;|0@|iVDXIAKn7vG,&JN`-TlzgW(.n_JlNw|pMJ+I|2iB#</N~r]30L8><{v');
define('LOGGED_IN_KEY',    'J*t^xQK!V]]m9ssP`t}Lxj4P7Q*]bE@,4&$sKe~?F5rvIka83wGY! NOi+6DEzH[');
define('NONCE_KEY',        'L+Zq82S|%x#(73;?/*s3~,(|jy~0Wt58mWZ!xKo4Zr:#zk!QZsII&KxN72|0SEM0');
define('AUTH_SALT',        '@VJfv;h1QUj3LL3-_+kZQXT,C[QMN`wVrR%%uRZ,S9M$n`}0`cyfgLYVcuDM-5Ql');
define('SECURE_AUTH_SALT', ']RZfP S8H+C+(NL<ea`Vs*<$|SxylQ8:IJs1yq+h3]ORsh%@ps4OtD$G&n?tpP=S');
define('LOGGED_IN_SALT',   '*nz-9$I{L2@kT;+gC-8&*N`^Q!@d:1@<x-iCPu:b^kj{XK9|SbXCeZ7*syn[O,OF');
define('NONCE_SALT',       '--2x++&OxkQMj8+CY}lqGVQ:GL|F3=@>*5=C}ceFKY!sz`+ d-.d]BHksHO<?b|C');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

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
