<?php

namespace Aloz1\Calal\API;

class Events extends API {
    public static function cb() {
        return rest_endure_response();
    }

    public static function perm_cb() {
        // Permissions, only allow enabled post.
    }

    public static function args() {
        $args = array();

        $args['month'] = array(
            'description' => esc_html__('Calendar month')
        )
    }
}
