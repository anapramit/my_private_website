<?php
namespace App\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class HaikuController extends AbstractController{
    public function haiku(): Response
     {
        $is_exist_get = \App\Lib\IsGetMethod::IsGetMethod();
        if($is_exist_get == 1){
            header('Location: /haiku');
            exit();
        }
        $response = new Response();
        require ('Somefile.php');

        return $this->render('lucky/haiku.html.twig');
        exit();
    }
}