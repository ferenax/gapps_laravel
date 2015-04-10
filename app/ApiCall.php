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

    public function getDropboxInfo()
    {
        $response = $this->client->get('https://api.dropbox.com/1/account/info', [
            'headers' => [
                'Authorization' => 'Bearer ' . \Session::get('dtoken'),
            ],
        ]);

        return json_decode($response->getBody());
    }

    public function dropboxList()
    {
        $copy = $this->client->get('https://api.dropbox.com/1/metadata/auto/', [
            'headers' => [
                'Authorization' => 'Bearer ' . \Session::get('dtoken'),
            ],
        ]);

        return json_decode($copy->getBody());
    }

    public function getToken($code)
    {
        $response = $this->client->post($this->getTokenUrl(), [
            'headers' => ['Accept' => 'application/json'],
            'body' => $this->getTokenFields($code),
        ]);

        return json_decode($response->getBody());
    }

    protected function getTokenFields($code)
    {
        return [
            'grant_type' => 'authorization_code',
            'client_id' => env('DROPBOX_ID'), 'client_secret' => env('DROPBOX_SECRET'),
            'code' => $code, 'redirect_uri' => env('DROPBOX_REDIRECT_URI')
        ];
    }

    protected function getTokenUrl()
    {
        return 'https://api.dropbox.com/1/oauth2/token';
    }

}