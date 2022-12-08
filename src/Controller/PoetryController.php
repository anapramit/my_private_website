<?php
namespace App\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class PoetryController extends AbstractController{
    public function poetry(): Response
     {
        return $this->render('lucky/poetry.html.twig');
        exit();
    }
}
