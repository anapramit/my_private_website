<?php

namespace App\Lib;

class SafeListOfAps {
  // use safe list of apps

    public static function SafeListOfAps($aps_url) {
        $is_true = 0;
       // $number_list_safe = 231;
       
        $start_path = \App\Lib\PathWebsiteAndFile::pathwebsite(1);
        $information_folder = json_decode(file_get_contents($start_path . "Folder_Safe_List_Aps/Safe_List_Aps/json_Safe_List_Of_Aps.json"), true);
        $number_list_safe = $information_folder['json_number_list_safe'];
        $list_safe = $information_folder['json_list_safe'];
      
        // $list_safe = array(
        //     1 => 'www.youtube.com',
        //     2 => 'www.facebook.com',
        //     3 => 'instagram.com',
        //     4 => 'vm.tiktok.com',
        //     5 => 'pin.it',
        //     6 => 'pinterest.com',
        //     7 => 'pornhub.com',
        //     8 => 'www.xvideos.com',
        //     9 => 'www.filmweb.pl',
        //     10 => 't.snapchat.com',
        //     11 => 'www.snapchat.com',
        //     12 => 'discord.gg',
        //     13 => 'open.spotify.com',
        //     14 => 'twitter.com',
        //     15 => 'onlyfans.com',
        //     16 => 'github.com',
        //     17 => 'tumblr.com',
        //     18 => 'giphy.com',
        //     19 => 'steamcommunity.com',
        //     20 => 'www.flickr.com',
        //     21 => 'www.reddit.com',
        //     22 => 'www.linkedin.com',
        //     23 => 'www.wattpad.com',
        //     24 => 'www.deviantart.com',
        //     25 => 'www.quora.com',
        //     26 => 'vk.com',
        //     27 => 'vsco.co',
        //     28 => 'picsart.com',
        //     29 => 'www.twitch.tv',
        //     30 => 'allegro.pl',
        //     31 => 'www.empik.com',
        //     32 => 'aliexpress.com',
        //     33 => 'www.google.com',
        //     34 => 'duckduckgo.com',
        //     35 => 'www.bing.com',
        //     36 => 'www.amazon.com',
        //     37 => 'search.yahoo.com',
        //     38 => 'images.search.yahoo.com',
        //     39 => 'video.search.yahoo.com',
        //     40 => 'news.search.yahoo.com',
        //     41 => 'shopping.search.yahoo.com',
        //     42 => 'www.yandex.ru',
        //     43 => 'www.vinted.pl',
        //     44 => 'demotywatory.pl',
        //     45 => 'www.eobuwie.com.pl',
        //     46 => 'www.mohito.com',
        //     47 => 'www.reserved.com',
        //     48 => 'www.ceneo.pl',
        //     49 => 'www.booking.com',
        //     50 => 'www.samsung.com',
        //     51 => 'www.netflix.com',
        //     52 => 'www.imdb.com',
        //     53 => 'www.tiktok.com',
        //     54 => 'www.zalando.pl',
        //     55 => 'www.hbomax.com',
        //     56 => 'www.primevideo.com',
        //     57 => 'www.fandom.com',
        //     58 => 'teams.microsoft.com',
        //     59 => 'www.naver.com',
        //     60 => 'xhamster.com',
        //     61 => 'www.xnxx.com',
        //     62 => 'www.olx.pl',
        //     63 => 'dzen.ru',
        //     64 => 'www.docomo.ne.jp',
        //     65 => 'zoom.us',
        //     66 => 'www.bilibili.tv',
        //     67 => 'discord.com',
        //     68 => 'www.qq.com',
        //     69 => 'new.qq.com',
        //     70 => 'www.msn.com',
        //     71 => 'www.ebay.com',
        //     72 => 'www.aajtak.in',
        //     73 => 'www.nytimes.com',
        //     74 => 'edition.cnn.com',
        //     75 => 'sportowefakty.wp.pl',
        //     76 => 'www.wp.pl',
        //     77 => 'pogoda.wp.pl',
        //     78 => 'www.money.pl',
        //     79 => 'portal.abczdrowie.pl',
        //     80 => 'www.pudelek.pl',
        //     81 => 'autokult.pl',
        //     82 => 'tech.wp.pl',
        //     83 => 'dom.wp.pl',
        //     84 => 'kuchnia.wp.pl',
        //     85 => 'turystyka.wp.pl',
        //     86 => 'www.onet.pl',
        //     87 => 'wiadomosci.onet.pl',
        //     88 => 'przegladsportowy.onet.pl',
        //     89 => 'businessinsider.com.pl',
        //     90 => 'wiadomosci.onet.pl',
        //     91 => 'pogoda.onet.pl',
        //     92 => 'video.onet.pl',
        //     93 => 'www.auto-swiat.pl',
        //     94 => 'www.morizon.pl',
        //     95 => 'kultura.onet.pl',
        //     96 => 'podroze.onet.pl',
        //     97 => 'programtv.onet.pl',
        //     98 => 'gameplanet.onet.pl',
        //     99 => 'onlygames.io',
        //     100 => 'kobieta.onet.pl',
        //     101 => 'www.komputerswiat.pl',
        //     102 => 'plejada.pl',
        //     103 => 'gotowanie.onet.pl',
        //     104 => 'www.newsweek.com',
        //     105 => 'www.gry.pl',
        //     106 => 'www.interia.pl',
        //     107 => 'antyweb.pl',
        //     108 => 'wydarzenia.interia.pl',
        //     109 => 'sport.interia.pl',
        //     110 => 'biznes.interia.pl',
        //     111 => 'motoryzacja.interia.pl',
        //     112 => 'zdrowie.interia.pl',
        //     113 => 'swiatseriali.interia.pl',
        //     114 => 'muzyka.interia.pl',
        //     115 => 'kobieta.interia.pl',
        //     116 => 'styl.interia.pl',
        //     117 => 'film.interia.pl',
        //     118 => 'gry.interia.pl',
        //     119 => 'zielona.interia.pl',
        //     120 => 'geekweek.interia.pl',
        //     121 => 'czateria.interia.pl',
        //     122 => 'ding.pl',
        //     123 => 'polsatboxgo.pl',
        //     124 => 'www.polsatnews.pl',
        //     125 => 'www.polsatsport.pl',
        //     126 => 'smaker.pl',
        //     127 => 'www.polsat.pl',
        //     128 => 'www.twojapogoda.pl',
        //     129 => 'www.o2.pl',
        //     130 => 'store.steampowered.com',
        //     131 => 'www.plotek.pl',
        //     132 => 'www.messenger.com',
        //     133 => 'wiadomosci.gazeta.pl',
        //     134 => 'next.gazeta.pl',
        //     135 => 'www.sport.pl',
        //     136 => 'www.edziecko.pl',
        //     137 => 'zakupy.avanti24.pl',
        //     138 => 'haps.pl',
        //     139 => 'kobieta.gazeta.pl',
        //     140 => 'myfitness.gazeta.pl',
        //     141 => 'www.tokfm.pl',
        //     142 => 'streetstyle24.pl',
        //     143 => 'avanti24.pl',
        //     144 => 'www.wykop.pl',
        //     145 => 'www.mediaexpert.pl',
        //     146 => 'fakty.tvn24.pl',
        //     147 => 'tvn24.pl',
        //     148 => 'www.otomoto.pl',
        //     149 => 'www.medonet.pl',
        //     150 => 'www.euro.com.pl',
        //     151 => 'wyborcza.pl',
        //     152 => 'wyborcza.biz',
        //     153 => 'www.wysokieobcasy.pl',
        //     154 => 'magazyn-kuchnia.pl',
        //     155 => 'shopee.pl',
        //     156 => 'www.gazeta.pl',
        //     157 => 'www.medonet.pl',
        //     158 => 'www.fakt.pl',
        //     159 => 'www.flashscore.pl',
        //     160 => 'www.cda.pl',
        //     161 => 'wbijam.pl',
        //     162 => 'shinden.pl',
        //     163 => 'lubimyczytac.pl',
        //     164 => 'archiveofourown.org',
        //     165 => 'bonito.pl',
        //     166 => 'www.wattpad.com',
        //     167 => 'ksiegarnia.gwo.pl',
        //     168 => 'joemonster.org',
        //     169 => 'kwejk.pl',
        //     170 => 'jbzd.com.pl',
        //     171 => 'www.eska.pl',
        //     172 => 'www.rmf.fm',
        //     173 => 'www.rmfclassic.pl',
        //     174 => 'www.rmf24.pl',
        //     175 => 'www.rmfmaxx.pl',
        //     176 => 'gra.fm',
        //     177 => 'radiogra.pl',
        //     178 => 'www.tekstowo.pl',
        //     179 => 'www.spotify.com',
        //     180 => 'open.spotify.com',
        //     181 => 'wiadomosci.radiozet.pl',
        //     182 => 'rozrywka.radiozet.pl',
        //     183 => 'sklep.radiozet.pl',
        //     184 => 'sport.radiozet.pl',
        //     185 => 'zdrowie.radiozet.pl',
        //     186 => 'stylzycia.radiozet.pl',
        //     187 => 'podroze.radiozet.pl',
        //     188 => 'player.radiozet.pl',
        //     189 => 'konkursy.radiozet.pl',
        //     190 => 'www.pixiv.net',
        //     191 => 'www.behance.net',
        //     192 => 'www.artstation.com',
        //     193 => 'www.otodom.pl',
        //     194 => 'medium.com',
        //     195 => 'booksy.com',
        //     196 => 'docs.google.com',
        //     197 => 'forms.gle',
        //     198 => 'adresowo.pl',
        //     199 => 'www.nieruchomosci-online.pl',
        //     200 => 'www.domiporta.pl',
        //     201 => 'aleo.com',
        //     202 => 'badoo.com',
        //     203 => 'fotka.com',
        //     204 => 'tinder.com',
        //     205 => 'www.pepper.pl',
        //     206 => "www.kwestiasmaku.com",
        //     207 => 'www.filgoal.com',
        //     208 => 'www.tvp.pl',
        //     209 => 'sport.tvp.pl',
        //     210 => 'www.tvpparlament.pl',
        //     211 => 'www.tvp.info',
        //     212 => 'wiadomosci.tvp.pl',
        //     213 => 'teleexpress.tvp.pl',
        //     214 => 'panorama.tvp.pl',
        //     215 => 'rozrywka.tvp.pl',
        //     216 => 'historia.tvp.pl',
        //     217 => 'stream.tvp.pl',
        //     218 => 'wilno.tvp.pl',
        //     219 => 'tvpkultura.tvp.pl',
        //     220 => 'polonia.tvp.pl',
        //     221 => 'tvp2.tvp.pl',
        //     222 => 'tvp1.tvp.pl',
        //     223 => 'sklep.tvp.pl',
        //     224 => 'hd.tvp.pl',
        //     225 => 'dokument.tvp.pl',
        //     226 => 'seriale.tvp.pl',
        //     227 => 'abc.tvp.pl',
        //     228 => 'chaturbate.com',
        //     229 => 'deccoria.pl',
        //     230 => 'horoskopy.gazeta.pl',
        //     231 => 'wiadomosci.wp.pl'
        // );

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

            // $number_list_safe = 8;
            // $list_safe = array(
            //     1 => 'pornhub.com',
            //     2 => 'pinterest.com',
            //     3 => 'bongacams.com',
            //     4 => 'aliexpress.com',
            //     5 => 'wikipedia.org',
            //     6 => 'linkedin.com',
            //     7 => 'redtube.com',
            //     8 => 'xhamster.com'
            // );

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
        // $number_list_safe = 13;
        // $list_safe = array(
        //     1 => 'www.amazon.',
        //     2 => 'www.google.',
        //     3 => 'duckduckgo.',
        //     4 => 'www.bing.',
        //     5 => 'www.amazon.',
        //     6 => 'search.yahoo.',
        //     7 => 'images.search.yahoo.',
        //     8 => 'video.search.yahoo.',
        //     9 => 'news.search.yahoo.',
        //     10 => 'shopping.search.yahoo.',
        //     11 => 'www.yandex.',
        //     12 => 'www.ebay.',
        //     13 => 'www.newsweek.'
        // );

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
 
