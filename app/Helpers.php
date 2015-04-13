<?php
namespace App;
use App\Contact;
use App\Repositories\ContactRepository;

class Helpers {

    public function format_num($num){

        if ((strlen($num) > 10)) $num = round($num / 1000000000, 2) . ' GB';

        else if ((strlen($num) > 6 && (strlen($num) < 10))) $num = round($num / 1000000, 2) . ' MB';

        else if ((strlen($num) > 3 && (strlen($num) < 7))) $num = round($num / 1000, 0) . ' KB';

        else $num = $num . ' B';

        return($num);
    }

    public function fullsize_avatar($url){
        $url = explode("?", $url);
        return $url[0];
    }

    public function getContactsNumber()
    {
       return count(Contact::where('user_id', '=', \Auth::user()->id )->get());
    }

    public function stripSlash($path)
    {
        return str_replace("/", "", $path);
    }




}