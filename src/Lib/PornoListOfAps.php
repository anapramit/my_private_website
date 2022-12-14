<?php
namespace App\Lib;

class PornoListOfAps {
  // use porno list of apps

    public static function PornoListOfAps($aps_url) {
        $is_true = 0;

        $start_path = \App\Lib\PathWebsiteAndFile::pathwebsite(1);
        $information_folder = json_decode(file_get_contents($start_path . "Folder_Safe_List_Aps/Porno_List_Aps/json_Safe_List_Of_Aps.json"), true);
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
            return $is_true;
    }


    public static function SafeListOfApsLang($aps_url) {
            $is_true = 0;

            $start_path = \App\Lib\PathWebsiteAndFile::pathwebsite(1);
            $information_folder = json_decode(file_get_contents($start_path . "Folder_Safe_List_Aps/Porno_List_Aps/json_Safe_List_Of_Aps_Lang.json"), true);
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
}
 