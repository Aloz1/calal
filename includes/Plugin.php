<?php

namespace Aloz1\Calal;

class Plugin {
    protected static ?self $instance = null;

    public static function instance(): self {
        if (is_null(self::$instance)) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    public static function path(): ?string {
        return basename(dirname(__FILE__));
    }

    public static function run (): self {
        $plugin = self::instance();

        register_activation_hook($plugin->path(), function () {
            self::activate();
        });

        register_deactivation_hook($plugin->path(), function () {
            self::deactivate();
        });

        //add_action('rest_api_init', array(__CLASS__, 'register_rest_api'));
        add_action('admin_menu', array(__CLASS__, 'register_admin_menu'));
        //add_action('widgets_init', function() {
        //    register_widget('Aloz1\Calal\CalalEventWidget');
        //});

        return $plugin;
    }

    public static function activate() {
        //flush_rewrite_rules();
        
    }

    public static function deactivate() {
        //flush_rewrite_rules();
    }

    public static function register_rest_api() {
        // example
        //register_rest_route('calal/v1', '/events', array(
        //    'methods'  => WP_REST_Server::READABLE,
        //    'callback' => null /* insert cb here */,
        //    'permission_callback' => null /* insert permissions callback here */,
        //    'args' => null /* insert arguments here */
        //));
        //Controllers\EventsController::register();

        //register_rest_route('calal/v1', '/rescan', array());
        //register_rest_route('calal/v1', '/calendars', array()); // Top level
        //register_rest_route('calal/v1', '/events', array()); // Top level
        //register_rest_route('calal/v1', '/events/period/(<yyyy>/<mm>)', array());
        //register_rest_route('calal/v1', '/event/id/(?P<id>[\d]+)', array());
    }

    public static function register_admin_menu() {
    }
}
