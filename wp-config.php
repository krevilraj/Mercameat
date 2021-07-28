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
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'wp_mercameat' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', 'root' );

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
define( 'AUTH_KEY',         '~fR#RQMld+RE3SR>lXe_N/lDQpBlQ=(@aZMxq^Cb8#B8H>PvnT>=C+n$Dl,5@&(8' );
define( 'SECURE_AUTH_KEY',  '?>n#.8X#4~nQKMZe_k8}fElDamJ0s@vk|6tsX^q::c3,1^6<Fl4_Je<22HsZ=X2^' );
define( 'LOGGED_IN_KEY',    'C~;{x mTJ1Z`!(Q~ofoY)hy{MW-[Yj$q%dK}ronTT4v4@n8]TXE}!!H3.XuzVM.Y' );
define( 'NONCE_KEY',        'iV#/nC5AA;7%zsCQ*@2R6(AqMkX]O34lw]ITR5i(*z1J+s?]8{:Z+Yh <`5wOz3O' );
define( 'AUTH_SALT',        'nVG+Z5Ns]W1M.>8&od,1-l5-|m/:^P#/we-b&Zn#=?VJEv(]D7Y@&lqm<)MRf*j|' );
define( 'SECURE_AUTH_SALT', 'K7nXD?+r(5R UZ:4iSKJ5y8Kq=hTnEQr+3Dk]+pQK|Zoe}]Z8CEw#&^3Fg+.);a{' );
define( 'LOGGED_IN_SALT',   '3o^Ymrr/shLQ WS+n[@-[x=gD`6D@#gG*d=0 wWOJeuj_4KPZO.^KpeBjcr+_rc^' );
define( 'NONCE_SALT',       ':%`{ut}<W{-cNvX4un?Mbqm57T)$/&Z8lJE>D(/r@6*%,qa{;t9<PBigu5.OEP3$' );

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'gc_';

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

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
