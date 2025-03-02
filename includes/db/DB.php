<?php

namespace Aloz1\Calal\DB;

class DB {
    static function init_db() {
        DB_Init::initialise();
    }

    static function destroy_db() {
        DB_Init::destroy();
    }

    static function prefix() {
        global $wpdb;
        return $wpdb->prefix . 'calal_';
    }
};
