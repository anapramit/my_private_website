<?php
namespace App\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class RegulationController extends AbstractController{
    public function regulation(): Response
     {
        $is_exist_get = \App\Lib\IsGetMethod::IsGetMethod();
        if($is_exist_get == 1){
            header('Location: /link-building-rules');
            exit();
        }
        $response = new Response();
        require ('Somefile.php');
        return $this->render('lucky/regulation.html.twig');
        exit();
    }
}