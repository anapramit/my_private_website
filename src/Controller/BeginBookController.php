<?php
namespace App\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class BeginBookController extends AbstractController{
    public function book(): Response
     {
        $is_exist_get = \App\Lib\IsGetMethod::IsGetMethod();
        if($is_exist_get == 1){
            header('Location: /begin-book');
            exit();
        }
        $response = new Response();
        require ('Somefile.php');

        return $this->render('lucky/begin_book.html.twig');
        exit();
    }
}
