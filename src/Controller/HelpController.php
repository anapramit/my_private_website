<?php
namespace App\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class HelpController extends AbstractController{
    public function help(): Response
     {
        return $this->render('lucky/help.html.twig');
        exit();
    }
}