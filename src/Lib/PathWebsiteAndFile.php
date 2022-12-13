<?php

namespace App\Lib;

class PathWebsiteAndFile {

    public static function pathwebsite($number) {
        switch ($number) {
            case '1': 
                return '/home/vard/my_project2/';
                break;
            case '2':
                return 'http://localhost:8000';
                break;
            case '3':
                return 'http:\/\/localhost:8000';
                break;  
            default: return '';
        }
    }
}
 