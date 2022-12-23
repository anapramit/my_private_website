<?php
namespace App\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class OpenPdfBookController extends AbstractController{
    public function OpenPdfBook(int $page): Response
     {

        $number_pdf = htmlspecialchars($page); 
        $is_book = 1;
        $is_exist_get = \App\Lib\IsGetMethod::IsGetMethod();
        if($is_exist_get == 1){
            header('Location: /Mirosław_Mitka-book/' . $number_pdf);
            exit();
        }
        $response = new Response();
        require ('Somefile.php');
        return $this->render('open_pdf_book.html.twig', [
            'number_pdf' => $number_pdf,
        ]);
        exit();
    }
}