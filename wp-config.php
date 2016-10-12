<?php
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
define('DB_NAME', 'moonandmonster');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '');

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
define('AUTH_KEY',         '%.QTV>8Kel(@Hbrz^K5m7:FFKlC^wx0ZznP9u/Z$L!-x+z+|sZruCB pz)y|nPM~');
define('SECURE_AUTH_KEY',  'C<R6^m4Go6gx6`P>[7Sn|_+AZD +=+rRe#Q{x7gP,MHxp6S#`*W|7g.0?/`KT_E3');
define('LOGGED_IN_KEY',    '#!bm>*khC0?;|ooZ@h|m=#@ShI;7((pZD9fAWt+R=q-yJ9.O|;|2|,..WJZ-v`>Y');
define('NONCE_KEY',        '@-JkQHi5>PzLz)t1!RGy4m?:A+<fe yMn}lLi]=Zt+D^LLGh}}l/~:^Gl>bGr+m#');
define('AUTH_SALT',        'Y(hU^4=8:g<g=kyAf~9pY@ADQ5yiV/XL/9aWYJr+<uv|aA^Q Kp2Jdn4BUFitBoW');
define('SECURE_AUTH_SALT', '^L3~v1[T+VcM,z%<-Q+Fu-:ZjbWCnp|@^f1poyAI>1&IDQV-aW}08l::7J*EG]:j');
define('LOGGED_IN_SALT',   'opJ)3E,6iPH(L`qge_~$W2]K82==GDtD. K#-64|{xZUxFE|y|A(Xyj+RD>J+h;[');
define('NONCE_SALT',       ';I*/wM3fi}X^| tP7]hD66zyMH>]!.?|Xl[tM^z8V_nInAz)}ha2yr&8,Z+*o|i-');

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

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
