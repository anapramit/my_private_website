<?php
namespace App\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class PoetryController extends AbstractController{
    public function poetry(): Response
     {

        $is_exist_get = \App\Lib\IsGetMethod::IsGetMethod();
        if($is_exist_get == 1){
            header('Location: /poetry');
            exit();
        }
        $response = new Response();
        require ('Somefile.php');

        return $this->render('lucky/poetry.html.twig');
        exit();
    }
}
