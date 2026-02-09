<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the website, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'danixpert' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', '' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The database collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

if ( !defined('WP_CLI') ) {
    // Handle ngrok and reverse proxy headers
    if (isset($_SERVER['HTTP_X_FORWARDED_PROTO'])) {
        $_SERVER['HTTPS'] = $_SERVER['HTTP_X_FORWARDED_PROTO'] === 'https' ? 'on' : 'off';
        $_SERVER['REQUEST_SCHEME'] = $_SERVER['HTTP_X_FORWARDED_PROTO'];
    }
    
    if (isset($_SERVER['HTTP_X_FORWARDED_HOST'])) {
        $_SERVER['HTTP_HOST'] = $_SERVER['HTTP_X_FORWARDED_HOST'];
    }

    // Determine the base path (for subdirectory installations like /danixpert)
    // NOTE: Avoid using SCRIPT_NAME because it changes on /wp-admin and breaks wp-login.php URLs.
    $base_path = '';

    $doc_root = $_SERVER['DOCUMENT_ROOT'] ?? '';
    $wp_root = __DIR__;

    if ($doc_root) {
        $doc_root_real = realpath($doc_root) ?: $doc_root;
        $wp_root_real = realpath($wp_root) ?: $wp_root;

        $doc_root_norm = rtrim(str_replace('\\', '/', $doc_root_real), '/');
        $wp_root_norm = rtrim(str_replace('\\', '/', $wp_root_real), '/');

        $doc_root_norm_lc = strtolower($doc_root_norm);
        $wp_root_norm_lc = strtolower($wp_root_norm);

        if (strpos($wp_root_norm_lc, $doc_root_norm_lc) === 0) {
            $relative = substr($wp_root_norm, strlen($doc_root_norm));
            $base_path = rtrim(str_replace('\\', '/', $relative), '/');
        }
    }

    $scheme = $_SERVER['REQUEST_SCHEME'] ?? ((isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') ? 'https' : 'http');
    $host = $_SERVER['HTTP_HOST'] ?? 'localhost';

    // Build the full URL with subdirectory support
    $site_url = $scheme . '://' . $host . $base_path;

    define( 'WP_SITEURL', $site_url );
    define( 'WP_HOME',    $site_url );
}



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
define( 'AUTH_KEY',         'sCH5WTK2Pf00qMWqVVNARHe4Woy1KEnKyc3J3cMD5gqOGvAU6b6Dqwev4HQVQEow' );
define( 'SECURE_AUTH_KEY',  'sCH5WTK2Pf00qMWqVVNARHe4Woy1KEnKyc3J3cMD5gqOGvAU6b6Dqwev4HQVQEow' );
define( 'LOGGED_IN_KEY',    'sCH5WTK2Pf00qMWqVVNARHe4Woy1KEnKyc3J3cMD5gqOGvAU6b6Dqwev4HQVQEow' );
define( 'NONCE_KEY',        'sCH5WTK2Pf00qMWqVVNARHe4Woy1KEnKyc3J3cMD5gqOGvAU6b6Dqwev4HQVQEow' );
define( 'AUTH_SALT',        'sCH5WTK2Pf00qMWqVVNARHe4Woy1KEnKyc3J3cMD5gqOGvAU6b6Dqwev4HQVQEow' );
define( 'SECURE_AUTH_SALT', 'sCH5WTK2Pf00qMWqVVNARHe4Woy1KEnKyc3J3cMD5gqOGvAU6b6Dqwev4HQVQEow' );
define( 'LOGGED_IN_SALT',   'sCH5WTK2Pf00qMWqVVNARHe4Woy1KEnKyc3J3cMD5gqOGvAU6b6Dqwev4HQVQEow' );
define( 'NONCE_SALT',       'sCH5WTK2Pf00qMWqVVNARHe4Woy1KEnKyc3J3cMD5gqOGvAU6b6Dqwev4HQVQEow' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 *
 * At the installation time, database tables are created with the specified prefix.
 * Changing this value after WordPress is installed will make your site think
 * it has not been installed.
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/#table-prefix
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
 * @link https://developer.wordpress.org/advanced-administration/debug/debug-wordpress/
 */
define( 'WP_DEBUG', false );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
