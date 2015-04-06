<?php
namespace App;


class Helpers {

    public function format_num($num){

        if ((strlen($num) > 10)) $num = round($num / 1000000000, 2) . ' GB';

        else if ((strlen($num) > 6 && (strlen($num) < 10))) $num = round($num / 1000000, 2) . ' MB';

        else if ((strlen($num) > 3 && (strlen($num) < 7))) $num = round($num / 1000, 0) . ' KB';

        else $num = $num . 'Bytes';

        return($num);
    }

    public function fullsize_avatar($url){
        $url = explode("?", $url);
        return $url[0];
    }

}