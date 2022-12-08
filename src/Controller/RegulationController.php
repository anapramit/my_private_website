<?php
namespace App\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class RegulationController extends AbstractController{
    public function regulation(): Response
     {
        return $this->render('lucky/regulation.html.twig');
        exit();
    }
}