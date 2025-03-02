<?php

namespace Aloz1\Calal\API;

class API_Base extends WP_REST_Controller {
    private static string $namespace = 'calal/v1';

    public static function register() {
        register_rest_route(self::$tag, )
    }
}
