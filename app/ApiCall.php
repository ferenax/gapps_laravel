<?php
/**
 * Created by PhpStorm.
 * User: ferenan
 * Date: 3/31/15
 * Time: 2:56 PM
 */

namespace App;


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

}