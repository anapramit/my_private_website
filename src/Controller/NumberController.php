<?php
namespace App\Controller;

use DateTime;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class NumberController extends AbstractController
{
    public function number(): Response
    {    
        //token 
        if(!isset($_SESSION['token_user']))
        {
            $_SESSION['token_user'] = \App\Lib\GenerateUserToken::generateUserToken();
        }

        $is_exist_get = \App\Lib\IsGetMethod::IsGetMethod();
        if($is_exist_get == 1){
            header('Location: /');
            exit();
        }
        $number = [];
        $number['old_link'] = '';
        $number['new_link'] = '';
        $is_empty = 1;
        //
        $response = new Response();
        require ('Somefile.php');
        //
        if(isset($_POST['old_link']) && isset($_POST['new_link']) && isset($_POST['g-recaptcha-response']) 
        && isset($_POST['tokenek']) && isset($_POST['number_information'])){
           
            $number['g-recaptcha']  = htmlspecialchars($_POST['g-recaptcha-response']);
            $number['old_link'] = htmlspecialchars($_POST['old_link']);
            $number['new_link'] = htmlspecialchars($_POST['new_link']);
            
            if(!empty($number['new_link']))
            {
                $is_empty = 0;
            }
        //bot traps: time 
            $_POST['number_information'] = htmlspecialchars($_POST['number_information']);
            
            $is_good_bot_traps = \App\Lib\VeryficationBotTraps::UseBotTime($_POST['number_information'], 3);
            unset($_POST['number_information']);
            if($is_good_bot_traps == 0)
            { 
                $seconds_time = \App\Lib\VeryficationBotTraps::BotCreateTime();
                $_SESSION['token_user'] =\App\Lib\GenerateUserToken::generateUserToken();
                return $this->render('lucky/number.html.twig', [
                    'number' => $number,
                    'is_empty' =>  $is_empty,
                    'this_token' => $_SESSION['token_user'],
                    'seconds_time' => $seconds_time
                ]);
                exit();
            }
                
        //token 
            $new_tokenek = \App\Lib\GenerateUserToken::generateUserToken();
            $_POST['tokenek'] = htmlspecialchars($_POST['tokenek']);
            if(!isset($_SESSION['token_user']))
            {
                $seconds_time = \App\Lib\VeryficationBotTraps::BotCreateTime();
                return $this->render('lucky/number.html.twig', [
                    'number' => $number,
                    'is_empty' =>  $is_empty,
                    'this_token' => $_SESSION['token_user'],
                    'seconds_time' => $seconds_time
                ]);
                exit();
            }
            else
            {
               if($_SESSION['token_user'] === $_POST['tokenek'])
               {
                    $_SESSION['token_user'] = $new_tokenek;
                    unset($_POST['tokenek']);
               }
               else
               {
                    $_SESSION['token_user'] = $new_tokenek;
                    $seconds_time = \App\Lib\VeryficationBotTraps::BotCreateTime();
                    return $this->render('lucky/number.html.twig', [
                        'number' => $number,
                        'is_empty' =>  $is_empty,
                        'this_token' => $_SESSION['token_user'],
                        'seconds_time' => $seconds_time
                    ]);
                    exit();
               }
                   
            }
        //

           foreach ($number as $key => $value) {
            if(!empty($number[$key])){
                $value = trim($value);
                $number[$key] = preg_replace('/\s/', '_',  $value);
            }
           }
           if(!empty($number['old_link'])){
           $patern = '/&amp;/i';
           $number['old_link'] = preg_replace($patern, '&', $number['old_link']);
            
           }
        
           $errors = self::validateData($number);

           if(empty($errors)){
                $send1 = "'" . $number['old_link'] . "'";
                $send2 = "'". $number['new_link'] . "'";

                $db = \App\Lib\Database::getPDO();
                $stmt_2 = $db->prepare("INSERT INTO webs (to_website, name_link)
                VALUES ($send1, $send2)");
                $stmt_2->execute();
                if(!$stmt_2){
                    $langVars = \App\Lib\LanguageManager::getVariables('number');
                    $error['database'] = $langVars('err_database');
                    $number['new_link'] = htmlspecialchars($_POST['new_link']);
                    $seconds_time = \App\Lib\VeryficationBotTraps::BotCreateTime();
                    return $this->render('lucky/number.html.twig', [
                        'number' => $number,
                        'is_empty' =>  $is_empty,
                        'errors' => $error,
                        'this_token' => $_SESSION['token_user'],
                        'seconds_time' => $seconds_time
                    ]);
                    exit();
                } else{
                    $name_Path_Website = \App\Lib\PathWebsiteAndFile::pathwebsite(2);
                    $this_website = $name_Path_Website . '/__';
                    $is_send_link = $this_website . $number['new_link'];
                    return $this->render('lucky/number.html.twig', [
                        'is_send_link' => $is_send_link
                    ]);
                    exit();
                }
           }else{
                $number['new_link'] = htmlspecialchars($_POST['new_link']);
                $seconds_time = \App\Lib\VeryficationBotTraps::BotCreateTime();
                return $this->render('lucky/number.html.twig', [
                        'number' => $number,
                        'is_empty' =>  $is_empty,
                        'errors' => $errors,
                        'this_token' => $_SESSION['token_user'],
                        'seconds_time' => $seconds_time
                ]);
                exit();
           }
        }else{
            $_SESSION['token_user'] = \App\Lib\GenerateUserToken::generateUserToken();
            $seconds_time = \App\Lib\VeryficationBotTraps::BotCreateTime();
            return $this->render('lucky/number.html.twig', [
                'number' => $number,
                'is_empty' =>  $is_empty,
                'this_token' => $_SESSION['token_user'],
                'seconds_time' => $seconds_time
            ]);
            exit();
        }
    }

    public static function validateData($number){

        $langVars = \App\Lib\LanguageManager::getVariables('number');
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
                    }else{
                         if(!preg_match('/^https:\/\//', $value)){
                             $errors->set($key, $langVars['err_link_invalid']);
                         }else {
                            // use safe list of apps
                            $naumber_aplication = \App\Lib\SafeListOfAps::SafeListOfAps($value);
                            if($naumber_aplication != 1){
                                $errors->set($key, $langVars['err_safe_list_aps']);
                            }
                         }
                    }
        
                 }else{
                    $errors->set($key, $langVars['err_empty']);
                 }
                break;
                case 'new_link':
                    if(!empty($value)) {     
                    if(mb_strlen($value) > 1900 || mb_strlen($value) < 3) {
                        $errors->set($key, $langVars['err_link_invalid']);
                    }
                    if(preg_match('/["]|[\']|[;]|[<]|[>]|[\$]|[\\\]/', $value)){
                        $errors->set($key, $langVars['err_link_special_characters']);
                    }
                 }else{
                    $errors->set($key, $langVars['err_empty']);
                 }
                break;
            }
		}

        if (empty($errors->errors)) {
            $db = \App\Lib\Database::getPDO();
            
            $ques = "'" . $number['new_link'] . "'";
            $stmt_2 = $db->prepare("SELECT * FROM webs WHERE name_link LIKE $ques LIMIT 1");
                if(!$stmt_2->execute()){
                    $errors->set('new_link', $langVars['err_database']);
                }else{
                    $how_obtained = $stmt_2-> rowCount();
                    if($how_obtained == 1){
                        $errors->set('new_link', $langVars['err_alredy_link']);
                    }
                }
        }
        if (empty($errors->errors)) {
            if(!empty($number['g-recaptcha'])){
                $error_lang = \App\Lib\PathWebsiteAndFile::pathwebsite(1);
                require $error_lang . 'config/recaptcha.php';
                $secret = RECPATCHA_PRIVATE_KEY;
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

