<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the web site, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'thinkbeyond' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', 'root' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The database collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication unique keys and salts.
 *
 * Change these to different unique phrases! You can generate these using
 * the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}.
 *
 * You can change these at any point in time to invalidate all existing cookies.
 * This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'FNGt6)0Rf~{> suj1/fMa=6@Gga,mG: Gf $$541?!!W43~g7bivV}bCRPJGPK2E' );
define( 'SECURE_AUTH_KEY',  'WoS<[4~?+BOyt[11<LppmVgbcawy&>KXRcm)?PyQZ;NM_uJ[^B!G|4F!Tc#w)@B<' );
define( 'LOGGED_IN_KEY',    'JV!l[9|[ 8>>EHoXmuc5X4*h{uu+]cO=AR(]nS }y?E7s@x $v,9kQwStNIn 4KT' );
define( 'NONCE_KEY',        '!gJOwke6}#G{[mKFi[p,c I/`x%|tSf3CW-_&jY& 5zgzzw%3i][>0}<?5$yU FJ' );
define( 'AUTH_SALT',        'TOKNnocv`Ybkbr#)xrY-3yJ~W 1Y>gBwV`AZ)PtoK<E9vn4O&E2_wAN9It5= a>3' );
define( 'SECURE_AUTH_SALT', '(SR@7xZ-}7a|yfN^OTB,416<I>&~xZ`5t$%jZ>nvzO%rMw;>&[qN3}O*Y#~A(/kr' );
define( 'LOGGED_IN_SALT',   '=l3QDR]E=OtwED/(h]QV|8@_8&KaZcynh45}LK!lu>I;oiV5d9F8-&m)a~{3[^en' );
define( 'NONCE_SALT',       'm_8,2g]:tdt?wx%Y[,]s,(=LUiLqvP3.ypwC&k79<Z}6`;Rpe&FO@Q0#h>c?.g%P' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the documentation.
 *
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
