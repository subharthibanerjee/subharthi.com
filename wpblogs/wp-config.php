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
define('DB_NAME', 'i4400322_wp1');

/** MySQL database username */
define('DB_USER', 'i4400322_wp1');

/** MySQL database password */
define('DB_PASSWORD', 'Y.cNXStuCgIKq7DWoav28');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

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
define('AUTH_KEY',         'DREr9Y76jEaiuAf3GqnX9O4Vux7hFLXIpfKVTRY0XgSNFat1QdfvXsIjkfUD30nN');
define('SECURE_AUTH_KEY',  'c7r47Sa3mUODtvMFdlCRY6qy2y0Nt68Rpve3AW4YPLtZgRkIemeB5YjJqcRDxeZQ');
define('LOGGED_IN_KEY',    'V4R0oyK0u2CpRiqWl051XoK9mH76SuL34pboMXRj2zZBDvURwhKX35pnw3rfHP3I');
define('NONCE_KEY',        'RqzgKUmYl7451K67WpuEA1va5zzSBoH1PhbJJJVZi6br6eJg2D2wy9cQLt0sZTn5');
define('AUTH_SALT',        'D1xMopTTPl2vjS8NjZbXUpEw4eMiJ0sHCLcmUTRPmTAt49FIjG0A2ajsgYAS306M');
define('SECURE_AUTH_SALT', 'R3Ji4bQK1IQq7NACwRb7l5sK1mH4QdK2bKHlfO2PGNCBN7SNtADCotzmUXZZYRr0');
define('LOGGED_IN_SALT',   'P39kiTuyXrmCWyOKV4VdOAObVEEYPqZ6m5F5wQFfDcf7Vx8Nt5BZX199rwleAPu1');
define('NONCE_SALT',       '7vDextRiF5p18DxJfb84NKiarblCwBzaRuWLmwZLzg09qsjgJH7gG9DlaEesraU9');

/**
 * Other customizations.
 */
define('FS_METHOD','direct');define('FS_CHMOD_DIR',0755);define('FS_CHMOD_FILE',0644);
define('WP_TEMP_DIR',dirname(__FILE__).'/wp-content/uploads');

/**
 * Turn off automatic updates since these are managed upstream.
 */
define('AUTOMATIC_UPDATER_DISABLED', true);


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
