<?php
namespace App\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class FindNumberController extends AbstractController
{

    public function FindNumber(): Response
    {
        //token 
        if(!isset($_SESSION['token_user']))
        {
            $_SESSION['token_user'] = \App\Lib\GenerateUserToken::generateUserToken();
        }

        $is_exist_get = \App\Lib\IsGetMethod::IsGetMethod();
        if($is_exist_get == 1){
            header('Location: /find-link');
            exit();
        }
        $errors = [];
        $number['old_link'] = '';
        $response = new Response();
        require ('Somefile.php');
        if(isset($_POST['old_link']) && isset($_POST['g-recaptcha-response']) 
         && isset($_POST['tokenek']) && isset($_POST['number_information'])){
            $where_go = htmlspecialchars($_POST['old_link']);
            $number['old_link'] = $where_go;
            $number['g-recaptcha'] = htmlspecialchars($_POST['g-recaptcha-response']);
           
            //bot traps: time 
            $_POST['number_information'] = htmlspecialchars($_POST['number_information']);
            
            $is_good_bot_traps = \App\Lib\VeryficationBotTraps::UseBotTime($_POST['number_information'], 2);
            unset($_POST['number_information']);
            if($is_good_bot_traps == 0)
            { 
                $seconds_time = \App\Lib\VeryficationBotTraps::BotCreateTime();
                $_SESSION['token_user'] =\App\Lib\GenerateUserToken::generateUserToken();
                return $this->render('lucky/find_number.html.twig', [
                    'number' => $number,
                    'this_token' => $_SESSION['token_user'],
                    'seconds_time' => $seconds_time
                ]);
                exit();
            }

            //token 
            $new_tokenek = \App\Lib\GenerateUserToken::generateUserToken();
            $_POST['tokenek'] = htmlspecialchars($_POST['tokenek']);
              
               if($_SESSION['token_user'] === $_POST['tokenek']){
                    $_SESSION['token_user'] = $new_tokenek;
                    unset($_POST['tokenek']);
               }
               else
               {
                    $_SESSION['token_user'] = $new_tokenek;
                    $seconds_time = \App\Lib\VeryficationBotTraps::BotCreateTime();
                    return $this->render('lucky/find_number.html.twig',[
                        'errors' => $errors,
                        'number' => $number,
                        'this_token' => $_SESSION['token_user'],
                        'seconds_time' => $seconds_time
                        ]);
                        exit();
               }
            
            $langVars = \App\Lib\LanguageManager::getVariables('find_number');

            $errors = self::validateData($number);

            if(empty($errors)){
                $name = \App\Lib\PathWebsiteAndFile::pathwebsite(2);
                $name_lenght = mb_strlen($name) + 3;
                $where_go = substr($where_go, $name_lenght); 
                $ques = "'" .  $where_go . "'";
                $db = \App\Lib\Database::getPDO();
                $stmt_2 = $db->prepare("SELECT * FROM webs WHERE name_link LIKE $ques LIMIT 1");
                if(!$stmt_2->execute()){
                    $error = $langVars['err_database'];
                    return $this->render('lucky/error_information.html.twig', [
                        'error' => $error
                    ]);
                    exit();
                }else{
                    $data = $stmt_2->fetch(\PDO::FETCH_ASSOC);
                    $how_obtained = $stmt_2-> rowCount();
                    if($how_obtained == 1 && !empty($data)){
                         $go = urldecode($data['to_website']);
                         return $this->render('lucky/find_number.html.twig', [
                            'is_send_link' => $go,
                            'number' => $number,
                        ]);
                        exit();
                    }else{
                        $error = $langVars['err_link_not_exist'];
                        return $this->render('lucky/error_information.html.twig', [
                            'error' => $error
                        ]);
                        exit();
                    }
                }
            }else{
                $seconds_time = \App\Lib\VeryficationBotTraps::BotCreateTime();
                return $this->render('lucky/find_number.html.twig', [
                    'errors' => $errors,
                    'number' => $number,
                    'this_token' => $_SESSION['token_user'],
                    'seconds_time' => $seconds_time
                ]);
                exit();
            }
        }else{  
            $_SESSION['token_user'] = \App\Lib\GenerateUserToken::generateUserToken();       
            $seconds_time = \App\Lib\VeryficationBotTraps::BotCreateTime();
            return $this->render('lucky/find_number.html.twig',[
            'errors' => $errors,
            'number' => $number,
            'this_token' => $_SESSION['token_user'],
            'seconds_time' => $seconds_time
            ]);
            exit();
        
        }
    }

    public static function validateData($number){

        $langVars = \App\Lib\LanguageManager::getVariables('find_number');
        $errors = new \App\Lib\ErrorArray();
        foreach ($number as $key => $value) {

            switch ($key) {
                case 'old_link':
                    if(!empty($value)) {     
                    if(!filter_var($value, FILTER_VALIDATE_URL) || mb_strlen($value) > 2000 || mb_strlen($value) < 3) {
                        $errors->set($key, $langVars['err_link_invalid']);
                    }
                    if(preg_match('/["]|[\']|[;]|[<]|[>]|[\$]|[\\\]/', $value)){
                        $errors->set($key, $langVars['err_link_invalid']);
                    }
                    $name = \App\Lib\PathWebsiteAndFile::pathwebsite(3);
                    $query = '/^' . $name . '\/__/';
                    if(!preg_match($query, $value)){
                        $errors->set($key, $langVars['err_link_invalid_emistic']);
                    }
        
                 }else{
                    $errors->set($key, $langVars['err_empty']);
                 }
                break;
            }
		}

        if (empty($errors->errors)) {
            if(!empty($number['g-recaptcha'])){
                $error_lang = \App\Lib\PathWebsiteAndFile::pathwebsite(1);
                require $error_lang . 'config/recaptcha.php';
                $secret = RECPATCHA_PRIVATE_KEY_2;
                $url = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$secret.'&response='. $number['g-recaptcha']);
                $result = json_decode($url);
                if ($result->success == 0) { 
                    $errors->set('recaptcha', $langVars['err_wrong_recaptcha']);
                }
             }else{
                $errors->set('recaptcha', $langVars['err_wrong_recaptcha']);
             }
        }
        return $errors->errors;
    }
}