<?php
namespace App\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class StoryController extends AbstractController{
    public function story(): Response
     {
        $is_exist_get = \App\Lib\IsGetMethod::IsGetMethod();
        if($is_exist_get == 1){
            header('Location: /story');
            exit();
        }
        $response = new Response();
        require ('Somefile.php');

        return $this->render('lucky/story.html.twig');
        exit();
    }
}
