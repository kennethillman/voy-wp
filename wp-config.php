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
define( 'DB_NAME', 'voytalent' );

/** MySQL database username */
define( 'DB_USER', 'voytalent' );

/** MySQL database password */
define( 'DB_PASSWORD', 'Qldivejnr4zEQkBK' );

/** MySQL hostname */
define( 'DB_HOST', '52.66.145.198' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );
define('WP_SITEURL','http://127.0.0.1:8888/voy-wp/');
define('WP_HOME','http://127.0.0.1:8888/voy-wp/');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'Gdy>JmcNFj_pppp[F.nk&D!=jjM44B:U[L{n^/5%n]&VU/.j./VCz,!!ip;?pqZ#6kym' );
define( 'SECURE_AUTH_KEY',  'rsa$ETS[GhH$Jl1X2EFVYXZY?fi{+zt)+-nzV+2cIAje?SO9I#;9N=HSnWY..vQq' );
define( 'LOGGED_IN_KEY',    '4 ~^S#{|_W}H.dI/]|7SPb`CWP:qR4.T] $(u1Bgj$<=e,e*KSYv:5eDGgkB_.*<' );
define( 'NONCE_KEY',        'fT,U2a$kZ=}~k-fV <:x)]VKerzA{Ym{$G*qhg6}+oI:KyR3aCu[T;Tmio=[ud3`' );
define( 'AUTH_SALT',        'omR)K?9QxTeR/K3pF!ZEXdtBIJ)8p?nIk!$5=+n}4cgaPo?_|gSLvDiY VuYA_Du' );
define( 'SECURE_AUTH_SALT', '[<+dY087Xk_y26TuOWgy0|&%6G,_Nk9Sqeq$]/GO@xmGCCqc}APL6gMIt*T,yc{B' );
define( 'LOGGED_IN_SALT',   '>?R>{hUGq)YtXw9CvA!ld9G+.SZIl:%]G4c)y!&$y[^gjE{9|IyW@4GSb$nU|7a<' );
define( 'NONCE_SALT',       'c9zyNv>=RjIr4>Qbz+=YIm+k94>wuyS}3w-y1GIC$C<&vy]|MVpP=BL~453$cag=' );

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'no5mf_';

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
