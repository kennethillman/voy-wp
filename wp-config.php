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
define( 'DB_NAME', 'voy_wp' );

/** MySQL database username */
define( 'DB_USER', 'voy_wp' );

/** MySQL database password */
define( 'DB_PASSWORD', 'voy_wp' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'U(p)0EQ$O;meL`Oe@1$t7nI?<$=|NJ)kb+Shya21)-M2HI#/B#e~:@gX+}h@[LNE' );
define( 'SECURE_AUTH_KEY',  'Qpe;9 Ye^zuSozw@}2*f9mK~]7/V1,gf[^v4=}@ N!$<(q2qI<3U]kNK^P4b)n;7' );
define( 'LOGGED_IN_KEY',    'R=yN?s&Ek8ncd;xuvIHU];2fo#piE[MbF6 63@aP:p1TyZmz#94(>XErht{}6<V,' );
define( 'NONCE_KEY',        'Xr~QqP8%cjPA$] ?m*-CrcjgdfA6Vao>8C/AI6-pi_Y<rI]y=6fKSOS6i/%4F~Xl' );
define( 'AUTH_SALT',        '<<7vysQ=uPfNxyl? z=97AyIfm~QNn5%JI7^)bFW&;A`V.5`W2xj+KXJY`_hV66T' );
define( 'SECURE_AUTH_SALT', 'dT-4]:wh_.++<M&L6>&Eywn})wSzy+.`v6eBhl694uF(fc:yp9:?oV! PDbU(ST(' );
define( 'LOGGED_IN_SALT',   '3rPPnmKp|dUR=KX{W-TVYH7a:60P7z}$h3jgggKJgn~9XX`)6XuCtzMLjypztu!m' );
define( 'NONCE_SALT',       'X4aAby}iQOenS$2g7~R@,9+/-mc_lfzq!*RMP+cKOgv0K[{xS73~|k0u:zq>G.My' );

/**#@-*/

/**
 * WordPress Database Table prefix.
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
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define( 'WP_DEBUG', false );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once( ABSPATH . 'wp-settings.php' );
