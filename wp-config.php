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
 * @link https://wordpress.org/documentation/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'coding' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', 'mysql250' );

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
define( 'AUTH_KEY',         '1[@W7[gnb,|=dV;S?5wB-M[]Qav`ixETF/_Co/ihPWx,UpLT@;rT-uX]s>ZKc,~n' );
define( 'SECURE_AUTH_KEY',  '=Wzl-TR0PK}*c}yM*[]<$`$70A4K1Z#J$#.z67///kYQfnX^$j6ABc,.7 Eo8% R' );
define( 'LOGGED_IN_KEY',    '+ZjDwETvYX_]4GdT0u3n@5$1|_SvyKv&eWv`lWv}5~z`Jz2w5Gm<cd[nMS>E@3Wj' );
define( 'NONCE_KEY',        'R Xj~*YL^6W8Z+oAG6.2J,OU^#{#hJhE8q|PV7&mb5TB5.Z+n!y$x~Ml0e5[r12S' );
define( 'AUTH_SALT',        'ur8:]jqlSTj?rNd1-sNW|^HMQl^@/iJH:87f=o ]:qZbw3:}*$7GRF X+1iDP&#J' );
define( 'SECURE_AUTH_SALT', 'bx!~ D*>HDe,$TVs]i@@w6D`:^%6rozu2;Lo|b}V#K5b/|IYnFA=CZaMvDUUpO])' );
define( 'LOGGED_IN_SALT',   '7>:DVh gM,>DND1P!XTY|Lf%.Cyu@AtGQX-DC.<Z^8meW,3)5{k1&VxrGx}WXlGG' );
define( 'NONCE_SALT',       '8e6Rg~2Vm/=*P&= O|aFG+j<hi/3yGP74ee1xr5D!kLR^)Ud`<6bxrs=%4MexJV>' );

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
 * @link https://wordpress.org/documentation/article/debugging-in-wordpress/
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
