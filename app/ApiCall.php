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

        $token = \Session::get('token');

        $response = $this->client->get('https://www.google.com/m8/feeds/contacts/default/full/?max-results=50',  [

            'headers' => [
                'Authorization' => 'Bearer ' . $token,
            ],
        ]);

        dd($response->getBody()->__toString());

        return $response;

    }

}