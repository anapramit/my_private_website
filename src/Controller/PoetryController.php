<?php
namespace App\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class PoetryController extends AbstractController{
    public function poetry(): Response
     {
        $response = new Response();
        require ('Somefile.php');

        return $this->render('lucky/poetry.html.twig');
        exit();
    }
}
