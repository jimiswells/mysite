<?php

/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, and ABSPATH. You can find more information by visiting
 * {@link https://codex.wordpress.org/Editing_wp-config.php Editing wp-config.php}
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
define('DB_NAME', 'BAILEY_DB');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'root');

/** MySQL hostname */
define('DB_HOST', 'localhost');

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
define('AUTH_KEY',         ')r;,_Y4!6vI|j|CaDH>;i^Q4>u)Rjtv]EdKV7sP;`w$9M@,Ng7}z1MYd?;<^S+u@');
define('SECURE_AUTH_KEY',  '| :.[EDg|`:kajW]G;Qp-CQDZY>51RA.+gAejttu%aywX.6$N*V]@uf<g7)d.wm9');
define('LOGGED_IN_KEY',    ' mbUU?)rNl@#>H0.;DX|4%vi~Ib^E([$w^b3e5H-qdgA{u^NM>*si|6aojj4%fOh');
define('NONCE_KEY',        'c=qZ*RW#s|!, >G+jK]g?5+)E0<Uv?-$7+_o7+-.Fzp,-Qg{Fl+#7Zwtzq[^3/u$');
define('AUTH_SALT',        'R7sHX|ah-|4/eQ$-BZ~i8Syp7sj3`yTK=$..9ozM=%KtQsfU3YBuQd$-fhTfmGPP');
define('SECURE_AUTH_SALT', ';lF>sjcK&fnqt6ouTwJ8F77;A GrhamV(N&uEEN[-a+SO(9UMSMf0um>%}Z0$>lJ');
define('LOGGED_IN_SALT',   '8*tJ.ht_yUG-VmQ/N0Np7 |oBcDBLTlmTgvbhZCmt0ECt#_OryhrS/P!CYbQg%Rd');
define('NONCE_SALT',       'ZZ3y}.g7PVQEc20+~IkG-f*uof8W!|e|&=r(E-3FijG^s$f&p5aaO/,L^BM:v:PN');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

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
