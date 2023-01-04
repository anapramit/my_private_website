<?php
namespace App\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class HelpController extends AbstractController{
    public function help(): Response
     {

        $is_exist_get = \App\Lib\IsGetMethod::IsGetMethod();
        if($is_exist_get == 1){
            header('Location: /help');
            exit();
        }
        $response = new Response();
        require ('Somefile.php');
        return $this->render('lucky/help.html.twig');
        exit();
    }
}