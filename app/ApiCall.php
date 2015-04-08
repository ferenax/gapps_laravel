<?php namespace App;
use Symfony\Component\HttpFoundation\RedirectResponse;

class ApiCall {

    /**
     * @var \GuzzleHttp\Client
     */
    private $client;

    public function __construct()
    {
        $this->client= new \GuzzleHttp\Client();
    }

    public function getContactList()
    {
        $response = $this->constructGetCall('https://www.google.com/m8/feeds/contacts/default/full/?max-results=500&alt=json');

        return $response;
    }

    public function getDriveFileList()
    {
        $response = $this->constructGetCall('https://www.googleapis.com/drive/v2/files');

        return $response;
    }

    public function constructGetCall($url)
    {
        $token = \Session::get('token');

        $response = $this->client->get($url, [
            'headers' => [
                'Authorization' => 'Bearer ' . $token,
            ],
        ]);

        return $response;
    }

    public function authDropbox()
    {
       // $response = $this->client->get('https://www.dropbox.com/1/oauth2/authorize?client_id='.env('DROPBOX_ID').'&response_type=code');

        \Redirect::away('https://www.dropbox.com/1/oauth2/authorize?client_id='.env('DROPBOX_ID').'&response_type=code');


    }


    public function getDropboxInfo($token)
    {
        $response = $this->client->get('https://api.dropbox.com/1/account/info', [
            'headers' => [
                'Authorization' => 'Bearer ' . $token,
            ],
        ]);

        return json_decode($response->getBody());
    }


}