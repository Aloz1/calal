<?php

/*
 * Plugin Name: CalAl Calendar
 * Version: 0.0.1
 * Author: Alastair Knowles (Aloz1)
 * Author URI: https://github.com/Aloz1
 * License: GPLv3
 */

if (!function_exists('register_activation_hook')) {
    echo 'This is a plugin. It cannot be called directly';
    exit;
}

require_once __DIR__ . '/vendor/autoload.php';

use Aloz1\Calal\Plugin;
Plugin::run();
