<?php

/**
 * Plugin Name: Lapisense
 * Description: Powerful, yet flexible, licensing plugin for your WordPress based software website.
 * Author: Coen Jacobs
 * Author URI: https://coenjacobs.me
 */

define('LAPISENSE_FILE', __FILE__);
define('LAPISENSE_DIR', plugin_dir_path(LAPISENSE_FILE));
define('LAPISENSE_URL', plugin_dir_url(LAPISENSE_FILE));

if (file_exists(LAPISENSE_DIR . 'vendor/autoload.php')) {
    require_once(LAPISENSE_DIR . 'vendor/autoload.php');
}

/**
 * @return \Lapisense\Plugin
 */
function lapisense()
{
    static $instance;

    if (! is_object($instance)) {
        $instance = new \Lapisense\Plugin();
        $instance->setup();
    }

    return $instance;
}

add_action('plugins_loaded', 'lapisense');

register_activation_hook(LAPISENSE_FILE, [\Lapisense\Database\Installer::class,'install']);
