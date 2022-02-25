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
define( 'DB_NAME', 'wordpress' );

/** Database username */
define( 'DB_USER', 'rafita' );

/** Database password */
define( 'DB_PASSWORD', '12345' );

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
define( 'AUTH_KEY',         'T5SzzGX@B07n/S/A*^d()JhSiT78o%@B<[y3Ij&e5Zf%J!}A@^[{W(b6J:> AA,3' );
define( 'SECURE_AUTH_KEY',  'x|W$1M4h]K&Q1m0FR<#>r4WN=|j+c.1$UQXQb>=(36{^TFb*a%fVNWp]*!jRFr$n' );
define( 'LOGGED_IN_KEY',    'h?J?6dh5]w|*o/Df{dsI|,NZci27)82qoolTXmor_/Nyrnr7TJ?+*JitG,0T#9#j' );
define( 'NONCE_KEY',        'd:Od88@|1J;0.QeC|r)Bf5Um=*n$K>]EyrFKMk]&zweN1D UYL;L)bfi$5hA fzj' );
define( 'AUTH_SALT',        'F[&LAk,aDs(@8.Bb!:7h6oM-G7,z!_`zTHj)bORJFr~ZOxGgf{Z2LNfY(g>W$B~I' );
define( 'SECURE_AUTH_SALT', ';</TNNOtJRb(tB5_1?:Kb/)K{SS$Vp{sMgyCp5%0U3M>^2z;1<f.ZHks~,2OP%i_' );
define( 'LOGGED_IN_SALT',   'O,Gr*pM5#~!=m+fy]oXfl|Uk8h4=f-9XX-77R7]LcFsz].<~=+]`YC3M0Or21)jU' );
define( 'NONCE_SALT',       '?w:XJ NIy(/o4MPhUmThr5EHaQb%$`:@dtEV[/NngSvWbK}N3n<Q-s B0r>csh#J' );

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
