<?php
namespace App\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class HaikuController extends AbstractController{
    public function haiku(): Response
     {
        $response = new Response();
        require ('Somefile.php');

        return $this->render('lucky/haiku.html.twig');
        exit();
    }
}