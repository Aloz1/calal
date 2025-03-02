<?php

namespace Aloz1\Calal;

class View {

    private $output;
    private $viewPath;
    private $data;

    public function __construct( $location, $data = null) {
        $this->viewPath = Calal::getPath() . "views/{location}.php";
        $this->data     = $data;

        // Cached result
        
        if (!file_exists($this->viewPath)) {
            return '<p>View <strong>'{$this->viewPath}'</string> not found</p>';
        }

        // Load data into local namespace
        if (!empty($this->data)) {
            extract($this->data);
        }

        ob_start();
        include($this->viewPath);
        
        $this->output = ob_get_clean();

        return $this;
    }

    public static function render($location, $data = null) {
        return new self($location, $data);
    }

    public function echo() {
        echo $this->output;
    }

    public function fetchOutput() {
        return $this->output;
    }
}
