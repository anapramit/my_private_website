<?php

namespace App\Lib;

class LanguageManager {

    public static $avaliableLanguages = array('en', 'pl', 'ua');

    public static function getVariables($page, $var = null, $lang = null) {
        if($lang == null) {
        $vars = self::readVariables($page, self::getLanguage());
        }else{
            $vars = self::readVariables($page, $lang);
        }

        if($var !== null) {
            return $vars[$var];
        }else{
            return $vars;
        }
    }

    public static function getLanguage() {

        if(!isset($_SESSION['lang'])) {
            $langs = self::preferedLanguage(self::$avaliableLanguages, htmlspecialchars($_SERVER['HTTP_ACCEPT_LANGUAGE']));

            if(empty($langs)) {
                return 'en';
            }else{
                $lang = array_keys($langs)[0];
                switch ($lang) {
                    case 'en': 
                    case 'pl':
                    case 'ua': return $lang;
                        break;
                    default: return 'en';
                }
            }
        }else{
            return $_SESSION['lang'];
        }
    }

    public static function getVariable($var) {
        
        return self::getVariables($_SESSION['page'], $var);
    }

    public static function readVariables($page, $lang) {
        //zmienić podczas dodawania do bazy danych

        $error_lang = '/home/vard/my_project2/';
        return json_decode(file_get_contents($error_lang . "lang/$lang/" . $page . '.json'), true);
    }
  
    public static function setPage($page) {
        $_SESSION['page'] = $page;
    }

    private static function preferedLanguage(array $avaliableLanguages, $http_accept_language) {

        $avaliableLanguages = array_flip($avaliableLanguages);

        $langs = array();
        preg_match_all('~([\w-]+)(?:[^,\d]+([\d.]+))?~', strtolower($http_accept_language), $matches, PREG_SET_ORDER);
        foreach($matches as $match) {
    
            list($a, $b) = explode('-', $match[1]) + array('', '');
            $value = isset($match[2]) ? (float) $match[2] : 1.0;
    
            if(isset($avaliableLanguages[$match[1]])) {
                $langs[$match[1]] = $value;
                continue;
            }
    
            if(isset($avaliableLanguages[$a])) {
                $langs[$a] = $value - 0.1;
            }
    
        }
        arsort($langs);
    
        return $langs;
    }

}