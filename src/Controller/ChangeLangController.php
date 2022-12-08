<?php
namespace App\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ChangeLangController extends AbstractController{
    public function run(): Response
     {
        if(!isset($_GET['lang']) || !isset($_GET['page'])) {
            header('Location: /');
            exit();
        }
        
        $_GET['lang'] = htmlspecialchars($_GET['lang']);
        $_GET['page'] = htmlspecialchars($_GET['page']);
        if(in_array($_GET['lang'], \App\Lib\LanguageManager::$avaliableLanguages)) {
            $_SESSION['lang'] = $_GET['lang'];
            header('Location: ' . $_GET['page']);
            exit();
        }else{
            header('Location: /');
            exit();
        }
    }
}
