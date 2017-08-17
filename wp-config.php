<?php
// define( 'WP_ALLOW_MULTISITE', true );
define('MULTISITE', true);
define('SUBDOMAIN_INSTALL', false);
define('DOMAIN_CURRENT_SITE', 'zenchin-form.com');
define('PATH_CURRENT_SITE', '/');
define('SITE_ID_CURRENT_SITE', 1);
define('BLOG_ID_CURRENT_SITE', 1);
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the
 * installation. You don't have to use the web site, you can
 * copy this file to "wp-config.php" and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * MySQL settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'tohgashi_2017');

/** MySQL database username */
define('DB_USER', 'tohgashi_ag');

/** MySQL database password */
define('DB_PASSWORD', 'zuq7eihv');

/** MySQL hostname */
define('DB_HOST', 'mysql2203.xserver.jp');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

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
define('AUTH_KEY',         'J[VKQvi$D!=Y4q^d7v7^nJAeTAJD7z/lh&%ypU$_}qY-E|x%)a.`,$_iZh2<HK9Q');
define('SECURE_AUTH_KEY',  ',3aG7x>(?W@NniHITW]Gkp 5//}{n{j~1ToILW=x,ge}HZA9;ycuv% 8XX==NX6K');
define('LOGGED_IN_KEY',    'U$}/)^qScTR]=G/##%2+]#-qgu2zqW%{A-6fHc2Dc>EW{Wo>,d@Vq+C>*KI0[t^!');
define('NONCE_KEY',        '+D@h@7MAEl#)Oq.$%n4]7Dm@y`^4_PvyWdG@=w{25@yaVQ9mNa%:fj*<z mJDS_0');
define('AUTH_SALT',        '1Xe{i&yD*ArQQ;x(IgxEM72&^<LC,q/!E g*sd9{#K^ 1myH7oO?IteG0]4/;q1H');
define('SECURE_AUTH_SALT', 'N$FCE}Ip4%:_~UO!&`MjWs5c=Vywt+wx|k:URB~QkJyt=JD^YJR-psPo }b4?Cq7');
define('LOGGED_IN_SALT',   '=}&@M-|6U5m?N^)NL#MTLtS:zZHe9)c*g_ML/P7z>T]ct4V8:1s6#FWDP?3?;Syf');
define('NONCE_SALT',       '+i6qQOhV&*3R->CN@2I5I>s$T+3J$Oy;5r[G>49+0ko1o&3_]@W7NL}dvtl8Hp@1');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', false);
// define('WP_DEBUG_DISPLAY', true);
/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
//Disable update wordpress
define( 'WP_AUTO_UPDATE_CORE', false );
