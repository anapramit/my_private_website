<?php
namespace App\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class GoLinkController extends AbstractController
{

    public function link(): Response
    {
        $where_go = htmlspecialchars($_SERVER['REQUEST_URI']);
        $where_go = urldecode($where_go);
        $where_go = htmlspecialchars($where_go);
        $where_go = substr($where_go, 3); 
        $is_true = true;
        
        $langVars = \App\Lib\LanguageManager::getVariables('error_information');
        //
        if(!empty($where_go)) {     
            if(mb_strlen($where_go) > 1900 || mb_strlen($where_go) < 5) {
                $is_true = false;
            }
            if(preg_match('/["]|[\']|[;]|[<]|[>]|[\$]/', $where_go)){
                $is_true = false;
            }
         }else{
            $is_true = false;
         }

        if($is_true == true){
            $ques = "'" .  $where_go . "'";
            $db = \App\Lib\Database::getPDO();
            $stmt_2 = $db->prepare("SELECT * FROM webs WHERE name_link LIKE $ques LIMIT 1");
            if(!$stmt_2->execute()){
                $error = $langVars['err_databese'];
                return $this->render('lucky/error_information.html.twig', [
                    'error' => $error
                ]);
                exit();
            }else{
                $data = $stmt_2->fetch(\PDO::FETCH_ASSOC);
                $how_obtained = $stmt_2-> rowCount();
                if($how_obtained == 1 && !empty($data)){
                    $go = $data['to_website'];
                    header("Location: $go");
                    exit();
                }else{
                    $error = $langVars['err_link_invalid'];
                    return $this->render('lucky/error_information.html.twig', [
                        'error' => $error
                    ]);
                    exit();
                }
            }
        }else{
            $error = $langVars['err_link_invalid'];
            return $this->render('lucky/error_information.html.twig', [
                'error' => $error
            ]);
            exit();
        }
    }
}