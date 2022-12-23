<?php
namespace App\twig;

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
            new TwigFunction('getCaptchaPublicKey', [$this, 'getCaptchaPublicKey']),
            new TwigFunction('getCaptchaPublicKey2', [$this, 'getCaptchaPublicKey2'])
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
        $error_lang = \App\Lib\PathWebsiteAndFile::pathwebsite(1);
        require $error_lang .'config/recaptcha.php';
        return RECPATCHA_PUBLIC_KEY;
    }

    public static function getCaptchaPublicKey2(){
        $error_lang = \App\Lib\PathWebsiteAndFile::pathwebsite(1);
        require $error_lang .'config/recaptcha.php';
        return RECPATCHA_PUBLIC_KEY_2;
    }
}
