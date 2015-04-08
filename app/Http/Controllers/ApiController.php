<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\ApiCall;
use App\Contact;
use App\Repositories\ContactRepository;


class ApiController extends Controller {

/**
 * @var ContactRepository
 */
private $contacts;

    public function __construct(ContactRepository $contacts)
    {
        $this->contacts = $contacts;
    }


    public function getContactList(ApiCall $apiCall)
    {
        $response = $apiCall->getContactList()->getBody();

        $JSONarray=json_decode($response,true);

        $this->storeContactList($JSONarray);

        $contacts = Contact::where('user_id', '=', \Auth::user()->id )->paginate(12);

        return view('pages.contactlist')->with('contacts', $contacts);

    }

    public function getDriveFileList(ApiCall $apiCall)
    {
        $response = $apiCall->getDriveFileList()->getBody();

        $JSONarray=json_decode($response,true);

        return view('pages.drivefilelist')->with('response', $JSONarray);
    }

    public function storeContactList($response)
    {
        if(isset($response['feed']['entry']))
        {
            foreach($response['feed']['entry'] as $p)
            {
                if(!empty($p['title']['$t']))
                {
                   $var['name'] = $p['title']['$t'];
                }
                else $var['name'] = '';

                if(isset($p['gd$phoneNumber']))
                {
                    $var['phone'] = $p['gd$phoneNumber'][0]['$t'];
                }
                else $var['phone'] = '';

                if(isset($p['gd$email']))
                {
                    $var['email'] = $p['gd$email'][0]['address'];
                }
                else $var['email']= '';

                if(isset($var))
                $this->contacts->findByUsernameOrCreate($var);
            }
        }


    }

}
