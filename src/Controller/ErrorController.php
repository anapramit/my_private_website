<?php
namespace App\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ErrorController extends AbstractController{
    public function error(): Response
     {
        $langVars = \App\Lib\LanguageManager::getVariables('error_information');
        $error = $langVars['page_not_found'];
        return $this->render('lucky/error_information.html.twig', [
            'error' => $error
        ]);
        exit();
    }
}