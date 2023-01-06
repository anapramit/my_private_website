<?php
 // function for bot traps 

 namespace App\Lib;
 use DateTime;

class VeryficationBotTraps {
    
    public static function Veryfication($info){
        if(is_numeric($info) == true)
        {
            $info = intval($info); 
            $info = abs($info);

            if(!is_int($info)){
                return false;
            }

            return $info; 

        }else{

            return false;

        }
    }

    public static function BotCreateTime(){

        $info_time_3 = new DateTime();
        $information_bot_time = $info_time_3 -> format('U');

        return $information_bot_time;
   
    }

    public static function UseBotTime($time_from_user, $max_time_trials){
    
        $is_good_bot_traps = 1;
        $number_information = \App\Lib\VeryficationBotTraps::BotCreateTime();
    
            if(!empty($time_from_user))
            {
                $time_from_user = \App\Lib\VeryficationBotTraps::Veryfication($time_from_user); 
            
                if($time_from_user === false)
                {
                    $is_good_bot_traps = 0;
                }
                else
                {
                    $i = $number_information - $time_from_user;
                    if($i < $max_time_trials)
                    {
                        $is_good_bot_traps = 0;
                    }
                }
            }
            else
            {

                $is_good_bot_traps = 0; 
            }
           
       return $is_good_bot_traps;
    }
}