<?php
namespace App\Twig;

use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;

class AppExtension extends AbstractExtension
{
    public function getFunctions()
    {
        return [
            new TwigFunction('getVariable', [$this, 'getVariable']),
            new TwigFunction('setPage', [$this, 'setPage']),
            new TwigFunction('getVariables', [$this, 'getVariables']),
            new TwigFunction('getLangVariables', [$this, 'getLangVariables']),
            new TwigFunction('getCaptchaPublicKey', [$this, 'getCaptchaPublicKey'])
        ];
    }
    
    public static function getVariable($var) {
        return \App\Lib\LanguageManager::getVariable($var);
    }
    
    public static function setPage($page){
        $_SESSION['page'] = $page;
    }

    public static function getVariables($page){
        $lang = \App\Lib\LanguageManager::getLanguage();
        $variables = \App\Lib\LanguageManager::getVariables($page, null, $lang);
        $variables['LANGUAGE'] = $lang;
        return $variables;
    }

    public static function getLangVariables($page) {
        return new \App\Lib\TwigContainer(self::getVariables($page));
    }

    public static function getCaptchaPublicKey(){
        //do zmiany
        $error_lang = '/home/vard/my_project2/';
        require $error_lang .'config/recaptcha.php';
        return RECPATCHA_PUBLIC_KEY;
    }
}
