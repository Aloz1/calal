<?php

namespace Aloz1\Calal\DB;

class DB_Init {
    static function initialise() {
        global $wpdb;

        $charset_collate = $wpdb->get_charset_collate();

        $sql = '';
        $sql .= self::create_calendar_table($charset_collate);
        $sql .= self::create_events_table($charset_collate);

        require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
        dbDelta($sql);
    }

    static function destroy_db() {
        global $wpdb;

        $sql = '';
        self::drop_table(EventsTable::TABLE_NAME);
        self::drop_table(CalendarTable::TABLE_NAME);

        require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
        dbDelta($sql);
    }

    static function create_calendar_table($charset_collate) {
        $table_name = CalendarTable::TABLE_NAME;
        return "CREATE TABLE {$table_name} ("   .
                    "name UUID NOT NULL,"       .
                    "disp_name VARCHAR(128),"   .
                    "enabled BOOLEAN"           .
                ") {$charset_collate};";
    }

    static function create_events_table($charset_collate) {
        $table_name = EventsTable::TABLE_NAME;
        $sql = "CREATE TABLE {$table_name} (" .
                    "id UUID NOT NULL," .
                    "udate DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL," .
                    "cal_name VARCHAR(64) NOT NULL," .
                    "fn VARCHAR(64) NOT NULL" .
            ") {$charset_collate};";

        return $sql;
    }

    static function drop_table($table_name) {
        return "DROP {$table_name};"
    }
};

