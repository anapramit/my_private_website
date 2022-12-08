<?php

namespace App\Lib;

class TwigContainer {
    public function get($key) {
        return $this->$key;
    }
}