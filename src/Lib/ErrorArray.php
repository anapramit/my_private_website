<?php

namespace App\Lib;

class ErrorArray {
    public $errors = [];

    public function set($name, $value, $override = false) {
        if(!array_key_exists($name, $this->errors)) {
            $this->errors[$name] = $value;
        }elseif($override){
            $this->errors[$name] = $value;
        }
    }
}