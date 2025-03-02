<?php

namespace Aloz1\Calal;

class Options {
    private static $defaults = array(
        'resync_timeout' => 0,
        'vdir_path' => WP_CONTENT_DIR . '/calal_vdir',
        'calendars' => array()
    );

    protected ?self $opts = null;

    public static function instance(): self {
        if (is_null(self::$instance)) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    public function clear() {
        foreach (array_keys($defaults) as $opt) {
            delete_option($opt);
        }
    }

    public function __get($opt) {
        if (!array_key_exists($opt, $defaults)) {
            throw new InvalidArgumentException(sprintf("Option (%s) is not a valid option", $opt))
        }
        return get_option($opt, $defaults[$option]);
    }

    public function __set($opt, $val) {
        if (!array_key_exists($opt, $defaults)) {
            throw new InvalidArgumentException(sprintf("Option %s is not a valid option", $opt))
        }
        return update_option($opt, $val);
    }
}
