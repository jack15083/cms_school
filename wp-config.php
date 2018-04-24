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
define('DB_NAME', 'my_school');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'jack1989');

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
define('AUTH_KEY',         '1jqh2w-2wPuR!z8rIDv%q59&aqQWZ*hM&ZaUfiDx2mv*/5n2$TT_2e` QorT1IRi');
define('SECURE_AUTH_KEY',  'Z UruIL,2D.vp&3tQi2p3xw{YB~*@A9qM%O,rRRqE ]O(lM$6Y$]XxNYJq]_wel1');
define('LOGGED_IN_KEY',    '+>,SoAH2`Z)|A%.kIE.&+`x<RFkn6Zw>Y_d3#)Rc^~q+A)BJ9rvO7Gv60zXgs?Bs');
define('NONCE_KEY',        '6t9OXZ4`A9,=b:a=!a=*A~Ko&B{Qfk[}B>E`V5:w^,M,{QLqdN)pL?X%W6z+8/HG');
define('AUTH_SALT',        'Q`i&WPrafdg(BGT!)?pxWBm;sW9ubKp=y_sJnO!),!t7IqG0qX)_Aswt3Dv&S_|f');
define('SECURE_AUTH_SALT', 'UaO$*BNVJAL~1&EcJA/_d-=?T=?^V3iqwfU>Jt4FM@(&Dx[vnC=_m7F`O33VJZJ;');
define('LOGGED_IN_SALT',   '}WQB~Y6=RKrhYOb$H!SiHMwvY]aZ~l9TYmMV{{+9.L R0;tai6B3f` zE WqTrO=');
define('NONCE_SALT',       '/9z)Z?M=vAC,BSf4yRR1Xl7c7TyXVB}cHeSH$CYhYOWM6;w[hY:mt,)8!hz2+M+w');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'my_school';

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
define('WP_DEBUG', true);
define('WP_DEBUG_DISPLAY', true);
define('ALLOW_UNFILTERED_UPLOADS',true);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
