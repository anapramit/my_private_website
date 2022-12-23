<?php

namespace App\Lib;

class IsGetMethod {

    public static function IsGetMethod() {
        if(isset($_SERVER['QUERY_STRING'])){
            $is_empty = htmlspecialchars($_SERVER['QUERY_STRING']);
            if(!empty($is_empty)){
                return 1;
            }else{
                return 0;
            }
        }else {
            return 1;
        }
    }
}
 
