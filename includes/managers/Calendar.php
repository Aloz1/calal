<?php

namespace \Aloz1\Calal\Managers;

use \Aloz1\Calal;
use \ICal\ICal;

class CalendarSync {
    public static function scan_calendars() {
        $opts = Options::instance();
        $cals = $opts->calendars;
        $fs_cals = find_calendars($opts->path);

        // Remove old calendars that no-longer exist
        $del_cals = array_diff(array_keys($cal), array_keys($fs_cals));
        $cals = array_diff_key($cals, array_flip($del_cals));

        // Add missing calendars
        for ($fs_cals as $fc => $fn) {
            if (!array_key_exists($fc, $cals)) {
                $cals[$fc] = Calendar($fc, $fn)
            }
        }

        $opts->calendars = $cals;
    }

    public static function sync() {
        $cals = $opts->calendars;
    }

}

class Calendar implements Serializable {
    private string $name;
    public string  $disp_name;
    public boolean $enabled;

    public function __construct(string $name, ?string $disp_name=null, boolean $enabled=true) {
        $this->name = $name;
        $this->disp_name = $disp_name;
        $this->enabled = $enabled;
    }

    public function serialize(): ?string {
        return json_encode(array(
            'n' => $this->name,
            'dn' => $this->disp_name ?? array(),
            'en' => $this->enabled
        ));
    }

    public function unserialize(string $data): void {
        $j = json_decode($data);
        $this->name = $j['name'];
        $this->disp_name = $j['disp_name'];
        $this->enabled = $j['enabled'];
    }

    public function name(): string {
        return $this->name;
    }
}

function find_calendars($path) {
    if (!is_dir($path)) {
        // Can't do anything. Top level path is not a directory.
        return array();
    }

    $cals = array();
    $dirs = array_diff(scandir($path), array('.', '..'));
    foreach ($dirs as $d) {
        // Ignore files
        if (!is_dir($d)) {
            continue;
        }

        $f = join('/', array($path, $d));
        if (is_vdir($f)) {
            $cal[$d] = find_cal_name($f, $d);
        }
    }
}


function is_vdir($path) {
    $result = true;

    $contents = array_diff(scandir($path), array('.', '..'));
    foreach ($contents as $c) {
        $f = join('/', $path, $c);
        if (is_dir($f) || (mime_content_type($f) != 'text/calendar')) {
            $result = false;
            break;
        }
    }

    return $result;
}

function find_cal_name($path, $default) {
    $contents = array_diff(scandir($path), array('.', '..'));
    foreach ($contents as $c) {
        $f = join('/', $path, $c);
        $name = (new ICS($f))->calendarName();
        if (!empty($name)) {
            return $name;
        }
    }

    return $default;
}
