<?php

namespace App\Lib;

class SafeListOfAps {
  // use safe list of apps

    public static function SafeListOfAps($aps_url) {
        $is_true = 0;
       
        $start_path = \App\Lib\PathWebsiteAndFile::pathwebsite(1);
        $information_folder = json_decode(file_get_contents($start_path . "Folder_Safe_List_Aps/Safe_List_Aps/json_Safe_List_Of_Aps.json"), true);
        $number_list_safe = $information_folder['json_number_list_safe'];
        $list_safe = $information_folder['json_list_safe'];
      

            for($i = 1; $i <= $number_list_safe; $i++){
                $query = '/^https:\/\/' . $list_safe[$i] . '\//';
                if(preg_match($query, $aps_url)){
                    $is_true = 1;
                    break;
                }
            }
            if($is_true == 0){
                $is_true = self::SafeListOfApsLang($aps_url);
            }
            if($is_true == 0){
                $is_true = self::SafeListOfApsLang2($aps_url);
            }
            if($is_true == 0){
                $is_true = self::SafeListOfApsBugFacebook($aps_url);
            }
            if($is_true == 0){
                $is_true = self::SafeListOfApsBugTumblr($aps_url);
            }
            if($is_true == 0){
                $is_true = self::SafeListOfApsBugZoom($aps_url);
            }
            return $is_true;
    }


    public static function SafeListOfApsLang($aps_url) {
            $is_true = 0;

            $start_path = \App\Lib\PathWebsiteAndFile::pathwebsite(1);
            $information_folder = json_decode(file_get_contents($start_path . "Folder_Safe_List_Aps/Safe_List_Aps/json_Safe_List_Of_Aps_Lang.json"), true);
            $number_list_safe = $information_folder['json_number_list_safe'];
            $list_safe = $information_folder['json_list_safe'];


            for($i = 1; $i <= $number_list_safe; $i++){

                $query = '/^https:\/\/' . "([a-z][a-z]|)" . '.' . $list_safe[$i] . '\//';

                if(preg_match($query, $aps_url)){
                    $is_true = 1;
                    break;
                }

             }
        return $is_true;
    }


    public static function SafeListOfApsLang2($aps_url) {
        $is_true = 0;

        $start_path = \App\Lib\PathWebsiteAndFile::pathwebsite(1);
        $information_folder = json_decode(file_get_contents($start_path . "Folder_Safe_List_Aps/Safe_List_Aps/json_Safe_List_Of_Aps_Lang2.json"), true);
        $number_list_safe = $information_folder['json_number_list_safe'];
        $list_safe = $information_folder['json_list_safe'];


        for($i = 1; $i <= $number_list_safe; $i++){

            $query = '/^https:\/\/' . $list_safe[$i] .  "[a-z][a-z]" . '\//';

            if(preg_match($query, $aps_url)){
                $is_true = 1;
                break;
            }

         }
         return  $is_true;
    }


    public static function SafeListOfApsBugFacebook($aps_url) {
        //facebook
            $is_true = 0;
            $name_1 = '.facebook.com';
            $query = '/^https:\/\/' . "([a-z][a-z]-[a-z][a-z])" . $name_1 . '\//'; 
            if(preg_match($query , $aps_url)){
                    $is_true = 1;
                
            }
        return $is_true;
    }

    public static function SafeListOfApsBugTumblr($aps_url) {
        //tumblr 
            $is_true = 0;
            $name = "https:\/\/";
            $name_1 = ".tumblr.com" ;
            $query = "/^" . $name . "[a-zA-Z0-9\-]+" . $name_1  ."$/";    
            if(preg_match($query, $aps_url)){
                    $is_true = 1;
                
            }
        return $is_true;
    }


    public static function SafeListOfApsBugZoom($aps_url) {
        //zoom
            $is_true = 0;
            $name = "https:\/\/";
            $name_1 = ".zoom.us" ;
            $query = "/^" . $name . "[a-zA-Z0-9\-]+" . $name_1  ."/";    
            if(preg_match($query, $aps_url)){
                    $is_true = 1;
                
            }
        return $is_true;
    }

}
 
