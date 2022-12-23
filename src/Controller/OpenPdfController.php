<?php
namespace App\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class OpenPdfController extends AbstractController{
    public function OpenPdf(int $page): Response
     {

        $number_pdf = htmlspecialchars($page); 
        $is_exist_get = \App\Lib\IsGetMethod::IsGetMethod();
        if($is_exist_get == 1){
            header('Location: /Mirosław_Mitka-story/' . $number_pdf);
            exit();
        }
        $response = new Response();
        require ('Somefile.php');
        return $this->render('openpdf.html.twig', [
            'number_pdf' => $number_pdf
        ]);
        exit();
    }
}