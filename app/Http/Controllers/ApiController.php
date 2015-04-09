<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\ApiCall;
use App\Contact;
use App\Repositories\ContactRepository;
use Symfony\Component\HttpFoundation\RedirectResponse;

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

        $this->storeContactList(json_decode($response,true));

        $contacts = Contact::where('user_id', '=', \Auth::user()->id )->paginate(12);

        return view('pages.contactlist')->with('contacts', $contacts);
    }

    public function getDriveFileList(ApiCall $apiCall)
    {
        $response = $apiCall->getDriveFileList()->getBody();

        return view('pages.drivefilelist')->with('response', json_decode($response,true));
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

    public function syncDropbox()
    {
        if(\Session::get('dstate') !== 'synced') {
            return new RedirectResponse('https://www.dropbox.com/1/oauth2/authorize?client_id=' . env('DROPBOX_ID') . '&response_type=code&redirect_uri=' . env('DROPBOX_REDIRECT_URI'));
        }
        else return redirect('/dropbox');
    }

    public function showDropbox(ApiCall $apiCall, Request $request)
    {

        if(\Session::get('dstate') !== 'synced')
        {
            if($request->has('code'))
            {
                \Session::put('dtoken', $apiCall->getToken($request->get('code'))->access_token );
                \Session::put('dstate', 'synced');
            }
        }

        return view('pages.dropboxinfo')->with('info', $apiCall->getDropboxInfo());
    }
}
