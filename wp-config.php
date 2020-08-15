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
define( 'DB_NAME', 'wordpress' );

/** MySQL database username */
define( 'DB_USER', 'wordpress' );

/** MySQL database password */
define( 'DB_PASSWORD', '123456' );

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
define( 'AUTH_KEY',         'is4iH}]x`h7%*czB5wqDX)bT]0[z+5Gt)Vs_e^VZ[emve;_wvL[_A:pIoPT:0[*z' );
define( 'SECURE_AUTH_KEY',  'ej0&>ezp_&-ry`Q:X(_YMv;)&~[lV)BE<GLKB.>=AxSL[HZCZ{+M;3ecEkxJZj.m' );
define( 'LOGGED_IN_KEY',    'XYD0&rEDqHJ>ZzlDO d+m^U Bgq,[|5(.Px 6OMIUi0$;(o(G8~J*GDuSPD}+O5n' );
define( 'NONCE_KEY',        'G<?b=E~r,2<E_8T^W]bz18RBve!rzZ|IjI48X`fbheuw]n=yt3(SejgqJI!l<8cP' );
define( 'AUTH_SALT',        'x`D7N(GJ]*dA!8o*yTVp$*O3p[5>ePSO*J;kT|YuV73*m}3R6+G<!AI`e24dCC&-' );
define( 'SECURE_AUTH_SALT', '==53Bs_0Z-!n{cyT}L[WzlS9_?/|YUJkz&R#G,xu+j.cOh1.1WJ_f +]Y[q+_95l' );
define( 'LOGGED_IN_SALT',   'Wbl9C#W&qlMViR<E3+,Nyb}Ubu#dIpG8>ojH=e|xos)n*-^ !`83DxBQo%Izd.4G' );
define( 'NONCE_SALT',       'Hey:{ij+3pbxz]|=H>b+^K*O?5s2O^CfI/p+:yH;YQcN0~nu^m[,>QEGd;Azr na' );

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'hc_';

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
